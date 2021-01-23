---
title: Table
extends: _layouts.documentation
section: main
lang: en
---

The table layout is used to display minimal information for viewing and selection.

![Table](/assets/img/layouts/table.png)


To create, run the command:
```php
php artisan orchid:table PatientListLayout
```

Example:
```php
namespace App\Layouts\Clinic\Patient;

use Orchid\Screen\TD;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Actions\ModalToggle;
use Orchid\Screen\Layouts\Table;
use Orchid\Platform\Http\Filters\SearchFilter;
use App\Http\Filters\LastNamePatient;

class PatientListLayout extends Table
{
    /**
     * Data source.
     *
     * The name of the key to fetch it from the query.
     * The results of which will be elements of the table.
     *
     * @var string
     */
    protected $target = 'patients';

    /**
     * @return TD[]
     */
    protected function columns() : array
    {
        return [
            TD::make('last_name','Last name')
                ->align('center')
                ->width('100px')
                ->render(function ($patient) {
                    return Link::make($patient->last_name)
                        ->route('platform.clinic.patient.edit', $patient);
                }),

            TD::make('first_name', 'First Name')
                ->sort()
                ->render(function ($patient) {
                    return Link::make($patient->first_name)
                        ->route('platform.clinic.patient.edit', $patient);
                }),

            TD::make('phone','Phone')
                ->render(function ($patient){
                    return ModalToggle::make($patient->phone)
                        ->modal('oneAsyncModal')
                        ->modalTitle('Phone')
                        ->method('saveUser')
                        ->asyncParameters([
                            'id' => $patient->id,
                        ]);
                }),

            TD::make('email','Email'),
            TD::make('created_at','Date of publication'),
        ];
    }
}
```

Tables also support writing through short syntax without creating a class:

```php
use Orchid\Support\Facades\Layout;
use Orchid\Screen\TD;

Layout::table('clients', [
    TD::make('name'),
    TD::make('created_at')->sort(),
]);
```

## Cells

A table is only a general wrapper for which you need to specify TD classes. Designed to create a single cell.

```php
use Orchid\Screen\TD;

TD::make('last_name');
```

The `set` method is the main method, sets the key name from the array and the display name.

```php
TD::make('last_name', 'Last name');
```


### Alignment

Content alignment control can be controlled using the `align` method:

```php
TD::make('last_name')->align(TD::ALIGN_LEFT);
TD::make('last_name')->align(TD::ALIGN_CENTER);
TD::make('last_name')->align(TD::ALIGN_RIGHT);
```

### Sorting

Sorting the selection should be done in the `query` screen,
for models, you can use automatic `http` [sorting and
filtering](/en/docs/filters/#automatic-http-filtering-and-sorting)

To enable active sorting by this column
you must specify the `sort` method:

```php
TD::make('last_name')->sort();
```

### Width

You can control the width of the cell using the `width` method:

```php
TD::make('last_name')->width('100px');
```

###Show and hide columns

By default, the user can hide any column for himself, but you can
prohibit doing this by specifying:

```php
TD::make('last_name')->cantHide();
```

And also hide by default, but can be shown at the request of the user.

```php
TD::make('last_name')->defaultHidden();
```


### Data output

In some cases, you may need to display combined
  data, the `render` method is for this purpose intended. It implements the ability to generate cells according to the function:
 
```php
TD::make('full_name')
    ->render(function ($user) {
        return $user->firt_name . ' ' . $user->last_name;
    });
```

The loopback function must return any string value:
```php
TD::make('full_name')
    ->render(function ($user) {
        return view('blade_template', [
            'user' => $user
        ]);
    });
```

Please note that you can use fields and actions:

```php
use Orchid\Screen\Actions\Link;

TD::make('full_name')
    ->render(function ($user) {
        return Link::make($user->last_name)
               ->route('platform.user.edit', $user);
    });
```

Sometimes it may be necessary to get the value from the `query` screen, rather than relying only on the `target`. You can get the value as follows:

```php
use Orchid\Screen\Actions\Link;

TD::make('price')
    ->render(function ($product) {
        return $product->price + $this->query->get('tax');
    });
```


## Table options

You can specify the text to be displayed if the table is empty
specifying methods:

```php
/**
 * @return string
 */
protected function iconNotFound(): string
{
    return 'table';
}

/**
 * @return string
 */
protected function textNotFound(): string
{
    return __('There are no records in this view');
}

/**
 * @return string
 */
protected function subNotFound(): string
{
    return '';
}
```

If the table rows do not seem contrasting to you, then you can enable
`striped` mode:

```php
/**
 * @return bool
 */
protected function striped(): bool
{
    return false;
}
```

You can dinamically change the amount of links to display in the table pagination with the following method:

```php
/**
 * The number of links to display on each side of current page link.
 *
 * @return int
 */
protected function onEachSide(): int
{
    return 3;
}
```

## Total row

Adds a summary row at the bottom of the table, for this you need to define the `total` method and describe the required cells. For example:

```php
public function total():array
{
    return [
        TD::make('total')
            ->align(TD::ALIGN_RIGHT)
            ->colspan(2)
            ->render(function () {
                return 'Total:';
            }),

        TD::make('total_count')
            ->align(TD::ALIGN_RIGHT),

        TD::make('total_active_count')
            ->align(TD::ALIGN_RIGHT),
    ];
}
```

This line will ignore the specified `target` based on the result of the `query` screen:

```php
public function query(): array
{
    return [
        'total_active_count' => '$93 960',
        'total_count' => '$103 783',
        // ...
    ];
}
```


## Column Expansion

When working with the same type of data, it is often required to process it in the same way, in order not to duplicate the code in the layers, it is possible to extend the `TD` class using its own methods. To do this, it is necessary to register the closure function in the service provider.

Registration example:

```php
// AppServiceProvider.php
TD::macro('bool', function () {

    $column = $this->column;

    $this->render(function ($datum) use ($column) {
        return view('bool',[
            'bool' => $datum->$column
        ]);
    });

    return $this;
});
```

Template example:

```php
// bool.blade.php

@if($bool)
    <i class="icon-check text-success"></i>
@else
    <i class="icon-close text-danger"></i>
@endif
```

Usage example:
```php
public function grid(): array
{
    return [
        TD::make('status')->bool(),
    ];
}
```

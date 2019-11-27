---
title: Элементы формы
description: Поля используются для генерации вывода шаблона формы заполнения и редактирования
extends: _layouts.documentation.ru
section: main
---

Поля используются для генерации вывода шаблона формы заполнения и редактирования


> Не стесняйтесь добавлять свои поля, например, для использования удобного редактора для вас или любых компонентов.
 
 
## Поля ввода

### Input

![Input](https://orchid.software/assets/img/ui/input.png)

Является одним из разносторонних элементов формы и позволяет создавать разные части интерфейса и обеспечивать взаимодействие с пользователем. Главным образом предназначен для создания текстовых полей.
 
Пример записи:
```php
Input::make('name')
    ->type('text')
    ->max(255)
    ->required()
    ->title('Name Articles')
    ->help('Article title');
``` 
 

> Заметьте многие методы такие как `canSee`,`required`,`title`,`help`,`vertical`,`horizontal`; и многие другие, доступны почти каждым `полям` системы и являются не обязательными
 
Одно из самых универсальных полей за счет указания типа, поддерживаются почти все `html` значения:

* **text**	- Текстовое поле. Предназначено для ввода символов с помощью клавиатуры.
* **file** - 	Поле для ввода имени файла, который пересылается на сервер.	
* **hidden**	- Скрытое поле.
* **color**	- Виджет для выбора цвета.
* **email**	- Для адресов электронной почты.
* **number**	- Ввод чисел.
* **range**	- Ползунок для выбора чисел в указанном диапазоне.
* **url**	- Для веб-адресов.


### Textarea
 
Поле `textarea` представляет собой элемент формы для создания области, в которую можно вводить несколько строк текста. 
В отличие от тега `input` в текстовом поле допустимо делать переносы строк сохраняются при отправке данных на сервер.

Пример записи:
```php
TextArea::make('description')
    ->max(255)
    ->rows(5)
    ->required()
    ->title('Short description');
```    


### Checkbox
 
Элемент графического пользовательского интерфейса, позволяющий пользователю управлять параметром с двумя состояниями — ☑ включено и ☐ выключено.


Пример записи:
```php
CheckBox::make('free')
    ->value(1)
    ->title('Free')
    ->placeholder('Event for free')
    ->help('Event for free');
```           
 

### Маска для ввода значений
 
Отлично подходит если значения должны быть записаны в стандартном виде, например ИНН или номер телефона

Пример записи:
```php
Input::make('phone')
    ->mask('(999) 999-9999')
    ->title('Номер телефона');
```   

В маску можно передавать массив с параметрами, например:


```php
Input::make('price')
    ->mask([
     'mask' => '999 999 999.99',
     'numericInput' => true
    ])
    ->title('Стоимость');
```   

```php
Input::make('price')
    ->mask([
        'alias' => 'currency',
        'prefix' => ' ',
        'groupSeparator' => ' ',
        'digitsOptional' => true,
    ])
    ->title('Стоимость');
```   

Все доступные параметры *Inputmask* можно посмотреть [здесь](https://github.com/RobinHerbots/Inputmask#options) 
 
## Редакторы текста

Визуальный редактор в котором содержание отображается в процессе редактирования и 
выглядит максимально близко похожим на конечный результат.
Редактор позволяет вставлять рисунки, таблицы, указывать стили оформления текста, видео.

### HTML редактор TinyMCE

![Wysing](https://orchid.software/assets/img/ui/wysing.png)
 
Пример записи:
```php
TinyMCE::make('html')
    ->required()
    ->theme('inlite');
``` 
Для отображения в редакторе верхней панели и меню, в котором доступны функции полноэкранного режима и просмотр html кода, нужно установить атрибут `theme('modern')`.
 
### HTML редактор Quill

Пример записи:
```php
Quill::make('html')
``` 
 
### Markdown редактор

![Markdown](https://orchid.software/assets/img/ui/markdown.png)
![Markdown2](https://orchid.software/assets/img/ui/markdown2.png)

Редактор для облегчённого языка разметки,
 созданный с целью написания максимально читаемого и удобного для правки текста,
  но пригодного для преобразования в языки для продвинутых публикаций
 
Пример записи:
```php
SimpleMDE::make('markdown')
    ->title('О чём вы хотите рассказать?')
```  
 
### Редактор кода
 
Поле для записи программного кода с возможностью подсветки

![Code](https://orchid.software/assets/img/ui/code.png)


Пример записи:
```php
Code::make('code')
```    

Для указания подцветки кода под конкретный язык программирования можно указывать через метод `language()`


```php
 Code::make('code')
     ->language(Code::CSS);
```

Доступны следующие языки:

* Markup - `markup`, `html`, `xml`, `svg`, `mathml`
* CSS - `css`
* C-like - `clike`
* JavaScript - `javascript`, `js`


Поддерживается указание количество строк:

```php
Code::make('code')
    ->lineNumbers();
```
 
## Загрузка и обработка файлов

### Picture field
 
Позволяет загружать изображение.


Пример записи:
```php
Picture::make('picture');
```  

### Cropper field
 
Позволяет загружать изображение и обрезать до нужного формата.


Пример записи:
```php
Cropper::make('picture')
    ->width(500)
    ->height(300);
```  

### Media field
 

Пример записи:
```php
Upload::make('upload');
```  

```php
Upload::make('docs')
    ->groups('documents');

Upload::make('images')
    ->groups('photo');
```  

Может использоваться для ограничения максимального количества файлов, которые будут обрабатываться

```php
Upload::make('upload')
    ->maxFiles(10)
```

Определяет количество параллельных загрузок для обработки файлов
```php
Upload::make('upload')
    ->parallelUploads(2)
```

```php
Upload::make('upload')
    ->maxFileSize(1024)
```

Реализация по умолчанию `accept` проверяет тип или расширение MIME файла по этому списку. Это разделенный запятыми список типов MIME или расширений файлов.

```php
Upload::make('upload')
    ->acceptedFiles('image/*,application/pdf,.psd')
```

Поле загрузки может работать с различными хранилищами, что бы указать его необходимо передать ключ указанный в `config/filesystems.php`:

```php
Upload::make('upload')
    ->storage('private')
```

По умолчанию используется хранилище `public`.

## TimeZone field

Поле для удобного выбора часового пояса:

```php
TimeZone::make('time');
```

Возможно, указание конкретных временных зон используя:

```php
use DateTimeZone;

TimeZone::make('time')
    ->listIdentifiers(DateTimeZone::ALL); 
```

По умолчанию принимает значение `DateTimeZone::ALL`, но возможны и другие:

```php
DateTimeZone::AFRICA;
DateTimeZone::AMERICA;
DateTimeZone::ANTARCTICA;
DateTimeZone::ARCTIC;
DateTimeZone::ASIA;
DateTimeZone::ATLANTIC;
DateTimeZone::AUSTRALIA;
DateTimeZone::EUROPE;
DateTimeZone::INDIAN;
DateTimeZone::PACIFIC;
DateTimeZone::UTC;
DateTimeZone::ALL_WITH_BC;
DateTimeZone::PER_COUNTRY;
```

## Datetime field
 
![Datatime](https://orchid.software/assets/img/ui/datatime.png) 
 
Позволяет выбрать дату и время


Пример записи:
```php
DateTimer::make('open')
    ->title('Opening date');
```           

Разрешить прямой ввод:

```php
DateTimer::make('open')
    ->title('Opening date')
    ->allowInput();
```           

Формат данных:

```php
DateTimer::make('open')
    ->title('Opening date')
    ->format('Y-m-d');
```

Пример, для отображения в 24-ом формате:

```php
DateTimer::make('open')
    ->title('Opening date')
    ->format24hr();
```

Календарь со временем:

```php
DateTimer::make('open')
    ->title('Opening time')
    ->enableTime();
```

Выбор только времени:

```php
DateTimer::make('open')
    ->title('Opening time')
    ->noCalendar()
    ->format('h:i K');
```

         
## Select

Простой выбор из списка массива:

```php
Select::make('select')
    ->options([
        'index'   => 'Index',
        'noindex' => 'No index',
    ])
    ->title('Select tags')
    ->help('Allow search bots to index');
```

Работа с источником:

```php
Select::make('user')
    ->fromModel(User::class, 'email')
```

Источник с условием:
```php
Select::make('user')
    ->fromQuery(User::where('balance', '!=', '0'), 'email'),
```

Изменение ключа:
```php
Select::make('user')
    ->fromModel(User::class, 'email', 'uuid')
```

Возможны ситуации когда необходимо добавить некоторое значение которое означает, что поле не выбрано, 
для этого можно использовать метод `empty`:

```php
// Для массива
Select::make('user')
    ->options([
        1  => 'Пункт 1',
        2  => 'Пункт 2',
    ])
   ->empty('Не выбрано');

// Для источника
Select::make('user')
    ->fromModel(User::class, 'name')
    ->empty('Не выбрано');
```

> **Обратите внимание**, что `empty` вызывается позднее заполняющих методов, иначе добавленное значение будет перезаписано

Метод `empty` так же принимает и второй аргумент отвечающий за значение:

```php
Select::make('user')
    ->options([
        1  => 'Пункт 1',
        2  => 'Пункт 2',
    ])
   ->empty('Не выбрано', 0);
```

## Отношения

Поля отношения могут подгружать динамические данные, это хорошее решение, если вам нужны связи.

```php
Relation::make('idea')
    ->fromModel(Idea::class, 'name')
    ->title('Выберите свою идею'),
```

Для модификации загрузки можно использовать указание на `scope` модели,
например, взять только активные:

```php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Idea extends Model
{

    /**
     * @param Builder $query
     *
     * @return Builder
     */
    public function scopeActive(Builder $query)
    {
        return $query->where('active', true);
    }
}
```

```php
Relation::make('idea')
    ->fromModel(Idea::class, 'name')
    ->applyScope('active')
    ->title('Выберите свою идею');
```


Опции выбора могут работать с вычисляемыми полями, но только для отображения результата, поиск будет происходить только по одной колонки в базе данных. Для этого используется метод `displayAppend`

```php
namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    /**
     * @return string
     */
    public function getFullAttribute(): string
    {
        return $this->attributes['name'] . ' (' . $this->attributes['email'] . ')';
    }
}
```

```php
Relation::make('users.')
    ->fromModel(User::class, 'name')
    ->displayAppend('full')
    ->multiple()
    ->title('Select users');
```


## Кнопка/Ссылка

В определенных случаях необходимо добавить кнопку для вызова модального окна, простую ссылку или добавить кнопку 
отправки формы в конце экрана. 
Для таких случаев существует поле `Button`. Поле `Button` не может иметь какого либо 
значения и не передается при сохранении. Оно может быть использовано для вызова модального окна определенного на экране
и для добавления простой ссылки в форме.

Пример использования с модальным окном `addNewPayment` добавленного ранее на экран: 

```php
ModalToggle::make('Add Payment')
    ->modal('addNewPayment')
    ->icon('icon-wallet')
    ->right()
```

Пример использования со ссылкой:

```php
Link::make('Google It!')
    ->link('http://google.com');
```

Пример использования с методом:

```php
Button::make('Google It!')
    ->method('goToGoogle');
```

Доступные модификаторы:

* `modal('modalName')` - создает кнопку вызывающую модальное окно с именем `modalName` в рамках текущего экрана
* `right()` - Позиционирования элемента по правому краю экрана
* `block()` - Позиционирование элемента по всей ширине экрана
* `class('class-names')` - переписывает стандартные классы для кнопки
* `link('url')` - добавляет ссылку для кнопки. Игнорируется при заданном modal
* `method('methodName')` - при клике форма будет отправлена на заданный метод в рамках текущего экрана
* `title('Click Me!')` - задает название текущей кнопки
* `icon('icon-wallet)` - задает иконку для кнопки
 

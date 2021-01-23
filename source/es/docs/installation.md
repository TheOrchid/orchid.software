---
title: Platform installation
description: This getting started guide will help you get started using ORCHID.
extends: _layouts.documentation
section: main
---


Before you can use the platform, you need to install it. This guide should help you perform a simple installation to start the project.

## Create a project

> **Note.** If you already have Laravel installation, you can skip this step.

Being a package for the framework, you must first install Laravel. This can be done using the Composer dependency management tool by running the `composer create-project` command in your terminal:

```php
$ composer create-project laravel/laravel orchid-project "8.*" --prefer-dist
```

For more information on how to install Laravel, follow [Official Laravel Installation Guide](https://laravel.com/docs/installation).

> **Don’t you have Composer?** It’s easy to install by following the instructions on the [download page](https://getcomposer.org/download/).

It will create a new `orchid-project` directory, load the dependencies, and generate the leading directories and files you need to get started.
In other words, install your new framework project.


**Do not forget**

- Set “chmod -R o+w” rights to the `storage` and `bootstrap/cache` directories
- Edit the `.env` file

## Add dependency

Go to the created project directory and run the command:
```php
$ composer require orchid/platform
```

> **Note.** If you just installed Laravel, you may need to generate a key with command `php artisan key:generate`

> **Note.** You also need to create a new database, update the `.env` file with credentials, and add your application's URL to the variable `APP_URL`.


## Platform installation

> **Note.** The installation will overwrite the `app/Models/User` model. 

Run the installation process by running the command:

```php
php artisan orchid:install
```

## Create user

To create a user with maximum permissions, you can run the following command with a username, email, and password:

```php
php artisan orchid:admin admin admin@admin.com password
```


## Start local server

If you haven't installed a server (Nginx, Apache, etc.) to run the project, you can use the built-in server:

```php
php artisan serve
```

Open a browser and go to `http://localhost:8000/admin`. If everything works, you will see the control panel login page. Later you can stop the server by pressing `Ctrl + C` in the terminal.

> **Note.** Suppose your runtime uses a different domain (e.g., orchid.loc). In that case, the admin panel may not be available. You need to specify your domain in the configuration file `config/platform.php` or `.env` file. It allows you to make the admin panel available on another domain or subdomain, such as `platform.example.com`.
 
 
## Publishing resources

By default, static files (css / js) are delivered via app routes. It is the best balance between configuration and change tracking, but you can specify web servers for distribution. To do this, you need to run a command that creates a symbolic link in the public directory. **Please only use it if your web server is having problems**:


```php
php artisan orchid:link
```
 
> **Problems encountered during installation?** It is possible that someone already had this problem https://github.com/orchidsoftware/platform/issues. If not, you can send a message or ask for [help](https://github.com/orchidsoftware/platform/issues/new).


## Updating

While in the project directory, use `Composer` to update the package:

```php
composer update orchid/platform --with-dependencies
```

> **Note.** You can also update all your dependencies listed in the `composer.json` file by running `composer update`.

## What to do next?

Now you can try the step-by-step example of working with the package on the [“Quick Start” page](/en/docs/quickstart) or read the [documentation](/en/docs/screens).

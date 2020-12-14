# LaravelAjax

[![Build Status](https://travis-ci.org/Tony133/LaravelAjax.svg?branch=master)](https://travis-ci.org/Tony133/LaravelAjax)

Simple example Ajax with Laravel 5.8 and jQuery 3.x

## Install with Composer

```
    $ curl -s http://getcomposer.org/installer | php
    $ php composer.phar install or composer install
```

## Configures database and start seed

```
    $ php artisan migrate
    $ php artisan db:seed
```

```php

    public function addPost(Request $request)
    {
        $post = new Post();
        $post->title = $request->title;
        $post->author = $request->author;
        $post->description = $request->description;

        $post->save();

        return response()->json($post);
    }

```
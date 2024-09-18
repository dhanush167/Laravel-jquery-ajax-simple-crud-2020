# LaravelAjax

![Project Complete](https://img.shields.io/badge/Status-Project%20Complete-brightgreen)


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

![ajaxcrud](https://user-images.githubusercontent.com/37043938/102091020-3acace80-3e44-11eb-90fd-9a8b330a5a22.gif)

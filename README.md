# Glide universal module

This package integrates Glide in any [container-interop](https://github.com/container-interop/service-provider) compatible framework/container.

## Installation

```
composer require mnapoli/glide-module
```

Once installed, you need to register the [`GlideModule\GlideServiceProvider`](src/GlideDefinitionProvider.php) into your container.

Refer to your framework or container's documentation to learn how to register *service providers*.

## Usage

This module registers the Glide server under the `League\Glide\Server` key in your service container. You can now inject it in your services. Have a look at [the official documentation](http://glide.thephpleague.com/1.0/simple-example/) to know how to use the server.

Since **Glide's server requires the `source` and `cache` options to be configured**, you must define a `glide.options` entry in your container. That entry should be an array containing Glide options.

Here is an example using [PHP-DI](http://php-di.org/)'s syntax:

```php
return [
    'glide.options' => [
        'source' => 'path/to/source/folder',
        'cache' => 'path/to/cache/folder',
    ]
];
```

Here is the same example using [Pimple](http://pimple.sensiolabs.org/):

```php
$pimple['glide.options'] = [
    'source' => 'path/to/source/folder',
    'cache' => 'path/to/cache/folder',
];
```

### Returning a response

This module automatically configures Glide to generate PSR-7 responses. To use it in a controller, simply inject the `League\Glide\Server` object and use it like this:

```php
// This returns a PSR-7 response
return $server->getImageResponse($filename, $options);
```

### Advanced options

The `glide.options` array is passed straight to Glide's `ServerFactory`. Have a look at [the official documentation about configuration](http://glide.thephpleague.com/0.3/config/the-server/) to learn about all the options you can use.

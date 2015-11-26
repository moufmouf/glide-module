# Glide universal module

This package integrates Glide in any [definition-interop](https://github.com/container-interop/definition-interop) compatible framework/container.

## Installation

```
composer require mnapoli/glide-module
```

Once installed, you need to register the [definition provider](src/GlideDefinitionProvider.php) into your container:

```php
$definitionProvider = new \GlideModule\GlideDefinitionProvider();

// register $definitionProvider
```

## Usage

This module registers the Glide server (`League\Glide\Server`) under the `glide` key in your service container. You can now inject it in your services. Have a look at [the official documentation](http://glide.thephpleague.com/0.3/simple-example/) to know how to use the server.

## Configuration

You can configure the server by defining a `glide.options` container entry:

```php
return [
    'source' => 'path/to/source/folder',
    'cache' => 'path/to/cache/folder',
];
```

All the options are passed straight to Glide's `ServerFactory`. Have a look at [the official documentation about configuration](http://glide.thephpleague.com/0.3/config/the-server/) to learn about all the options you can use.

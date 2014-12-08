openclerk/config
============

A library for configuration management in Openclerk.

## Installing

Include `openclerk/config` as a requirement in your project `composer.json`,
and run `composer update` to install it into your project:

```json
{
  "require": {
    "openclerk/config": "dev-master"
  },
  "repositories": [{
    "type": "vcs",
    "url": "https://github.com/openclerk/config"
  }]
}
```

## Using

Initialise configuration before use:

```php
Openclerk\Config::merge(array(
  "database_name" => "clerk",
  "database_username" => "username",
  "database_password" => "password",
  // any other values here
));
```

You can now load configuration values at runtime:

```php
echo Openclerk\Config::get("my_key", "default");
```

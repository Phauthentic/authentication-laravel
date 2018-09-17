# Laravel / Eloquent Authentication Bridge

[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](LICENSE)
[![Scrutinizer Coverage](https://img.shields.io/scrutinizer/coverage/g/Phauthentic/authentication-laravel/master.svg?style=flat-square)](https://scrutinizer-ci.com/g/Phauthentic/authentication-laravel/)
[![Code Quality](https://img.shields.io/scrutinizer/g/Phauthentic/authentication-laravel/master.svg?style=flat-square)](https://scrutinizer-ci.com/g/Phauthentic/authentication-laravel/)

This package will allow you to lookup user credentials with your Laravel application or your application using the Eloquent ORM and the [Phautentic Authentication](https://github.com/Phauthentic/authentication) library.

## How to use it

All you need to do is to instantiate a model object and pass it to the resolver.

```php
use Authentication\Identifier\Resolver\EloquentResolver;
use App\Model\UserModel;

$resolver = new EloquentResolver(new UserModel());
```

For further information on how to configure identifiers and resolvers please check the documentation of [Phautentic Authentication](https://github.com/Phauthentic/authentication). 

## Copyright & License

Licensed under the [MIT license](LICENSE.txt).

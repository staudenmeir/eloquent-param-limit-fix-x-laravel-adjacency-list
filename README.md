# Eloquent Param Limit Fix + Laravel Adjacency List

[![CI](https://github.com/staudenmeir/eloquent-param-limit-fix-x-laravel-adjacency-list/actions/workflows/ci.yml/badge.svg)](https://github.com/staudenmeir/eloquent-param-limit-fix-x-laravel-adjacency-list/actions/workflows/ci.yml)
[![Code Coverage](https://codecov.io/gh/staudenmeir/eloquent-param-limit-fix-x-laravel-adjacency-list/graph/badge.svg?token=LMK5FKOMBU)](https://codecov.io/gh/staudenmeir/eloquent-param-limit-fix-x-laravel-adjacency-list)
[![Latest Stable Version](https://poser.pugx.org/staudenmeir/eloquent-param-limit-fix-x-laravel-adjacency-list/v/stable)](https://packagist.org/packages/staudenmeir/eloquent-param-limit-fix-x-laravel-adjacency-list)
[![Total Downloads](https://poser.pugx.org/staudenmeir/eloquent-param-limit-fix-x-laravel-adjacency-list/downloads)](https://packagist.org/packages/staudenmeir/eloquent-param-limit-fix-x-laravel-adjacency-list/stats)
[![License](https://poser.pugx.org/staudenmeir/eloquent-param-limit-fix-x-laravel-adjacency-list/license)](https://github.com/staudenmeir/eloquent-param-limit-fix-x-laravel-adjacency-list/blob/main/LICENSE)

This Laravel package merges [staudenmeir/eloquent-param-limit-fix](https://github.com/staudenmeir/eloquent-param-limit-fix)
and [staudenmeir/laravel-adjacency-list](https://github.com/staudenmeir/laravel-adjacency-list) to allow them being used
in the same model.

Supports Laravel 9.0+.

## Installation

    composer require staudenmeir/eloquent-param-limit-fix-x-laravel-adjacency-list:"^1.0"

Use this command if you are in PowerShell on Windows (e.g. in VS Code):

    composer require staudenmeir/eloquent-param-limit-fix-x-laravel-adjacency-list:"^^^^1.0"

## Versions

| Laravel | Package |
|:--------|:--------|
| 11.x    | 1.2     |
| 10.x    | 1.1     |
| 9.x     | 1.0     |

## Usage

Use the `HasParamLimitFixAndRecursiveRelationships` trait in your model:

```php
class User extends Model
{
    use \Staudenmeir\EloquentParamLimitFixXLaravelAdjacencyList\Eloquent\HasParamLimitFixAndRecursiveRelationships;
}
```

## Contributing

Please see [CONTRIBUTING](.github/CONTRIBUTING.md) and [CODE OF CONDUCT](.github/CODE_OF_CONDUCT.md) for details.

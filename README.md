# Composer project template

Template repo for WordPress theme using: `jascha030/wp-sequoia`, `jascha030/wp-plugin-lib`, `jascha030/config-lib`, Webpack, PostCSS and Tailwind.

## Getting started

## Prerequisites

* Php `^7.4 || ^8.0`
* Composer `^2`

### Installation

```shell
composer require jascha030/wp-sequoia-theme
```

#### Distribution

Alternative steps for distribution.

```shell
composer require --no-dev jascha030/wp-sequoia-theme
```

## Usage

(Todo)

### Testing

Included with the package are a set of Unit tests using `phpunit/phpunit`. For ease of use a composer script command is
defined to run the tests.

```shell
composer run phpunit
```

A code coverage report is generated in the project's root as `cov.xml`. The `cov.xml` file is not ignored in the
`.gitignore` by default.

### Code style & Formatting

A code style configuration for `friendsofphp/php-cs-fixer` is included, defined in `.php-cs-fixer.dist.php`.

To use php-cs-fixer without having it necessarily installed globally, a composer script command is also included to
format php code using the provided config file and the vendor binary of php-cs-fixer.

```shell
composer run format
```

## License

This composer package is an open-sourced software licensed under
the [MIT License](https://github.com/jascha030/wp-sequoia-theme/blob/master/LICENSE.md)

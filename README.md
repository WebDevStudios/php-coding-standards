<a href="https://webdevstudios.com/contact/"><img src="https://webdevstudios.com/wp-content/uploads/2018/04/wds-github-banner.png" alt="WebDevStudios. WordPress for big brands."></a>

# WebDevStudios PHP Coding Standards

## How to Install

To install in your project, use:

```bash
composer config minimum-stability beta
composer require webdevstudios/php-coding-standards:1.0.0-beta2
```

Then add a `.phpcs.xml.dist` file to your project with:

```xml
<?xml version="1.0"?>
<ruleset name="Project">
    <rule ref="WebDevStudios"/>
</ruleset>
```

`composer` will automatically install `WebDevStudios` standard for `vendor/bin/phpcs`.

### CLI Usage

You may also use this from the command line, e.g.:

```bash
./vendor/bin/phpcs --standard=WebDevStudios path/to/file.php
```

___________________

# Changelog

## 1.0.0-beta2

- Setup to publish package on packagist.org

## 1.0.0-beta1

- No changes, this feels useable at a project level, having tested it in various projects myself and is ready for testing

## 1.0.0-alpha1

- Initial fork of _just_ the PHP coding standards from [WDS-Coding-Standards](https://github.com/WebDevStudios/WDS-Coding-Standards)
- Automatically updates `phpcs`'s `installed_paths` with correct configuration
- No longer installs JS or CSS/SASS standards, please see [](upgrade guide) on installing CSS, SASS, and JavaScript coding standards with `npm`
- Installable at a project level

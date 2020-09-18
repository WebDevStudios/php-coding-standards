<a href="https://webdevstudios.com/contact/"><img src="https://webdevstudios.com/wp-content/uploads/2018/04/wds-github-banner.png" alt="WebDevStudios. WordPress for big brands."></a>

# WebDevStudios PHP Coding Standards

## How to Install

To install in your project, use:

```bash
composer require webdevstudios/php-coding-standards --dev
```

Then add a `.phpcs.xml.dist` file to your project:

```xml
<?xml version="1.0"?>
<ruleset name="Project">
    <rule ref="WebDevStudios"/>
</ruleset>
```

To do this quickly, run:

```bash
echo '<?xml version="1.0"?><ruleset name="Project"><rule ref="WebDevStudios"/></ruleset>' > .phpcs.xml.dist
```

Installation will automatically install `WebDevStudios` standard for `vendor/bin/phpcs`.

## CLI Linting

### Lint a single file

```bash
./vendor/bin/phpcs --standard=WebDevStudios path/to/file.php
```

### Lint multiple files

```bash
./vendor/bin/phpcs --standard=WebDevStudios --extensions=php /path/to/dir
```

## Editor Linting

In your favorite editor install it's `phpcs` package and it will automatically detect your `phpcs.xml.dist` file and lint any PHP file you have open. _You may need to re-configure your settings if you are moving from WDS-Coding-Standards._

___________________

# Changelog

## Unreleased

- Update `wp-coding-standards/wpcs` to `>=2.3.0<3.0.0` to get `php-coding-standards` up to date with WP <sup>[PR](https://github.com/WebDevStudios/php-coding-standards/pull/38)</sup>

## 1.1.0

- Update `wp-coding-standards/wpcs` to `2.1.1` <sup>[Release Notes](https://github.com/WordPress/WordPress-Coding-Standards/releases/tag/2.1.1)</sup>

## 1.0.0

- Update installation method
- Updated on packagist.org

## 1.0.0-beta2

- Setup to publish package on packagist.org
- Updates to version constraints to allow bug fix updates
- Updates to README

_Note, not compatible with globally installed [WDS Coding Standards](https://github.com/WebDevStudios/WDS-Coding-Standards)._

## 1.0.0-beta1

- No changes, this feels useable at a project level, having tested it in various projects myself and is ready for testing

## 1.0.0-alpha1

- Initial fork of _just_ the PHP coding standards from [WDS-Coding-Standards](https://github.com/WebDevStudios/WDS-Coding-Standards)
- Automatically updates `phpcs`'s `installed_paths` with correct configuration
- No longer installs JS or CSS/SASS standards, please see [](upgrade guide) on installing CSS, SASS, and JavaScript coding standards with `npm`
- Installable at a project level

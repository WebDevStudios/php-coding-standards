<a href="https://webdevstudios.com/contact/"><img src="https://webdevstudios.com/wp-content/uploads/2018/04/wds-github-banner.png" alt="WebDevStudios. WordPress for big brands."></a>

# WebDevStudios PHP Coding Standards

PHP coding standards for WebDevStudios projects.

## Leadership

- [Aubrey Portwood](https://github.com/aubreypwd) - Project Lead
- [Greg Rickaby](https://github.com/gregrickaby) - Director of Engineering

## How to Install

To install in your project, use the following commands:

```bash
composer require webdevstudios/php-coding-standards:1.0.0-beta1
```

Then add a `.phpcs.xml` file to your project with the following:

```xml
<?xml version="1.0"?>
<ruleset name="Project">
    <rule ref="WebDevStudios"/>
</ruleset>
```

If you have issues, please make sure your editor is properly configured to detect `.phpcs.xml` and that it's using the `phpcs` in the `vendor/bin` directory. Also, this is not always compatible with legacy [WDS-Coding-Standards](https://github.com/WebDevStudios/WDS-Coding-Standards).

### CLI Usage

You may also use this from the command line, e.g.:

```bash
./vendor/bin/phpcs path/to/file.php
```

`composer` will automatically install WebDevStudios standard for `vendor/bin/phpcs`.

___________________

# Changelog

## 1.0.0-beta1

No changes.

This feels useable at a project level, having tested it in various projects myself and is ready for testing.

## 1.0.0-alpha1

- Initial fork of _just_ the PHP coding standards from [WDS-Coding-Standards](https://github.com/WebDevStudios/WDS-Coding-Standards)
- Automatically updates `phpcs`'s `installed_paths` with correct configuration
- No longer installs JS or CSS/SASS standards, please see [](upgrade guide) on installing CSS, SASS, and JavaScript coding standards with `npm`
- Installable at a project level

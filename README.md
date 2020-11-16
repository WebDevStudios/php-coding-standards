<a href="https://webdevstudios.com/contact/"><img src="https://webdevstudios.com/wp-content/uploads/2018/04/wds-github-banner.png" alt="WebDevStudios. WordPress for big brands."></a>

# WebDevStudios PHP Coding Standards

## How to Install

To install in your project, use:

```bash
composer require webdevstudios/php-coding-standards:~1.3.0 --dev
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

[See Releases on Github](https://github.com/WebDevStudios/php-coding-standards/releases)

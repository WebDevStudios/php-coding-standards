# WebDevStudios Coding Standards

WebDevStudios in-house linting and coding standards for your favorite editor.

<a href="https://webdevstudios.com/contact/"><img src="https://webdevstudios.com/wp-content/uploads/2018/04/wds-github-banner.png" alt="WebDevStudios. WordPress for big brands."></a>

## Leadership

- __Aubrey Portwood (Senior BED Developer)__
    + Writes & Integrates Coding Standards/Maintains Standards
- __Greg Rickaby (Director of Engineering)__
    + High level Approval / Leadership

## How to install

### In your project

`composer install webdevstudios/php-coding-standards`

### Globally

`composer global install webdevstudios/php-coding-standards`

__________________

# TODO

- [ ] Create upgrade guide and note in changelog

___________________

# Changelog

## NEXT

- Automatically updates `phpcs`'s `installed_paths` with correct configuration
- No longer installs JS or CSS/SASS standards, please see [](upgrade guide) on installing CSS, SASS, and JavaScript coding standards with `npm`

## 2.0.1

- Fixes issue where `getFilename` error happening in latest `eslint` <sup>[PR](https://github.com/WebDevStudios/WDS-Coding-Standards/pull/74)</sup>

## 2.0.0

PHPCS Upgrade Guide: https://github.com/squizlabs/PHP_CodeSniffer/wiki/Version-3.0-Upgrade-Guide

This release updates to the new WPCS `^2.x`. 

- Reworked all our custom sniffs to use new `PHP_CodeSniffer` structure <sup>[a210b73](https://github.com/WebDevStudios/WDS-Coding-Standards/commit/a210b73cd46ce76d4cfbd8eea578d4b4c3d7eab3)</sup>

## 1.2.0

- WordPress Coding Standards update to `1.2.1`
- PHPCS 3.3.2 installed via composer
- Docblocks are required on function assignments in JS (see release notes)
- `@author` is suggested in docblocks in both PHP & JS (see release notes)
- Documented `@return` on abstract methods will no longer show a warning about missing `@return`

### Release Notes

This installation requires you to do an additional step to get `eslint` to work:

```bash
npm install -g "/path/to/WebDevStudios/eslint-plugin-webdevstudios"
```

This will install the additional ES Lint rules we've added via `eslint-plugin-webdevstudios/*` which are now going to be required to have custom ES Lint rules.

## 1.1.1

- WDSCS now requires WPCS 0.14.1 #34; props @jrfoell
- `@since` is now a warning #39
- `@since` will not show a warning for files in `wp-content/themes/**` #39

## 1.1.0

- `@return` and `@since` rules are in place [#27](https://github.com/WebDevStudios/WDS-Coding-Standards/pull/27)
- Find VIM PHPCS configuration [here](https://github.com/WebDevStudios/WDS-Coding-Standards/wiki/Installation:-PHPCS-(PHP-Linting)#editor-configuration-vim) [#28](https://github.com/WebDevStudios/WDS-Coding-Standards/pull/28)
- Brings over eslint rules from wd_s and improves them to be more like old jshint rules from WordPress.org coding standards [#10](https://github.com/WebDevStudios/WDS-Coding-Standards/issues/10) [#22](https://github.com/WebDevStudios/WDS-Coding-Standards/pull/22)
- How to vote is clearer in [CONTRIBUTING.md](CONTRIBUTING.md) [#32](https://github.com/WebDevStudios/WDS-Coding-Standards/pull/32)
- Sass linting added [#26](https://github.com/WebDevStudios/WDS-Coding-Standards/pull/26)

This release brings most of WDS up to par with our currently-established coding standards, of which have been missing from our linting thus-far. Props for this release go to [@aubreypwd](http://github.com/aubreypwd), [@gregrickaby](https://github.com/gregrickaby), [@JayWood](https://github.com/JayWood), [@jrfoell](https://github.com/jrfoell), and [@phatsk](https://github.com/phatsk) for all their helpful work!

## 1.0.1

- Changed `WebDevStudios-phpcs` to just `WebDevStudios` for compatibility with namespaces and new sniffs added later [#12](https://github.com/WebDevStudios/WDS-Coding-Standards/pull/12)
- Inclusion of the `WordPress-Docs` ruleset

Note, this release breaks some things. When you update to this version,
you will need to update your coding standard to `WebDevStudios` vs the old
`WebDevStudios-phpcs` which should no longer work.

## 1.0.0

- Initial ruleset based on WordPress-Extra

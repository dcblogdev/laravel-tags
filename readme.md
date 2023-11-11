# Laravel Tags

Explain what the package does.

## Installation

You can install the package via composer:

```bash
composer require dcblogdev/laravel-tags
```

## Usage

The following tags are available:

[year] = will be replaced with the current year
[appName] = will be replaced with the app name from the config file
[youtube url width=560 height=360] = will return a YouTube embed code. Width and height are option by default they are 560 and 360

Import the facade

```php
use Dcblogdev\Tags\Facades\Tags;
```

Example usage:

```php
$content = "This is a post about [year] and [appName]";
$content = Tags::get($content);

echo $content
```

Would print
> This is a post about 2023 and Laravel

## Change log

Please see the [changelog][3] for more information on what has changed recently.

## Contributing

Contributions are welcome and will be fully credited.

Contributions are accepted via Pull Requests on [Github][4].

## Pull Requests

- **Document any change in behaviour** - Make sure the `readme.md` and any other relevant documentation are kept up-to-date.

- **Consider our release cycle** - We try to follow [SemVer v2.0.0][5]. Randomly breaking public APIs is not an option.

- **One pull request per feature** - If you want to do more than one thing, send multiple pull requests.

## Security

If you discover any security related issues, please email dave@dcblog.dev email instead of using the issue tracker.

## License

license. Please see the [license file][6] for more information.

[3]:    changelog.md
[4]:    https://github.com/dcblogdev/laravel-tags
[5]:    http://semver.org/
[6]:    license.md

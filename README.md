# HTML Formatter

HTML Formatter re-indents HTML. This is not clean or safe at the moment, but I couldn't find anything else on Packagist that does the job.

Everyone makes sure to stick to standards when it comes to his/her code (or at least I hope they do), but *99% of the HTML on the web looks completely messed up*.

This is far from perfect, but if speed does not matter (this implementation is slooow, it was the quickest and dirties solution that came to my mind), because the HTML is cached or something, then this will do.

## Installation

If you still don't use Composer, get started here: [Composer - Getting Started](http://getcomposer.org/doc/00-intro.md)

```bash
# assuming you chose to install Composer globally
$ composer require mihaeu/html-formatter:*
```

## Usage

```php
<?php

require __DIR__.'/vendor/autoload.php';

echo Mihaeu\HtmlFormatter::format('<h1>Hello World</h1><p>Test</p>');
```

Which should produce something along the lines of:

```
<h1>
	Hello World
</h1>
<p>
	Test
</p>
```
# SVGTinyPS
[![Latest Stable Version](http://poser.pugx.org/srwiez/php-svg-ps-converter/v)](https://packagist.org/packages/srwiez/php-svg-ps-converter) [![Total Downloads](http://poser.pugx.org/srwiez/php-svg-ps-converter/downloads)](https://packagist.org/packages/srwiez/php-svg-ps-converter) [![Latest Unstable Version](http://poser.pugx.org/srwiez/php-svg-ps-converter/v/unstable)](https://packagist.org/packages/srwiez/php-svg-ps-converter) [![License](http://poser.pugx.org/srwiez/php-svg-ps-converter/license)](https://packagist.org/packages/srwiez/php-svg-ps-converter) [![PHP Version Require](http://poser.pugx.org/srwiez/php-svg-ps-converter/require/php)](https://packagist.org/packages/srwiez/php-svg-ps-converter)
[![Tests](https://github.com/SRWieZ/php-svg-ps-converter/actions/workflows/test.yml/badge.svg)](https://github.com/SRWieZ/php-svg-ps-converter/actions/workflows/tests.yml)

SVG (Portable and Secure) converter for BIMI compliance.

[Read more from bimi group](https://bimigroup.org/creating-bimi-svg-logo-files/)
and [the RFC](https://datatracker.ietf.org/doc/id/draft-svg-tiny-ps-abrotman-00.txt)

🧪 If you just want to convert your SVG, you can use the
[online version of the converter!](https://checkbimi.com/convertsvg)

## Installation

```bash
composer require srwiez/php-svg-ps-converter
```

## Usage

Example of usage:

```php
// Identify issues and convert the SVG
$svg_converter = new SVGTinyPS(getSVGContent($svg_content));
$issues = $svg_converter->identifyIssues();
$svg_fixed= $svg_converter->convert();

// Some issues cannot be fixed automatically,
// you can get them by rerunning identifyIssues()
//
// Namely, the issues that cannot be fixed are:
// - The SVG contains an image
// - The SVG contains is not square
$svg_converter = new SVGTinyPS(getSVGContent($svg_fixed));
$issues_cannot_be_fixed = $svg_converter->identifyIssues();
```


## Credits

SVGTinyPS was created by Eser DENIZ.

Inspired by the official scripts
of [authindicators/svg-ps-converters](https://github.com/authindicators/svg-ps-converters)

Thanks to [gilbarbara/logos](https://github.com/gilbarbara/logos) for the logos that I used in the tests.

## License

SVGTinyPS PHP is licensed under the MIT License. See LICENSE for more information.
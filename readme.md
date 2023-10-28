# SVGTinyPS

[![Tests](https://github.com/SRWieZ/php-svg-ps-converter/actions/workflows/test.yml/badge.svg)](https://github.com/SRWieZ/php-svg-ps-converter/actions/workflows/tests.yml)
[![Latest Stable Version](https://poser.pugx.org/SRWieZ/php-svg-ps-converter/v/stable)](https://packagist.org/packages/SRWieZ/php-svg-ps-converter)

SVG (Portable and Secure) converter for BIMI compliance.

[Read more from bimi group](https://bimigroup.org/implementation-guide/)
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

## Roadmap
1. Check the size is under 32 kilobytes
2. Return a minimized version of the SVG

## Credits

SVGTinyPS was created by Eser DENIZ.

Inspired by the official scripts
of [authindicators/svg-ps-converters](https://github.com/authindicators/svg-ps-converters)

Thanks to [gilbarbara/logos](https://github.com/gilbarbara/logos) for the logos that I used in the tests.

## License

SVGTinyPS PHP is licensed under the MIT License. See LICENSE for more information.
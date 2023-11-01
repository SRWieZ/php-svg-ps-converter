# SVGTinyPS
[![Latest Stable Version](http://poser.pugx.org/srwiez/php-svg-ps-converter/v)](https://packagist.org/packages/srwiez/php-svg-ps-converter) [![Total Downloads](http://poser.pugx.org/srwiez/php-svg-ps-converter/downloads)](https://packagist.org/packages/srwiez/php-svg-ps-converter) [![Latest Unstable Version](http://poser.pugx.org/srwiez/php-svg-ps-converter/v/unstable)](https://packagist.org/packages/srwiez/php-svg-ps-converter) [![License](http://poser.pugx.org/srwiez/php-svg-ps-converter/license)](https://packagist.org/packages/srwiez/php-svg-ps-converter) [![PHP Version Require](http://poser.pugx.org/srwiez/php-svg-ps-converter/require/php)](https://packagist.org/packages/srwiez/php-svg-ps-converter)
![GitHub Workflow Status (with event)](https://img.shields.io/github/actions/workflow/status/SRWieZ/php-svg-ps-converter/test.yml?label=Tests)


SVG (Portable and Secure) converter for BIMI compliance.

[Read more from bimi group](https://bimigroup.org/creating-bimi-svg-logo-files/)
and [the RFC](https://datatracker.ietf.org/doc/id/draft-svg-tiny-ps-abrotman-00.txt)

🧪 If you just want to convert your SVG in a nice ui, you can use the
[online version of the converter!](https://checkbimi.com/convertsvg)

You can also checkout the [command line version](https://github.com/SRWieZ/svgps-commandline) of this project.

## Installation

```bash
composer require srwiez/php-svg-ps-converter
```

## Usage

Example of identifying issues and converting the SVG:
```php
$svg_converter = new SVGTinyPS(getSVGContent($svg_content));
$issues = $svg_converter->identifyIssues();
$svg_fixed= $svg_converter->convert();
```

Some issues cannot be fixed automatically, you can get them by rerunning identifyIssues()

Namely, the issues that cannot be fixed are:
- The SVG contains an image
- The SVG is not square
- The SVG size > 32kb
```php

$svg_converter = new SVGTinyPS(getSVGContent($svg_fixed));
$issues_cannot_be_fixed = $svg_converter->identifyIssues();
```


## Credits

SVGTinyPS was created by Eser DENIZ.

Inspired by the official scripts
of [authindicators/svg-ps-converters](https://github.com/authindicators/svg-ps-converters)

Thanks to [gilbarbara/logos](https://github.com/gilbarbara/logos) for the logos used in the tests.

## License

SVGTinyPS PHP is licensed under the MIT License. See LICENSE for more information.
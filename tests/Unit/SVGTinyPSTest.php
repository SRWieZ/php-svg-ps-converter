<?php

use SVGTinyPS\SVGTinyPS;

it('does not return a warning if the viewbox is malformed', function () {
    $svg = '<?xml version="1.0" encoding="UTF-8" standalone="no"?>
<svg viewBox="0, 0,400," version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" preserveAspectRatio="xMidYMid">
</svg>';
    $svgConverter = new SVGTinyPS($svg);
    expect($svgConverter->calculateSvgAspectRatio())
        ->not->toThrow(Exception::class);
});

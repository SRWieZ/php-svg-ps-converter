<?php

use SVGTinyPS\SVGTinyPS;

it('returns false is SVG is not square', function ($svg) {
    $svgConverter = new SVGTinyPS($svg);
    $this->assertFalse($svgConverter->isSvgSquare());
})->with('rectangular_svg');

it('returns true is SVG is a square', function ($svg) {
    $svgConverter = new SVGTinyPS($svg);
    $this->assertTrue($svgConverter->isSvgSquare());
})->with('square_svg');

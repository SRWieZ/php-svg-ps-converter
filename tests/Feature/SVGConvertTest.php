<?php

use SVGTinyPS\SVGTinyPS;

test('it fixes all the issues we can fix', function ($svg) {
    $svg_converter = new SVGTinyPS(getSVGContent($svg));
    $svg_converter->identifyIssues();
    $new_svg = $svg_converter->convert();

    $svg_converter = new SVGTinyPS($new_svg);
    $this->issues_after = $svg_converter->identifyIssues();

    // Ignore issues we can't really fix
    $this->issues_after = array_diff($this->issues_after, [
        'Logo is larger than 32KB',
        'Element <image> is not allowed',
        'SVG is not square',
    ]);

    expect($this->issues_after)->toBeEmpty();
})->with('logos');

// After each test, dump the issues if the test failed
afterEach(function () {
    if ($this->status()->isFailure()) {
        dump($this->issues_after);
    }
});

<?php

use SVGTinyPS\SVGTinyPS;

test('it returns issues', function ($svg, $issues_excepted) {

    $svgConverter = new SVGTinyPS(getSVGContent($svg));
    $issues = $svgConverter->identifyIssues();

    // Useful when you want to update the dataset
    // var_export(array_values(array_unique($issues)));

    $diff = array_diff(array_unique($issues), array_unique($issues_excepted));
    $diff2 = array_diff(array_unique($issues), array_unique($issues_excepted));

    expect($diff)->toBeEmpty()
        ->and($diff2)->toBeEmpty();
})->with('logos');

<?php

use SVGTinyPS\SVGTinyPS;

test('it returns issues', function ($svg, $issues_excepted) {

    $svgConverter = new SVGTinyPS(getSVGContent($svg));
    $issues = $svgConverter->identifyIssues();

    // Usefull when you want to update the dataset
    // var_export(array_values(array_unique($issues)));

    foreach ($issues_excepted as $issue) {
        expect($issues)->toContain($issue);
    }
})->with('logos');

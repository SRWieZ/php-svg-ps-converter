<?php

dataset('rectangular_svg', [
    'rectangular viewBox' => <<<'SVG'
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 200 100" width="100" height="100">
        </svg>
        SVG,
    'rectangular viewBox and wh' => <<<'SVG'
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 200 100" width="200" height="100">
        </svg>
        SVG,
    'rectangular viewBox but not wh' => <<<'SVG'
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 200 100">
        </svg>
        SVG,
    'rectangular wh' => <<<'SVG'
        <svg xmlns="http://www.w3.org/2000/svg" width="200" height="100">
        </svg>
        SVG,
]);

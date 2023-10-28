<?php

dataset('square_svg', [
    'square viewBox' => <<<'SVG'
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100">
        </svg>
        SVG,
    'square viewBox and wh' => <<<'SVG'
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" width="100" height="100">
        </svg>
        SVG,
    'square viewBox but not wh' => <<<'SVG'
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" width="200" height="100">
        </svg>
        SVG,
    'square wh' => <<<'SVG'
        <svg xmlns="http://www.w3.org/2000/svg" width="100" height="100">
        </svg>
        SVG,
]);

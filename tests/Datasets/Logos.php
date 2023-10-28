<?php

dataset('logos', [
    'twitter' => [
        'logo' => 'twitter.svg',
        'issues_excepted' => [
            'Missing <title> element',
            'Incorrect version or baseProfile attributes',
            'SVG is not square',
        ],
    ],
    'corrupt svg' => [
        'logo' => 'corruptsvg.svg',
        'issues_excepted' => [
            'Missing <title> element',
            'Incorrect version or baseProfile attributes',
            'Element <script> is not allowed',
            'SVG is not square',
        ],
    ],
    'waffle image' => [
        'logo' => 'waffle-icon.svg',
        'issues_excepted' => [
            'Incorrect version or baseProfile attributes',
            'Element <image> is not allowed',
            'Element <stop> is not allowed',
            'Element <pattern> is not allowed',
            'Element <use> has a disallowed attribute: xlink:href',
            'Element <mask> is not allowed',
            'Element <g> has a disallowed attribute: mask',
            'SVG is not square',
        ],
    ],
    'microsoft edge' => [
        'logo' => 'microsoft-edge.svg',
        'issues_excepted' => [
            'Missing <title> element',
            'Incorrect version or baseProfile attributes',
            'Element <linearGradient> has a disallowed attribute: gradientTransform',
            'Element <stop> is not allowed',
            'Element <radialGradient> has a disallowed attribute: gradientTransform',
            'Element <path> has a disallowed attribute: opacity',
            'Element <path> has a disallowed attribute: enable-background',
        ],
    ],
    'php' => [
        'logo' => 'php-alt.svg',
        'issues_excepted' => [
            'The <title> element is not the first child of the <svg> element',
            'Incorrect version or baseProfile attributes',
            'SVG is not square',
        ],
    ],
]);

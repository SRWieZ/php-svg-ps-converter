<?php

namespace SVGTinyPS;

use DOMDocument;
use DOMException;
use DOMNode;
use Exception;

class SVGTinyPS
{
    public const ALLOWED_ELEMENTS_NAME = [
        'circle', 'defs', 'desc', 'ellipse', 'g', 'line', 'linearGradient', 'path', 'polygon', 'polyline',
        'radialGradient', 'rect', 'solidColor', 'svg', 'text', 'textArea', 'title', 'use',
    ];

    public const SVG_ALLOWED_ATTRIBUTES = [
        'about', 'baseProfile', 'class', 'color', 'color-rendering', 'content', 'contentScriptType', 'datatype',
        'direction', 'display-align', 'externalResourcesRequired', 'fill', 'fill-opacity', 'fill-rule', 'focusable',
        'font-family', 'font-size', 'font-style', 'font-variant', 'font-weight', 'height', 'line-increment',
        'playbackOrder', 'preserveAspectRatio', 'property', 'rel', 'resource', 'rev', 'role', 'snapshotTime',
        'solid-color', 'solid-opacity', 'stop-color', 'stop-opacity', 'stroke', 'stroke-dasharray', 'stroke-dashoffset',
        'stroke-linecap', 'stroke-linejoin', 'stroke-miterlimit', 'stroke-opacity', 'stroke-width', 'text-align',
        'text-anchor', 'timelineBegin', 'typeof', 'unicode-bidi', 'vector-effect', 'version', 'viewBox', 'width',
        'xml:base', 'xml:lang', 'xml:space', 'zoomAndPan',
    ];

    public const DESC_ALLOWED_ATTRIBUTES = [
        'about', 'buffered-rendering', 'class', 'content', 'datatype', 'display', 'id', 'image-rendering', 'property',
        'rel', 'requiredFonts', 'resource', 'rev', 'role', 'shape-rendering', 'systemLanguage', 'text-rendering',
        'typeof', 'viewport-fill', 'viewport-fill-opacity', 'visibility', 'xml:base', 'xml:id', 'xml:lang', 'xml:space',
    ];

    public const TITLE_ALLOWED_ATTRIBUTES = [
        'about', 'buffered-rendering', 'class', 'content', 'datatype', 'display', 'id', 'image-rendering', 'property',
        'rel', 'requiredFonts', 'resource', 'rev', 'role', 'shape-rendering', 'systemLanguage', 'text-rendering',
        'typeof', 'viewport-fill', 'viewport-fill-opacity', 'visibility', 'xml:base', 'xml:id', 'xml:lang', 'xml:space',
    ];

    public const PATH_ALLOWED_ATTRIBUTES = [
        'about', 'class', 'color', 'color-rendering', 'content', 'd', 'datatype', 'direction', 'display-align', 'fill',
        'fill-opacity', 'fill-rule', 'font-family', 'font-size', 'font-style', 'font-variant', 'font-weight', 'id',
        'line-increment', 'pathLength', 'property', 'rel', 'requiredFonts', 'resource', 'rev', 'role', 'solid-color',
        'solid-opacity', 'stop-color', 'stop-opacity', 'stroke', 'stroke-dasharray', 'stroke-dashoffset',
        'stroke-linecap', 'stroke-linejoin', 'stroke-miterlimit', 'stroke-opacity', 'stroke-width', 'systemLanguage',
        'text-align', 'text-anchor', 'transform', 'typeof', 'unicode-bidi', 'vector-effect', 'xml:base', 'xml:id',
        'xml:lang', 'xml:space',
    ];

    public const RECT_ALLOWED_ATTRIBUTES = [
        'about', 'class', 'color', 'color-rendering', 'content', 'datatype', 'direction', 'display-align', 'fill',
        'fill-opacity', 'fill-rule', 'font-family', 'font-size', 'font-style', 'font-variant', 'font-weight', 'height',
        'id', 'line-increment', 'property', 'rel', 'requiredFonts', 'resource', 'rev', 'role', 'rx', 'ry',
        'solid-color', 'solid-opacity', 'stop-color', 'stop-opacity', 'stroke', 'stroke-dasharray', 'stroke-dashoffset',
        'stroke-linecap', 'stroke-linejoin', 'stroke-miterlimit', 'stroke-opacity', 'stroke-width', 'systemLanguage',
        'text-align', 'text-anchor', 'transform', 'typeof', 'unicode-bidi', 'vector-effect', 'width', 'x', 'xml:base',
        'xml:id', 'xml:lang', 'xml:space', 'y',
    ];

    public const CIRCLE_ALLOWED_ATTRIBUTES = [
        'about', 'class', 'color', 'color-rendering', 'content', 'cx', 'cy', 'datatype', 'direction', 'display-align',
        'fill', 'fill-opacity', 'fill-rule', 'font-family', 'font-size', 'font-style', 'font-variant', 'font-weight',
        'id', 'line-increment', 'property', 'r', 'rel', 'requiredFonts', 'resource', 'rev', 'role', 'solid-color',
        'solid-opacity', 'stop-color', 'stop-opacity', 'stroke', 'stroke-dasharray', 'stroke-dashoffset',
        'stroke-linecap', 'stroke-linejoin', 'stroke-miterlimit', 'stroke-opacity', 'stroke-width', 'systemLanguage',
        'text-align', 'text-anchor', 'transform', 'typeof', 'unicode-bidi', 'vector-effect', 'xml:base', 'xml:id',
        'xml:lang', 'xml:space',
    ];

    public const LINE_ALLOWED_ATTRIBUTES = [
        'about', 'class', 'color', 'color-rendering', 'content', 'datatype', 'direction', 'display-align', 'fill',
        'fill-opacity', 'fill-rule', 'font-family', 'font-size', 'font-style', 'font-variant', 'font-weight', 'id',
        'line-increment', 'property', 'rel', 'requiredFonts', 'resource', 'rev', 'role', 'solid-color', 'solid-opacity',
        'stop-color', 'stop-opacity', 'stroke', 'stroke-dasharray', 'stroke-dashoffset', 'stroke-linecap',
        'stroke-linejoin', 'stroke-miterlimit', 'stroke-opacity', 'stroke-width', 'systemLanguage', 'text-align',
        'text-anchor', 'transform', 'typeof', 'unicode-bidi', 'vector-effect', 'x1', 'x2', 'xml:base', 'xml:id',
        'xml:lang', 'xml:space', 'y1', 'y2',
    ];

    public const ELLIPSE_ALLOWED_ATTRIBUTES = [
        'about', 'class', 'color', 'color-rendering', 'content', 'cx', 'cy', 'datatype', 'direction', 'display-align',
        'fill', 'fill-opacity', 'fill-rule', 'font-family', 'font-size', 'font-style', 'font-variant', 'font-weight',
        'id', 'line-increment', 'property', 'rel', 'requiredFonts', 'resource', 'rev', 'role', 'rx', 'ry',
        'solid-color', 'solid-opacity', 'stop-color', 'stop-opacity', 'stroke', 'stroke-dasharray', 'stroke-dashoffset',
        'stroke-linecap', 'stroke-linejoin', 'stroke-miterlimit', 'stroke-opacity', 'stroke-width', 'systemLanguage',
        'text-align', 'text-anchor', 'transform', 'typeof', 'unicode-bidi', 'vector-effect', 'xml:base', 'xml:id',
        'xml:lang', 'xml:space',
    ];

    public const POLYLINE_ALLOWED_ATTRIBUTES = [
        'about', 'class', 'color', 'color-rendering', 'content', 'datatype', 'direction', 'display-align', 'fill',
        'fill-opacity', 'fill-rule', 'font-family', 'font-size', 'font-style', 'font-variant', 'font-weight', 'id',
        'line-increment', 'points', 'property', 'rel', 'requiredFonts', 'resource', 'rev', 'role', 'solid-color',
        'solid-opacity', 'stop-color', 'stop-opacity', 'stroke', 'stroke-dasharray', 'stroke-dashoffset',
        'stroke-linecap', 'stroke-linejoin', 'stroke-miterlimit', 'stroke-opacity', 'stroke-width', 'systemLanguage',
        'text-align', 'text-anchor', 'transform', 'typeof', 'unicode-bidi', 'vector-effect', 'xml:base', 'xml:id',
        'xml:lang', 'xml:space',
    ];

    public const POLYGON_ALLOWED_ATTRIBUTES = [
        'about', 'class', 'color', 'color-rendering', 'content', 'datatype', 'direction', 'display-align', 'fill',
        'fill-opacity', 'fill-rule', 'font-family', 'font-size', 'font-style', 'font-variant', 'font-weight', 'id',
        'line-increment', 'points', 'property', 'rel', 'requiredFonts', 'resource', 'rev', 'role', 'solid-color',
        'solid-opacity', 'stop-color', 'stop-opacity', 'stroke', 'stroke-dasharray', 'stroke-dashoffset',
        'stroke-linecap', 'stroke-linejoin', 'stroke-miterlimit', 'stroke-opacity', 'stroke-width', 'systemLanguage',
        'text-align', 'text-anchor', 'transform', 'typeof', 'unicode-bidi', 'vector-effect', 'xml:base', 'xml:id',
        'xml:lang', 'xml:space',
    ];

    public const SOLIDCOLOR_ALLOWED_ATTRIBUTES = [
        'about', 'class', 'color', 'color-rendering', 'content', 'datatype', 'direction', 'display-align', 'fill',
        'fill-opacity', 'fill-rule', 'font-family', 'font-size', 'font-style', 'font-variant', 'font-weight', 'id',
        'line-increment', 'property', 'rel', 'resource', 'rev', 'role', 'solid-color', 'solid-opacity', 'stop-color',
        'stop-opacity', 'stroke', 'stroke-dasharray', 'stroke-dashoffset', 'stroke-linecap', 'stroke-linejoin',
        'stroke-miterlimit', 'stroke-opacity', 'stroke-width', 'text-align', 'text-anchor', 'typeof', 'unicode-bidi',
        'vector-effect', 'xml:base', 'xml:id', 'xml:lang', 'xml:space',
    ];

    public const TEXTAREA_ALLOWED_ATTRIBUTES = [
        'about', 'class', 'color', 'color-rendering', 'content', 'datatype', 'direction', 'display-align', 'fill',
        'fill-opacity', 'fill-rule', 'font-family', 'font-size', 'font-style', 'font-variant', 'font-weight', 'height',
        'id', 'line-increment', 'property', 'rel', 'requiredFonts', 'resource', 'rev', 'role', 'solid-color',
        'solid-opacity', 'stop-color', 'stop-opacity', 'stroke', 'stroke-dasharray', 'stroke-dashoffset',
        'stroke-linecap', 'stroke-linejoin', 'stroke-miterlimit', 'stroke-opacity', 'stroke-width', 'systemLanguage',
        'text-align', 'text-anchor', 'transform', 'typeof', 'unicode-bidi', 'vector-effect', 'width', 'x', 'xml:base',
        'xml:id', 'xml:lang', 'xml:space', 'y',
    ];

    public const LINEARGRADIENT_ALLOWED_ATTRIBUTES = [
        'about', 'class', 'color', 'color-rendering', 'content', 'datatype', 'direction', 'display-align', 'fill',
        'fill-opacity', 'fill-rule', 'font-family', 'font-size', 'font-style', 'font-variant', 'font-weight',
        'gradientUnits', 'id', 'line-increment', 'property', 'rel', 'resource', 'rev', 'role', 'solid-color',
        'solid-opacity', 'stop-color', 'stop-opacity', 'stroke', 'stroke-dasharray', 'stroke-dashoffset',
        'stroke-linecap', 'stroke-linejoin', 'stroke-miterlimit', 'stroke-opacity', 'stroke-width', 'text-align',
        'text-anchor', 'typeof', 'unicode-bidi', 'vector-effect', 'x1', 'x2', 'xml:base', 'xml:id', 'xml:lang',
        'xml:space', 'y1', 'y2',
    ];

    public const RADIALGRADIENT_ALLOWED_ATTRIBUTES = [
        'about', 'class', 'color', 'color-rendering', 'content', 'cx', 'cy', 'datatype', 'direction', 'display-align',
        'fill', 'fill-opacity', 'fill-rule', 'font-family', 'font-size', 'font-style', 'font-variant', 'font-weight',
        'gradientUnits', 'id', 'line-increment', 'property', 'r', 'rel', 'resource', 'rev', 'role', 'solid-color',
        'solid-opacity', 'stop-color', 'stop-opacity', 'stroke', 'stroke-dasharray', 'stroke-dashoffset',
        'stroke-linecap', 'stroke-linejoin', 'stroke-miterlimit', 'stroke-opacity', 'stroke-width', 'text-align',
        'text-anchor', 'typeof', 'unicode-bidi', 'vector-effect', 'xml:base', 'xml:id', 'xml:lang', 'xml:space',
    ];

    public const TEXT_ALLOWED_ATTRIBUTES = [
        'about', 'class', 'color', 'color-rendering', 'content', 'datatype', 'direction', 'display-align', 'editable',
        'fill', 'fill-opacity', 'fill-rule', 'font-family', 'font-size', 'font-style', 'font-variant', 'font-weight',
        'id', 'line-increment', 'property', 'rel', 'requiredFonts', 'resource', 'rev', 'role', 'rotate', 'solid-color',
        'solid-opacity', 'stop-color', 'stop-opacity', 'stroke', 'stroke-dasharray', 'stroke-dashoffset',
        'stroke-linecap', 'stroke-linejoin', 'stroke-miterlimit', 'stroke-opacity', 'stroke-width', 'systemLanguage',
        'text-align', 'text-anchor', 'transform', 'typeof', 'unicode-bidi', 'vector-effect', 'x', 'xml:base', 'xml:id',
        'xml:lang', 'xml:space', 'y',
    ];

    public const G_ALLOWED_ATTRIBUTES = [
        'about', 'class', 'color', 'color-rendering', 'content', 'datatype', 'direction', 'display-align', 'fill',
        'fill-opacity', 'fill-rule', 'font-family', 'font-size', 'font-style', 'font-variant', 'font-weight', 'id',
        'line-increment', 'property', 'rel', 'requiredFonts', 'resource', 'rev', 'role', 'solid-color', 'solid-opacity',
        'stop-color', 'stop-opacity', 'stroke', 'stroke-dasharray', 'stroke-dashoffset', 'stroke-linecap',
        'stroke-linejoin', 'stroke-miterlimit', 'stroke-opacity', 'stroke-width', 'systemLanguage', 'text-align',
        'text-anchor', 'transform', 'typeof', 'unicode-bidi', 'vector-effect', 'xml:base', 'xml:id', 'xml:lang',
        'xml:space',
    ];

    public const DEFS_ALLOWED_ATTRIBUTES = [
        'about', 'class', 'color', 'color-rendering', 'content', 'datatype', 'direction', 'display-align', 'fill',
        'fill-opacity', 'fill-rule', 'font-family', 'font-size', 'font-style', 'font-variant', 'font-weight', 'id',
        'line-increment', 'property', 'rel', 'resource', 'rev', 'role', 'solid-color', 'solid-opacity', 'stop-color',
        'stop-opacity', 'stroke', 'stroke-dasharray', 'stroke-dashoffset', 'stroke-linecap', 'stroke-linejoin',
        'stroke-miterlimit', 'stroke-opacity', 'stroke-width', 'text-align', 'text-anchor', 'typeof', 'unicode-bidi',
        'vector-effect', 'xml:base', 'xml:id', 'xml:lang', 'xml:space',
    ];

    public const USE_ALLOWED_ATTRIBUTES = [
        'about', 'class', 'color', 'color-rendering', 'content', 'datatype', 'direction', 'display-align', 'fill',
        'fill-opacity', 'fill-rule', 'font-family', 'font-size', 'font-style', 'font-variant', 'font-weight', 'href',
        'id', 'line-increment', 'property', 'rel', 'requiredFonts', 'resource', 'rev', 'role', 'solid-color',
        'solid-opacity', 'stop-color', 'stop-opacity', 'stroke', 'stroke-dasharray', 'stroke-dashoffset',
        'stroke-linecap', 'stroke-linejoin', 'stroke-miterlimit', 'stroke-opacity', 'stroke-width', 'systemLanguage',
        'text-align', 'text-anchor', 'transform', 'typeof', 'unicode-bidi', 'vector-effect', 'x', 'xml:base', 'xml:id',
        'xml:lang', 'xml:space', 'y',
    ];

    public const ALLOWED_ATTRIBUTES = [
        'circle' => self::CIRCLE_ALLOWED_ATTRIBUTES,
        'defs' => self::DEFS_ALLOWED_ATTRIBUTES,
        'desc' => self::DESC_ALLOWED_ATTRIBUTES,
        'ellipse' => self::ELLIPSE_ALLOWED_ATTRIBUTES,
        'g' => self::G_ALLOWED_ATTRIBUTES,
        'line' => self::LINE_ALLOWED_ATTRIBUTES,
        'linearGradient' => self::LINEARGRADIENT_ALLOWED_ATTRIBUTES,
        'path' => self::PATH_ALLOWED_ATTRIBUTES,
        'polygon' => self::POLYGON_ALLOWED_ATTRIBUTES,
        'polyline' => self::POLYLINE_ALLOWED_ATTRIBUTES,
        'radialGradient' => self::RADIALGRADIENT_ALLOWED_ATTRIBUTES,
        'rect' => self::RECT_ALLOWED_ATTRIBUTES,
        'solidColor' => self::SOLIDCOLOR_ALLOWED_ATTRIBUTES,
        'svg' => self::SVG_ALLOWED_ATTRIBUTES,
        'text' => self::TEXT_ALLOWED_ATTRIBUTES,
        'textArea' => self::TEXTAREA_ALLOWED_ATTRIBUTES,
        'title' => self::TITLE_ALLOWED_ATTRIBUTES,
        'use' => self::USE_ALLOWED_ATTRIBUTES,
    ];

    protected ?DOMDocument $dom;

    protected ?DOMNode $svg;

    protected ?string $title = null;

    /**
     * @throws Exception
     */
    public function __construct($xmlText)
    {
        $this->dom = new DOMDocument();
        $this->dom->loadXML($xmlText);

        $this->svg = $this->dom->getElementsByTagName('svg')->item(0);

        if (! $this->svg) {
            throw new Exception('No SVG element found in the document');
        }

        return $this;
    }

    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    public function identifyIssues()
    {
        $issues = [];

        // Check for title element
        $title = $this->dom->getElementsByTagName('title')->item(0);
        if (! $title) {
            $issues[] = 'Missing <title> element';
        }

        // Check if title is the first element of svg
        if ($title) {
            $firstChildElement = $this->svg->firstChild;

            // Skip non-element nodes
            while ($firstChildElement && $firstChildElement->nodeType !== XML_ELEMENT_NODE) {
                $firstChildElement = $firstChildElement->nextSibling;
            }

            if ($firstChildElement !== $title) {
                $issues[] = 'The <title> element is not the first child of the <svg> element';
            }
        }

        // Check version and baseProfile
        $version = $this->svg->getAttribute('version');
        $baseProfile = $this->svg->getAttribute('baseProfile');
        if ($version !== '1.2' || $baseProfile !== 'tiny-ps') {
            $issues[] = 'Incorrect version or baseProfile attributes';
        }

        // Further recursive checks
        $issues = array_merge($issues, $this->identifySvgDescendantIssues($this->svg));

        // Check is SVG is Square
        if (! $this->isSvgSquare()) {
            $issues[] = 'SVG is not square';
        }

        return $issues;
    }

    public function identifySvgDescendantIssues(DOMNode $element): array
    {
        $issues = [];

        // Check for disallowed elements
        if (! in_array($element->localName, self::ALLOWED_ELEMENTS_NAME)) {
            $issues[] = "Element <{$element->localName}> is not allowed";
        }

        $localName = $element->localName;
        $allowedAttributesList = self::ALLOWED_ATTRIBUTES[$localName] ?? null;

        if ($allowedAttributesList !== null) {
            $attributes = iterator_to_array($element->attributes);
            foreach ($attributes as $attr) {
                $attrName = $attr->nodeName;
                if (! str_contains($attrName, 'xmlns') && ! in_array($attrName, $allowedAttributesList)) {
                    $issues[] = "Element <{$element->localName}> has a disallowed attribute: {$attrName}";
                }
            }
        }

        // Recursively check child elements
        foreach ($element->childNodes as $child) {
            if ($child->nodeType === XML_ELEMENT_NODE) {
                $issues = array_merge($issues, $this->identifySvgDescendantIssues($child));
            }
        }

        return $issues;
    }

    /**
     * @throws DOMException
     */
    public function convert()
    {
        // Move the title element to be the first child of the svg element
        $title = $this->dom->getElementsByTagName('title')->item(0);
        if (! $title) {
            $title = $this->dom->createElement('title');
            $title->appendChild($this->dom->createTextNode('Company Name'));
        } else {
            $title->parentNode?->removeChild($title);
        }

        //Change $title textnode
        if ($this->title !== null) {
            $title->nodeValue = $this->title;
        }

        // Re add <title> as first child
        if ($this->svg->firstChild) {
            $this->svg->insertBefore($title, $this->svg->firstChild);
        } else {
            $this->svg->appendChild($title);
        }

        // Modify version and baseProfile attributes, remove x and y
        $this->svg->setAttribute('version', '1.2');
        $this->svg->setAttribute('baseProfile', 'tiny-ps');
        $this->svg->removeAttribute('x');
        $this->svg->removeAttribute('y');

        // Remove the <namedview> element
        $namedview = $this->dom->getElementsByTagName('namedview')->item(0);
        if ($namedview) {
            $namedview->parentNode->removeChild($namedview);
        }

        $svgAttributes = $this->svg->attributes;

        // Remove "style" attribute
        if ($svgAttributes->getNamedItem('style')) {
            $styleValue = $svgAttributes->getNamedItem('style')->nodeValue;
            $attrs = self::parseStyleValue($styleValue);

            foreach ($attrs as $attr) {
                if (in_array($attr['name'], self::SVG_ALLOWED_ATTRIBUTES)) {
                    $this->svg->setAttribute($attr['name'], $attr['value']);
                }
            }

            $this->svg->removeAttribute('style');
        }

        // Remove disallowed attributes
        foreach ($svgAttributes as $attr) {
            $attrName = $attr->nodeName;
            $allowed = false;

            if (! str_contains($attrName, 'xmlns')) {
                if (in_array($attrName, self::SVG_ALLOWED_ATTRIBUTES)) {
                    $allowed = true;
                }
            }

            if (! $allowed) {
                $this->svg->removeAttribute($attrName);
            }
        }

        self::sanitizeSvgDescendants($this->svg);

        return $this->dom->saveXML();
    }

    protected static function sanitizeSvgDescendants(DOMNode $element): void
    {
        // Remove "style" attribute and sanitize other attributes
        $style = $element->getAttribute('style');
        if ($style) {
            $attrs = self::parseStyleValue($style);
            foreach ($attrs as $attr) {
                if (in_array($attr['name'], self::SVG_ALLOWED_ATTRIBUTES)) {
                    $element->setAttribute($attr['name'], $attr['value']);
                }
            }
            $element->removeAttribute('style');
        }

        $localName = $element->localName;
        $allowedAttributesList = self::ALLOWED_ATTRIBUTES[$localName] ?? null;

        if ($allowedAttributesList !== null) {
            $attributes = iterator_to_array($element->attributes);
            foreach ($attributes as $attr) {
                $attrName = $attr->nodeName;
                if (! str_contains($attrName, 'xmlns') && ! in_array($attrName, $allowedAttributesList)) {
                    $element->removeAttribute($attrName);
                }
            }
        }

        // Find disallowed child elements except <image>
        $nodesToRemove = [];
        foreach ($element->childNodes as $child) {
            if ($child->nodeType === XML_ELEMENT_NODE) {
                $localName = $child->localName;
                if (! in_array($localName, array_diff(self::ALLOWED_ELEMENTS_NAME, ['image']))) {
                    $nodesToRemove[] = $child;
                }
            }
        }

        // Remove disallowed child elements
        foreach ($nodesToRemove as $node) {
            $node->parentNode->removeChild($node);
        }

        // Recursively continue for child elements
        foreach ($element->childNodes as $child) {
            if ($child->nodeType === XML_ELEMENT_NODE) {
                self::sanitizeSvgDescendants($child);
            }
        }
    }

    protected static function parseStyleValue($styles)
    {
        $styleTexts = explode(';', $styles);
        $num = count($styleTexts);

        $attrs = [];

        for ($i = $num - 1; $i >= 0; $i--) {
            $styleText = $styleTexts[$i];

            $nameAndValue = explode(':', $styleText);

            if (count($nameAndValue) != 2) {
                continue;
            }

            $name = trim($nameAndValue[0]);
            $value = trim($nameAndValue[1]);

            $attrs[] = ['name' => $name, 'value' => $value];
        }

        return $attrs;
    }

    public function calculateSvgAspectRatio(): ?float
    {
        $viewBox = $this->svg->getAttribute('viewBox');
        if ($viewBox) {
            [$minX, $minY, $vbWidth, $vbHeight] = array_map('floatval', explode(' ', $viewBox));
            // dd($minX, $minY, $vbWidth, $vbHeight);
            if ($vbWidth > 0 && $vbHeight > 0) {
                return $vbWidth / $vbHeight;
            }
        }

        $width = (float) $this->svg->getAttribute('width');
        $height = (float) $this->svg->getAttribute('height');

        if ($width > 0 && $height > 0) {
            return $width / $height;
        }

        return null;
    }

    public function isSvgSquare(): bool
    {
        $aspectRatio = $this->calculateSvgAspectRatio();

        return $aspectRatio !== null && abs($aspectRatio - 1.0) < 1e-9;
    }
}

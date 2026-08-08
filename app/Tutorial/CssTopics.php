<?php

namespace App\Tutorial;

class CssTopics
{
    public static function getTopics(): array
    {
        return [
            [
                'category' => 'CSS Tutorial',
                'items' => [
                    ['slug' => 'introduction', 'title' => 'CSS HOME', 'desc' => 'Introduction to CSS'],
                    ['slug' => 'intro', 'title' => 'CSS Introduction', 'desc' => 'What is CSS and why use it'],
                    ['slug' => 'syntax', 'title' => 'CSS Syntax', 'desc' => 'CSS syntax and rules'],
                    ['slug' => 'selectors', 'title' => 'CSS Selectors', 'desc' => 'Element, id, class, and grouping selectors'],
                    ['slug' => 'howto', 'title' => 'CSS How To', 'desc' => 'External, Internal, Inline, Multiple stylesheets'],
                    ['slug' => 'comments', 'title' => 'CSS Comments', 'desc' => 'Adding comments to CSS code'],
                    ['slug' => 'errors', 'title' => 'CSS Errors', 'desc' => 'Understanding CSS errors'],
                    ['slug' => 'colors', 'title' => 'CSS Colors', 'desc' => 'RGB, HEX, HSL color values'],
                    ['slug' => 'backgrounds', 'title' => 'CSS Backgrounds', 'desc' => 'Color, Image, Repeat, Attachment, Shorthand'],
                    ['slug' => 'borders', 'title' => 'CSS Borders', 'desc' => 'Style, Width, Color, Sides, Shorthand, Rounded'],
                    ['slug' => 'margins', 'title' => 'CSS Margins', 'desc' => 'Margins and margin collapse'],
                    ['slug' => 'padding', 'title' => 'CSS Padding', 'desc' => 'Padding and box-sizing'],
                    ['slug' => 'height-width', 'title' => 'CSS Height/Width', 'desc' => 'Setting height, width, max and min'],
                    ['slug' => 'boxmodel', 'title' => 'CSS Box Model', 'desc' => 'The CSS Box Model explained'],
                    ['slug' => 'outline', 'title' => 'CSS Outline', 'desc' => 'Style, Width, Color, Shorthand, Offset'],
                    ['slug' => 'text', 'title' => 'CSS Text', 'desc' => 'Color, Alignment, Decoration, Transformation, Spacing, Shadow'],
                    ['slug' => 'fonts', 'title' => 'CSS Fonts', 'desc' => 'Family, Web Safe, Fallbacks, Style, Size, Google, Pairings, Shorthand'],
                    ['slug' => 'icons', 'title' => 'CSS Icons', 'desc' => 'Font Awesome, Bootstrap, Google icons'],
                    ['slug' => 'links-styling', 'title' => 'CSS Links', 'desc' => 'Styling links and link buttons'],
                    ['slug' => 'lists-styling', 'title' => 'CSS Lists', 'desc' => 'Styling lists'],
                    ['slug' => 'tables-styling', 'title' => 'CSS Tables', 'desc' => 'Borders, Size, Alignment, Styling, Responsive tables'],
                    ['slug' => 'display', 'title' => 'CSS Display', 'desc' => 'Display property and Visibility'],
                    ['slug' => 'max-width', 'title' => 'CSS Max-width', 'desc' => 'Using max-width for responsiveness'],
                    ['slug' => 'position', 'title' => 'CSS Position', 'desc' => 'Static, Relative, Fixed, Absolute, Sticky'],
                    ['slug' => 'position-offsets', 'title' => 'CSS Position Offsets', 'desc' => 'Top, right, bottom, left offsets'],
                    ['slug' => 'z-index', 'title' => 'CSS Z-index', 'desc' => 'Controlling stack order'],
                    ['slug' => 'overflow', 'title' => 'CSS Overflow', 'desc' => 'Handling overflow content'],
                    ['slug' => 'float', 'title' => 'CSS Float', 'desc' => 'Float and clear/clearfix'],
                    ['slug' => 'inline-block', 'title' => 'CSS Inline-block', 'desc' => 'Using inline-block'],
                    ['slug' => 'align', 'title' => 'CSS Align', 'desc' => 'Center, Horizontal, Vertical alignment'],
                    ['slug' => 'combinators', 'title' => 'CSS Combinators', 'desc' => 'Descendant, child, adjacent, general sibling combinators'],
                    ['slug' => 'pseudo-classes', 'title' => 'CSS Pseudo-classes', 'desc' => 'Interactive and Structural pseudo-classes'],
                    ['slug' => 'pseudo-elements', 'title' => 'CSS Pseudo-elements', 'desc' => 'Styling specific parts of elements'],
                    ['slug' => 'opacity', 'title' => 'CSS Opacity', 'desc' => 'Setting transparency'],
                    ['slug' => 'navbar', 'title' => 'CSS Navigation Bars', 'desc' => 'Vertical and horizontal navbars'],
                    ['slug' => 'dropdowns', 'title' => 'CSS Dropdowns', 'desc' => 'Creating dropdown menus'],
                    ['slug' => 'image-gallery', 'title' => 'CSS Image Gallery', 'desc' => 'Creating image galleries'],
                    ['slug' => 'image-sprites', 'title' => 'CSS Image Sprites', 'desc' => 'Using image sprites'],
                    ['slug' => 'attribute-selectors', 'title' => 'CSS Attribute Selectors', 'desc' => 'Styling elements with specific attributes'],
                    ['slug' => 'forms-styling', 'title' => 'CSS Forms', 'desc' => 'Styling inputs, focus, icons'],
                    ['slug' => 'counters', 'title' => 'CSS Counters', 'desc' => 'CSS counters and nested counters'],
                    ['slug' => 'units', 'title' => 'CSS Units', 'desc' => 'Absolute and relative units'],
                    ['slug' => 'inheritance', 'title' => 'CSS Inheritance', 'desc' => 'How inheritance works in CSS'],
                    ['slug' => 'specificity', 'title' => 'CSS Specificity', 'desc' => 'Specificity hierarchy'],
                    ['slug' => 'important', 'title' => 'CSS !important', 'desc' => 'Using the !important rule'],
                    ['slug' => 'math-functions', 'title' => 'CSS Math Functions', 'desc' => 'calc(), max(), min()'],
                    ['slug' => 'optimization', 'title' => 'CSS Optimization', 'desc' => 'Optimizing CSS performance'],
                    ['slug' => 'accessibility', 'title' => 'CSS Accessibility', 'desc' => 'Making CSS accessible'],
                    ['slug' => 'website-layout', 'title' => 'CSS Website Layout', 'desc' => 'Building a website layout'],
                ]
            ],
            [
                'category' => 'CSS Advanced',
                'items' => [
                    ['slug' => 'rounded-corners', 'title' => 'Rounded Corners', 'desc' => 'border-radius property'],
                    ['slug' => 'border-images', 'title' => 'Border Images', 'desc' => 'Using images as borders'],
                    ['slug' => 'backgrounds-advanced', 'title' => 'Backgrounds', 'desc' => 'Multiple, Size, Origin, Clip'],
                    ['slug' => 'colors-advanced', 'title' => 'Colors', 'desc' => 'Advanced colors and keywords'],
                    ['slug' => 'gradients', 'title' => 'Gradients', 'desc' => 'Linear, Radial, Conic gradients'],
                    ['slug' => 'shadows', 'title' => 'Shadows', 'desc' => 'Text and Box shadows'],
                    ['slug' => 'text-effects', 'title' => 'Text Effects', 'desc' => 'Advanced text effects'],
                    ['slug' => 'custom-fonts', 'title' => 'Custom Fonts', 'desc' => '@font-face rule'],
                    ['slug' => 'transforms-2d', 'title' => '2D Transforms', 'desc' => 'Translate, Rotate, Scale, Skew'],
                    ['slug' => 'transforms-3d', 'title' => '3D Transforms', 'desc' => '3D transformation methods'],
                    ['slug' => 'transitions', 'title' => 'Transitions', 'desc' => 'CSS transitions and timing'],
                    ['slug' => 'animations', 'title' => 'Animations', 'desc' => 'CSS animations, timing, and properties'],
                    ['slug' => 'tooltips', 'title' => 'Tooltips', 'desc' => 'Creating tooltips and arrows'],
                    ['slug' => 'image-styling', 'title' => 'Image Styling', 'desc' => 'Effects and hover styling'],
                    ['slug' => 'image-modal', 'title' => 'Image Modal', 'desc' => 'Creating an image modal'],
                    ['slug' => 'image-centering', 'title' => 'Image Centering', 'desc' => 'Centering images'],
                    ['slug' => 'image-filters', 'title' => 'Image Filters', 'desc' => 'Using CSS filters on images'],
                    ['slug' => 'image-shapes', 'title' => 'Image Shapes', 'desc' => 'Clipping images to shapes'],
                    ['slug' => 'object-fit', 'title' => 'object-fit', 'desc' => 'Using object-fit property'],
                    ['slug' => 'object-position', 'title' => 'object-position', 'desc' => 'Using object-position property'],
                    ['slug' => 'masking', 'title' => 'Masking', 'desc' => 'PNG, Gradients, SVG masking'],
                    ['slug' => 'buttons', 'title' => 'Buttons', 'desc' => 'Hover effects and button groups'],
                    ['slug' => 'pagination', 'title' => 'Pagination', 'desc' => 'Pagination styles'],
                    ['slug' => 'multiple-columns', 'title' => 'Multiple Columns', 'desc' => 'Multi-column layouts and rules'],
                    ['slug' => 'user-interface', 'title' => 'User Interface', 'desc' => 'Resize, outline-offset'],
                    ['slug' => 'variables', 'title' => 'Variables', 'desc' => 'var(), overriding, JavaScript, Media Queries'],
                    ['slug' => 'property', 'title' => '@property', 'desc' => 'CSS custom properties'],
                    ['slug' => 'box-sizing-advanced', 'title' => 'Box Sizing', 'desc' => 'Advanced box-sizing'],
                    ['slug' => 'media-queries', 'title' => 'Media Queries', 'desc' => 'Media queries and examples'],
                ]
            ],
            [
                'category' => 'CSS Flexbox',
                'items' => [
                    ['slug' => 'flexbox-intro', 'title' => 'Flexbox Intro', 'desc' => 'Introduction to Flexbox'],
                    ['slug' => 'flex-container', 'title' => 'Flex Container', 'desc' => 'Flex direction, wrap, justify, align'],
                    ['slug' => 'flex-items', 'title' => 'Flex Items', 'desc' => 'Order, grow, shrink, basis'],
                    ['slug' => 'flex-responsive', 'title' => 'Flex Responsive', 'desc' => 'Responsive layouts with Flexbox'],
                ]
            ],
            [
                'category' => 'CSS Grid',
                'items' => [
                    ['slug' => 'grid-intro', 'title' => 'Grid Intro', 'desc' => 'Introduction to CSS Grid layout'],
                    ['slug' => 'grid-container', 'title' => 'Grid Container', 'desc' => 'Tracks, gaps, alignment'],
                    ['slug' => 'grid-items', 'title' => 'Grid Items', 'desc' => 'Named lines, align, order'],
                    ['slug' => 'grid-12-column', 'title' => '12-column Layout', 'desc' => 'Building a 12-column grid layout'],
                    ['slug' => 'grid-supports', 'title' => '@supports', 'desc' => 'Feature queries'],
                ]
            ],
            [
                'category' => 'CSS Responsive',
                'items' => [
                    ['slug' => 'rwd-intro', 'title' => 'RWD Intro', 'desc' => 'Responsive Web Design introduction'],
                    ['slug' => 'viewport', 'title' => 'Viewport', 'desc' => 'Setting the viewport'],
                    ['slug' => 'grid-view', 'title' => 'Grid View', 'desc' => 'Responsive grid view'],
                    ['slug' => 'rwd-media-queries', 'title' => 'Media Queries', 'desc' => 'Responsive media queries'],
                    ['slug' => 'rwd-images', 'title' => 'Images', 'desc' => 'Responsive images'],
                    ['slug' => 'rwd-videos', 'title' => 'Videos', 'desc' => 'Responsive videos'],
                    ['slug' => 'frameworks', 'title' => 'Frameworks', 'desc' => 'Responsive frameworks like Bootstrap'],
                ]
            ],
        ];
    }

    public static function getTopicContent(string $slug): ?array
    {
        $map = [
            'syntax' => [
                'code' => "p {\n  color: red;\n  text-align: center;\n}",
                'question' => "Set the text color of the <p> element to blue.",
                'prefix' => "p {\n  ",
                'suffix' => ": blue;\n}",
                'answer' => "color"
            ],
            'selectors' => [
                'code' => "#myId {\n  color: blue;\n}\n.myClass {\n  color: green;\n}",
                'question' => "Select the element with the id 'header'.",
                'prefix' => "",
                'suffix' => "header {\n  color: black;\n}",
                'answer' => "#"
            ],
            'colors' => [
                'code' => "h1 {\n  color: #ff0000;\n  background-color: rgba(255, 0, 0, 0.5);\n}",
                'question' => "Set the background color of the body to 'yellow'.",
                'prefix' => "body {\n  ",
                'suffix' => ": yellow;\n}",
                'answer' => "background-color"
            ],
            'backgrounds' => [
                'code' => "body {\n  background-image: url('img_tree.png');\n  background-repeat: no-repeat;\n}",
                'question' => "Set the background image of the page to 'bg.jpg'.",
                'prefix' => "body {\n  background-image: ",
                'suffix' => "('bg.jpg');\n}",
                'answer' => "url"
            ],
            'borders' => [
                'code' => "p {\n  border: 1px solid black;\n  border-radius: 5px;\n}",
                'question' => "Set the border style to 'dotted'.",
                'prefix' => "p {\n  border-style: ",
                'suffix' => ";\n}",
                'answer' => "dotted"
            ],
            'boxmodel' => [
                'code' => "div {\n  width: 300px;\n  padding: 25px;\n  border: 25px solid navy;\n  margin: 25px;\n}",
                'question' => "Add a margin of 50px to the element.",
                'prefix' => "div {\n  ",
                'suffix' => ": 50px;\n}",
                'answer' => "margin"
            ],
            'flexbox-intro' => [
                'code' => ".container {\n  display: flex;\n  flex-direction: row;\n}",
                'question' => "Make the .container element a flex container.",
                'prefix' => ".container {\n  ",
                'suffix' => ": flex;\n}",
                'answer' => "display"
            ],
            'grid-intro' => [
                'code' => ".grid-container {\n  display: grid;\n  grid-template-columns: auto auto auto;\n}",
                'question' => "Make the element a grid container.",
                'prefix' => ".container {\n  display: ",
                'suffix' => ";\n}",
                'answer' => "grid"
            ],
            'position' => [
                'code' => "div {\n  position: absolute;\n  top: 50px;\n  left: 50px;\n}",
                'question' => "Set the position of the element to relative.",
                'prefix' => "div {\n  position: ",
                'suffix' => ";\n}",
                'answer' => "relative"
            ],
            'animations' => [
                'code' => "@keyframes example {\n  from {background-color: red;}\n  to {background-color: yellow;}\n}\ndiv {\n  animation-name: example;\n  animation-duration: 4s;\n}",
                'question' => "Apply the animation named 'myAnim' to the element.",
                'prefix' => "div {\n  ",
                'suffix' => ": myAnim;\n  animation-duration: 2s;\n}",
                'answer' => "animation-name"
            ],
            'transitions' => [
                'code' => "div {\n  width: 100px;\n  transition: width 2s;\n}\ndiv:hover {\n  width: 300px;\n}",
                'question' => "Add a transition effect to the 'width' property.",
                'prefix' => "div {\n  ",
                'suffix' => ": width 2s;\n}",
                'answer' => "transition"
            ],
            'media-queries' => [
                'code' => "@media only screen and (max-width: 600px) {\n  body {\n    background-color: lightblue;\n  }\n}",
                'question' => "Create a media query for screens with a maximum width of 600px.",
                'prefix' => "@media only screen and (",
                'suffix' => ": 600px) {\n  body {\n    background-color: blue;\n  }\n}",
                'answer' => "max-width"
            ],
            'gradients' => [
                'code' => "#grad {\n  background-image: linear-gradient(red, yellow);\n}",
                'question' => "Create a linear gradient background from red to blue.",
                'prefix' => "div {\n  background-image: ",
                'suffix' => "(red, blue);\n}",
                'answer' => "linear-gradient"
            ],
            'shadows' => [
                'code' => "h1 {\n  text-shadow: 2px 2px 5px red;\n}\ndiv {\n  box-shadow: 10px 10px 5px lightblue;\n}",
                'question' => "Add a text shadow with horizontal and vertical offset of 2px.",
                'prefix' => "h1 {\n  ",
                'suffix' => ": 2px 2px;\n}",
                'answer' => "text-shadow"
            ],
        ];

        return $map[$slug] ?? null;
    }
}

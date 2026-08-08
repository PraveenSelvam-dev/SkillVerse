<?php

namespace App\Tutorial;

class HtmlTopics
{
    public static function getTopics(): array
    {
        return [
            [
                'category' => 'HTML Tutorial',
                'items' => [
                    ['slug' => 'introduction', 'title' => 'HTML HOME', 'desc' => 'Introduction to HTML.'],
                    ['slug' => 'intro', 'title' => 'HTML Introduction', 'desc' => 'Learn what HTML is and how it works.'],
                    ['slug' => 'editors', 'title' => 'HTML Editors', 'desc' => 'Writing HTML using Notepad or TextEdit.'],
                    ['slug' => 'basic', 'title' => 'HTML Basic', 'desc' => 'Basic HTML examples.'],
                    ['slug' => 'elements', 'title' => 'HTML Elements', 'desc' => 'HTML elements and tags.'],
                    ['slug' => 'attributes', 'title' => 'HTML Attributes', 'desc' => 'HTML attributes provide additional information about HTML elements.'],
                    ['slug' => 'headings', 'title' => 'HTML Headings', 'desc' => 'HTML headings are titles or subtitles.'],
                    ['slug' => 'paragraphs', 'title' => 'HTML Paragraphs', 'desc' => 'HTML paragraphs are defined with the p tag.'],
                    ['slug' => 'styles', 'title' => 'HTML Styles', 'desc' => 'The HTML style attribute.'],
                    ['slug' => 'formatting', 'title' => 'HTML Formatting', 'desc' => 'HTML text formatting.'],
                    ['slug' => 'quotations', 'title' => 'HTML Quotations', 'desc' => 'HTML quotation and citation elements.'],
                    ['slug' => 'comments', 'title' => 'HTML Comments', 'desc' => 'HTML comments are not displayed in the browser.'],
                    ['slug' => 'colors', 'title' => 'HTML Colors', 'desc' => 'HTML colors are specified using predefined color names.'],
                    ['slug' => 'colors-rgb', 'title' => 'HTML RGB Colors', 'desc' => 'RGB color values.'],
                    ['slug' => 'colors-hex', 'title' => 'HTML HEX Colors', 'desc' => 'HEX color values.'],
                    ['slug' => 'colors-hsl', 'title' => 'HTML HSL Colors', 'desc' => 'HSL color values.'],
                    ['slug' => 'css', 'title' => 'HTML CSS', 'desc' => 'CSS stands for Cascading Style Sheets.'],
                    ['slug' => 'links', 'title' => 'HTML Links', 'desc' => 'HTML links are hyperlinks.'],
                    ['slug' => 'links-colors', 'title' => 'HTML Link Colors', 'desc' => 'Styling HTML links.'],
                    ['slug' => 'links-bookmarks', 'title' => 'HTML Link Bookmarks', 'desc' => 'Creating bookmarks with HTML links.'],
                    ['slug' => 'images', 'title' => 'HTML Images', 'desc' => 'HTML images improve the design and the appearance of a web page.'],
                    ['slug' => 'images-map', 'title' => 'HTML Image Map', 'desc' => 'HTML image maps.'],
                    ['slug' => 'images-background', 'title' => 'HTML Background Images', 'desc' => 'HTML background images.'],
                    ['slug' => 'images-picture', 'title' => 'HTML Picture Element', 'desc' => 'HTML picture element.'],
                    ['slug' => 'project', 'title' => 'HTML Project', 'desc' => 'HTML project.'],
                    ['slug' => 'favicon', 'title' => 'HTML Favicon', 'desc' => 'Adding a favicon in HTML.'],
                    ['slug' => 'page-title', 'title' => 'HTML Page Title', 'desc' => 'HTML page title.'],
                    ['slug' => 'tables', 'title' => 'HTML Tables', 'desc' => 'HTML tables allow web developers to arrange data into rows and columns.'],
                    ['slug' => 'tables-borders', 'title' => 'HTML Table Borders', 'desc' => 'HTML table borders.'],
                    ['slug' => 'tables-sizes', 'title' => 'HTML Table Sizes', 'desc' => 'HTML table sizes.'],
                    ['slug' => 'tables-headers', 'title' => 'HTML Table Headers', 'desc' => 'HTML table headers.'],
                    ['slug' => 'tables-padding-spacing', 'title' => 'HTML Table Padding & Spacing', 'desc' => 'HTML table padding and spacing.'],
                    ['slug' => 'tables-colspan-rowspan', 'title' => 'HTML Table Colspan & Rowspan', 'desc' => 'HTML table colspan and rowspan.'],
                    ['slug' => 'tables-styling', 'title' => 'HTML Table Styling', 'desc' => 'HTML table styling.'],
                    ['slug' => 'tables-colgroup', 'title' => 'HTML Table Colgroup', 'desc' => 'HTML table colgroup.'],
                    ['slug' => 'lists', 'title' => 'HTML Lists', 'desc' => 'HTML lists allow web developers to group a set of related items in lists.'],
                    ['slug' => 'lists-unordered', 'title' => 'HTML Unordered Lists', 'desc' => 'HTML unordered lists.'],
                    ['slug' => 'lists-ordered', 'title' => 'HTML Ordered Lists', 'desc' => 'HTML ordered lists.'],
                    ['slug' => 'lists-other', 'title' => 'HTML Other Lists', 'desc' => 'HTML description lists.'],
                    ['slug' => 'blocks', 'title' => 'HTML Block & Inline', 'desc' => 'HTML block-level and inline elements.'],
                    ['slug' => 'div', 'title' => 'HTML Div', 'desc' => 'The HTML div element.'],
                    ['slug' => 'classes', 'title' => 'HTML Classes', 'desc' => 'The HTML class attribute.'],
                    ['slug' => 'id', 'title' => 'HTML Id', 'desc' => 'The HTML id attribute.'],
                    ['slug' => 'buttons', 'title' => 'HTML Buttons', 'desc' => 'The HTML button element.'],
                    ['slug' => 'iframes', 'title' => 'HTML Iframes', 'desc' => 'HTML iframes.'],
                    ['slug' => 'javascript', 'title' => 'HTML JavaScript', 'desc' => 'HTML JavaScript.'],
                    ['slug' => 'filepaths', 'title' => 'HTML File Paths', 'desc' => 'HTML file paths.'],
                    ['slug' => 'head', 'title' => 'HTML Head', 'desc' => 'The HTML head element.'],
                    ['slug' => 'layout', 'title' => 'HTML Layout', 'desc' => 'HTML layout.'],
                    ['slug' => 'responsive', 'title' => 'HTML Responsive', 'desc' => 'HTML responsive web design.'],
                    ['slug' => 'computercode', 'title' => 'HTML Computercode', 'desc' => 'HTML computer code elements.'],
                    ['slug' => 'semantics', 'title' => 'HTML Semantics', 'desc' => 'HTML semantic elements.'],
                    ['slug' => 'style-guide', 'title' => 'HTML Style Guide', 'desc' => 'HTML coding conventions and best practices.'],
                    ['slug' => 'entities', 'title' => 'HTML Entities', 'desc' => 'HTML entities.'],
                    ['slug' => 'symbols', 'title' => 'HTML Symbols', 'desc' => 'HTML symbols.'],
                    ['slug' => 'emojis', 'title' => 'HTML Emojis', 'desc' => 'HTML emojis.'],
                    ['slug' => 'charsets', 'title' => 'HTML Charsets', 'desc' => 'HTML character sets.'],
                    ['slug' => 'url-encode', 'title' => 'HTML URL Encode', 'desc' => 'HTML URL encoding.'],
                    ['slug' => 'xhtml', 'title' => 'HTML vs XHTML', 'desc' => 'HTML vs XHTML.']
                ]
            ],
            [
                'category' => 'HTML Forms',
                'items' => [
                    ['slug' => 'forms', 'title' => 'HTML Forms', 'desc' => 'HTML forms are used to collect user input.'],
                    ['slug' => 'form-attributes', 'title' => 'HTML Form Attributes', 'desc' => 'Attributes for HTML forms.'],
                    ['slug' => 'form-elements', 'title' => 'HTML Form Elements', 'desc' => 'Elements for HTML forms.'],
                    ['slug' => 'input-types', 'title' => 'HTML Input Types', 'desc' => 'Different types of input elements.'],
                    ['slug' => 'input-attributes', 'title' => 'HTML Input Attributes', 'desc' => 'Attributes for HTML inputs.'],
                    ['slug' => 'input-form-attributes', 'title' => 'Input Form Attributes', 'desc' => 'Input form attributes.']
                ]
            ],
            [
                'category' => 'HTML Graphics',
                'items' => [
                    ['slug' => 'canvas', 'title' => 'HTML Canvas', 'desc' => 'HTML canvas element is used to draw graphics.'],
                    ['slug' => 'svg', 'title' => 'HTML SVG', 'desc' => 'HTML SVG is used to define graphics for the web.']
                ]
            ],
            [
                'category' => 'HTML Media',
                'items' => [
                    ['slug' => 'media', 'title' => 'HTML Media', 'desc' => 'HTML multimedia.'],
                    ['slug' => 'video', 'title' => 'HTML Video', 'desc' => 'Playing videos in HTML.'],
                    ['slug' => 'audio', 'title' => 'HTML Audio', 'desc' => 'Playing audio in HTML.'],
                    ['slug' => 'plugins', 'title' => 'HTML Plug-ins', 'desc' => 'HTML plug-ins.'],
                    ['slug' => 'youtube', 'title' => 'HTML YouTube', 'desc' => 'Playing YouTube videos in HTML.']
                ]
            ],
            [
                'category' => 'HTML APIs',
                'items' => [
                    ['slug' => 'web-apis', 'title' => 'HTML Web APIs', 'desc' => 'Introduction to Web APIs.'],
                    ['slug' => 'geolocation', 'title' => 'HTML Geolocation', 'desc' => 'HTML Geolocation API.'],
                    ['slug' => 'drag-drop', 'title' => 'HTML Drag and Drop', 'desc' => 'HTML Drag and Drop API.'],
                    ['slug' => 'web-storage', 'title' => 'HTML Web Storage', 'desc' => 'HTML Web Storage API.'],
                    ['slug' => 'web-workers', 'title' => 'HTML Web Workers', 'desc' => 'HTML Web Workers API.'],
                    ['slug' => 'sse', 'title' => 'HTML SSE', 'desc' => 'HTML Server-Sent Events API.']
                ]
            ]
        ];
    }

    public static function getTopicContent(string $slug): ?array
    {
        $map = [
            'introduction' => [
                'code' => "<!DOCTYPE html>\n<html>\n<head>\n<title>Page Title</title>\n</head>\n<body>\n\n<h1>My First Heading</h1>\n<p>My first paragraph.</p>\n\n</body>\n</html>",
                'question' => "Write the opening tag for a paragraph element.",
                'prefix' => "",
                'suffix' => "Hello World!</p>",
                'answer' => "<p>"
            ],
            'basic' => [
                'code' => "<h1>This is a heading</h1>\n<p>This is a paragraph.</p>\n<a href=\"https://www.skillverse.com\">This is a link</a>",
                'question' => "Add an HTML heading level 1 to the text.",
                'prefix' => "",
                'suffix' => "Welcome</h1>",
                'answer' => "<h1>"
            ],
            'elements' => [
                'code' => "<h1>My First Heading</h1>\n<p>My first paragraph.</p><br><p>Another line.</p>",
                'question' => "Add a line break element.",
                'prefix' => "<p>Line one",
                'suffix' => "Line two</p>",
                'answer' => "<br>"
            ],
            'attributes' => [
                'code' => "<a href=\"https://www.skillverse.com\">Visit SkillVerse</a>",
                'question' => "Provide the correct attribute to make a link point to an URL.",
                'prefix' => "<a ",
                'suffix' => "=\"https://www.skillverse.com\">Link</a>",
                'answer' => "href"
            ],
            'headings' => [
                'code' => "<h1>Heading 1</h1>\n<h2>Heading 2</h2>\n<h3>Heading 3</h3>",
                'question' => "Create the second largest heading.",
                'prefix' => "",
                'suffix' => "Hello</h2>",
                'answer' => "<h2>"
            ],
            'paragraphs' => [
                'code' => "<p>This is a paragraph.</p>\n<p>This is another paragraph.</p>",
                'question' => "Create a paragraph.",
                'prefix' => "",
                'suffix' => "This is text.</p>",
                'answer' => "<p>"
            ],
            'styles' => [
                'code' => "<p style=\"color:red;\">I am a red paragraph.</p>",
                'question' => "Use the style attribute to make the text red.",
                'prefix' => "<p ",
                'suffix' => "=\"color:red;\">Red text</p>",
                'answer' => "style"
            ],
            'formatting' => [
                'code' => "<p><b>This text is bold</b></p>\n<p><i>This text is italic</i></p>",
                'question' => "Make the text bold.",
                'prefix' => "<p>",
                'suffix' => "Bold text</b></p>",
                'answer' => "<b>"
            ],
            'colors' => [
                'code' => "<h1 style=\"background-color:Tomato;\">Tomato</h1>\n<p style=\"color:DodgerBlue;\">DodgerBlue</p>",
                'question' => "Change the text color of the paragraph to red.",
                'prefix' => "<p style=\"",
                'suffix' => ":red;\">Red</p>",
                'answer' => "color"
            ],
            'links' => [
                'code' => "<a href=\"https://www.skillverse.com\" target=\"_blank\">Visit SkillVerse!</a>",
                'question' => "Add an attribute to open the link in a new tab/window:",
                'prefix' => "<a href=\"https://www.skillverse.com\" ",
                'suffix' => "=\"_blank\">SkillVerse</a>",
                'answer' => "target"
            ],
            'images' => [
                'code' => "<img src=\"img_girl.jpg\" alt=\"Girl in a jacket\" width=\"500\" height=\"600\">",
                'question' => "Specify the image file name 'photo.jpg'.",
                'prefix' => "<img ",
                'suffix' => "=\"photo.jpg\" alt=\"Photo\">",
                'answer' => "src"
            ],
            'tables' => [
                'code' => "<table>\n  <tr>\n    <th>Company</th>\n    <th>Contact</th>\n  </tr>\n  <tr>\n    <td>Alfreds Futterkiste</td>\n    <td>Maria Anders</td>\n  </tr>\n</table>",
                'question' => "Add a table row element.",
                'prefix' => "<table>\n  ",
                'suffix' => "\n    <td>Cell</td>\n  </tr>\n</table>",
                'answer' => "<tr>"
            ],
            'lists' => [
                'code' => "<ul>\n  <li>Coffee</li>\n  <li>Tea</li>\n  <li>Milk</li>\n</ul>",
                'question' => "Create an unordered list.",
                'prefix' => "",
                'suffix' => "\n  <li>Item</li>\n</ul>",
                'answer' => "<ul>"
            ],
            'forms' => [
                'code' => "<form action=\"/action_page.php\">\n  <label for=\"fname\">First name:</label><br>\n  <input type=\"text\" id=\"fname\" name=\"fname\"><br>\n  <input type=\"submit\" value=\"Submit\">\n</form>",
                'question' => "Start an HTML form.",
                'prefix' => "",
                'suffix' => " action=\"/submit.php\">\n</form>",
                'answer' => "<form>"
            ],
            'input-types' => [
                'code' => "<input type=\"text\">\n<input type=\"password\">\n<input type=\"submit\">",
                'question' => "Create a password input field.",
                'prefix' => "<input type=\"",
                'suffix' => "\">",
                'answer' => "password"
            ],
            'canvas' => [
                'code' => "<canvas id=\"myCanvas\" width=\"200\" height=\"100\" style=\"border:1px solid #000000;\"></canvas>",
                'question' => "Define a canvas element.",
                'prefix' => "",
                'suffix' => " id=\"myCanvas\"></canvas>",
                'answer' => "<canvas>"
            ],
            'video' => [
                'code' => "<video width=\"320\" height=\"240\" controls>\n  <source src=\"movie.mp4\" type=\"video/mp4\">\n</video>",
                'question' => "Add a video element.",
                'prefix' => "",
                'suffix' => " src=\"movie.mp4\" controls></video>",
                'answer' => "<video>"
            ]
        ];

        return $map[$slug] ?? null;
    }
}

<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tutorial\HtmlTopics;
use App\Tutorial\CssTopics;
use App\Tutorial\JsTopics;
use App\Tutorial\SqlTopics;
use App\Tutorial\PythonTopics;

class TutorialController extends Controller
{
    /**
     * Get all supported languages & technologies matching subtopnav
     */
    private function getLanguages()
    {
        return [
            ['code' => 'html', 'name' => 'HTML', 'title' => 'HTML Tutorial', 'icon' => 'fa-html5', 'color' => '#E34F26'],
            ['code' => 'css', 'name' => 'CSS', 'title' => 'CSS Tutorial', 'icon' => 'fa-css3-alt', 'color' => '#1572B6'],
            ['code' => 'js', 'name' => 'JAVASCRIPT', 'title' => 'JavaScript Tutorial', 'icon' => 'fa-square-js', 'color' => '#F7DF1E'],
            ['code' => 'sql', 'name' => 'SQL', 'title' => 'SQL Tutorial', 'icon' => 'fa-database', 'color' => '#00758F'],
            ['code' => 'python', 'name' => 'PYTHON', 'title' => 'Python Tutorial', 'icon' => 'fa-python', 'color' => '#3776AB'],
            ['code' => 'java', 'name' => 'JAVA', 'title' => 'Java Tutorial', 'icon' => 'fa-java', 'color' => '#5382A1'],
            ['code' => 'php', 'name' => 'PHP', 'title' => 'PHP Tutorial', 'icon' => 'fa-php', 'color' => '#777BB4'],
            ['code' => 'w3css', 'name' => 'W3.CSS', 'title' => 'W3.CSS Tutorial', 'icon' => 'fa-code', 'color' => '#004B87'],
            ['code' => 'c', 'name' => 'C', 'title' => 'C Programming Tutorial', 'icon' => 'fa-code', 'color' => '#A8B9CC'],
            ['code' => 'cpp', 'name' => 'C++', 'title' => 'C++ Tutorial', 'icon' => 'fa-code', 'color' => '#00599C'],
            ['code' => 'cs', 'name' => 'C#', 'title' => 'C# Tutorial', 'icon' => 'fa-terminal', 'color' => '#239120'],
            ['code' => 'howto', 'name' => 'HOW TO', 'title' => 'How To Snippets', 'icon' => 'fa-lightbulb', 'color' => '#FF9900'],
            ['code' => 'bootstrap', 'name' => 'BOOTSTRAP', 'title' => 'Bootstrap Tutorial', 'icon' => 'fa-bootstrap', 'color' => '#7952B3'],
            ['code' => 'react', 'name' => 'REACT', 'title' => 'React Tutorial', 'icon' => 'fa-react', 'color' => '#61DAFB'],
            ['code' => 'mysql', 'name' => 'MYSQL', 'title' => 'MySQL Tutorial', 'icon' => 'fa-database', 'color' => '#4479A1'],
            ['code' => 'jquery', 'name' => 'JQUERY', 'title' => 'jQuery Tutorial', 'icon' => 'fa-code', 'color' => '#0769AD'],
            ['code' => 'excel', 'name' => 'EXCEL', 'title' => 'Excel Tutorial', 'icon' => 'fa-file-excel', 'color' => '#107C41'],
            ['code' => 'xml', 'name' => 'XML', 'title' => 'XML Tutorial', 'icon' => 'fa-code', 'color' => '#F47D20'],
            ['code' => 'django', 'name' => 'DJANGO', 'title' => 'Django Tutorial', 'icon' => 'fa-python', 'color' => '#092E20'],
            ['code' => 'numpy', 'name' => 'NUMPY', 'title' => 'NumPy Tutorial', 'icon' => 'fa-calculator', 'color' => '#4DABCF'],
            ['code' => 'pandas', 'name' => 'PANDAS', 'title' => 'Pandas Tutorial', 'icon' => 'fa-table', 'color' => '#150458'],
            ['code' => 'nodejs', 'name' => 'NODEJS', 'title' => 'Node.js Tutorial', 'icon' => 'fa-node-js', 'color' => '#339933'],
            ['code' => 'dsa', 'name' => 'DSA', 'title' => 'Data Structures & Algorithms', 'icon' => 'fa-diagram-project', 'color' => '#FF9900'],
            ['code' => 'typescript', 'name' => 'TYPESCRIPT', 'title' => 'TypeScript Tutorial', 'icon' => 'fa-code', 'color' => '#3178C6'],
            ['code' => 'angular', 'name' => 'ANGULAR', 'title' => 'Angular Tutorial', 'icon' => 'fa-angular', 'color' => '#DD0031'],
            ['code' => 'git', 'name' => 'GIT', 'title' => 'Git Tutorial', 'icon' => 'fa-git-alt', 'color' => '#F05032'],
            ['code' => 'postgresql', 'name' => 'POSTGRESQL', 'title' => 'PostgreSQL Tutorial', 'icon' => 'fa-database', 'color' => '#336791'],
            ['code' => 'mongodb', 'name' => 'MONGODB', 'title' => 'MongoDB Tutorial', 'icon' => 'fa-server', 'color' => '#47A248'],
            ['code' => 'asp', 'name' => 'ASP', 'title' => 'ASP.NET Tutorial', 'icon' => 'fa-code', 'color' => '#512BD4'],
            ['code' => 'ai', 'name' => 'AI', 'title' => 'Artificial Intelligence', 'icon' => 'fa-brain', 'color' => '#6C63FF'],
            ['code' => 'r', 'name' => 'R', 'title' => 'R Programming Tutorial', 'icon' => 'fa-chart-pie', 'color' => '#198CE7'],
            ['code' => 'go', 'name' => 'GO', 'title' => 'Go Programming Tutorial', 'icon' => 'fa-code', 'color' => '#00ADD8'],
            ['code' => 'kotlin', 'name' => 'KOTLIN', 'title' => 'Kotlin Tutorial', 'icon' => 'fa-code', 'color' => '#7F52FF'],
            ['code' => 'swift', 'name' => 'SWIFT', 'title' => 'Swift Tutorial', 'icon' => 'fa-swift', 'color' => '#F05138'],
            ['code' => 'sass', 'name' => 'SASS', 'title' => 'Sass Tutorial', 'icon' => 'fa-sass', 'color' => '#CC6699'],
            ['code' => 'vue', 'name' => 'VUE', 'title' => 'Vue.js Tutorial', 'icon' => 'fa-vuejs', 'color' => '#4FC08D'],
            ['code' => 'gen_ai', 'name' => 'GEN AI', 'title' => 'Generative AI Tutorial', 'icon' => 'fa-wand-magic-sparkles', 'color' => '#FF6584'],
            ['code' => 'scipy', 'name' => 'SCIPY', 'title' => 'SciPy Scientific Python', 'icon' => 'fa-atom', 'color' => '#00549F'],
            ['code' => 'aws', 'name' => 'AWS', 'title' => 'AWS Cloud Tutorial', 'icon' => 'fa-aws', 'color' => '#FF9900'],
            ['code' => 'cybersecurity', 'name' => 'CYBERSECURITY', 'title' => 'Cybersecurity Tutorial', 'icon' => 'fa-shield-halved', 'color' => '#00C9A7'],
            ['code' => 'datascience', 'name' => 'DATA SCIENCE', 'title' => 'Data Science Tutorial', 'icon' => 'fa-chart-line', 'color' => '#3776AB'],
            ['code' => 'bash', 'name' => 'BASH', 'title' => 'Bash Scripting', 'icon' => 'fa-terminal', 'color' => '#4EAA25'],
            ['code' => 'rust', 'name' => 'RUST', 'title' => 'Rust Tutorial', 'icon' => 'fa-gear', 'color' => '#000000'],
        ];
    }

    /**
     * Topic class mapping for languages with dedicated topic files
     */
    private static $topicClasses = [
        'html'   => HtmlTopics::class,
        'css'    => CssTopics::class,
        'js'     => JsTopics::class,
        'sql'    => SqlTopics::class,
        'python' => PythonTopics::class,
    ];

    /**
     * Get topics tree for a specific language
     */
    private function getTopics($lang)
    {
        $lang = strtolower($lang);

        if (isset(self::$topicClasses[$lang])) {
            return self::$topicClasses[$lang]::getTopics();
        }

        // Fallback topic generator for languages without dedicated topic files
        $name = strtoupper($lang);
        return [
            [
                'category' => "$name Tutorial",
                'items' => [
                    ['slug' => 'introduction', 'title' => "$name Introduction", 'desc' => "$name is an essential skill for modern software developers."],
                    ['slug' => 'environment', 'title' => "$name Setup & Installation", 'desc' => "Step-by-step guide to set up $name on Windows, Mac, and Linux."],
                    ['slug' => 'syntax', 'title' => "$name Syntax & Core Rules", 'desc' => "Core syntax rules, code structure, and statements."],
                    ['slug' => 'variables', 'title' => "$name Variables & Data Types", 'desc' => "Declaring variables, memory allocation, and data structures."],
                    ['slug' => 'control-flow', 'title' => "$name Control Flow & Loops", 'desc' => "Conditionals (if/else) and loop statements."],
                    ['slug' => 'functions', 'title' => "$name Functions & Scope", 'desc' => "Writing modular code with functions and methods."],
                    ['slug' => 'oop', 'title' => "$name Object-Oriented Programming", 'desc' => "Classes, objects, inheritance, and polymorphism."],
                    ['slug' => 'error-handling', 'title' => "$name Error Handling", 'desc' => "Try-catch blocks and exception handling patterns."],
                    ['slug' => 'file-io', 'title' => "$name File I/O", 'desc' => "Reading and writing files in $name."],
                    ['slug' => 'advanced', 'title' => "$name Advanced Topics", 'desc' => "Advanced concepts and best practices."],
                ]
            ],
            [
                'category' => "$name Exercises & Quiz",
                'items' => [
                    ['slug' => 'exercises', 'title' => "$name Interactive Exercises", 'desc' => "Complete exercises to solidify your knowledge."],
                    ['slug' => 'quiz', 'title' => "$name Practice Quiz", 'desc' => "Test your $name mastery with instantaneous feedback."],
                ]
            ]
        ];
    }

    /**
     * Get topic-specific content structured according to W3Schools format
     */
    private function getTopicContent($lang, $slug, $title)
    {
        $lang = strtolower($lang);
        $rawContent = null;

        // Check dedicated topic class first
        if (isset(self::$topicClasses[$lang])) {
            $rawContent = self::$topicClasses[$lang]::getTopicContent($slug);
        }

        $langName = ucfirst($lang);
        if ($lang === 'js') $langName = 'JavaScript';
        if ($lang === 'sql') $langName = 'SQL';
        if ($lang === 'html') $langName = 'HTML';
        if ($lang === 'css') $langName = 'CSS';
        if ($lang === 'cpp') $langName = 'C++';
        if ($lang === 'cs') $langName = 'C#';

        // Custom exact match for Variable Names (Python - Variable Names)
        if ($lang === 'python' && ($slug === 'variable-names' || $slug === 'variables')) {
            return [
                'lang_name' => $langName,
                'title' => $title,
                'intro_p' => 'A variable can have a short name (like x and y) or a more descriptive name (age, carname, total_volume).',
                'rules_header' => 'Rules for Python variables:',
                'rules' => [
                    'A variable name must start with a letter or the underscore character',
                    'A variable name cannot start with a number',
                    'A variable name can only contain alpha-numeric characters and underscores (A-z, 0-9, and _ )',
                    'Variable names are case-sensitive (age, Age and AGE are three different variables)',
                    'A variable name cannot be any of the Python keywords.'
                ],
                'example_legal' => [
                    'title' => 'Example',
                    'label' => 'Legal variable names:',
                    'code' => "myvar = \"John\"\nmy_var = \"John\"\n_my_var = \"John\"\nmyVar = \"John\"\nMYVAR = \"John\"\nmyvar2 = \"John\""
                ],
                'example_illegal' => [
                    'title' => 'Example',
                    'label' => 'Illegal variable names:',
                    'code' => "2myvar = \"John\"\nmy-var = \"John\"\nmy var = \"John\""
                ],
                'note' => 'Remember that variable names are case-sensitive',
                'subsections_header' => 'Multi Words Variable Names',
                'subsections_p' => 'Variable names with more than one word can be difficult to read. There are several techniques you can use to make them more readable:',
                'subsections' => [
                    [
                        'name' => 'Camel Case',
                        'desc' => 'Each word, except the first, starts with a capital letter:',
                        'code' => 'myVariableName = "John"'
                    ],
                    [
                        'name' => 'Pascal Case',
                        'desc' => 'Each word starts with a capital letter:',
                        'code' => 'MyVariableName = "John"'
                    ],
                    [
                        'name' => 'Snake Case',
                        'desc' => 'Each word is separated by an underscore character:',
                        'code' => 'my_variable_name = "John"'
                    ]
                ],
                'quiz' => [
                    'question' => 'Which is NOT a legal variable name?',
                    'options' => [
                        ['id' => 0, 'text' => 'my-var = 20', 'is_correct' => true],
                        ['id' => 1, 'text' => 'my_var = 20', 'is_correct' => false],
                        ['id' => 2, 'text' => 'Myvar = 20', 'is_correct' => false],
                        ['id' => 3, 'text' => '_myvar = 20', 'is_correct' => false],
                    ],
                    'correct_index' => 0
                ],
                'video' => [
                    'title' => 'Video: Python Variable Names',
                    'url' => 'https://www.youtube.com/results?search_query=python+variable+names+tutorial'
                ],
                'code' => $rawContent['code'] ?? "myvar = \"John\"\nmy_var = \"John\"\nprint(myvar, my_var)",
                'question' => $rawContent['question'] ?? 'Create a variable named carname and assign the value Volvo to it.',
                'prefix' => $rawContent['prefix'] ?? '',
                'suffix' => $rawContent['suffix'] ?? ' = "Volvo"',
                'answer' => $rawContent['answer'] ?? 'carname'
            ];
        }

        // Generic structured generator for all other topics across languages
        $codeSnippet = $rawContent['code'] ?? "print(\"Hello from {$langName} {$title}!\")";
        $exerciseQ = $rawContent['question'] ?? "Fill in the blank to complete the {$title} statement:";
        $prefix = $rawContent['prefix'] ?? '';
        $suffix = $rawContent['suffix'] ?? '';
        $answer = $rawContent['answer'] ?? 'SkillVerse';

        return [
            'lang_name' => $langName,
            'title' => $title,
            'intro_p' => "{$title} is a core concept in {$langName}. Mastering {$title} allows you to write clean, efficient, and maintainable software.",
            'rules_header' => "Rules & Guidelines for {$langName} {$title}:",
            'rules' => [
                "Always adhere to standard {$langName} naming and syntax guidelines.",
                "Keep code modular, readable, and well-structured.",
                "Verify compatibility across runtime environments.",
                "Use descriptive names and proper formatting for all declarations."
            ],
            'example_legal' => [
                'title' => 'Example',
                'label' => "Correct {$title} usage example:",
                'code' => $codeSnippet
            ],
            'example_illegal' => [
                'title' => 'Syntax Note & Common Pitfalls',
                'label' => 'Avoid common syntax mistakes and invalid declarations:',
                'code' => "# Invalid syntax attempt:\n// Avoid unformatted or undeclared symbols\n" . substr($codeSnippet, 0, strpos($codeSnippet, "\n") ?: strlen($codeSnippet))
            ],
            'note' => "Remember that {$title} conventions in {$langName} play a key role in application performance and readability.",
            'subsections_header' => "Standard Variations of {$title}",
            'subsections_p' => "Different design patterns and syntax styles can be used depending on your project requirements:",
            'subsections' => [
                [
                    'name' => 'Standard Approach',
                    'desc' => 'The standard syntax recommended for production environments:',
                    'code' => $codeSnippet
                ],
                [
                    'name' => 'Inline / Concise Syntax',
                    'desc' => 'A compact single-line variation:',
                    'code' => str_replace("\n", " ", $codeSnippet)
                ]
            ],
            'quiz' => [
                'question' => "Which of the following represents the correct syntax for {$title} in {$langName}?",
                'options' => [
                    ['id' => 0, 'text' => $codeSnippet, 'is_correct' => true],
                    ['id' => 1, 'text' => "INVALID_{$slug}_FORMAT", 'is_correct' => false],
                    ['id' => 2, 'text' => "null_undefined_statement()", 'is_correct' => false],
                    ['id' => 3, 'text' => "123_invalid_prefix", 'is_correct' => false],
                ],
                'correct_index' => 0
            ],
            'video' => [
                'title' => "Video: {$langName} {$title}",
                'url' => "https://www.youtube.com/results?search_query=" . urlencode("{$langName} {$title} tutorial")
            ],
            'code' => $codeSnippet,
            'question' => $exerciseQ,
            'prefix' => $prefix,
            'suffix' => $suffix,
            'answer' => $answer
        ];
    }

    public function index()
    {
        return redirect()->route('tutorials.show', ['lang' => 'html', 'topic' => 'introduction']);
    }

    public function show($lang, $topic = 'introduction')
    {
        $languages = $this->getLanguages();
        
        $currentLang = collect($languages)->firstWhere('code', strtolower($lang));
        if (!$currentLang) {
            $currentLang = $languages[0];
            $lang = $currentLang['code'];
        }

        $topicsTree = $this->getTopics($lang);

        $currentTopic = null;
        $prevTopic = null;
        $nextTopic = null;
        $allFlatTopics = [];

        foreach ($topicsTree as $cat) {
            foreach ($cat['items'] as $item) {
                $allFlatTopics[] = array_merge($item, ['category' => $cat['category']]);
            }
        }

        foreach ($allFlatTopics as $index => $item) {
            if ($item['slug'] === $topic) {
                $currentTopic = $item;
                $prevTopic = $allFlatTopics[$index - 1] ?? null;
                $nextTopic = $allFlatTopics[$index + 1] ?? null;
                break;
            }
        }

        if (!$currentTopic && !empty($allFlatTopics)) {
            $currentTopic = $allFlatTopics[0];
            $nextTopic = $allFlatTopics[1] ?? null;
        }

        // Get dynamic topic content & execution payload structured in full W3Schools topic layout format
        $topicContent = $this->getTopicContent($lang, $currentTopic['slug'] ?? 'introduction', $currentTopic['title'] ?? 'Tutorial');

        return view('tutorials.show', compact(
            'languages', 
            'currentLang', 
            'topicsTree', 
            'currentTopic', 
            'prevTopic', 
            'nextTopic',
            'topicContent'
        ));
    }
}

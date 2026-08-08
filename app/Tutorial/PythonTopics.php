<?php

namespace App\Tutorial;

class PythonTopics
{
    public static function getTopics(): array
    {
        return [
            [
                'category' => 'Python Tutorial',
                'items' => [
                    ['slug' => 'introduction', 'title' => 'Python HOME', 'desc' => 'Introduction to Python.'],
                    ['slug' => 'intro', 'title' => 'Python Intro', 'desc' => 'What is Python?'],
                    ['slug' => 'get-started', 'title' => 'Python Get Started', 'desc' => 'How to get started.'],
                    ['slug' => 'syntax', 'title' => 'Python Syntax', 'desc' => 'Python syntax rules.'],
                    ['slug' => 'statements', 'title' => 'Python Statements', 'desc' => 'Python statements.'],
                    ['slug' => 'output', 'title' => 'Python Output', 'desc' => 'Python output.'],
                    ['slug' => 'print-text', 'title' => 'Python Print Text', 'desc' => 'Printing text.'],
                    ['slug' => 'print-numbers', 'title' => 'Python Print Numbers', 'desc' => 'Printing numbers.'],
                    ['slug' => 'comments', 'title' => 'Python Comments', 'desc' => 'Python comments.'],
                    ['slug' => 'variables', 'title' => 'Python Variables', 'desc' => 'Python variables.'],
                    ['slug' => 'variable-names', 'title' => 'Variable Names', 'desc' => 'Naming variables.'],
                    ['slug' => 'assign-multiple', 'title' => 'Assign Multiple', 'desc' => 'Assigning multiple variables.'],
                    ['slug' => 'output-variables', 'title' => 'Output Variables', 'desc' => 'Outputting variables.'],
                    ['slug' => 'global-variables', 'title' => 'Global Variables', 'desc' => 'Global variables.'],
                    ['slug' => 'datatypes', 'title' => 'Python Data Types', 'desc' => 'Python data types.'],
                    ['slug' => 'numbers', 'title' => 'Python Numbers', 'desc' => 'Python numbers.'],
                    ['slug' => 'casting', 'title' => 'Python Casting', 'desc' => 'Python casting.'],
                    ['slug' => 'strings', 'title' => 'Python Strings', 'desc' => 'Python strings.'],
                    ['slug' => 'slicing', 'title' => 'Slicing Strings', 'desc' => 'Slicing strings.'],
                    ['slug' => 'modify-strings', 'title' => 'Modify Strings', 'desc' => 'Modifying strings.'],
                    ['slug' => 'concatenate-strings', 'title' => 'Concatenate Strings', 'desc' => 'Concatenating strings.'],
                    ['slug' => 'format-strings', 'title' => 'Format Strings', 'desc' => 'Formatting strings.'],
                    ['slug' => 'escape-characters', 'title' => 'Escape Characters', 'desc' => 'Escape characters.'],
                    ['slug' => 'string-methods', 'title' => 'String Methods', 'desc' => 'String methods.'],
                    ['slug' => 'booleans', 'title' => 'Python Booleans', 'desc' => 'Python booleans.'],
                    ['slug' => 'operators', 'title' => 'Python Operators', 'desc' => 'Python operators.'],
                    ['slug' => 'arithmetic', 'title' => 'Arithmetic Operators', 'desc' => 'Arithmetic operators.'],
                    ['slug' => 'assignment', 'title' => 'Assignment Operators', 'desc' => 'Assignment operators.'],
                    ['slug' => 'ternary', 'title' => 'Ternary Operators', 'desc' => 'Ternary operators.'],
                    ['slug' => 'comparison', 'title' => 'Comparison Operators', 'desc' => 'Comparison operators.'],
                    ['slug' => 'logical', 'title' => 'Logical Operators', 'desc' => 'Logical operators.'],
                    ['slug' => 'identity', 'title' => 'Identity Operators', 'desc' => 'Identity operators.'],
                    ['slug' => 'membership', 'title' => 'Membership Operators', 'desc' => 'Membership operators.'],
                    ['slug' => 'bitwise', 'title' => 'Bitwise Operators', 'desc' => 'Bitwise operators.'],
                    ['slug' => 'precedence', 'title' => 'Operator Precedence', 'desc' => 'Operator precedence.'],
                    ['slug' => 'lists', 'title' => 'Python Lists', 'desc' => 'Python lists.'],
                    ['slug' => 'access-lists', 'title' => 'Access Lists', 'desc' => 'Accessing list items.'],
                    ['slug' => 'change-lists', 'title' => 'Change Lists', 'desc' => 'Changing list items.'],
                    ['slug' => 'add-lists', 'title' => 'Add List Items', 'desc' => 'Adding list items.'],
                    ['slug' => 'remove-lists', 'title' => 'Remove List Items', 'desc' => 'Removing list items.'],
                    ['slug' => 'loop-lists', 'title' => 'Loop Lists', 'desc' => 'Looping lists.'],
                    ['slug' => 'list-comprehension', 'title' => 'List Comprehension', 'desc' => 'List comprehension.'],
                    ['slug' => 'sort-lists', 'title' => 'Sort Lists', 'desc' => 'Sorting lists.'],
                    ['slug' => 'copy-lists', 'title' => 'Copy Lists', 'desc' => 'Copying lists.'],
                    ['slug' => 'join-lists', 'title' => 'Join Lists', 'desc' => 'Joining lists.'],
                    ['slug' => 'list-methods', 'title' => 'List Methods', 'desc' => 'List methods.'],
                    ['slug' => 'tuples', 'title' => 'Python Tuples', 'desc' => 'Python tuples.'],
                    ['slug' => 'access-tuples', 'title' => 'Access Tuples', 'desc' => 'Accessing tuple items.'],
                    ['slug' => 'update-tuples', 'title' => 'Update Tuples', 'desc' => 'Updating tuples.'],
                    ['slug' => 'unpack-tuples', 'title' => 'Unpack Tuples', 'desc' => 'Unpacking tuples.'],
                    ['slug' => 'loop-tuples', 'title' => 'Loop Tuples', 'desc' => 'Looping tuples.'],
                    ['slug' => 'join-tuples', 'title' => 'Join Tuples', 'desc' => 'Joining tuples.'],
                    ['slug' => 'tuple-methods', 'title' => 'Tuple Methods', 'desc' => 'Tuple methods.'],
                    ['slug' => 'sets', 'title' => 'Python Sets', 'desc' => 'Python sets.'],
                    ['slug' => 'access-sets', 'title' => 'Access Sets', 'desc' => 'Accessing set items.'],
                    ['slug' => 'add-sets', 'title' => 'Add Set Items', 'desc' => 'Adding set items.'],
                    ['slug' => 'remove-sets', 'title' => 'Remove Set Items', 'desc' => 'Removing set items.'],
                    ['slug' => 'loop-sets', 'title' => 'Loop Sets', 'desc' => 'Looping sets.'],
                    ['slug' => 'join-sets', 'title' => 'Join Sets', 'desc' => 'Joining sets.'],
                    ['slug' => 'frozenset', 'title' => 'Frozenset', 'desc' => 'Frozenset.'],
                    ['slug' => 'set-methods', 'title' => 'Set Methods', 'desc' => 'Set methods.'],
                    ['slug' => 'dictionaries', 'title' => 'Python Dictionaries', 'desc' => 'Python dictionaries.'],
                    ['slug' => 'access-dictionaries', 'title' => 'Access Dictionaries', 'desc' => 'Accessing dictionary items.'],
                    ['slug' => 'change-dictionaries', 'title' => 'Change Dictionaries', 'desc' => 'Changing dictionary items.'],
                    ['slug' => 'add-dictionaries', 'title' => 'Add Dictionary Items', 'desc' => 'Adding dictionary items.'],
                    ['slug' => 'remove-dictionaries', 'title' => 'Remove Dictionary Items', 'desc' => 'Removing dictionary items.'],
                    ['slug' => 'loop-dictionaries', 'title' => 'Loop Dictionaries', 'desc' => 'Looping dictionaries.'],
                    ['slug' => 'copy-dictionaries', 'title' => 'Copy Dictionaries', 'desc' => 'Copying dictionaries.'],
                    ['slug' => 'nested-dictionaries', 'title' => 'Nested Dictionaries', 'desc' => 'Nested dictionaries.'],
                    ['slug' => 'dictionary-methods', 'title' => 'Dictionary Methods', 'desc' => 'Dictionary methods.'],
                    ['slug' => 'if-else', 'title' => 'Python If...Else', 'desc' => 'Python if...else.'],
                    ['slug' => 'if', 'title' => 'If Statement', 'desc' => 'If statement.'],
                    ['slug' => 'elif', 'title' => 'Elif Statement', 'desc' => 'Elif statement.'],
                    ['slug' => 'else', 'title' => 'Else Statement', 'desc' => 'Else statement.'],
                    ['slug' => 'shorthand-if', 'title' => 'Shorthand If', 'desc' => 'Shorthand if.'],
                    ['slug' => 'logical-if', 'title' => 'Logical Operators If', 'desc' => 'Logical operators in if.'],
                    ['slug' => 'nested-if', 'title' => 'Nested If', 'desc' => 'Nested if.'],
                    ['slug' => 'pass', 'title' => 'Pass Statement', 'desc' => 'Pass statement.'],
                    ['slug' => 'match', 'title' => 'Python Match', 'desc' => 'Python match.'],
                    ['slug' => 'while-loops', 'title' => 'Python While Loops', 'desc' => 'Python while loops.'],
                    ['slug' => 'for-loops', 'title' => 'Python For Loops', 'desc' => 'Python for loops.'],
                ]
            ]
        ];
    }

    public static function getTopicContent(string $slug): ?array
    {
        $map = [
            'syntax' => [
                'code' => "if 5 > 2:\n    print(\"Five is greater than two!\")",
                'question' => 'Insert the missing indentation to make the code correct.',
                'prefix' => "if 5 > 2:\n",
                'suffix' => "print(\"Five is greater than two!\")",
                'answer' => '    '
            ],
            'variables' => [
                'code' => 'carname = "Volvo"',
                'question' => 'Create a variable named carname and assign the value Volvo to it.',
                'prefix' => '',
                'suffix' => ' = "Volvo"',
                'answer' => 'carname'
            ],
            'datatypes' => [
                'code' => 'x = 5; print(type(x))',
                'question' => 'The following code example would print the data type of x, what data type would that be?',
                'prefix' => 'x = 5; print(',
                'suffix' => '(x))',
                'answer' => 'type'
            ],
            'strings' => [
                'code' => 'x = "Hello World"; print(len(x))',
                'question' => 'Use the len function to print the length of the string.',
                'prefix' => 'x = "Hello World"; print(',
                'suffix' => '(x))',
                'answer' => 'len'
            ],
            'lists' => [
                'code' => 'fruits = ["apple", "banana", "cherry"]; print(fruits[1])',
                'question' => 'Print the second item in the fruits list.',
                'prefix' => 'fruits = ["apple", "banana", "cherry"]; print(',
                'suffix' => ')',
                'answer' => 'fruits[1]'
            ],
            'tuples' => [
                'code' => 'fruits = ("apple", "banana", "cherry"); print(fruits[0])',
                'question' => 'Print the first item in the fruits tuple.',
                'prefix' => 'fruits = ("apple", "banana", "cherry"); print(',
                'suffix' => ')',
                'answer' => 'fruits[0]'
            ],
            'sets' => [
                'code' => 'fruits = {"apple", "banana", "cherry"}; fruits.add("orange")',
                'question' => 'Use the add method to add "orange" to the fruits set.',
                'prefix' => 'fruits = {"apple", "banana", "cherry"}; ',
                'suffix' => '("orange")',
                'answer' => 'fruits.add'
            ],
            'dictionaries' => [
                'code' => 'car = {"brand": "Ford", "model": "Mustang", "year": 1964}; print(car.get("model"))',
                'question' => 'Use the get method to print the value of the "model" key of the car dictionary.',
                'prefix' => 'car = {"brand": "Ford", "model": "Mustang", "year": 1964}; print(',
                'suffix' => '("model"))',
                'answer' => 'car.get'
            ],
            'if-else' => [
                'code' => 'a = 50; b = 10; if a > b: print("Hello World")',
                'question' => 'Print "Hello World" if a is greater than b.',
                'prefix' => 'a = 50; b = 10; ',
                'suffix' => ' a > b: print("Hello World")',
                'answer' => 'if'
            ],
            'for-loops' => [
                'code' => 'fruits = ["apple", "banana", "cherry"]; for x in fruits: print(x)',
                'question' => 'Loop through the items in the fruits list.',
                'prefix' => 'fruits = ["apple", "banana", "cherry"]; ',
                'suffix' => ' x in fruits: print(x)',
                'answer' => 'for'
            ],
            'while-loops' => [
                'code' => 'i = 1; while i < 6: print(i); i += 1',
                'question' => 'Print i as long as i is less than 6.',
                'prefix' => 'i = 1; ',
                'suffix' => ' i < 6: print(i); i += 1',
                'answer' => 'while'
            ],
            'functions' => [
                'code' => 'def my_function(): print("Hello from a function")',
                'question' => 'Create a function named my_function.',
                'prefix' => '',
                'suffix' => ' my_function(): print("Hello from a function")',
                'answer' => 'def'
            ],
            'classes' => [
                'code' => 'class MyClass: x = 5',
                'question' => 'Create a class named MyClass.',
                'prefix' => '',
                'suffix' => ' MyClass: x = 5',
                'answer' => 'class'
            ],
            'modules' => [
                'code' => 'import mymodule',
                'question' => 'What is the correct syntax to import a module named "mymodule"?',
                'prefix' => '',
                'suffix' => ' mymodule',
                'answer' => 'import'
            ]
        ];
        return $map[$slug] ?? null;
    }
}

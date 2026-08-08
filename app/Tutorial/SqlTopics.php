<?php

namespace App\Tutorial;

class SqlTopics
{
    public static function getTopics(): array
    {
        return [
            [
                'category' => 'SQL Tutorial',
                'items' => [
                    ['slug' => 'introduction', 'title' => 'SQL HOME', 'desc' => 'Introduction to SQL.'],
                    ['slug' => 'intro', 'title' => 'SQL Intro', 'desc' => 'What is SQL?'],
                    ['slug' => 'syntax', 'title' => 'SQL Syntax', 'desc' => 'SQL syntax rules.'],
                    ['slug' => 'select', 'title' => 'SQL Select', 'desc' => 'The SELECT statement.'],
                    ['slug' => 'distinct', 'title' => 'SQL Select Distinct', 'desc' => 'The SELECT DISTINCT statement.'],
                    ['slug' => 'where', 'title' => 'SQL Where', 'desc' => 'The WHERE clause.'],
                    ['slug' => 'orderby', 'title' => 'SQL Order By', 'desc' => 'The ORDER BY keyword.'],
                    ['slug' => 'and', 'title' => 'SQL And', 'desc' => 'The AND operator.'],
                    ['slug' => 'or', 'title' => 'SQL Or', 'desc' => 'The OR operator.'],
                    ['slug' => 'not', 'title' => 'SQL Not', 'desc' => 'The NOT operator.'],
                    ['slug' => 'insert', 'title' => 'SQL Insert Into', 'desc' => 'The INSERT INTO statement.'],
                    ['slug' => 'null-values', 'title' => 'SQL Null Values', 'desc' => 'What are NULL values?'],
                    ['slug' => 'update', 'title' => 'SQL Update', 'desc' => 'The UPDATE statement.'],
                    ['slug' => 'delete', 'title' => 'SQL Delete', 'desc' => 'The DELETE statement.'],
                    ['slug' => 'select-top', 'title' => 'SQL Select Top', 'desc' => 'The SELECT TOP clause.'],
                    ['slug' => 'aggregate', 'title' => 'SQL Aggregate Functions', 'desc' => 'Aggregate Functions.'],
                    ['slug' => 'min', 'title' => 'SQL Min()', 'desc' => 'The MIN() function.'],
                    ['slug' => 'max', 'title' => 'SQL Max()', 'desc' => 'The MAX() function.'],
                    ['slug' => 'count', 'title' => 'SQL Count()', 'desc' => 'The COUNT() function.'],
                    ['slug' => 'sum', 'title' => 'SQL Sum()', 'desc' => 'The SUM() function.'],
                    ['slug' => 'avg', 'title' => 'SQL Avg()', 'desc' => 'The AVG() function.'],
                    ['slug' => 'like', 'title' => 'SQL Like', 'desc' => 'The LIKE operator.'],
                    ['slug' => 'wildcards', 'title' => 'SQL Wildcards', 'desc' => 'SQL Wildcard Characters.'],
                    ['slug' => 'in', 'title' => 'SQL In', 'desc' => 'The IN operator.'],
                    ['slug' => 'between', 'title' => 'SQL Between', 'desc' => 'The BETWEEN operator.'],
                    ['slug' => 'aliases', 'title' => 'SQL Aliases', 'desc' => 'SQL Aliases.'],
                    ['slug' => 'joins', 'title' => 'SQL Joins', 'desc' => 'SQL Joins.'],
                    ['slug' => 'inner-join', 'title' => 'SQL Inner Join', 'desc' => 'The INNER JOIN keyword.'],
                    ['slug' => 'left-join', 'title' => 'SQL Left Join', 'desc' => 'The LEFT JOIN keyword.'],
                    ['slug' => 'right-join', 'title' => 'SQL Right Join', 'desc' => 'The RIGHT JOIN keyword.'],
                    ['slug' => 'full-join', 'title' => 'SQL Full Join', 'desc' => 'The FULL OUTER JOIN keyword.'],
                    ['slug' => 'self-join', 'title' => 'SQL Self Join', 'desc' => 'The Self Join.'],
                    ['slug' => 'union', 'title' => 'SQL Union', 'desc' => 'The UNION operator.'],
                    ['slug' => 'union-all', 'title' => 'SQL Union All', 'desc' => 'The UNION ALL operator.'],
                    ['slug' => 'groupby', 'title' => 'SQL Group By', 'desc' => 'The GROUP BY statement.'],
                    ['slug' => 'having', 'title' => 'SQL Having', 'desc' => 'The HAVING clause.'],
                    ['slug' => 'exists', 'title' => 'SQL Exists', 'desc' => 'The EXISTS operator.'],
                    ['slug' => 'any', 'title' => 'SQL Any', 'desc' => 'The ANY operator.'],
                    ['slug' => 'all', 'title' => 'SQL All', 'desc' => 'The ALL operator.'],
                    ['slug' => 'select-into', 'title' => 'SQL Select Into', 'desc' => 'The SELECT INTO statement.'],
                    ['slug' => 'insert-into-select', 'title' => 'SQL Insert Into Select', 'desc' => 'The INSERT INTO SELECT statement.'],
                    ['slug' => 'case', 'title' => 'SQL Case', 'desc' => 'The CASE statement.'],
                    ['slug' => 'null-functions', 'title' => 'SQL Null Functions', 'desc' => 'SQL IFNULL(), ISNULL(), COALESCE(), and NVL().'],
                    ['slug' => 'stored-procedures', 'title' => 'SQL Stored Procedures', 'desc' => 'Stored Procedures for SQL.'],
                    ['slug' => 'comments', 'title' => 'SQL Comments', 'desc' => 'SQL Comments.'],
                    ['slug' => 'operators', 'title' => 'SQL Operators', 'desc' => 'SQL Operators.'],
                ]
            ],
            [
                'category' => 'SQL Database',
                'items' => [
                    ['slug' => 'create-db', 'title' => 'SQL Create DB', 'desc' => 'The CREATE DATABASE statement.'],
                    ['slug' => 'drop-db', 'title' => 'SQL Drop DB', 'desc' => 'The DROP DATABASE statement.'],
                    ['slug' => 'backup-db', 'title' => 'SQL Backup DB', 'desc' => 'The BACKUP DATABASE statement.'],
                    ['slug' => 'create-table', 'title' => 'SQL Create Table', 'desc' => 'The CREATE TABLE statement.'],
                    ['slug' => 'drop-table', 'title' => 'SQL Drop Table', 'desc' => 'The DROP TABLE statement.'],
                    ['slug' => 'alter-table', 'title' => 'SQL Alter Table', 'desc' => 'The ALTER TABLE statement.'],
                    ['slug' => 'constraints', 'title' => 'SQL Constraints', 'desc' => 'SQL Constraints.'],
                    ['slug' => 'not-null', 'title' => 'SQL Not Null', 'desc' => 'The NOT NULL Constraint.'],
                    ['slug' => 'unique', 'title' => 'SQL Unique', 'desc' => 'The UNIQUE Constraint.'],
                    ['slug' => 'primary-key', 'title' => 'SQL Primary Key', 'desc' => 'The PRIMARY KEY Constraint.'],
                    ['slug' => 'foreign-key', 'title' => 'SQL Foreign Key', 'desc' => 'The FOREIGN KEY Constraint.'],
                    ['slug' => 'check', 'title' => 'SQL Check', 'desc' => 'The CHECK Constraint.'],
                    ['slug' => 'default', 'title' => 'SQL Default', 'desc' => 'The DEFAULT Constraint.'],
                    ['slug' => 'create-index', 'title' => 'SQL Create Index', 'desc' => 'The CREATE INDEX Statement.'],
                    ['slug' => 'auto-increment', 'title' => 'SQL Auto Increment', 'desc' => 'Auto Increment Field.'],
                    ['slug' => 'dates', 'title' => 'SQL Dates', 'desc' => 'Working with Dates.'],
                    ['slug' => 'views', 'title' => 'SQL Views', 'desc' => 'SQL Views.'],
                    ['slug' => 'injection', 'title' => 'SQL Injection', 'desc' => 'SQL Injection.'],
                    ['slug' => 'parameters', 'title' => 'SQL Parameters', 'desc' => 'SQL Parameters.'],
                    ['slug' => 'prepared-statements', 'title' => 'SQL Prepared Statements', 'desc' => 'Prepared Statements.'],
                    ['slug' => 'hosting', 'title' => 'SQL Hosting', 'desc' => 'SQL Hosting.'],
                ]
            ]
        ];
    }

    public static function getTopicContent(string $slug): ?array
    {
        $map = [
            'select' => [
                'code' => 'SELECT * FROM Customers;',
                'question' => 'Select all columns from the Customers table.',
                'prefix' => 'SELECT ',
                'suffix' => ' FROM Customers;',
                'answer' => '*'
            ],
            'where' => [
                'code' => 'SELECT * FROM Customers WHERE City = \'Berlin\';',
                'question' => 'Select all records where the City column has the value "Berlin".',
                'prefix' => 'SELECT * FROM Customers ',
                'suffix' => ' City = \'Berlin\';',
                'answer' => 'WHERE'
            ],
            'orderby' => [
                'code' => 'SELECT * FROM Customers ORDER BY City;',
                'question' => 'Sort the result alphabetically by the column City.',
                'prefix' => 'SELECT * FROM Customers ',
                'suffix' => ' City;',
                'answer' => 'ORDER BY'
            ],
            'insert' => [
                'code' => 'INSERT INTO Customers (CustomerName, City) VALUES (\'Cardinal\', \'Stavanger\');',
                'question' => 'Insert a new record in the Customers table.',
                'prefix' => 'INSERT ',
                'suffix' => ' Customers (CustomerName, City) VALUES (\'Cardinal\', \'Stavanger\');',
                'answer' => 'INTO'
            ],
            'update' => [
                'code' => 'UPDATE Customers SET City = \'Oslo\';',
                'question' => 'Update the City column of all records in the Customers table.',
                'prefix' => '',
                'suffix' => ' Customers SET City = \'Oslo\';',
                'answer' => 'UPDATE'
            ],
            'delete' => [
                'code' => 'DELETE FROM Customers WHERE Country = \'Norway\';',
                'question' => 'Delete all the records from the Customers table where the Country value is "Norway".',
                'prefix' => 'DELETE ',
                'suffix' => ' Customers WHERE Country = \'Norway\';',
                'answer' => 'FROM'
            ],
            'joins' => [
                'code' => 'SELECT Orders.OrderID, Customers.CustomerName FROM Orders JOIN Customers ON Orders.CustomerID = Customers.CustomerID;',
                'question' => 'Join the Orders and Customers tables.',
                'prefix' => 'SELECT Orders.OrderID, Customers.CustomerName FROM Orders ',
                'suffix' => ' Customers ON Orders.CustomerID = Customers.CustomerID;',
                'answer' => 'JOIN'
            ],
            'inner-join' => [
                'code' => 'SELECT Orders.OrderID, Customers.CustomerName FROM Orders INNER JOIN Customers ON Orders.CustomerID = Customers.CustomerID;',
                'question' => 'Choose the correct JOIN clause to select all records from the two tables where there is a match in both tables.',
                'prefix' => 'SELECT Orders.OrderID, Customers.CustomerName FROM Orders ',
                'suffix' => ' Customers ON Orders.CustomerID = Customers.CustomerID;',
                'answer' => 'INNER JOIN'
            ],
            'left-join' => [
                'code' => 'SELECT Customers.CustomerName, Orders.OrderID FROM Customers LEFT JOIN Orders ON Customers.CustomerID = Orders.CustomerID;',
                'question' => 'Choose the correct JOIN clause to select all the records from the Customers table plus all the matches in the Orders table.',
                'prefix' => 'SELECT Customers.CustomerName, Orders.OrderID FROM Customers ',
                'suffix' => ' Orders ON Customers.CustomerID = Orders.CustomerID;',
                'answer' => 'LEFT JOIN'
            ],
            'groupby' => [
                'code' => 'SELECT COUNT(CustomerID), Country FROM Customers GROUP BY Country;',
                'question' => 'Group the records by the Country column.',
                'prefix' => 'SELECT COUNT(CustomerID), Country FROM Customers ',
                'suffix' => ' Country;',
                'answer' => 'GROUP BY'
            ],
            'having' => [
                'code' => 'SELECT COUNT(CustomerID), Country FROM Customers GROUP BY Country HAVING COUNT(CustomerID) > 5;',
                'question' => 'Filter the grouped records to show only countries with more than 5 customers.',
                'prefix' => 'SELECT COUNT(CustomerID), Country FROM Customers GROUP BY Country ',
                'suffix' => ' COUNT(CustomerID) > 5;',
                'answer' => 'HAVING'
            ],
            'create-table' => [
                'code' => 'CREATE TABLE Persons (PersonID int, LastName varchar(255), FirstName varchar(255), Address varchar(255), City varchar(255));',
                'question' => 'Write the correct SQL statement to create a new table called Persons.',
                'prefix' => 'CREATE ',
                'suffix' => ' Persons (PersonID int, LastName varchar(255), FirstName varchar(255), Address varchar(255), City varchar(255));',
                'answer' => 'TABLE'
            ],
            'primary-key' => [
                'code' => 'CREATE TABLE Persons (ID int NOT NULL PRIMARY KEY, LastName varchar(255) NOT NULL, FirstName varchar(255));',
                'question' => 'Add a primary key on the "ID" column.',
                'prefix' => 'CREATE TABLE Persons (ID int NOT NULL ',
                'suffix' => ', LastName varchar(255) NOT NULL, FirstName varchar(255));',
                'answer' => 'PRIMARY KEY'
            ],
            'foreign-key' => [
                'code' => 'CREATE TABLE Orders (OrderID int NOT NULL PRIMARY KEY, OrderNumber int NOT NULL, PersonID int FOREIGN KEY REFERENCES Persons(PersonID));',
                'question' => 'Add a foreign key on the "PersonID" column.',
                'prefix' => 'CREATE TABLE Orders (OrderID int NOT NULL PRIMARY KEY, OrderNumber int NOT NULL, PersonID int ',
                'suffix' => ' REFERENCES Persons(PersonID));',
                'answer' => 'FOREIGN KEY'
            ]
        ];
        return $map[$slug] ?? null;
    }
}

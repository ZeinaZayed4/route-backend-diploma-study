-- Use database `route_test`
USE `route_test`;

-- Select (read)
SELECT `customerName` FROM customers;
SELECT * FROM `customers`;
SELECT DISTINCT `country` FROM `customers`;
SELECT DISTINCT `customerName`, `country` FROM `customers`;
SELECT `customerName`, `country` FROM `customers` WHERE country = 'USA';

-- Customers of numbers 120-130
SELECT `customerNumber`, `customerName`
FROM `customers`
WHERE `customerNumber` BETWEEN 120 AND 130;

-- Customers in France, USA, Australia
SELECT `customerName`, `country`
FROM `customers`
WHERE `country` IN ('France', 'USA', 'Australia');

-- Customers not in France, USA, Australia
SELECT `customerName`, `country`
FROM `customers`
WHERE `country` NOT IN ('France', 'USA', 'Australia');

-- Orders with null comment
SELECT `orderNumber`, `comments`
FROM `orders`
WHERE ISNULL(`comments`);

-- Orders with required data in month 03
SELECT `orderNumber`, `orderDate`
FROM `orders`
# WHERE MONTH(`requiredDate`) = '03';
WHERE `orderDate` LIKE '%-03-%';

-- Order & Limit
SELECT `customerNumber`, `customerName`
FROM `customers`
ORDER BY `customerNumber` DESC;

SELECT `customerNumber`, `customerName`, `contactFirstName`, `contactLastName`
FROM `customers`
ORDER BY `contactFirstName` DESC, `contactLastName` DESC;

SELECT `customerNumber`, `customerName`, `country`, `creditLimit`
FROM `customers`
WHERE `country` = 'USA'
ORDER BY `creditLimit` DESC LIMIT 1;

SELECT `customerNumber`, `customerName`, `country`, `creditLimit`
FROM `customers`
WHERE `country` = 'USA'
ORDER BY `creditLimit` DESC LIMIT 1 OFFSET 1;

-- Aggregate functions
    -- Count distinct country
    SELECT COUNT(DISTINCT `country`)
    FROM `customers`;

    -- Max credit limit in USA
    SELECT MAX(`creditLimit`) AS maxLimit
    FROM `customers`
    WHERE `country` = 'USA';

    -- Count of customers in each country
    SELECT `country`, COUNT(`customerNumber`) AS NumberOfCustomers
    FROM `customers`
    GROUP BY `country`
    ORDER BY `NumberOfCustomers` DESC;

    -- Total credit limits in each country
    SELECT `country`, SUM(`creditLimit`) AS SumOfCreditLimit
    FROM `customers`
    GROUP BY `country`
    ORDER BY `SumOfCreditLimit` DESC;

    -- Total credit limits in each state in the USA
    SELECT `state`, SUM(`creditLimit`) AS SumOfCreditLimit
    FROM `customers`
    WHERE `country` = 'USA'
    GROUP BY `state`
    ORDER BY `state` DESC;

    -- Same as the last, but display only more than 100,000
    SELECT `state`, SUM(`creditLimit`) AS SumOfCreditLimit
    FROM `customers`
    WHERE `country` = 'USA'
    GROUP BY `state`
    HAVING SumOfCreditLimit > 100000
    ORDER BY `state` DESC;

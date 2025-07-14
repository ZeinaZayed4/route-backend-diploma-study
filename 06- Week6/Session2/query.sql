-- Use `route_test`
USE `route_test`;

-- CONCAT()
SELECT CONCAT(TRIM(`contactFirstName`), SPACE(1), TRIM(`contactLastName`)) AS FullName
FROM `customers`;

-- Math operations
SELECT `orderNumber`, SUM(`quantityOrdered` * `priceEach`) AS TotalPrice
FROM `orderdetails`
GROUP BY `orderNumber`;

-- Subqueries
SELECT `customerNumber`, `customerName`, `creditLimit`
FROM `customers`
WHERE `creditLimit` > (
    SELECT AVG(`creditLimit`)
    FROM `customers`
);

SELECT `customerNumber`, `customerName`, `country`
FROM `customers`
WHERE `country` = (
        SELECT `country`
        FROM `customers`
        GROUP BY `country`
        ORDER BY COUNT(`customerNumber`) DESC LIMIT 1
);

SELECT *
FROM `orders`
WHERE `customerNumber` IN (
    SELECT `customerNumber`
    FROM `customers`
    WHERE `country` = 'USA'
);

USE `route`;

-- Join
SELECT * FROM `users`
INNER JOIN `posts`
ON users.id = posts.user_id;

SELECT * FROM `users`
LEFT JOIN `posts`
ON users.id = posts.user_id;

SELECT * FROM `users`
RIGHT JOIN `posts`
ON users.id = posts.user_id;


-- Examples
-- 1. All orders with customer names.
USE `route_test`;

SELECT `orders`.*, `customers`.`customerName`
FROM `orders`
JOIN `customers`
ON orders.customerNumber = customers.customerNumber;

-- 2. 2003 January orders with all order details.
SELECT `orderdetails`.*, `orders`.orderDate
FROM `orders`
JOIN `orderdetails`
ON orders.orderNumber = orderdetails.orderNumber
WHERE
    MONTH(orderDate) = '1' AND
    YEAR(orderDate) = '2003';

-- 3. Orders with all order details + customer names.
SELECT orders.orderNumber, orderdetails.*, customers.customerName
FROM orders
JOIN customers
JOIN orderdetails
ON orders.customerNumber = customers.customerNumber
AND orders.orderNumber = orderdetails.orderNumber;

-- 4. Employees with their managers.
SELECT e.employeeNumber, m.firstName
FROM employees e
JOIN employees m
ON e.employeeNumber = m.reportsTo;

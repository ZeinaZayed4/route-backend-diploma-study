USE `route_test`;

-- add index
ALTER TABLE `customers`
ADD INDEX(`customerName`);

SELECT `customerName`
FROM `customers`;

-- delete index
ALTER TABLE `customers`
DROP INDEX `customerName`;

-- create view
USE `route`;

CREATE VIEW usersPosts AS (
    SELECT users.id users_id, users.name, users.email, users.phone, users.age, users.gender, users.bio, users.created_at users_time,
           posts.id posts_id, posts.title, posts.body, posts.created_at posts_time
    FROM `users`
    JOIN `posts`
    ON users.id = posts.user_id
);

-- delete view
DROP VIEW `usersPosts`;

-- string functions
USE `route_test`;

SELECT LOWER('ZEINA ZAYED');
SELECT UPPER('zeina zayed');

SELECT CONCAT(TRIM(firstName), SPACE(1), TRIM(lastName)) AS full_name
FROM employees;

SELECT FORMAT(250500.5634, 2);

SELECT LEFT('Zeina Zayed', 5);
SELECT RIGHT('Zeina Zayed', 5);

SELECT LPAD('Zeina Zayed', 20, 'ABC ');
SELECT RPAD('Zeina Zayed', 20, 'ABC ');

SELECT REPEAT('Zeina ', 4);

SELECT REPLACE('Zeina Zayed', ' ', '|');

-- numeric functions
SELECT AVG(`priceEach`) AS average_price
FROM `orderdetails`;

SELECT TRUNCATE(124.268, 2);

SELECT CEIL(24.75);
SELECT FLOOR(24.75);
SELECT ROUND(24.75);
SELECT ROUND(24.23);

SELECT POW(2, 4);

-- date functions
SELECT ADDDATE('2025-07-15', INTERVAL 10 DAY);
SELECT SUBDATE('2025-07-15', INTERVAL 1 MONTH);

SELECT ADDTIME('2025-07-15 8:0:0', '4:4:4');

SELECT CURRENT_DATE();
SELECT CURRENT_TIME();
SELECT CURRENT_TIMESTAMP;

SELECT DATEDIFF(`requiredDate`, `shippedDate`)
FROM `orders`;

SELECT DATE_FORMAT('2025-07-15', '%y %M %d');

SELECT SYSDATE();

-- variables
SET @country = (
    SELECT `country`
    FROM `customers`
    GROUP BY `country`
    ORDER BY COUNT(`customerNumber`) DESC LIMIT 1
);

SELECT `customerNumber`, `customerName`, `country`
FROM `customers`
WHERE `country` = @country;

-- conditions
SELECT IFNULL(`state`, 'No state')
FROM `customers`;

SELECT NULLIF(`addressLine2`, `state`)
FROM `customers`;

SELECT ISNULL(`comments`)
FROM `orders`;

SELECT COALESCE(`state`, `addressLine2`, 'Egypt')
FROM `customers`;

SELECT `customerName`,
CASE
    WHEN `state` IS NULL THEN `country`
    WHEN `state` IS NOT NULL THEN `state`
END
FROM `customers`;

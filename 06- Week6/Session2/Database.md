# Database

## Operations
- Math operators `+ - * / %`.
- CONCAT().
- Code:
  ```mysql
    SELECT CONCAT(TRIM(`contactFirstName`), SPACE(1), TRIM(`contactLastName`)) AS FullName
    FROM `customers`;
  ```
  ```mysql
    SELECT `orderNumber`, SUM(`quantityOrdered` * `priceEach`) AS TotalPrice
    FROM `orderdetails`
    GROUP BY `orderNumber`;
  ```

## Subqueries
- Use an inner query result in outer query.
- The result should be as same as WHERE condition expected values.
- Examples:
  1. All customers who have credit limit greater than the average.
      - Solution:
        ```mysql
          SELECT `customerNumber`, `customerName`, `creditLimit`
          FROM `customers`
          WHERE `creditLimit` > (
              SELECT AVG(`creditLimit`)
              FROM `customers`
          );
        ```
  2. All customers in the country that have the maximum number of customers.
      - Solution:
        ```mysql
          SELECT `customerNumber`, `customerName`, `country`
          FROM `customers`
          WHERE `country` = (
              SELECT `country`
              FROM `customers`
              GROUP BY `country`
              ORDER BY COUNT(`customerNumber`) DESC LIMIT 1
          );
        ```
  3. Orders made by customers who live in the USA.
     - Solution:
       ```mysql
        SELECT *
        FROM `orders`
        WHERE `customerNumber` IN (
            SELECT `customerNumber`
            FROM `customers`
            WHERE `country` = 'USA'
        );
       ```

## Join
- Joins are used to combine rows from two or more tables, based on related column between them.
- Types:
  - Inner. 
    ```mysql
    SELECT * FROM `users`
    INNER JOIN `posts`
    ON users.id = posts.user_id;
    ```
  - Full.
  - Outer (Left, Right).
    - Left:
      ```mysql
      SELECT * FROM `users`
      LEFT JOIN `posts`
      ON users.id = posts.user_id;
      ```
    - Right:
      ```mysql
      SELECT * FROM `users`
      RIGHT JOIN `posts`
      ON users.id = posts.user_id;
      ```
  - Self.
  
- Examples:
1. All orders with customer names.
    ```mysql
    SELECT `orders`.*, `customers`.`customerName`
    FROM `orders`
    JOIN `customers`
    ON orders.customerNumber = customers.customerNumber;
    ```
2. 2003 January orders with all order details.
    ```mysql
    SELECT `orderdetails`.*, `orders`.orderDate
    FROM `orders`
    JOIN `orderdetails`
    ON orders.orderNumber = orderdetails.orderNumber
    WHERE
        MONTH(orderDate) = '1' AND
        YEAR(orderDate) = '2003';
    ```
3. Orders with all order details + customer names.
    ```mysql
    SELECT orders.orderNumber, orderdetails.*, customers.customerName
    FROM orders
    JOIN customers
    JOIN orderdetails
    ON orders.customerNumber = customers.customerNumber
    AND orders.orderNumber = orderdetails.orderNumber;
    ```
4. Employees with their managers.
    ```mysql
    SELECT e.employeeNumber, m.firstName
    FROM employees e
    JOIN employees m
    ON e.employeeNumber = m.reportsTo;
    ```

# Database

## Select (read)
1. SELECT col
    ```mysql
      SELECT `customerName` FROM customers;
    ```
2. SELECT *
    ```mysql
      SELECT * FROM `customers`;
    ```
3. SELECT DISTINCT
    ```mysql
      SELECT DISTINCT `country` FROM `customers`;
    ```
4. SELECT DISTINCT two or more
    ```mysql
      SELECT DISTINCT `customerName`, `country` FROM `customers`;
    ```
5. WHERE: to filter records.
    ```mysql
      SELECT `customerName`, `country` FROM `customers` WHERE country = 'USA';
    ```

## Examples:
1. Customers of numbers 120–130.
   ```mysql
     SELECT `customerNumber`, `customerName`
     FROM `customers`
     WHERE `customerNumber` BETWEEN 120 AND 130;
   ```
2. Customers in France, USA, Australia.
   ```mysql
    SELECT `customerName`, `country`
    FROM `customers`
    WHERE `country` IN ('France', 'USA', 'Australia');
   ```
3. Customers not in France, USA, Australia.
   ```mysql
    SELECT `customerName`, `country`
    FROM `customers`
    WHERE `country` NOT IN ('France', 'USA', 'Australia');
   ```
4. Orders with null comment
   ```mysql
    SELECT `orderNumber`, `comments`
    FROM `orders`
    WHERE ISNULL(`comments`);
   ```
5. Orders with required data in month 03
   ```mysql
    SELECT `orderNumber`, `orderDate`
    FROM `orders`
    # WHERE MONTH(`requiredDate`) = '03';
    WHERE `orderDate` LIKE '%-03-%';
   ```

## LIKE
- % ⇒ Any number of characters.
- _ ⇒ One character.

## Order & Limit
- Code 1:
    ```mysql
     SELECT `customerNumber`, `customerName`
     FROM `customers`
     ORDER BY `customerNumber` DESC;
    ```
- Code 2:
    ```mysql
     SELECT `customerNumber`, `customerName`, `contactFirstName`, `contactLastName`
     FROM `customers`
     ORDER BY `contactFirstName` DESC, `contactLastName` DESC;
    ```
- Code 3:
    ```mysql
     SELECT `customerNumber`, `customerName`, `country`, `creditLimit`
     FROM `customers`
     WHERE `country` = 'USA'
     ORDER BY `creditLimit` DESC LIMIT 1;
    ```
- Offset = (Page - 1) * Limit.

  | Limit | Offset | Page |
  |-------|--------|------|
  | 10    | 0      | 1    |
  | 10    | 1      | 2    |
  | 10    | 2      | 3    |

- Code 4:
    ```mysql
     SELECT `customerNumber`, `customerName`, `country`, `creditLimit`
     FROM `customers`
     WHERE `country` = 'USA'
     ORDER BY `creditLimit` DESC LIMIT 1 OFFSET 1; # selects second max creditNumber
    ```

## Aggregate Functions
- Perform a calculation on a set of values to return a single value.
- MIN, MAX, COUNT, SUM, AVG.
- Column name aliases using AS.
- Group the result-set by a column (GROUP BY).
- Conditions in a group.

1. Count distinct country.
   ```mysql
    SELECT COUNT(DISTINCT `country`)
    FROM `customers`;
   ```
2. Max credit limit in USA.
    ```mysql
     SELECT MAX(`creditLimit`) AS maxLimit
     FROM `customers`
     WHERE `country` = 'USA';
    ```
3. Count of customers in each country.
    ```mysql
     SELECT `country`, COUNT(`customerNumber`) AS NumberOfCustomers
     FROM `customers`
     GROUP BY `country`
     ORDER BY `NumberOfCustomers` DESC;
    ```
4. Total credit limits in each country.
    ```mysql
     SELECT `country`, SUM(`creditLimit`) AS SumOfCreditLimit
     FROM `customers`
     GROUP BY `country`
     ORDER BY `SumOfCreditLimit` DESC;
    ```
5. Total credit limits in each state of the USA.
    ```mysql
     SELECT `state`, SUM(`creditLimit`) AS SumOfCreditLimit
     FROM `customers`
     WHERE `country` = 'USA'
     GROUP BY `state`
     ORDER BY `state` DESC;
    ```
6. Same as 5, but display only more than 100,000.
    ```mysql
     SELECT `state`, SUM(`creditLimit`) AS SumOfCreditLimit
     FROM `customers`
     WHERE `country` = 'USA'
     GROUP BY `state`
     HAVING SumOfCreditLimit > 100000
     ORDER BY `state` DESC;
    ```

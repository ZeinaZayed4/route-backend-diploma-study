# Database

## Databases
- An organized collection of data, stored and accessed electronically from a computer system.
- **DBMS** is the software that interacts with end users, applications, and the database itself to capture and analyze data.

## SQL vs. NoSQL
| SQL                                                                                                                                                                                                                                                                         | NoSQL                                                                                                                                                                                                                
|:----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|:---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|
| Use Structured query language (SQL) for defining and manipulating data.                                                                                                                                                                                                     | Don't require fixed schema.                                                                                                                                                                                          |
| Follow ACID properties (Atomicity, Consistency, Isolation, Durability).                                                                                                                                                                                                     | Handle unstructured or semi-structured data well.                                                                                                                                                                    |
| Store data in tables with predefined schemas.                                                                                                                                                                                                                               | Often prioritize scalability and performance over strict consistency.                                                                                                                                                |
| Strong consistency and data integrity.                                                                                                                                                                                                                                      | ..                                                                                                                                                                                                                   |
| Examples: MySQL, PostgreSQL, Oracle, SQL Server, SQLite.                                                                                                                                                                                                                    | Come in different types: document stores (MongoDB), key-value stores (Redis), column-family (Cassandra), graph database (Neo4j).                                                                                     |
| Horizontal scaling is difficult / impossible, vertical scaling is possible.                                                                                                                                                                                                 | Both horizontal and vertical scaling are possible.
| When to use SQL:<br /> 1. Complex queries and transactions.<br /> 2. Strong data consistency requirements.<br /> 3. Well-defined, stable data structures.<br /> 4. Financial systems, inventory management.<br /> 5. When you need mature tooling and widespread expertise. | When to use NoSQL:<br /> 1. Rapid development with changing requirements.<br /> 2. Massive scale and high traffic.<br /> 3. Flexible data models.<br /> 4. Real-time applications, content management.<br /> 5. Big data and analytical workloads. |

## Tables
- Data types:
  - Integer.
  - Float.
  - Double.
  - Boolean.
  - Varchar => max(255).
  - Text (no limit).
  - Enum.
  - Data.
  - Time.
  - DateTime.
- Constraints:
  - Not null.
  - Unique.
  - Default.
- Keys:
  - Primary: unique required Identifier.
  - Foreign: for relationships between tables.

## Create Database
- Code:
  ```mysql
    CREATE DATABASE route COLLATE utf8mb4_unicode_ci;
  ```
- Collate:
  - utf8 => supports all languages.
  - mb4 => supports emojis.
  - ci => case-insensitive.

## Drop Database
- Code:
  ```mysql
    DROP DATABASE route;
  ```

## Tables
1. Table name.
2. Attributes.
3. Data type.
4. Constraints.

- Table 1 (users):
  - Code
    ```mysql
      CREATE TABLE `users` (
         `id` INT(11) UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
         `name` VARCHAR(50) NOT NULL,
         `email` VARCHAR(50) NOT NULL UNIQUE,
         `phone` VARCHAR(15) NOT NULL,
         `age` INT(3),
         `gender` ENUM('male', 'female') DEFAULT 'male',
         `bio` TEXT,
         `created_at` DATETIME DEFAULT CURRENT_TIMESTAMP
      );
    ```
- Table 2 (posts):
  - Code:
    ```mysql
      CREATE TABLE `posts` (
          `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
          `title` VARCHAR(255) NOT NULL,
          `body` TEXT,
          `created_at` DATETIME DEFAULT CURRENT_TIMESTAMP,
          `user_id` INT(11) UNSIGNED NOT NULL,
          PRIMARY KEY(id),
          FOREIGN KEY(user_id) REFERENCES users(id)
    );
    ```

## Insert Data Into `users` table
- Code:
  ```mysql
    INSERT INTO `users` (`name`, `email`, `phone`, `age`, `gender`, `bio`)
    VALUES ('Zeina', 'zeina@gmail.com', '123456789', 23, 'female', 'Nothing');
  ```

## Insert Data Into `posts` table
- Code:
  ```mysql
    INSERT INTO `posts` (`title`, `body`, `user_id`)
    VALUES ('The little prince', 'Only with heart', 1);
  ```

## Update Data
- Code:
  ```mysql
    UPDATE `users` SET `name` = 'Zeina Zayed' WHERE `id` = 1;
  ```
  
## Delete Data
- Code:
  ```mysql
    DELETE FROM `posts` WHERE `id` = 1;
  ```

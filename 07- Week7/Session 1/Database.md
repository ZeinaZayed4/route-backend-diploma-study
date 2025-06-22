# Database

## Many-to-Many
- A many-to-many relationship exists when multiple records in one table are linked to different records in another table.
- Code:
  [Many-to-Many](many-to-many.sql)

## Alter
- Code:
  [Alter](alter.sql)

## Different Ways to Work with MySQL
1) phpMyAdmin (GUI).
2) Shell (from XAMPP or Laragon).
    ```shell
    mysql -u user_name -p password
    SHOW DATABASES;
    USE database_name;
    SHOW TABLES;
    DESCRIBE column_name;
    ```
3) CMD.
   - Access the directory.
   - Then, the same instructions as shell.
4) Workbench (GUI).
  - Connect to MySQL.

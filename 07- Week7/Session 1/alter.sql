USE `route`;

-- Add column
ALTER TABLE `Courses`
    ADD COLUMN `price` DECIMAL(8)
    AFTER `name`;

-- Delete column
ALTER TABLE `Courses`
    DROP COLUMN `price`;

ALTER TABLE `Courses`
    ADD COLUMN `price` DECIMAL(8)
    AFTER `name`;

-- Modify table (change name)
ALTER TABLE `Courses`
    CHANGE `price` `course_price` DECIMAL(8);

-- Modify table (change datatype)
ALTER TABLE `Courses`
    MODIFY COLUMN `course_price` DOUBLE;

USE `route`;

-- Create table `Students`
CREATE TABLE `Students`
(
    `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `name` VARCHAR(50) NOT NULL
);

-- Create table `Courses`
CREATE TABLE `Courses`
(
    `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `name` VARCHAR(50) NOT NULL
);

INSERT INTO `Students` (`name`)
VALUES ('Zeina'), ('Hana'), ('Adam');

INSERT INTO `Courses` (`name`)
VALUES ('PHP'), ('CSS'), ('HTML');

-- Create table `Course_Student`
CREATE TABLE `Course_Student`
(
    `student_id` INT(11) UNSIGNED,
    `course_id` INT(11) UNSIGNED,
    PRIMARY KEY (`student_id`, `course_id`),
    CONSTRAINT fk_student_id
        FOREIGN KEY (`student_id`) REFERENCES Students(`id`) ON UPDATE CASCADE ON DELETE CASCADE,
    CONSTRAINT fk_course_id
        FOREIGN KEY (`course_id`) REFERENCES Courses(`id`) ON UPDATE CASCADE ON DELETE CASCADE
);

INSERT INTO `Course_Student` (student_id, course_id)
VALUES (1, 1),
       (1, 2),
       (2, 3),
       (3, 1),
       (3, 3);



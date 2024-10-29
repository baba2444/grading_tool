-- Create Database
CREATE DATABASE IF NOT EXISTS my_grading;
USE my_grading;

/* Drop existing tables  */
DROP TABLE IF EXISTS students;
DROP TABLE IF EXISTS homework_grades;
DROP TABLE IF EXISTS quiz_grades;
DROP TABLE IF EXISTS final_grades;

-- Create students table
CREATE TABLE students (
    student_id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(100) NOT NULL
);

-- Create table for homework grades
CREATE TABLE homework_grades (
    student_id INT,
    homework1 INT,
    homework2 INT,
    homework3 INT,
    homework4 INT,
    homework5 INT,
    FOREIGN KEY (student_id) REFERENCES students(student_id)
);

-- Create table for quiz grades
CREATE TABLE quiz_grades (
    student_id INT,
    quiz1 INT,
    quiz2 INT,
    quiz3 INT,
    quiz4 INT,
    quiz5 INT,
    FOREIGN KEY (student_id) REFERENCES students(student_id)
);

-- Create table for midterm and final project scores
CREATE TABLE final_grades (
    student_id INT,
    midterm INT,
    final_project INT,
    final_grade INT,
    FOREIGN KEY (student_id) REFERENCES students(student_id)
);

-- Insert fixed students
INSERT INTO students (name) VALUES ('John Doe'), ('Jane Smith'), ('Emily Davis');

INSERT INTO homework_grades (student_id, homework1, homework2, homework3, homework4, homework5) VALUES
(1, 75, 80, 85, 90, 95),
(2, 70, 75, 80, 85, 90),
(3, 65, 70, 75, 80, 85);

INSERT INTO quiz_grades (student_id, quiz1, quiz2, quiz3, quiz4, quiz5) VALUES
(1, 60, 70, 80, 90, 85),
(2, 65, 75, 85, 80, 95),
(3, 70, 80, 90, 85, 75);

INSERT INTO final_grades (student_id, midterm, final_project) VALUES
(1, 88, 92),
(2, 84, 89),
(3, 79, 85);
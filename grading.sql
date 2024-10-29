-- Create database
CREATE DATABASE IF NOT EXISTS my_database;
USE my_database;

-- Create Students Table
CREATE TABLE students_list (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL
);

-- Create Grades Table
CREATE TABLE grades (
    id INT AUTO_INCREMENT PRIMARY KEY,
    student_id INT,
    homework1 INT,
    homework2 INT,
    homework3 INT,
    homework4 INT,
    homework5 INT,
    quiz1 INT,
    quiz2 INT,
    quiz3 INT,
    quiz4 INT,
    quiz5 INT,
    midterm INT,
    final_project INT,
    FOREIGN KEY (student_id) REFERENCES students_list(id)
);

-- Insert sample students
INSERT INTO students_list (name) VALUES ('John Doe'), ('Jane Smith'), ('Alice Johnson');

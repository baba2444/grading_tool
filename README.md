# Teacher Grading Tool
This project is a simple PHP-based grading tool for teachers. It calculates final grades for students based on a pre-defined rubric and stores them in a MySQL database. The tool allows teachers to quickly view the final grades after calculation.

Features
- Automated Grade Calculation: Calculates grades using a weighted average based on homework, quizzes, midterm, and final project scores.
- Database Storage: Stores student names, grades, and final scores in a MySQL database for easy access.
- Web Interface: A single webpage interface allows teachers to trigger the calculation and view results instantly.

The final grade is calculated based on the following weights:
- Homework: 20%
- Quizzes: 10% 
- Midterm: 30%
- Final Project: 40%

.Create the Database and Tables:
   - Open [http://localhost/phpmyadmin](http://localhost/phpmyadmin) in your browser.
.Run the Tool
   - Open a browser 
   - Click the "Calculate and Display Final Grades "button on the webpage to calculate and view the final grades.
- If you need to update scores or student information, you can modify the entries directly in phpMyAdmin.

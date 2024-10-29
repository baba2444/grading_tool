<?php
$servername = "localhost";
$username = "csc350";
$password = "xampp";
$database = "my_database";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Function to calculate final grade
function calculateFinalGrade($grades) {
    $homework_avg = array_sum(array_slice($grades, 0, 5)) / 5 * 0.2;
    sort($grades['quizzes']);
    array_shift($grades['quizzes']);
    $quiz_avg = array_sum($grades['quizzes']) / 4 * 0.1;
    $midterm = $grades['midterm'] * 0.3;
    $final_project = $grades['final_project'] * 0.4;
    return round($homework_avg + $quiz_avg + $midterm + $final_project);
}
?>

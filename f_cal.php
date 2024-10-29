<?php
// Database connection details
$servername = "localhost";
$username = "csc350";
$password = "xampp";
$dbname = "my_database";

// Connect to the database
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Function to calculate and update final grades
function calculateFinalGrades($conn) {
    // Fetch homework grades
    $homework_sql = "SELECT student_id, homework1, homework2, homework3, homework4, homework5 FROM homework_grades";
    $homework_result = $conn->query($homework_sql);

    if ($homework_result->num_rows > 0) {
        while($row = $homework_result->fetch_assoc()) {
            $student_id = $row['student_id'];
            $homework_scores = array($row['homework1'], $row['homework2'], $row['homework3'], $row['homework4'], $row['homework5']);
            $avg_homework = array_sum($homework_scores) / count($homework_scores);

            // Fetch quiz grades and calculate average after dropping the lowest
            $quiz_sql = "SELECT quiz1, quiz2, quiz3, quiz4, quiz5 FROM quiz_grades WHERE student_id = $student_id";
            $quiz_result = $conn->query($quiz_sql);
            $quiz_row = $quiz_result->fetch_assoc();
            $quiz_scores = array($quiz_row['quiz1'], $quiz_row['quiz2'], $quiz_row['quiz3'], $quiz_row['quiz4'], $quiz_row['quiz5']);
            sort($quiz_scores);
            array_shift($quiz_scores); // Drop the lowest score
            $avg_quiz = array_sum($quiz_scores) / count($quiz_scores);

            // Fetch midterm and final project scores
            $final_sql = "SELECT midterm, final_project FROM final_grades WHERE student_id = $student_id";
            $final_result = $conn->query($final_sql);
            $final_row = $final_result->fetch_assoc();
            $midterm = $final_row['midterm'];
            $final_project = $final_row['final_project'];

            // Calculate weighted final grade
            $final_grade = round(($avg_homework * 0.2) + ($avg_quiz * 0.1) + ($midterm * 0.3) + ($final_project * 0.4));

            // Update final grade in the database
            $update_sql = "UPDATE final_grades SET final_grade = $final_grade WHERE student_id = $student_id";
            $conn->query($update_sql);
        }
    }
}

// Function to display final grades
function displayFinalGrades($conn) {
    $display_sql = "SELECT students.name, final_grades.final_grade FROM students JOIN final_grades ON students.student_id = final_grades.student_id";
    $result = $conn->query($display_sql);

    echo "<h1>Final Grades for All Students</h1><ul>";
    while($row = $result->fetch_assoc()) {
        echo "<li>{$row['name']}: {$row['final_grade']}</li>";
    }
    echo "</ul>";
}

// Check if the form was submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    calculateFinalGrades($conn);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Teacher Grading Tool</title>
</head>
<body>
    <h1>Teacher Grading Tool</h1>
    <p>Click the button below to calculate and display final grades for all students.</p>
    <form method="post">
        <button type="submit">Calculate and Display Final Grades</button>
    </form>

    <?php
    // Display the final grades after calculation
    displayFinalGrades($conn);
    ?>

</body>
</html>

<?php
// Close database connection
$conn->close();
?>

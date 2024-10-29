<?php
require_once 'f_cal';

$student_id = $_POST['student_id'];
$grades = [
    'homework1' => $_POST['homework1'],
    'homework2' => $_POST['homework2'],
    'homework3' => $_POST['homework3'],
    'homework4' => $_POST['homework4'],
    'homework5' => $_POST['homework5'],
    'quiz1' => $_POST['quiz1'],
    'quiz2' => $_POST['quiz2'],
    'quiz3' => $_POST['quiz3'],
    'quiz4' => $_POST['quiz4'],
    'quiz5' => $_POST['quiz5'],
    'midterm' => $_POST['midterm'],
    'final_project' => $_POST['final_project']
];

$sql = "INSERT INTO grades (student_id, homework1, homework2, homework3, homework4, homework5, quiz1, quiz2, quiz3, quiz4, quiz5, midterm, final_project) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("iiiiiiiiiiiii", $student_id, ...array_values($grades));
$stmt->execute();

echo "Grades submitted successfully! <a href='index.php'>Back</a>";
?>

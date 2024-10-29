<?php
require_once 'f_cal';

$result = $conn->query("SELECT students_list.name, grades.* FROM students_list INNER JOIN grades ON students_list.id = grades.student_id");

echo "<h2>Final Grades</h2><table><tr><th>Student</th><th>Final Grade</th></tr>";
while ($row = $result->fetch_assoc()) {
    $grades = [
        'homework1' => $row['homework1'],
        'homework2' => $row['homework2'],
        'homework3' => $row['homework3'],
        'homework4' => $row['homework4'],
        'homework5' => $row['homework5'],
        'quizzes' => [$row['quiz1'], $row['quiz2'], $row['quiz3'], $row['quiz4'], $row['quiz5']],
        'midterm' => $row['midterm'],
        'final_project' => $row['final_project']
    ];
    $final_grade = calculateFinalGrade($grades);
    echo "<tr><td>{$row['name']}</td><td>{$final_grade}</td></tr>";
}
echo "</table>";
?>

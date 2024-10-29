<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Grade Entry</title>
</head>
<body>
    <h2>Enter Grades for Students</h2>
    <form action="submit_grades.php" method="post">
        <label for="student_id">Select Student:</label>
        <select name="student_id" required>
            <?php
            require_once 'f_cal';
            $result = $conn->query("SELECT * FROM students_list");
            while ($row = $result->fetch_assoc()) {
                echo "<option value='{$row['id']}'>{$row['name']}</option>";
            }
            ?>
        </select>
        <br>
        <label>Homework:</label>
        <?php for ($i = 1; $i <= 5; $i++): ?>
            <input type="number" name="homework<?= $i ?>" min="0" max="100" required>
        <?php endfor; ?>
        <br>
        <label>Quizzes:</label>
        <?php for ($i = 1; $i <= 5; $i++): ?>
            <input type="number" name="quiz<?= $i ?>" min="0" max="100" required>
        <?php endfor; ?>
        <br>
        <label>Midterm:</label>
        <input type="number" name="midterm" min="0" max="100" required>
        <br>
        <label>Final Project:</label>
        <input type="number" name="final_project" min="0" max="100" required>
        <br>
        <button type="submit">Submit Grades</button>
    </form>
</body>
</html>

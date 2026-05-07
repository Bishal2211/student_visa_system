<?php
session_start();
include 'db.php';

if (!isset($_SESSION['user_id'])) {
    die("Please login first.");
}

$user_id = $_SESSION['user_id'];

$gpa = $_POST['gpa'];
$ielts = $_POST['ielts'];
$budget = $_POST['budget'];
$country = $_POST['country'];

$check = $conn->query("SELECT * FROM student_profiles WHERE user_id='$user_id'");

if ($check->num_rows > 0) {

    $sql = "UPDATE student_profiles 
            SET 
            gpa='$gpa',
            ielts_score='$ielts',
            budget='$budget',
            preferred_country='$country'
            WHERE user_id='$user_id'";

} else {

    $sql = "INSERT INTO student_profiles 
            (user_id, gpa, ielts_score, budget, preferred_country)
            VALUES
            ('$user_id', '$gpa', '$ielts', '$budget', '$country')";
}

if ($conn->query($sql) === TRUE) {

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Saved</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>

    <div class="navbar">
        Student Visa Decision Support System
    </div>

    <div class="container">

        <div class="dashboard-card" style="max-width:600px; margin:auto; text-align:center;">

            <h1>Profile Saved Successfully</h1>

            <p class="card-meta">
                Your academic and financial information has been updated.
            </p>

            <br>

            <div class="dashboard-grid">

                <div class="dashboard-card small">
                    <h3>GPA</h3>
                    <div class="card-value"><?php echo $gpa; ?></div>
                </div>

                <div class="dashboard-card small">
                    <h3>IELTS</h3>
                    <div class="card-value"><?php echo $ielts; ?></div>
                </div>

            </div>

            <br>

            <a href="../dashboard.html">
                <button>Back to Dashboard</button>
            </a>

            <a href="eligibility.php">
                <button>Check Eligibility</button>
            </a>

        </div>

    </div>

</body>
</html>

<?php

} else {

    echo "Error: " . $conn->error;
}
?>
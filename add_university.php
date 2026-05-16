<?php

session_start();

include 'php/db.php';

if(!isset($_SESSION['admin'])){
    header("Location: admin_login.php");
}

if(isset($_POST['add'])){

    $country_id = $_POST['country_id'];

    $university_name = $_POST['university_name'];

    $required_gpa = $_POST['required_gpa'];

    $required_ielts = $_POST['required_ielts'];

    $tuition_fee = $_POST['tuition_fee'];

    $conn->query(

        "INSERT INTO universities(

        country_id,
        university_name,
        required_gpa,
        required_ielts,
        tuition_fee

        )

        VALUES(

        '$country_id',
        '$university_name',
        '$required_gpa',
        '$required_ielts',
        '$tuition_fee'

        )"

    );

    header("Location: admin_dashboard.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">

<meta name="viewport"
content="width=device-width, initial-scale=1.0">

<title>
Add University
</title>

<link rel="stylesheet" href="css/style.css">

</head>

<body>

<div class="auth-container">

<div class="auth-card">

<h1>

Add University

</h1>

<form method="POST">

<div class="form-group">

<label>

Country ID

</label>

<input
type="number"
name="country_id"
required
>

</div>

<div class="form-group">

<label>

University Name

</label>

<input
type="text"
name="university_name"
required
>

</div>

<div class="form-group">

<label>

Required GPA

</label>

<input
type="text"
name="required_gpa"
required
>

</div>

<div class="form-group">

<label>

Required IELTS

</label>

<input
type="text"
name="required_ielts"
required
>

</div>

<div class="form-group">

<label>

Tuition Fee

</label>

<input
type="text"
name="tuition_fee"
required
>

</div>

<button
type="submit"
name="add"
>

Add University

</button>

</form>

</div>

</div>

</body>

</html>
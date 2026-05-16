<?php

include 'php/db.php';

$id = $_GET['id'];

$result = $conn->query(

    "SELECT * FROM universities
    WHERE university_id='$id'"

);

$row = $result->fetch_assoc();

if(isset($_POST['update'])){

    $country_id = $_POST['country_id'];

    $university_name = $_POST['university_name'];

    $required_gpa = $_POST['required_gpa'];

    $required_ielts = $_POST['required_ielts'];

    $tuition_fee = $_POST['tuition_fee'];

    $conn->query(

        "UPDATE universities SET

        country_id='$country_id',
        university_name='$university_name',
        required_gpa='$required_gpa',
        required_ielts='$required_ielts',
        tuition_fee='$tuition_fee'

        WHERE university_id='$id'"

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

<title>Edit University</title>

<link rel="stylesheet" href="css/style.css">

</head>

<body>

<div class="auth-container">

<div class="auth-card">

<h1>

Edit University

</h1>

<form method="POST">

<div class="form-group">

<label>

Country ID

</label>

<input
type="number"
name="country_id"
value="<?php echo $row['country_id']; ?>"
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
value="<?php echo $row['university_name']; ?>"
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
value="<?php echo $row['required_gpa']; ?>"
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
value="<?php echo $row['required_ielts']; ?>"
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
value="<?php echo $row['tuition_fee']; ?>"
required
>

</div>

<button
type="submit"
name="update"
>

Update University

</button>

</form>

</div>

</div>

</body>

</html>
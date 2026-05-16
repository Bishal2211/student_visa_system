<?php
session_start();

include 'php/db.php';

if(!isset($_SESSION['admin'])){
    header("Location: admin_login.php");
}

$query = $conn->query("SELECT * FROM universities");
?>

<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">

<meta name="viewport"
content="width=device-width, initial-scale=1.0">

<title>
Admin Dashboard
</title>

<link rel="stylesheet" href="css/style.css">

</head>

<body>

<header class="navbar">

<div class="logo">
    <img src="images/logo.png">
</div>

<nav>

    <a href="index.html">
        Home
    </a>

    <a href="add_university.php">
        Add University
    </a>

    <a href="logout.php">
        Logout
    </a>

</nav>

</header>

<div class="container">

<h1 class="section-title">

    Admin Dashboard

</h1>

<div class="dashboard-grid">

<?php while($row = $query->fetch_assoc()) { ?>

<div class="dashboard-card">

<h3>

<?php echo $row['university_name']; ?>

</h3>

<p>

Country:

<?php

if($row['country_id'] == 1){
    echo "Canada";
}

elseif($row['country_id'] == 2){
    echo "United Kingdom";
}

elseif($row['country_id'] == 3){
    echo "Australia";
}

elseif($row['country_id'] == 4){
    echo "USA";
}

elseif($row['country_id'] == 5){
    echo "Germany";
}

?>

</p>

<p>

Required GPA:
<?php echo $row['required_gpa']; ?>

</p>

<p>

Required IELTS:
<?php echo $row['required_ielts']; ?>

</p>

<p>

Tuition Fee:
<?php echo $row['tuition_fee']; ?>

</p>

<br>

<a href="edit_university.php?id=<?php echo $row['university_id']; ?>">

<button>

Edit

</button>

</a>

<a href="delete_university.php?id=<?php echo $row['university_id']; ?>">

<button class="secondary-btn">

Delete

</button>

</a>

</div>

<?php } ?>

</div>

</div>

</body>

</html>
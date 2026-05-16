<?php

include 'php/db.php';

$id = $_GET['id'];

$conn->query(

    "DELETE FROM universities
    WHERE university_id='$id'"

);

header("Location: admin_dashboard.php");

?>
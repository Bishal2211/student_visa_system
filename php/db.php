<?php
$conn = new mysqli("localhost", "root", "", "student_visa_system");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
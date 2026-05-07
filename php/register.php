<?php
include 'db.php';

$name = $_POST['name'];
$email = $_POST['email'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);

// Check if email already exists
$check = $conn->query("SELECT * FROM users WHERE email='$email'");

if ($check->num_rows > 0) {
    echo "Email already exists!";
} else {
    $sql = "INSERT INTO users (full_name, email, password)
    VALUES ('$name', '$email', '$password')";

    if ($conn->query($sql) === TRUE) {
        echo "Registration successful!";
    } else {
        echo "Error: " . $conn->error;
    }
}
?>
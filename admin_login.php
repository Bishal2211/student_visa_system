<?php

session_start();

include 'php/db.php';

if(isset($_POST['login'])){

    $username = $_POST['username'];

    $password = $_POST['password'];

    $query = $conn->query(

        "SELECT * FROM admins
        WHERE username='$username'
        AND password='$password'"

    );

    if($query->num_rows > 0){

        $_SESSION['admin'] = $username;

        header("Location: admin_dashboard.php");

    }else{

        echo "
        <script>
        alert('Invalid Admin Login');
        </script>
        ";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">

<meta name="viewport"
content="width=device-width, initial-scale=1.0">

<title>Admin Login</title>

<link rel="stylesheet" href="css/style.css">

</head>

<body>

<header class="navbar">

    <div class="logo">
        <img src="images/logo.png">
    </div>

    <nav>

        <a href="index.html">Home</a>

        <a href="login.html">Student Login</a>

    </nav>

</header>

<div class="auth-container">

    <div class="auth-card">

        <h1>
            Admin Login
        </h1>

        <p>
            Manage universities,
            requirements, and system data.
        </p>

        <form method="POST">

            <div class="form-group">

                <label>
                    Username
                </label>

                <input
                    type="text"
                    name="username"
                    required
                >

            </div>

            <div class="form-group">

                <label>
                    Password
                </label>

                <input
                    type="password"
                    name="password"
                    required
                >

            </div>

            <button
                type="submit"
                name="login"
            >
                Login
            </button>

        </form>

    </div>

</div>

</body>
</html>
<?php
session_start();

if(isset($_SESSION['username']) && isset($_SESSION['role']) == 'user') {
    header("Location: user/dashboard.php");
    exit();
} elseif(isset($_SESSION['username']) && isset($_SESSION['role']) == 'admin') {
    header("Location: admin/dashboard.php");
    exit();
}

    include 'koneksi.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        

        $sql = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password')";
        if (mysqli_query($conn, $sql)) {
            header("Location: login.php");
            $_SESSION['error'] = "Silahkan login!";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="css/form.css">
</head>
<body>
    <div class="container">
        <div class="form-box" id="register-form">
            <form method="POST">
                <h2>Register</h2>
                <input type="text" name="username" placeholder="Nama" required>
                <input type="email" name="email" placeholder="Email" required>
                <input type="password" name="password" placeholder="Password" required>
                <button class="btnsubmit" type="submit" name="register">Register</button>
                <p>Don't have account? <a href="login.php">Login</a></p>
            </form>
        </div>
    </div>
    
</body>
</html>
<?php 
session_start();
include "koneksi.php";
$error_message = "";
if (isset($_SESSION['error'])) {
    $error_message = $_SESSION['error'];
    unset($_SESSION['error']);
}


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];


    //user
    $sql_user = "SELECT username, password FROM users 
            WHERE username='$username' AND password='$password'";
    $query_user = mysqli_query($conn, $sql_user);
   
    if (mysqli_num_rows($query_user) == 1) {
        $user = mysqli_fetch_assoc($query_user);

        $_SESSION['logged_in'] = true;
        $_SESSION['username'] = $user['username'];
        $_SESSION['role'] = 'user';
        header('Location: user/home.php');
        exit;      
    } else{
        $_SESSION['error'] = "Password atau Username salah!/Data belum terdaftar!";
        header(header: 'Location: register.php'); 
    }
    
    //cek admin
    $sql_admin = "SELECT username,password FROM admin WHERE username='$username' AND password='$password'";
    $query_admin = mysqli_query($conn, $sql_admin);

    if(mysqli_num_rows($query_admin) == 1){
        $admin = mysqli_fetch_assoc($query_admin);

        $_SESSION['logged_in'] = true;
        $_SESSION['username'] = $admin['username'];
        $_SESSION['role'] = 'admin';
        header('Location: admin/dashboard(admin).php');
        exit;
    } else{
        $_SESSION['error'] = "Password atau Username salah!";
        header('Location: login.php');
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css/form.css">
</head>
<body>
    
    <div class="container">
        <div class="form-box" id="login-form">
            <form method="POST">
                <h2>Login</h2>
                <input type="username" name="username" placeholder="Username" required>
                <input type="password" name="password" placeholder="Password" required>
                <button class="btnsubmit" type="submit" name="login">Login</button>
                <p>Don't have account? <a href="register.php">Sign Up</a></p>
            </form>
        </div>
    </div>
</body>
</html>

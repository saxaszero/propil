<?php
session_start();

if(!isset($_SESSION['logged_in'])){
    $_SESSION['error'] = "Silahkan login terlabih dahulu!";
    header('Location: ../login.php');
    exit;
}
if(!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin'){
    $_SESSION['error'] = "Anda Tidak punya akses ke sini!";
    header('Location: ../login.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Dashboard</title>
<link rel="stylesheet" href="../assets/css/navbar.css">

</head>
<body>
    <style>
        h2{
            margin-left: 15px;
        }
    </style>
<div class="navbar">
    

    <div class="dropdown">
        <button class="dropbtn">Menu ▼</button>
        <div class="dropdown-content">
            <a href="dashboard(admin).php">Home</a>
            <a href="about(admin).php">About</a>
            <a href="info(admin).php">Info</a>
        </div>
    </div>
    <div class="dropdown" style="float:right; margin-right:20px;">
        <button class="dropbtn">👤</button>
        <div class="dropdown-content">
            <a href="#web">Profile</a>
            <a href="../logout.php">Logout</a>
        </div>
    </div>

</div>

<h1 style="padding-left: 20px;">Ini halaman Dashboard Admin</h1>
<h2>Halo <?= $_SESSION['username']; ?>!</h2>
</body>
</html>

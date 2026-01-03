<?php
session_start();

if(!isset($_SESSION['logged_in'])){
    $_SESSION['error'] = "Silahkan login terlabih dahulu!";
    header('Location: ../login.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="../css/navbar.css">
    <link rel="stylesheet" href="../css/home.css">
    <link rel="stylesheet" href="../css/footer.css">
</head>
<body>
    <div class="navbar">
        <div class="nav-left">
            <a href="home.php" class="nav-item active">Home</a>
            
            <div class="dropdown transform-scale">
                <input type="checkbox" id="menu-toggle" class="dropdown-toggle">
                <label for="menu-toggle" class="dropbtn">Menu</label>
                <div class="dropdown-content">
                    <a href="profile.php" class="transform-scale">Profile</a>
                    <a href="galeri.php" class="transform-scale">Galeri</a>
                    <a href="faq.php" class="transform-scale">FAQ</a>
                </div>
            </div>
        </div>

        <div class="nav-center">Home</div>

        <div class="nav-right">
            <a href="../logout.php" class="logout-btn">Logout</a>
        </div>
    </div>

    <div class="home-container">
        <div class="welcome-section">
            <h1 class="welcome-title">Selamat Datang!</h1>
            <h2 class="username">Halo, <span class="highlight"><?= $_SESSION['username']; ?></span>! </h2>
        </div>
</body>

<footer class="footer">
    <div class="footer-content">
        <div class="footer-text">
            &copy; 2025 Gatau. Created with ❤️ (DETERMINATION)
        </div>
    </div>
</footer>
</html>
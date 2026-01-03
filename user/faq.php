<?php 
session_start();

if(!isset($_SESSION['logged_in'])){
    header('Location: ../login.php');
    $_SESSION['error'] = "Silahkan Login terlebih dahulu";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Galeri</title>
    <link rel="stylesheet" href="../css/navbar.css">
    <link rel="stylesheet" href="../css/galeri.css">
    <link rel="stylesheet" href="../css/footer.css">
</head>
<body>
    <div class="navbar">
        <div class="nav-left">
            <a href="home.php" class="nav-item transform-scale">Home</a>
            
            <div class="dropdown active transform-scale">
                <input type="checkbox" id="menu-toggle" class="dropdown-toggle">
                <label for="menu-toggle" class="dropbtn">Menu</label>
                <div class="dropdown-content">
                    <a href="profile.php" class="transform-scale">Profile</a>
                    <a href="galeri.php" class="transform-scale">Galeri</a>
                    <a href="faq.php" class="active notactive">FAQ</a>
                </div>
            </div>
        </div>

        <div class="nav-center">FAQ</div>

        <div class="nav-right">
            <a href="../logout.php" class="logout-btn">Logout</a>
        </div>
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
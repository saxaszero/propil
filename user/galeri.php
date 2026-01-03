<?php 
session_start();
include '../koneksi.php';

if(!isset($_SESSION['logged_in'])){
    header('Location: ../login.php');
    $_SESSION['error'] = "Silahkan Login terlebih dahulu";
    exit;
}

// Ambil data dari tabel galeri (kecuali yang namanya profil)
$sql = "SELECT id, nama, gambar FROM galeri WHERE nama NOT LIKE 'profil_%' ORDER BY id DESC";
$result = mysqli_query($conn, $sql);

$galeri = [];
if ($result && mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $galeri[] = $row;
    }
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
                    <a href="galeri.php" class="active nonactive">Galeri</a>
                    <a href="faq.php" class="transform-scale">FAQ</a>
                </div>
            </div>
        </div>

        <div class="nav-center">Galeri</div>

        <div class="nav-right">
            <a href="../logout.php" class="logout-btn">Logout</a>
        </div>
    </div>

    <div class="galeri-container">
    
    <?php if (count($galeri) > 0): ?>
        <div class="galeri-grid">
            <?php foreach($galeri as $item): 
                if (!empty($item['gambar'])) {
                    $image_data = base64_encode($item['gambar']);
            ?>
            <div class="galeri-item">
                <div class="image-container">
                    <img src="data:image/jpeg;base64,<?php echo $image_data; ?>" 
                         alt="<?php echo htmlspecialchars($item['nama']); ?>"
                         loading="lazy">
                </div>
                <div class="galeri-name"><?php echo htmlspecialchars($item['nama']); ?></div>
            </div>
            <?php } else { ?>
            <div class="galeri-item no-image">
                <div class="placeholder">Gambar tidak tersedia</div>
                <div class="galeri-name"><?php echo htmlspecialchars($item['nama']); ?></div>
            </div>
            <?php } endforeach; ?>
        </div>
    <?php else: ?>
        <div class="no-galeri">
            <p>Belum ada gambar di galeri.</p>
        </div>
    <?php endif; ?>
</div>

    <footer class="footer">
        <div class="footer-content">
            <div class="footer-text">
                &copy; 2025 Gatau. Created with ❤️ (DETERMINATION)
            </div>
        </div>
    </footer>
    
</body>
</html>
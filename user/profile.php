<?php 
session_start();
include '../koneksi.php';

if(!isset($_SESSION['logged_in'])){
    header('Location: ../login.php');
    $_SESSION['error'] = "Silahkan Login terlebih dahulu";
    exit;
}

$mapping = [
    1 => 'zenkichi',    
    2 => 'melan',   
    3 => 'riki'     
];

$sql_profile = "SELECT id, nama, jobdesk, umur FROM profile";
$result_profile = mysqli_query($conn, $sql_profile);

$profiles = [];
if ($result_profile && mysqli_num_rows($result_profile) > 0) {
    while ($profile = mysqli_fetch_assoc($result_profile)) {
        $profile_id = $profile['id'];
        $gambar_nama = $mapping[$profile_id] ?? null;
        
        if ($gambar_nama) {
            $sql_gambar = "SELECT gambar FROM galeri WHERE nama = '$gambar_nama'";
            $result_gambar = mysqli_query($conn, $sql_gambar);
            
            if ($result_gambar && mysqli_num_rows($result_gambar) > 0) {
                $gambar_data = mysqli_fetch_assoc($result_gambar);
                $profile['gambar'] = $gambar_data['gambar'];
            } else {
                $profile['gambar'] = null;
            }
        } else {
            $profile['gambar'] = null;
        }
        
        $profiles[] = $profile;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="../css/navbar.css">
    <link rel="stylesheet" href="../css/profile.css">
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
                    <a href="profile.php" class="active notactive">Profile</a>
                    <a href="galeri.php" class="transform-scale">Galeri</a>
                    <a href="faq.php" class="transform-scale">FAQ</a>
                </div>
            </div>
        </div>

        <div class="nav-center">Profile</div>

        <div class="nav-right">
            <a href="../logout.php" class="logout-btn">Logout</a>
        </div>
    </div>

    <div class="profile-container">
    <?php foreach($profiles as $profile): ?>
    <div class="profile-item">
        <?php if (!empty($profile['gambar'])): ?>
            <img src="data:image/jpeg;base64,<?php echo base64_encode($profile['gambar']); ?>" 
                 class="profile-pic" 
                 alt="<?php echo htmlspecialchars($profile['nama']); ?>"
                 loading="lazy">
        <?php else: ?>
            <div class="no-image">
                <span>No Image</span>
            </div>
        <?php endif; ?>
        <div class="profile-name"><?php echo htmlspecialchars($profile['nama']); ?></div>
        <div class="profile-job"><?php echo htmlspecialchars($profile['jobdesk']); ?></div>
        <div class="profile-age">Umur: <?php echo htmlspecialchars($profile['umur']); ?> tahun</div>
    </div>
    <?php endforeach; ?>
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
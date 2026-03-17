<?php
// session_start();   // HAPUS INI! (session sudah di header.php)
$base_url = '/PROJECT-ONE';
?>

<nav class="navbar">
    <div class="nav-container">
        <div class="nav-logo">
            <a href="<?= $base_url ?>/index.php">
                <img src="<?= $base_url ?>/assets/img/logo.png" alt="FURY PROJECT" class="logo-img">
                <span class="logo-text">FURY PROJECT</span>
            </a>
        </div>
        
        <ul class="nav-menu">
            <li><a href="<?= $base_url ?>/index.php">Home</a></li>
            <li><a href="<?= $base_url ?>/pages/track-order.php">Cek Pesanan</a></li> 
            <li class="dropdown">
                <a href="#" class="dropdown-toggle">Games ▼</a>
                <ul class="dropdown-menu">
                    <li><a href="<?= $base_url ?>/pages/ml.php">Mobile Legends</a></li>
                    <li><a href="<?= $base_url ?>/pages/ff.php">Free Fire</a></li>
                    <li><a href="<?= $base_url ?>/pages/pubg.php">PUBG Mobile</a></li>
                    <li><a href="<?= $base_url ?>/pages/genshin.php">Genshin Impact</a></li>
                    <li><a href="<?= $base_url ?>/pages/hok.php">Honor of Kings</a></li>
                    <li><a href="<?= $base_url ?>/pages/valorant.php">Valorant</a></li>
                    <li><hr></li>
                    <li><a href="<?= $base_url ?>/pages/games.php">Semua Game →</a></li>
                </ul>
            </li>
            <li><a href="<?= $base_url ?>/pages/promo.php">Promo</a></li>
            <li><a href="<?= $base_url ?>/pages/contact.php">Contact</a></li>
        </ul>
        
        <div class="nav-auth">
            <?php if(isset($_SESSION['login'])): ?>
                <span style="color: #00eaff;">Halo, <?= $_SESSION['username'] ?></span>
                <a href="<?= $base_url ?>/pages/user/dashboard.php" class="btn-login">Dashboard</a>
                <a href="<?= $base_url ?>/process/logout.php" class="btn-register">Logout</a>
            <?php else: ?>
                <a href="<?= $base_url ?>/pages/auth/login.php" class="btn-login">Login</a>
                <a href="<?= $base_url ?>/pages/auth/register.php" class="btn-register">Register</a>
            <?php endif; ?>
        </div>
        
        <div class="nav-toggle" onclick="toggleMenu()">☰</div>
    </div>
</nav>
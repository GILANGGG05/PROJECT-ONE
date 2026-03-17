<?php
// includes/navbar.php
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
            <a href="<?= $base_url ?>/pages/login.php" class="btn-login">Login</a>
            <a href="<?= $base_url ?>/pages/register.php" class="btn-register">Register</a>
        </div>
        
        <div class="nav-toggle" onclick="toggleMenu()">☰</div>
    </div>
</nav>
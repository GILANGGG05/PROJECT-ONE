<?php
// index.php
require_once 'includes/header.php';
$base_url = '/PROJECT-ONE';
?>

<!-- HERO SECTION -->
<div class="hero">
    <h1>FURY PROJECT</h1>
    <p class="tagline">Top Up Game Murah & Aman</p>
    <p class="sub-tagline">Proses Cepat 1-3 Menit</p>
</div>

<!-- GAME CONTAINER -->
<div class="game-container">
    <h2 class="section-title">🎮 Daftar Game</h2>
    <div class="game-grid">
        
        <?php
        $games = [
            ['name' => 'Mobile Legends', 'img' => 'ml.jpg', 'url' => 'ml.php'],
            ['name' => 'Magic Chess', 'img' => 'magicchess.jpg', 'url' => 'magicchess.php'],
            ['name' => 'Arena Breakout', 'img' => 'arena.jpg', 'url' => 'arena.php'],
            ['name' => 'Free Fire', 'img' => 'ff.jpg', 'url' => 'ff.php'],
            ['name' => 'Free Fire Max', 'img' => 'ffmax.jpg', 'url' => 'ffmax.php'],
            ['name' => 'PUBG Mobile', 'img' => 'pubg.jpg', 'url' => 'pubg.php'],
            ['name' => 'Honor of Kings', 'img' => 'hok.jpg', 'url' => 'hok.php'],
            ['name' => 'Valorant', 'img' => 'valorant.jpg', 'url' => 'valorant.php'],
            ['name' => 'Genshin Impact', 'img' => 'genshin.jpg', 'url' => 'genshin.php'],
            ['name' => 'COD Mobile', 'img' => 'codm.jpg', 'url' => 'codm.php'],
            ['name' => 'Honkai Star Rail', 'img' => 'starrail.jpg', 'url' => 'starrail.php'],
            ['name' => 'Undawn', 'img' => 'undawn.jpg', 'url' => 'undawn.php'],
        ];
        
        foreach($games as $game): 
        ?>
        <a href="<?= $base_url ?>/pages/<?= $game['url'] ?>" class="game-item">
            <img src="<?= $base_url ?>/assets/img/<?= $game['img'] ?>" alt="<?= $game['name'] ?>">
            <div class="game-name"><?= $game['name'] ?></div>
        </a>
        <?php endforeach; ?>
        
    </div>
</div>

<!-- TENTANG KAMI -->
<div class="about-section">
    <div class="about-container">
        <h2>Tentang FURY PROJECT</h2>
        <p class="about-description">
            FURY PROJECT adalah layanan top up game terpercaya yang menyediakan diamond dan UC dengan harga murah dan proses cepat.
        </p>
        <p class="about-description">
            Kami melayani berbagai game populer seperti Mobile Legends, PUBG Mobile, dan Free Fire.
        </p>
        <p class="about-highlight">
            Proses top up hanya membutuhkan waktu 1-3 menit setelah pembayaran.
        </p>
    </div>
</div>

<!-- METODE PEMBAYARAN -->
<div class="payment-section">
    <h2>Metode Pembayaran</h2>
    <div class="payment-grid">
        <div class="payment-method">💰 DANA</div>
        <div class="payment-method">💜 OVO</div>
        <div class="payment-method">🟢 GoPay</div>
        <div class="payment-method">📱 QRIS</div>
        <div class="payment-method">🏦 BCA</div>
        <div class="payment-method">🏦 BRI</div>
    </div>
</div>

<footer>
    <p>© 2026 FURY PROJECT</p>
    <p>Top Up Game Murah & Aman</p>
    <p class="social">Instagram : @furyproject</p>
    <p class="social">TikTok : @furyproject</p>
</footer>

<!-- WHATSAPP FLOATING -->
<a href="https://wa.me/6283898651725" class="wa-float">
    <img src="<?= $base_url ?>/assets/img/wa.png" alt="WhatsApp">
</a>

<?php require_once 'includes/footer.php'; ?>
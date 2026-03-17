<?php
// pages/user/dashboard.php
session_start();
require_once '../../includes/header.php';
require_once '../../koneksi.php';

// Proteksi halaman
if (!isset($_SESSION['login'])) {
    header("Location: ../auth/login.php");
    exit;
}

$user_id = $_SESSION['user_id'];

// Tampilkan notifikasi merge order
if(isset($_SESSION['merge_notif'])): ?>
    <div style="background: #00eaff20; color: #00eaff; padding: 15px; border-radius: 8px; margin: 20px auto; max-width: 1200px; border: 1px solid #00eaff; text-align: center;">
        ✅ <?= $_SESSION['merge_notif'] ?>
    </div>
    <?php unset($_SESSION['merge_notif']); ?>
<?php endif; ?>

<?php
// Ambil history order user
$sql = "SELECT * FROM orders WHERE user_id = ? ORDER BY created_at DESC";
$stmt = mysqli_prepare($conn, $sql);

// CEK APAKAH PREPARE BERHASIL
if ($stmt) {
    mysqli_stmt_bind_param($stmt, "i", $user_id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    
    // Hitung jumlah order
    $total_order = mysqli_num_rows($result);
} else {
    // Kalau gagal, set default
    $result = null;
    $total_order = 0;
    echo "Error: " . mysqli_error($conn);
}
?>

<div class="container">
    <h1 style="color: #00eaff;">Dashboard <?= htmlspecialchars($_SESSION['username']) ?></h1>
    
    <div class="card" style="margin: 20px 0;">
        <h3>Ringkasan</h3>
        <div class="summary-item">
            <span>Total Order</span>
            <span><?= $total_order ?></span>  <!-- PAKAI VARIABLE $total_order -->
        </div>
    </div>
    
    <h2 style="color: #00eaff;">Riwayat Top Up</h2>
    
    <div class="game-grid">
        <?php if ($total_order == 0): ?>  <!-- CEK PAKAI $total_order -->
            <p style="color: #bbb; text-align: center; grid-column: 1/-1;">Belum ada transaksi</p>
        <?php else: ?>
            <?php while($order = mysqli_fetch_assoc($result)): ?>
            <div class="game-item" style="background: #0f172a;">
                <div style="padding: 15px;">
                    <p><strong>Game:</strong> <?= htmlspecialchars($order['game']) ?></p>
                    <p><strong>Diamond:</strong> <?= htmlspecialchars($order['diamond']) ?></p>
                    <p><strong>Total:</strong> Rp<?= number_format($order['total'], 0, ',', '.') ?></p>
                    <p><strong>Tanggal:</strong> <?= $order['created_at'] ?></p>
                    <p><strong>Status:</strong> 
                        <span style="color: #00eaff;">Pending</span>
                    </p>
                </div>
            </div>
            <?php endwhile; ?>
        <?php endif; ?>
    </div>
</div>

<?php require_once '../../includes/footer.php'; ?>
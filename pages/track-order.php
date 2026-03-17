<?php
// pages/track-order.php
require_once '../includes/header.php';
?>

<div class="container" style="max-width: 500px; margin: 50px auto;">
    <div class="card">
        <h2 style="color: #00eaff; text-align: center;">🔍 Cek Status Pesanan</h2>
        
        <form method="POST" action="">
            <div class="form-group">
                <label>Order ID (Nomor Pesanan)</label>
                <input type="number" name="order_id" class="form-control" 
                       placeholder="Contoh: 18" required 
                       style="width:100%; padding:10px; margin-bottom:15px;">
            </div>
            
            <div class="form-group">
                <label>Nomor WhatsApp (Saat Order)</label>
                <input type="text" name="wa" class="form-control" 
                       placeholder="08123456789" required 
                       style="width:100%; padding:10px; margin-bottom:15px;">
            </div>
            
            <button type="submit" class="btn" style="width:100%; padding:12px;">
                Cek Pesanan
            </button>
        </form>
        
        <?php
        if($_SERVER['REQUEST_METHOD'] === 'POST'):
            require_once '../koneksi.php';
            
            $order_id = $_POST['order_id'] ?? 0;
            $wa = $_POST['wa'] ?? '';
            
            $sql = "SELECT o.*, 
                    CASE WHEN o.user_id > 0 THEN u.username ELSE 'Guest' END as customer_name
                    FROM orders o 
                    LEFT JOIN users u ON o.user_id = u.id
                    WHERE o.id = ? AND o.wa = ?";
            
            $stmt = mysqli_prepare($conn, $sql);
            mysqli_stmt_bind_param($stmt, "is", $order_id, $wa);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            
            if($order = mysqli_fetch_assoc($result)): ?>
            
            <div class="card" style="margin-top: 30px; background: #0f172a;">
                <h3 style="color: #00eaff;">✅ Pesanan Ditemukan</h3>
                
                <div class="summary-item">
                    <span>Order ID:</span>
                    <span>#<?= $order['id'] ?></span>
                </div>
                <div class="summary-item">
                    <span>Game:</span>
                    <span><?= $order['game'] ?></span>
                </div>
                <div class="summary-item">
                    <span>Diamond:</span>
                    <span><?= $order['diamond'] ?> 💎</span>
                </div>
                <div class="summary-item">
                    <span>Total:</span>
                    <span>Rp<?= number_format($order['total'], 0, ',', '.') ?></span>
                </div>
                <div class="summary-item">
                    <span>Tanggal:</span>
                    <span><?= $order['created_at'] ?></span>
                </div>
                <div class="summary-item">
                    <span>Status:</span>
                    <span style="color: #00eaff; font-weight: bold;">Pending</span>
                </div>
                <div class="summary-item">
                    <span>Customer:</span>
                    <span><?= $order['customer_name'] ?></span>
                </div>
            </div>
            
            <?php else: ?>
                <div style="background: #ff000020; color: #ff5555; padding: 15px; border-radius: 8px; margin-top: 20px; border: 1px solid #ff5555; text-align: center;">
                    ❌ Pesanan tidak ditemukan!<br>
                    Pastikan Order ID dan No. WA benar.
                </div>
            <?php 
            endif;
        endif; 
        ?>
    </div>
</div>

<?php require_once '../includes/footer.php'; ?>
<?php
// pages/qris.php
$order_id = $_GET['order_id'] ?? '-';
$game = $_GET['game'] ?? 'Game';
$diamond = $_GET['diamond'] ?? '-';
$payment = $_GET['payment'] ?? '-';
$total = $_GET['total'] ?? '-';
$wa = $_GET['wa'] ?? '-';
?>

<!DOCTYPE html>
<html>
<head>
    <title>Pembayaran QRIS - FURY PROJECT</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <style>
        .qris-container {
            max-width: 500px;
            margin: 50px auto;
            background: #0f172a;
            padding: 30px;
            border-radius: 12px;
            text-align: center;
            box-shadow: 0 0 20px rgba(0,234,255,0.3);
        }
        .order-id {
            background: #020617;
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 20px;
            border: 1px solid #ffaa00;
        }
        .order-id h3 {
            color: #ffaa00;
            font-size: 24px;
            margin: 0;
        }
        .order-detail {
            background: #020617;
            padding: 20px;
            border-radius: 8px;
            margin: 20px 0;
            text-align: left;
        }
        .order-detail p {
            margin: 8px 0;
            color: #ddd;
        }
        .qris-image {
            margin: 20px 0;
        }
        .qris-image img {
            width: 250px;
            border-radius: 10px;
            border: 2px solid #00eaff;
        }
        .instructions {
            color: #bbb;
            font-size: 14px;
            margin-top: 20px;
            text-align: left;
            background: #0a0f1f;
            padding: 20px;
            border-radius: 8px;
        }
        .btn {
            background: #00eaff;
            border: none;
            padding: 12px 24px;
            border-radius: 8px;
            cursor: pointer;
            font-weight: bold;
            margin-top: 20px;
            text-decoration: none;
            display: inline-block;
        }
        .btn-close {
            background: #333;
            color: white;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="qris-container">
            
            <div class="order-id">
                <h3>🔖 ORDER ID: #<?= $order_id ?></h3>
                <p style="color: #bbb; font-size: 12px;">Simpan nomor ini untuk cek status</p>
            </div>
            
            <h1 style="color: #00eaff;">Scan QRIS</h1>
            
            <div class="order-detail">
                <p><strong>Game:</strong> <?= htmlspecialchars($game) ?></p>
                <p><strong>Diamond:</strong> <?= htmlspecialchars($diamond) ?></p>
                <p><strong>Pembayaran:</strong> <?= htmlspecialchars($payment) ?></p>
                <p><strong>Total:</strong> <?= htmlspecialchars($total) ?></p>
                <p><strong>No. WA:</strong> <?= htmlspecialchars($wa) ?></p>
            </div>
            
            <div class="qris-image">
                <img src="../assets/img/qris.png" alt="QRIS">
            </div>
            
            <div class="instructions">
                <h4 style="color: #00eaff;">📌 Cara Pembayaran:</h4>
                <ol style="margin-left: 20px;">
                    <li>Screenshot QRIS ini</li>
                    <li>Buka aplikasi DANA/OVO/GoPay</li>
                    <li>Pilih menu Scan QR</li>
                    <li>Upload screenshot atau scan langsung</li>
                    <li>Selesaikan pembayaran</li>
                </ol>
                
                <div style="background: #020617; padding: 10px; border-radius: 8px; margin-top: 15px;">
                    <p style="color: #ffaa00;">⚠️ Simpan Order ID #<?= $order_id ?> untuk cek status</p>
                </div>
            </div>
            
            <div style="display: flex; gap: 10px; justify-content: center; margin-top: 20px;">
                <button class="btn btn-close" onclick="window.close()">Tutup</button>
                <button class="btn" onclick="window.location.href='track-order.php?order_id=<?= $order_id ?>'">
                    Cek Status
                </button>
            </div>
            
        </div>
    </div>
</body>
</html>
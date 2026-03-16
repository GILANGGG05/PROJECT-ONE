<?php
// pages/qris.php
$game = $_GET['game'] ?? 'Game';
$diamond = $_GET['diamond'] ?? '-';
$payment = $_GET['payment'] ?? '-';
$total = $_GET['total'] ?? '-';
$wa = $_GET['wa'] ?? '-';
?>

<!DOCTYPE html>
<html>
<head>
    <title>Pembayaran QRIS</title>
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
        }
        .btn {
            background: #00eaff;
            border: none;
            padding: 12px 24px;
            border-radius: 8px;
            cursor: pointer;
            font-weight: bold;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="qris-container">
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
                <h4>Cara Pembayaran:</h4>
                <ol style="margin-left: 20px;">
                    <li>Screenshot QRIS ini</li>
                    <li>Buka aplikasi DANA/OVO/GoPay</li>
                    <li>Pilih menu Scan QR</li>
                    <li>Upload screenshot atau scan langsung</li>
                    <li>Selesaikan pembayaran</li>
                </ol>
            </div>
            
            <button class="btn" onclick="window.print()">Cetak / Simpan</button>
            <button class="btn" onclick="window.location.href='ml.php'" style="background: #333;">Kembali</button>
        </div>
    </div>
</body>
</html>
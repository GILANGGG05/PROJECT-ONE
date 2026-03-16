<!DOCTYPE html>
<html>

<head>

<title>Top Up Free Fire max</title>

<link rel="stylesheet" href="../assets/css/style.css">

</head>

<body>

<div class="container">

<!-- LEFT -->

<div>

<div class="banner">
<img src="../assets/img/ffmax.jpg" alt="Free Fire MAX">
<div>
<h1>FREE FIRE MAX</h1>
<p>Top Up Diamond Cepat & Murah</p>
</div>
</div>

<div class="card">

<div class="card-title">1. Masukkan User ID</div>

<input id="userid" placeholder="User ID">
<input id="serverid" placeholder="Server ID">

<div id="nickname" class="nickname">Nickname : -</div>

</div>

<div class="card">

<div class="card-title">2. Pilih Diamond</div>

<div class="diamond-grid">

<div class="diamond" data-price="20000">86 💎<br>Rp20.000</div>
<div class="diamond" data-price="38000">172 💎<br>Rp38.000</div>
<div class="diamond" data-price="55000">257 💎<br>Rp55.000</div>
<div class="diamond" data-price="72000">344 💎<br>Rp72.000</div>
<div class="diamond" data-price="90000">429 💎<br>Rp90.000</div>
<div class="diamond" data-price="105000">514 💎<br>Rp105.000</div>
<div class="diamond" data-price="150000">706 💎<br>Rp150.000</div>
<div class="diamond" data-price="200000">878 💎<br>Rp200.000</div>
<div class="diamond" data-price="250000">1050 💎<br>Rp250.000</div>

</div>

</div>

<div class="card">

<div class="card-title">3. Metode Pembayaran</div>

<div class="payment-grid">

<div class="payment">💰 DANA</div>
<div class="payment">💜 OVO</div>
<div class="payment">🟢 GoPay</div>
<div class="payment">📱 QRIS</div>
<div class="payment">🏦 BCA</div>
<div class="payment">🏦 BRI</div>

</div>

</div>

<div class="card">

<div class="card-title">4. Nomor WhatsApp</div>

<input id="wa" placeholder="08xxxxxxxx">

</div>

</div>

<!-- RIGHT -->

<div class="summary">

<h3>Ringkasan Pesanan</h3>

<div class="summary-item">
<span>Game</span>
<span>Mobile Legends</span>
</div>

<div class="summary-item">
<span>Diamond</span>
<span id="sumDiamond">-</span>
</div>

<div class="summary-item">
<span>Pembayaran</span>
<span id="sumPay">-</span>
</div>

<div class="summary-item">
<span>Total</span>
<span id="sumPrice">-</span>
</div>

<button class="order-btn" onclick="showModal()">Beli Sekarang</button>

</div>

</div>

<!-- MODAL -->
<div id="modal" class="modal">

    <div class="modal-box">

        <h3>Konfirmasi Pesanan</h3>

        <p id="modalText"></p>

        <div class="modal-buttons">

            <button class="btn-confirm" onclick="confirmOrder()">
                Konfirmasi Pembayaran
            </button>

            <button class="btn-cancel" onclick="closeModal()">
                Batal
            </button>

        </div>

    </div>

</div>
<!-- MODAL KONFIRMASI -->
 
<script src="../assets/js/order.js"></script>
</body>
</html>
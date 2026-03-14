<!DOCTYPE html>
<html>
<head>
    <title>Top Up Mobile Legends</title>
</head>
<body>
    <h2>Top Up Mobile Legends</h2>

    <form action="../process/order.php" method="POST">
        <input type="hidden" name="game" value="ML">

        <label>User ID</label>
        <input type="text" name="user_id" required><br>

        <label>Server</label>
        <input type="text" name="server"><br>

        <label>Pilih Diamond</label>
        <select name="diamond" required>
            <option value="86">86 Diamond - 20.000</option>
            <option value="172">172 Diamond - 40.000</option>
            <option value="257">257 Diamond - 60.000</option>
        </select><br>

        <label>Pembayaran</label>
        <select name="payment" required>
            <option>DANA</option>
            <option>OVO</option>
            <option>QRIS</option>
        </select><br><br>

        <button type="submit">Beli Sekarang</button>
    </form>
</body>
</html>
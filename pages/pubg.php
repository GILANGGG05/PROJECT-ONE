<!DOCTYPE html>
<html>
<head>
    <title>Top Up PUBG Mobile</title>
</head>
<body>
    <h2>Top Up PUBG Mobile</h2>    

    <form action="../process/order.php" method="POST">
        <input type="hidden" name="game" value="PUBG">

        <label>User ID</label>
        <input type="text" name="user_id" required><br>

        <label>Server</label>
        <input type="text" name="server"><br>

        <label>Pilih UC</label>
        <select name="diamond" required>
            <option value="60">60 UC - 20.000</option>
            <option value="125">125 UC - 40.000</option>
            <option value="250">250 UC - 80.000</option>
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
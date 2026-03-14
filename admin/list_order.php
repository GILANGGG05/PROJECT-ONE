<?php
include '../koneksi.php';

$result = mysqli_query($conn, "SELECT * FROM orders ORDER BY created_at DESC");

echo "<h2>Daftar Order</h2>";
echo "<table border='1' cellpadding='5' cellspacing='0'>";
echo "<tr>
        <th>ID</th>
        <th>Game</th>
        <th>User ID</th>
        <th>Server</th>
        <th>Diamond</th>
        <th>Pembayaran</th>
        <th>Waktu</th>
      </tr>";

while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr>
            <td>{$row['id']}</td>
            <td>{$row['game']}</td>
            <td>{$row['user_id']}</td>
            <td>{$row['server']}</td>
            <td>{$row['diamond']}</td>
            <td>{$row['payment']}</td>
            <td>{$row['created_at']}</td>
          </tr>";
}
echo "</table>";
?>
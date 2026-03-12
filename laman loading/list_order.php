<?php
include "koneksi.php";

$data = mysqli_query($conn,"SELECT * FROM orders");
?>

<h2>Data Order</h2>

<table border="1">

<tr>
<th>ID</th>
<th>Game ID</th>
<th>Server</th>
<th>Diamond</th>
<th>Price</th>
</tr>

<?php while($row = mysqli_fetch_array($data)){ ?>

<tr>
<td><?php echo $row['id']; ?></td>
<td><?php echo $row['game_id']; ?></td>
<td><?php echo $row['server_id']; ?></td>
<td><?php echo $row['diamond']; ?></td>
<td><?php echo $row['price']; ?></td>
</tr>

<?php } ?>

</table>
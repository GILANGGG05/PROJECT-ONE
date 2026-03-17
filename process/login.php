<?php
// process/login.php
session_start();
require_once '../koneksi.php';

$username = $_POST['username'] ?? '';
$password = $_POST['password'] ?? '';

if (empty($username) || empty($password)) {
    header("Location: ../pages/auth/login.php?error=Username dan password harus diisi!");
    exit;
}

// Cari user berdasarkan username atau email
$sql = "SELECT * FROM users WHERE username = ? OR email = ?";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "ss", $username, $username);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$user = mysqli_fetch_assoc($result);

// Cek password
if ($user && password_verify($password, $user['password'])) {
    // Login sukses
    $_SESSION['user_id'] = $user['id'];
    $_SESSION['username'] = $user['username'];
    $_SESSION['login'] = true;
    $_SESSION['role'] = $user['role'] ?? 'user';
    
    // Redirect sesuai role
    if ($_SESSION['role'] === 'admin') {
        header("Location: ../pages/admin/dashboard.php");
    } else {
        header("Location: ../pages/user/dashboard.php");
    }
    exit;
} else {
    header("Location: ../pages/auth/login.php?error=Username atau password salah!");
    exit;
}
?>
<?php
// process/register.php
session_start();
require_once '../koneksi.php';

// Ambil data dari form
$username = $_POST['username'] ?? '';
$email = $_POST['email'] ?? '';
$password = $_POST['password'] ?? '';
$confirm_password = $_POST['confirm_password'] ?? '';
$wa = $_POST['wa'] ?? '';  // <=== BARIS 1: TAMBAHAN field WA

// Validasi (UPDATE: tambah validasi WA)
if (empty($username) || empty($email) || empty($password) || empty($wa)) {  // <=== BARIS 2: TAMBAH WA
    header("Location: ../pages/auth/register.php?error=Semua field harus diisi!");
    exit;
}

if ($password !== $confirm_password) {
    header("Location: ../pages/auth/register.php?error=Password tidak cocok!");
    exit;
}

if (strlen($password) < 6) {
    header("Location: ../pages/auth/register.php?error=Password minimal 6 karakter!");
    exit;
}

// Validasi format WA (hanya angka, minimal 10 digit)  // <=== BARIS 3: VALIDASI WA
if (!preg_match('/^[0-9]{10,15}$/', $wa)) {
    header("Location: ../pages/auth/register.php?error=Nomor WA tidak valid! (Minimal 10 angka)");
    exit;
}

// Cek apakah username sudah ada
$check = mysqli_query($conn, "SELECT id FROM users WHERE username = '$username'");
if (mysqli_num_rows($check) > 0) {
    header("Location: ../pages/auth/register.php?error=Username sudah digunakan!");
    exit;
}

// Cek apakah email sudah ada
$check = mysqli_query($conn, "SELECT id FROM users WHERE email = '$email'");
if (mysqli_num_rows($check) > 0) {
    header("Location: ../pages/auth/register.php?error=Email sudah terdaftar!");
    exit;
}

// Cek apakah WA sudah terdaftar  // <=== BARIS 4: CEK WA DUPLIKAT
$check = mysqli_query($conn, "SELECT id FROM users WHERE wa = '$wa'");
if (mysqli_num_rows($check) > 0) {
    header("Location: ../pages/auth/register.php?error=Nomor WA sudah terdaftar! Gunakan nomor lain atau login.");
    exit;
}

// Hash password
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

// Simpan ke database (UPDATE: tambah field WA)
$sql = "INSERT INTO users (username, email, wa, password) VALUES (?, ?, ?, ?)";  // <=== BARIS 5: TAMBAH WA
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "ssss", $username, $email, $wa, $hashed_password);  // <=== BARIS 6: TAMBAH WA

if (mysqli_stmt_execute($stmt)) {
    // Dapat ID user yang baru register
    $new_user_id = mysqli_insert_id($conn);
    
    // ====== BARIS 7: MERGE ORDER GUEST ======
    // Update semua order guest dengan WA yang sama
    $update_sql = "UPDATE orders SET user_id = ? WHERE wa = ? AND user_id = 0";
    $update_stmt = mysqli_prepare($conn, $update_sql);
    mysqli_stmt_bind_param($update_stmt, "is", $new_user_id, $wa);
    mysqli_stmt_execute($update_stmt);
    
    $jumlah_order = mysqli_stmt_affected_rows($update_stmt);
    if ($jumlah_order > 0) {
        $_SESSION['merge_notif'] = "$jumlah_order pesanan lama Anda telah ditambahkan ke akun";
    }
    // ====== SAMPAI SINI ======
    
    header("Location: ../pages/auth/login.php?success=1");
    exit;
} else {
    header("Location: ../pages/auth/register.php?error=" . urlencode(mysqli_error($conn)));
    exit;
}
?>
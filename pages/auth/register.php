<?php
// pages/auth/register.php
require_once '../../includes/header.php';
?>

<div class="container" style="max-width: 400px; margin: 50px auto;">
    <div class="card">
        <h2 style="color: #00eaff; text-align: center; margin-bottom: 20px;">📝 Daftar Akun Baru</h2>
        
        <?php if(isset($_GET['error'])): ?>
            <div style="background: #ff000020; color: #ff5555; padding: 10px; border-radius: 5px; margin-bottom: 20px; border: 1px solid #ff5555;">
                <?= htmlspecialchars($_GET['error']) ?>
            </div>
        <?php endif; ?>
        
        <form action="../../process/register.php" method="POST">
            <div class="form-group">
                <label>Username</label>
                <input type="text" name="username" class="form-control" required 
                       placeholder="Masukkan username" style="width: 100%; padding: 10px;">
            </div>
            
            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" class="form-control" required 
                       placeholder="Masukkan email" style="width: 100%; padding: 10px;">
            </div>
            
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" class="form-control" required 
                       placeholder="Minimal 6 karakter" style="width: 100%; padding: 10px;">
            </div>
            
            <div class="form-group">
                <label>Konfirmasi Password</label>
                <input type="password" name="confirm_password" class="form-control" required 
                       placeholder="Ulangi password" style="width: 100%; padding: 10px;">
            </div>
            
            <div class="form-group">
                <label>Nomor WhatsApp</label>
                <input type="text" name="wa" class="form-control" required 
                       placeholder="Contoh: 08123456789" style="width: 100%; padding: 10px;">
            </div>
            <button type="submit" class="btn" style="width: 100%; padding: 12px; font-size: 16px; margin-top: 10px;">
                Daftar
            </button>
        </form>
        
        <p style="text-align: center; margin-top: 20px; color: #bbb;">
            Sudah punya akun? 
            <a href="login.php" style="color: #00eaff; text-decoration: none;">Login di sini</a>
        </p>
    </div>
</div>

<?php require_once '../../includes/footer.php'; ?>
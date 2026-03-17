<?php
// pages/auth/login.php
require_once '../../includes/header.php';
?>

<div class="container" style="max-width: 400px; margin: 50px auto;">
    <div class="card">
        <h2 style="color: #00eaff; text-align: center; margin-bottom: 20px;">🔐 Login</h2>
        
        <?php if(isset($_GET['success'])): ?>
            <div style="background: #00eaff20; color: #00eaff; padding: 10px; border-radius: 5px; margin-bottom: 20px; border: 1px solid #00eaff;">
                Registrasi berhasil! Silakan login.
            </div>
        <?php endif; ?>
        
        <?php if(isset($_GET['error'])): ?>
            <div style="background: #ff000020; color: #ff5555; padding: 10px; border-radius: 5px; margin-bottom: 20px; border: 1px solid #ff5555;">
                <?= htmlspecialchars($_GET['error']) ?>
            </div>
        <?php endif; ?>
        
        <form action="../../process/login.php" method="POST">
            <div class="form-group">
                <label>Username atau Email</label>
                <input type="text" name="username" class="form-control" required 
                       placeholder="Masukkan username atau email" style="width: 100%; padding: 10px;">
            </div>
            
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" class="form-control" required 
                       placeholder="Masukkan password" style="width: 100%; padding: 10px;">
            </div>
            
            <button type="submit" class="btn" style="width: 100%; padding: 12px; font-size: 16px; margin-top: 10px;">
                Login
            </button>
        </form>
        
        <p style="text-align: center; margin-top: 20px; color: #bbb;">
            Belum punya akun? 
            <a href="register.php" style="color: #00eaff; text-decoration: none;">Daftar di sini</a>
        </p>
    </div>
</div>

<?php require_once '../../includes/footer.php'; ?>
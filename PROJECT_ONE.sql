-- =====================================================
-- DATABASE: project_one_db (atau ganti sesuai keinginan)
-- STRUKTUR TABLE orders DENGAN KOLOM GAME
-- =====================================================

-- Buat database (comment baris ini jika sudah buat manual)
-- CREATE DATABASE IF NOT EXISTS project_one_db;
-- USE project_one_db;

-- =====================================================
-- TABLE: migrations (untuk log migration)
-- =====================================================
CREATE TABLE IF NOT EXISTS migrations (
    id INT AUTO_INCREMENT PRIMARY KEY,
    migration_name VARCHAR(255) NOT NULL,
    run_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- =====================================================
-- TABLE: users (asumsi karena ada user_id di orders)
-- =====================================================
CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    password VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- =====================================================
-- TABLE: servers (asumsi karena ada server_id di orders)
-- =====================================================
CREATE TABLE IF NOT EXISTS servers (
    id INT AUTO_INCREMENT PRIMARY KEY,
    server_name VARCHAR(100) NOT NULL,
    server_ip VARCHAR(50),
    status ENUM('active', 'inactive') DEFAULT 'active',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- =====================================================
-- TABLE: orders (YANG UTAMA DENGAN KOLOM GAME)
-- =====================================================
CREATE TABLE IF NOT EXISTS orders (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    server_id INT NOT NULL,
    game VARCHAR(100) NOT NULL,           -- KOLOM GAME YANG BARU DITAMBAH
    nickname VARCHAR(100) NOT NULL,
    diamond INT NOT NULL,
    payment VARCHAR(50) NOT NULL,
    total DECIMAL(10,2) NOT NULL,
    wa VARCHAR(20) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    
    -- Foreign keys (optional, bisa diaktifkan kalau perlu)
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE,
    FOREIGN KEY (server_id) REFERENCES servers(id) ON DELETE CASCADE
);

-- =====================================================
-- INSERT DATA MIGRATION (log bahwa migration sudah jalan)
-- =====================================================
INSERT INTO migrations (migration_name) VALUES 
('create_users_table'),
('create_servers_table'), 
('create_orders_table'),
('add_game_to_orders');

-- =====================================================
-- INSERT DATA DUMMY (untuk testing)
-- =====================================================

-- Data dummy users
INSERT INTO users (username, email, password) VALUES
('john_doe', 'john@example.com', MD5('password123')),
('jane_smith', 'jane@example.com', MD5('password123')),
('budi', 'budi@example.com', MD5('password123'));

-- Data dummy servers
INSERT INTO servers (server_name, server_ip, status) VALUES
('Server A - Jakarta', '192.168.1.10', 'active'),
('Server B - Surabaya', '192.168.1.11', 'active'),
('Server C - Bandung', '192.168.1.12', 'inactive');

-- Data dummy orders (dengan kolom GAME)
INSERT INTO orders (user_id, server_id, game, nickname, diamond, payment, total, wa) VALUES
(1, 1, 'Mobile Legends', 'JohnGamer', 500, 'DANA', 100000, '081234567890', NOW()),
(1, 2, 'Free Fire', 'JohnFF', 1000, 'OVO', 200000, '081234567890', NOW()),
(2, 1, 'PUBG Mobile', 'JanePUBG', 600, 'GoPay', 150000, '081298765432', NOW()),
(2, 3, 'Mobile Legends', 'JaneML', 300, 'DANA', 60000, '081298765432', NOW()),
(3, 2, 'Free Fire', 'BudiFF', 1000, 'Bank Transfer', 200000, '081234598765', NOW());

-- =====================================================
-- VIEW (opsional) untuk memudahkan lihat data
-- =====================================================
CREATE VIEW v_orders_detail AS
SELECT 
    o.id,
    u.username AS pembeli,
    s.server_name AS server,
    o.game,
    o.nickname,
    o.diamond,
    o.payment,
    o.total,
    o.wa,
    o.created_at
FROM orders o
JOIN users u ON o.user_id = u.id
JOIN servers s ON o.server_id = s.id;

-- =====================================================
-- TAMBAHKAN INDEX untuk performa
-- =====================================================
CREATE INDEX idx_user_id ON orders(user_id);
CREATE INDEX idx_server_id ON orders(server_id);
CREATE INDEX idx_game ON orders(game);
CREATE INDEX idx_created_at ON orders(created_at);

-- =====================================================
-- SELESAI
-- =====================================================
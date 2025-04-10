-- استخدام قاعدة واحدة
CREATE DATABASE IF NOT EXISTS fay_db CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE fay_db;

-- جدول المستخدمين المدموج
CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100), -- الاسم كما في قاعدة fay_db
    username VARCHAR(50) UNIQUE, -- اسم المستخدم كما في food_donation
    email VARCHAR(100) NOT NULL UNIQUE,
    phone VARCHAR(20), -- رقم الهاتف من fay_db
    password VARCHAR(255) NOT NULL,
    remember_token VARCHAR(100) DEFAULT NULL,
    token_expiry INT DEFAULT NULL,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- جدول الجلسات
CREATE TABLE IF NOT EXISTS sessions (
    id VARCHAR(128) PRIMARY KEY,
    user_id INT NOT NULL,
    ip_address VARCHAR(45) DEFAULT NULL,
    user_agent TEXT DEFAULT NULL,
    payload TEXT NOT NULL,
    last_activity INT NOT NULL,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
);

-- جدول إعادة تعيين كلمات المرور
CREATE TABLE IF NOT EXISTS password_resets (
    email VARCHAR(100) NOT NULL,
    token VARCHAR(100) NOT NULL,
    created_at DATETIME NOT NULL,
    PRIMARY KEY (email)
);

-- جدول التبرعات
CREATE TABLE IF NOT EXISTS donations (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    donation_type VARCHAR(100) NOT NULL,
    weight DECIMAL(10,2) NOT NULL,
    city VARCHAR(100) NOT NULL,
    additional_info TEXT,
    donation_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
);

-- إدخال مستخدم تجريبي
INSERT INTO users (name, username, email, phone, password, created_at)
VALUES (
    'مستخدم تجريبي',
    'demo_user',
    'test@example.com',
    '0123456789',
    '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
    NOW()
);

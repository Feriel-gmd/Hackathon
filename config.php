<?php
$host = 'localhost';       // عادة localhost
$db   = 'fay_db';          // اسم قاعدة البيانات
$user = 'root';            // اسم المستخدم (غيّره إذا لزم)
$pass = 'root';                // كلمة المرور (اتركها فارغة إذا لم توجد)

$conn = new mysqli($host, $user, $pass, $db);

// فحص الاتصال
if ($conn->connect_error) {
    die("فشل الاتصال بقاعدة البيانات: " . $conn->connect_error);
}

// تعيين الترميز
$conn->set_charset("utf8mb4");

// يمكنك الآن استخدام $conn لتنفيذ استعلامات
?>

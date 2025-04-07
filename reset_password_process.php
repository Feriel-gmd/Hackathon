<?php
// Start the session
session_start();

// Database connection parameters
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "fay_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $email = $_POST['email'];
    
    // Check if email exists
    $stmt = $conn->prepare("SELECT id FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        // Generate reset token
        $token = bin2hex(random_bytes(32));
        $expiry = date('Y-m-d H:i:s', strtotime('+1 hour'));
        
        // Delete any existing reset tokens for this email
        $stmt = $conn->prepare("DELETE FROM password_resets WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        
        // Insert new reset token
        $stmt = $conn->prepare("INSERT INTO password_resets (email, token, created_at) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $email, $token, $expiry);
        
        if ($stmt->execute()) {
            // In a real application, you would send an email with the reset link
            // For this example, we'll just show a success message
            $_SESSION['reset_success'] = "تم إرسال رابط إعادة تعيين كلمة المرور إلى بريدك الإلكتروني.";
            header("Location: forgot_password.php");
            exit();
        } else {
            $_SESSION['reset_error'] = "حدث خطأ أثناء معالجة طلبك. يرجى المحاولة مرة أخرى.";
            header("Location: forgot_password.php");
            exit();
        }
    } else {
        // Email not found
        $_SESSION['reset_error'] = "البريد الإلكتروني غير موجود في قاعدة البيانات.";
        header("Location: forgot_password.php");
        exit();
    }
    
    $stmt->close();
} else {
    // If not POST request, redirect to forgot password page
    header("Location: forgot_password.php");
    exit();
}

$conn->close();
?> 
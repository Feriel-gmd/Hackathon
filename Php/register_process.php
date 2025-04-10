<?php
// Start the session
session_start();
include 'config.php';

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    
    // Validate form data
    $errors = []; 
    
    // Check if passwords match
    if ($password !== $confirm_password) {
        $errors[] = "كلمات المرور غير متطابقة";
    }
    
    // Validate phone number (Algerian format)
    if (!preg_match('/^(05|06|07)[0-9]{2}[0-9]{2}[0-9]{2}[0-9]{2}$/', $phone)) {
        $_SESSION['register_error'] = 'رقم الهاتف غير صالح. يجب أن يكون رقم هاتف جزائري صالح (مثال: 0555123456)';
        header('Location: register.php');
        exit();
    }
    
    // Check if email already exists
    $stmt = $conn->prepare("SELECT id FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        $errors[] = "البريد الإلكتروني مستخدم بالفعل";
    }
    
    $stmt->close();
    
    // If no errors, proceed with registration
    if (empty($errors)) {
        // Hash password
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        
        // Insert user into database
        $stmt = $conn->prepare("INSERT INTO users (name, email, phone, password, created_at) VALUES (?, ?, ?, ?, NOW())");
        $stmt->bind_param("ssss", $name, $email, $phone, $hashed_password);
        
        if ($stmt->execute()) {
            // Registration successful
            $_SESSION['register_success'] = "تم إنشاء الحساب بنجاح. يمكنك الآن تسجيل الدخول.";
            header("Location: index.php");
            exit();
        } else {
            // Registration failed
            $_SESSION['register_error'] = "حدث خطأ أثناء إنشاء الحساب. يرجى المحاولة مرة أخرى.";
            header("Location: register.php");
            exit();
        }
        
        $stmt->close();
    } else {
        // Store errors in session and redirect back to registration page
        $_SESSION['register_errors'] = $errors;
        header("Location: register.php");
        exit();
    }
} else {
    // If not POST request, redirect to registration page
    header("Location: register.php");
    exit();
}

$conn->close();
?> 
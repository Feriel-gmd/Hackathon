<?php
// Start the session
session_start();
include 'config.php'; 

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $email = $_POST['email'];
    $password = $_POST['password'];
    $remember = isset($_POST['remember']) ? true : false;
    
    // Prepare SQL statement to prevent SQL injection
    $stmt = $conn->prepare("SELECT id, name, email, password FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    
    // Check if user exists
    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        
        // Verify password
        if (password_verify($password, $user['password'])) {
            // Set session variables
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_name'] = $user['name'];
            $_SESSION['user_email'] = $user['email'];
            
            // Set remember me cookie if requested
            if ($remember) {
                $token = bin2hex(random_bytes(32));
                $expiry = time() + (86400 * 30); // 30 days
                
                // Store token in database
                $stmt = $conn->prepare("UPDATE users SET remember_token = ?, token_expiry = ? WHERE id = ?");
                $stmt->bind_param("sii", $token, $expiry, $user['id']);
                $stmt->execute();
                
                // Set cookie
                setcookie("remember_token", $token, $expiry, "/", "", false, true);
            }
            
            // Redirect to home page
            header("Location: index.php");
            exit();
        } else {
            // Invalid password
            $_SESSION['login_error'] = "كلمة المرور غير صحيحة";
            header("Location: login.php");
            exit();
        }
    } else {
        // User not found
        $_SESSION['login_error'] = "البريد الإلكتروني غير موجود";
        header("Location: login.php");
        exit();
    }
    
    $stmt->close();
} else {
    // If not POST request, redirect to login page
    header("Location: login.php");
    exit();
}

$conn->close();
?> 
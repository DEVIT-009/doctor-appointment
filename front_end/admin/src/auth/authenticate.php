<?php
session_start();
include_once "../../../databases/config.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = mysqli_real_escape_string($connection, $_POST['email']);
    $password = mysqli_real_escape_string($connection, $_POST['password']);
    
    // Query to check user credentials and role
    $sql = "SELECT u.user_id, u.user_name, u.email, u.password, u.role_id, r.role_name 
            FROM user u 
            JOIN role r ON u.role_id = r.role_id 
            WHERE u.email = '$email'";
    
    $result = mysqli_query($connection, $sql);
    
    if ($result && mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);
        
        // Verify password (assuming plain text for now, should use password_hash in production)
        if ($password === $user['password']) {
            // Check if user has admin role (role_id = 1)
            if ($user['role_id'] == 1) {
                // Set session variables
                $_SESSION['user_id'] = $user['user_id'];
                $_SESSION['user_name'] = $user['user_name'];
                $_SESSION['email'] = $user['email'];
                $_SESSION['role_id'] = $user['role_id'];
                $_SESSION['role_name'] = $user['role_name'];
                $_SESSION['is_admin'] = true;
                
                // Redirect to admin dashboard
                header("Location: ../../?page=default&dashboards");
                exit();
            } else {
                // User doesn't have admin privileges
                $_SESSION['login_error'] = "Access denied. Admin privileges required.";
                header("Location: ../../?page=auth&login");
                exit();
            }
        } else {
            // Invalid password
            $_SESSION['login_error'] = "Invalid email or password.";
            header("Location: ../../?page=auth&login");
            exit();
        }
    } else {
        // User not found
        $_SESSION['login_error'] = "Invalid email or password.";
        header("Location: ../../?page=auth&login");
        exit();
    }
} else {
    // Invalid request method
    header("Location: ../../?page=auth&login");
    exit();
}

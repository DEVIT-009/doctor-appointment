<?php
// Simple test file to verify authentication is working
session_start();

echo "<h2>Authentication Test</h2>";
echo "<p>Session Status:</p>";
echo "<pre>";
print_r($_SESSION);
echo "</pre>";

if (isset($_SESSION['user_id']) && isset($_SESSION['is_admin']) && $_SESSION['is_admin'] === true) {
    echo "<p style='color: green;'>✅ User is authenticated as admin</p>";
    echo "<p>User ID: " . $_SESSION['user_id'] . "</p>";
    echo "<p>User Name: " . $_SESSION['user_name'] . "</p>";
    echo "<p>Email: " . $_SESSION['email'] . "</p>";
    echo "<p>Role: " . $_SESSION['role_name'] . "</p>";
} else {
    echo "<p style='color: red;'>❌ User is NOT authenticated</p>";
}

echo "<p><a href='?page=auth&login'>Go to Login</a></p>";
echo "<p><a href='?logout=1'>Logout</a></p>";
?>

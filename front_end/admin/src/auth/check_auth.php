<?php
session_start();

// Check if user is logged in and has admin privileges
function checkAdminAuth() {
    if (!isset($_SESSION['user_id']) || !isset($_SESSION['is_admin']) || $_SESSION['is_admin'] !== true) {
        // Redirect to login page if not authenticated
        header("Location: ?page=auth&login");
        exit();
    }
}

// Function to logout user
function logout() {
    session_start();
    session_destroy();
    header("Location: ?page=auth&login");
    exit();
}

// Check if logout is requested
if (isset($_GET['logout'])) {
    logout();
}
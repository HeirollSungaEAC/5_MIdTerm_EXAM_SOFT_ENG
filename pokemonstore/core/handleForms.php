<?php
require_once 'dbConfig.php'; 
require_once 'models.php'; 

function handleRegistrationForm($postData) {
    // Validate input
    $first_name = trim($postData['first_name']);
    $last_name = trim($postData['last_name']);
    $email = trim($postData['email']);
    $password = trim($postData['password']);

    if (empty($first_name) || empty($last_name) || empty($email) || empty($password)) {
        return "All fields are required.";
    }

    // Check if email already exists
    $existingUser = getUserByEmail($GLOBALS['pdo'], $email);
    if ($existingUser) {
        return "Email already registered.";
    }

    // Register user
    if (registerUser($GLOBALS['pdo'], $first_name, $last_name, $email, password_hash($password, PASSWORD_DEFAULT))) {
        return "Registration successful.";
    } else {
        return "There was an error registering your account.";
    }
}

function handleLoginForm($postData) {
    $email = trim($postData['email']);
    $password = trim($postData['password']);

    if (empty($email) || empty($password)) {
        return "Both fields are required.";
    }

    // Fetch user by email
    $user = getUserByEmail($GLOBALS['pdo'], $email);
    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        return "Login successful.";
    } else {
        return "Invalid email or password.";
    }
}
?>

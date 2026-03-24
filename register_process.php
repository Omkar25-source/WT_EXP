<?php
require 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $stmt = $pdo->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
    
    try {
        $stmt->execute([$username, $email, $password]);
        echo "<h3>Registration successful!</h3><p><a href='login.php'>Click here to login</a></p>";
    } catch(PDOException $e) {
        // Handle duplicate entry error
        if ($e->getCode() == 23000) {
            echo "<h3>Error: Username or email already exists.</h3><p><a href='register.php'>Try again</a></p>";
        } else {
            echo "<h3>Error: " . $e->getMessage() . "</h3>";
        }
    }
} else {
    header("Location: register.php");
    exit();
}
?>

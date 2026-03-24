<?php
session_start();

// Check if user is legally logged in. If not, redirect to login page
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <style>
        body { font-family: sans-serif; max-width: 600px; margin: 50px auto; padding: 20px; border: 1px solid #ccc; border-radius: 5px; text-align: center; }
        h2 { color: #333; }
        .logout-btn { display: inline-block; margin-top: 20px; padding: 10px 20px; background-color: #dc3545; color: white; text-decoration: none; border-radius: 4px; }
        .logout-btn:hover { background-color: #c82333; }
    </style>
</head>
<body>
    <h2>Welcome to your Dashboard, <?php echo htmlspecialchars($_SESSION['username']); ?>!</h2>
    <p>You have successfully logged in.</p>
    <p>This is a protected page that only authenticated users can see.</p>
    
    <a href="logout.php" class="logout-btn">Logout</a>
</body>
</html>

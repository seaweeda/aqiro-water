<?php
session_start();
require_once '../config/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $stmt = $pdo->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->execute([$username]);
    $user = $stmt->fetch();

    if ($user && md5($password) === $user['password']) {
        $_SESSION['user'] = $user['username'];
        header("Location: dashboard.php");
        exit;
    } else {
        $error = "Username atau password salah!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body class="fullscreen-bg">
    <div class="overlay">
        <h2>Login Admin</h2>
        <?php if (isset($error)) echo "<p class='error'>$error</p>"; ?>
        <form method="POST">
            <label>Username: </label><br>
            <input type="text" name="username" placeholder="Username" required><br><br>

            <label>Password: </label><br>
            <input type="password" name="password" placeholder="Password" required><br><br>
            
            <button type="submit" class="button-link">Login</button>
        </form>
    </div>
</body>
</html>

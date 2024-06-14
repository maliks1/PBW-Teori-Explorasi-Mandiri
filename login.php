<?php
// Memulai sesi
session_start();

if (isset($_SESSION['email'])) {
    header("Location: index.php");
    exit; // Memastikan agar tidak ada kode yang dieksekusi setelah melakukan redirect
} ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <script src="script.js"></script>
</head>

<body>
    <div class="login-page">
        <div class="form">
            <h1>Login Form</h1>
            <br>
            <form method="POST" action="./login_proccess.php" class="login-form">
                <input type="email" name="email" placeholder="email" />
                <input type="password" name="password" placeholder="password" />
                <button type="submit">login</button>
                <p class="message"><a href="forget.php">Forget account</a> Or <a href="register.php">Create an account</a></p>
            </form>
        </div>
    </div>
</body>

</html>
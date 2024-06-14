<?php

// Memulai sesi
session_start();

// memanggil koneksi database connect.php

if (isset($_POST["send"])) {
    if ($_POST['tokens'] == $_SESSION['token']) {
        header("Location: index.php");
    } else {
        echo "Invalid token. Please try again.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>

<body>
    <div class="login-page">
        <div class="form">
            <h1>Login Form</h1>
            <br>
            <form method="POST" action="auth_proccess.php" class="login-form">
                <input type="text" name="tokens" placeholder="input token" />
                <button type="submit" name="send">submit</button>
                <p class="message"><a href="login.php">Login</a> Or <a href="register.php">Create an
                        account</a></p>
            </form>
        </div>
    </div>
</body>

</html>
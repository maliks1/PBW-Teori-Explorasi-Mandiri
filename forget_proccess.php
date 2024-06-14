<?php

// Memulai sesi
session_start();

if (isset($_SESSION['email'])) {
    header("Location: index.php");
    exit; // Memastikan agar tidak ada kode yang dieksekusi setelah melakukan redirect
}

// memanggil koneksi database connect.php
include_once ("./koneksi.php");
$email = '';
$n = 10;
function getName($n)
{
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $randomString = '';

    for ($i = 0; $i < $n; $i++) {
        $index = rand(0, strlen($characters) - 1);
        $randomString .= $characters[$index];
    }

    return $randomString;
}

$token = getName($n);

// apakah ada POST request email dan password dari form?
if (isset($_POST['token']) == $token) {
        $formToken = $_POST['token'];  // Get token from POST data
        $urlToken = $_GET['token'];    // Get token from URL (assuming it's sent via GET)
      
        if ($formToken === $urlToken) {  // Compare form and URL tokens
          $email = $_POST['email'];  // Assuming email is also sent via POST
      
          // Validate email against database (assuming email is unique identifier)
          $sql = "SELECT * FROM users WHERE email='$email'";
          $result = mysqli_query($koneksi, $sql);
      
          if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
      
            $_SESSION['email'] = $email;
            header("Location: index.php");
      
          } else {
            echo "Email tidak ditemukan.";
          }
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
            <form method="POST" class="login-form">
                <input type="text" name="token" placeholder="input token" />
                <button type="submit">submit</button>
                <p class="message"><a href="login.php">Login</a> Or <a href="register.php">Create an
                        account</a></p>
            </form>
        </div>
    </div>
</body>

</html>
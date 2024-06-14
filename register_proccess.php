<?php

// Memulai sesi
session_start();

if (isset($_SESSION['email'])) {
    header("Location: index.php");
    exit; // Memastikan agar tidak ada kode yang dieksekusi setelah melakukan redirect
}

include_once ("./koneksi.php");

if (isset($_POST['email']) && isset($_POST['password'])) {

    $email = $_POST['email'];

    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    
    $sql = "SELECT * FROM users WHERE email='$email'";
    
    $result = mysqli_query($koneksi, $sql);
    
    if (mysqli_num_rows($result) > 0) {
        echo "Email sudah terdaftar.";
    } else {

        $sql = "INSERT INTO users (email, password) VALUES ('$email', '$password')";
        
        if (mysqli_query($koneksi, $sql)) {
            // Jika berhasil
            echo "Registrasi berhasil. Silakan <a href='login.php'>login</a>.";
        } else {
            // Jika gagal
            echo "Registrasi gagal!";
        }
    }
}

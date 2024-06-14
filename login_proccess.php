<?php

// Memulai sesi
session_start();

if (isset($_SESSION['email'])) {
    header("Location: index.php");
    exit; // Memastikan agar tidak ada kode yang dieksekusi setelah melakukan redirect
}

// memanggil koneksi database connect.php
include_once ("./koneksi.php");

// apakah ada POST request email dan password dari form?
if (isset($_POST['email']) && isset($_POST['password'])) {

    // kalau ada, simpain email kedalam variabel email
    $email = $_POST['email'];

    // kalau ada, simpan password kedalam variabel email
    $password = $_POST['password'];

    // kalau ada, simpan password kedalam variabel email
    $sql = "SELECT * FROM users WHERE email='$email'";
    $result = mysqli_query($koneksi, $sql);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);

        if (password_verify($password, $row['password'])) {
            $_SESSION['email'] = $email;
            header("Location: mail.php");
            exit;
        } else {
            echo "Password salah.";
        }
    } else {
        echo "Email tidak ditemukan.";
    }
}
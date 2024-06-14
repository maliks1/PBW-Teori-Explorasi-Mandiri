<?php
// Mulai interaksi session
session_start();

// Hapus session
session_destroy();

// Pindahkan ke halaman login
header("Location: login.php");
exit; // Pastikan untuk menghentikan eksekusi skrip setelah melakukan redirect
?>
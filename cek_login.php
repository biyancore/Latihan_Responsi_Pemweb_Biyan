<?php
session_start();
include 'koneksi.php';

$username = $_POST['username'];
$password = $_POST['password'];

$data = mysqli_query($koneksi, "SELECT * FROM users 
                                WHERE username='$username' AND password='$password'");

$cek = mysqli_num_rows($data);

if ($cek > 0) {
    $user = mysqli_fetch_assoc($data);

    $_SESSION['username']     = $user['username'];
    $_SESSION['nama_lengkap'] = $user['nama_lengkap'];
    $_SESSION['status']       = "login";

    header("location: halaman_utama.php");
    exit;
} else {
    header("location: login.php?pesan=gagal");
    exit;
}

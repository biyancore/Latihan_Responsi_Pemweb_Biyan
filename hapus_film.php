<?php
session_start();
include 'koneksi.php';

if (!isset($_SESSION['status']) || $_SESSION['status'] != "login") {
    header("location: login.php?pesan=belum_login");
    exit;
}

$id = $_GET['id'];

mysqli_query($koneksi, "DELETE FROM film WHERE id_film='$id'");

header("location: halaman_utama.php");
exit;

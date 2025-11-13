<?php
session_start();
include 'koneksi.php';

if (!isset($_SESSION['status']) || $_SESSION['status'] != "login") {
    header("location: login.php?pesan=belum_login");
    exit;
}

$pesan = "";

if (isset($_POST['simpan'])) {
    $judul     = $_POST['judul_film'];
    $sutradara = $_POST['sutradara'];
    $harga     = $_POST['harga_tiket'];

    if ($judul == "" || $sutradara == "" || $harga == "") {
        $pesan = "Semua field wajib diisi.";
    } else {
        mysqli_query($koneksi, "INSERT INTO film (judul_film,sutradara,harga_tiket)
                                VALUES ('$judul','$sutradara','$harga')");
        header("location: halaman_utama.php");
        exit;
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Film</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .header-biru {
            background-color: #23374c;
            color: #fff;
        }
        .btn-hijau {
            background-color: #5cb85c;
            border-color: #4cae4c;
            color: #fff;
        }
        .btn-hijau:hover {
            background-color: #4cae4c;
            border-color: #398439;
            color: #fff;
        }
        .btn-abu {
            background-color: #777;
            border-color: #6c6c6c;
            color: #fff;
        }
        .btn-abu:hover {
            background-color: #5e5e5e;
            border-color: #545454;
            color: #fff;
        }
    </style>
</head>
<body class="bg-light">

<div class="container py-4">
    <div class="card shadow-sm">
        <div class="card-header header-biru">
            <h4 class="mb-0">Tambah Film Baru</h4>
            <small>Isi form untuk menambahkan film</small>
        </div>
        <div class="card-body">

            <?php if ($pesan != "") { ?>
                <div class="alert alert-danger py-2 mb-3">
                    <?= $pesan; ?>
                </div>
            <?php } ?>

            <form method="POST" action="">
                <div class="mb-3">
                    <label class="form-label">Judul Film</label>
                    <input type="text" name="judul_film" class="form-control">
                </div>
                <div class="mb-3">
                    <label class="form-label">Sutradara</label>
                    <input type="text" name="sutradara" class="form-control">
                </div>
                <div class="mb-3">
                    <label class="form-label">Harga Tiket (Rp)</label>
                    <input type="number" name="harga_tiket" class="form-control">
                </div>

                <div class="d-flex gap-2">
                    <button type="submit" name="simpan" class="btn btn-hijau">Simpan</button>
                    <a href="halaman_utama.php" class="btn btn-abu">Kembali</a>
                </div>
            </form>

        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

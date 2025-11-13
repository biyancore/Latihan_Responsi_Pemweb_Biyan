<?php
session_start();
include 'koneksi.php';

if (!isset($_SESSION['status']) || $_SESSION['status'] != "login") {
    header("location: login.php?pesan=belum_login");
    exit;
}

$nama = $_SESSION['nama_lengkap'];

$hasil = mysqli_query($koneksi, "SELECT * FROM film ORDER BY id_film ASC");
$total = 0;
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Halaman Utama</title>
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
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h4 class="mb-0">Manajemen Film Bioskop</h4>
                    <small>Selamat datang, <b><?= htmlspecialchars($nama); ?></b> |
                        <a href="logout.php" class="text-white text-decoration-none">Logout</a>
                    </small>
                </div>
            </div>
        </div>

        <div class="card-body">
            <a href="tambah_film.php" class="btn btn-hijau mb-3">Tambah Film</a>

            <table class="table table-bordered table-striped mb-0">
                <thead class="header-biru">
                    <tr>
                        <th style="width: 60px;">ID</th>
                        <th>Judul Film</th>
                        <th>Sutradara</th>
                        <th style="width: 140px;">Harga Tiket</th>
                        <th style="width: 130px;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                <?php while ($row = mysqli_fetch_assoc($hasil)) : ?>
                    <tr>
                        <td><?= $row['id_film']; ?></td>
                        <td><?= htmlspecialchars($row['judul_film']); ?></td>
                        <td><?= htmlspecialchars($row['sutradara']); ?></td>
                        <td>Rp <?= number_format($row['harga_tiket'], 0, ',', '.'); ?></td>
                        <td>
                            <a href="edit_film.php?id=<?= $row['id_film']; ?>" style="color:#337ab7;">Edit</a>
                            |
                            <a href="hapus_film.php?id=<?= $row['id_film']; ?>"
                               onclick="return confirm('Yakin hapus film ini?');"
                               style="color:#d9534f;">Hapus</a>
                        </td>
                    </tr>
                    <?php $total += $row['harga_tiket']; ?>
                <?php endwhile; ?>
                    <tr class="fw-bold">
                        <td colspan="3" class="text-end">Total Harga Tiket</td>
                        <td colspan="2">Rp <?= number_format($total, 0, ',', '.'); ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php
include 'koneksi.php';

$pesan = "";

if (isset($_POST['daftar'])) {
    $nama_lengkap = $_POST['nama_lengkap'];
    $username     = $_POST['username'];
    $password     = $_POST['password'];
    $konfirmasi   = $_POST['konfirmasi'];

    if ($nama_lengkap == "" || $username == "" || $password == "" || $konfirmasi == "") {
        $pesan = "Semua field wajib diisi.";
    } elseif ($password != $konfirmasi) {
        $pesan = "Konfirmasi password tidak sama.";
    } else {
        $cek = mysqli_query($koneksi, "SELECT * FROM users WHERE username='$username'");
        if (mysqli_num_rows($cek) > 0) {
            $pesan = "Username sudah dipakai.";
        } else {
            mysqli_query($koneksi, "INSERT INTO users (username,password,nama_lengkap)
                                    VALUES ('$username','$password','$nama_lengkap')");
            header("location: login.php");
            exit;
        }
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
    .btn-biru {
        background-color: #337ab7;
        border-color: #2e6da4;
        color: #fff;
    }
    .btn-biru:hover {
        background-color: #286090;
        border-color: #204d74;
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

<div class="container py-5">

    <div class="card shadow-lg p-3 mb-5 bg-body-tertiary rounded">
        <div class="row g-1">

            <div class="col-md-5">
                <img src="film.jpg"
                     alt="Film"
                     class="img-fluid h-100 w-100"
                     style="object-fit: cover;">
            </div>

            <div class="col-md-7 bg-white">
                <div class="p-4">
                    <h3 class="mb-0">Register</h3>
                    <small class="text-muted">Isi semua data dengan benar</small>
                    <hr>

                    <?php if ($pesan != "") { ?>
                        <div class="alert alert-danger py-2 mb-3">
                            <?php echo $pesan; ?>
                        </div>
                    <?php } ?>

                    <form method="POST" action="">
                        <div class="mb-3">
                            <label class="form-label">Nama Lengkap</label>
                            <input type="text" name="nama_lengkap" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Username</label>
                            <input type="text" name="username" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Password</label>
                            <input type="password" name="password" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Konfirmasi Password</label>
                            <input type="password" name="konfirmasi" class="form-control">
                        </div>

                        <div class="d-flex gap-2">
                            <button type="submit" name="daftar" class="btn btn-biru" >Register</button>
                            <a href="login.php" class="btn btn-abu">Kembali</a>
                        </div>
                    </form>

                    <div class="mt-3">
                        <small>Sudah punya akun? <a href="login.php">Login di sini</a></small>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php
$pesan = "";

if (isset($_GET['pesan'])) {
    if ($_GET['pesan'] == "gagal") {
        $pesan = "Login gagal! Username atau password salah.";
    } elseif ($_GET['pesan'] == "logout") {
        $pesan = "Anda telah berhasil logout.";
    } elseif ($_GET['pesan'] == "belum_login") {
        $pesan = "Silakan login terlebih dahulu.";
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
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
                    <h3 class="mb-0">Login</h3>
                    <small class="text-muted">Masukkan username dan password</small>
                    <hr>

                    <?php if ($pesan != "") { ?>
                        <div class="alert alert-<?=
                            ($_GET['pesan'] == 'logout') ? 'success' :
                            (($_GET['pesan'] == 'belum_login') ? 'warning' : 'danger');
                        ?> py-2 mb-3">
                            <?= $pesan; ?>
                        </div>
                    <?php } ?>

                    <form method="POST" action="cek_login.php">
                        <div class="mb-3">
                            <label class="form-label">Username</label>
                            <input type="text" name="username" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Password</label>
                            <input type="password" name="password" class="form-control">
                        </div>

                        <div class="d-flex gap-2">
                            <button type="submit" class="btn btn-biru">Login</button>
                        </div>
                    </form>

                    <div class="mt-3">
                        <small>Belum punya akun? <a href="register.php">Daftar di sini</a></small><br>
                        <small>Default: <b>admin / admin</b></small>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

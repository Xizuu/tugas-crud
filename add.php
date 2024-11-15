<?php
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama = htmlspecialchars($_POST['nama']);
    $email = htmlspecialchars($_POST['email']);
    $umur = htmlspecialchars($_POST['umur']);

    if (empty($nama) || empty($email) || empty($umur)) {
        echo '<script>alert("Data tidak boleh kosong");</script>';
        echo '<script>window.location.href="add.php";</script>';
        return;
    }

    if (!filter_var($umur, FILTER_VALIDATE_INT)) {
        echo '<script>alert("Umur harus berupa angka");</script>';
        echo '<script>window.location.href="add.php";</script>';
        return;
    }

    $conn->query("INSERT INTO pengguna (nama, email, umur) VALUES ('$nama', '$email', '$umur')");
    echo '<script>alert("Data berhasil ditambahkan");</script>';
    echo '<script>window.location.href="/tugas-crud";</script>';
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tambah User</title>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h2>Tambah User</h2>
    <form method="POST">
        <div class="form-group">
            <label>Nama Lengkap</label>
            <input type="text" name="nama" class="form-control" autocomplete="off">
        </div>
        <div class="form-group">
            <label>Email</label>
            <input type="email" name="email" class="form-control" autocomplete="off">
        </div>
        <div class="form-group">
            <label>Umur</label>
            <input type="text" name="umur" class="form-control" autocomplete="off">
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
</body>
</html>

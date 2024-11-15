<?php
include 'koneksi.php';

$id = $_GET['id'];
$user = $conn->query("SELECT * FROM pengguna WHERE id = $id")->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama = htmlspecialchars($_POST['nama']);
    $email = htmlspecialchars($_POST['email']);
    $umur = htmlspecialchars($_POST['umur']);

    if (empty($nama) || empty($email) || empty($umur)) {
        echo '<script>alert("Data tidak boleh kosong");</script>';
        echo '<script>window.location.href="edit.php?id=' . $id . '";</script>';
        return;
    }

    if (!filter_var($umur, FILTER_VALIDATE_INT)) {
        echo '<script>alert("Umur harus berupa angka");</script>';
        echo '<script>window.location.href="edit.php?id=' . $id . '";</script>';
        return;
    }

    $conn->query("UPDATE pengguna SET nama='$nama', email='$email', umur='$umur' WHERE id = $id");
    echo '<script>alert("Data berhasil diubah");</script>';
    echo '<script>window.location.href="/tugas-crud";</script>';
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit User</title>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h2>Edit User</h2>
    <form method="POST">
        <div class="form-group">
            <label>Nama Lengkap</label>
            <input type="text" name="nama" class="form-control" value="<?= $user['nama'] ?>" autocomplete="off">
        </div>
        <div class="form-group">
            <label>Email</label>
            <input type="email" name="email" class="form-control" value="<?= $user['email'] ?>" autocomplete="off">
        </div>
        <div class="form-group">
            <label>Umur</label>
            <input type="text" name="umur" class="form-control" value="<?= $user['umur'] ?>" autocomplete="off">
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
</body>
</html>

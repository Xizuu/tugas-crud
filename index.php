<?php
include 'koneksi.php';

$result = $conn->query("SELECT * FROM pengguna");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>CRUD Example</title>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h2>Data Users</h2>
    <a href="add.php" class="btn btn-primary mb-3">Tambah User</a>
    <table id="userTable" class="display table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Lengkap</th>
                <th>Email</th>
                <th>Umur</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            while($row = $result->fetch_assoc()) : ?>
                <tr>
                    <td><?= $row['id'] ?></td>
                    <td><?= $row['nama'] ?></td>
                    <td><?= $row['email'] ?></td>
                    <td><?= $row['umur'] ?></td>
                    <td>
                        <a href="edit.php?id=<?= $row['id'] ?>" class="btn btn-warning">Edit</a>
                        <a href="delete.php?id=<?= $row['id'] ?>" class="btn btn-danger">Hapus</a>
                    </td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</div>

<script>
    $(document).ready(function() {
        $('#userTable').DataTable();
    });
</script>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

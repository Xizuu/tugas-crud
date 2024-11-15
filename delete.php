<?php
include 'koneksi.php';

$id = $_GET['id'] ?? null;

if (is_null($id)) {
    header("Location: index.php");
    exit;
}

$conn->query("DELETE FROM pengguna WHERE id = $id");

header("Location: index.php");
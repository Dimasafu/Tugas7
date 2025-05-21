<?php
$conn = new mysqli("localhost", "root", "", "tugas7","3308");

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

$nama = $_POST['nama'];
$harga = $_POST['harga'];
$deskripsi = $_POST['deskripsi'];
$gambar = $_FILES['gambar'];

if ($nama == "" || $harga == "" || $deskripsi == "" || $gambar['name'] == "") {
    die("Semua kolom harus diisi!");
}

$target_dir = "uploads/";
if (!file_exists($target_dir)) mkdir($target_dir);
$gambar_name = time() . "_" . basename($gambar["name"]);
$target_file = $target_dir . $gambar_name;
move_uploaded_file($gambar["tmp_name"], $target_file);

$sql = "INSERT INTO produk (nama, harga, deskripsi, gambar) VALUES ('$nama', '$harga', '$deskripsi', '$gambar_name')";
$conn->query($sql);
$conn->close();

// Kembali ke form dengan indikator berhasil
header("Location: form.php?success=1");
exit();
?>

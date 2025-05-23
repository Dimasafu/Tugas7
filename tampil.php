<?php
$conn = new mysqli("localhost", "root", "", "tugas7","3308");
$result = $conn->query("SELECT * FROM produk");
?>

<!DOCTYPE html>
<html>
<head>
  <title>Daftar Produk</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-4 bg-light">
  <div class="container">
    <h2 class="mb-4">Daftar Produk</h2>
    <div class="row">
      <?php while ($row = $result->fetch_assoc()): ?>
        <div class="col-md-4">
          <div class="card mb-4">
            <img src="uploads/<?= $row['gambar'] ?>" class="card-img-top" style="height: 200px; object-fit: cover;">
            <div class="card-body">
              <h5 class="card-title"><?= $row['nama'] ?></h5>
              <h6 class="card-subtitle mb-2 text-muted">Rp<?= number_format($row['harga']) ?></h6>
              <p class="card-text"><?= $row['deskripsi'] ?></p>
            </div>
          </div>
        </div>
      <?php endwhile; ?>
    </div>
  </div>
</body>
</html>

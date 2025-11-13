<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}
?>
<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <title>Dashboard | RARATII.GAME</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body class="bg-white">

  <nav class="navbar navbar-expand-lg navbar-dark bg-danger">
    <div class="container">
      <a class="navbar-brand fw-bold" href="#"><i class="bi bi-controller"></i> RARATII.GAME</a>
      <div class="d-flex">
        <a href="logout.php" class="btn btn-light btn-sm">Logout</a>
      </div>
    </div>
  </nav>

  <div class="container text-center mt-5">
    <h2 class="fw-bold text-danger mb-3">Hai, <?= htmlspecialchars($_SESSION['full_name']) ?>! 🎮</h2>
    <p class="text-muted mb-4">Selamat datang, mau lihat data ya? kembali ke home dulu </p>
    <a href="index.php" class="btn btn-outline-danger"><i class="bi bi-house-door"></i> Kembali ke Home</a>
  </div>

</body>
</html>

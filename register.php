<?php
// register.php
session_start();

// jika sudah login, redirect ke dashboard
if (isset($_SESSION['user_id'])) {
    header('Location: dashboard.php');
    exit;
}

// buat CSRF token sederhana jika belum ada
if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}

// ambil pesan error/sukses dari query string
$error = isset($_GET['error']) ? $_GET['error'] : '';
$success = isset($_GET['success']) ? $_GET['success'] : '';
?>
<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <title>Daftar Akun | RARATII.GAME</title>
  <meta name="viewport" content="width=device-width,initial-scale=1">

  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body class="bg-white">

  <!-- 🌸 Navbar -->
  <nav class="navbar navbar-expand-lg bg-danger-subtle shadow-sm">
    <div class="container">
      <a class="navbar-brand fw-bold text-danger" href="#">
        <i class="bi bi-controller"></i> RARATII.GAME
      </a>
      <div class="d-flex">
        <button type="button" class="btn btn-outline-danger btn-sm" onclick="window.location.href='index.php'">
          <i class="bi bi-house-door"></i> Kembali ke Home
        </button>
      </div>
    </div>
  </nav>

  <!-- 🌸 Register Form -->
  <div class="container d-flex justify-content-center align-items-center min-vh-100">
    <div class="card shadow-lg border-0" style="width: 100%; max-width: 480px;">
      <div class="card-body p-4">
        <div class="text-center mb-4">
          <h2 class="fw-bold text-danger"><i class="bi bi-person-plus"></i> Daftar Akun</h2>
          <p class="text-muted mb-0">Buat akun baru untuk melihat data</p>
        </div>

        <?php if ($error): ?>
          <div class="alert alert-danger d-flex align-items-center" role="alert">
            <i class="bi bi-exclamation-triangle-fill me-2"></i>
            <?= htmlspecialchars($error) ?>
          </div>
        <?php endif; ?>

        <?php if ($success): ?>
          <div class="alert alert-success d-flex align-items-center" role="alert">
            <i class="bi bi-check-circle-fill me-2"></i>
            <?= htmlspecialchars($success) ?>
          </div>
        <?php endif; ?>

        <form action="register_process.php" method="post" autocomplete="off" novalidate>
          <input type="hidden" name="csrf_token" value="<?= htmlspecialchars($_SESSION['csrf_token']) ?>">

          <div class="mb-3">
            <label for="username" class="form-label fw-semibold">Username</label>
            <input type="text" class="form-control border-danger-subtle" id="username" name="username" required minlength="3" maxlength="100">
          </div>

          <div class="mb-3">
            <label for="full_name" class="form-label fw-semibold">Nama Lengkap</label>
            <input type="text" class="form-control border-danger-subtle" id="full_name" name="full_name" maxlength="200">
          </div>

          <div class="mb-3">
            <label for="password" class="form-label fw-semibold">Password</label>
            <input type="password" class="form-control border-danger-subtle" id="password" name="password" required minlength="6">
          </div>

          <div class="mb-3">
            <label for="password_confirm" class="form-label fw-semibold">Konfirmasi Password</label>
            <input type="password" class="form-control border-danger-subtle" id="password_confirm" name="password_confirm" required minlength="6">
            <div class="form-text">Minimal 6 karakter untuk password.</div>
          </div>

          <div class="d-grid">
            <button type="submit" class="btn btn-danger">
              <i class="bi bi-person-plus-fill"></i> Daftar
            </button>
          </div>

          <div class="text-center mt-3">
            <p class="mb-0">Sudah punya akun?
              <a href="login.php" class="text-decoration-none fw-semibold text-danger">
                <i class="bi bi-box-arrow-in-right"></i> Login
              </a>
            </p>
          </div>
        </form>
      </div>
    </div>
  </div>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

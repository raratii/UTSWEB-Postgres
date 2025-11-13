<?php
session_start();
if (isset($_SESSION['user_id'])) {
    header('Location: dashboard.php');
    exit;
}
?>
<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <title>Login | RARATII.GAME</title>
  <meta name="viewport" content="width=device-width,initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

</head>

<body>
  <div class="container d-flex justify-content-center align-items-center min-vh-100">
    <div class="card p-4 shadow-lg" style="width: 100%; max-width: 420px;">
      <div class="text-center mb-4">
        <h2 class="fw-bold text-danger"><i class="bi bi-controller"></i> RARATII.GAME</h2>
        <p class="text-muted mb-0">Masuk ke akun kamu</p>
      </div>

      <?php if (!empty($_GET['error'])): ?>
        <div class="alert alert-danger d-flex align-items-center" role="alert">
          <i class="bi bi-exclamation-triangle-fill me-2"></i>
          <?= htmlspecialchars($_GET['error']) ?>
        </div>
      <?php endif; ?>

      <form action="authenticate.php" method="post" autocomplete="off">
        <div class="mb-3">
          <label for="username" class="form-label fw-semibold">Username</label>
          <input type="text" class="form-control" id="username" name="username" required autofocus>
        </div>

        <div class="mb-3">
          <label for="password" class="form-label fw-semibold">Password</label>
          <input type="password" class="form-control" id="password" name="password" required>
        </div>

        <div class="d-grid">
          <button type="submit" class="btn btn-sm btn-outline-danger">
            <i class="bi bi-box-arrow-in-right"></i> Login
          </button>
        </div>

        <div class="text-center mt-3">
          <p class="mb-0">Belum punya akun?  
            <a href="register.php" class="text-decoration-none text-danger fw-semibold">Daftar di sini</a>
          </p>
        </div>
      </form>
    </div>
  </div>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

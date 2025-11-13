<?php
session_start();
$logged_in = isset($_SESSION['user_id']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>RARATII.GAME</title>

  <!-- Bootstrap 5.3 CDN -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body class="bg-danger-subtle text-dark">

  <!-- Header -->
  <header class="d-flex justify-content-between align-items-center p-3 bg-danger text-white shadow-sm">
    <div class="fs-4 fw-bold">RARATII.GAME</div>
    <nav>
      <a href="index.php" class="text-white text-decoration-none me-3">Home</a>
    </nav>

    <?php if ($logged_in): ?>
      <button class="btn btn-light" onclick="confirmLogout()">LOGOUT</button>
    <?php else: ?>
      <button class="btn btn-light" onclick="window.location.href='login.php'">LOGIN</button>
    <?php endif; ?>
  </header>

  <!-- Hero Section -->
  <section class="container py-5 d-flex flex-column flex-md-row align-items-center justify-content-between">
    <div class="text-center text-md-start mb-4 mb-md-0">
      <h1 class="fw-bold text-danger">STUDIO <span class="text-dark">GAME</span> CENTER</h1>
      <p class="lead">Play, relax, repeat — the perfect spot to recharge and have fun.</p>

      <?php if ($logged_in): ?>
        <button class="btn btn-danger" onclick="window.location.href='game.php'">Lihat Data Game</button>
      <?php else: ?>
        <button class="btn btn-danger" onclick="window.location.href='login.php'">Login untuk lihat data</button>
      <?php endif; ?>
    </div>

    <div class="text-center">
      <img src="img/img1.jpg" alt="hero robot" class="img-fluid rounded shadow-lg" style="max-width: 400px;">
    </div>
  </section>

  <section class="container py-5">
    <div class="row align-items-center">
      <div class="col-md-6 text-center mb-4 mb-md-0">
        <img src="img2.png" alt="about image" class="img-fluid rounded shadow">
      </div>
      <div class="col-md-6">
        <h2 class="text-danger fw-bold">GAME</h2>
        <p class="fs-5 fst-italic">
          “Welcome to your chill zone — where gaming's not about scores, but smiles.
          Take a break, laugh a little, and game your stress away.”
        </p>
        <div class="row text-center mt-4">
          <div class="col">
            <h3 class="fw-bold text-danger">+100</h3>
            <p>Rekomendasi Game</p>
          </div>
          <div class="col">
            <h3 class="fw-bold text-danger">4</h3>
            <p>Game Kamu Sekarang</p>
          </div>
          <div class="col">
            <h3 class="fw-bold text-danger">2</h3>
            <p>Tahun Penggunaan</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="py-5 bg-light text-center">
    <div class="container">
      <h2 class="fw-bold text-danger mb-4">GAME YANG DISARANKAN</h2>
      <div class="row g-4">
        <div class="col-6 col-md-3">
          <a href="https://play.google.com/store/apps/details?id=com.block.juggle" target="_blank" class="text-decoration-none text-dark">
            <div class="card shadow-sm">
              <img src="img/img3.jpg" class="card-img-top" alt="Block Blast">
              <div class="card-body">
                <h5 class="card-title fw-bold text-danger">BLOCK BLAST</h5>
              </div>
            </div>
          </a>
        </div>

        <div class="col-6 col-md-3">
          <a href="https://play.google.com/store/apps/details?id=com.king.candycrushsodasaga" target="_blank" class="text-decoration-none text-dark">
            <div class="card shadow-sm">
              <img src="img/img4.jpg" class="card-img-top" alt="Candy Crush">
              <div class="card-body">
                <h5 class="card-title fw-bold text-danger">CANDY CRUSH</h5>
              </div>
            </div>
          </a>
        </div>

        <div class="col-6 col-md-3">
          <a href="https://play.google.com/store/apps/details?id=com.matteljv.uno" target="_blank" class="text-decoration-none text-dark">
            <div class="card shadow-sm">
              <img src="img/img5.jpg" class="card-img-top" alt="UNO">
              <div class="card-body">
                <h5 class="card-title fw-bold text-danger">UNO</h5>
              </div>
            </div>
          </a>
        </div>

        <div class="col-6 col-md-3">
          <a href="https://play.google.com/store/apps/details?id=me.pou.app" target="_blank" class="text-decoration-none text-dark">
            <div class="card shadow-sm">
              <img src="img/img6.jpg" class="card-img-top" alt="POU">
              <div class="card-body">
                <h5 class="card-title fw-bold text-danger">POU</h5>
              </div>
            </div>
          </a>
        </div>
      </div>
    </div>
  </section>

  <!-- Portfolio Section -->
  <section class="py-5 text-center bg-danger-subtle">
    <div class="container">
      <h2 class="fw-bold text-danger mb-4">TENTANG GAME ANDA</h2>
      <div class="row g-4">
        <div class="col-6 col-md-3">
          <a href="https://www.mobilelegends.com/" target="_blank" class="text-decoration-none text-dark">
            <div class="card shadow-sm">
              <img src="img/img7.jpg" class="card-img-top" alt="Mobile Legend">
              <div class="card-body"><h5 class="fw-bold text-danger">Mobile Legend</h5></div>
            </div>
          </a>
        </div>

        <div class="col-6 col-md-3">
          <a href="https://play.mc-gogo.com/" target="_blank" class="text-decoration-none text-dark">
            <div class="card shadow-sm">
              <img src="img/img8.jpg" class="card-img-top" alt="Magic Chess">
              <div class="card-body"><h5 class="fw-bold text-danger">Magic Chess</h5></div>
            </div>
          </a>
        </div>

        <div class="col-6 col-md-3">
          <a href="https://play.google.com/store/apps/details?id=com.roblox.client&hl=id" target="_blank" class="text-decoration-none text-dark">
            <div class="card shadow-sm">
              <img src="img/img9.jpg" class="card-img-top" alt="Roblox">
              <div class="card-body"><h5 class="fw-bold text-danger">Roblox</h5></div>
            </div>
          </a>
        </div>

        <div class="col-6 col-md-3">
          <a href="https://pubg.com/en/main" target="_blank" class="text-decoration-none text-dark">
            <div class="card shadow-sm">
              <img src="img/img10.jpg" class="card-img-top" alt="PUBG">
              <div class="card-body"><h5 class="fw-bold text-danger">PUBG</h5></div>
            </div>
          </a>
        </div>
      </div>
    </div>
  </section>

  <!-- Footer -->
  <footer class="bg-danger text-white text-center py-3 mt-5">
    <p class="mb-0">© raratii.</p>
  </footer>

  <script>
    function confirmLogout() {
      if (confirm("Yakin mau logout?")) {
        window.location.href = 'logout.php';
      }
    }
  </script>
</body>
</html>

<?php
// --- Koneksi ke PostgreSQL ---
$host = 'localhost';
$port = '5432';
$dbname = 'webgamecenter'; 
$user = 'postgres';    
$pass = 'jsthaechan00';         

$conn = pg_connect("host=$host port=$port dbname=$dbname user=$user password=$pass");
if (!$conn) {
    die("Koneksi gagal: " . pg_last_error());
}

// Buat tabel kalau belum ada
pg_query($conn, "
    CREATE TABLE IF NOT EXISTS game_list (
        id_game SERIAL PRIMARY KEY,
        nama VARCHAR(100),
        genre VARCHAR(50)
    );
");

// Tambah data baru
if (isset($_POST['submit'])) {
    $nama = trim($_POST['nama']);
    $genre = trim($_POST['genre']);

    if ($nama != '' && $genre != '') {
        $insert = "INSERT INTO game_list (nama, genre) VALUES ('$nama', '$genre')";
        pg_query($conn, $insert);
    }
    header("Location: index.php");
    exit;
}

// Ambil semua data
$result = pg_query($conn, "SELECT * FROM game_list ORDER BY id_game ASC");
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Daftar Game</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
</head>

<body>

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

<div class="container mt-5 pt-4">
  <div class="card p-4 mt-5">
    <h2 class="text-center mb-4 text-danger">Daftar Game Kamu</h2>

    <!-- Form Tambah -->
    <form method="POST" action="" class="row g-2 mb-4 justify-content-center">
      <div class="col-md-5">
        <input type="text" name="nama" class="form-control" placeholder="Nama Game" required>
      </div>
      <div class="col-md-4">
        <input type="text" name="genre" class="form-control" placeholder="Genre Game" required>
      </div>
      <div class="col-md-2 d-grid">
        <button type="submit" name="submit" class="btn btn-sm btn-outline-danger">
          <i class="bi bi-plus-lg"></i> Tambah
        </button>
      </div>
    </form>

    <div class="table-responsive">
      <table class="table table-hover align-middle text-center">
        <thead class="table-danger">
          <tr>
            <th>ID</th>
            <th>Nama Game</th>
            <th>Genre</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php while ($row = pg_fetch_assoc($result)) : ?>
            <tr>
              <td><?= $row['id_game']; ?></td>
              <td><?= htmlspecialchars($row['nama']); ?></td>
              <td><?= htmlspecialchars($row['genre']); ?></td>
              <td>
                <a href="edit.php?id=<?= $row['id_game']; ?>" class="btn btn-sm btn-warning me-2">
                  <i class="bi bi-pencil"></i> Edit
                </a>
                <a href="delete.php?id=<?= $row['id_game']; ?>" class="btn btn-danger"
                   onclick="return confirm('Yakin mau hapus game ini?')">
                  <i class="bi bi-trash"></i> Hapus
                </a>
              </td>
            </tr>
          <?php endwhile; ?>
        </tbody>
      </table>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php pg_close($conn); ?>

<?php
require __DIR__ . '/koneksi.php';
$host = 'localhost';
$port = '5432';
$dbname = 'webgamecenter'; 
$user = 'postgres';    
$pass = 'jsthaechan00'; 

$conn = pg_connect("host=$host port=$port dbname=$dbname user=$user password=$pass");
if (!$conn) die("Koneksi gagal: " . pg_last_error());

$id = intval($_GET['id']);
$res = pg_query($conn, "SELECT * FROM game_list WHERE id_game=$id");
$data = pg_fetch_assoc($res);

if (!$data) {
    echo "Data tidak ditemukan!";
    exit;
}

// Update data
if (isset($_POST['update'])) {
    $nama = trim($_POST['nama']);
    $genre = trim($_POST['genre']);
    pg_query($conn, "UPDATE game_list SET nama='$nama', genre='$genre' WHERE id_game=$id");
    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Edit Game</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5">
  <div class="card p-4 shadow">
    <h3 class="text-center text-danger mb-4">Edit Game</h3>
    <form method="POST">
      <div class="mb-3">
        <label class="form-label">Nama Game</label>
        <input type="text" name="nama" class="form-control" value="<?= htmlspecialchars($data['nama']) ?>" required>
      </div>
      <div class="mb-3">
        <label class="form-label">Genre</label>
        <input type="text" name="genre" class="form-control" value="<?= htmlspecialchars($data['genre']) ?>" required>
      </div>
      <div class="d-grid gap-2">
        <button type="submit" name="update" class="btn btn-warning">Update</button>
        <a href="index.php" class="btn btn-secondary">Kembali</a>
      </div>
    </form>
  </div>
</div>
</body>
</html>

<?php pg_close($conn); ?>
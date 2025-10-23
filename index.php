<?php
// --- KONFIGURASI KONEKSI POSTGRESQL ---
$host = 'localhost';
$port = '5432';
$dbname = 'webgamecenter';
$user = 'postgres';
$pass = 'jsthaechan00';

// Membuat koneksi
$conn = pg_connect("host=$host port=$port dbname=$dbname user=$user password=$pass");
if (!$conn) {
    die('Koneksi gagal: ' . pg_last_error());
}

// Set encoding (opsional tapi dianjurkan)
pg_set_client_encoding($conn, 'UTF8');

// Ambil data dari tabel mahasiswa
// Pakai alias agar array assoc tetap menggunakan key "Nama", "Nim", dst.
$sql = 'SELECT
    "id_game" AS "GameID",
    "nama" AS "Nama",
    "genre" AS "Genre",
    "level" AS "Level"
FROM "raratigame"
ORDER BY "id_game";';

$result = pg_query($conn, $sql);
if (!$result) {
    die('Query gagal: ' . pg_last_error($conn));
}

?>
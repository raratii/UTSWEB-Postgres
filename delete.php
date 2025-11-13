<?php
require __DIR__ . '/koneksi.php';
$host = 'localhost';
$port = '5432';
$dbname = 'webgamecenter'; 
$user = 'postgres';    
$pass = 'jsthaechan00'; 

$conn = pg_connect("host=$host port=$port dbname=$dbname user=$user password=$pass");
if (!$conn) die("Koneksi gagal: " . pg_last_error());

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    pg_query($conn, "DELETE FROM game_list WHERE id_game=$id");
}

pg_close($conn);
header("Location: index.php");
exit;
?>
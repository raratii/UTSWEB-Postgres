<?php
session_start();
require_once 'koneksi.php';

// ambil input
$username = isset($_POST['username']) ? trim($_POST['username']) : '';
$password = $_POST['password'] ?? '';

// koneksi ke database
try {
    $conn = get_pg_connection();
} catch (Throwable $e) {
    error_log('DB connection error in authenticate.php: ' . $e->getMessage());
    header('Location: login.php?error=' . urlencode('Gagal koneksi ke database.'));
    exit;
}

// validasi sederhana
if ($username === '' || $password === '') {
    header('Location: login.php?error=' . urlencode('Username dan password harus diisi.'));
    exit;
}

// cek username di database
$sql = 'SELECT id, username, password_hash, full_name FROM users WHERE username = $1 LIMIT 1';
$result = pg_query_params($conn, $sql, [$username]);

if (!$result || pg_num_rows($result) === 0) {
    header('Location: login.php?error=' . urlencode('Username atau password salah.'));
    exit;
}

$user = pg_fetch_assoc($result);

// verifikasi password
if (password_verify($password, $user['password_hash'])) {
    session_regenerate_id(true);
    $_SESSION['user_id'] = $user['id'];
    $_SESSION['username'] = $user['username'];
    $_SESSION['full_name'] = $user['full_name'];

    // 🩷 LANGSUNG MASUK DASHBOARD
    header('Location: dashboard.php');
    exit;
} else {
    header('Location: login.php?error=' . urlencode('Username atau password salah.'));
    exit;
}
?>

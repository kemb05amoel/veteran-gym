<?php
// update_status.php
session_start();

// Keamanan: Cek apakah admin sudah login
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    die("Akses dilarang. Silakan login dulu.");
}

// Keamanan: Cek apakah ID dan Aksi ada
if (!isset($_GET['id']) || !isset($_GET['action'])) {
    die("Permintaan tidak valid.");
}

// --- 1. KONEKSI DATABASE ---
$servername = "localhost";
$username_db = "root";
$password_db = "";
$dbname = "dbveterangym"; 

$conn = null;
try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username_db, $password_db);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    die("Koneksi gagal: " . $e->getMessage()); 
}

// --- 2. PERSIAPKAN DATA ---
$id = (int)$_GET['id'];
$action = $_GET['action'];
$new_status = "";

if ($action == 'approve') {
    $new_status = 'Success';
} elseif ($action == 'reject') {
    $new_status = 'Failed';
} else {
    die("Aksi tidak dikenal.");
}

// --- 3. EKSEKUSI UPDATE (Gunakan Prepared Statements!) ---
try {
    $sql = "UPDATE konfirmasi_pembayaran SET status_pembayaran = :status WHERE id = :id";
    $stmt = $conn->prepare($sql);
    
    $stmt->bindParam(':status', $new_status);
    $stmt->bindParam(':id', $id);
    
    $stmt->execute();

    // --- 4. KEMBALIKAN KE HALAMAN ADMIN ---
    header("Location: admin.php");
    exit();

} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}

$conn = null;
?>
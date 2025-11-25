<?php
session_start();

// Cek Login
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header("Location: login_admin.php");
    exit;
}

include '../../include/koneksi.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // 1. Ambil nama file gambar dulu sebelum menghapus data
    $sql_cek = "SELECT file_bukti FROM konfirmasi_pembayaran WHERE id = ?";
    $stmt_cek = $koneksi->prepare($sql_cek);
    $stmt_cek->bind_param("i", $id);
    $stmt_cek->execute();
    $result = $stmt_cek->get_result();
    $data = $result->fetch_assoc();

    // 2. Hapus file fisik gambar jika ada (agar server tidak penuh sampah)
    if ($data && !empty($data['file_bukti'])) {
        $file_path = "../../uploads/" . $data['file_bukti'];
        // Cek apakah file ada, lalu hapus
        if (file_exists($file_path)) {
            unlink($file_path); 
        }
    }

    // 3. Hapus data baris dari database
    $sql_del = "DELETE FROM konfirmasi_pembayaran WHERE id = ?";
    $stmt_del = $koneksi->prepare($sql_del);
    $stmt_del->bind_param("i", $id);

    if ($stmt_del->execute()) {
        // Redirect kembali ke admin.php setelah sukses
        header("Location: admin.php");
    } else {
        echo "Gagal menghapus data.";
    }

    $stmt_cek->close();
    $stmt_del->close();
} else {
    header("Location: admin.php");
}

$koneksi->close();
?>
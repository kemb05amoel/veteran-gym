<?php
session_start();

if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header("Location: login_admin.php");
    exit;
}

include '../../include/koneksi.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql_cek = "SELECT file_bukti FROM konfirmasi_pembayaran WHERE id = ?";
    $stmt_cek = $koneksi->prepare($sql_cek);
    $stmt_cek->bind_param("i", $id);
    $stmt_cek->execute();
    $result = $stmt_cek->get_result();
    $data = $result->fetch_assoc();

    if ($data && !empty($data['file_bukti'])) {
        $file_path = "../../uploads/" . $data['file_bukti'];
        if (file_exists($file_path)) {
            unlink($file_path); 
        }
    }

    $sql_del = "DELETE FROM konfirmasi_pembayaran WHERE id = ?";
    $stmt_del = $koneksi->prepare($sql_del);
    $stmt_del->bind_param("i", $id);

    if ($stmt_del->execute()) {
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
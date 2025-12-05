<?php
session_start();
if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: login_admin.php");
    exit;
}
include '../../include/koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama = htmlspecialchars($_POST['nama']);
    $email = htmlspecialchars($_POST['email']);
    $telp = htmlspecialchars($_POST['telepon']);
    $paket = htmlspecialchars($_POST['paket']);
    $bank = "CASH / TUNAI";
    $rek = "Admin Input";
    $bukti = "cash_payment.png";

    $status = "Success";

    $sql = "INSERT INTO konfirmasi_pembayaran (nama_lengkap, email, no_telepon, paket_membership, bank_asal, nama_rekening, file_bukti, status_pembayaran) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $koneksi->prepare($sql);
    $stmt->bind_param("ssssssss", $nama, $email, $telp, $paket, $bank, $rek, $bukti, $status);

    if ($stmt->execute()) {
        header("Location: admin.php");
        exit;
    } else {
        $error = "Gagal menyimpan data.";
    }
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Tambah Member Manual</title>
</head>

<body>

    <div class="container mt-5">
        <div class="card shadow p-4" style="max-width: 600px; margin: 0 auto;">
            <h3 class="mb-4">Tambah Member (Walk-in)</h3>

            <form method="POST">
                <div class="mb-3">
                    <label>Nama Lengkap</label>
                    <input type="text" name="nama" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label>No Telepon</label>
                    <input type="text" name="telepon" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label>Paket Membership</label>
                    <select name="paket" class="form-select" required>
                        <option value="Gym 1 Bulan">Gym 1 Bulan</option>
                        <option value="Boxing 1 Bulan">Boxing 1 Bulan</option>
                        <option value="Gym + Boxing 1 Bulan">Gym + Boxing 1 Bulan</option>
                        <option value="Gym 1 Bulan (+Pelatih)">Gym 1 Bulan (+Pelatih)</option>
                        <option value="Boxing 1 Bulan (+Pelatih)">Boxing 1 Bulan (+Pelatih)</option>
                        <option value="Gym + Boxing 1 Bulan (+Pelatih)">Gym + Boxing 1 Bulan (+Pelatih)</option>
                        <option value="Gym 3 Bulan">Gym 3 Bulan</option>
                        <option value="Boxing 3 Bulan">Boxing 3 Bulan</option>
                        <option value="Gym + Boxing 3 Bulan">Gym + Boxing 3 Bulan</option>
                        <option value="Gym 3 Bulan (+Pelatih)">Gym 3 Bulan (+Pelatih)</option>
                        <option value="Boxing 3 Bulan (+Pelatih)">Boxing 3 Bulan (+Pelatih)</option>
                        <option value="Gym + Boxing 3 Bulan (+Pelatih)">Gym + Boxing 3 Bulan (+Pelatih)</option>
                    </select>
                </div>

                <div class="d-flex justify-content-between">
                    <a href="admin.php" class="btn btn-secondary">Kembali</a>
                    <button type="submit" class="btn btn-primary">Simpan Data</button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>
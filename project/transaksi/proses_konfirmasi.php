<?php
// Pastikan path ini benar sesuai struktur folder baru Anda
include '../../include/koneksi.php'; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // 1. MENANGKAP DATA (Gunakan operator null coalescing '??' agar tidak error jika kosong)
    $nama_lengkap   = htmlspecialchars($_POST['nama_lengkap'] ?? '');
    $email          = htmlspecialchars($_POST['email'] ?? '');
    $no_telepon = htmlspecialchars($_POST['no_telepon'] ?? ''); // Pastikan di HTML name="paket_membership"
    $bank_asal      = htmlspecialchars($_POST['bank_asal'] ?? '');
    $nama_rekening  = htmlspecialchars($_POST['nama_rekening'] ?? '');

    // Cek data wajib (Validasi sederhana)
    if(empty($nama_lengkap) || empty($email)) {
        die("Error: Nama Lengkap atau Email tidak terbaca. Cek atribut 'name' di form HTML Anda.");
    }

    // 2. PROSES UPLOAD FILE
    $file_bukti_nama = "";
    if (isset($_FILES['bukti_pembayaran']) && $_FILES['bukti_pembayaran']['error'] == 0) {
        
        $target_dir = "../../uploads/"; 
        
        // Pastikan folder uploads ada
        if (!file_exists($target_dir)) {
            mkdir($target_dir, 0777, true);
        }

        $file_extension = pathinfo($_FILES['bukti_pembayaran']['name'], PATHINFO_EXTENSION);
        $file_bukti_nama = "bukti_" . uniqid() . "." . $file_extension;
        $target_file = $target_dir . $file_bukti_nama;

        $allowed_types = ['jpg', 'jpeg', 'png'];
        $file_size = $_FILES['bukti_pembayaran']['size'];

        if (in_array(strtolower($file_extension), $allowed_types) && $file_size < 5000000) { 
            if (move_uploaded_file($_FILES['bukti_pembayaran']['tmp_name'], $target_file)) {
                // Upload sukses
            } else {
                die("Maaf, gagal memindahkan file upload.");
            }
        } else {
            die("Format file harus JPG/PNG dan di bawah 5MB.");
        }
    } else {
        die("Maaf, bukti pembayaran wajib diupload.");
    }

    // 3. DATABASE INSERT (MENGGUNAKAN GAYA MYSQLI)
    // Perhatikan: Gunakan tanda tanya (?) bukan (:nama)
    $sql = "INSERT INTO konfirmasi_pembayaran 
            (nama_lengkap, email, no_telepon, bank_asal, nama_rekening, file_bukti, status_pembayaran) 
            VALUES (?, ?, ?, ?, ?, ?, 'Pending')";

    // Persiapkan statement
    $stmt = $koneksi->prepare($sql);

    if ($stmt) {
        // "ssssss" artinya ada 6 data bertipe String (String, String, String, String, String, String)
        $stmt->bind_param("ssssss", $nama_lengkap, $email, $no_telepon, $bank_asal, $nama_rekening, $file_bukti_nama);

        // Eksekusi
        if ($stmt->execute()) {
            // Sukses, redirect
            header("Location: terima_kasih.php");
            exit();
        } else {
            echo "Gagal menyimpan data: " . $stmt->error;
        }
        
        $stmt->close();
    } else {
        echo "Error pada query SQL: " . $koneksi->error;
    }

    $koneksi->close();

} else {
    // Jika akses langsung tanpa POST
    header("Location: ../index.php");
    exit();
}
?>
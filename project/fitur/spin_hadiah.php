<?php
// spin_hadiah.php

// 1. INI WAJIB PALING ATAS
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// 2. KONEKSI DATABASE (Menggunakan include)
// Sesuaikan path '../' atau '../../' tergantung lokasi file ini.
// Karena di HTML bawah Anda pakai "../../asset/style.css", kemungkinan path include juga butuh "../../"
include '../../include/koneksi.php'; 

// Pastikan variabel koneksi di file include namanya $koneksi
// Jika namanya $conn, ubah baris di bawah ini jadi: $koneksi = $conn;

// --- 3. LOGIKA PENYIMPANAN HADIAH (AJAX HANDLER - POST) ---
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Set header JSON
    header('Content-Type: application/json');

    // Ambil data JSON
    $data = json_decode(file_get_contents('php://input'), true);

    if (!isset($data['token']) || !isset($data['hadiah'])) {
        echo json_encode(['success' => false, 'message' => 'Data tidak lengkap.']);
        exit;
    }

    // Decode Token
    $user_id = base64_decode($data['token']);
    $hadiah  = htmlspecialchars($data['hadiah']);

    if (!$user_id) {
        echo json_encode(['success' => false, 'message' => 'Token tidak valid.']);
        exit;
    }

    // --- UBAH KE MYSQLI ---
    // Cek apakah user sudah klaim
    $sql_check = "SELECT hadiah_diklaim FROM konfirmasi_pembayaran WHERE id = ?";
    $stmt_check = $koneksi->prepare($sql_check);

    if ($stmt_check) {
        $stmt_check->bind_param("i", $user_id); // "i" = integer
        $stmt_check->execute();
        $result_set = $stmt_check->get_result();
        $result_check = $result_set->fetch_assoc();

        if ($result_check && $result_check['hadiah_diklaim'] == 'Belum') {
            
            // Simpan Hadiah
            $sql_update = "UPDATE konfirmasi_pembayaran 
                           SET hadiah_diklaim = 'Sudah', hasil_hadiah = ? 
                           WHERE id = ?";
            
            $stmt_update = $koneksi->prepare($sql_update);
            
            if ($stmt_update) {
                $stmt_update->bind_param("si", $hadiah, $user_id); // "s" string, "i" integer
                
                if ($stmt_update->execute()) {
                    echo json_encode(['success' => true, 'message' => 'Selamat! Hadiah berhasil disimpan.']);
                } else {
                    echo json_encode(['success' => false, 'message' => 'Gagal update database.']);
                }
                $stmt_update->close();
            }
        } else {
            echo json_encode(['success' => false, 'message' => 'Gagal: Anda sudah pernah mengklaim hadiah ini atau ID salah.']);
        }
        $stmt_check->close();
    } else {
        echo json_encode(['success' => false, 'message' => 'Error Query: ' . $koneksi->error]);
    }

    $koneksi->close();
    exit; // Stop script
}

// --- 4. LOGIKA HALAMAN (GET REQUEST) ---
$message = "";
$status_level = "danger";
$show_spinner = false;
$user_name = "";
$valid_token = ""; 

if (isset($_GET['token']) && !empty($_GET['token'])) {
    $token = $_GET['token'];
    $user_id = base64_decode($token);

    if ($user_id === false) {
        $message = "Token tidak valid.";
    } else {
        // --- UBAH KE MYSQLI ---
        $sql = "SELECT nama_lengkap, status_pembayaran, hadiah_diklaim, hasil_hadiah
                FROM konfirmasi_pembayaran 
                WHERE id = ?";
        
        $stmt = $koneksi->prepare($sql);
        
        if ($stmt) {
            $stmt->bind_param("i", $user_id);
            $stmt->execute();
            $result = $stmt->get_result();
            $user = $result->fetch_assoc();

            if ($user) {
                $user_name = htmlspecialchars($user['nama_lengkap']);

                if ($user['status_pembayaran'] == 'Success') {
                    if ($user['hadiah_diklaim'] == 'Belum') {
                        // KONDISI IDEAL: BOLEH MAIN
                        $show_spinner = true;
                        $status_level = "dark";
                        $message = "<strong>Selamat datang, $user_name!</strong><br>Anda berhak mendapatkan 1x hadiah selamat datang. Klik tombol di bawah untuk mengundi keberuntungan Anda!";
                        $valid_token = htmlspecialchars($token);
                    } else {
                        // SUDAH PERNAH MAIN
                        $status_level = "dark";
                        $hasil_hadiah = htmlspecialchars($user['hasil_hadiah']);
                        $message = "<strong>Halo, $user_name.</strong><br>Anda sudah pernah mengklaim hadiah ini dan memenangkan: <strong class='text-warning'>$hasil_hadiah</strong>.";
                    }
                } else {
                    // PEMBAYARAN BELUM LUNAS/APPROVED
                    $status_level = "info";
                    $message = "<strong>Halo, $user_name.</strong><br>Status pembayaran Anda belum 'Success' (Masih: " . $user['status_pembayaran'] . "). Anda belum bisa mengklaim hadiah.";
                }
            } else {
                $message = "User tidak ditemukan.";
            }
            $stmt->close();
        } else {
            $message = "Error Database: " . $koneksi->error;
        }
    }
} else {
    $message = "Akses tidak sah. Token tidak ditemukan.";
}
// Tidak perlu tutup koneksi di sini untuk render HTML, tapi opsional
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Veteran Gym | Klaim Hadiah</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="../../asset/style.css">
</head>

<body>
  <nav class="navbar navbar-expand-lg fixed-top">
    <div class="container">
      <a class="navbar-brand d-flex align-items-center" href="../index.php">
        <img src="../../image/logogym2.png" alt="Veteran Gym Logo" class="logo-img">
        <span class="brand-text">Veteran Gym</span>
      </a>
      <button class="navbar-toggler bg-light" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item"><a class="nav-link" href="../index.php">Beranda</a></li>
          <li class="nav-item"><a class="nav-link" href="tentang.php">Tentang Kami</a></li>
          <li class="nav-item"><a class="nav-link" href="../transaksi/membership.php">Membership</a></li>
          <li class="nav-item"><a class="nav-link" href="pelatih.php">Pelatih</a></li>
          <li class="nav-item"><a class="nav-link" href="program.php">Program & Kelas</a></li>
          <li class="nav-item"><a class="nav-link" href="fasilitas.php">Fasilitas</a></li>
          <li class="nav-item"><a class="nav-link" href="lokasi.php">Lokasi</a></li>
          <li class="nav-item"><a class="nav-link" href="artikel.php">Artikel</a></li>
        </ul>
      </div>
    </div>
  </nav>

  <section class="py-5" style="background : url('../../image/bkgym5.jpg') no-repeat center center; 
          background-size: cover; 
          box-shadow: inset 0 0 0 1000px rgba(0, 0, 0, 0.6); 
          min-height: 100vh;
          display: flex;
          align-items: center;">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-6 col-md-8 text-center">

          <div class="card shadow-lg p-4" data-bs-theme="dark">
            <h2 class="fw-bold mb-4" style="font-family:'Bebas Neue', sans-serif;">
              <i class="bi bi-gift-fill me-2"></i> KLAIM HADIAH ANDA
            </h2>

            <div class="alert alert-<?php echo $status_level; ?> text-start">
              <?php echo $message; ?>
            </div>

            <?php if ($show_spinner): ?>
              <div id="prize-display" style="font-size: 2rem; font-weight: bold; margin: 20px 0; color: #ffc107;">
                [ ? ? ? ]
              </div>

              <button id="spin-button" class="btn btn-warning w-100 fw-bold py-3 fs-5">
                <i class="bi bi-arrow-clockwise me-2"></i> SPIN SEKARANG!
              </button>

              <div id="result-message" class="mt-4" style="display: none;"></div>
            <?php endif; ?>

          </div>

        </div>
      </div>
    </div>
  </section>

  <footer>
    <div class="container">
      <div class="text-center small pb-3 mt-5">
        © 2025 <strong style="color: var(--accent-hover);">Veteran Gym</strong>
      </div>
    </div>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

  <?php if ($show_spinner): ?>
    <script>
      const spinButton = document.getElementById('spin-button');
      const prizeDisplay = document.getElementById('prize-display');
      const resultMessage = document.getElementById('result-message');
      
      // Token ini aman karena digenerate dari PHP setelah validasi
      const userToken = '<?php echo $valid_token; ?>';

      const prizes = [
        "Tumbler Stainless Steel", "Kaos Veteran Gym", "Handuk Microfiber",
        "Shaker Protein", "Protein Bar Pack", "Celana Pendek Gym", "Free Personal Trainer 1x"
      ];

      let isSpinning = false;

      spinButton.addEventListener('click', () => {
        if (isSpinning) return;
        isSpinning = true;
        spinButton.disabled = true;
        spinButton.innerHTML = '<span class="spinner-border spinner-border-sm"></span> Mengundi...';

        let counter = 0;
        const interval = setInterval(() => {
          prizeDisplay.textContent = prizes[Math.floor(Math.random() * prizes.length)];
          counter++;
          if (counter > 20) {
            clearInterval(interval);
            finishSpin();
          }
        }, 100);
      });

      function finishSpin() {
        const winPrize = prizes[Math.floor(Math.random() * prizes.length)];
        prizeDisplay.textContent = winPrize;
        savePrize(winPrize);
      }

      async function savePrize(prizeName) {
        try {
          const res = await fetch('spin_hadiah.php', { // Pastikan nama file ini benar
            method: 'POST',
            headers: {'Content-Type': 'application/json'},
            body: JSON.stringify({ token: userToken, hadiah: prizeName })
          });
          const data = await res.json();

          if (data.success) {
            resultMessage.className = 'alert alert-success';
            resultMessage.innerHTML = `<strong>Selamat!</strong> Anda dapat: <strong>${prizeName}</strong>`;
            spinButton.style.display = 'none';
          } else {
            resultMessage.className = 'alert alert-danger';
            resultMessage.innerHTML = data.message;
          }
          resultMessage.style.display = 'block';
        } catch (err) {
          console.error(err);
        }
      }
    </script>
  <?php endif; ?>
</body>
</html>
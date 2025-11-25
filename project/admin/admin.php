<?php
// admin.php
session_start();

// Keamanan: Cek apakah admin sudah login
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header("Location: login_admin.php");
    exit;
}

// --- 1. KONEKSI DATABASE ---
include '../../include/koneksi.php'; 

// --- 2. AMBIL DATA PENDING ---
$pending_list = [];
$sql_pending = "SELECT * FROM konfirmasi_pembayaran WHERE status_pembayaran = 'Pending' ORDER BY id ASC";
$result_pending = $koneksi->query($sql_pending);

if ($result_pending) {
    while ($row = $result_pending->fetch_assoc()) {
        $pending_list[] = $row;
    }
}

// --- 3. AMBIL DATA HISTORI ---
$done_list = [];
$sql_done = "SELECT * FROM konfirmasi_pembayaran WHERE status_pembayaran != 'Pending' ORDER BY id DESC LIMIT 10";
$result_done = $koneksi->query($sql_done);

if ($result_done) {
    while ($row = $result_done->fetch_assoc()) {
        $done_list[] = $row;
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Dashboard - Veteran Gym</title>
  
  <!-- CSS External -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
  
  
  <style>
    :root {
        --primary-dark: #0b0c10;
        --secondary-dark: #1f2833;
        --accent-cyan: #66fcf1;
        --text-gray: #c5c6c7;
        --card-bg: #ffffff;
    }

    body { 
        background-color: #f3f4f6; /* Abu-abu muda yang bersih */
        font-family: 'Poppins', sans-serif;
        color: #333;
    }

    /* Navbar Styling */
    .navbar {
        background-color: var(--primary-dark) !important;
        box-shadow: 0 2px 10px rgba(0,0,0,0.1);
    }
    .navbar-brand {
        font-weight: 700;
        letter-spacing: 1px;
        color: var(--accent-cyan) !important;
    }

    /* Card Styling */
    .dashboard-card {
        background-color: var(--card-bg);
        border: none;
        border-radius: 12px;
        box-shadow: 0 5px 20px rgba(0,0,0,0.05);
        margin-bottom: 2rem;
        overflow: hidden;
    }

    .card-header-custom {
        background-color: var(--secondary-dark);
        color: white;
        padding: 15px 20px;
        font-weight: 600;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .card-body {
        padding: 20px;
    }

    /* Table Styling */
    .table thead th {
        background-color: #f8f9fa;
        color: #555;
        font-weight: 600;
        text-transform: uppercase;
        font-size: 0.85rem;
        border-bottom: 2px solid #ddd;
    }
    
    .table tbody td {
        vertical-align: middle;
        font-size: 0.95rem;
    }

    /* Image Preview Logic */
    .img-preview-container {
        position: relative;
        width: 80px;
        height: 80px;
        cursor: pointer;
    }

    .img-thumbnail-custom {
        width: 100%;
        height: 100%;
        object-fit: cover;
        border-radius: 6px;
        border: 1px solid #dee2e6;
        transition: transform 0.2s;
    }

    /* Efek Zoom saat Hover (Pop out) */
    .img-preview-container:hover .img-thumbnail-custom {
        position: absolute;
        top: -50px; /* Geser ke atas */
        left: 50%;
        transform: translateX(-50%) scale(3.5); /* Perbesar 3.5x */
        z-index: 999;
        box-shadow: 0 10px 25px rgba(0,0,0,0.3);
        border: 2px solid white;
    }

    /* Badge Styling */
    .badge {
        font-weight: 500;
        padding: 8px 12px;
        border-radius: 30px; /* Rounded pill */
    }

    .btn-action {
        border-radius: 6px;
        padding: 5px 10px;
        font-size: 0.9rem;
    }

    /* Header Page */
    .page-title {
        font-weight: 700;
        color: var(--primary-dark);
        margin-bottom: 5px;
    }
    .page-subtitle {
        color: #777;
        font-size: 0.9rem;
        margin-bottom: 30px;
    }
  </style>
</head>
<body>

  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-dark fixed-top">
    <div class="container">
      <a class="navbar-brand" href="#">
        <i class="bi bi-shield-lock-fill me-2"></i>VETERAN ADMIN
      </a>
      <div class="d-flex">
          <span class="navbar-text me-3 text-light d-none d-md-block">
            Halo, Admin
          </span>
          <a href="logout.php" class="btn btn-outline-danger btn-sm px-3 rounded-pill">
            <i class="bi bi-box-arrow-right me-1"></i> Logout
          </a>
      </div>
    </div>
  </nav>

  <!-- Spacer agar konten tidak tertutup navbar -->
  <div style="height: 80px;"></div>

  <div class="container">
    
    <!-- Judul Halaman -->
    <div class="row">
        <div class="col-12">
            <h2 class="page-title">Dashboard Pembayaran</h2>
            <p class="page-subtitle">Kelola konfirmasi pembayaran member dan pantau riwayat transaksi.</p>
        </div>
    </div>

    <!-- SECTION 1: MENUNGGU KONFIRMASI -->
    <div class="dashboard-card">
        <div class="card-header-custom">
            <span><i class="bi bi-hourglass-split me-2 text-warning"></i> Menunggu Konfirmasi</span>
            <span class="badge bg-warning text-dark"><?php echo count($pending_list); ?> Request</span>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Tanggal</th>
                            <th>User Info</th>
                            <th>Nomor HP</th>
                            <th>Detail Transfer</th>
                            <th class="text-center">Bukti</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php if (empty($pending_list)): ?>
                        <tr>
                            <td colspan="7" class="text-center py-5 text-muted bg-light">
                                <i class="bi bi-check-circle fs-1 d-block mb-3 text-success opacity-50"></i>
                                Tidak ada antrian pending. Semua beres!
                            </td>
                        </tr>
                    <?php else: ?>
                        <?php foreach ($pending_list as $item): ?>
                        <tr>
                            <td class="fw-bold">#<?php echo $item['id']; ?></td>
                            <td>
                                <small class="text-muted d-block">Waktu:</small>
                                <?php echo date('d/m/y H:i', strtotime($item['tanggal_konfirmasi'] ?? 'now')); ?>
                            </td>
                            <td>
                                <span class="fw-bold d-block"><?php echo htmlspecialchars($item['nama_lengkap']); ?></span>
                                <small class="text-primary"><?php echo htmlspecialchars($item['email']); ?></small>
                            </td>
                            <td>
                                <?php echo htmlspecialchars($item['no_telepon'] ?? $item['telepon'] ?? '-'); ?>
                            </td>
                            <td>
                                <span class="badge bg-secondary mb-1"><?php echo htmlspecialchars($item['bank_asal']); ?></span>
                                <br>
                                <small>a.n. <?php echo htmlspecialchars($item['nama_rekening']); ?></small>
                            </td>
                            <td class="text-center">
                                <div class="img-preview-container mx-auto">
                                    <a href="../../uploads/<?php echo $item['file_bukti']; ?>" target="_blank">
                                        <img src="../../uploads/<?php echo $item['file_bukti']; ?>" class="img-thumbnail-custom" alt="Bukti">
                                    </a>
                                </div>
                            </td>
                            <td class="text-center">
                                <div class="btn-group" role="group">
                                    <a href="update_status.php?id=<?php echo $item['id']; ?>&action=approve" 
                                       class="btn btn-success btn-action" 
                                       onclick="return confirm('Setujui pembayaran ini? User akan bisa klaim hadiah.');">
                                        <i class="bi bi-check-lg"></i> Terima
                                    </a>
                                    <a href="update_status.php?id=<?php echo $item['id']; ?>&action=reject" 
                                       class="btn btn-danger btn-action" 
                                       onclick="return confirm('Tolak pembayaran ini?');">
                                        <i class="bi bi-x-lg"></i> Tolak
                                    </a>
                                </div>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- SECTION 2: RIWAYAT -->
    <div class="row">
        <div class="col-12">
            <div class="dashboard-card">
                <div class="card-header-custom" style="background-color: #6c757d;">
                    <span><i class="bi bi-clock-history me-2"></i> 10 Riwayat Terakhir</span>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-striped mb-0">
                            <thead class="bg-light">
                                <tr>
                                    <th>ID</th>
                                    <th>Nama Lengkap</th>
                                    <th>Email</th>
                                    <th>Status Pembayaran</th>
                                    <th>Hadiah Didapat</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($done_list as $item): ?>
                                <tr>
                                    <td>#<?php echo $item['id']; ?></td>
                                    <td><?php echo htmlspecialchars($item['nama_lengkap']); ?></td>
                                    <td><?php echo htmlspecialchars($item['email']); ?></td>
                                    <td>
                                        <?php if($item['status_pembayaran'] == 'Success'): ?>
                                            <span class="badge bg-success bg-opacity-75"><i class="bi bi-check-circle me-1"></i> Success</span>
                                        <?php else: ?>
                                            <span class="badge bg-danger bg-opacity-75"><i class="bi bi-x-circle me-1"></i> Failed</span>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <?php if (!empty($item['hasil_hadiah'])): ?>
                                            <span class="text-primary fw-bold"><?php echo htmlspecialchars($item['hasil_hadiah']); ?></span>
                                        <?php else: ?>
                                            <span class="text-muted">-</span>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

  </div>
  
  <div class="text-center py-4 text-muted small">
    &copy; 2025 Veteran Gym Admin Panel
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<?php
// 1. WAJIB: Start Session
session_start();

include '../../include/koneksi.php';

// Password rahasia
$admin_password_rahasia = "laharfatkhanbersatu";
$error_message = "";

// 2. CEK STATUS LOGIN
if (isset($_SESSION['admin_logged_in']) && $_SESSION['admin_logged_in'] === true) {
    header("Location: admin.php");
    exit;
}

// 3. PROSES LOGIN
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['password'])) {
        if ($_POST['password'] === $admin_password_rahasia) {
            $_SESSION['admin_logged_in'] = true;
            header("Location: admin.php");
            exit;
        } else {
            $error_message = "Password yang Anda masukkan salah.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Admin - Veteran Gym</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">

  <style>
    body {
        background-color: #0b0c10;
        background-image: url('../../image/bkgym5.jpg');
        background-size: cover;
        background-position: center;
        background-blend-mode: overlay;
        min-height: 100vh;
        
        display: flex;
        justify-content: center; /* Tengah Horizontal (Kiri-Kanan) */
        
        /* --- PERUBAHAN POSISI DISINI --- */
        align-items: flex-start; /* Jangan 'center', tapi mulai dari atas */
        padding-top: 100px; /* Atur jarak turun dari atas (bisa diganti misal: 80px atau 150px) */
        
        font-family: 'Poppins', sans-serif;
    }
    
    .login-card {
        background-color: rgba(31, 40, 51, 0.95);
        padding: 40px;
        border-radius: 15px;
        box-shadow: 0 0 20px rgba(102, 252, 241, 0.3);
        border: 1px solid #45a29e;
        width: 100%;
        max-width: 400px;
        
        /* Opsional: Tambahkan animasi muncul */
        animation: slideIn 0.5s ease-out;
    }

    @keyframes slideIn {
        from { transform: translateY(-20px); opacity: 0; }
        to { transform: translateY(0); opacity: 1; }
    }

    .form-control {
        background-color: #0b0c10;
        border: 1px solid #45a29e;
        color: #fff;
    }
    
    .form-control:focus {
        background-color: #0b0c10;
        border-color: #66fcf1;
        color: #fff;
        box-shadow: 0 0 10px rgba(102, 252, 241, 0.5);
    }

    .btn-login {
        background-color: #66fcf1;
        color: #0b0c10;
        font-weight: bold;
        transition: 0.3s;
    }

    .btn-login:hover {
        background-color: #45a29e;
        color: #fff;
        box-shadow: 0 0 15px #66fcf1;
    }
  </style>
</head>

<body>

    <div class="login-card">
        <div class="text-center mb-4">
            <h3 class="text-white fw-bold">ADMIN LOGIN</h3>
            <p class="text-secondary small">Masukkan password untuk akses panel.</p>
        </div>

        <?php if (!empty($error_message)): ?>
            <div class="alert alert-danger text-center py-2 mb-3 small">
                <?php echo $error_message; ?>
            </div>
        <?php endif; ?>

        <form action="login_admin.php" method="POST">
            <div class="mb-4">
                <label for="password" class="form-label text-info">Password Admin</label>
                <input type="password" class="form-control form-control-lg" id="password" name="password" placeholder="***" required>
            </div>
            
            <button type="submit" class="btn btn-login w-100 py-2 rounded-3">
                MASUK SEKARANG
            </button>
            
            </div>
        </form>
    </div>

</body>
</html>
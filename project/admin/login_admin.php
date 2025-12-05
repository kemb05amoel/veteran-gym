<?php
session_start();

if (isset($_SESSION['admin_logged_in']) && $_SESSION['admin_logged_in'] === true) {
    header("Location: admin.php");
    exit;
}

include '../../include/koneksi.php';

$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $koneksi->real_escape_string($_POST['username']);
    $password = $_POST['password'];

    $sql = "SELECT * FROM admin WHERE username = '$username'";
    $result = $koneksi->query($sql);

    if ($result->num_rows === 1) {
        $row = $result->fetch_assoc();
        
        if (password_verify($password, $row['password'])) {
            $_SESSION['admin_logged_in'] = true;
            $_SESSION['admin_nama'] = $row['nama_lengkap'];
            
            $koneksi->query("UPDATE admin SET last_login = NOW() WHERE id_admin = " . $row['id_admin']);

            header("Location: admin.php");
            exit;
        } else {
            $error = "Password salah!";
        }
    } else {
        $error = "Username tidak ditemukan!";
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    
    <style>
        :root {
            --bg-dark: #0b0c10;
            --card-dark: #1f2833;
            --neon: #66fcf1;
            --gray: #c5c6c7;
        }
        body {
            background-color: var(--bg-dark);
            font-family: 'Poppins', sans-serif;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--gray);
        }
        .login-card {
            background-color: var(--card-dark);
            width: 100%;
            max-width: 400px;
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 0 20px rgba(102, 252, 241, 0.15); /* Glow effect */
            border: 1px solid rgba(102, 252, 241, 0.1);
        }
        .brand-logo {
            width: 80px;
            margin-bottom: 20px;
        }
        .form-control {
            background-color: #0b0c10;
            border: 1px solid #45a29e;
            color: #fff;
        }
        .form-control:focus {
            background-color: #0b0c10;
            border-color: var(--neon);
            box-shadow: 0 0 10px rgba(102, 252, 241, 0.3);
            color: #fff;
        }
        .btn-login {
            background-color: var(--neon);
            color: #0b0c10;
            font-weight: 700;
            border: none;
            width: 100%;
            padding: 10px;
            margin-top: 20px;
            transition: 0.3s;
        }
        .btn-login:hover {
            background-color: #45a29e;
            box-shadow: 0 0 15px rgba(102, 252, 241, 0.6);
        }
        .back-link {
            display: block;
            text-align: center;
            margin-top: 15px;
            color: #45a29e;
            text-decoration: none;
            font-size: 0.9rem;
        }
        .back-link:hover { color: var(--neon); }
    </style>
</head>
<body>

    <div class="login-card">
        <div class="text-center">
            <h3 class="fw-bold text-white mb-4">ADMIN LOGIN</h3>
        </div>

        <?php if ($error): ?>
            <div class="alert alert-danger d-flex align-items-center" role="alert">
                <i class="bi bi-exclamation-triangle-fill me-2"></i>
                <div><?php echo $error; ?></div>
            </div>
        <?php endif; ?>

        <form method="POST">
            <div class="mb-3">
                <label class="form-label small text-uppercase fw-bold" style="color: var(--neon);">Username</label>
                <div class="input-group">
                    <span class="input-group-text bg-dark border-secondary text-light"><i class="bi bi-person-fill"></i></span>
                    <input type="text" name="username" class="form-control" placeholder="Masukkan username" required>
                </div>
            </div>

            <div class="mb-3">
                <label class="form-label small text-uppercase fw-bold" style="color: var(--neon);">Password</label>
                <div class="input-group">
                    <span class="input-group-text bg-dark border-secondary text-light"><i class="bi bi-lock-fill"></i></span>
                    <input type="password" name="password" class="form-control" placeholder="Masukkan password" required>
                </div>
            </div>

            <button type="submit" class="btn btn-login rounded-pill">MASUK DASHBOARD</button>
        </form>

        <a href="../index.php" class="back-link">
            <i class="bi bi-arrow-left"></i> Kembali ke Website Utama
        </a>
    </div>

</body>
</html>
<?php
session_start();
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) { header("Location: login_admin.php"); exit; }
include '../../include/koneksi.php';

$id = (int)$_GET['id'];
$data = $koneksi->query("SELECT * FROM program_kelas WHERE id_program=$id")->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_prog  = $_POST['id_program'];
    $judul    = htmlspecialchars($_POST['judul']);
    $kategori = htmlspecialchars($_POST['kategori']);
    $durasi   = htmlspecialchars($_POST['durasi']);
    $level    = htmlspecialchars($_POST['level']);
    $deskripsi= htmlspecialchars($_POST['deskripsi']);
    $gambar   = $_POST['gambar_lama'];

    if (isset($_FILES['gambar']) && $_FILES['gambar']['error'] == 0) {
        $ext = pathinfo($_FILES['gambar']['name'], PATHINFO_EXTENSION);
        $gambar = "program_" . time() . "." . $ext;
        move_uploaded_file($_FILES['gambar']['tmp_name'], "../../image/" . $gambar);
    }

    $stmt = $koneksi->prepare("UPDATE program_kelas SET judul=?, kategori=?, durasi=?, level=?, deskripsi=?, gambar=? WHERE id_program=?");
    $stmt->bind_param("ssssssi", $judul, $kategori, $durasi, $level, $deskripsi, $gambar, $id_prog);

    if ($stmt->execute()) {
        echo "<script>alert('Update berhasil!'); window.location='kelola_program.php';</script>"; exit;
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <title>Edit Program</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body style="background-color: #f3f4f6;">
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <a href="kelola_program.php" class="btn btn-secondary mb-3">Kembali</a>
                <div class="card border-0 shadow-sm p-4">
                    <h4 class="mb-4 fw-bold text-warning">Edit Program Latihan</h4>
                    <form method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="id_program" value="<?php echo $data['id_program']; ?>">
                        <input type="hidden" name="gambar_lama" value="<?php echo $data['gambar']; ?>">

                        <div class="mb-3">
                            <label class="form-label fw-bold">Nama Program</label>
                            <input type="text" name="judul" class="form-control" value="<?php echo $data['judul']; ?>" required>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">Kategori</label>
                                <select name="kategori" class="form-select">
                                    <option value="Gym" <?php echo ($data['kategori']=='Gym')?'selected':''; ?>>Gym</option>
                                    <option value="Boxing" <?php echo ($data['kategori']=='Boxing')?'selected':''; ?>>Boxing</option>
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">Durasi</label>
                                <input type="text" name="durasi" class="form-control" value="<?php echo $data['durasi']; ?>">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-bold">Level</label>
                            <input type="text" name="level" class="form-control" value="<?php echo $data['level']; ?>">
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-bold d-block">Ganti Gambar</label>
                            <img src="../../image/<?php echo $data['gambar']; ?>" width="100" class="mb-2 rounded">
                            <input type="file" name="gambar" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-bold">Deskripsi</label>
                            <textarea name="deskripsi" class="form-control" rows="4"><?php echo $data['deskripsi']; ?></textarea>
                        </div>
                        <button type="submit" class="btn btn-warning w-100 fw-bold">UPDATE PROGRAM</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
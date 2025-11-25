<?php
// Konfigurasi koneksi database

$hostname = "localhost";
$username = "root";
$password = "";
$database = "dbveterangym"; // pastikan sama dengan nama database kamu

$koneksi = new mysqli($hostname, $username, $password, $database);

// Cek koneksi
if ($koneksi->connect_error) {
    die("Koneksi gagal: " . $koneksi->connect_error);
}

?>

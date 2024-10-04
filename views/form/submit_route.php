<?php
// Menerima data dari form
$maskapai = $_POST["maskapai"];
$bandara_asal = $_POST["bandara_asal"];
$bandara_tujuan = $_POST["bandara_tujuan"];
$harga_tiket = $_POST["harga_tiket"];

// Path ke file data.json yang berada di folder data di luar folder views
$file_path = '../../data/data.json';

// Memeriksa apakah file data.json sudah ada
$data = json_decode(file_get_contents($file_path), true) ?? [];

// Menambahkan data baru ke dalam array $data
$data[] = array(
    'maskapai' => $maskapai,
    'bandara_asal' => $bandara_asal,
    'bandara_tujuan' => $bandara_tujuan,
    'harga_tiket' => $harga_tiket,
);

// Menyimpan kembali data ke dalam file data.json
file_put_contents($file_path, json_encode($data, JSON_PRETTY_PRINT));

// Redirect ke halaman tabel setelah data disimpan
header("Location: ../table/index.php");
exit(); // Pastikan script berhenti setelah redirect
?>

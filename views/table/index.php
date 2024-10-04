<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Rute Tersedia</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../../library/css/style.css">
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg fixed-top">
        <a class="navbar-brand" href="#">
            Penerbangan
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="../landing/index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../form/index.php">Pendaftaran</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../table/index.php">Rute</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container mt-5 pt-5">
        <h2 class="text-center mb-4" style="color: #2177ca;"><b>Daftar Rute Tersedia</b></h2>
        <table class="table table-bordered table-striped table-blue">
            <thead class="thead-blue">
                <tr>
                    <th>Maskapai</th>
                    <th>Asal Penerbangan</th>
                    <th>Tujuan Penerbangan</th>
                    <th>Harga Tiket</th>
                    <th>Pajak</th>
                    <th>Total Harga Tiket</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Mendefinisikan path file JSON untuk data rute dan data bandara
                $file = '../../data/data.json';
                $bandara = "../../data/bandara.json";

                // Memeriksa apakah file JSON ada
                if (file_exists($file) && file_exists($bandara)) {
                    // Membaca konten file JSON untuk data rute
                    $json_data = file_get_contents($file);
                    $data = json_decode($json_data, true);

                    // Membaca konten file JSON untuk data bandara
                    $bandara_json_data = file_get_contents($bandara);
                    $data_bandara = json_decode($bandara_json_data, true);

                    // Memeriksa apakah data rute dan data bandara tidak kosong
                    if (!empty($data) && !empty($data_bandara)) {
                        // Mengurutkan data rute berdasarkan nama maskapai secara abjad
                        usort($data, function ($a, $b) {
                            return strcmp($a['maskapai'], $b['maskapai']);
                        });

                        // Loop melalui setiap data rute
                        foreach ($data as $d) {
                            // Inisialisasi pajak bandara asal dan tujuan
                            $pajak_bandara_asal = 0;
                            $pajak_bandara_tujuan = 0;

                            // Cari nilai pajak bandara asal dan tujuan dari data bandara
                            foreach ($data_bandara as $db) {
                                if ($db['bandara_asal'] == $d['bandara_asal']) {
                                    $pajak_bandara_asal = $db['pajak_asal'];
                                }
                                if ($db['bandara_tujuan'] == $d['bandara_tujuan']) {
                                    $pajak_bandara_tujuan = $db['pajak_tujuan'];
                                }
                            }

                            // Hitung total pajak
                            $pajak = $pajak_bandara_asal + $pajak_bandara_tujuan;

                            // Hitung total harga tiket
                            $total_harga_tiket = $d['harga_tiket'] + $pajak;

                            // Tampilkan data rute dalam tabel
                            echo "<tr>";
                            echo "<td>" . htmlspecialchars($d['maskapai']) . "</td>";
                            echo "<td>" . htmlspecialchars($d['bandara_asal']) . "</td>";
                            echo "<td>" . htmlspecialchars($d['bandara_tujuan']) . "</td>";
                            echo "<td>" . htmlspecialchars($d['harga_tiket']) . "</td>";
                            echo "<td>" . htmlspecialchars($pajak) . "</td>";
                            echo "<td>" . htmlspecialchars($total_harga_tiket) . "</td>";
                            echo "</tr>";
                        }
                    } else {
                        // Menampilkan pesan jika tidak ada data yang tersedia
                        echo "<tr><td colspan='6'>No data available</td></tr>";
                    }
                }
                ?>
            </tbody>
        </table>
    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="../../library/js/script.js"></script>
</body>

</html>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pendaftaran Rute Penerbangan</title>
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

    <!-- Main Content -->
    <div class="container mt-5 pt-5">
    <h2 class="text-center mb-4" style="color: #2177ca;"><b>Pendaftaran Rute Penerbangan</b></h2>
        <div class="row form-container">
            <div class="col-md-6 form-image">
                <img src="../../images/plane.jpg" alt="3D Image">
            </div>
            <div class="col-md-6 form-content">
                <!-- form -->
                <form action="submit_route.php" method="post">
                <!-- input maskapai -->
                    <div class="form-group">
                        <label for="maskapai">Maskapai:</label>
                        <input type="text" class="form-control" id="maskapai" name="maskapai" placeholder="Maskapai penerbangan" required>
                    </div> 
                    <?php
                        // Membaca file JSON
                        $file = "../../data/bandara.json";
                        // mendapatkan file json
                        $json_data = file_get_contents($file);
                        // men-decode anggota json
                        $datas = json_decode($json_data, true);
                        // membuat label serta select(dropdown) untuk bandara asal
                        echo "<div class='form-group'>";
                        echo "<label for='bandara_asal'>Bandara Asal: </label>";
                        echo "<select name='bandara_asal' class='form-control'>";
                        // menampilkan data bandara asal dengan perulangan serta mengambil data bandara asal dan pajak asal dari pilihan data bandara asal
                        foreach ($datas as $data) {
                            echo "<option value='". $data['bandara_asal'] ."'>". $data['bandara_asal'] ."</option>";
                        }            
                        echo "</select> </div>";
                        // membuat label serta select(dropdown) untuk bandara tujuan
                        echo "<div class='form-group'>";
                        echo "<label for='bandara_tujuan'>Bandara Tujuan: </label>";
                        echo "<select name='bandara_tujuan' class='form-control'>";
                        // menampilkan data bandara tujuan dengan perulangan serta mengambil data bandara tujuan dan pajak tujuan dari pilihan data bandara tujuan
                        foreach ($datas as $data) {
                            echo "<option value='". $data['bandara_tujuan'] . "'>". $data['bandara_tujuan'] ."</option>";
                        }
                        echo "</select> </div>";
                        ?>
                        <!-- input harga tiket -->
                    <div class="form-group">
                        <label for="harga_tiket">Harga Tiket:</label>
                        <input type="number" class="form-control" id="harga_tiket" name="harga_tiket" placeholder="Harga tiket" required>
                    </div>
                    <!-- tombol submit -->
                    <button type="submit" class="btn btn-primary btn-block">Submit</button>
                </form>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="../../library/js/script.js"></script>
</body>

</html>

<?php
// Inisialisasi array untuk menyimpan data mobil
$mobilData = [];

// Cek apakah form telah di-submit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data dari form
    $nama = $_POST["nama"] ?? '';
    $merk = $_POST["merk"] ?? '';
    $tipe = $_POST["tipe"] ?? '';
    $speed = $_POST["speed"] ?? null;
    $turbo = isset($_POST["turbo"]);
    $model = $_POST["model"] ?? null;
    $irit = isset($_POST["irit"]);
    $sensor = isset($_POST["sensor"]);

    // Simpan data mobil sesuai tipe
    if ($tipe == "sport") {
        $mobilData = [
            "nama" => $nama,
            "merk" => $merk,
            "kecepatan" => $speed,
            "turbo" => $turbo,
            "tipe" => "Mobil Sport"
        ];
    } else if ($tipe == "city") {
        $mobilData = [
            "nama" => $nama,
            "merk" => $merk,
            "model" => $model,
            "irit" => $irit,
            "sensor" => $sensor,
            "tipe" => "City Car"
        ];
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1
    <link href=" https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f0f2f5;
            color: #333;
            padding: 20px;
        }

        .container {
            max-width: 900px;
            margin: auto;
            background-color: #ffffff;
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        }

        h1,
        h2 {
            text-align: center;
            font-weight: 500;
            color: #2c3e50;
            margin-bottom: 30px;
        }

        h3 {
            font-weight: 500;
            color: #34495e;
            margin-bottom: 10px;
        }

        p {
            font-weight: 300;
            color: #555;
            margin-bottom: 8px;
        }

        .mobil {
            background-color: #f8f9fa;
            padding: 20px;
            border-radius: 8px;
            margin-bottom: 20px;
            border-left: 4px solid #2980b9;
        }

        .form-section {
            margin-top: 40px;
        }

        .form-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
        }

        .form-group {
            display: flex;
            flex-direction: column;
        }

        label {
            font-weight: 500;
            margin-bottom: 6px;
            color: #333;
        }

        input,
        select {
            padding: 12px;
            border: 1px solid #ddd;
            border-radius: 6px;
            font-size: 14px;
            color: #555;
            transition: border-color 0.3s;
        }

        input:focus,
        select:focus {
            border-color: #2980b9;
            outline: none;
        }

        button {
            background-color: #2980b9;
            color: white;
            padding: 15px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-size: 16px;
            margin-top: 30px;
            width: 100%;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #1c6ea4;
        }

        #sportFields,
        #cityFields {
            display: none;
            margin-top: 20px;
        }

        /* Responsiveness */
        @media (max-width: 768px) {
            .form-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Informasi Mobil</h1>

        <?php if (!empty($mobilData)): ?>
            <div class="mobil">
                <h3><?php echo htmlspecialchars($mobilData['nama']); ?> (<?php echo htmlspecialchars($mobilData['tipe']); ?>)</h3>
                <p><strong>Merk:</strong> <?php echo htmlspecialchars($mobilData['merk']); ?></p>
                <?php if (isset($mobilData['kecepatan'])): ?>
                    <p><strong>Kecepatan Maksimum:</strong> <?php echo htmlspecialchars($mobilData['kecepatan']); ?> km/h</p>
                <?php endif; ?>
                <?php if (isset($mobilData['turbo'])): ?>
                    <p><strong>Turbo:</strong> <?php echo $mobilData['turbo'] ? 'Ya' : 'Tidak'; ?></p>
                <?php endif; ?>
                <?php if (isset($mobilData['model'])): ?>
                    <p><strong>Model:</strong> <?php echo htmlspecialchars($mobilData['model']); ?></p>
                <?php endif; ?>
                <?php if (isset($mobilData['irit'])): ?>
                    <p><strong>Irit Bahan Bakar:</strong> <?php echo $mobilData['irit'] ? 'Ya' : 'Tidak'; ?></p>
                <?php endif; ?>
                <?php if (isset($mobilData['sensor'])): ?>
                    <p><strong>Sensor:</strong> <?php echo $mobilData['sensor'] ? 'Ada' : 'Tidak Ada'; ?></p>
                <?php endif; ?>
            </div>
        <?php endif; ?>

        <div class="form-section">
            <h2>Masukkan Informasi Mobil</h2>
            <form method="POST" action="">
                <div class="form-grid">
                    <div class="form-group">
                        <label for="nama">Nama Mobil</label>
                        <input type="text" id="nama" name="nama" required>
                    </div>
                    <div class="form-group">
                        <label for="merk">Merk Mobil</label>
                        <input type="text" id="merk" name="merk" required>
                    </div>
                    <div class="form-group">
                        <label for="tipe">Tipe Mobil</label>
                        <select name="tipe" id="tipe" required onchange="toggleFields(this.value)">
                            <option value="">--Pilih Tipe--</option>
                            <option value="sport">Mobil Sport</option>
                            <option value="city">City Car</option>
                        </select>
                    </div>
                </div>

                <div id="sportFields">
                    <div class="form-grid">
                        <div class="form-group">
                            <label for="speed">Kecepatan Maksimum (km/h)</label>
                            <input type="number" id="speed" name="speed">
                        </div>
                        <div class="form-group">
                            <label>
                                <input type="checkbox" name="turbo">
                                Turbo
                            </label>
                        </div>
                    </div>
                </div>

                <div id="cityFields">
                    <div class="form-grid">
                        <div class="form-group">
                            <label for="model">Model</label>
                            <input type="text" id="model" name="model">
                        </div>
                        <div class="form-group">
                            <label>
                                <input type="checkbox" name="irit">
                                Irit Bahan Bakar
                            </label>
                        </div>
                        <div class="form-group">
                            <label>
                                <input type="checkbox" name="sensor">
                                Sensor
                            </label>
                        </div>
                    </div>
                </div>

                <button type="submit">Tambahkan Mobil</button>
            </form>
        </div>
    </div>

    <script>
        function toggleFields(tipe) {
            document.getElementById('sportFields').style.display = tipe === 'sport' ? 'block' : 'none';
            document.getElementById('cityFields').style.display = tipe === 'city' ? 'block' : 'none';
        }
    </script>
</body>

</html>
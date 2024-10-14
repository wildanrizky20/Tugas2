<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Informasi Mobil</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f7f6;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 80%;
            margin: 20px auto;
            background-color: white;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }

        h1, h2 {
            text-align: center;
            color: #2c3e50;
        }

        .mobil-info {
            background-color: #e9f5f2;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ddd;
        }

        strong {
            color: #2c3e50;
        }

        .highlight {
            color: #27ae60;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Daftar Mobil</h1>

        <?php
        // Kelas Mobil
        class Mobil {
            public $nama;
            public $merk;

            public function cetakInfo() {
                echo "<div class='mobil-info'>";
                echo "<strong>Nama Mobil:</strong> $this->nama<br>";
                echo "<strong>Merk Mobil:</strong> $this->merk<br>";
                echo "</div>";
            }
        }

        // Kelas Mobil Sport
        class MobilSport extends Mobil {
            public $speed;
            public $turbo;

            public function cetakInfo() {
                parent::cetakInfo();
                echo "<strong>Kecepatan Maksimum:</strong> <span class='highlight'>$this->speed km/h</span><br>";
                echo "<strong>Turbo:</strong> " . ($this->turbo ? 'Ya' : 'Tidak') . "<br><br>";
            }
        }

        // Kelas City Car
        class CityCar extends Mobil {
            public $model;
            public $irit;
            public $sensor;

            public function cetakInfo() {
                parent::cetakInfo();
                echo "<strong>Model:</strong> $this->model<br>";
                echo "<strong>Efisiensi Bahan Bakar:</strong> <span class='highlight'>$this->irit</span><br>";
                echo "<strong>Sensor Keamanan:</strong> $this->sensor<br><br>";
            }
        }

        // Membuat objek mobil sport
        $mobilSport1 = new MobilSport();
        $mobilSport1->nama = "Ferrari";
        $mobilSport1->merk = "Ferrari";
        $mobilSport1->speed = 350;
        $mobilSport1->turbo = true;

        $mobilSport2 = new MobilSport();
        $mobilSport2->nama = "Lamborghini";
        $mobilSport2->merk = "Lamborghini";
        $mobilSport2->speed = 320;
        $mobilSport2->turbo = false;

        // Membuat objek city car
        $cityCar1 = new CityCar();
        $cityCar1->nama = "Toyota";
        $cityCar1->merk = "Toyota";
        $cityCar1->model = "Yaris";
        $cityCar1->irit = "15 km/l";
        $cityCar1->sensor = "Parkir Otomatis";

        $cityCar2 = new CityCar();
        $cityCar2->nama = "Honda";
        $cityCar2->merk = "Honda";
        $cityCar2->model = "Jazz";
        $cityCar2->irit = "17 km/l";
        $cityCar2->sensor = "Lane Assist";

        // Menampilkan informasi mobil
        echo "<h2>Mobil Sport</h2>";
        $mobilSport1->cetakInfo();
        $mobilSport2->cetakInfo();

        echo "<h2>City Car</h2>";
        $cityCar1->cetakInfo();
        $cityCar2->cetakInfo();
        ?>
    </div>
</body>
</html>

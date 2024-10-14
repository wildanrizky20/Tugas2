<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Informasi Mahasiswa</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #eef2f3;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 80%;
            margin: 20px auto;
            background-color: white;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1,
        h2 {
            text-align: center;
            color: #2c3e50;
        }

        .mahasiswa-info {
            background-color: #f9f9f9;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ddd;
        }

        strong {
            color: #2c3e50;
        }

        .judul-skripsi {
            font-style: italic;
            color: #34495e;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Sistem Informasi Mahasiswa</h1>

        <?php
        // Kelas Mahasiswa
        class Mahasiswa
        {
            public $nama;
            public $nim;
            public $jurusan;
            public $ips = [];
            public $ipk;

            public function __construct($nama, $nim, $jurusan, $ips)
            {
                $this->nama = $nama;
                $this->nim = $nim;
                $this->jurusan = $jurusan;
                $this->ips = $ips;
                $this->ipk = $this->hitungIPK();
            }

            public function cetakInfo()
            {
                echo "<div class='mahasiswa-info'>";
                echo "<strong>Nama:</strong> $this->nama<br>";
                echo "<strong>NIM:</strong> $this->nim<br>";
                echo "<strong>Jurusan:</strong> $this->jurusan<br>";
                echo "<strong>IPK:</strong> " . number_format($this->ipk, 2) . "<br>";
                echo "</div>";
            }

            public function hitungIPK()
            {
                $total = array_sum($this->ips);
                return $total / count($this->ips);
            }
        }

        // Kelas Mahasiswa Sarjana (S1)
        class MahasiswaSarjana extends Mahasiswa
        {
            public $judulSkripsi;
            public $tahunSelesai;

            public function __construct($nama, $nim, $jurusan, $ips, $judulSkripsi, $tahunSelesai)
            {
                parent::__construct($nama, $nim, $jurusan, $ips);
                $this->judulSkripsi = $judulSkripsi;
                $this->tahunSelesai = $tahunSelesai;
            }

            public function cetakInfo()
            {
                parent::cetakInfo();
                echo "<strong>Judul Skripsi:</strong> <span class='judul-skripsi'>$this->judulSkripsi</span><br>";
                echo "<strong>Tahun Penyelesaian:</strong> $this->tahunSelesai<br><br>";
            }
        }

        // Kelas Mahasiswa Magister (S2)
        class MahasiswaMagister extends Mahasiswa
        {
            public $judulTesis;
            public $pembimbing;

            public function __construct($nama, $nim, $jurusan, $ips, $judulTesis, $pembimbing)
            {
                parent::__construct($nama, $nim, $jurusan, $ips);
                $this->judulTesis = $judulTesis;
                $this->pembimbing = $pembimbing;
            }

            public function cetakInfo()
            {
                parent::cetakInfo();
                echo "<strong>Judul Tesis:</strong> <span class='judul-skripsi'>$this->judulTesis</span><br>";
                echo "<strong>Pembimbing:</strong> $this->pembimbing<br><br>";
            }
        }

        // Kelas Mahasiswa Doktor (S3)
        class MahasiswaDoktor extends Mahasiswa
        {
            public $judulDisertasi;
            public $tanggalSidang;

            public function __construct($nama, $nim, $jurusan, $ips, $judulDisertasi, $tanggalSidang)
            {
                parent::__construct($nama, $nim, $jurusan, $ips);
                $this->judulDisertasi = $judulDisertasi;
                $this->tanggalSidang = $tanggalSidang;
            }

            public function cetakInfo()
            {
                parent::cetakInfo();
                echo "<strong>Judul Disertasi:</strong> <span class='judul-skripsi'>$this->judulDisertasi</span><br>";
                echo "<strong>Tanggal Sidang:</strong> $this->tanggalSidang<br><br>";
            }
        }

        // Kelas Jurusan
        class Jurusan
        {
            public $namaJurusan;
            public $daftarMahasiswa = [];

            public function __construct($namaJurusan)
            {
                $this->namaJurusan = $namaJurusan;
            }

            public function tambahMahasiswa(Mahasiswa $mhs)
            {
                $this->daftarMahasiswa[] = $mhs;
            }

            public function cetakDaftarMahasiswa()
            {
                echo "<h2>Daftar Mahasiswa Jurusan $this->namaJurusan</h2>";
                foreach ($this->daftarMahasiswa as $mahasiswa) {
                    $mahasiswa->cetakInfo();
                }
            }
        }

        // Main Program
        $ipsMhs1 = [3.5, 3.6, 3.7, 3.8];
        $mhs1 = new MahasiswaSarjana("Rizky Pratama", "2019110001", "Sistem Informasi", $ipsMhs1, "Implementasi Sistem Cerdas", 2021);

        $ipsMhs2 = [3.8, 3.9, 4.0];
        $mhs2 = new MahasiswaMagister("Dewi Andini", "2020220002", "Sistem Informasi", $ipsMhs2, "Pengembangan Model AI", "Dr. Budi Santoso");

        $ipsMhs3 = [3.9, 4.0];
        $mhs3 = new MahasiswaDoktor("Andi Rahmat", "2030330003", "Sistem Informasi", $ipsMhs3, "Studi Mendalam Machine Learning", "23 Mei 2023");

        $jurusanInformatika = new Jurusan("Sistem Informasi");
        $jurusanInformatika->tambahMahasiswa($mhs1);
        $jurusanInformatika->tambahMahasiswa($mhs2);
        $jurusanInformatika->tambahMahasiswa($mhs3);

        $jurusanInformatika->cetakDaftarMahasiswa();
        ?>
    </div>
</body>

</html>
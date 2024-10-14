<?php
class Mobil
{
    public $nama;
    public $merk;

    function cetakInfo()
    {
        echo "Nama Mobil: $this->nama <br>";
        echo "Merk Mobil: $this->merk <br>";
    }
}

class MobilSport extends Mobil
{
    public $speed;
    public $turbo;

    function cetakInfo()
    {
        parent::cetakInfo();
        echo "Kecepatan: $this->speed km/h <br>";
        echo "Turbo: " . ($this->turbo ? 'Ya' : 'Tidak') . "<br>";
    }
}


class CityCar extends Mobil
{
    public $model;
    public $irit;
    public $sensor;

    function cetakInfo()
    {
        parent::cetakInfo();
        echo "Model: $this->model <br>";
        echo "Efisiensi Bahan Bakar: $this->irit <br>";
        echo "Sensor: $this->sensor <br>";
    }
}

// buat class disini
$mobilSport = new MobilSport();
$mobilSport->nama = "Ferrari";
$mobilSport->merk = "Ferrari";
$mobilSport->speed = 350;
$mobilSport->turbo = true;

$mobilSport1 = new MobilSport();
$mobilSport1->nama = "Lamborghini";
$mobilSport1->merk = "Lamborghini";
$mobilSport1->speed = 320;
$mobilSport1->turbo = false;

$cityCar = new CityCar();
$cityCar->nama = "Toyota";
$cityCar->merk = "Toyota";
$cityCar->model = "Yaris";
$cityCar->irit = "15 km/l";
$cityCar->sensor = "Parkir Otomatis";

$cityCar1 = new CityCar();
$cityCar1->nama = "Honda";
$cityCar1->merk = "Honda";
$cityCar1->model = "Jazz";
$cityCar1->irit = "17 km/l";
$cityCar1->sensor = "Lane Assist";


echo "<h2>Mobil Sport:</h2>";
$mobilSport->cetakInfo();
echo "<br>";

echo "<h2>City Car:</h2>";
$cityCar->cetakInfo();

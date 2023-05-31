<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>input nilai</title><form action="" method="post">
</head>
<body>
<center>
<h1>Masukan Nilai Anda</h1>
<input type="text" name="nama" required placeholder="NAMA : "><br>
<input type="number" name="nis" required placeholder="NIS :"><br>
<input type="number" name="mtk" required placeholder="MTK : "><br>
<input type="number" name="indo" required placeholder="INDO : "><br>
<input type="number" name="pipas"required placeholder="PIPAS : "><br>
<input type="number" name="sunda"required placeholder="SUNDA : "><br>
<input type="number" name="pp"required placeholder="PP : "><br>
<input type="number" name="prod"required placeholder="PRODUKTIF : "><br>
<input type="submit" name="submit">

<br><a href ="tampil.php">tampilkan data!!</a>


<?php

class Nilai {
    private $mtk;
    private $nama;
    private $nis;
    private $indo;
    private $pipas;
    private $sunda;
    private $pp;
    private $prod;

    public function setMtk($mtk) {
        $this->mtk = $mtk;
    }

    public function getMtk() {
        return $this->mtk;
    }

    public function setNama($nama) {
        $this->nama = $nama;
    }

    public function getNama() {
        return $this->nama;
    }

    public function setNis($nis) {
        $this->nis = $nis;
    }

    public function getNis() {
        return $this->nis;
    }

    public function setIndo($indo) {
        $this->indo = $indo;
    }

    public function getIndo() {
        return $this->indo;
    }

    public function setPipas($pipas) {
        $this->pipas = $pipas;
    }

    public function getPipas() {
        return $this->pipas;
    }

    public function setSunda($sunda) {
        $this->sunda = $sunda;
    }

    public function getSunda() {
        return $this->sunda;
    }

    public function setPp($pp) {
        $this->pp = $pp;
    }

    public function getPp() {
        return $this->pp;
    }

    public function setProd($prod) {
        $this->prod = $prod;
    }

    public function getProd() {
        return $this->prod;
    }

    public function hitungJumlah() {
        return $this->mtk + $this->indo + $this->pipas + $this->sunda + $this->pp + $this->prod;
    }

    public function hitungRataRata() {
        $jumlah = $this->hitungJumlah();
        return $jumlah / 6;
    }

    public function hitungNilaiMax() {
        $n = [$this->mtk, $this->indo, $this->pipas, $this->sunda, $this->pp, $this->prod];
        return max($n);
    }

    public function hitungNilaiMin() {
        $n = [$this->mtk, $this->indo, $this->pipas, $this->sunda, $this->pp, $this->prod];
        return min($n);
    }

    public function hitungGrade() {
        $rata = $this->hitungRataRata();
        if ($rata >= 90) {
            return "A";
        } elseif ($rata >= 80) {
            return "B";
        } elseif ($rata >= 70) {
            return "C";
        } else {
            return "D";
        }
    }
}

if (isset($_POST['submit'])) {
    include "koneksi.php";
    $nilai = new Nilai();
    $nilai->setMtk($_POST['mtk']);
    $nilai->setNama($_POST['nama']);
    $nilai->setNis($_POST['nis']);
    $nilai->setIndo($_POST['indo']);
    $nilai->setPipas($_POST['pipas']);
    $nilai->setSunda($_POST['sunda']);
    $nilai->setPp($_POST['pp']);
    $nilai->setProd($_POST['prod']);

    $sql = "INSERT INTO `data`(`nama`,`nis`,`mtk`, `indo`, `pipas`, `sunda`, `pp`, `prod`) VALUES ('{$nilai->getNama()}','{$nilai->getNis()}','{$nilai->getMtk()}','{$nilai->getIndo()}','{$nilai->getPipas()}','{$nilai->getSunda()}','{$nilai->getPp()}','{$nilai->getProd()}')";
    $apakah = mysqli_query($conn, $sql);
    if ($apakah) {
        echo "berhasil dimasukan";
    } else {
        echo "gagal";
        exit;
    }
    echo "<br>";

    $jumlah = $nilai->hitungJumlah();
    echo "Jumlah Nilai kamu adalah : " . $jumlah;

    $rata = $nilai->hitungRataRata();
    echo "<br>";
    echo "Rata-rata Nilai Kamu Adalah : " . $rata;

    echo "<br>";
    echo "Nilai maksimumnya: " . $nilai->hitungNilaiMax();
    echo "<br>";
    echo "Nilai minimumnya: " . $nilai->hitungNilaiMin();
    echo "<br>";
    echo "Grade Kamu adalah : " . $nilai->hitungGrade();
}
?>

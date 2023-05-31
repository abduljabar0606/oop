<?php
class Data {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function getData() {
        $query = "SELECT * FROM data";
        $result = mysqli_query($this->conn, $query);

        return $result;
    }

    public function deleteData($nis) {
        $query = "DELETE FROM data WHERE nis='$nis'";
        mysqli_query($this->conn, $query);
    }
}

include "koneksi.php";

$dataObj = new Data($conn);
$dataResult = $dataObj->getData();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<h2>HASIL DATA</h2>
<body>
    <table border="1">
        <tr>
            <th>NO</th>
            <th>NAMA</th>
            <th>NIS</th>
            <th>Matematika</th>
            <th>Pipas</th>
            <th>Sejarah</th>
            <th>Produktif</th>
            <th>Bahasa Indonesia</th>
            <th>Bahasa Inggris</th>
            <th>Aksi</th>
        </tr>

    <a href="index.php">Kembali</a>
    <?php
    $no = 1;
    while($data = mysqli_fetch_array($dataResult)) {
      ?>
      
      <tr>
        <td><?php echo $no++ ?></td>
        <td><?php echo $data['nama']; ?></td>
        <td><?php echo $data['nis']; ?></td>
        <td><?php echo $data['mtk']; ?></td>
        <td><?php echo $data['pipas']; ?></td>
        <td><?php echo $data['indo']; ?></td>
        <td><?php echo $data['sunda']; ?></td>
        <td><?php echo $data['pp'] ?></td>
        <td><?php echo $data['prod'] ?></td>
        <td>
          <a href="hapus.php?nis=<?php echo $data['nis']; ?>">Hapus</a>
          <a href=""></a>
        </td>
      </tr>
      <?php
    }
    ?>
    </table>
</body>
</html>

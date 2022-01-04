<?php
include('koneksi.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nama = $_POST['nama'];
    $nik = $_POST['nik'];
    $jk = $_POST['jk'];
    $tempatlahir = $_POST['tempatlahir'];
    $tgllahir = $_POST['tgllahir'];
	$agama = $_POST['agama'];
	$pendidikan = $_POST['pendidikan'];
	$pekerjaan = $_POST['pekerjaan'];
	$desa = $_POST['desa'];
    $rt = $_POST['rt'];
    $rw = $_POST['rw'];
    
    $sql = $pdo->prepare("INSERT INTO `kk` (`idkk`, `nama`, `nik`, `jk`, `tempatlahir`, `tanggallahir`, `agama`, `pendidikan`, `jenispekerjaan`, `iddesa`, `rt`, `rw`) VALUES (NULL, :a, :b, :c, :d, :e, :f, :g, :h, :i, :j, :k)");
    $sql->bindParam(':a', $nama);
    $sql->bindParam(':b', $nik);
    $sql->bindParam(':c', $jk);
    $sql->bindParam(':d', $tempatlahir);
    $sql->bindParam(':e', $tgllahir);
    $sql->bindParam(':f', $agama);
	$sql->bindParam(':g', $pendidikan);
	$sql->bindParam(':h', $pekerjaan);
	$sql->bindParam(':i', $desa);
	$sql->bindParam(':j', $rt);
	$sql->bindParam(':k', $rw);
	
	
    $sql->execute(); // Eksekusi querynya

    $message = "Data an. $nama Disimpan";
    $_SESSION['pesan'] = $message;
    
    echo "<script>location.replace('index.php')</script>"; // Redirect kembali ke halaman index.php
}
?>
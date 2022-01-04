<?php
include('koneksi.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
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
	
    $sql = $pdo->prepare("UPDATE `kk` SET `nama` = :a, `nik` = :b, `jk` = :c, `tempatlahir` = :d, 
    `tanggallahir` = :e, `agama` = :f, `pendidikan` = :g, `jenispekerjaan` = :h, `iddesa` = :j, `rt` = :k, `rw` = :l WHERE `kk`.`idkk` = :i");
    $sql->bindParam(':a', $nama);
    $sql->bindParam(':b', $nik);
    $sql->bindParam(':c', $jk);
    $sql->bindParam(':d', $tempatlahir);
    $sql->bindParam(':e', $tgllahir);
    $sql->bindParam(':f', $agama);
	$sql->bindParam(':g', $pendidikan);
	$sql->bindParam(':h', $pekerjaan);
	$sql->bindParam(':i', $id);
	$sql->bindParam(':j', $desa);
	$sql->bindParam(':k', $rt);
	$sql->bindParam(':l', $rw);
	
	
    $sql->execute(); // Eksekusi querynya

    $message = "Data an. $nama Disimpan";
    $_SESSION['pesan'] = $message;
    
    echo "<script>location.replace('index.php')</script>"; // Redirect kembali ke halaman index.php
}
?>
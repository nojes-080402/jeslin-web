<?php
include('koneksi.php');

$idnya = $_GET['id'];

if (isset($idnya)) {
    $sqltampil = $pdo->prepare("DELETE FROM `kk` WHERE `kk`.`idkk` = :a");
    $sqltampil->bindParam(':a', $idnya);
    $sqltampil->execute();
    
    
    $message = "Data Dengan ID. $idnya Dihapus";
    $_SESSION['pesan'] = $message;
    
    echo "<script>location.replace('index.php')</script>"; // Redirect kembali ke halaman index.php
    
}

echo "<script>location.replace('index.php')</script>"; // Redirect kembali ke halaman index.php


?>

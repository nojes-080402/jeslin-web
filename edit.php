<?php
include('koneksi.php');
include('header.php');
include('kopatas.php');
include('sidebar.php');

$idnya = $_GET['id'];

$sqltampil = $pdo->prepare("SELECT * FROM `kk` WHERE `idkk` = :a");
$sqltampil->bindParam(':a', $idnya);
$sqltampil->execute();

$datanya = $sqltampil->rowCount();
if ($datanya == 0) {
    $_SESSION['pesan'] = "Data salah";
    exit();
} else {
    $datanya1 = $sqltampil->fetch();
    // print_r($datanya1);
    $data0 = $datanya1[0];
    $data1 = $datanya1[1];
    $data2 = $datanya1[2];
    $data3 = $datanya1[3];
    $data4 = $datanya1[4];
    $data5 = $datanya1[5];
    $data6 = $datanya1[6];
    $data7 = $datanya1[7];
    $data8 = $datanya1[8];
    $data9 = $datanya1[9];
    $data10 = $datanya1[10];
    $data11 = $datanya1[11];

?>



<div class="col col-lg-10 border border-secondary">
    <h1>Edit Kartu Keluarga</h1>
    <form method="post" action="edit-simpan.php">
        <div class="row">
            <div class="col col-lg-6">

                <label>Nama</label><br>
                <input type="hidden" class="form-control" name="id" value="<?php echo $data0; ?>" required>
                <input type="text" class="form-control" name="nama" value="<?php echo $data1; ?>" required><br>

                <label>NIK</label><br>
                <input type="text" class="form-control" name="nik" value="<?php echo $data2; ?>" required><br>

                <label>Jenis Kelamin</label><br>
                <select name="jk" class="form-control" required>
                    <option value="<?php echo $data3;?>"><?php echo $data3;?></option>
                    <option value="L">Laki-laki</option>
                    <option value="P">Perempuan</option>
                </select><br>

                <label>TTL</label><br>
                <input type="text" class="form-control" name="tempatlahir" value="<?php echo $data4;?>" required>
				<input type="date" class="form-control" name="tgllahir" value="<?php echo $data5;?>" required><br>



            </div>
            <div class="col col-lg-6">
                <label>Agama</label><br>
                <?php
				$sqlagama = $pdo->query("SELECT * FROM `agama`");
				$dataagama = $sqlagama->fetchAll();
				?>
                <select name="agama" class="form-control" required>
                <option value="<?php echo $data6;?>"><?php echo $data6;?></option>
				<?php
				foreach ($dataagama as $dataagamanya) {
				?>
                    <option value="<?php echo $dataagamanya['namaagama'];?>"><?php echo $dataagamanya['namaagama'];?></option>
				<?php
				}
				?>
                </select><br>

                <label>Pendidikan</label><br>
                <?php
				$sqlpendidikan = $pdo->query("SELECT * FROM `penddidikan`");
				$datapendidikan = $sqlpendidikan->fetchAll();
				?>
                <select name="pendidikan" class="form-control" required>
                <option value="<?php echo $data7;?>"><?php echo $data7;?></option>
				<?php
				foreach ($datapendidikan as $datapendidikannya) {
				?>
                    <option value="<?php echo $datapendidikannya['jenispendidikan'];?>"><?php echo $datapendidikannya['jenispendidikan'];?></option>
				<?php
				}
				?>
                </select><br>
				 <label>Pekerjaan</label><br>
                <?php
				$sqlpekerjaan = $pdo->query("SELECT * FROM `pekerjaan`");
				$datapekerjaan = $sqlpekerjaan->fetchAll();
				?>
                <select name="pekerjaan" class="form-control" required>
                <option value="<?php echo $data8;?>"><?php echo $data8;?></option>
				<?php
				foreach ($datapekerjaan as $datapekerjaannya) {
				?>
                    <option value="<?php echo $datapekerjaannya['jenispekerjaan'];?>"><?php echo $datapekerjaannya['jenispekerjaan'];?></option>
				<?php
				}
				?>
                </select><br>

                <label>Desa</label><br>
                <?php
				$sqldesa = $pdo->query("SELECT * FROM `desakelurahan`");
				$datadesa = $sqldesa->fetchAll();
                $sqldesa1 = $pdo->query("SELECT * FROM `desakelurahan` WHERE iddesa = $data9");
				$datadesa1 = $sqldesa1->fetch();

				?>
                <select name="desa" class="form-control" required>
                <option value="<?php echo $datadesa1[0];?>"><?php echo $datadesa1[1];?></option>
				<?php
				foreach ($datadesa as $datadesanya) {
				?>
                    <option value="<?php echo $datadesanya['iddesa'];?>"><?php echo $datadesanya['namadesa'];?></option>
				<?php
				}
				?>
                </select><br>

                <label>RT</label><br>
                <?php
				$sqlrt = $pdo->query("SELECT * FROM `rt`");
				$datart = $sqlrt->fetchAll();
                $sqlrt1 = $pdo->query("SELECT * FROM `rt` WHERE idrt = $data10");
				$datart1 = $sqlrt1->fetch();

				?>
                <select name="rt" class="form-control" required>
                <option value="<?php echo $datart1[0];?>"><?php echo $datart1[1];?></option>
				<?php
				foreach ($datart as $datartnya) {
				?>
                    <option value="<?php echo $datartnya['idrt'];?>"><?php echo $datartnya['namart'];?></option>
				<?php
				}
				?>
                </select><br>

                <label>RW</label><br>
                <?php
				$sqlrw = $pdo->query("SELECT * FROM `rw`");
				$datarw = $sqlrw->fetchAll();
                $sqlrw1 = $pdo->query("SELECT * FROM `rw` WHERE idrw = $data11");
				$datarw1 = $sqlrw1->fetch();
				?>
                <select name="rw" class="form-control" required>
                <option value="<?php echo $datarw1[0];?>"><?php echo $datarw1[1];?></option>
				<?php
				foreach ($datarw as $datarwnya) {
				?>
                    <option value="<?php echo $datarwnya['idrw'];?>"><?php echo $datarwnya['namarw'];?></option>
				<?php
				}
				?>
                </select><br>


            </div>


        </div>
        <button name="submit" class="btn btn-primary" type="submit">Simpan</button>

    </form>

</div>
</div>
</div>


<?php
}
include('footer.php');
?>
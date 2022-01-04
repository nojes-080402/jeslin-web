<?php
include('koneksi.php');
include('header.php');
include('kopatas.php');
include('sidebar.php');
?>



<div class="col col-lg-10 border border-secondary">
    <h1>Input Kartu Keluarga</h1>
    <form method="post" action="input-simpan.php">
        <div class="row">
            <div class="col col-lg-6">

                <label>Nama</label><br>
                <input type="text" class="form-control" name="nama" placeholder="Nama Lengkap" required><br>

                <label>NIK</label><br>
                <input type="text" class="form-control" name="nik" placeholder="NIK" required><br>

                <label>Jenis Kelamin</label><br>
                <select name="jk" class="form-control" required>
                    <option value="">Pilih Jenis Kelamin</option>
                    <option value="L">Laki-laki</option>
                    <option value="P">Perempuan</option>
                </select><br>

                <label>TTL</label><br>
                <input type="text" class="form-control" name="tempatlahir" placeholder="Tempat Lahir" required>
				<input type="date" class="form-control" name="tgllahir" required><br>



            </div>
            <div class="col col-lg-6">
                <label>Agama</label><br>
                <?php
				$sqlagama = $pdo->query("SELECT * FROM `agama`");
				$dataagama = $sqlagama->fetchAll();
				?>
                <select name="agama" class="form-control" required>
                <option value="">Pilih Agama</option>
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
                <option value="">Pilih pendidikan</option>
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
                <option value="">Pilih pekerjaan</option>
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
				?>
                <select name="desa" class="form-control" required>
                <option value="">Pilih Desa</option>
				<?php
				foreach ($datadesa as $datadesanya) {
				?>
                    <option value="<?php echo $datadesanya['iddesa'];?>"><?php echo $datadesanya['namadesa'];?></option>
				<?php
				}
				?>
                </select><br>

                <label>RT/RW</label><br>
                <?php
				$sqlrt = $pdo->query("SELECT * FROM `rt`");
				$datart = $sqlrt->fetchAll();
				?>
                <select name="rt" class="form-control" required>
                <option value="">Pilih RT</option>
				<?php
				foreach ($datart as $datartnya) {
				?>
                    <option value="<?php echo $datartnya['idrt'];?>"><?php echo $datartnya['namart'];?></option>
				<?php
				}
				?>
                </select><br>
                <?php
				$sqlrw = $pdo->query("SELECT * FROM `rw`");
				$datarw = $sqlrw->fetchAll();
				?>
                <select name="rw" class="form-control" required>
                <option value="">Pilih RW</option>
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
include('footer.php');
?>
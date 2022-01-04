<?php
include('koneksi.php');
include('header.php');
include('kopatas.php');
include('sidebar.php');
?>
<div class="col col-lg-10">

    <h1>Cari Data Warga </h1>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
        <div class="row">
            <div class="col col-lg-6">


                <label>Pilih Desa</label><br>
                <?php
                $sqldesa = $pdo->query("SELECT * FROM `desakelurahan`");
                $datadesa = $sqldesa->fetchAll();
                ?>
                <select name="desa" class="form-control" required>
                    <option value="">Pilih Desa</option>
                    <?php
                    foreach ($datadesa as $datadesanya) {
                    ?>
                        <option value="<?php echo $datadesanya['iddesa']; ?>"><?php echo $datadesanya['namadesa']; ?></option>
                    <?php
                    }
                    ?>
                </select><br>

            </div>


        </div>
        <button name="submit" class="btn btn-primary" type="submit">Cari</button>

    </form>


    <?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $caridesa = $_POST['desa'];
    // Cek apakah terdapat cookie dengan nama message
    $sqltampil = $pdo->query("SELECT * FROM `kk` WHERE `iddesa` = $caridesa ORDER BY `kk`.`idkk` DESC");
    $datanya = $sqltampil->fetchAll();

    if (!empty($_SESSION['pesan'])) {
        echo '<h5>' . $_SESSION['pesan'] . '</h5>';
        unset($_SESSION['pesan']);
    } else {
        echo "";
    }
    ?>
    <table id="example" class="table" style="width:100%">
        <thead>
            <tr>
                <th>Nama</th>
                <th>NIK</th>
                <th>JENIS KELAMIN</th>
                <th>TTL</th>
                <th>AGAMA</th>
                <th>PENDIDIKAN</th>
                <th>JENIS PEKERJAAN</th>
                <th>ALAMAT</th>
                <th>Bantuan</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($datanya as $data) {
            ?>
                <tr>
                    <td><?php echo $data['nama']; ?></td>
                    <td><?php echo $data['nik']; ?></td>
                    <td><?php echo jkelamin($data['jk']); ?></td>
                    <td><?php echo $data['tempatlahir']; ?>, <?php echo $data['tanggallahir']; ?></td>
                    <td><?php echo $data['agama']; ?></td>
                    <td><?php echo $data['pendidikan']; ?></td>
                    <td><?php echo $data['jenispekerjaan']; ?></td>
                    <td><?php
                        echo 'Kecamatan : INSANA BARAT<br>';
                        $iddesa = $data['iddesa'];
                        $idrt = $data['rt'];
                        $idrw = $data['rw'];
                        $sqldesa = $pdo->query("SELECT * FROM `desakelurahan` WHERE `iddesa` = $iddesa");
                        $datadesa = $sqldesa->fetch();
                        echo 'Desa : ' . $datadesa['namadesa'] . '<br>';
                        $sqlrt = $pdo->query("SELECT * FROM `rt` WHERE `idrt` = $idrt");
                        $datart = $sqlrt->fetch();
                        echo 'RT : ' . $datart['namart'] . ' ';
                        $sqlrw = $pdo->query("SELECT * FROM `rw` WHERE `idrw` = $idrw");
                        $datarw = $sqlrw->fetch();
                        echo '/ RW : ' . $datarw['namarw'] . ' ';


                        ?>

                    </td>
                    <td><a class="btn btn-primary" href="edit.php?id=<?php echo $data['idkk']; ?>"><i class="material-icons">edit</i></a>
                        <a class="btn btn-danger" href="hapus.php?id=<?php echo $data['idkk']; ?>"><i class="material-icons">delete</i></a>
                    </td>
                </tr>
            <?php
            }
            ?>
        </tbody>
        <tfoot>
            <tr>
                <th>Nama</th>
                <th>NIK</th>
                <th>JENIS KELAMIN</th>
                <th>TTL</th>
                <th>AGAMA</th>
                <th>PENDIDIKAN</th>
                <th>JENIS PEKERJAAN</th>
                <th>ALAMAT</th>
                <th>Bantuan</th>
            </tr>
        </tfoot>
    </table>
</div>
</div>
</div>

<?php
}
include('footer.php');
?>
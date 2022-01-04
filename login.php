<?php
session_start();

$host = 'localhost'; // Nama hostnya
$username = 'root'; // Username
$password = ''; // Password (Isi jika menggunakan password)
$database = 'kartukeluarga'; // Nama databasenya

// Koneksi ke MySQL dengan PDO
$pdo = new PDO('mysql:host='.$host.';dbname='.$database, $username, $password);

include('header.php');
include('kopatas.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['user'];
    $pass = $_POST['pass'];

    $sqltampil = $pdo->prepare("SELECT * FROM `user` WHERE `user` = :a AND `pass` = :b");
    $sqltampil->bindParam(':a', $name);
    $sqltampil->bindParam(':b', $pass);
    $sqltampil->execute();

    $datanya = $sqltampil->rowCount();
    if ($datanya == 0) {
        $_SESSION['pesan'] = "User dan Password salah";
    } else {
        $datanya1 = $sqltampil->fetch();
        $_SESSION['nama'] = $datanya1['nama'];
        $_SESSION['pesan'] = "Selamat Datang ".$datanya1['nama'];
        echo '<script>window.location.href = "index.php"</script>';
    }
}

?>
<section class="vh-100">
    <div class="container-fluid h-custom">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-md-9 col-lg-6 col-xl-5">
                <img src="https://mdbootstrap.com/img/Photos/new-templates/bootstrap-login-form/draw2.png" class="img-fluid" alt="Sample image">
            </div>
            <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
                <?php
                if(isset($_SESSION['pesan'])) {
                   echo '<h5>'.$_SESSION['pesan'].'</h5>';
                }
                ?>
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                    <!-- Email input -->
                    <div class="form-outline mb-4">
                        <input name="user" type="text" id="form3Example3" class="form-control form-control-lg" placeholder="Username" />
                        <label class="form-label" for="form3Example3">Username</label>
                    </div>

                    <!-- Password input -->
                    <div class="form-outline mb-3">
                        <input name="pass" type="password" id="form3Example4" class="form-control form-control-lg" placeholder="Enter password" />
                        <label class="form-label" for="form3Example4">Password</label>
                    </div>

                    <div class="d-flex justify-content-between align-items-center">
                        <button type="submit" name="submit" class="btn btn-primary">MASUK</button>
                        <div class="form-check mb-0">
                </form>
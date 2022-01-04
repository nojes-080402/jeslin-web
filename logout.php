<?php
session_start();
        unset($_SESSION['nama']);
        echo '<script>window.location.href = "login.php"</script>';
?>
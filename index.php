<?php
    session_start();
    ob_start();

    include "library/config.php";

    if(empty($_SESSION['username']) OR empty($_SESSION['password'])) {
        // echo "<p align='center'>Anda harus login terlebih dahulu!</p>";
        echo "<meta http-equiv='refresh' content='0.5in; url=login.php'>";
    } else {
        define("INDEX", true);
    
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <header>
        Aplikasi Manajemen Pegawai
    </header>
    <div class="container">
        <aside>
            <ul class="menu">
                <li><a href="?hal=dashboard">Dashboard</a></li>
                <li><a href="?hal=pegawai">Data Pegawai</a></li>
                <li><a href="?hal=jabatan">Data Jabatan</a></li>
                <li><a href="logout.php">Keluar</a></li>
            </ul>
        </aside>
        <section class="main">
            <?php include "konten.php" ?>
        </section>
    </div>
    <footer>
        copyright &copy; <strong>Kholis</strong> 2024
    </footer>
</body>

</html>

<?php
}
?>
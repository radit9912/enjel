<?php
session_start();
include('inc_koneksi.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>jowowi</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div id="app">
        <h1> Halaman pendaftaran</h1>
        <?php 
        if (isset($_POST['username'])) {
            $username = $_POST['username'];
            $password = md5($_POST['password']);

            $query = mysqli_query($conn, "INSERT INTO admin (username, password) VALUES ('$username', '$password')");
            if ($query) {
                echo "<p>Registrasi berhasil!</p>";
            } else {
                echo "<p>Registrasi gagal!</p>";
            }
            header("Location: login.php");
            exit();

        }
        ?>
        <form action="" method="post">
            <input type="text" name="username" class="input" placeholder="masukkan nama"/><br/><br/>
            <input type="password" name="password" class="input" placeholder="masukkan sandi"/><br/><br/>
            <input type="submit" name="Daftar" value="Daftar"/>
        </form>
    </div>
</body>
</html>
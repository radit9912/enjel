<?php
session_start();
include('inc_koneksi.php');
$username = "";
$password = "";
$err ="";
if (isset($_POST['Login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    if ($username == '' or $password == '') {
        $err .= "<li> Silahkan masukkan username dan password </li>";
    }
    if(empty($err)) {
        $sql1 = "SELECT * FROM admin WHERE username = '" . mysqli_real_escape_string($conn, $username) . "'";
        $q1 = mysqli_query($conn, $sql1);

        if (!$q1 || mysqli_num_rows($q1) == 0) {
            $err .= "<li>Akun tidak ditemukan</li>";
        } else {
            $r1 = mysqli_fetch_assoc($q1);
            if ($r1['password'] != md5($password)) {
                $err .= "<li>Akun tidak ditemukan</li>";
            }
        }
    }
    if(empty($err)) {
        $_SESSION['admin_username'] = $username;
        header("Location: index.php");
        exit();
    }
}
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
        <h1> Halaman login</h1>
        <?php 
        if ($err) {
            echo "<ul>$err</ul>";
        }
        ?>
        <form action="" method="post">
            <input type="text" name="username" class="input" placeholder="masukkan nama"/><br/><br/>
            <input type="password" name="password" class="input" placeholder="masukkan sandi"/><br/><br/>
            <input type="submit" name="Login" value="Login"/>
            <a href="daftar.php">daftar</a>
        </form>
    </div>
</body>
</html>
<?php
    session_start();
    include "koneksi.php";

    $user = $_POST['username'];
    $pw = sha1($_POST['password']);

    $qLogin = "SELECT * FROM admin WHERE username='$user' and password='$pw'";
    $login = mysqli_query($conn, $qLogin);

    $cek = mysqli_num_rows($login);

    if ($cek > 0) {
        $_SESSION['username'] = $user;
        $_SESSION['status'] = "login";
        header("location: index.php");
    } else {
        header("location: login.php?pesan=gagal");
    }
?>

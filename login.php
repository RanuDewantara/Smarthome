<?php
session_start();

if (isset($_GET['pesan'])) {
    if ($_GET['pesan'] == "gagal") {
        echo "Login gagal! Username dan password salah!";
    } else if ($_GET['pesan'] == "logout") {
        echo "Anda telah logout";
    }
}
?>

<!DOCTYPE HTML>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login to Smarthome</title>
    <link rel="stylesheet" href="bs/css/bootstrap.rtl.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu+Condensed&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Ubuntu Condensed', cursive;
            font-size: 13pt;
        }
    </style>
</head>

<body class="body" style="background-color:darkgreen">
        <div class="container">
            <div class="row align-content-center justify-content-center pt-5 mt-5">
                <div class="col-lg-6 offset-lg-1 px-2 px-md-5">
                    <div class=" bg-white shadow rounded px-5">
                        <div class="image text-center py-4">
                            <img src="logo_smk.png" alt="" width="150">
                            <br><br>
                            <span class="mb-3 fs-3 text-center">Login to SMK Negeri 3 Smarthome</span>
                        </div>
                        <div class="row">
                            <div class="col-md px-4">
                                <div class="form-left h-100 py-3 px-0 px-md-5">
                                    <form action="verlog.php" method="post" class="row g-4">
                                        <div class="col-12">
                                            <label>Username<span class="text-danger">*</span></label>
                                            <div class="input-group fs-5">
                                                <img class="sign rounded-1 px-2" src="SVG/person.svg" style="border:1px solid silver; background-color:silver; margin-right:0.3px;">
                                                <input type="text" class="form-control rounded-1" placeholder="Masukkan Username" name="username" style="border: 1px solid silver;">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <label>Password<span class="text-danger">*</span></label>
                                            <div class="input-group fs-5">
                                                <img class="sign rounded-1 px-2" src="SVG/key.svg" style="border:1px solid silver; background-color:silver; margin-right:0.3px;">
                                                <input type="password" class="form-control rounded-1" placeholder="Masukkan Password" name="password" style="border: 1px solid silver;">
                                            </div>
                                        </div>
                                        <div class="col-12 text-center">
                                            <button type="submit" class="btn px-4 mt-4" style="background-color: darkgreen; color:white">Login</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <script src="bs/js/bootstrap.min.js"></script>
</body>
</html>
<?php 
    include "koneksi.php";

    session_start();
    if($_SESSION['status']!="login"){
        header("location: login.php");
    }
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bs/css/bootstrap.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Play&display=swap" rel="stylesheet">
    <title>SMK Negeri 3 Smarthome</title>
    <style>
        body{
            font-family: 'Play', sans-serif;
            background-color: #033657;
        }
        .col{
            margin: 0 1px;
        }
    </style>
</head>
<body class="body">
    <div class="container text-center">
        <div class="row align-items-start">
        <!-- Home -->
        <div class="col-md-4 me-1 col-sm-12 py-2 mb-1" style="background-color: #01497a;">
            <img src="SVG/home2.svg" height="75">
        </div>

        <!-- Hari, Tanggal, Jam -->
        <div class="col-md col-sm-12 me-1 mb-1" style="background-color: #01497a;">
            <!-- Hari -->
            <div class="hari" style="color: #9e9d9d;">
                <span id="sunday">SUN</span>
                <span id="monday">MON</span>
                <span id="tuesday">TUE</span>
                <span id="wednesday">WED</span>
                <span id="thursday">THU</span>
                <span id="friday">FRI</span>
                <span id="saturday">SAT</span>
            </div>
            <style>
                .active{
                    color: white;
                }
            </style>
            <script>
                // Fungsi untuk menandai hari ini sebagai aktif
                function markToday() {
                const days = document.getElementsByClassName("hari")[0].children;
                const today = new Date().getDay();

                // Menghapus kelas "active" dari semua hari
                for (let i = 0; i < days.length; i++) {
                    days[i].classList.remove("active");
                }

                // Menambahkan kelas "active" pada hari yang sesuai dengan hari ini
                days[today].classList.add("active");
                }

                // Memanggil fungsi markToday untuk menandai hari ini sebagai aktif
                markToday();
            </script>

            <!-- Tanggal -->
            <span id="tanggal" class="text-white" style="font-size: 12.5pt;"></span>
            <script>
                var tanggal = new Date();
                if (tanggal.getTimezoneOffset() == 0) (a=tanggal.getTime() + ( 7 *60*60*1000))
                else (a=tanggal.getTime());
                tanggal.setTime(a);
                var y= tanggal.getFullYear ();
                var m= tanggal.getMonth ();
                var dt= tanggal.getDate ();
                var bulanarray=new Array(
                                        "JANUARI",
                                        "FEBRUARI",
                                        "MARET",
                                        "APRIL",
                                        "MEI",
                                        "JUNI",
                                        "JULI",
                                        "AGUSTUS",
                                        "SEPTEMBER",
                                        "OKTOBER",
                                        "NOVEMBER",
                                        "DESEMBER"
                                    );
                document.getElementById("tanggal").innerHTML = dt+" "+bulanarray[m]+" "+y;
            </script>

            <!-- Jam -->
            <div id="clock"></div>
            <style>
                #clock {
                    font-family: Play, sans-serif;
                    color: white;
                    font-size: 21pt;
                    text-align: center;
                }
            </style>

            <script>
                function now() {
                    var jam = new Date(); /* creating object of Date class */
                    var h = jam.getHours();
                    var m = jam.getMinutes();
                    var s = jam.getSeconds();
                    h = updateTime(h);
                    m = updateTime(m);
                    s = updateTime(s);
                    document.getElementById("clock").innerText = h + ":" + m + ":" + s; /* adding time to the div */
                    var t = setTimeout(function(){ now() }, 1000); /* setting timer */
                }

                function updateTime(k) {
                    if (k < 10) {
                        return "0" + k;
                    }
                    else {
                        return k;
                    }
                }
                now();
            </script>

        </div>

        <!-- Logout -->
        <div class="col-md-2 col-sm-12 py-2 mb-1 text-white" style="background-color: #01497a;">
            <a href="logout.php">
                <svg xmlns="http://www.w3.org/2000/svg" height="51" fill="white" class="bi bi-box-arrow-right" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0v2z"/>
                    <path fill-rule="evenodd" d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z"/>
                </svg>
            </a>
            <br><span>LOGOUT</span>
        </div>
    </div>
</div>
<div class="container">
    <!-- Ruang Guru RPL -->
    <div class="row text-white mb-1" style="background-color: #01497a;">
        <div style="margin-top: 7px;">
            <img src="SVG/home2.svg" height="17" style="vertical-align:baseline">
            <span>Ruang Guru RPL</span>
        </div>
        <div class="col-sm-7 pb-2 pt-4">
            <div class="row ps-md-5">
                <div class="col-6 col-sm-3 text-center mb-3">
                    <?php
                        if ($qLampu1RG['nilai'] == 1){
                            echo"<a href='off.php?perangkat=" . $qLampu1RG['perangkat'] . "&id=".$qLampu1RG['id']."'>
                                        <img src='SVG/on/bulb.svg'>
                                    </a>    ";
                        }elseif ($qLampu1RG['nilai'] == 0) {
                            echo"<a href='on.php?perangkat=" . $qLampu1RG['perangkat'] . "&id=".$qLampu1RG['id']."'>
                                        <img src='SVG/off/bulb.svg'>
                                    </a>    ";
                        }
                    ?>
                    <br><span>Lampu 1</span>
                </div>
                <div class="col-6 col-sm-3 text-center mb-3">
                    <?php
                        if ($qLampu2RG['nilai'] == 1){
                            echo"<a href='off.php?perangkat=" . $qLampu2RG['perangkat'] . "&id=".$qLampu2RG['id']."'>
                                        <img src='SVG/on/bulb.svg'>
                                    </a>    ";
                        }elseif ($qLampu2RG['nilai'] == 0) {
                            echo"<a href='on.php?perangkat=" . $qLampu2RG['perangkat'] . "&id=".$qLampu2RG['id']."'>
                                        <img src='SVG/off/bulb.svg'>
                                    </a>    ";
                        }
                    ?>
                    <br><span>Lampu 2</span>
                </div>
                <div class="col-6 col-sm-3 text-center mb-3">
                    <?php
                        if ($qKipas1['nilai'] == 1){
                            echo"<a href='off.php?perangkat=" . $qKipas1['perangkat'] . "&id=".$qKipas1['id']."'>
                                        <img src='SVG/on/fan.svg'>
                                    </a>    ";
                        }elseif ($qKipas1['nilai'] == 0) {
                            echo"<a href='on.php?perangkat=" . $qKipas1['perangkat'] . "&id=".$qKipas1['id']."'>
                                        <img src='SVG/off/fan.svg'>
                                    </a>    ";
                        }
                    ?>
                    <br><span>Kipas 1</span>
                </div>
                <div class="col-6 col-sm-3 text-center mb-3">
                    <?php
                        if ($qKipas2['nilai'] == 1){
                            echo"<a href='off.php?perangkat=" . $qKipas2['perangkat'] . "&id=".$qKipas2['id']."'>
                                        <img src='SVG/on/fan.svg'>
                                    </a>    ";
                        }elseif ($qKipas2['nilai'] == 0) {
                            echo"<a href='on.php?perangkat=" . $qKipas2['perangkat'] . "&id=".$qKipas2['id']."'>
                                        <img src='SVG/off/fan.svg'>
                                    </a>    ";
                        }
                    ?>
                    <br><span>Kipas 2</span>
                </div>
            </div>
        </div>
        <div class="col-sm-5 pe-0 ps-4 ps-sm-5 ms-3 ms-md-0 mb-3 pt-0">
            <table class="table table-borderless text-white gx-0 mb-3 float-md-end" style="line-height:15%;">
                <tr>
                    <td>Suhu</td>
                    <td>:</td>
                    <td><?= $qSuhuRG['nilai']; ?> °C</td>
                </tr>
                <tr>
                    <td>Kelembapan</td>
                    <td>:</td>
                    <td><?= $qKelembapanRG['nilai']; ?> RH</td>
                </tr>
                <tr>
                    <td>Daya</td>
                    <td>:</td>
                    <td><?= $qDayaRG['nilai']; ?> Watt</td>
                </tr>
                <tr>
                    <td>Tegangan</td>
                    <td>:</td>
                    <td><?= $qTeganganRG['nilai']; ?> Volt</td>
                </tr>
                <tr>
                    <td>Arus</td>
                    <td>:</td>
                    <td><?= $qArusRG['nilai']; ?> Ampere</td>
                </tr>
                <tr>
                    <td>Energi</td>
                    <td>:</td>
                    <td><?= $qEnergiRG['nilai']; ?> kWh</td>
                </tr>
            </table>
        </div>
    </div>

    <!-- Lab RPL A -->
    <div class="row text-white mb-1" style="background-color: #01497a;">
        <div style="margin-top: 7px;">
            <img src="SVG/home2.svg" height="17" style="vertical-align:baseline">
            <span>Lab RPL A</span>
        </div>
        <div class="col-sm-7 pb-2 pt-4">
            <div class="row ps-md-5">
                <div class="col-6 col-sm-3 text-center mb-3">
                    <?php
                        if ($qLampu1LA['nilai'] == 1){
                            echo"<a href='off.php?perangkat=" . $qLampu1LA['perangkat'] . "&id=".$qLampu1LA['id']."'>
                                        <img src='SVG/on/bulb.svg'>
                                    </a>    ";
                        }elseif ($qLampu1LA['nilai'] == 0) {
                            echo"<a href='on.php?perangkat=" . $qLampu1LA['perangkat'] . "&id=".$qLampu1LA['id']."'>
                                        <img src='SVG/off/bulb.svg'>
                                    </a>    ";
                        }
                    ?>
                    <br><span>Lampu 1</span>
                </div>
                <div class="col-6 col-sm-3 text-center mb-3">
                    <?php
                        if ($qLampu2LA['nilai'] == 1){
                            echo"<a href='off.php?perangkat=" . $qLampu2LA['perangkat'] . "&id=".$qLampu2LA['id']."'>
                                        <img src='SVG/on/bulb.svg'>
                                    </a>    ";
                        }elseif ($qLampu2LA['nilai'] == 0) {
                            echo"<a href='on.php?perangkat=" . $qLampu2LA['perangkat'] . "&id=".$qLampu2LA['id']."'>
                                        <img src='SVG/off/bulb.svg'>
                                    </a>    ";
                        }
                    ?>
                    <br><span>Lampu 2</span>
                </div>
                <div class="col-6 col-sm-3 text-center mb-3">
                    <?php
                        if ($qLampu3LA['nilai'] == 1){
                            echo"<a href='off.php?perangkat=" . $qLampu3LA['perangkat'] . "&id=".$qLampu3LA['id']."'>
                                        <img src='SVG/on/bulb.svg'>
                                    </a>    ";
                        }elseif ($qLampu3LA['nilai'] == 0) {
                            echo"<a href='on.php?perangkat=" . $qLampu3LA['perangkat'] . "&id=".$qLampu3LA['id']."'>
                                        <img src='SVG/off/bulb.svg'>
                                    </a>    ";
                        }
                    ?>
                    <br><span>Lampu 3</span>
                </div>
                <div class="col-6 col-sm-3 text-center mb-2">
                    <?php
                        if ($qLampu4LA['nilai'] == 1){
                            echo"<a href='off.php?perangkat=" . $qLampu4LA['perangkat'] . "&id=".$qLampu4LA['id']."'>
                                        <img src='SVG/on/bulb.svg'>
                                    </a>    ";
                        }elseif ($qLampu4LA['nilai'] == 0) {
                            echo"<a href='on.php?perangkat=" . $qLampu4LA['perangkat'] . "&id=".$qLampu4LA['id']."'>
                                        <img src='SVG/off/bulb.svg'>
                                    </a>    ";
                        }
                    ?>
                    <br><span>Lampu 4</span>
                </div>
            </div>
            <div class="row ps-md-5">
                <div class="col-6 col-sm-3 text-center mb-2">
                    <?php
                        if ($qACLA1['nilai'] == 1){
                            echo"<a href='off.php?perangkat=" . $qACLA1['perangkat'] . "&id=".$qACLA1['id']."'>
                                        <img src='SVG/on/ac.svg'>
                                    </a>    ";
                        }elseif ($qACLA1['nilai'] == 0) {
                            echo"<a href='on.php?perangkat=" . $qACLA1['perangkat'] . "&id=".$qACLA1['id']."'>
                                        <img src='SVG/off/ac.svg'>
                                    </a>    ";
                        }
                    ?>
                    <br><span>AC 1</span>
                </div>
                <div class="col-6 col-sm-3 text-center mb-2">
                    <?php
                        if ($qACLA2['nilai'] == 1){
                            echo"<a href='off.php?perangkat=" . $qACLA2['perangkat'] . "&id=".$qACLA2['id']."'>
                                        <img src='SVG/on/ac.svg'>
                                    </a>    ";
                        }elseif ($qACLA2['nilai'] == 0) {
                            echo"<a href='on.php?perangkat=" . $qACLA2['perangkat'] . "&id=".$qACLA2['id']."'>
                                        <img src='SVG/off/ac.svg'>
                                    </a>    ";
                        }
                    ?>
                    <br><span>AC 2</span>
                </div>
                <div class="col-6 col-sm-3 text-center mb-2">
                    <?php
                        if ($qLCDA['nilai'] == 1){
                            echo"<a href='off.php?perangkat=" . $qLCDA['perangkat'] . "&id=".$qLCDA['id']."'>
                                        <img src='SVG/on/lcd.svg'>
                                    </a>    ";
                        }elseif ($qLCDA['nilai'] == 0) {
                            echo"<a href='on.php?perangkat=" . $qLCDA['perangkat'] . "&id=".$qLCDA['id']."'>
                                        <img src='SVG/off/lcd.svg'>
                                    </a>    ";
                        }
                    ?>
                    <br><span>LCD</span>
                </div>
            </div>
        </div>
        
        <div class="col-sm-5 pe-0 ps-4 ps-sm-5 ms-3 ms-md-0 mb-3 pt-0">
            <table class="table table-borderless text-white gx-0 mb-3 mb-md-2 float-md-end" style="line-height:15%;">
                <tr>
                    <td>Suhu</td>
                    <td>:</td>
                    <td><?= $qSuhuA['nilai']; ?> °C</td>
                </tr>
                <tr>
                    <td>Kelembapan</td>
                    <td>:</td>
                    <td><?= $qKelembapanA['nilai']; ?> RH</td>
                </tr>
                <tr>
                    <td>Daya</td>
                    <td>:</td>
                    <td><?= $qDayaA['nilai']; ?> Watt</td>
                </tr>
                <tr>
                    <td>Tegangan</td>
                    <td>:</td>
                    <td><?= $qTeganganA['nilai']; ?> Volt</td>
                </tr>
                <tr>
                    <td>Arus</td>
                    <td>:</td>
                    <td><?= $qArusA['nilai']; ?> Ampere</td>
                </tr>
                <tr>
                    <td>Energi</td>
                    <td>:</td>
                    <td><?= $qEnergiA['nilai']; ?> kWh</td>
                </tr>
            </table>
        </div>
    </div>
    
    <!-- Lab RPL B -->
    <div class="row text-white mb-1" style="background-color: #01497a;">
        <div style="margin-top: 7px;">
            <img src="SVG/home2.svg" height="17" style="vertical-align: baseline">
            <span>Lab RPL B</span>
        </div>
        <div class="col-sm-7 pb-4 pt-4">
            <div class="row ps-md-5">
                <div class="col-6 col-sm-3 text-center mb-3">
                    <?php
                        if ($qLampu1LB['nilai'] == 1){
                            echo"<a href='off.php?perangkat=" . $qLampu1LB['perangkat'] . "&id=".$qLampu1LB['id']."'>
                                        <img src='SVG/on/bulb.svg'>
                                    </a>    ";
                        }elseif ($qLampu1LB['nilai'] == 0) {
                            echo"<a href='on.php?perangkat=" . $qLampu1LB['perangkat'] . "&id=".$qLampu1LB['id']."'>
                                        <img src='SVG/off/bulb.svg'>
                                    </a>    ";
                        }
                    ?>
                    <br><span>Lampu 1</span>
                </div>
                <div class="col-6 col-sm-3 text-center mb-3">
                    <?php
                        if ($qLampu2LB['nilai'] == 1){
                            echo"<a href='off.php?perangkat=" . $qLampu2LB['perangkat'] . "&id=".$qLampu2LB['id']."'>
                                        <img src='SVG/on/bulb.svg'>
                                    </a>    ";
                        }elseif ($qLampu2LB['nilai'] == 0) {
                            echo"<a href='on.php?perangkat=" . $qLampu2LB['perangkat'] . "&id=".$qLampu2LB['id']."'>
                                        <img src='SVG/off/bulb.svg'>
                                    </a>    ";
                        }
                    ?>
                    <br><span>Lampu 2</span>
                </div>
                <div class="col-6 col-sm-3 text-center mb-3">
                    <?php
                        if ($qLampu3LB['nilai'] == 1){
                            echo"<a href='off.php?perangkat=" . $qLampu3LB['perangkat'] . "&id=".$qLampu3LB['id']."'>
                                        <img src='SVG/on/bulb.svg'>
                                    </a>    ";
                        }elseif ($qLampu3LB['nilai'] == 0) {
                            echo"<a href='on.php?perangkat=" . $qLampu3LB['perangkat'] . "&id=".$qLampu3LB['id']."'>
                                        <img src='SVG/off/bulb.svg'>
                                    </a>    ";
                        }
                    ?>
                    <br><span>Lampu 3</span>
                </div>
                <div class="col-6 col-sm-3 text-center mb-2">
                    <?php
                        if ($qLampu4LB['nilai'] == 1){
                            echo"<a href='off.php?perangkat=" . $qLampu4LB['perangkat'] . "&id=".$qLampu4LB['id']."'>
                                        <img src='SVG/on/bulb.svg'>
                                    </a>    ";
                        }elseif ($qLampu4LB['nilai'] == 0) {
                            echo"<a href='on.php?perangkat=" . $qLampu4LB['perangkat'] . "&id=".$qLampu4LB['id']."'>
                                        <img src='SVG/off/bulb.svg'>
                                    </a>    ";
                        }
                    ?>
                    <br><span>Lampu 4</span>
                </div>
            </div>
            <div class="row ps-md-5">
                <div class="col-6 col-sm-3 text-center mb-2">
                    <?php
                        if ($qACLB1['nilai'] == 1){
                            echo"<a href='off.php?perangkat=" . $qACLB1['perangkat'] . "&id=".$qACLB1['id']."'>
                                        <img src='SVG/on/ac.svg'>
                                    </a>    ";
                        }elseif ($qACLB1['nilai'] == 0) {
                            echo"<a href='on.php?perangkat=" . $qACLB1['perangkat'] . "&id=".$qACLB1['id']."'>
                                        <img src='SVG/off/ac.svg'>
                                    </a>    ";
                        }
                    ?>
                    <br><span>AC 1</span>
                </div>
                <div class="col-6 col-sm-3 text-center mb-2">
                    <?php
                        if ($qACLB2['nilai'] == 1){
                            echo"<a href='off.php?perangkat=" . $qACLB2['perangkat'] . "&id=".$qACLB2['id']."'>
                                        <img src='SVG/on/ac.svg'>
                                    </a>    ";
                        }elseif ($qACLB2['nilai'] == 0) {
                            echo"<a href='on.php?perangkat=" . $qACLB2['perangkat'] . "&id=".$qACLB2['id']."'>
                                        <img src='SVG/off/ac.svg'>
                                    </a>    ";
                        }
                    ?>
                    <br><span>AC 2</span>
                </div>
                <div class="col-6 col-sm-3 text-center mb-2">
                    <?php
                        if ($qLCDB['nilai'] == 1){
                            echo"<a href='off.php?perangkat=" . $qLCDB['perangkat'] . "&id=".$qLCDB['id']."'>
                                        <img src='SVG/on/lcd.svg'>
                                    </a>    ";
                        }elseif ($qLCDB['nilai'] == 0) {
                            echo"<a href='on.php?perangkat=" . $qLCDB['perangkat'] . "&id=".$qLCDB['id']."'>
                                        <img src='SVG/off/lcd.svg'>
                                    </a>    ";
                        }
                    ?>
                    <br><span>LCD</span>
                </div>
            </div>
        </div>
        
        <div class="col-sm-5 pe-0 ps-4 ps-sm-5 ms-3 ms-md-0 mb-3 pt-0">
            <table class="table table-borderless text-white gx-0 mb-3 mb-md-2 float-md-end" style="line-height:15%;">
                <tr>
                    <td>Suhu</td>
                    <td>:</td>
                    <td><?= $qSuhuB['nilai']; ?> °C</td>
                </tr>
                <tr>
                    <td>Kelembapan</td>
                    <td>:</td>
                    <td><?= $qKelembapanB['nilai']; ?> RH</td>
                </tr>
                <tr>
                    <td>Daya</td>
                    <td>:</td>
                    <td><?= $qDayaB['nilai']; ?> Watt</td>
                </tr>
                <tr>
                    <td>Tegangan</td>
                    <td>:</td>
                    <td><?= $qTeganganB['nilai']; ?> Volt</td>
                </tr>
                <tr>
                    <td>Arus</td>
                    <td>:</td>
                    <td><?= $qArusB['nilai']; ?> Ampere</td>
                </tr>
                <tr>
                    <td>Energi</td>
                    <td>:</td>
                    <td><?= $qEnergiB['nilai']; ?> kWh</td>
                </tr>
            </table>
        </div>
    </div>

    <!-- Riwayat Aktivitas -->
    <div class="row text-white mb-1" style="background-color: #01497a;">
        <div class="tb pb-3 mb-1" style="margin-top: 7px;">
            <svg xmlns="http://www.w3.org/2000/svg" height="17" fill="white" class="bi bi-clock-history" viewBox="0 0 16 16" style="vertical-align: text-top">
                <path d="M8.515 1.019A7 7 0 0 0 8 1V0a8 8 0 0 1 .589.022l-.074.997zm2.004.45a7.003 7.003 0 0 0-.985-.299l.219-.976c.383.086.76.2 1.126.342l-.36.933zm1.37.71a7.01 7.01 0 0 0-.439-.27l.493-.87a8.025 8.025 0 0 1 .979.654l-.615.789a6.996 6.996 0 0 0-.418-.302zm1.834 1.79a6.99 6.99 0 0 0-.653-.796l.724-.69c.27.285.52.59.747.91l-.818.576zm.744 1.352a7.08 7.08 0 0 0-.214-.468l.893-.45a7.976 7.976 0 0 1 .45 1.088l-.95.313a7.023 7.023 0 0 0-.179-.483zm.53 2.507a6.991 6.991 0 0 0-.1-1.025l.985-.17c.067.386.106.778.116 1.17l-1 .025zm-.131 1.538c.033-.17.06-.339.081-.51l.993.123a7.957 7.957 0 0 1-.23 1.155l-.964-.267c.046-.165.086-.332.12-.501zm-.952 2.379c.184-.29.346-.594.486-.908l.914.405c-.16.36-.345.706-.555 1.038l-.845-.535zm-.964 1.205c.122-.122.239-.248.35-.378l.758.653a8.073 8.073 0 0 1-.401.432l-.707-.707z"/>
                <path d="M8 1a7 7 0 1 0 4.95 11.95l.707.707A8.001 8.001 0 1 1 8 0v1z"/>
                <path d="M7.5 3a.5.5 0 0 1 .5.5v5.21l3.248 1.856a.5.5 0 0 1-.496.868l-3.5-2A.5.5 0 0 1 7 9V3.5a.5.5 0 0 1 .5-.5z"/>
            </svg>
            <span>Riwayat Aktivitas</span>
        </div>
        <div class="table-responsive px-4 px-md-5">
            <table class="table text-white table-bordered text-center" style="border: 1px solid white;">
                <thead>
                    <th>Waktu</th>
                    <th>Aktivitas</th>
                </thead>
                <tbody>
                    <?php
                        $log = mysqli_query($conn,
                        "   SELECT id, ruang, perangkat, nilai, status_on, status_off, ts AS timestamp, NULL AS     angka, NULL AS aktivitas FROM tb_lampu UNION
                            SELECT id, ruang, perangkat, nilai, status_on, status_off, ts, NULL, NULL FROM tb_kipas UNION
                            SELECT id, ruang, perangkat, nilai, status_on, status_off, ts, NULL, NULL FROM tb_ac UNION
                            SELECT id, ruang, perangkat, nilai, status_on, status_off, ts, NULL, NULL FROM tb_lcd UNION
                            SELECT id, ruang, NULL, nilai, status_on, status_off, ts, NULL, NULL FROM tb_suhu UNION
                            SELECT id, ruang, NULL, nilai, status_on, status_off, ts, NULL, NULL FROM tb_kelembapan UNION
                            SELECT id, ruang, NULL, nilai, status_on, status_off, ts, NULL, NULL FROM tb_daya UNION
                            SELECT id, ruang, NULL, nilai, status_on, status_off, ts, NULL, NULL FROM tb_tegangan UNION
                            SELECT id, ruang, NULL, nilai, status_on, status_off, ts, NULL, NULL FROM tb_arus UNION
                            SELECT id, ruang, NULL, nilai, status_on, status_off, ts, NULL, NULL FROM tb_energi
                            ORDER BY timestamp DESC LIMIT 4
                        ");
                    
                    

                    while ($act = mysqli_fetch_assoc($log)) {
                    ?>
                        <tr>
                            <td style='border: 1px solid;'><?= $act['timestamp'] ?></td>
                            <td style='border: 1px solid;'>
                                <?php
                                    if ($act['nilai'] > 0) {    
                                        echo $act['status_on'];
                                    } elseif ($act['nilai'] == 0) {
                                        echo $act['status_off'];
                                    }
                                ?>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<script src="bs/js/bootstrap.min.js"></script>
</body>
</html>
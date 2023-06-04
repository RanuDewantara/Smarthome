<?php 
    $host = "localhost";
    $user = "root";
    $pw = "";
    $db = "smarthome";

    $conn = mysqli_connect($host, $user, $pw, $db);

    // Lampu Ruang Guru RPL
    $l1 = mysqli_query($conn, "SELECT * FROM tb_lampu WHERE id = 1");
    $qLampu1RG = mysqli_fetch_array($l1, MYSQLI_ASSOC);
    $l2 = mysqli_query($conn, "SELECT * FROM tb_lampu WHERE id = 2");
    $qLampu2RG = mysqli_fetch_array($l2, MYSQLI_ASSOC);

    // Lampu Lab RPL A
    $labA1 = mysqli_query($conn, "SELECT * FROM tb_lampu WHERE id = 3");
    $qLampu1LA = mysqli_fetch_array($labA1, MYSQLI_ASSOC);
    $labA2 = mysqli_query($conn, "SELECT * FROM tb_lampu WHERE id = 4");
    $qLampu2LA = mysqli_fetch_array($labA2, MYSQLI_ASSOC);
    $labA3 = mysqli_query($conn, "SELECT * FROM tb_lampu WHERE id = 5");
    $qLampu3LA = mysqli_fetch_array($labA3, MYSQLI_ASSOC);
    $labA4 = mysqli_query($conn, "SELECT * FROM tb_lampu WHERE id = 6");
    $qLampu4LA = mysqli_fetch_array($labA4, MYSQLI_ASSOC);

    // Lampu Lab RPL B
    $labB1 = mysqli_query($conn, "SELECT * FROM tb_lampu WHERE id = 7");
    $qLampu1LB = mysqli_fetch_array($labB1, MYSQLI_ASSOC);
    $labB2 = mysqli_query($conn, "SELECT * FROM tb_lampu WHERE id = 8");
    $qLampu2LB = mysqli_fetch_array($labB2, MYSQLI_ASSOC);
    $labB3 = mysqli_query($conn, "SELECT * FROM tb_lampu WHERE id = 9");
    $qLampu3LB = mysqli_fetch_array($labB3, MYSQLI_ASSOC);
    $labB4 = mysqli_query($conn, "SELECT * FROM tb_lampu WHERE id = 10");
    $qLampu4LB = mysqli_fetch_array($labB4, MYSQLI_ASSOC);

    // Kipas Ruang Guru
    $k1 = mysqli_query($conn, "SELECT * FROM tb_kipas WHERE id = 1");
    $qKipas1 = mysqli_fetch_array($k1, MYSQLI_ASSOC);
    $k2 = mysqli_query($conn, "SELECT * FROM tb_kipas WHERE id = 2");
    $qKipas2 = mysqli_fetch_array($k2, MYSQLI_ASSOC);

    // AC Lab RPL A
    $acA1 = mysqli_query($conn, "SELECT * FROM tb_ac WHERE id = 1");
    $qACLA1 = mysqli_fetch_array($acA1, MYSQLI_ASSOC);
    $acA2 = mysqli_query($conn, "SELECT * FROM tb_ac WHERE id = 2");
    $qACLA2 = mysqli_fetch_array($acA2, MYSQLI_ASSOC);

    // AC Lab RPL B
    $acB1 = mysqli_query($conn, "SELECT * FROM tb_ac WHERE id = 3");
    $qACLB1 = mysqli_fetch_array($acB1, MYSQLI_ASSOC);
    $acB2 = mysqli_query($conn, "SELECT * FROM tb_ac WHERE id = 4");
    $qACLB2 = mysqli_fetch_array($acB2, MYSQLI_ASSOC);

    // LCD
    $lcdA = mysqli_query($conn, "SELECT * FROM tb_lcd WHERE id = 1");
    $qLCDA = mysqli_fetch_array($lcdA, MYSQLI_ASSOC);
    $lcdB = mysqli_query($conn, "SELECT * FROM tb_lcd WHERE id = 2");
    $qLCDB = mysqli_fetch_array($lcdB, MYSQLI_ASSOC);

    // Suhu
    $suhuRG = mysqli_query($conn, "SELECT * FROM tb_suhu WHERE id = 1");
    $qSuhuRG = mysqli_fetch_assoc($suhuRG);
    $suhuA = mysqli_query($conn, "SELECT * FROM tb_suhu WHERE id = 2");
    $qSuhuA = mysqli_fetch_assoc($suhuA);
    $suhuB = mysqli_query($conn, "SELECT * FROM tb_suhu WHERE id = 3");
    $qSuhuB = mysqli_fetch_assoc($suhuB);

    // Kelembapan
    $kelembapanRG = mysqli_query($conn, "SELECT * FROM tb_kelembapan WHERE id = 1");
    $qKelembapanRG = mysqli_fetch_array($kelembapanRG, MYSQLI_ASSOC);
    $kelembapanA = mysqli_query($conn, "SELECT * FROM tb_kelembapan WHERE id = 2");
    $qKelembapanA = mysqli_fetch_array($kelembapanA, MYSQLI_ASSOC);
    $kelembapanB = mysqli_query($conn, "SELECT * FROM tb_kelembapan WHERE id = 3");
    $qKelembapanB = mysqli_fetch_array($kelembapanB, MYSQLI_ASSOC);

    // Daya
    $dayaRG = mysqli_query($conn, "SELECT * FROM tb_daya WHERE id = 1");
    $qDayaRG = mysqli_fetch_array($dayaRG, MYSQLI_ASSOC);
    $dayaA = mysqli_query($conn, "SELECT * FROM tb_daya WHERE id = 2");
    $qDayaA = mysqli_fetch_array($dayaA, MYSQLI_ASSOC);
    $dayaB = mysqli_query($conn, "SELECT * FROM tb_daya WHERE id = 3");
    $qDayaB = mysqli_fetch_array($dayaB, MYSQLI_ASSOC);

    // Tegangan
    $teganganRG = mysqli_query($conn, "SELECT * FROM tb_tegangan WHERE id = 1");
    $qTeganganRG = mysqli_fetch_array($teganganRG, MYSQLI_ASSOC);
    $teganganA = mysqli_query($conn, "SELECT * FROM tb_tegangan WHERE id = 2");
    $qTeganganA = mysqli_fetch_array($teganganA, MYSQLI_ASSOC);
    $teganganB = mysqli_query($conn, "SELECT * FROM tb_tegangan WHERE id = 3");
    $qTeganganB = mysqli_fetch_array($teganganB, MYSQLI_ASSOC);

    // Arus
    $arusRG = mysqli_query($conn, "SELECT * FROM tb_arus WHERE id = 1");
    $qArusRG = mysqli_fetch_array($arusRG, MYSQLI_ASSOC);
    $arusA = mysqli_query($conn, "SELECT * FROM tb_arus WHERE id = 2");
    $qArusA = mysqli_fetch_array($arusA, MYSQLI_ASSOC);
    $arusB = mysqli_query($conn, "SELECT * FROM tb_arus WHERE id = 3");
    $qArusB = mysqli_fetch_array($arusB, MYSQLI_ASSOC);

    // Energi
    $energiRG = mysqli_query($conn, "SELECT * FROM tb_energi WHERE id = 1");
    $qEnergiRG = mysqli_fetch_array($energiRG, MYSQLI_ASSOC);
    $energiA = mysqli_query($conn, "SELECT * FROM tb_energi WHERE id = 2");
    $qEnergiA = mysqli_fetch_array($energiA, MYSQLI_ASSOC);
    $energiB = mysqli_query($conn, "SELECT * FROM tb_energi WHERE id = 3");
    $qEnergiB = mysqli_fetch_array($energiB, MYSQLI_ASSOC);
?>
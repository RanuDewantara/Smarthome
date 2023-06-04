<?php
    include "koneksi.php";
    if ($_SERVER['REQUEST_METHOD']==='GET') {
        $sql = "SELECT * FROM tb_energi";
        $q = mysqli_query($conn, $sql);
        $array = array();
        while ($data = mysqli_fetch_assoc($q)) {
            $array[]=$data;
        }
        echo json_encode($array);
    }
    else if ($_SERVER['REQUEST_METHOD']==='PUT') {
        $id = $_GET['id'];
        $nilai = $_GET['nilai'];

        $sql = "UPDATE tb_energi SET nilai = '$nilai' WHERE id = '$id'";
        $q = mysqli_query($conn, $sql);

        if ($q) {
            $data = [
                'status' => "Success",
            ];
            echo json_encode([$data]);
        } else {
        $data = [
                'status' => "Failed"
            ];
            echo json_encode([$data]);
        }
        
    }
?>

<?php
    include_once "connect.php";

    $query = $con->prepare("SELECT id, jenis_hewan, deskripsi, image, nama, telp, kelamin FROM adopsi ORDER BY id DESC");

    $query->execute();
    $query->bind_result($id, $tipe, $desc, $image, $nama, $telp, $jk);

    $response = array();
    

    while($query->fetch()){
        $temp = array();
        $temp['id'] = $id;
        $temp['jenis_hewan'] = $tipe;
        $temp['deskripsi'] = $desc;
        $temp['image'] = $image;
        $temp['nama'] = $nama;
        $temp['telp'] = $telp;
        $temp['kelamin'] = $jk;
        array_push($response, $temp);
    }
    echo json_encode($response);

?>
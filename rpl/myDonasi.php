<?php
    include_once "connect.php";
    if($_SERVER['REQUEST_METHOD'] == 'POST'){

    $userID = $_POST['userID'];

    $query = $con->prepare("SELECT id, judul, deskripsi, photo FROM donasi WHERE userID = '".$userID."' ORDER BY id DESC");

    $query->execute();
    $query->bind_result($id, $judul, $desc, $photo);

    $response = array();
    

    while($query->fetch()){
        $temp = array();
        $temp['id'] = $id;
        $temp['judul'] = $judul;
        $temp['deskripsi'] = $desc;
        $temp['photo'] = $photo;
        array_push($response, $temp);
    }
    echo json_encode($response);
    }
?>
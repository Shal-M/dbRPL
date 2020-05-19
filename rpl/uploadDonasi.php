<?php
    include_once "connect.php";
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $judul = $_POST['judul'];
        $image = $_POST['photo'];
        $desc = $_POST['deskripsi'];

        $id = 0;
        $sql = "SELECT id FROM donasi ORDER BY id ASC";
        $res = mysqli_query($con,$sql);

        while($row = mysqli_fetch_array($res)){
            $id = $row['id'];
        }
        $imagePath = "img_donasi/".$id.".JPEG";
        $ServerURL = "http://192.168.100.6/rpl/$imagePath";
        $insert = mysqli_query($con, "INSERT INTO donasi(judul, deskripsi, photo) VALUES ('$judul','$desc','$ServerURL')");
        if($insert){
            file_put_contents($imagePath, base64_decode($image));
            $result["success"] = "1";
            $result["message"] = "success";

            echo json_encode($result);
            mysqli_close($con);
        } else {
            $result["success"] = "0";
            $result["message"] = "error";

            echo json_encode($result);
            mysqli_close($con);
        }
    }
?>
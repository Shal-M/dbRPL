<?php
    include_once "connect.php";
    if($_SERVER['REQUEST_METHOD'] == 'POST'){

        $nama = $_POST['nama'];
        $tipe = $_POST['jenis_hewan'];
        $kelamin = $_POST['kelamin'];
        $desc = $_POST['deskripsi'];
        $telp = $_POST['telp'];
        $image = $_POST['image'];


        $sql ="SELECT id FROM adopsi ORDER BY id ASC";
        $res = mysqli_query($con,$sql);

        $id = 0;

        while($row = mysqli_fetch_array($res)){
                $id = $row['id'];
        }

        $imagePath = "img_adopsi/$id.JPEG";
        $ServerURL = "http://192.168.100.6/rpl/$imagePath";
        $insertSQL = mysqli_query($con,"Insert Into adopsi(image, nama, jenis_hewan, kelamin, telp, deskripsi) values ('$ServerURL', '$nama', '$tipe', '$kelamin', '$telp', '$desc')");
        

        if($insertSQL){
            file_put_contents($imagePath,base64_decode($image));
            $result["success"] = "1";
            $result["message"] = "success";

            echo json_encode($result);
            mysqli_close($con);
        }else {
            $result["success"] = "0";
            $result["message"] = "error";
    
            echo json_encode($result);
            mysqli_close($con);
        }
    }else{
        echo "Not Uploaded";
    }
?>
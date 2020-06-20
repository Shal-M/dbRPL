<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $nama = $_GET['username'];
    $email = $_GET['email'];
    $id = $_GET['id'];


    require_once 'connect.php';

    $query = mysqli_query($con, "UPDATE user SET username='$nama', email='$email' WHERE id = '$id'");
    if($query){
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
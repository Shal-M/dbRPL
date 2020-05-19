<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $nama = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $password = password_hash($password, PASSWORD_DEFAULT);

    require_once 'connect.php';

    $sql = "INSERT INTO user (username, email, password) VALUES ('$nama', '$email', '$password')";
    if(mysqli_query($con, $sql)){
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
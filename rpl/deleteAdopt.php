<?php

require_once('connect.php');
$id = $_GET['id'];
if(!$id){
  echo json_encode(array('message'=>'required field is empty'));
}else{

$query = mysqli_query($con, "DELETE FROM adopsi WHERE id='$id'");
if($query){
    echo json_encode(array('message'=>'data successfully deleted.'));
  }else{
    echo json_encode(array('message'=>'data failed to delete.'));
  }
}
?>
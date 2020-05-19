<?php
	include_once "connect.php";

	  class usr{}
	
	  $email = $_POST["email"];
	  $password = $_POST['password'];
	
	  if ((empty($email)) || (empty($password))) { 
	  	$response = new usr();
	  	$response->success = 0;
	  	$response->message = "Kolom tidak boleh kosong"; 
	  	die(json_encode($response));
	  }
	
	  $query = mysqli_query($con, "SELECT * FROM user WHERE email='$email'");
	  $result = array();
	  $result['login'] = array();
	  $row = mysqli_fetch_array($query);
	  
	
	  if (!empty($row) and password_verify($password,$row['password'])){
		  $index['username'] = $row['username'];
		  $index['email'] = $row['email'];

		  array_push($result['login'], $index);

		  $result['success'] = "1";
		  $result['message'] = "success";

		  echo json_encode($result);
		
	  } else { 
	  	$response = new usr();
	  	$response->success = 0;
	  	$response->message = "Username atau password salah";
	  	die(json_encode($response));
	  }
	
	  mysqli_close($con);
?>
<?php
	require_once 'config.php';

	$user_id=$_POST['user_id'];
	//$user_password = $_POST['user_password'];

	$query = "SELECT * FROM tb_user WHERE user_id='".$user_id."'";
	$result = mysqli_query($conn, $query);
	$array = array();
	
	while($row = mysqli_fetch_assoc($result)){
		$array[] = $row;
	}

	if(sizeof($array)>0){
	    json_encode(array('kode' =>1,'result'=>$array));
	} else {
	    json_encode(array('kode' =>2,'result' =>'Data tidak ditemukan'));
	}
?>
<?php
	require_once 'config.php';

    //id
    $user_name      = "Zein";
    $user_email     = "m.fadli.zein.17@gmail.com";
    $user_password  = "123456";
    //image
    //user_date
    $user_asal      = "Padang";
    $user_xp        = "1";
    $query = "INSERT INTO tb_user(user_id, user_name, user_email, user_password, user_image, user_date, user_asal, user_xp) VALUES(NULL, '".$user_name."', '".$user_email."', '".$user_password."', NULL, NULL, '".$user_asal."', '".$user_xp."' );";

    $exeQuery = mysqli_query($conn, $query);

    echo ($exeQuery) ?
    json_encode(array('kode' => 1,'pesan' => 'Sudah Terdafter')) :
    json_encode(array('kode' => 2,'pesan' => 'Gagal Daftar'));

?>
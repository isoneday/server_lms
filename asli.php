<?php 
 

	//importing dbDetails file
	define('HOST','localhost');
	define('USER','root');
	define('PASS','');
	define('DB','db_lms');
     
     //connection to database 
     $con = mysqli_connect(HOST,USER,PASS,DB) or die('Unable to Connect...');
     
     //sql query to fetch all images 
     $sql = "SELECT * FROM tb_materi";
     
     //getting images 
     $result = mysqli_query($con,$sql);
     
     //response array 
     $response = array(); 
     $response['sukses'] = true; 
     $response['images'] = array(); 
     
     //traversing through all the rows 
     while($row = mysqli_fetch_array($result)){
         $temp = array(); 
         $temp['materi_id']=$row['materi_id'];
         $temp['materi_nama']=$row['materi_nama'];
         $temp['materi_deskripsi']=$row['materi_deskripsi'];
         $temp['materi_jml_siswa']=$row['materi_jml_siswa'];
         $temp['materi_platform']=$row['materi_platform'];
         $temp['materi_gambar']=$row['materi_gambar'];
         $temp['jenis_kelas_id']=$row['jenis_kelas_id'];
         $temp['materi_harga']=$row['materi_harga'];
         $temp['materi_diskon']=$row['materi_diskon'];
         $temp['materi_xp']=$row['materi_xp'];
         $temp['materi_rating']=$row['materi_rating'];
         $temp['materi_jml_modul']=$row['materi_jml_modul'];
         $temp['mitra_id']=$row['mitra_id'];

	//$sql_count = "SELECT materi_id FROM tb_belajar WHERE materi_id='".$temp['materi_id']."'";
	$sql_count = "SELECT count(materi_id) as total from tb_belajar WHERE materi_id='".$temp['materi_id']."'";
     $result1 = mysqli_query($con,$sql_count);
         $data= mysqli_fetch_array($result1);
	//count($result1);
	$temp['student'] = $data;
         
         array_push($response['images'],$temp);
     }
     //displaying the response 
     echo json_encode($response);
<?php
include "../../../fungsi/koneksi.php";
$user =$_POST['username'];
$password = $_POST['password'];
$level= $_POST['hak_level'];
$id = $_POST['Id'];
$iduser = $_POST['id_user'];

$q = "INSERT INTO user (
	   
	   Id,
	   username,
	   password,
	   hak_level,
	   id_user
	  ) VALUES(
	  '".$id."',
	  '".$user."', 
	  '".$password."', 
	  '".$level."',
	  '".$iduser."')";

if (mysqli_query($connect,$q)){
	echo "<script>alert('Berhasil'); window.location = '../grid_user'</script>";	
} else {
	echo "<script>alert('Gagal'); window.location = '../form_user'</script>";	
}

?>
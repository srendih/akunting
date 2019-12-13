<?php
session_start();
include "koneksi.php";
$username= $_POST['username'];
$password= $_POST['password'];

$sql = mysqli_query($connect, "SELECT * FROM user WHERE username = '$username' AND password='$password'");
$row=mysqli_fetch_array($sql);
if ($row['username'] == $username AND $row['password'] == $password)
{

  $_SESSION['username'] = $row['username'];
  $_SESSION['Id'] = $row['Id'];
  $_SESSION['hak_level'] = $row['hak_level'];
  echo "<script>alert('Selamat datang $username'); window.location ='../module/master/dashboard';</script>";

}else{

	?>
    <script language="javascript">
	alert("Username atau Password tidak sesuai. Silahkan ulang kembali!");
	document.location='../';
	</script>
    <?php
	}
?>

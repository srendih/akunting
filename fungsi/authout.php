<?php
session_start();

$_SESSION['username']='';
$_SESSION['level']='';
$_SESSION['Id']='';

unset($_SESSION['level']);
unset($_SESSION['username']);
unset($_SESSION['Id']);
session_unset();
session_destroy();
?>
<script language="javascript">
	alert("Anda Telah Log Out");
	document.location='../';
	</script>
<?php
include "../../../fungsi/koneksi.php";
$id =$_POST['Id'];
$cust_id = $_POST['id_cust'];
$no= $_POST['no'];
$noinv = $_POST['no_inv'];
$idstatus = $_POST['status'];
$nominalInv =$_POST['nominal_inv'];
$transport = $_POST['transport'];
$ppn= $_POST['ppn'];
$termin = $_POST['termin'];
$totalInv = $_POST['total_inv'];
$idsales = $_POST['sales_id'];
$tglInv= $_POST['tgl_inv'];
$ket = $_POST['ket'];
$tglterima = $_POST['tgl_terima'];
$kode = $_POST['kode'];
$proyek= $_POST['proyek'];
$m_inv = date('F/Y', strtotime($tglInv));
$tanggal = date("Y-m-d");
$tglTempo = date('Y-m-d', strtotime("+$termin days", strtotime($tglterima)));


//query for update data in database
 $query = "UPDATE invoice SET cust_id='$cust_id', no='$no', no_inv='$noinv', id_status='$idstatus', nominal_inv='$nominalInv', transport='$transport', nilai_ppn='$ppn', total_inv='$totalInv', sisa_bayar='$totalInv', tgl_inv='$tglInv', proyek='$proyek', kode='$kode', tgl_terima='$tglterima', tgl_tempo='$tglTempo',
 bulan_inv='$m_inv', id_sales='$idsales', ket='$ket', tgl_input='$tanggal'
  WHERE id = '$id'";
  
 $hasil = mysqli_query($connect,$query);
 //see the result

if ($hasil){
	echo "<script>alert('Berhasil!'); window.location = '../grid_invoice'</script>";	
} else {
	echo "<script>alert('Gagal!'); window.location = '../form_invoice'</script>";	
}

?>
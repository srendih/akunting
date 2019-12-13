<?php
include "../../../fungsi/koneksi.php";
$id_inv =$_POST['Id_inv'];
$sisabayar = $_POST['sisa_bayar'];
$sisabayar1 = $_POST['sisa_bayar1'];
$bayar = $_POST['bayar_inv'];
$id_bayar = $_POST['id_bayar'];
$diskonpph = $_POST['diskon_pph'];
$totalbayar = $_POST['total_bayar'];
$totalbayar1 = $_POST['total_bayar1'];
$tglbayar = $_POST['tgl_bayar'];
$status = $_POST['nama_status'];
$carabayar = $_POST['cara_bayar'];
$bayar1 = $_POST['bayar_inv1'];
$pphwapu = $_POST['pph_wapu'];
$idpembayaran = $_POST['idpembayaran'];
$pph = $_POST['pph'];

$m_inv = date('F/Y', strtotime($tglbayar));
// $totalPembayaran = round($totalbayar1+$totalbayar);

$queriinvoice = mysqli_query($connect, "SELECT * FROM invoice WHERE id='$id_inv'");
$tmpilinv = mysqli_fetch_array($queriinvoice);
$sisainvoice = $tmpilinv['sisa_bayar'];
$hasilbayar = round($sisainvoice+$totalbayar1);
$hasilsisabayar = round($hasilbayar-$totalbayar);


$q = "UPDATE pembayaran SET bayar='$bayar', diskon_pph='$diskonpph', total_bayar='$totalbayar', cara_bayar='$carabayar', pph_wapu='$pphwapu', pph='$pph', m_byr='$m_inv'
WHERE Id = '$idpembayaran'";

//query for update data in database
$query = "UPDATE invoice SET sisa_bayar='$hasilsisabayar'
WHERE id = '$id_inv'";

$hasil = mysqli_query($connect, $q);
$hasil = mysqli_query($connect, $query);
 //see the result

if ($hasil){
	echo "<script>alert('Berhasil!'); window.location = '../grid_edit_invoice_pembayaran'</script>";	
} else {
	echo "<script>alert('Gagal!'.); window.location = '../grid_edit_invoice_pembayaran'</script>";	
}

?>
<?php 
if(isset($_POST) && !empty($_POST)) {
	include('library/phpqrcode/qrlib.php'); 
	$codesDir = "./codes";	
	$codeFile = date('d-m-Y-h-i-s').'.png';
	$formData = $_POST['formData'];
	// $cid = $_POST['cid'];
	// $scode = $_POST['scode'];
	// $ctime = $_POST['ctime'];
	// $section = $_POST['section'];
	// generating QR code
	QRcode::png($formData,$codesDir.$codeFile,$_POST['ecc'],$_POST['size']); 
	// display generated QR code
	echo '<img class="img-thumbnail" src="'.$codesDir.$codeFile.'" />';
} else {

}
?>
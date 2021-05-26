<?php 
include 'header.php';
$cek = MaxNormal();
$mCek = MinNormal();
foreach ($cek as $key => $value) {
	echo $value['nilai'];
}

foreach ($mCek as $key => $value) {
	echo $value['nilai']."-";
}
?>
<?php 
include 'header.php';
$kt = getKriteria();
foreach ($kt as $key => $value) {
	if($value['atribut'] == "Cost"){
		echo "COST!<br>";
	} else {
		echo "Bukan COST!<br>";
	}
}
?>
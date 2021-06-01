<?php 

function getAlternatif(){
	$query = "SELECT * FROM alternatif ORDER BY id";
	$result	= mysqli_query($GLOBALS['conn'], $query);
	if (!$result) {
		echo "Error koneksi database!!!";
		exit();
	}
	return $result;
}

function getKriteria(){
	$query = "SELECT * FROM kriteria ORDER BY id";
	$result	= mysqli_query($GLOBALS['conn'], $query);
	if (!$result) {
		echo "Error koneksi database!!!";
		exit();
	}
	return $result;
}

function getKriteriaNilai($id){
	$query = "SELECT id_alter, id_kriteria, nama, nilai, pangkat, atribut FROM topsis JOIN kriteria WHERE id_kriteria = kriteria.id AND id_alter = '$id' GROUP BY id_kriteria";
	$result	= mysqli_query($GLOBALS['conn'], $query);
	return $result;
}

function getValueKritNilai($id){
	$query = "SELECT id_kriteria, nama, nilai FROM topsis JOIN kriteria WHERE id_kriteria = kriteria.id AND id_alter = '$id' ";
	$result = mysqli_query($GLOBALS['conn'], $query);
	if(mysqli_num_rows($result)> 0){
		return "Data Sudah Ada!!!";
	}
}

function getPangkat($id){
	$arr = array();
	$result = getKriteriaNilai($id);
	foreach ($result as $value) {
		array_push($arr, $value['pangkat']);
	}
	return $arr;
}

function insertNormalisasi($id_a, $id_k, $result)
{
	$cek = "SELECT * FROM normalisasi WHERE id_alternatif = '$id_a' AND id_kriteria = '$id_k'";
	$cekResult = mysqli_query($GLOBALS['conn'], $cek);
	if(!mysqli_num_rows($cekResult)>0){
		$query = "INSERT INTO normalisasi (id_alternatif, id_kriteria, nilai) VALUES ('$id_a', '$id_k', '$result')";
		$result = mysqli_query($GLOBALS['conn'], $query);
		if(!$result){
			echo "Data Gagal Dimasukkan!";
		}
	} else {
		$query = "UPDATE normalisasi SET id_alternatif='$id_a', id_kriteria='$id_k', nilai='$result' WHERE id_alternatif=$id_a AND id_kriteria=$id_k";
		$result = mysqli_query($GLOBALS['conn'], $query);
		if(!$result){
			echo "Data Gagal Diupdate!";
		}
	}
}

function getNormalisasiData($id)
{
	$query = "SELECT * FROM normalisasi WHERE id_alternatif = '$id'";
	$result = mysqli_query($GLOBALS['conn'], $query);
	return $result;
}

function getDataMax($id){
	$query = "SELECT id_kriteria, nilai, atribut FROM `normalisasi` JOIN kriteria ON id_kriteria = kriteria.id 
				WHERE (`id_kriteria`, `nilai`) IN ( 
				    SELECT `id_kriteria`, MAX(`nilai`) as `nilai` FROM `normalisasi` WHERE id_kriteria='$id' GROUP BY `id_kriteria`
				) ORDER BY id_kriteria";
	$result = mysqli_query($GLOBALS['conn'], $query);
	foreach ($result as $key => $value) {
		$arr = $value['nilai'];
	}
	return $arr;
}

function getDataMin($id){
	$query = "SELECT id_kriteria, nilai, atribut FROM `normalisasi` JOIN kriteria ON id_kriteria = kriteria.id 
				WHERE (`id_kriteria`, `nilai`) IN ( 
				    SELECT `id_kriteria`, MIN(`nilai`) as `nilai` FROM `normalisasi` WHERE id_kriteria='$id' GROUP BY `id_kriteria`
				) ORDER BY id_kriteria";
	$result = mysqli_query($GLOBALS['conn'], $query);
	foreach ($result as $key => $value) {
		$arr = $value['nilai'];
	}
	return $arr;
}

function insertSolusi($id_a, $id_k, $result)
{
	$cek = "SELECT * FROM normalisasi WHERE id_alternatif = '$id_a' AND id_kriteria = '$id_k'";
	$cekResult = mysqli_query($GLOBALS['conn'], $cek);
	if(!mysqli_num_rows($cekResult)>0){
		$query = "INSERT INTO normalisasi (id_alternatif, id_kriteria, nilai) VALUES ('$id_a', '$id_k', '$result')";
		$result = mysqli_query($GLOBALS['conn'], $query);
		if(!$result){
			echo "Data Gagal Dimasukkan!";
		}
	} else {
		$query = "UPDATE normalisasi SET id_alternatif='$id_a', id_kriteria='$id_k', nilai='$result' WHERE id_alternatif=$id_a AND id_kriteria=$id_k";
		$result = mysqli_query($GLOBALS['conn'], $query);
		if(!$result){
			echo "Data Gagal Diupdate!";
		}
	}
}

function tambahDataTopsis($ida, $idk, $n, $conn){
	$pgkt = $n*$n;
	$query = "INSERT INTO topsis (id_alter, id_kriteria, nilai, pangkat) VALUES ('$ida', '$idk', '$n', '$pgkt')";
	$result = mysqli_query($conn, $query);
	if(!$result){
		echo "Menambah Data Kriteria Gagal!!!";
		exit();
	}
}

function HitungNormal(){
	$sum = array();
	$alternatif = getAlternatif();
	foreach ($alternatif as $k => $v) {
		$nilai = getPangkat($v['id']);
		foreach ($nilai as $key => $value) {
			$sum[$key] = isset($sum[$key]) ? $sum[$key] += $value : $sum[$key] = $value;
		}
	}
	return $sum;
}

function MaxNormal(){
	$query = "SELECT id_kriteria, `nilai` FROM `normalisasi` WHERE (`id_kriteria`, `nilai`) 
				IN ( SELECT `id_kriteria`, MAX(`nilai`) as `nilai` FROM `normalisasi` GROUP BY `id_kriteria`) ORDER BY id_kriteria";
	$result = mysqli_query($GLOBALS['conn'], $query);
	return $result;
}

function MinNormal(){
	$query = "SELECT id_kriteria, `nilai` FROM `normalisasi` WHERE (`id_kriteria`, `nilai`) 
				IN ( SELECT `id_kriteria`, MIN(`nilai`) as `nilai` FROM `normalisasi` GROUP BY `id_kriteria`) ORDER BY id_kriteria";
	$result = mysqli_query($GLOBALS['conn'], $query);
	return $result;
}

function squareRoot(){
	$sqrt = array();
	$total = HitungNormal();
	foreach ($total as $key => $value) {
		array_push($sqrt, sqrt($value));
	}
	return $sqrt;
}

function insertSPlus($id_a, $nilai){
	$cek = "SELECT * FROM topsis_rank WHERE id_alternatif = $id_a";
	$result = mysqli_query($GLOBALS['conn'], $cek);
	if (!mysqli_num_rows($result)>0) {
		$query = "INSERT INTO topsis_rank (id_alternatif, max) VALUES ('$id_a', '$nilai')";
		$result = mysqli_query($GLOBALS['conn'], $query);
		if (!$result) {
			echo "Data Gagal Dimasukkan";
		}
	}
	else {
		$query = "UPDATE topsis_rank SET id_alternatif = $id_a, max = $nilai WHERE id_alternatif = '$id_a'";
		$result = mysqli_query($GLOBALS['conn'], $query);
		if (!$result) {
			echo "Data Gagal DiUpdate";
		}
	}
}

function insertSMin($id_a, $nilai){
	$cek = "SELECT * FROM topsis_rank WHERE id_alternatif = $id_a";
	$result = mysqli_query($GLOBALS['conn'], $cek);
	if (!mysqli_num_rows($result)>0) {
		$query = "INSERT INTO topsis_rank (id_alternatif, min) VALUES ('$id_a', '$nilai')";
		$result = mysqli_query($GLOBALS['conn'], $query);
		if (!$result) {
			echo "Data Gagal Dimasukkan";
		}
	}
	else {
		$query = "UPDATE topsis_rank SET id_alternatif = $id_a, min = $nilai WHERE id_alternatif = '$id_a'";
		$result = mysqli_query($GLOBALS['conn'], $query);
		if (!$result) {
			echo "Data Gagal DiUpdate";
		}
	}
}

function hitungSolusi(){
	$arr = array();
	$hasil = 0;
	$solusi = "SELECT max, min FROM topsis_rank";
	$result = mysqli_query($GLOBALS['conn'], $solusi);
	foreach ($result as $key => $value) {
		$hasil = $value['min'] / ($value['max'] + $value['min']);
		array_push($arr, $hasil);
	}
	return $arr;
}

?>
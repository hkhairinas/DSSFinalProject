<?php 
include '../header.php';
$a = $_GET['a'];
$cek = getValueKritNilai(getAlternatifID($a-1));
if(isset($_POST['submit'])){
	$id_alter = $_POST['id_alter'];
	$id_kriteria = $_POST['id_kriteria'];
	$nilai = $_POST['nilai'];
	$a = $_POST['id'];
	foreach ($id_kriteria as $key => $val) {
		tambahDataTopsis($id_alter, $val, $nilai[$key], $koneksi);
	}
	header("Location: nilai_alternatif.php?a=$a");
}
if(!empty($cek)){ ?>
	<section class="content">
		<div class="ui card">
			<div class="content">
				<h3 class="header" style="font-color:red;"><?= $cek; ?></h3>
				<a href="nilai_alternatif.php?a=<?= ($a) ?>" class="ui blue left labeled icon button"><i class="right info icon"></i> Cek</a>
			</div>
			<div class="extra content">
				<button class="ui left labeled icon button teal" onclick="history.back()"><i class="angle left icon"></i> Kembali</button>
			</div>
		</div>
	</section>
<?php } else { ?>
<section class="content">
	<div class="ui card">
		<div class="content">
			<h2 class="header">Tambah Nilai Alternatif &rarr; <?= getAlternatifNama($a-1) ?></h2>
		</div>

		<div class="content">
			<form action="<?= base_url("topsis/tambah_nilai.php") ?>" class="ui form" method="POST" >
				<input type="hidden" name="id_alter" value="<?= getAlternatifID($a-1) ?>">
				<input type="hidden" name="id" value="<?= $a ?>">
				<table class="ui celled selectable collapsing table">
					<thead>
						<tr>
							<th>Kriteria</th>
							<th>Nilai</th>
						</tr>
					</thead>
					<tbody>
						<?php 
							$result = getKriteria();
							foreach ($result as $value) {
						?>
						<tr>
							<input type="hidden" name="id_kriteria[]" value="<?= $value['id'] ?>">
							<td><?= $value['nama'] ?></td>
							<td><input type="text" name="nilai[]"></td>
						</tr>
						<?php } ?>
					</tbody>
				</table>
		</div>
		
		<div class="extra content">
			<input type="submit" name="submit" value="Submit" class="ui button">
			</form>	
		</div>
	
	</div>
</section>
<?php } ?>

<?php include '../footer.php'; ?>
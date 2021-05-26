<?php
include '../header.php';
$a = $_GET['a'];
?>

<section class="content">
	<div class="ui fluid card">
		<div class="content">
			<h2 class="header">Nilai Alternatif &rarr; <?= getAlternatifNama($a-1) ?></h2>
		</div>
		<div class="content">
			<table class="ui celled selectable table">
				<thead>
					<tr>
						<th>Alternatif</th>
						<th>Nilai</th>
					</tr>
				</thead>
				<tbody>
					<?php
						$result =  getKriteriaNilai(getAlternatifID($a-1));
						foreach ($result as $value) {
					?>
					<tr>
						<td><?= $value['nama'] ?></td>
						<td><?= $value['nilai'] ?></td>
					</tr>
					<?php } ?>
				</tbody>
			</table>
		</div>
		<div class="extra content">
			<form method="post" action="nilai_alternatif.php">
				<?php 
					if(isset($_SESSION['id_alter'])){
						$id = $_SESSION['id_alter'];	
					} else {
						$id = getAlternatifID($a-1); 
					}
				?>
				<input type="hidden" name="id" value="<?= $id; ?>">
				<button type="submit" name="edit" class="ui mini teal left labeled icon button" onclick="return confirm('Yakin akan Mengedit Data <?= getAlternatifNama($a-1) ?> ?')"><i class="right edit icon"></i>EDIT</button>
				<button type="submit" name="delete" class="ui mini red left labeled icon button" onclick="return confirm('Yakin Akan Menghapus Data <?= getAlternatifNama($a-1) ?> ?')"><i class="right remove icon"></i>DELETE</button>
			</form>
			<a href="<?php echo "tambah_nilai.php?a=".($a + 1)?>">
			<button class="ui right labeled icon button" style="float: right;">
				<i class="right arrow icon"></i>
				Lanjut
			</button>
			</a>
	</div>
</section>
<?php include '../footer.php'; ?>
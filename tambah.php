<?php
	include('config.php');
	include('fungsi.php');

	// mendapatkan data edit
	if(isset($_GET['jenis'])) {
		$jenis	= $_GET['jenis'];
	}

	if (isset($_POST['tambah'])) {
		$jenis	= $_POST['jenis'];
		$nama 	= $_POST['nama'];
		if(isset($_POST['atribut'])){
			tambahDataKt($jenis,$nama, $_POST['atribut']);
		}
		else {
			tambahData($jenis,$nama);
		}
		header('Location: '.$jenis.'.php');
	}

	include('header.php');
?>

<section class="content">
	<div class="ui fluid card">
		<div class="content">
			<h2 class="header">Tambah <?php echo $jenis?></h2>
		</div>
		<div class="content">
			<form class="ui form" method="post" action="tambah.php">
			<div class="two field">
				<div class="inline field">
					<label>Nama <?php echo $jenis ?></label>
					<input type="text" name="nama" placeholder="<?php echo $jenis?> baru">
					<input type="hidden" name="jenis" value="<?php echo $jenis?>">
				</div>
				<div class="inline field">
					<?php if($jenis == 'kriteria')
					{
						echo "<label>Atribut ".$jenis."</label> 
						<select name='atribut' class='ui selection dropdown'>
						    <i class='dropdown icon'></i>
						    <option value='1'>Cost</option>
						    <option value='2'>Benefit</option>
						</select>";
					}
					?>
				</div>
			</div>
		</div>
		<div class="extra content">
				<input class="ui green button" type="submit" name="tambah" value="SIMPAN">
			</form>
		</div>
	</div>
</section>

<?php include('footer.php'); ?>
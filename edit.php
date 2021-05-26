<?php
	include('config.php');
	include('fungsi.php');

	// mendapatkan data edit
	if(isset($_GET['jenis']) && isset($_GET['id'])) {
		$id 	= $_GET['id'];
		$jenis	= $_GET['jenis'];

		// hapus record
		$query 	= "SELECT nama FROM $jenis WHERE id=$id";
		$result	= mysqli_query($koneksi, $query);
		
		while ($row = mysqli_fetch_array($result)) {
			$nama = $row['nama'];
		}
	}

	if (isset($_POST['update'])) {
		$id 	= $_POST['id'];
		$jenis	= $_POST['jenis'];
		$nama 	= $_POST['nama'];
		if(isset($_POST['atribut'])){
			$atribut = $_POST['atribut'];
			$query 	= "UPDATE $jenis SET nama='$nama', atribut='$atribut' WHERE id=$id";
			$result	= mysqli_query($koneksi, $query);
		} else {
			$query 	= "UPDATE $jenis SET nama='$nama' WHERE id=$id";
			$result	= mysqli_query($koneksi, $query);
		}

		if (!$result) {
			echo "Update gagal";
			exit();
		} else {
			header('Location: '.$jenis.'.php');
			exit();
		}
	}

	include('header.php');
?>

<section class="content">
	<div class="ui fluid card">
		<div class="content">
			<h2 class="header">Edit <?php echo $jenis?></h2>
		</div>
		<div class="content">
			<form class="ui form" method="post" action="edit.php">
			<div class="two field">
				<div class="inline field">
					<label>Nama <?php echo $jenis ?></label>
					<input type="text" name="nama" value="<?php echo $nama?>">
				</div>
				<div class="inline field">
					<?php if($jenis == 'kriteria')
					{
						echo "<label>Atribut ".$jenis."</label> 
						<select name='atribut' class='ui selection dropdown'>
						    <i class='dropdown icon'></i>
						    <option value='1'> Cost </option>
						    <option value='2'>Benefit</option>
						</select>";
					}
					?>
				</div>
				<input type="hidden" name="id" value="<?php echo $id?>">
				<input type="hidden" name="jenis" value="<?php echo $jenis?>">
			</div>
		</div>
		<div class="extra content">
				<input class="ui green button" type="submit" name="update" value="UPDATE">
			</form>
		</div>
	</div>
</section>

<?php include('footer.php'); ?>
<?php 
	require_once 'settings.php';
	require_once 'config.php';
	require_once 'fungsi.php';
	require_once 'model/topsis.php';
	$GLOBALS['conn'] = $koneksi;
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>SPK Metode AHP x TOPSIS</title>
	<!-- css -->
	<link rel="stylesheet" type="text/css" href="<?= base_url("assets/css/style.css")?>">
	<link rel="stylesheet" type="text/css" href="<?= base_url("assets/css/w3.css")?>">
	<link rel="stylesheet" type="text/css" href="<?= base_url("assets/semantic/dist/semantic.min.css")?>">
	<!-- javascript -->
	<script type="text/javascript" src="<?= base_url("assets/jquery-3.6.0.min.js")?>"></script>
	<script type="text/javascript" src="<?= base_url("assets/semantic/dist/semantic.min.js")?>"></script>
</head>

<body>
<header>
	<h1>AHP x TOPSIS</h1>
</header>
<div class="wrapper">
	<nav id="navigation" role="navigation">
		<ul>
			<li><a class="item" href="<?= base_url("index.php")?>">Home</a></li>
			<li>
				<a class="item" href="<?= base_url("kriteria.php")?>">Kriteria
					<div class="ui blue tiny label" style="float: right;"><?php echo getJumlahKriteria(); ?></div>
				</a>
			</li>
			<li>
				<a class="item" href="<?= base_url("alternatif.php")?>">Alternatif
					<div class="ui blue tiny label" style="float: right;"><?php echo getJumlahAlternatif(); ?></div>
				</a>
			</li>
			<li>
				<div class="ui left pointing dropdown link item">
					<a href="#" class="item">Metode AHP <i class="dropdown icon"></i></a>
					<div class="menu">
					<a class="item" href="<?= base_url("bobot_kriteria.php")?>">Perbandingan Kriteria</a>
					<div class="ui left pointing dropdown item">
					    Perbandingan Alternatif <i class="dropdown icon"></i>
					    <div class="menu">
				    	<?php
							if (getJumlahKriteria() > 0) {
								for ($i=0; $i <= (getJumlahKriteria()-1); $i++) { 
									echo "<a class='item' href='".base_url('bobot.php?c='.($i+1).'')."'>".getKriteriaNama($i)."</a>";
								}
							}
						?>
					    </div>
					</div>
					<a class="item" href="<?= base_url("hasil.php")?>">Hasil</a>
					</div>
				</div>
			</li>
			<li>
				<div class="ui left pointing dropdown link item">
					<a href="#">Metode TOPSIS <i class="dropdown icon"></i></a>
					<div class="menu">
						<div class="ui left pointing dropdown item">
							Nilai Alternatif <i class="dropdown icon"></i>
							<div class="menu">
							<?php 
								$get = getJumlahAlternatif();
								if($get > 0){
									for ($i=0; $i <= $get-1; $i++) {
										echo "<a class='item' href='".base_url('topsis/nilai_alternatif.php?a='.($i+1).'')."'>".getAlternatifNama($i)."</a>";
									}
								}
							?>
							</div>
						</div>
						<div class="ui left pointing dropdown item">
							Tambah Nilai Alternatif <i class="dropdown icon"></i>
							<div class="menu">
							<?php 
								$get = getJumlahAlternatif();
								if($get > 0){
									for ($i=0; $i <= $get-1; $i++) {
										echo "<a class='item' href='".base_url('topsis/tambah_nilai.php?a='.($i+1).'')."'>".getAlternatifNama($i)."</a>";
									}
								}
							?>
							</div>
						</div>
						<a href="<?= base_url("topsis/normalisasi.php")?>" class="item">Normalisasi</a>
					</div>
				</div>
			</li>
			<li><a class="item" href="<?= base_url("topsis/result.php")?>">Hasil AHP x TOPSIS</a></li>
		</ul>
	</nav>
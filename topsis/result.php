<?php 
include '../header.php';
$al = getAlternatif();
$kt = getKriteria();
?>

<section class="content">
	<div class="ui fluid card">
		<div class="content">
			<h3 class="header">Hasil AHP x TOPSIS</h3>
		</div>
		<div class="content">
			<div class="ui right aligned grid">

				<div class="center aligned sixteen wide column">
					<h4 class="sub header center aligned">Normalisasi Terbobot</h4>
					<?php include 'normalisasi/normal_terbobot.php' ?>	
				</div>

				<div class="center aligned two column row">
					<div class="column">
						<h4 class="sub header center aligned">Solusi Ideal Positif</h4>
						<?php include 'result/a_plus.php' ?>
					</div>
					<div class="column">
						<h4 class="sub header center aligned">Solusi Ideal Negatif</h4>
						<?php include 'result/a_min.php'; ?>
					</div>
				</div>

				<div class="sixteen wide column">
					<h4 class="sub header center aligned">Nilai Alternatif Positif(Si+)</h4>
					<?php include 'result/d_plus.php' ?>
				</div>

				<div class="sixteen wide column">
					<h4 class="sub header center aligned">Nilai Alternatif Negatif(Si-)</h4>
					<?php include 'result/d_min.php'; ?>
				</div>

				<div class="sixteen wide column">
					<div class="ui fluid card">
						<div class="content center aligned">
							<h3>HASILNYA</h3> <hr>
							<?php include 'result/hasil.php';  ?>
						</div>
					</div>
				</div>

			</div>
		</div>
	</div>
</section>

<?php include '../footer.php'; ?>
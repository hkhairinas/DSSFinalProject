<?php 
include '../header.php';
$al = getAlternatif();
$kt = getKriteria();
?>

<section class="content">
	<div class="ui fluid card">
		<div class="content">
			<h3 class="header">Normalisasi</h3>
		</div>
		<div class="content">
			<div class="ui right aligned grid">

				<div class="sixteen wide column">
					<table class="ui celled selectable center aligned table">
						<thead>
							<tr>
								<th rowspan="2">Alternatif</th>
								<th colspan="<?= getJumlahKriteria() ?>">Kriteria</th>
							</tr>
							<tr>
								<?php foreach ($kt as $key => $value): ?>
									<th><?= $value['nama'] ?></th>
								<?php endforeach ?>
							</tr>
						</thead>
						<tbody>
							<?php
								foreach ($al as $key => $val): ?>
								<tr>
									<?php $n = getKriteriaNilai($val['id']); ?>
									<td><b><?= $val['nama'] ?></b></td>
									<?php foreach ($n as $nilai): ?>
									<td><?= $nilai['nilai'] ?></td>
									<?php endforeach ?>
								</tr>
							<?php endforeach ?>
						</tbody>
					</table>
				</div>

				<div class="center aligned two column row">
					<div class="column">
						<h4 class="sub header center aligned">Matriks</h4>
						<?php include 'normalisasi/normal_total.php' ?>
					</div>
					<div class="column">
						<h4 class="sub header center aligned">Matriks Ternormalisasi (R)</h4>
						<?php include 'normalisasi/normal_r.php'; ?>
					</div>
				</div>
				<div class="sixteen wide column">
					<div class="ui fluid card">
						<div class="content center aligned">
							<h4>Bobot Didapatkan dari Hasil Kriteria menggunakan AHP</h4>
						</div>
					</div>
				</div>
				<div class="sixteen wide column">
					<h4 class="sub header center aligned">Matriks Ternormalisasi Terbobot (Y) &rarr; Matriks x Bobot</h4>
					<?php include 'normalisasi/normal_terbobot.php'; ?>
				</div>
			</div>

		</div>
	</div>
</section>

<?php include '../footer.php'; ?>
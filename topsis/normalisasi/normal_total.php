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
				<td><b><?= $val['nama'] ?></b></td>
				<?php
				$n = getKriteriaNilai($val['id']); 
				?>
				<?php foreach ($n as $nilai): ?>
				<td>
					<?= $nilai['pangkat'] ?>	
				</td>
				<?php endforeach ?>
			</tr>
		<?php endforeach ?>
			<tr>
				<td><b>Total</b></td>
				<?php $n = hitungNormal(); ?>
				<?php foreach ($n as $k => $nilai): ?>
				<td>
					<?= $nilai ?>	
				</td>
				<?php endforeach ?>
			</tr>
	</tbody>
</table>	
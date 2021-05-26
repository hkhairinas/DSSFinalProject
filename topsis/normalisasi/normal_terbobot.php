<table class="ui celled selectable center aligned table">
	<thead>
		<tr>
			<th rowspan="2">Y</th>
			<th colspan="<?= getJumlahKriteria() ?>">Kriteria</th>
		</tr>
		<tr>
			<?php foreach ($kt as $key => $value): ?>
				<th><?= $value['nama'] ?></th>
			<?php endforeach ?>
		</tr>
		<tr>
			<th>Bobot</th>
			<?php foreach ($kt as $value): 
				$nilai = getKriteriaPV($value['id']);
				?>
				<th><?= $nilai ?></th>
			<?php endforeach ?>
		</tr>
	</thead>
	<tbody>
		<?php 
			foreach ($al as $key => $val): ?>
			<tr>
				<td><b><?= $val['nama'] ?></b></td>
				<?php 
				$sqrt = squareRoot();
				$n = getKriteriaNilai($val['id']);
				?>
				<?php foreach ($n as $key => $nilai): 
					$pv = getKriteriaPV($nilai['id_kriteria']);
					$result = $nilai['nilai']/$sqrt[$key]*$pv; 
					insertNormalisasi($val['id'], $nilai['id_kriteria'], $result);
					?>
				<td>
					<?= round($result,6) ?>
				</td>
				<?php endforeach ?>
			</tr>
		<?php endforeach ?>
			<tr>
				<td><b>MAX</b></td>
				<?php $n = MaxNormal(); foreach ($n as $key => $value): ?>
					<td><?= $value['nilai'] ?></td>
				<?php endforeach ?>
			</tr>
			<tr>
				<td><b>MIN</b></td>
				<?php $n = MinNormal(); foreach ($n as $key => $value): ?>
					<td><?= $value['nilai'] ?></td>
				<?php endforeach ?>
			</tr>
	</tbody>
</table>
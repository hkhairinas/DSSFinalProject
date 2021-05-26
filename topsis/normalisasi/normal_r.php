<table class="ui celled selectable center aligned table">
	<thead>
		<tr>
			<th rowspan="2">R</th>
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
				$sqrt = squareRoot();
				$n = getKriteriaNilai($val['id']); ?>
				<?php foreach ($n as $key => $nilai): $result = $nilai['nilai']/$sqrt[$key]?>
				<td>
					<?= round($result, 8) ?>	
				</td>
				<?php endforeach ?>
			</tr>
		<?php endforeach ?>
	</tbody>
</table>
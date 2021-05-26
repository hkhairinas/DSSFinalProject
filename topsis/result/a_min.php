<table class="ui celled selectable center aligned table">
	<thead>
		<tr>
			<th rowspan="3">A-</th>
			<th colspan="<?= getJumlahKriteria() ?>">Kriteria</th>
		</tr>
		<tr>
			<?php foreach ($kt as $key => $value): ?>
				<th><?= $value['nama'] ?></th>
			<?php endforeach ?>
		</tr>
		<tr>
			<?php foreach ($kt as $key => $value): ?>
				<th><?= $value['atribut'] ?></th>
			<?php endforeach ?>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td><b>Nilai</b></td>
			<?php foreach ($kt as $key => $value): if($value['atribut'] == 'Cost'){$n = getDataMax($value['id']);} else {$n = getDataMin($value['id']);}?>
				<td><?= $n ?></td>
			<?php endforeach ?>
		</tr>
	</tbody>
</table>
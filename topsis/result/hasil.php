<table class="ui celled selectable center aligned table">
	<thead>
		<tr>
			<th>V</th>
			<th>Nilai</th>
		</tr>
	</thead>
	<tbody>
		<?php $result = hitungSolusi(); /*sort($result);*/ foreach ($result as $key => $value): ?>
		<tr>
			<th><?= "V".$key ?></th>
			<td><b><?= round($value,6) ?></b></td>
		</tr>
		<?php endforeach ?>
	</tbody>
</table>
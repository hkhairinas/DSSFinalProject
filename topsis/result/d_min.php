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
				$arr = array();
				$sqrt = squareRoot();
				$kriteria = getKriteriaNilai($val['id']); 
				?>
				<?php foreach ($kriteria as $key => $nilai): 
					if(
						$nilai['atribut'] == 'Cost'){ 
						$n = getDataMax($nilai['id_kriteria']); 
						$result = $nilai['nilai']/$sqrt[$key];
						$hsl = pow($result - $n,2);
						array_push($arr,$hsl);
					} else {  
						$n = getDataMin($nilai['id_kriteria']); 
						$result = $nilai['nilai']/$sqrt[$key];
						$hsl = pow($result - $n,2);
						array_push($arr,$hsl);
					}
				?>
				<td>
					<?= round($hsl, 6) ?>	
				</td>
				<?php endforeach ?>
			</tr>
		<?php endforeach ?>
	</tbody>
</table>
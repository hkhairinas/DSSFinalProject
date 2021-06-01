<table class="ui celled selectable center aligned table">
	<thead>
		<tr>
			<th rowspan="2">Di-</th>
			<th colspan="<?= getJumlahKriteria() ?>">Kriteria</th>
			<th rowspan="2">Total</th>
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
				$hasil = 0;
				?>
				<?php foreach ($kriteria as $key => $nilai): 
					$pv = getKriteriaPV($nilai['id_kriteria']);
					if($nilai['atribut'] == 'Cost'){ 
						$n = getDataMax($nilai['id_kriteria']); 
						$result = $nilai['nilai']/$sqrt[$key]*$pv;
						$hsl = pow($result - $n,2);
						$hasil += $hsl;
					} else {  
						$n = getDataMin($nilai['id_kriteria']); 
						$result = $nilai['nilai']/$sqrt[$key]*$pv;
						$hsl = pow($result - $n,2);
						$hasil += $hsl;
					}
				?>
				<td>
					<?= round($hsl, 6) ?>	
				</td>
				<?php endforeach ?>
				<td>
					<?= round(sqrt($hasil), 6); insertSMin($nilai['id_alter'], sqrt($hasil));?>
				</td>
			</tr>
		<?php endforeach ?>
	</tbody>
</table>
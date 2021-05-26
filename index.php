
<?php
include('config.php');
include('fungsi.php');
// header
include('header.php');
?>
	<section class="content">
		<div class="ui grid">
			<div class="two column row">
				
				<div class="column">
					<div class="ui fluid card">
						<div class="content">
							<div class="center aligned header">Analitycal Hierarchy Process (AHP)</div>
						</div>

						<div class="content">
							<p>Analytic Hierarchy Process (AHP) merupakan suatu model pendukung keputusan yang dikembangkan oleh Thomas L. Saaty. Model pendukung keputusan ini akan menguraikan masalah multi faktor atau multi kriteria yang kompleks menjadi suatu hirarki. Hirarki  didefinisikan sebagai suatu representasi dari sebuah permasalahan yang kompleks dalam suatu struktur multi level dimana level pertama adalah tujuan, yang diikuti level faktor, kriteria, sub kriteria, dan seterusnya ke bawah hingga level terakhir dari alternatif.</p>
							<p>AHP membantu para pengambil keputusan untuk memperoleh solusi terbaik dengan mendekomposisi permasalahan kompleks ke dalam bentuk yang lebih sederhana untuk kemudian melakukan sintesis terhadap berbagai faktor yang terlibat dalam permasalahan pengambilan keputusan tersebut. AHP mempertimbangkan aspek kualitatif dan kuantitatif dari suatu keputusan dan mengurangi kompleksitas suatu keputusan dengan membuat perbandingan satu-satu dari berbagai kriteria yang dipilih untuk kemudian mengolah dan memperoleh hasilnya.</p>
							<p>AHP sering digunakan sebagai metode pemecahan masalah dibanding dengan metode yang lain karena alasan-alasan sebagai berikut :</p>

							<ol class="ui list">
								<li>Struktur yang berhirarki, sebagai konsekuesi dari kriteria yang  dipilih, sampai pada subkriteria yang paling dalam.</li>
								<li>Memperhitungkan validitas sampai dengan batas toleransi inkonsistensi berbagai kriteria dan alternatif yang dipilih oleh pengambil keputusan.</li>
								<li>Memperhitungkan daya tahan output analisis sensitivitas pengambilan keputusan.</li>
							</ol>
						</div>

						<div class="extra content">
							<h4 class="ui sub header">Tabel Tingkat Kepentingan menurut Saaty (1980)</h4>
							<table class="ui collapsing striped red table">
								<thead>
									<tr>
										<th>Nilai Numerik</th>
										<th>Tingkat Kepentingan <em>(Preference)</em></th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td class="center aligned">1</td>
										<td>Sama pentingnya <em>(Equal Importance)</em></td>
									</tr>
									<tr>
										<td class="center aligned">2</td>
										<td>Sama hingga sedikit lebih penting</td>
									</tr>
									<tr>
										<td class="center aligned">3</td>
										<td>Sedikit lebih penting <em>(Slightly more importance)</em></td>
									</tr>
									<tr>
										<td class="center aligned">4</td>
										<td>Sedikit lebih hingga jelas lebih penting</td>
									</tr>
									<tr>
										<td class="center aligned">5</td>
										<td>Jelas lebih penting <em>(Materially more importance)</em></td>
									</tr>
									<tr>
										<td class="center aligned">6</td>
										<td>Jelas hingga sangat jelas lebih penting</td>
									</tr>
									<tr>
										<td class="center aligned">7</td>
										<td>Sangat jelas lebih penting <em>(Significantly more importance)</em></td>
									</tr>
									<tr>
										<td class="center aligned">8</td>
										<td>Sangat jelas hingga mutlak lebih penting</td>
									</tr>
									<tr>
										<td class="center aligned">9</td>
										<td>Mutlak lebih penting <em>(Absolutely more importance)</em></td>
									</tr>
								</tbody>
							</table>	
						</div>
					</div>
				</div>

				<div class="column">
					<div class="ui fluid card">
						<div class="content">
							<div class="center aligned header">
								Technique for Order Preference by Similarity to Ideal Solution (TOPSIS)
							</div>
						</div>
						<div class="content">
							<p>Topsis didasarkan pada konsep dimana alternatif terpilih yang terbaik tidak hanya memiliki <span style="color: green;">jarak terpendek dari solusi ideal positif,</span>namun juga memiliki <span style="color: green;">jarak terpanjang dari solusi ideal negatif.</span></p>
							<h4 class="ui sub header">TOPSIS banyak digunakan dengan alasan :</h4>
							<ol class="ui list">
								<li>Konsepnya sederhana dan mudah dipahami;</li>
								<li>Komputasinya efisien; dan</li>
								<li>Memiliki kemampuan untuk mengukur kinerja relatif dari alternatif-alternatif keputusan dalam bentuk matematis yang sederhana.</li>
							</ol>
						</div>
					</div>	
				</div>

			</div>
		</div>
	</section>

<?php include('footer.php'); ?>

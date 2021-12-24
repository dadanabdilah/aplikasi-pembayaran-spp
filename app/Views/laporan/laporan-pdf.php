<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?=$title;?></title>
	<!-- <link href="<?=base_url()?>/bootstrap/css/bootstrap.min.css" type="text/css" media="all" rel="stylesheet"/> -->
	<style type="text/css" media="all">
		.text-center{
			text-align: center;
		}
		.konten-center{
			/*font-size: 300px;*/
			padding-left: 20px;
			padding-right: 20px;
		}
		.title1{
			margin: 0px;
			padding: 0px;
		}
		.title2{
			margin-top: 0px;
			padding-top: 0px;
			margin-bottom: 0px;
		}
		.p{
			margin-top: 0px;
			padding-top: 0px;
			margin-bottom: 0px;
			font-size: 13px;
		}
		.hr{
			border-bottom: 3px solid black;
			margin-top: 0px;
			margin-left: 20px;
			margin-right: 20px;
			margin-bottom: 1px;
		}
		.garis{
			border-bottom: 2px solid black;
			margin-top: 0px;
			margin-left: 20px;
			margin-right: 20px;
			margin-bottom: 20px;
		}
		.table{
			border-collapse: collapse;
			border: 1px solid black;
			table-layout: auto;
			width: 100%
		}
		th, td{
			border: 1px solid black;
		}
	</style>
</head>
<body>
<!-- <h2 class="text-center title2">DINAS PENDIDIKAN DAN KEBUDAYAAN</h2>
<h2 class="text-center title2">KABUPATEN KUNINGAN</h2> -->
<h2 class="text-center title1">LAPORAN PEMBAYARAN SPP</h2>
<h2 class="text-center title2">SMK NEGERI 2 KUNINGAN</h2>
<!-- <div class="text-center p">Jl. Sukamulya No.77 - Sukamulya, Cigugur, Kuningan.</div> -->

<span class="hr"></span>
<span class="garis"></span>

	<div class="konten-center">
	    <table class="table center table-bordered">
	        <thead class="text-center">
	            <tr>
	                <th>No</th>
	                <th>NIS</th>
	                <th>Nama Siswa</th>
	                <th>Jenis Kelamin</th>
	                <th>Kelas</th>
	                <th>Tahun & Bulan Yang Dibayar</th>
	                <th>Tarif SPP</th>
	                <th>Jumlah Bayar</th>
	                <th>Tanggal Bayar</th>
	                <th>Nama Petugas</th>
	            </tr>
	        </thead>
	        <tbody>

	        <?php $i=1; ?>
	        <?php foreach ($data_pembayaran as $data) { ?>
				<tr>
	                <td class="text-center"><?= $i++?></td>
	                <td class="text-center"><?= $data["nis"]?></td>
	                <td class="text-center"><?= $data["nama_siswa"]?></td>
	                <td class="text-center"><?= $data["jk"]?></td>
	                <td class="text-center"><?= $data["nama_kelas"]?></td>
					<td class="text-center"><?= $data['tahun_bayar']?> - <?= $data['bulan_bayar']?></td>
					<td class="text-center"><?= $data["nominal"]?></td>
					<td class="text-center"><?= $data["jumlah_bayar"]?></td>
					<td class="text-center"><?= $data["tgl_bayar"]?></td>
					<td class="text-center"><?= $data["nama_petugas"]?></td>  
	            </tr>
	        <?php }?>
	        
			</tbody>
	    </table>
	</div>
</body>
</html>
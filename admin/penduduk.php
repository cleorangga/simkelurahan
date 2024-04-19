<?php
if (!isset($_SESSION['admin'])) {
	echo "<script>location='../error.html';</script>";
	exit();
}
?>

<div id="dialog" title="Hapus" style="display: none;" class="text-center">
<p><i class="fas fa-exclamation-triangle mr-3 text-danger"></i> <br> Hapus data penduduk ?</p>
</div>
<div class="card card-light">
	<div class="card-header">
		<h3 class="card-title"><strong>DATA PENDUDUK</strong></h3>
		<div class="card-tools">
			<a href="index.php?halaman=tambahpenduduk" class="btn btn-tool btn-default border border-secondary"><i class="fa fa-plus-circle fa-lg text-primary pt-1 mr-1"></i><strong>Tambah</strong></a>
			<button type="button" class="btn btn-tool" data-card-widget="maximize"><i class="fas fa-expand"></i>
			</button>
		</div>
	</div>
	<div class="card-body table-responsive table-sm p-2" style="min-height: 400px;">
		<table id="datapenduduk" class="table table-bordered table-head-fixed text-nowrap">
			<thead>
				<tr>
					<th class="text-center">#</th> <!-- JGN TAMBAH CLASS NOTEXPORT -->
					<th class="text-center">NIK</th>
					<th class="text-center">Nama</th>
					<th class="text-center">Tempat/Tgl Lahir</th>
					<th class="text-center">Jenis Kelamin</th>
					<th class="text-center">Gol. Darah</th>
					<th class="text-center">Agama</th>
					<th class="text-center">Pekerjaan</th>
					<th class="text-center">Alamat</th>
					<th class="text-center">Status Nikah</th>
					<th class="text-center">Umur</th>
					<th class="notexport text-center">Opsi</th>
				</tr>
			</thead>
			<tbody>
				<?php $nomor = 1; ?>
				<?php $take = $connect->query("SELECT * FROM data_penduduk ORDER BY id_penduduk DESC"); ?>

				<?php while ($row = $take->fetch_assoc()) { ?>
					<?php
					$tgllahir = new DateTime($row['tanggal_lahir']);

					$dateOfBirth = $row['tanggal_lahir'];
					$today = date("Y-m-d");

					$diff = date_diff(date_create($dateOfBirth), date_create($today));
					?>
					<tr>
						<td class="text-center"></td>
						<td><?php echo $row['nik']; ?></td>
						<td><?php echo $row['nama']; ?></td>
						<td><?php echo $row['tempat_lahir']; ?>, <?php echo $tgllahir->format('d-m-Y'); ?></td>
						<td><?php echo $row['jenis_kelamin']; ?></td>
						<td><?php echo $row['golongan_darah']; ?></td>
						<td><?php echo $row['agama']; ?></td>
						<td><?php echo $row['pekerjaan']; ?></td>
						<td><?php echo $row['alamat']; ?></td>
						<td><?php echo $row['status_nikah']; ?></td>
						<td><?php echo $diff->format('%y'); ?></td>
						<td class="text-center">
							<div class="btn-group">
								<a href="index.php?halaman=editpenduduk&id=<?php echo $row['id_penduduk']; ?>" class="btn btn-default btn-sm mr-2"><i class="fas fa-pen text-success mr-1"></i>Edit</a>
								<a href="index.php?halaman=hapuspenduduk&id=<?php echo $row['id_penduduk']; ?>" class="btn btn-default btn-sm confirmLink"><i class="fas fa-trash-alt text-danger mr-1"></i>Hapus</a>
								<!-- <a href="index.php?halaman=hapuspenduduk&id=<?php echo $row['id_penduduk']; ?>" class="btn btn-default btn-sm confirmLink" onclick="return confirm('Are you sure you want to delete this item')"><i class="fas fa-trash-alt text-danger mr-1"></i>Hapus</a> -->
							</div>
						</td>
					</tr>
					<?php $nomor++; ?>
				<?php } ?>
			</tbody>
		</table>
	</div>
</div>
<?php
if (!isset($_SESSION['admin'])) {
	echo "<script>location='../error.html';</script>";
	exit();
}
$take = $connect->query("SELECT * FROM data_penduduk WHERE id_penduduk='$_GET[id]'");
$row = $take->fetch_assoc();
$jeniskelamin = $row['jenis_kelamin'];
$agama = $row['agama'];
$alamat = $row['alamat'];
$statusnikah = $row['status_nikah'];
?>

<div class="card card-light mx-4 my-2">
	<div class="card-header">
		<h3 class="card-title"><strong>Edit Data Penduduk</strong></h3>
	</div>
	<form class="form-horizontal" method="post" enctype="multipart/form-data">
		<div class="card-body">
			<div class="form-group row mb-2">
				<label class="col-sm-2 col-form-label">NIK</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" name="nik" value="<?php echo $row['nik']; ?>" oninput="this.value=this.value.slice(0,this.maxLength)" maxlength="16">
				</div>
			</div>
			<div class="form-group row mb-2">
				<label class="col-sm-2 col-form-label">Nama</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" name="nama" value="<?php echo $row['nama']; ?>">
				</div>
			</div>
			<div class="form-group row mb-2">
				<label class="col-sm-2 col-form-label">Tempat Lahir</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" name="tempatlahir" value="<?php echo $row['tempat_lahir']; ?>">
				</div>
			</div>
			<div class="form-group row mb-2">
				<label class="col-sm-2 col-form-label">Tanggal Lahir</label>
				<div class="col-sm-10">
					<input type="date" class="form-control" name="tanggallahir" value="<?php echo $row['tanggal_lahir']; ?>" max="2999-12-31">
				</div>
			</div>
			<div class="form-group row mb-2">
				<label class="col-sm-2 col-form-label">Jenis Kelamin</label>
				<div class="col-sm-10">
					<select class="form-control select2ns" name="jeniskelamin" required>
						<option selected value="<?php echo $row['jenis_kelamin']; ?>"><?php echo $row['jenis_kelamin']; ?></option>
						<?php if ($jeniskelamin == 'Laki-laki') : ?>
							<option value="Perempuan">Perempuan</option>
						<?php elseif ($jeniskelamin == 'Perempuan') : ?>
							<option value="Laki-laki">Laki-laki</option>
						<?php endif ?>
					</select>
				</div>
			</div>
			<div class="form-group row mb-2">
				<label class="col-sm-2 col-form-label">Golongan Darah</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" name="golongandarah" value="<?php echo $row['golongan_darah']; ?>">
				</div>
			</div>
			<div class="form-group row mb-2">
				<label class="col-sm-2 col-form-label">Agama</label>
				<div class="col-sm-10">
					<select class="form-control select2ns" name="agama">
						<option value="<?php echo $row['agama']; ?>"><?php echo $row['agama']; ?></option>
						<?php if ($agama == 'Islam') : ?>
							<option value="Kristen Protestan">Kristen Protestan</option>
							<option value="Kristen Katolik">Kristen Katolik</option>
							<option value="Hindu">Hindu</option>
							<option value="Buddha">Buddha</option>
							<option value="Khonghucu">Khonghucu</option>
						<?php elseif ($agama == 'Kristen Protestan') : ?>
							<option value="Islam">Islam</option>
							<option value="Kristen Katolik">Kristen Katolik</option>
							<option value="Hindu">Hindu</option>
							<option value="Buddha">Buddha</option>
							<option value="Khonghucu">Khonghucu</option>
						<?php elseif ($agama == 'Kristen Katolik') : ?>
							<option value="Islam">Islam</option>
							<option value="Kristen Protestan">Kristen Protestan</option>
							<option value="Hindu">Hindu</option>
							<option value="Buddha">Buddha</option>
							<option value="Khonghucu">Khonghucu</option>
						<?php elseif ($agama == 'Hindu') : ?>
							<option value="Islam">Islam</option>
							<option value="Kristen Protestan">Kristen Protestan</option>
							<option value="Kristen Katolik">Kristen Katolik</option>
							<option value="Buddha">Buddha</option>
							<option value="Khonghucu">Khonghucu</option>
						<?php elseif ($agama == 'Buddha') : ?>
							<option value="Islam">Islam</option>
							<option value="Kristen Protestan">Kristen Protestan</option>
							<option value="Kristen Katolik">Kristen Katolik</option>
							<option value="Hindu">Hindu</option>
							<option value="Khonghucu">Khonghucu</option>
						<?php elseif ($agama == 'Khonghucu') : ?>
							<option value="Islam">Islam</option>
							<option value="Kristen Protestan">Kristen Protestan</option>
							<option value="Kristen Katolik">Kristen Katolik</option>
							<option value="Hindu">Hindu</option>
							<option value="Buddha">Buddha</option>
						<?php endif ?>
					</select>
				</div>
			</div>
			<div class="form-group row mb-2">
				<label class="col-sm-2 col-form-label">Pekerjaan</label>
				<div class="col-sm-10">
					<input id="tags" type="text" class="form-control" name="pekerjaan" value="<?php echo $row['pekerjaan']; ?>">
				</div>
			</div>
			<div class="form-group row mb-2">
				<label class="col-sm-2 col-form-label">Alamat</label>
				<div class="col-sm-10">
					<select class="form-control select2ns" name="alamat" required>
						<option selected value="<?php echo $row['alamat']; ?>"><?php echo $row['alamat']; ?></option>
						<?php if ($alamat == 'Lingkungan 1, Kelurahan Rinegetan') : ?>
							<option value="Lingkungan 2, Kelurahan Rinegetan">Lingkungan 2, Kelurahan Rinegetan</option>
							<option value="Lingkungan 3, Kelurahan Rinegetan">Lingkungan 3, Kelurahan Rinegetan</option>
							<option value="Lingkungan 4, Kelurahan Rinegetan">Lingkungan 4, Kelurahan Rinegetan</option>
							<option value="Lingkungan 5, Kelurahan Rinegetan">Lingkungan 5, Kelurahan Rinegetan</option>
						<?php elseif ($alamat == 'Lingkungan 2, Kelurahan Rinegetan') : ?>
							<option value="Lingkungan 1, Kelurahan Rinegetan">Lingkungan 1, Kelurahan Rinegetan</option>
							<option value="Lingkungan 3, Kelurahan Rinegetan">Lingkungan 3, Kelurahan Rinegetan</option>
							<option value="Lingkungan 4, Kelurahan Rinegetan">Lingkungan 4, Kelurahan Rinegetan</option>
							<option value="Lingkungan 5, Kelurahan Rinegetan">Lingkungan 5, Kelurahan Rinegetan</option>
						<?php elseif ($alamat == 'Lingkungan 3, Kelurahan Rinegetan') : ?>
							<option value="Lingkungan 1, Kelurahan Rinegetan">Lingkungan 1, Kelurahan Rinegetan</option>
							<option value="Lingkungan 2, Kelurahan Rinegetan">Lingkungan 2, Kelurahan Rinegetan</option>
							<option value="Lingkungan 4, Kelurahan Rinegetan">Lingkungan 4, Kelurahan Rinegetan</option>
							<option value="Lingkungan 5, Kelurahan Rinegetan">Lingkungan 5, Kelurahan Rinegetan</option>
						<?php elseif ($alamat == 'Lingkungan 4, Kelurahan Rinegetan') : ?>
							<option value="Lingkungan 1, Kelurahan Rinegetan">Lingkungan 1, Kelurahan Rinegetan</option>
							<option value="Lingkungan 2, Kelurahan Rinegetan">Lingkungan 2, Kelurahan Rinegetan</option>
							<option value="Lingkungan 3, Kelurahan Rinegetan">Lingkungan 3, Kelurahan Rinegetan</option>
							<option value="Lingkungan 5, Kelurahan Rinegetan">Lingkungan 5, Kelurahan Rinegetan</option>
						<?php elseif ($alamat == 'Lingkungan 5, Kelurahan Rinegetan') : ?>
							<option value="Lingkungan 1, Kelurahan Rinegetan">Lingkungan 1, Kelurahan Rinegetan</option>
							<option value="Lingkungan 2, Kelurahan Rinegetan">Lingkungan 2, Kelurahan Rinegetan</option>
							<option value="Lingkungan 3, Kelurahan Rinegetan">Lingkungan 3, Kelurahan Rinegetan</option>
							<option value="Lingkungan 4, Kelurahan Rinegetan">Lingkungan 4, Kelurahan Rinegetan</option>
						<?php endif ?>
					</select>
				</div>
			</div>
			<div class="form-group row mb-2">
				<label class="col-sm-2 col-form-label">Status Nikah</label>
				<div class="col-sm-10">
					<select class="form-control select2ns" name="statuspernikahan" required>
						<option selected value="<?php echo $row['status_nikah']; ?>"><?php echo $row['status_nikah']; ?></option>
						<?php if ($statusnikah == 'Belum') : ?>
							<option value="Kawin">Kawin</option>
							<option value="Cerai hidup">Cerai hidup</option>
							<option value="Cerai mati">Cerai mati</option>
						<?php elseif ($statusnikah == 'Kawin') : ?>
							<option value="Belum">Belum</option>
							<option value="Cerai hidup">Cerai hidup</option>
							<option value="Cerai mati">Cerai mati</option>
						<?php elseif ($statusnikah == 'Cerai hidup') : ?>
							<option value="Belum">Belum</option>
							<option value="Kawin">Kawin</option>
							<option value="Cerai mati">Cerai mati</option>
						<?php elseif ($statusnikah == 'Cerai mati') : ?>
							<option value="Belum">Belum</option>
							<option value="Kawin">Kawin</option>
							<option value="Cerai hidup">Cerai hidup</option>
						<?php endif ?>
					</select>
				</div>
			</div>
		</div>
		<div class="card-footer">
			<button type="submit" class="btn btn-default btn-sm border border-secondary float-right" name="save"><i class="fa fa-check-square text-info fa-lg mr-2"></i><strong>Save</strong></button>
		</div>
	</form>
</div>

<?php
if (isset($_POST['save'])) {
	$nama = ucwords($_POST["nama"]);
	$tempatlahir = ucwords($_POST["tempatlahir"]);
	$golongandarah = strtoupper($_POST["golongandarah"]);
	$noSpaces = str_replace(' ', '', $golongandarah);

	$connect->query("UPDATE data_penduduk SET nik='$_POST[nik]',nama='$nama',tempat_lahir='$tempatlahir',tanggal_lahir='$_POST[tanggallahir]',jenis_kelamin='$_POST[jeniskelamin]',golongan_darah='$noSpaces',agama='$_POST[agama]',pekerjaan='$_POST[pekerjaan]',alamat='$_POST[alamat]',status_nikah='$_POST[statuspernikahan]' WHERE id_penduduk='$_GET[id]'");

	echo "<div class='alert alert-success mt-2'><i class='icon fas fa-exclamation-triangle'></i> Data berhasil diperbarui</div>";
	echo "<meta http-equiv='refresh' content='1'>";
}
?>
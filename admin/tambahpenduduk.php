<?php
if (!isset($_SESSION['admin'])) {
	echo "<script>location='../error.html';</script>";
	exit();
}
?>

<div class="card card-light mx-4 my-2">
	<div class="card-header">
		<h3 class="card-title"><strong>Tambah Data Penduduk</strong></h3>
	</div>
	<form class="form-horizontal" method="post" enctype="multipart/form-data">
		<div class="card-body">
			<div class="form-group row mb-2">
				<label class="col-sm-2 col-form-label">NIK</label>
				<div class="col-sm-10">
					<input type="number" class="form-control" name="nik" required oninput="this.value=this.value.slice(0,this.maxLength)" maxlength="16">
				</div>
			</div>
			<div class="form-group row mb-2">
				<label class="col-sm-2 col-form-label">Nama</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" name="nama" required>
				</div>
			</div>
			<div class="form-group row mb-2">
				<label class="col-sm-2 col-form-label">Tempat Lahir</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" name="tempatlahir">
				</div>
			</div>
			<div class="form-group row mb-2">
				<label class="col-sm-2 col-form-label">Tanggal Lahir</label>
				<div class="col-sm-10">
					<input type="date" class="form-control" name="tanggallahir" max="2999-12-31" required>
				</div>
			</div>
			<div class="form-group row mb-2">
				<label class="col-sm-2 col-form-label">Jenis Kelamin</label>
				<div class="col-sm-10">
					<select class="form-control select2ns" name="jeniskelamin" required>
						<option selected disabled value="">-- jenis kelamin --</option>
						<option value="Laki-laki">Laki-laki</option>
						<option value="Perempuan">Perempuan</option>
					</select>
				</div>
			</div>
			<div class="form-group row mb-2">
				<label class="col-sm-2 col-form-label">Golongan Darah</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" name="golongandarah">
				</div>
			</div>
			<div class="form-group row mb-2">
				<label class="col-sm-2 col-form-label">Agama</label>
				<div class="col-sm-10">
					<select class="form-control select2ns" name="agama" required>
						<option selected disabled value="">-- agama --</option>
						<option value="Islam">Islam</option>
						<option value="Kristen Katolik">Kristen Katolik</option>
						<option value="Kristen Protestan">Kristen Protestan</option>
						<option value="Hindu">Hindu</option>
						<option value="Buddha">Buddha</option>
						<option value="Khonghucu">Khonghucu</option>
					</select>
				</div>
			</div>
			<div class="form-group row mb-2">
				<label class="col-sm-2 col-form-label">Pekerjaan</label>
				<div class="col-sm-10">
					<input id="tags" type="text" class="form-control" name="pekerjaan" required>
				</div>
			</div>
			<div class="form-group row mb-2">
				<label class="col-sm-2 col-form-label">Alamat</label>
				<div class="col-sm-10">
					<select class="form-control select2ns" name="alamat" required>
						<option selected disabled value="">-- alamat tempat tinggal --</option>
						<option value="Lingkungan 1, Kelurahan Rinegetan">Lingkungan 1</option>
						<option value="Lingkungan 2, Kelurahan Rinegetan">Lingkungan 2</option>
						<option value="Lingkungan 3, Kelurahan Rinegetan">Lingkungan 3</option>
						<option value="Lingkungan 4, Kelurahan Rinegetan">Lingkungan 4</option>
						<option value="Lingkungan 5, Kelurahan Rinegetan">Lingkungan 5</option>
					</select>
				</div>
			</div>
			<div class="form-group row mb-2">
				<label class="col-sm-2 col-form-label">Status Pernikahan</label>
				<div class="col-sm-10">
					<select class="form-control select2ns" name="statuspernikahan" required>
						<option selected disabled value="">-- status --</option>
						<option value="Belum">Belum</option>
						<option value="Kawin">Kawin</option>
						<option value="Cerai hidup">Cerai hidup</option>
						<option value="Cerai mati">Cerai mati</option>
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

	$terdaftar = $_POST["nik"];
	$nama = ucwords($_POST["nama"]);
	$tempatlahir = ucwords($_POST["tempatlahir"]);
	$pekerjaan = ucwords($_POST["pekerjaan"]);
	$golongandarah = strtoupper($_POST["golongandarah"]);
	$noSpaces = str_replace(' ', '', $golongandarah);

	$take = $connect->query("SELECT * FROM data_penduduk WHERE nik='$terdaftar'");
	$matched = $take->num_rows;
	$row = $take->fetch_assoc();
	$nama = $row['nama'];
	if ($matched == 1) {
		echo "<script>window.alert('!!! NIK sudah terdaftar dengan nama $nama !!!');</script>";
	} else {
		$connect->query("INSERT INTO data_penduduk (nik,nama,tempat_lahir,tanggal_lahir,jenis_kelamin,golongan_darah,agama,pekerjaan,alamat,status_nikah) VALUES('$_POST[nik]','$nama','$tempatlahir','$_POST[tanggallahir]','$_POST[jeniskelamin]','$noSpaces','$_POST[agama]','$pekerjaan','$_POST[alamat]','$_POST[statuspernikahan]')");
		echo "<div class='alert alert-success mt-3'><i class='icon fas fa-exclamation-triangle'></i> Berhasil Ditambahkan</div>";
		echo "<meta http-equiv='refresh' content='1;url=index.php?halaman=penduduk'>";
	}
}
?>
<?php
if (!isset($_SESSION['admin'])) {
	echo "<script>location='../error.html';</script>";
	exit();
}
?>

<div class="card card-light mx-4 my-2">
	<div class="card-header">
		<h3 class="card-title"><strong>Tambah User Baru</strong></h3>
	</div>
	<form class="form-horizontal" method="post" enctype="multipart/form-data">
		<div class="card-body">
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Nama & No. KTP</label>
				<div class="col-sm-10 input-group" id="aa">
					<select reqired class="form-control select2" name="idpenduduk" required>
						<?php $take = $connect->query("SELECT * FROM data_penduduk") ?>
						<option selected disabled value=""></option>
						<?php while ($row = $take->fetch_assoc()) { ?>
							<option value="<?php echo $row['id_penduduk'] ?>">[ NIK : <?php echo $row['nik'] ?> ] <?php echo $row['nama'] ?> </option>
						<?php } ?>
					</select>
				</div>
			</div>
			<div class="form-group row mb-2">
				<label class="col-sm-2 col-form-label">PIN</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" name="pass" required oninput="this.value=this.value.slice(0,this.maxLength)" maxlength="15">
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Telp/Hp</label>
				<div class="col-sm-10">
					<input type="number" class="form-control" name="telp">
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
	$terdaftar = $_POST["idpenduduk"];
	$password = password_hash($_POST["pass"], PASSWORD_DEFAULT);
	$take = $connect->query("SELECT * FROM pengguna WHERE id_penduduk='$terdaftar'");
	$matched = $take->num_rows;
	if ($matched == 1) {
		echo "<script>window.alert('NIK sudah terdaftar !');</script>";
	} else {
		$connect->query("INSERT INTO pengguna (id_penduduk,password_user,tlpn_user) VALUES('$_POST[idpenduduk]','$password','$_POST[telp]')");
		echo "<div class='alert alert-success mt-3'>Berhasil Ditambahkan</div>";
		echo "<meta http-equiv='refresh' content='1;url=index.php?halaman=user'>";
	}
}
?>
<?php
if (!isset($_SESSION['admin'])) {
	echo "<script>location='../error.html';</script>";
	exit();
}
$take = $connect->query("SELECT * FROM pengguna JOIN data_penduduk ON pengguna.id_penduduk=data_penduduk.id_penduduk WHERE id_pengguna='$_GET[id]'");
$row = $take->fetch_assoc();
?>

<div class="card card-light mx-4 my-2">
	<div class="card-header">
		<h3 class="card-title"><strong>Edit Info User</strong></h3>
	</div>
	<form class="form-horizontal" method="post" enctype="multipart/form-data">
		<div class="card-body">
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">User</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" value="<?php echo $row['nama']; ?>  [ NIK : <?php echo $row['nik']; ?> ]" disabled>
				</div>
			</div>
			<div class="form-group row mb-2">
				<label class="col-sm-2 col-form-label">Password Baru</label>
				<div class="col-sm-10">
					<input type="number" class="form-control" name="pass" oninput="this.value=this.value.slice(0,this.maxLength)" maxlength="6" value="<?php echo $row['password_user']; ?>">
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Telp/Hp</label>
				<div class="col-sm-10">
					<input type="number" class="form-control" name="telp" value="<?php echo $row['tlpn_user']; ?>">
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
	$password = password_hash($_POST["pass"], PASSWORD_DEFAULT);
	$connect->query("UPDATE pengguna SET password_user='$password',tlpn_user='$_POST[telp]' WHERE id_pengguna='$_GET[id]'");

	echo "<script>alert('Data berhasil diubah');</script>";
	echo "<script>location='index.php?halaman=user';</script>";
}
?>
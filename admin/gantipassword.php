<?php
if (!isset($_SESSION['admin'])) {
	echo "<script>location='../error.html';</script>";
	exit();
}
$take = $connect->query("SELECT * FROM admin WHERE id_admin='{$_SESSION['idadmin']}'");
$row = $take->fetch_assoc();
?>

<!-- <?php print_r($_SESSION["admin"]); ?> -->

<!-- <a href="index.php?halaman=tambahadmin" class="btn btn-tool btn-default m-2"><i class="fa fa-plus-circle fa-lg text-primary pt-1 mr-1"></i><strong>Tambah</strong></a> -->
<div class="card card-light mx-4 my-2">
	<div class="card-header">
		<h3 class="card-title"><strong>Ganti Password</strong></h3>
	</div>
	<form class="form-horizontal" method="post" enctype="multipart/form-data">
		<div class="card-body">
			<div class="form-group row mb-2">
				<label class="col-sm-2 col-form-label">Username</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" name="username" value="<?php echo $row['username']; ?>">
				</div>
			</div>
			<div class="form-group row mb-2">
				<label class="col-sm-2 col-form-label">Password</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" value="<?php echo $row['password']; ?>" disabled>
				</div>
			</div>
			<div class="form-group row mb-2">
				<label class="col-sm-2 col-form-label">Password Baru</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" name="pass" value="">
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
	$connect->query("UPDATE admin SET username='$_POST[username]',password='$password' WHERE id_admin='{$_SESSION['idadmin']}'");

	echo "<script>alert('Data berhasil diubah');</script>";
	echo "<script>location='index.php?halaman=gantipassword';</script>";
}
?>
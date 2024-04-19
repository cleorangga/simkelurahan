<?php
if (!isset($_SESSION['admin'])) {
	echo "<script>location='../error.html';</script>";
	exit();
}
?>

<div class="card card-light m-5">
	<div class="card-header">
		<h3 class="card-title"><strong>Tambah Admin Baru</strong></h3>
	</div>
	<form class="form-horizontal" method="post" enctype="multipart/form-data">
		<div class="card-body">
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Username</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" name="username" required>
				</div>
			</div>
			<div class="form-group row mb-2">
				<label class="col-sm-2 col-form-label">Password</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" name="pass" required>
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
   $terdaftar = $_POST['username'];
	$password = password_hash($_POST["pass"], PASSWORD_DEFAULT);
	$take = $connect->query("SELECT * FROM admin WHERE username='$terdaftar'");
	$matched = $take->num_rows;
	if ($matched == 1) {
		echo "<script>window.alert('username sudah dipakai !');</script>";
	} else {
		$connect->query("INSERT INTO admin (username,password) VALUES('$_POST[username]','$password')");
		echo "<div class='alert alert-success mt-3'>Berhasil Ditambahkan</div>";
		echo "<meta http-equiv='refresh' content='1;url=index.php?halaman=gantipassword'>";
	}
}
?>
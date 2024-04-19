<?php
if (!isset($_SESSION['admin'])) {
	echo "<script>location='../error.html';</script>";
	exit();
}
$take = $connect->query("SELECT * FROM info_kelurahan");
$row = $take->fetch_assoc();
?>

<div class="card card-light mx-4 my-2">
	<div class="card-header">
		<h3 class="card-title"><strong>Edit Info Kelurahan</strong></h3>
		<div class="card-tools">
			<!-- <i class="fa fa-question-circle mr-2" id="show-option" title="data ini (nama & nip lurah) yang akan di tampilkan di setiap surat"></i> -->
		</div>
	</div>
	<form class="form-horizontal" method="post" enctype="multipart/form-data">
		<div class="card-body">
			<div class="form-group row mb-2">
				<label class="col-sm-2 col-form-label">Nama Lurah</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" name="namalurah" value="<?php echo $row['nama_lurah']; ?>">
				</div>
			</div>
			<div class="form-group row mb-2">
				<label class="col-sm-2 col-form-label">NIP</label>
				<div class="col-sm-10">
					<input type="number" class="form-control" name="nip" oninput="this.value=this.value.slice(0,this.maxLength)" maxlength="18" value="<?php echo $row['nip']; ?>">
				</div>
			</div>
			<div class="form-group row mb-2">
				<label class="col-sm-2 col-form-label">Email Kelurahan</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" name="mail" value="<?php echo $row['email_kelurahan']; ?>">
				</div>
			</div>
			<div class="form-group row mb-2">
				<label class="col-sm-2 col-form-label">No. Tlp Kelurahan</label>
				<div class="col-sm-10">
					<input type="number" class="form-control" name="telp" value="<?php echo $row['tlpn_kelurahan']; ?>">
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
	$connect->query("UPDATE info_kelurahan SET nama_lurah='$_POST[namalurah]',nip='$_POST[nip]',email_kelurahan='$_POST[mail]',tlpn_kelurahan='$_POST[telp]' WHERE id='123'");

	echo "<script>alert('Data berhasil diubah');</script>";
	echo "<script>location='index.php?halaman=layanansurat';</script>";
}
?>
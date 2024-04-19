<?php
$take = $connect->query("SELECT * FROM publikasi WHERE id_berita='$_GET[id]'");
$row = $take->fetch_assoc();
?>
<div class="card rounded-0 border elevation-0">
   <div class="card-body p-3">
      <img class="attachment-img center-cropped" src="gambar_berita/<?php echo $row['gambar']; ?>" alt="">
      <br>
      <h4 class="text-muted mt-2"><?php echo $row['judul']; ?></h4>
      <i class="far fa-calendar-check fa-xs mr-1 text-info"></i><small class="text-muted"> <?php echo date_format(new DateTime($row['waktu']), "d-M-Y"); ?></small>
      <hr>
      <?php echo $row['isi']; ?>
   </div>
</div>


<div class="card card-light">
   <div class="card-header">
      <h3 class="card-title"><strong>DATA KK</strong></h3>
      <div class="card-tools">
         <a href="index.php?halaman=tambahkk" class="btn btn-tool btn-default border border-secondary"><i class="fa fa-plus-circle fa-lg text-primary pt-1 mr-1"></i><strong>Tambah</strong></a>
         </button>
      </div>
   </div>
   <div class="card-body table-responsive table-sm p-2">
      <table id="datakeluarga" class="table table-bordered table-head-fixed text-nowrap">
         <thead>
            <tr>
               <th class="text-center">#</th>
               <th>no. KK</th>
               <th>opsi</th>
            </tr>
         </thead>
         <tbody>
            <?php $nomor = 1; ?>
            <?php $take = $connect->query("SELECT * FROM kartu_keluarga ORDER BY id_keluarga DESC") ?>
            <?php while ($row = $take->fetch_assoc()) { ?>
               <tr>
                  <td class="text-center"><?php echo $nomor; ?></td>
                  <td><?php echo $row['nomor_kk']; ?></td>
                  <td class="text-center">

                     <div class="btn-group btn-group-sm">
                        <a href="index.php?halaman=editkk&id=<?php echo $row['id_keluarga']; ?>" class="btn btn-default mr-2"><i class="fas fa-cog text-success mr-1"></i>Edit</a>
                        <!-- <a href="index.php?halaman=detailkk&id=<?php echo $row['id_keluarga']; ?>" class="btn btn-default"><i class="fas fa-trash-alt text-danger mr-1"></i>detail</a> -->
                     </div>

                  </td>
               </tr>
               <?php $nomor++; ?>
            <?php } ?>
         </tbody>
      </table>
   </div>
</div>
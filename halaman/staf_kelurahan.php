<!-- <div class="card rounded-0 border bg-transparent elevation-0">

</div> -->

<div class="card">
   <div class="card-header">
      <h3 class="card-title text-secondary"><i class="fas fa-phone-square mr-2 text-primary"></i><strong>No. Telepon Penting</strong></h3>
   </div>
   <div class="card-body">
      <div class="row">
         <?php $take = $connect->query("SELECT * FROM staf_kelurahan"); ?>
         <?php while ($row = $take->fetch_assoc()) { ?>
            <div class="col-12 col-sm-6 col-md-6 d-flex align-items-stretch flex-column">
               <!-- <div class="card d-flex flex-fill">
               <div class="card-body pb-1">
                  <div class="row">
                     <div class="col-7">
                        <h2 class="lead"><b><?php echo $row['nama']; ?></b></h2>
                        <hr>
                        <ul class="ml-4 mb-0 fa-ul text-muted">
                           <li class="small mt-2"><span class="fa-li"><i class="fas fa-sitemap"></i></span><b>Jabatan : </b><?php echo $row['jabatan']; ?></li>
                           <li class="small mt-2"><span class="fa-li"><i class="fas fa-lg fa-map-marker-alt"></i></span><b>Alamat : </b><?php echo $row['alamat']; ?></li>
                           <li class="small mt-2"><span class="fa-li"><i class="fas fa-lg fa-phone"></i></span><b>No.Hp : </b><?php echo $row['tlpn_staf']; ?></li>
                        </ul>
                     </div>
                     <div class="col-5 text-center">
                        <img src="foto_admin/<?php echo $row['foto_staf']; ?>" alt="" class="img-square rounded img-fluid" onerror="this.onerror=null; this.src='admin/assets/img/default.png'">
                     </div>
                  </div>
               </div>
               <div class="card-footer p-2">
                  <div class="text-right">
                     <a href="whatsapp://send?phone=62<?php echo $row['tlpn_staf']; ?>&text=test" class="btn btn-sm text-danger">
                        <i class="far fa-lg fa-comment-alt"></i>
                     </a>
                  </div>
               </div>
            </div> -->


               <div class="card p-2 border elevation-0">
                  <div class="row">
                     <div class="col-8 pr-0">
                        <table class="table table-bordered table-sm mb-0">
                           <tbody>
                              <tr>
                                 <th scope="row" style="width: 24%" class="bg-light text-sm">Nama</th>
                                 <td class="text-sm"><?php echo $row['nama']; ?></td>
                              </tr>
                              <tr>
                                 <th scope="row" class="bg-light text-sm">Jabatan</th>
                                 <td class="text-sm"><?php echo $row['jabatan']; ?></td>
                              </tr>
                              <tr>
                                 <th scope="row" class="bg-light text-sm">Alamat</th>
                                 <td class="text-sm"><?php echo $row['alamat']; ?></td>
                              </tr>
                              <tr>
                                 <th scope="row" class="bg-light text-sm">No. Hp</th>
                                 <td class="text-sm pb-0">
                                    <?php echo $row['tlpn_staf']; ?>

                                    <a href="whatsapp://send?phone=62<?php echo $row['tlpn_staf']; ?>&text=test" class="btn text-success float-right py-0 pr-0">
                                       <i class="fab fa-lg fa-whatsapp"></i>
                                    </a>

                                 </td>
                              </tr>
                           </tbody>
                        </table>
                     </div>
                     <div class="col-4">
                        <img src="foto_admin/<?php echo $row['foto_staf']; ?>" alt="" class="img-square rounded img-fluid" onerror="this.onerror=null; this.src='admin/assets/img/default.png'">
                     </div>
                  </div>
               </div>


            </div>
         <?php } ?>
      </div>
   </div>
</div>
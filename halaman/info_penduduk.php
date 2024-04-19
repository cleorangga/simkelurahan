<div class="card">
   <div class="card-header">
      <h3 class="card-title text-secondary"><i class="fas fa-chart-pie mr-2 text-primary"></i><strong>Info Kependudukan</strong></h3>
   </div>
   <div class="card-body">
      <div class="row">
         <div class="col-md-12">
            <div class="card border elevation-0">
               <div class="card-body p-2">
                  <ul class="nav nav-pills ml-auto p-2">
                     <li class="nav-item"><a class="nav-link active" href="#tab_1" data-toggle="tab">Data Wilayah</a></li>
                     <li class="nav-item"><a class="nav-link" href="#tab_2" data-toggle="tab">Jenis Kelamin</a></li>
                     <li class="nav-item"><a class="nav-link" href="#tab_3" data-toggle="tab">Status Kawin</a></li>
                     <li class="nav-item"><a class="nav-link" href="#tab_4" data-toggle="tab">Agama</a></li>
                     <li class="nav-item"><a class="nav-link" href="#tab_5" data-toggle="tab">Golongan Darah</a></li>
                  </ul>
                  <div class="tab-content">
                     <div class="tab-pane active" id="tab_1">
                        <canvas id="piechartpenduduk" style="min-height: 200px; height: 200px; max-height: 200px; max-width: 100%;"></canvas>
                        <table class="table table-hover table-bordered text-nowrap table-sm">
                           <thead>
                              <tr>
                                 <th>Wilayah</th>
                                 <th>Jumlah</th>
                              </tr>
                           </thead>
                           <tbody>
                              <tr>
                                 <td>Lingkungan 1</td>
                                 <td>
                                    <?php
                                    $ling1 = mysqli_query($connect, "SELECT * FROM data_penduduk where alamat='Lingkungan 1, Kelurahan Rinegetan'");
                                    echo mysqli_num_rows($ling1);
                                    ?>
                                 </td>
                              </tr>
                              <tr>
                                 <td>Lingkungan 2</td>
                                 <td>
                                    <?php
                                    $ling2 = mysqli_query($connect, "SELECT * FROM data_penduduk where alamat='Lingkungan 2, Kelurahan Rinegetan'");
                                    echo mysqli_num_rows($ling2);
                                    ?>
                                 </td>
                              </tr>
                              <tr>
                                 <td>Lingkungan 3</td>
                                 <td>
                                    <?php
                                    $ling3 = mysqli_query($connect, "SELECT * FROM data_penduduk where alamat='Lingkungan 3, Kelurahan Rinegetan'");
                                    echo mysqli_num_rows($ling3);
                                    ?>
                                 </td>
                              </tr>
                              <tr>
                                 <td>Lingkungan 4</td>
                                 <td>
                                    <?php
                                    $ling4 = mysqli_query($connect, "SELECT * FROM data_penduduk where alamat='Lingkungan 4, Kelurahan Rinegetan'");
                                    echo mysqli_num_rows($ling4);
                                    ?>
                                 </td>
                              </tr>
                              <tr>
                                 <td>Lingkungan 5</td>
                                 <td>
                                    <?php
                                    $ling5 = mysqli_query($connect, "SELECT * FROM data_penduduk where alamat='Lingkungan 5, Kelurahan Rinegetan'");
                                    echo mysqli_num_rows($ling5);
                                    ?>
                                 </td>
                              </tr>
                           </tbody>
                           <tfoot>
                              <tr>
                                 <td colspan="1"><strong>Total :</strong></td>
                                 <td>
                                    <strong>
                                       <?php
                                       $total = mysqli_query($connect, "SELECT * FROM data_penduduk");
                                       echo mysqli_num_rows($total);
                                       ?>
                                    </strong>
                                 </td>
                              </tr>
                           </tfoot>
                        </table>
                     </div>
                     <div class="tab-pane" id="tab_2">
                        <canvas id="jeniskelamin" style="min-height: 200px; height: 200px; max-height: 200px; max-width: 100%;"></canvas>
                        <table class="table table-hover table-bordered text-nowrap table-sm">
                           <thead>
                              <tr>
                                 <th>Jenis Kelamin</th>
                                 <th>Jumlah</th>
                              </tr>
                           </thead>
                           <tbody>
                              <tr>
                                 <td>Laki-laki</td>
                                 <td>
                                    <?php
                                    $laki_laki = mysqli_query($connect, "SELECT * FROM data_penduduk where jenis_kelamin='Laki-laki'");
                                    echo mysqli_num_rows($laki_laki);
                                    ?>
                                 </td>
                              </tr>
                              <tr>
                                 <td>Perempuan</td>
                                 <td>
                                    <?php
                                    $perempuan = mysqli_query($connect, "SELECT * FROM data_penduduk where jenis_kelamin='Perempuan'");
                                    echo mysqli_num_rows($perempuan);
                                    ?>
                                 </td>
                              </tr>
                           </tbody>
                           <tfoot>
                              <tr>
                                 <td colspan="1"><strong>Total :</strong></td>
                                 <td>
                                    <strong>
                                       <?php
                                       $total = mysqli_query($connect, "SELECT * FROM data_penduduk");
                                       echo mysqli_num_rows($total);
                                       ?>
                                    </strong>
                                 </td>
                              </tr>
                           </tfoot>
                        </table>
                     </div>
                     <div class="tab-pane" id="tab_3">
                        <canvas id="statusnikah" style="min-height: 200px; height: 200px; max-height: 200px; max-width: 100%;"></canvas>
                        <table class="table table-hover table-bordered text-nowrap table-sm">
                           <thead>
                              <tr>
                                 <th>Status</th>
                                 <th>Jumlah</th>
                              </tr>
                           </thead>
                           <tbody>
                              <tr>
                                 <td>Kawin</td>
                                 <td>
                                    <?php
                                    $kawin = mysqli_query($connect, "SELECT * FROM data_penduduk where status_nikah='Kawin'");
                                    echo mysqli_num_rows($kawin);
                                    ?>
                                 </td>
                              </tr>
                              <tr>
                                 <td>Belum</td>
                                 <td>
                                    <?php
                                    $belum = mysqli_query($connect, "SELECT * FROM data_penduduk where status_nikah='Belum'");
                                    echo mysqli_num_rows($belum);
                                    ?>
                                 </td>
                              </tr>
                              <tr>
                                 <td>Cerai hidup</td>
                                 <td>
                                    <?php
                                    $ceraiH = mysqli_query($connect, "SELECT * FROM data_penduduk where status_nikah='Cerai hidup'");
                                    echo mysqli_num_rows($ceraiH);
                                    ?>
                                 </td>
                              </tr>
                              <tr>
                                 <td>Cerai mati</td>
                                 <td>
                                    <?php
                                    $ceraiM = mysqli_query($connect, "SELECT * FROM data_penduduk where status_nikah='Cerai mati'");
                                    echo mysqli_num_rows($ceraiM);
                                    ?>
                                 </td>
                              </tr>
                           </tbody>
                           <tfoot>
                              <tr>
                                 <td colspan="1"><strong>Total :</strong></td>
                                 <td>
                                    <strong>
                                       <?php
                                       $total = mysqli_query($connect, "SELECT * FROM data_penduduk");
                                       echo mysqli_num_rows($total);
                                       ?>
                                    </strong>
                                 </td>
                              </tr>
                           </tfoot>
                        </table>
                     </div>
                     <div class="tab-pane" id="tab_4">
                        <canvas id="agama" style="min-height: 200px; height: 200px; max-height: 200px; max-width: 100%;"></canvas>
                        <table class="table table-hover table-bordered text-nowrap table-sm">
                           <thead>
                              <tr>
                                 <th>Agama</th>
                                 <th>Jumlah</th>
                              </tr>
                           </thead>
                           <tbody>
                              <tr>
                                 <td>Kristen</td>
                                 <td>
                                    <?php
                                    $kristen = mysqli_query($connect, "SELECT * FROM data_penduduk where agama='Kristen Protestan'");
                                    echo mysqli_num_rows($kristen);
                                    ?>
                                 </td>
                              </tr>
                              <tr>
                                 <td>Islam</td>
                                 <td>
                                    <?php
                                    $islam = mysqli_query($connect, "SELECT * FROM data_penduduk where agama='Islam'");
                                    echo mysqli_num_rows($islam);
                                    ?>
                                 </td>
                              </tr>
                              <tr>
                                 <td>Katolik</td>
                                 <td>
                                    <?php
                                    $katolik = mysqli_query($connect, "SELECT * FROM data_penduduk where agama='Kristen Katolik'");
                                    echo mysqli_num_rows($katolik);
                                    ?>
                                 </td>
                              </tr>
                              <tr>
                                 <td>Hindu</td>
                                 <td>
                                    <?php
                                    $hindu = mysqli_query($connect, "SELECT * FROM data_penduduk where agama='Hindu'");
                                    echo mysqli_num_rows($hindu);
                                    ?>
                                 </td>
                              </tr>
                              <tr>
                                 <td>Buddha</td>
                                 <td>
                                    <?php
                                    $buddha = mysqli_query($connect, "SELECT * FROM data_penduduk where agama='Buddha'");
                                    echo mysqli_num_rows($buddha);
                                    ?>
                                 </td>
                              </tr>
                              <tr>
                                 <td>Khonghucu</td>
                                 <td>
                                    <?php
                                    $khonghucu = mysqli_query($connect, "SELECT * FROM data_penduduk where agama='Khonghucu'");
                                    echo mysqli_num_rows($khonghucu);
                                    ?>
                                 </td>
                              </tr>
                           </tbody>
                           <tfoot>
                              <tr>
                                 <td colspan="1"><strong>Total :</strong></td>
                                 <td>
                                    <strong>
                                       <?php
                                       $total = mysqli_query($connect, "SELECT * FROM data_penduduk");
                                       echo mysqli_num_rows($total);
                                       ?>
                                    </strong>
                                 </td>
                              </tr>
                           </tfoot>
                        </table>
                     </div>
                     <div class="tab-pane" id="tab_5">
                        <canvas id="golongandarah" style="min-height: 200px; height: 200px; max-height: 200px; max-width: 100%;"></canvas>
                     </div>
                     <!-- /.tab-pane -->
                  </div>

               </div>
               <!-- /.card-body -->
            </div>
         </div>
      </div>
   </div>
</div>
<!-- <?php print_r($_SESSION["user"]); ?> -->




<div class="card">
   <div class="card-body">
      <h3 class="text-center">
         <small class="font-weight-bold text-muted">Visi</small>
      </h3>
      <h4 class="text-center">
         <small class="text-muted">Maju dalam ekonomi dan budaya, berdaulat adil sejahtera dan semakin hebat.</small>
      </h4>
      <h3 class="text-center">
         <small class="font-weight-bold text-muted">Misi</small>
      </h3>
      <ul class="mr-3">
         <li>
            <h4>
               <small class="text-muted">Meningkatkan kualitas sumber daya manusia</small>
            </h4>
         </li>
         <li>
            <h4>
               <small class="text-muted">Meningkatkan kesejahteraan masyarakat dengan etos kerja dan pengelolaan lingkungan yang baik dan lestari</small>
            </h4>
         </li>
         <li>
            <h4>
               <small class="text-muted">Meningkatkan pemerataan kesejahteraan masyarakat yang berkeadilan</small>
            </h4>
         </li>
      </ul>
   </div>
</div>

<div class="card">
   <!-- MAP -->
   <div class="card-header border-0 text-secondary"><i class="far fa-map mr-2 text-primary"></i><strong>Lokasi Kantor Kelurahan</strong></div>
   <!-- <div id="map"></div>
   <script>
      var myIcon = L.icon({
         iconUrl: 'admin/assets/img/marker2.png',
         iconSize: [31, 31]
      });
      var map = L.map('map').setView([1.2993794, 124.9053072, 19], 17);
      L.tileLayer('http://{s}.google.com/vt/lyrs=m&x={x}&y={y}&z={z}', {
         subdomains: ['mt0', 'mt1', 'mt2', 'mt3']
      }).addTo(map);
      var marker = L.marker([1.300228076982101, 124.90621115293402], {
            icon: myIcon
         }).addTo(map)
         .bindPopup('<img src="admin/assets/img/kantorlurah.png" style="max-height: 80px; max-width: 100%"><hr class="mb-1 mt-2">Kantor Lurah Rinegetan', {
            closeButton: false
         })
      // marker.on('mouseover', function(e) {
      //    this.openPopup();                         mouse hover popup
      // });
      // marker.on('mouseout', function(e) {
      //    this.closePopup();
      // });
   </script> -->

   <div class="map-responsive">
      <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d997.1978641099546!2d124.9057176291494!3d1.2999505407006073!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x32871489de2056cf%3A0xaca9d4478d9e0cd3!2sKantor%20Lurah%20Rinegetan!5e0!3m2!1sen!2sid!4v1651161372525!5m2!1sen!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
   </div>
</div>
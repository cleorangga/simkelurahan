<script src="admin/plugins/jquery/jquery.min.js"></script>
<script src="admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="admin/assets/js/adminlte.min.js"></script>
<script src="admin/assets/js/demo.js"></script>
<script src="admin/plugins/jquery-ui/jquery-ui.min.js"></script>
<script src="admin/plugins/chart.js/Chart.min.js"></script>
<script src="admin/plugins/chart.js/chartjs-plugin-labels.min.js"></script> <!-- script ekstensi  label chartjs -->



<script>
   //
   $(document).ready(function() {
      $("#dialog").dialog({
         modal: true,
         resizable: false,
         width: 240,
         hide: "fade",
         show: "fade",
         dialogClass: 'dialogWithDropShadow',
         autoOpen: true,
         buttons: {
            Ok: function() {
               $(this).dialog("close");
            }
         }
      }).prev(".ui-dialog-titlebar").css("background", "#343a40");
   });
</script>
<script>
   $(document).ready(function() {
      $("#logout").dialog({
         modal: true,
         resizable: false,
         width: 240,
         hide: "fade",
         show: "fade",
         dialogClass: 'dialogWithDropShadow',
         autoOpen: false
      }).prev(".ui-dialog-titlebar").css("background", "#343a40");
   });

   $(".confirmLogout").click(function(e) {
      e.preventDefault();
      var targetUrl = $(this).attr("href");

      $("#logout").dialog('option', 'buttons', {
         "Konfirmasi": function() {
            window.location.href = targetUrl;
         },
         "Batal": function() {
            $(this).dialog("close");
         }
      });

      $("#logout").dialog("open");
   });
</script>
<script>
   $(document).ready(function() {
      $("#login").dialog({
         modal: true,
         resizable: false,
         width: 240,
         hide: "fade",
         show: "fade",
         dialogClass: 'dialogWithDropShadow',
         autoOpen: false
      }).prev(".ui-dialog-titlebar").css("background", "#343a40");
   });

   $(".confirmLogin").click(function(e) {
      e.preventDefault();
      var targetUrl = $(this).attr("href");

      $("#login").dialog('option', 'buttons', {
         "Konfirmasi": function() {
            window.location.href = "login.php";
         },
         "Batal": function() {
            $(this).dialog("close");
         }
      });

      $("#login").dialog("open");
   });
</script>
<script>
   //chart status kawin
   $(function() {
      var pieChartCanvas = $('#statusnikah').get(0).getContext('2d')
      var pieData = {
         labels: [
            'KAWIN',
            'BELUM KAWIN',
            'CERAI HIDUP',
            'CERAI MATI'
         ],
         datasets: [{
            data: [
               <?php
               $kawin = mysqli_query($connect, "SELECT * FROM data_penduduk where status_nikah='Kawin'");
               echo mysqli_num_rows($kawin);
               ?>,
               <?php
               $belum = mysqli_query($connect, "SELECT * FROM data_penduduk where status_nikah='Belum'");
               echo mysqli_num_rows($belum);
               ?>,
               <?php
               $ceraiH = mysqli_query($connect, "SELECT * FROM data_penduduk where status_nikah='Cerai hidup'");
               echo mysqli_num_rows($ceraiH);
               ?>,
               <?php
               $ceraiM = mysqli_query($connect, "SELECT * FROM data_penduduk where status_nikah='Cerai mati'");
               echo mysqli_num_rows($ceraiM);
               ?>
            ],
            backgroundColor: [
               'rgba(255, 89, 94, 1)',
               'rgba(255, 202, 58, 1)',
               'rgba(25, 130, 196, 1)',
               'rgba(138, 201, 38, 1)'
            ],
            borderWidth: 0,
            hoverBorderWidth: 3,
            hoverBorderColor: '#fff'
         }]
      }
      var pieOptions = {
         onHover: function(evt, elements) {
            if (elements && elements.length) {
               segment = elements[0];
               this.chart.update();
               selectedIndex = segment["_index"];
               segment._model.outerRadius += 5;
            } else {
               if (segment) {
                  segment._model.outerRadius -= 5;
               }
               segment = null;
            }
         },
         maintainAspectRatio: false,
         responsive: true,
         intersect: false,
         plugins: {
            labels: {
               render: (arguments) => {
                  return arguments.value
               },
               fontSize: 14,
               fontColor: '#fff',
               textMargin: 8,
            }
         },
         legend: {
            position: 'left',
            align: 'end',
            labels: {
               usePointStyle: false,
               boxWidth: 14,
            }
         },
         animation: {
            duration: 1400
         },
         layout: {
            padding: {
               left: 10,
               right: 10,
               top: 10,
               bottom: 10,
            }
         },
         title: {
            display: false,
            text: '',
            fontSize: '20'
         },
         tooltips: {
            callbacks: {
               label: function(tooltipItem, data) {
                  var dataset = data.datasets[tooltipItem.datasetIndex];
                  var meta = dataset._meta[Object.keys(dataset._meta)[0]];
                  var total = meta.total;
                  var currentValue = dataset.data[tooltipItem.index];
                  var percentage = parseFloat((currentValue / total * 100).toFixed(1));
                  return currentValue + ' orang' + ' (' + percentage + '% dari keseluruhan Penduduk)';
               },
               title: function(tooltipItem, data) {
                  return data.labels[tooltipItem[0].index];
               }
            }
         },
      }
      var pieChart = new Chart(pieChartCanvas, {
         type: 'pie',
         data: pieData,
         options: pieOptions
      })
   });
</script>
<script>
   //chart data agama
   $(function() {
      var pieChartCanvas = $('#agama').get(0).getContext('2d')
      var pieData = {
         labels: [
            'ISLAM',
            'KRISTEN PROTESTAN',
            'KRISTEN KATOLIK',
            'HINDU',
            'BUDDHA',
            'KHONGHUCU'
         ],
         datasets: [{
            data: [
               <?php
               $islam = mysqli_query($connect, "SELECT * FROM data_penduduk where agama='Islam'");
               echo mysqli_num_rows($islam);
               ?>,
               <?php
               $kristen = mysqli_query($connect, "SELECT * FROM data_penduduk where agama='Kristen Protestan'");
               echo mysqli_num_rows($kristen);
               ?>,
               <?php
               $katolik = mysqli_query($connect, "SELECT * FROM data_penduduk where agama='Kristen Katolik'");
               echo mysqli_num_rows($katolik);
               ?>,
               <?php
               $hindu = mysqli_query($connect, "SELECT * FROM data_penduduk where agama='Hindu'");
               echo mysqli_num_rows($hindu);
               ?>,
               <?php
               $buddha = mysqli_query($connect, "SELECT * FROM data_penduduk where agama='Buddha'");
               echo mysqli_num_rows($buddha);
               ?>,
               <?php
               $khonghucu = mysqli_query($connect, "SELECT * FROM data_penduduk where agama='Khonghucu'");
               echo mysqli_num_rows($khonghucu);
               ?>
            ],
            backgroundColor: [


               'rgba(138, 201, 38, 1)',
               'rgba(25, 130, 196, 1)',
               'rgba(138, 101, 38, 1)',
               'rgba(255, 202, 58, 1)',
               'rgba(255, 122, 58, 1)',
               'rgba(255, 89, 94, 1)'


            ],
            borderWidth: 0,
            hoverBorderWidth: 3,
            hoverBorderColor: '#fff',
         }]
      }
      var pieOptions = {
         onHover: function(evt, elements) {
            if (elements && elements.length) {
               segment = elements[0];
               this.chart.update();
               selectedIndex = segment["_index"];
               segment._model.outerRadius += 5;
            } else {
               if (segment) {
                  segment._model.outerRadius -= 5;
               }
               segment = null;
            }
         },
         maintainAspectRatio: false,
         responsive: true,
         intersect: false,
         plugins: {
            labels: {
               render: (arguments) => {
                  return arguments.value
               },
               fontSize: 14,
               fontColor: '#fff',
               textMargin: 8,
            }
         },
         legend: {
            position: 'left',
            align: 'end',
            labels: {
               usePointStyle: false,
               boxWidth: 14,
            }
         },
         animation: {
            duration: 1400
         },
         layout: {
            padding: {
               left: 10,
               right: 10,
               top: 10,
               bottom: 10,
            }
         },
         title: {
            display: false,
            text: '',
            fontSize: '20'
         },
         tooltips: {
            callbacks: {
               label: function(tooltipItem, data) {
                  var dataset = data.datasets[tooltipItem.datasetIndex];
                  var meta = dataset._meta[Object.keys(dataset._meta)[0]];
                  var total = meta.total;
                  var currentValue = dataset.data[tooltipItem.index];
                  var percentage = parseFloat((currentValue / total * 100).toFixed(1));
                  return currentValue + ' orang' + ' (' + percentage + '% dari keseluruhan Penduduk)';
               },
               title: function(tooltipItem, data) {
                  return data.labels[tooltipItem[0].index];
               }
            }
         },
      }
      var pieChart = new Chart(pieChartCanvas, {
         type: 'pie',
         data: pieData,
         options: pieOptions
      })
   });
</script>
<script>
   //chart data penduduk
   $(function() {
      var pieChartCanvas = $('#piechartpenduduk').get(0).getContext('2d')
      var pieData = {
         labels: [
            'LINGKUNGAN I',
            'LINGKUNGAN II',
            'LINGKUNGAN III',
            'LINGKUNGAN IV',
            'LINGKUNGAN V',
         ],
         datasets: [{
            data: [
               <?php
               $ling1 = mysqli_query($connect, "SELECT * FROM data_penduduk where alamat='Lingkungan 1, Kelurahan Rinegetan'");
               echo mysqli_num_rows($ling1);
               ?>,
               <?php
               $ling2 = mysqli_query($connect, "SELECT * FROM data_penduduk where alamat='Lingkungan 2, Kelurahan Rinegetan'");
               echo mysqli_num_rows($ling2);
               ?>,
               <?php
               $ling3 = mysqli_query($connect, "SELECT * FROM data_penduduk where alamat='Lingkungan 3, Kelurahan Rinegetan'");
               echo mysqli_num_rows($ling3);
               ?>,
               <?php
               $ling4 = mysqli_query($connect, "SELECT * FROM data_penduduk where alamat='Lingkungan 4, Kelurahan Rinegetan'");
               echo mysqli_num_rows($ling4);
               ?>,
               <?php
               $ling5 = mysqli_query($connect, "SELECT * FROM data_penduduk where alamat='Lingkungan 5, Kelurahan Rinegetan'");
               echo mysqli_num_rows($ling5);
               ?>,
            ],
            backgroundColor: [
               'rgba(106, 76, 147, 1)',
               'rgba(255, 89, 94, 1)',
               'rgba(255, 202, 58, 1)',
               'rgba(138, 201, 38, 1)',
               'rgba(25, 130, 196, 1)'
            ],

            borderWidth: 0,
            hoverBorderWidth: 3,
            hoverBorderColor: '#fff',
         }]
      }
      var pieOptions = {
         onHover: function(evt, elements) {
            if (elements && elements.length) {
               segment = elements[0];
               this.chart.update();
               selectedIndex = segment["_index"];
               segment._model.outerRadius += 5;
            } else {
               if (segment) {
                  segment._model.outerRadius -= 5;
               }
               segment = null;
            }
         },
         maintainAspectRatio: false,
         responsive: true,
         intersect: false,
         plugins: {
            labels: {
               render: (arguments) => {
                  return arguments.value
               },
               fontSize: 14,
               fontColor: '#fff',
               textMargin: 8,
            }
         },
         legend: {
            position: 'left',
            align: 'end',
            labels: {
               usePointStyle: false,
               boxWidth: 14,
            }
         },
         animation: {
            duration: 1400
         },
         layout: {
            padding: {
               left: 10,
               right: 10,
               top: 10,
               bottom: 10,
            }

         },
         title: {
            display: false,
            text: '',
            fontSize: '20'
         },
         tooltips: {
            callbacks: {
               label: function(tooltipItem, data) {
                  var dataset = data.datasets[tooltipItem.datasetIndex];
                  var meta = dataset._meta[Object.keys(dataset._meta)[0]];
                  var total = meta.total;
                  var currentValue = dataset.data[tooltipItem.index];
                  var percentage = parseFloat((currentValue / total * 100).toFixed(1));
                  return currentValue + ' orang' + ' (' + percentage + '% dari keseluruhan Penduduk)';
               },
               title: function(tooltipItem, data) {
                  return data.labels[tooltipItem[0].index];
               }
            }
         },
      }
      var pieChart = new Chart(pieChartCanvas, {
         type: 'pie',
         data: pieData,
         options: pieOptions
      })
   });
</script>
<script>
   //chart golongan darah
   $(function() {
      var pieChartCanvas = $('#golongandarah').get(0).getContext('2d')
      var pieData = {
         labels: [
            'A',
            'B',
            'AB',
            'O',
            'A+',
            'A-',
            'B+',
            'B-',
            'AB+',
            'AB-',
            'O+',
            'O-',
            'Tidak Tahu'
         ],
         datasets: [{
            data: [
               <?php
               $darahA = mysqli_query($connect, "SELECT * FROM data_penduduk where golongan_darah='A'");
               echo mysqli_num_rows($darahA);
               ?>,
               <?php
               $darahB = mysqli_query($connect, "SELECT * FROM data_penduduk where golongan_darah='B'");
               echo mysqli_num_rows($darahB);
               ?>,
               <?php
               $darahAB = mysqli_query($connect, "SELECT * FROM data_penduduk where golongan_darah='AB'");
               echo mysqli_num_rows($darahAB);
               ?>,
               <?php
               $darahO = mysqli_query($connect, "SELECT * FROM data_penduduk where golongan_darah='O'");
               echo mysqli_num_rows($darahO);
               ?>,
               <?php
               $darahApositif = mysqli_query($connect, "SELECT * FROM data_penduduk where golongan_darah='A+'");
               echo mysqli_num_rows($darahApositif);
               ?>,
               <?php
               $darahAnegatif = mysqli_query($connect, "SELECT * FROM data_penduduk where golongan_darah='A-'");
               echo mysqli_num_rows($darahAnegatif);
               ?>,
               <?php
               $darahBpositif = mysqli_query($connect, "SELECT * FROM data_penduduk where golongan_darah='B+'");
               echo mysqli_num_rows($darahBpositif);
               ?>,
               <?php
               $darahBnegatif = mysqli_query($connect, "SELECT * FROM data_penduduk where golongan_darah='B-'");
               echo mysqli_num_rows($darahBnegatif);
               ?>,
               <?php
               $darahABpositif = mysqli_query($connect, "SELECT * FROM data_penduduk where golongan_darah='AB+'");
               echo mysqli_num_rows($darahABpositif);
               ?>,
               <?php
               $darahABnegatif = mysqli_query($connect, "SELECT * FROM data_penduduk where golongan_darah='AB-'");
               echo mysqli_num_rows($darahABnegatif);
               ?>,
               <?php
               $darahOpositif = mysqli_query($connect, "SELECT * FROM data_penduduk where golongan_darah='O+'");
               echo mysqli_num_rows($darahOpositif);
               ?>,
               <?php
               $darahOnegatif = mysqli_query($connect, "SELECT * FROM data_penduduk where golongan_darah='O-'");
               echo mysqli_num_rows($darahOnegatif);
               ?>,
               <?php
               $tidaktahu = mysqli_query($connect, "SELECT * FROM data_penduduk where golongan_darah=''");
               echo mysqli_num_rows($tidaktahu);
               ?>,
            ],
            backgroundColor: [
               'rgba(20, 70, 160, 1)',
               'rgba(219, 48, 105, 1)',
               'rgba(245, 213, 71, 1)',
               'rgba(106, 76, 147, 1)',
               'rgba(60, 60, 59, 1)',
               'rgba(239, 189, 235, 1)',
               'rgba(141, 170, 157, 1)',
               'rgba(15, 14, 14, 1)',
               'rgba(145, 166, 255, 1)',
               'rgba(104, 142, 38, 1)',
               'rgba(245, 133, 63, 1)',
               'rgba(167, 29, 49, 1)',
               'rgba(193, 255, 155, 1)',
            ],

            borderWidth: 0,
            hoverBorderWidth: 3,
            hoverBorderColor: '#fff'
         }]
      }
      var pieOptions = {
         onHover: function(evt, elements) {
            if (elements && elements.length) {
               segment = elements[0];
               this.chart.update();
               selectedIndex = segment["_index"];
               segment._model.outerRadius += 5;
            } else {
               if (segment) {
                  segment._model.outerRadius -= 5;
               }
               segment = null;
            }
         },
         maintainAspectRatio: false,
         responsive: true,
         intersect: false,
         plugins: {
            labels: {
               render: (arguments) => {
                  return arguments.value
               },
               fontSize: 14,
               fontColor: '#fff',
               textMargin: 8,
            }
         },
         legend: {
            position: 'left',
            align: 'end',
            labels: {
               usePointStyle: false,
               boxWidth: 14,
            }
         },
         animation: {
            duration: 1400
         },
         layout: {
            padding: {
               left: 6,
               right: 6,
               top: 2,
               bottom: 2,
            }
         },
         title: {
            display: false,
            text: '',
            fontSize: '20'
         },
         tooltips: {
            callbacks: {
               label: function(tooltipItem, data) {
                  var dataset = data.datasets[tooltipItem.datasetIndex];
                  var meta = dataset._meta[Object.keys(dataset._meta)[0]];
                  var total = meta.total;
                  var currentValue = dataset.data[tooltipItem.index];
                  var percentage = parseFloat((currentValue / total * 100).toFixed(1));
                  return currentValue + ' orang' + ' (' + percentage + '% dari keseluruhan Penduduk)';
               },
               title: function(tooltipItem, data) {
                  return data.labels[tooltipItem[0].index];
               }
            }
         },
      }
      var pieChart = new Chart(pieChartCanvas, {
         type: 'pie',
         data: pieData,
         options: pieOptions
      })
   });
</script>
<script>
   //chart data jeniskelamin
   $(function() {
      var pieChartCanvas = $('#jeniskelamin').get(0).getContext('2d')
      var pieData = {
         labels: [
            'LAKI-LAKI',
            'PEREMPUAN',
         ],
         datasets: [{
            data: [
               <?php
               $laki_laki = mysqli_query($connect, "SELECT * FROM data_penduduk where jenis_kelamin='Laki-laki'");
               echo mysqli_num_rows($laki_laki);
               ?>,
               <?php
               $perempuan = mysqli_query($connect, "SELECT * FROM data_penduduk where jenis_kelamin='Perempuan'");
               echo mysqli_num_rows($perempuan);
               ?>
            ],
            backgroundColor: [

               'rgba(25, 130, 196, 1)',
               'rgba(255, 89, 94, 1)'


            ],
            borderWidth: 0,
            hoverBorderWidth: 3,
            hoverBorderColor: '#fff'
         }]
      }
      var pieOptions = {
         onHover: function(evt, elements) {
            if (elements && elements.length) {
               segment = elements[0];
               this.chart.update();
               selectedIndex = segment["_index"];
               segment._model.outerRadius += 5;
            } else {
               if (segment) {
                  segment._model.outerRadius -= 5;
               }
               segment = null;
            }
         },
         maintainAspectRatio: false,
         responsive: true,
         intersect: false,
         plugins: {
            labels: {
               render: (arguments) => {
                  return arguments.value
               },
               fontSize: 14,
               fontColor: '#fff',
               textMargin: 8,
            }
         },
         legend: {
            position: 'left',
            align: 'end',
            labels: {
               usePointStyle: false,
               boxWidth: 14,
            }
         },
         animation: {
            duration: 1400
         },
         layout: {
            padding: {
               left: 10,
               right: 10,
               top: 10,
               bottom: 10,
            }
         },
         title: {
            display: false,
            text: '',
            fontSize: '20'
         },
         tooltips: {
            callbacks: {
               label: function(tooltipItem, data) {
                  var dataset = data.datasets[tooltipItem.datasetIndex];
                  var meta = dataset._meta[Object.keys(dataset._meta)[0]];
                  var total = meta.total;
                  var currentValue = dataset.data[tooltipItem.index];
                  var percentage = parseFloat((currentValue / total * 100).toFixed(1));
                  return currentValue + ' orang' + ' (' + percentage + '% dari keseluruhan Penduduk)';
               },
               title: function(tooltipItem, data) {
                  return data.labels[tooltipItem[0].index];
               }
            }
         },
      }
      var pieChart = new Chart(pieChartCanvas, {
         type: 'pie',
         data: pieData,
         options: pieOptions
      })
   });
</script>
<?php
session_start();
include 'connect.php';
if (!isset($_SESSION['admin'])) {
   echo "<script>location='login.php';</script>";
   exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <title>Admin Page</title>
   <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
   <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
   <link rel="stylesheet" href="assets/css/adminlte.min.css">
   <!-- datatables -->
   <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
   <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
   <link rel="stylesheet" href="plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
   <!-- icheck -->
   <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
   <!-- jquery-ui -->
   <link rel="stylesheet" href="plugins/jquery-ui/jquery-ui.min.css">
   <link rel="stylesheet" href="plugins/jquery-ui/jquery-ui.theme.min.css">
   <link rel="stylesheet" href="plugins/jquery-ui/jquery-ui.structure.min.css">
   <!-- select2 -->
   <link rel="stylesheet" href="plugins/select2/css/select2.min.css">
   <link rel="stylesheet" href="plugins/select2/css/select2-bootstrap.min.css">
   <link rel="stylesheet" href="plugins/summernote/summernote-bs4.min.css">
   <style>
      /* width */
      ::-webkit-scrollbar {
         width: 11px;
      }

      /* Track */
      ::-webkit-scrollbar-track {
         background-color: transparent;
      }

      /* Handle */
      ::-webkit-scrollbar-thumb {
         background-color: #d6dee1;
         border-radius: 11px;
         border: 2px solid transparent;
         background-clip: content-box;
      }

      /* Handle on hover */
      ::-webkit-scrollbar-thumb:hover {
         background-color: #a8bbbf;
      }

      div.dt-buttons .dropdown-toggle::after {
         display: none;
      }

      .hide {
         display: none;
      }

      .table>tbody>tr>td {
         vertical-align: middle;
      }

      .dialogWithDropShadow {
         box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.5);
      }

      .ui-dialog-titlebar-close {
         display: none;
      }

      .ui-dialog-title {
         font-size: 110% !important;
         color: #FFFFFF !important;
         text-align: center;
      }

      .ui-dialog .ui-dialog-buttonpane .ui-dialog-buttonset {
         text-align: center;
         float: none;
      }

      .ui-dialog-buttonset {
         width: 100%
      }

      .ui-dialog-buttonset .ui-button:first-child {
         float: left !important;
         margin-left: 5px;
         display: block;
         width: 46%;
      }

      .ui-dialog-buttonset .ui-button:last-child {
         float: right !important;
         display: block;
         width: 46%;
      }

      .ui-dialog-buttonpane {
         padding: 0px !important;
      }

      .ui-button {
         margin-top: 5px !important;
         margin-bottom: 2px !important;
      }

      .page-link {
         color: black !important;
      }

      .page-item.active .page-link {
         background-color: #343a40 !important;
         border: 1px solid #1f2d3d;
         color: white !important;
      }

      .dt-button.active {
         background: #343a40 !important;
      }

      .main-sidebar {
         background-color: #f8f9fa !important
      }

      .main-header {
         background-color: #f8f9fa !important
      }
   </style>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
   <div class="wrapper">
      <nav class="main-header navbar navbar-expand navbar-white navbar-light">
         <ul class="navbar-nav">
            <li class="nav-item">
               <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
         </ul>
         <ul class="navbar-nav ml-auto">
            <div id="logout" title="Logout" style="display: none;" class="text-center">
            <p><i class="fas fa-exclamation-triangle mr-3 text-danger"></i> <br> Kembali ke halaman awal ?</p>
            </div>
            <div id="export" title="Export" style="display: none;" class="text-center">
            <p><i class="fas fa-download mr-3 text-success"></i> <br> Export data penduduk ?</p>
            </div>
            <div id="export1" title="Export" style="display: none;" class="text-center">
            <p><i class="fas fa-download mr-3 text-success"></i> <br> Export data surat ?</p>
            </div>
         </ul>
      </nav>
      <!-- ........................................................................................................................ -->
      <aside class="main-sidebar sidebar-light-danger elevation-1">
         <a href="index.php" class="brand-link">
            <img src="assets/img/admin.png" class="brand-image img-square" style="opacity: .8">
            <span class="brand-text font-weight-bold">A D M I N</span>
         </a>
         <div class="sidebar">
            <nav class="mt-2">
               <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                  <li class="nav-item text-lg">
                     <a href="index.php" class="nav-link">
                        <i class="nav-icon fas fa-home mr-2"></i>
                        <p>Dashboard</p>
                     </a>
                  </li>
                  <li class="nav-item text-lg">
                     <a href="index.php?halaman=penduduk" class="nav-link">
                        <i class="nav-icon fas fa-users mr-2"></i>
                        <p>Kependudukan</p>
                     </a>
                  </li>
                  <li class="nav-item text-lg">
                     <a href="index.php?halaman=kartukeluarga" class="nav-link">
                        <i class="nav-icon fas fa-user-friends mr-2"></i>
                        <p>Data KK</p>
                     </a>
                  </li>
                  <li class="nav-item text-lg">
                     <a href="index.php?halaman=layanansurat" class="nav-link">
                        <i class="nav-icon fas fa-file-alt mr-2"></i>
                        <p>
                           Layanan Surat
                           <?php
                           $take = $connect->query("SELECT * FROM tb_surat WHERE status_surat='0'");
                           $row = $take->num_rows;
                           ?>
                           <?php if ($row > 0) : ?>
                              <span class="right badge badge-warning" id="show-option" title="<?php echo $row; ?> permohonan surat perlu di tindak lanjuti"><?php echo $row; ?></span>
                           <?php endif ?>
                        </p>
                     </a>
                  </li>
                  <li class="nav-item text-lg">
                     <a href="index.php?halaman=user" class="nav-link">
                        <i class="nav-icon fas fa-user-circle mr-2"></i>
                        <p>Data Pengguna</p>
                     </a>
                  </li>
                  <li class="nav-item text-lg">
                     <a href="index.php?halaman=stafkelurahan" class="nav-link">
                        <i class="nav-icon fas fa-id-badge mr-2"></i>
                        <p>staf Kelurahan</p>
                     </a>
                  </li>
                  <li class="nav-item text-lg">
                     <a href="index.php?halaman=publikasi" class="nav-link">
                        <i class="nav-icon fas fa-thumbtack mr-2"></i>
                        <p>Publikasi Umum</p>
                     </a>
                  </li>
                  <li class="nav-item text-lg">
                     <hr>
                     <a href="index.php?halaman=gantipassword" class="nav-link">
                        <i class="nav-icon fas fa-lock mr-2"></i>
                        <p>Menu Admin</p>
                     </a>
                  </li>
                  <li class="nav-item text-lg">
                     <a href="index.php?halaman=logout" class="nav-link confirmLogout">
                        <i class="nav-icon fas fa-sign-out-alt mr-2"></i>
                        <p>Log out</p>
                     </a>
                  </li>
               </ul>
            </nav>
         </div>
      </aside>
      <!-- ........................................................................................................................ -->
      <div class="content-wrapper pt-2">
         <section class="content">
            <?php
            if (isset($_GET['halaman'])) {
               if ($_GET['halaman'] == "penduduk") {
                  include 'penduduk.php';
               } elseif ($_GET['halaman'] == "tambahpenduduk") {
                  include 'tambahpenduduk.php';
               } elseif ($_GET['halaman'] == "hapuspenduduk") {
                  include 'hapuspenduduk.php';
               } elseif ($_GET['halaman'] == "editpenduduk") {
                  include 'editpenduduk.php';
               } elseif ($_GET['halaman'] == "layanansurat") {
                  include 'layanansurat.php';
               } elseif ($_GET['halaman'] == "user") {
                  include 'user.php';
               } elseif ($_GET['halaman'] == "tambahuser") {
                  include 'tambahuser.php';
               } elseif ($_GET['halaman'] == "logout") {
                  include 'logout.php';
               } elseif ($_GET['halaman'] == "stafkelurahan") {
                  include 'stafkelurahan.php';
               } elseif ($_GET['halaman'] == "tambahkontak") {
                  include 'tambahkontak.php';
               } elseif ($_GET['halaman'] == "hapuskontak") {
                  include 'hapuskontak.php';
               } elseif ($_GET['halaman'] == "editkontak") {
                  include 'editkontak.php';
               } elseif ($_GET['halaman'] == "hapususer") {
                  include 'hapususer.php';
               } elseif ($_GET['halaman'] == "edituser") {
                  include 'edituser.php';
               } elseif ($_GET['halaman'] == "detailsurat") {
                  include 'detailsurat.php';
               } elseif ($_GET['halaman'] == "cetaksurat") {
                  include 'cetaksurat.php';
               } elseif ($_GET['halaman'] == "hapussurat") {
                  include 'hapussurat.php';
               } elseif ($_GET['halaman'] == "infokelurahan") {
                  include 'infokelurahan.php';
               } elseif ($_GET['halaman'] == "publikasi") {
                  include 'publikasi.php';
               } elseif ($_GET['halaman'] == "tambahberita") {
                  include 'tambahberita.php';
               } elseif ($_GET['halaman'] == "editberita") {
                  include 'editberita.php';
               } elseif ($_GET['halaman'] == "hapusberita") {
                  include 'hapusberita.php';
               } elseif ($_GET['halaman'] == "gantipassword") {
                  include 'gantipassword.php';
               } elseif ($_GET['halaman'] == "tambahsurat") {
                  include 'tambahsurat.php';
               } elseif ($_GET['halaman'] == "kartukeluarga") {
                  include 'kartukeluarga.php';
               } elseif ($_GET['halaman'] == "tambahkk") {
                  include 'tambahkk.php';
               } elseif ($_GET['halaman'] == "editkk") {
                  include 'editkk.php';
               } elseif ($_GET['halaman'] == "hapusanggota") {
                  include 'hapusanggota.php';
               } elseif ($_GET['halaman'] == "hapuskk") {
                  include 'hapuskk.php';
               } elseif ($_GET['halaman'] == "tambahadmin") {
                  include 'tambahadmin.php';
               }
            } else {
               include 'home.php';
            }
            ?>
         </section>
      </div>
   </div>
   <script src="plugins/jquery/jquery.min.js"></script>
   <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
   <script src="assets/js/adminlte.min.js"></script>
   <script src="assets/js/demo.js"></script>
   <!-- datatables -->
   <script src="plugins/datatables/jquery.dataTables.min.js"></script>
   <script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
   <script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
   <script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
   <script src="plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
   <script src="plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
   <script src="plugins/jszip/jszip.min.js"></script>
   <script src="plugins/pdfmake/pdfmake.min.js"></script>
   <script src="plugins/pdfmake/vfs_fonts.js"></script>
   <script src="plugins/datatables-buttons/js/buttons.html5.min.js"></script>
   <script src="plugins/datatables-buttons/js/buttons.print.min.js"></script>
   <script src="plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
   <!-- bs-custom-file-input -->
   <script src="plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
   <script src="plugins/jquery-ui/jquery-ui.min.js"></script>
   <script src="plugins/select2/js/select2.full.min.js"></script>
   <script src="plugins/summernote/summernote-bs4.min.js"></script>
   <script src="plugins/summernote/lang/summernote-id-ID.min.js"></script>

   <!-- <script src="plugins/bootstrap-input-spinner-master/src/bootstrap-input-spinner.js"></script>
   <script>
      $("input[type='nomorsurat']").inputSpinner()
   </script> -->

   <script>
      //script tambah surat
      $(document).on('change', '.div-toggle', function() {
         var target = $(this).data('target');
         var show = $("option:selected", this).data('show');
         $(target).children().addClass('hide');
         $(show).removeClass('hide');
      });
      $(document).ready(function() {
         $('.div-toggle').trigger('change');
      });
   </script>
   <script>
      //Data Penduduk
      $(function() {
         var currentDate = new Date()
         var day = currentDate.getDate()
         var month = currentDate.getMonth() + 1
         var year = currentDate.getFullYear()
         var d = day + "-" + month + "-" + year;

         var t = $("#datapenduduk").DataTable({

            responsive: {
               details: {
                  // display: $.fn.dataTable.Responsive.display.modal({
                  //    header: function(row) {
                  //       var data = row.data();
                  //       return data[2] + ' ' + '[' + data[1] + ']';
                  //    }
                  // }),
                  renderer: $.fn.dataTable.Responsive.renderer.tableAll({
                     tableClass: 'table-bordered'
                  })
               }
            },
            "lengthChange": false,
            "autoWidth": false,
            "pageLength": 12,
            "buttons": ["copy", "excel", "pdf", "print", "colvis"],
            "pagingType": "full_numbers",
            dom: "<'row'<'col-sm-12 col-md-6'B><'col-sm-12 col-md-6'f>>" + "<'row'<'col-sm-12'tr>>" + "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
            "columnDefs": [{
                  targets: [5, 6, 7, 8, 9, 10],
                  visible: false
               },
               {
                  targets: [0, 1, 3, 11],
                  orderable: false
               }
            ],
            "order": [],
            "language": {
               "paginate": {
                  "first": '<i class="fas fa-angle-double-left"></i>',
                  "previous": '<i class="fas fa-angle-left"></i>',
                  "next": '<i class="fas fa-angle-right"></i>',
                  "last": '<i class="fas fa-angle-double-right"></i>'
               },
               "search": '<i class="fas fa-search"></i>',
               "zeroRecords": "Tidak ada data !",
               "info": "Menampilkan halaman _PAGE_ dari _PAGES_",
               "infoFiltered": "(hasil pencarian)",
               "infoEmpty": "Tidak ada data"
            },
            buttons: [{
                  extend: 'excel',
                  text: '<i class="fas fa-download fa-lg pt-1 mr-1"></i> <strong>EXPORT DATA</strong>',
                  titleAttr: 'export file .xlsx',
                  className: 'btn btn-success btn-sm mr-2 rounded',
                  title: '',
                  exportOptions: {
                     columns: ':not(.notexport)',
                     format: {
                        body: function(data, row, column, node) {
                           return column === 1 ? "\0" + data : data;
                        }
                     }
                  },
                  action: function(e, dt, button, config) {
                     $("#export").dialog({
                        modal: true,
                        width: 230,
                        hide: "fade",
                        show: "fade",
                        dialogClass: 'dialogWithDropShadow',
                        autoOpen: false
                     }).prev(".ui-dialog-titlebar").css("background", "#1d6f42");
                     $("#export").dialog('option', 'buttons', {

                        "Export": function() {

                           $.fn.dataTable.ext.buttons.excelHtml5.action.call(dt.button(button), e, dt, button, config);
                           $(this).dialog("close");
                        },
                        "Batal": function() {
                           $(this).dialog("close");
                        }
                     });
                     $("#export").dialog("open");

                  },
                  sheetName: 'Data Penduduk' + ' ' + d,
                  filename: 'Data Penduduk' + ' ' + d
               },
               {
                  extend: 'colvis',
                  text: '<i class="fas fa-list fa-lg mr-1"></i>',
                  className: 'btn btn-default bg-light btn-sm rounded',
               }
            ]
         });
         t.on('order.dt search.dt', function() {
            t.column(0, {
               search: 'applied',
               order: 'applied'
            }).nodes().each(function(cell, i) {
               cell.innerHTML = i + 1;
               t.cell(cell).invalidate('dom');
            });
         }).draw();
         // .buttons().container().appendTo('#datapenduduk_wrapper .col-md-6:eq(0)');
      });
   </script>
   <script>
      //Data Surat
      $(function() {
         var t = $("#datasurat").DataTable({
            responsive: {
               details: {
                  // display: $.fn.dataTable.Responsive.display.modal({
                  //    header: function(row) {
                  //       var data = row.data();
                  //       return data[2] + ' ' + '[' + data[1] + ']';
                  //    }
                  // }),
                  renderer: $.fn.dataTable.Responsive.renderer.tableAll({
                     tableClass: 'table-bordered'
                  })
               }
            },
            "lengthChange": false,
            "autoWidth": false,
            "pageLength": 11,
            "buttons": ["copy", "excel", "pdf", "print", "colvis"],
            dom: "<'row'<'col-sm-12 col-md-6'B><'col-sm-12 col-md-6'f>>" + "<'row'<'col-sm-12'tr>>" + "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
            "columnDefs": [{
               targets: [0, 2, 3, 4, 5, 6],
               orderable: false
            }],
            "order": [],
            "language": {
               "paginate": {
                  "first": '<i class="fas fa-angle-double-left"></i>',
                  "previous": '<i class="fas fa-angle-left"></i>',
                  "next": '<i class="fas fa-angle-right"></i>',
                  "last": '<i class="fas fa-angle-double-right"></i>'
               },
               "search": '<i class="fas fa-search"></i>',
               "zeroRecords": "Tidak ada data !",
               "info": "Menampilkan halaman _PAGE_ dari _PAGES_",
               "infoFiltered": "(hasil pencarian)",
               "infoEmpty": "Tidak ada data"
            },
            buttons: [{
                  extend: 'excel',
                  text: '<i class="fas fa-download fa-lg pt-1 mr-1"></i> <strong>EXPORT DATA</strong>',
                  className: 'btn btn-success btn-sm mr-2 rounded',
                  title: '',
                  exportOptions: {
                     columns: ':not(.notexport)',
                     format: {
                        body: function(data, row, column, node) {
                           return column === 3 ? "\0" + data : data;
                        }
                     }
                  },
                  action: function(e, dt, button, config) {
                     $("#export1").dialog({
                        modal: true,
                        width: 230,
                        hide: "fade",
                        show: "fade",
                        dialogClass: 'dialogWithDropShadow',
                        autoOpen: false
                     }).prev(".ui-dialog-titlebar").css("background", "#1d6f42");
                     $("#export1").dialog('option', 'buttons', {

                        "Export": function() {

                           $.fn.dataTable.ext.buttons.excelHtml5.action.call(dt.button(button), e, dt, button, config);
                           $(this).dialog("close");
                        },
                        "Batal": function() {
                           $(this).dialog("close");
                        }
                     });
                     $("#export1").dialog("open");

                  },
                  sheetName: 'Surat',
                  filename: 'Surat'
               },
               {
                  extend: 'colvis',
                  text: '<i class="fa fa-list fa-lg mr-1"></i>',
                  className: 'btn btn-default bg-light btn-sm rounded',
               }
            ]
         });
         t.on('order.dt search.dt', function() {
            t.column(0, {
               search: 'applied',
               order: 'applied'
            }).nodes().each(function(cell, i) {
               cell.innerHTML = i + 1;
               t.cell(cell).invalidate('dom');
            });
         }).draw();
      });
   </script>
   <script>
      //Data Pengguna
      $(function() {
         $("#datapengguna").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "pageLength": 11,
            "language": {
               "paginate": {
                  "first": '<i class="fas fa-angle-double-left"></i>',
                  "previous": '<i class="fas fa-angle-left"></i>',
                  "next": '<i class="fas fa-angle-right"></i>',
                  "last": '<i class="fas fa-angle-double-right"></i>'
               },
               "search": '<i class="fas fa-search"></i>',
               "zeroRecords": "Tidak ada data !",
               "info": "Menampilkan halaman _PAGE_ dari _PAGES_",
               "infoFiltered": "(hasil pencarian)",
               "infoEmpty": "Tidak ada data"
            },
            "columnDefs": [{
               targets: [0, 1, 3, 4, 5],
               orderable: false
            }, ],
            "order": [],
            // "buttons": ["copy", "excel", "pdf", "print", "colvis"],
            // "columnDefs": [{
            //    "visible": false,
            //    "targets": [5, 6, 7, 8, 9]
            // }],
            // buttons: 
            // [
            //    {
            //       extend: 'excel',
            //       text: 'excel file',
            //       className: 'btn btn-default btn-sm mr-2',
            //       exportOptions: {
            //          columns: ':not(.notexport)'
            //       },
            //    },
            //    {
            //       extend: 'colvis',
            //       text: 'kolom',
            //       className: 'btn btn-default btn-sm',
            //    }
            // ]
         }).buttons().container().appendTo('#datapengguna_wrapper .col-md-6:eq(0)');
      });
   </script>
   <script>
      //Data KK
      $(function() {
         $("#datakeluarga").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "pageLength": 11,
            "language": {
               "paginate": {
                  "first": '<i class="fas fa-angle-double-left"></i>',
                  "previous": '<i class="fas fa-angle-left"></i>',
                  "next": '<i class="fas fa-angle-right"></i>',
                  "last": '<i class="fas fa-angle-double-right"></i>'
               },
               "search": '<i class="fas fa-search"></i>',
               "zeroRecords": "Tidak ada data !",
               "info": "Menampilkan halaman _PAGE_ dari _PAGES_",
               "infoFiltered": "(hasil pencarian)",
               "infoEmpty": "Tidak ada data"
            },
            "columnDefs": [{
               targets: [0, 1, 2],
               orderable: false
            }, ],
            "order": [],
            // "buttons": ["copy", "excel", "pdf", "print", "colvis"],
            // "columnDefs": [{
            //    "visible": false,
            //    "targets": [5, 6, 7, 8, 9]
            // }],
            // buttons: 
            // [
            //    {
            //       extend: 'excel',
            //       text: 'excel file',
            //       className: 'btn btn-default btn-sm mr-2',
            //       exportOptions: {
            //          columns: ':not(.notexport)'
            //       },
            //    },
            //    {
            //       extend: 'colvis',
            //       text: 'kolom',
            //       className: 'btn btn-default btn-sm',
            //    }
            // ]
         }).buttons().container().appendTo('#datapengguna_wrapper .col-md-6:eq(0)');
      });
   </script>
   <script>
      //Confirm Dialog
      $(document).ready(function() {
         $("#dialog").dialog({
            modal: true,
            resizable: false,
            width: 240,
            hide: "fade",
            show: "fade",
            dialogClass: 'dialogWithDropShadow',
            autoOpen: false
         }).prev(".ui-dialog-titlebar").css("background", "#dc3545");
      });
      $(".confirmLink").click(function(e) {
         e.preventDefault();
         var targetUrl = $(this).attr("href");
         $("#dialog").dialog('option', 'buttons', {
            "Konfirmasi": function() {
               window.location.href = targetUrl;
            },
            "Batal": function() {
               $(this).dialog("close");
            }
         });
         $("#dialog").dialog("open");
      });
   </script>
   <script>
      //Confirm Logout
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
      //Summernote
      jQuery(document).ready(function() {

         $('.summernote').summernote({
            toolbar: [
               // [groupName, [list of button]]
               ['style', ['bold', 'italic', 'underline', 'clear']],
               ['font', ['strikethrough', 'superscript', 'subscript']],
               ['para', ['ul', 'ol', 'paragraph']],
               ['fontsize', ['fontsize']],
               ['color', ['color']],
            ],
            lang: "id-ID",
            height: 240, // set editor height
            minHeight: null, // set minimum height of editor
            maxHeight: null, // set maximum height of editor
            focus: false // set focus to editable area after initializing summernote
         });
         // Select2
         $(".select2").select2();

         $(".select2-limiting").select2({
            maximumSelectionLength: 2
         });
      });
   </script>
   <script>
      //Info Tooltip
      $(function() {
         $("#show-option").tooltip({
            show: {
               effect: "slideDown",
               delay: 250
            }
         });
         $("#open-event").tooltip({
            show: null,
            position: {
               my: "left top",
               at: "left bottom"
            },
            open: function(event, ui) {
               ui.tooltip.animate({
                  top: ui.tooltip.position().top + 10
               }, "fast");
            }
         });
      });
   </script>
   <script>
      //Autofill
      $(function() {
         var availableTags = [
            "Akuntan",
            "Apoteker",
            "Arsitek",
            "Belum/Tidak Bekerja",
            "Bidan",
            "Buruh Harian Lepas",
            "Dokter",
            "Dosen",
            "Guru",
            "Industri",
            "Karyawan BUMN",
            "Karyawan BUMD",
            "Karyawan Honorer",
            "Karyawan Swasta",
            "Kepala Desa",
            "Konstruksi",
            "Konsultan",
            "Mekanik",
            "Mengurus Rumah Tangga",
            "Nelayan/Perikanan",
            "Notaris",
            "Pedagang",
            "Pelajar/Mahasiswa",
            "Pelaut",
            "Pembantu Rumah Tangga",
            "Penata Rias",
            "Penata Busana",
            "Pendeta",
            "Pengacara",
            "Pensiunan",
            "Perangkat Desa",
            "Perawat",
            "Pegawai Negeri Sipil",
            "Petani/Pekebun",
            "Peternak",
            "POLRI",
            "Sopir",
            "TNI",
            "Tukang Cukur",
            "Ustadz",
            "Wiraswasta",
         ];
         $("#tags").autocomplete({
            source: availableTags
         });
      });
   </script>
   <script>
      //Select2
      // Script ini ↓↓↓ harus paling bawah !
      $(function() {
         $('.select2').select2({
            theme: 'bootstrap',
            minimumInputLength: 2,
            language: {
               inputTooShort: function() {
                  return 'Cari Nama/NIK yang Bersangkutan';
               },
               noResults: function() {
                  return "Tidak Ditemukan !<a href='index.php?halaman=tambahpenduduk' class='ml-3'>Tambah Baru</a>";
               }
            },
            escapeMarkup: function(markup) {
               return markup;
            }
         })
      });
   </script>
   <script>
      //Select2
      // Script ini ↓↓↓ harus paling bawah !
      $(function() {
         $('.selectsurat').select2({
            theme: 'bootstrap',
            // minimumInputLength: 2,
            language: {
               inputTooShort: function() {
                  return 'Cari Nama/NIK user';
               },
               noResults: function() {
                  return "Tidak Ditemukan !<a href='index.php?halaman=tambahuser' class='ml-3'>Tambah Baru</a>";
               }
            },
            escapeMarkup: function(markup) {
               return markup;
            }
         })
      });
   </script>
   <script>
      //Select2
      // Script ini ↓↓↓ harus paling bawah !
      $(function() {
         $('.select2ns').select2({
            theme: 'bootstrap',
            dropdownAutoWidth: true,
            width: 'auto',
            minimumResultsForSearch: Infinity,
            escapeMarkup: function(markup) {
               return markup;
            }
         })
      });
   </script>
</body>

</html>
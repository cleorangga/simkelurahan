<?php
session_start();
include 'connect.php';
// if (!isset($_SESSION['admin'])) {
//    echo "<script>alert('Anda harus login');</script>";
//    echo "<script>location='login.php';</script>";
//    exit();
// }
if (!isset($_SESSION['admin'])) {
   echo "<script>location='../error.html';</script>";
   exit();
}
?>
<!DOCTYPE html>
<!-- Created by pdf2htmlEX (https://github.com/coolwanglu/pdf2htmlex) -->
<html xmlns="http://www.w3.org/1999/xhtml">

<?php
if (isset($_GET['halaman'])) {
   if ($_GET['halaman'] == "cetaksurat1") {
      include 'cetaksurat1.php';
   } elseif ($_GET['halaman'] == "cetaksurat2") {
      include 'cetaksurat2.php';
   } elseif ($_GET['halaman'] == "cetaksurat3") {
      include 'cetaksurat3.php';
   } elseif ($_GET['halaman'] == "cetaksurat4") {
      include 'cetaksurat4.php';
   } elseif ($_GET['halaman'] == "cetaksurat5") {
      include 'cetaksurat5.php';
   } elseif ($_GET['halaman'] == "cetaksurat6") {
      include 'cetaksurat6.php';
   } elseif ($_GET['halaman'] == "cetaksurat7") {
      include 'cetaksurat7.php';
   } elseif ($_GET['halaman'] == "cetaksurat8") {
      include 'cetaksurat8.php';
   }
}
?>

</html>
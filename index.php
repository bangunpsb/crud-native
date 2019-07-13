<?php
include '../proses/koneksi.php';
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Welcome Dashboard Admin</title>
    <!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- MORRIS CHART STYLES-->
    <link href="assets/js/morris/morris-0.4.3.min.css" rel="stylesheet" />
    <!-- CUSTOM STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
    <!-- GOOGLE FONTS-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
    <!-- Tambahan -->
    <link rel="stylesheet" href="assets/css/posting.css">

    <!-- DATA TABLES -->
    <link rel="stylesheet" type="text/css" href="assets/helper/DataTables/datatables.min.css" />
    <!-- KALENDER -->
    <link href='assets/fullcalendar/core/main.css' rel='stylesheet' />
    <link href='assets/fullcalendar/daygrid/main.css' rel='stylesheet' />
    <!-- SWEET ALERT -->
    <link rel="stylesheet" href="assets/sweet/sweetalert2.min.css">
    <!--Sweet Alert  -->
    <script src="assets/sweet/sweetalert2.all.min.js"></script>
</head>

<body>
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>


                <?php
                session_start();
                // cek apakah yang mengakses halaman ini sudah login
                if ($_SESSION['level'] == "") {
                    header("location:../index.php?pesan=anda belum login");
                }
                ?>
                <!-- Tentukan status nya -->
                <a class="navbar-brand"><?php echo $_SESSION['level']; ?></b></a>

            </div>
            <div style="color: white;
padding: 15px 50px 5px 50px;
float: right;
font-size: 16px;"> &nbsp; <?php echo $_SESSION['nama']; ?> </div>
        </nav>
        <!-- /. NAV TOP  -->
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
                    <li class="text-center">
                        <img src="../assets/imgu/<?php echo $_SESSION['gbr']; ?>" width="50%">
                    </li>


                    <li><a href="index.php"><i class="fa fa-home fa-3x"></i> Home</a></li>
                    <li><a href="index.php?page=user"><i class="fa fa-group fa-3x"></i> User</a></li>
                    <li><a href="index.php?page=posting"><i class="fa fa-bell-o fa-3x"></i> News</a></li>
                    <li><a href="index.php?page=msg"><i class="fa fa-envelope-o fa-3x"></i> Message</a></li>
                    <li><a href="index.php?page=cari"><i class="fa fa-search fa-3x"></i> Test Download</a></li>
                    <li><a href="logout.php"><i class="fa fa-sign-out fa-3x"></i> Logout</a></li>
                </ul>

            </div>

        </nav>
        <!-- /. NAV SIDE  -->

        <!-- halaman atau page -->

        <div id="page-wrapper">
            <div id="page-inner">
                <?php
                if (isset($_GET['page'])) {

                    if ($_GET['page'] == 'posting') {
                        include 'posting.php';
                    } elseif ($_GET['page'] == 'post') {
                        include 'post.php';
                    } elseif ($_GET['page'] == 'editpost') {
                        include 'editpost.php';
                    } elseif ($_GET['page'] == 'user') {
                        include 'user.php';
                    } elseif ($_GET['page'] == 'useradd') {
                        include 'useradd.php';
                    } elseif ($_GET['page'] == 'edituser') {
                        include 'edituser.php';
                    } elseif ($_GET['page'] == 'msg') {
                        include 'msg.php';
                    } elseif ($_GET['page'] == 'cari') {
                        include 'cari.php';
                    }
                } else {
                    include 'home.php';
                }

                ?>
            </div>
            <!-- /. PAGE INNER  -->
        </div>
        <!-- /. PAGE WRAPPER  -->
    </div>
    <!-- /. WRAPPER  -->



    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.10.2.js"></script>
    <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="assets/js/jquery.metisMenu.js"></script>
    <!-- MORRIS CHART SCRIPTS -->
    <!-- <script src="assets/js/morris/raphael-2.1.0.min.js"></script> -->
    <!-- <script src="assets/js/morris/morris.js"></script> -->
    <!-- CUSTOM SCRIPTS -->
    <!-- <script src="assets/js/custom.js"></script> -->
    <!-- DATA TABLES -->
    <script type="text/javascript" src="assets/helper/DataTables/datatables.min.js"></script>
    <script>
        $('#tables').DataTable({
            autoFill: true
        });
    </script>


    <!-- KALENDER -->
    <script src='assets/fullcalendar/core/main.js'></script>
    <script src='assets/fullcalendar/daygrid/main.js'></script>


    <!-- Type Number -->
    <script>
        $('#no_hp').keyup(function() {
            if ($(this).val() > 999999999999) {
                alert(" Maksimal 12 Ang ka");
                $(this).val('08');
            }
        });
    </script>


    <!-- SWEET ALERT -->
    <?php

    if ($_GET['status'] == 'g_simpan') {
        echo "<script>swal.fire('FAILED!', 'gagal simpan data', 'error') </script>";
    } elseif ($_GET['status'] == 'b_simpan') {
        echo "<script>swal.fire('SUCCESS!', 'berhasil simpan data', 'success') </script>";
    } elseif ($_GET['status'] == 'g_hapus') {
        echo "<script>swal.fire('FAILED!', 'gagal hapus data','error') </script>";
    } elseif ($_GET['status'] == 'b_hapus') {
        echo "<script>swal.fire('SUCCESS!', 'berhasil hapus data', 'success') </script>";
    } elseif ($_GET['status'] == 'g_edit') {
        echo "<script>swal.fire('FAILED!', 'gagal edit data', 'error') </script>";
    } elseif ($_GET['status'] == 'b_edit') {
        echo "<script>swal.fire('SUCCESS!', 'berhasil edit data', 'success') </script>";
    }

    ?>


</body>

</html>
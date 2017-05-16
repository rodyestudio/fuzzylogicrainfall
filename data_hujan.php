<!DOCTYPE html>
<html dir="ltr" lang="en-US">
<head>

    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="author" content="SemiColonWeb" />

    <!-- Stylesheets
    ============================================= -->
    <link href="http://fonts.googleapis.com/css?family=Lato:300,400,400italic,600,700|Raleway:300,400,500,600,700|Crete+Round:400italic" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="css/bootstrap.css" type="text/css" />
    <link rel="stylesheet" href="style.css" type="text/css" />
    <link rel="stylesheet" href="css/dark.css" type="text/css" />
    <link rel="stylesheet" href="css/font-icons.css" type="text/css" />
    <link rel="stylesheet" href="css/animate.css" type="text/css" />
    <link rel="stylesheet" href="css/magnific-popup.css" type="text/css" />

    <!-- Bootstrap Data Table Plugin -->
    <link rel="stylesheet" href="css/components/bs-datatable.css" type="text/css" />

    <link rel="stylesheet" href="css/responsive.css" type="text/css" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />



    <!-- Document Title
    ============================================= -->
    <title>Fuzzy Logic | Universitas Serang Raya</title>

</head>

<body class="stretched">

<!-- Document Wrapper
============================================= -->
<div id="wrapper" class="clearfix">

    <!-- Header
    ============================================= -->
    <!--<?php //include "header.php"; ?>-->
    <!-- #header end -->

    <!-- Page Title
    ============================================= -->
    <section id="page-title">

        <div class="container clearfix">
            <h1>DATA CURAH HUJAN</h1>
            <span>Menggunakan Sistem Pemodelan Fuzzy Logic</span>
            <ol class="breadcrumb">
                <li><a href="index.php">Home</a></li>
                <li class="active">Data Curah Hujan Tersimpan</li>
            </ol>
        </div>

    </section><!-- #page-title end -->

    <!-- Content
    ============================================= -->
    <section id="content">

        <div class="content-wrap">

            <div class="container clearfix">

                <div class="col_full">
                    <div class="table-responsive">
                        <table id="datatable1" class="table table-striped table-bordered" cellspacing="0" width="100%">
                            <thead>
                            <tr>
                                <th>Wilayah</th>
                                <th>Temperatur</th>
                                <th>Kelembaban</th>
                                <th>Kecepatan Angin</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            require_once "koneksi.php";
                            $sql = "SELECT * FROM `data` ORDER BY `id` DESC";
                            $query = mysqli_query($con, $sql) or die("Gagal". mysqli_error($con));
                            while($tampil = mysqli_fetch_array($query)){
                                ?>
                                <tr>
                                    <td><?php echo $tampil['wilayah']; ?></td>
                                    <td><?php echo $tampil['temperatur']; ?></td>
                                    <td><?php echo $tampil['kelembaban']; ?></td>
                                    <td><?php echo $tampil['angin']; ?></td>
                                    <td><?php echo $tampil['status']; ?></td>
                                    <td><!--<a href="print.php?id=<?php echo $tampil['id']; ?>">Print</a> /--> <a href="inputnew.php?edit=<?php echo $tampil['id']; ?>">Edit</a> / <a href="action.php?action=delete-data-hujan&id=<?php echo $tampil['id']; ?>" onclick="return  confirm('Delete Data Curah Hujan?')">Delete</a></td>
                                </tr>
                            <?php };?>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="clear"></div>

            </div>

        </div>

    </section><!-- #content end -->

    <!-- Footer
    ============================================= -->
    <?php include "footer.php"; ?>
    <!-- #footer end -->

</div><!-- #wrapper end -->

<!-- Go To Top
============================================= -->
<div id="gotoTop" class="icon-angle-up"></div>

<!-- External JavaScripts
============================================= -->
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/plugins.js"></script>

<!-- Bootstrap Data Table Plugin -->
<script type="text/javascript" src="js/components/bs-datatable.js"></script>

<!-- Footer Scripts
============================================= -->
<script type="text/javascript" src="js/functions.js"></script>
<script>

    $(document).ready(function() {
        $('#datatable1').dataTable();
    });

</script>
</body>
</html>
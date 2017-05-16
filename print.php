<!DOCTYPE html>
<?php
require_once "koneksi.php";
$id = $_GET['id'];
$sql = mysqli_query($con, "SELECT * FROM `data` where `id`='$id'");
if($tampil = mysqli_fetch_array($sql)){
    $wilayah = $tampil['wilayah'];
    $temperatur = $tampil['temperatur'];
    $kelembaban = $tampil['kelembaban'];
    $angin = $tampil['angin'];
    $status = $tampil['status'];
}
?>
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

    <link rel="stylesheet" href="css/responsive.css" type="text/css" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Document Title
    ============================================= -->
    <title>Print <?php echo $wilayah . " " ?> - Fuzzy Logic | Universitas Serang Raya </title>

</head>

<body class="stretched">

<!-- Document Wrapper
============================================= -->
<div id="wrapper" class="clearfix">

    <!-- Content
    ============================================= -->

    <section id="content">

        <div class="content-wrap">

            <div class="container center clearfix">
                <div class="heading-block center">
                    <h1>Hasil Uji Intensitas Curah Hujan</h1>
                    <span>BMKG Stasiun Meteorologi Kelas I Serang</span>
                </div>

                <div class="col_half">
                    <label>Wilayah :</label>
                    <p><?php echo $wilayah; ?></p>
                </div>
				<div class="col_one_third">
                    <label>Hasil :</label>
                    <p><?php echo $status; ?></p>
                </div>
                <div class="col_one_third">
                    <label>Temperatur :</label>
                    <p><?php echo $temperatur; ?></p>
                </div>
                <div class="col_one_third">
                    <label>Kelembaban :</label>
                    <p><?php echo $kelembaban; ?></p>
                </div>
                <div class="col_one_third col_last">
                    <label>Kecepatan Angin :</label>
                    <p><?php echo $angin; ?></p>
                </div>
                <div class="col_half">
                    <p>Serang, <?php echo date('d-m-Y');?>
                        <br><img src="images/ttd.png" width='120'></br>
                        ( PT. Curah Hujan Fuzzy )</p>
                </div>
                <div class="col_one_third">
                    <a href="#" onClick="window.print()" class="btn"><img src="images/print.png">
                </div>

            </div>

        </div>

    </section><!-- #content end -->

</div><!-- #wrapper end -->

<!-- Go To Top
============================================= -->
<div id="gotoTop" class="icon-angle-up"></div>

<!-- External JavaScripts
============================================= -->
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/plugins.js"></script>

<!-- Footer Scripts
============================================= -->
<script type="text/javascript" src="js/functions.js"></script>

</body>
</html>
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

    <!-- Bootstrap Select CSS -->
    <link rel="stylesheet" href="css/components/bs-select.css" type="text/css" />

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
            <h1>Aturan Rule</h1>
            <span>Masukan Aturan Rule</span>
            <ol class="breadcrumb">
                <li><a href="#">Home</a></li>
                <li class="active">Rule</li>
            </ol>
        </div>

    </section><!-- #page-title end -->

    <!-- Content
    ============================================= -->

    <?php
    //---- Memeriksa Apa Edit Rule / Tambah Rule Baru ---//
    if(isset($_GET['edit'])){
        $id = $_GET['edit'];

        require_once "koneksi.php";
        $sql = mysqli_query($con, "SELECT * FROM `rule` WHERE `id`='$id'");
        if($tampil= mysqli_fetch_array($sql)){
            $temperatur = $tampil['temperatur'];
            $kelembaban = $tampil['kelembaban'];
            $angin = $tampil['angin'];
            $status = $tampil['hasil'];

            $link = "action.php?action=update-rule&id=".$id;
        }
    }else{
        //-- Jika Rule Baru -- //
        $temperatur = 0;
        $kelembaban = 0;
        $angin = 0;
        $status = 0;

        $link = "action.php?action=save-rule";
    }
    ?>
    <section id="content">

        <div class="content-wrap">

            <div class="container clearfix">
                <form id="input_rule" name="input_rule" action="<?php echo $link; ?>" method="post">
                    <div class="col_one_fourth">
                        <label>Temperatur:</label>
                        <select id="temperatur" name="temperatur" class="selectpicker show-tick form-control">
                            <option value="rendah" <?php $a1="rendah"; if($temperatur == $a1){echo "selected";} ?>>Rendah</option>
                            <option value="sedang" <?php $a2="sedang"; if($temperatur == $a2){echo "selected";} ?>>Sedang</option>
                            <option value="tinggi" <?php $a3="tinggi"; if($temperatur == $a3){echo "selected";} ?>>Tinggi</option>
                        </select>
                        </select>
                    </div>
                    <div class="col_one_fourth">
                        <label>Kelembaban:</label>
                        <select id="kelembaban" name="kelembaban" class="selectpicker show-tick form-control">
                            <option value="rendah"<?php $b1="rendah"; if($kelembaban == $b1){echo "selected";} ?>>Rendah</option>
                            <option value="sedang"<?php $b2="sedang"; if($kelembaban == $b2){echo "selected";} ?>>Sedang</option>
                            <option value="tinggi"<?php $b3="tinggi"; if($kelembaban == $b3){echo "selected";} ?>>Tinggi</option>
                        </select>
                        </select>
                    </div>
                    <div class="col_one_fourth">
                        <label>Kecepatan Angin:</label>
                        <select id="angin" name="angin" class="selectpicker show-tick form-control">
                            <option value="rendah"<?php $c1="rendah"; if($angin == $c1){echo "selected";} ?>>Rendah</option>
                            <option value="sedang"<?php $c2="sedang"; if($angin == $c2){echo "selected";} ?>>Sedang</option>
                            <option value="tinggi"<?php $c3="tinggi"; if($angin == $c3){echo "selected";} ?>>Tinggi</option>
                        </select>
                        </select>
                    </div>
                    <div class="col_one_fourth col_last">
                        <label>Then:</label>
                        <select id="hasil" name="hasil" class="selectpicker show-tick form-control">
                            <option value="ringan"<?php $d1="ringan"; if($status == $d1){echo "selected";} ?>>Ringan</option>
                            <option value="sedang" <?php $d2="sedang"; if($status == $d2){echo "selected";} ?>>Sedang</option>
                            <option value="lebat"<?php $d3="lebat"; if($status == $d3){echo "selected";} ?>>Lebat</option>
                        </select>
                        </select>
                    </div>
                    <div class="coll_full nobottommargin">
                        <button id="submit_input" name="submit_input" class="button button-3d button-black nomargin" value="submit">Submit</button>
                    </div>
                </form>
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

<!-- Bootstrap Select Plugin -->
<script type="text/javascript" src="js/components/bs-select.js"></script>
<link rel="stylesheet" href="css/components/bs-select.css" type="text/css" />

<!-- Select Splitter Plugin -->
<script type="text/javascript" src="js/components/selectsplitter.js"></script>

<!-- Footer Scripts
============================================= -->
<script type="text/javascript" src="js/functions.js"></script>
<script type="text/javascript">

    $('.selectsplitter').selectsplitter();

</script>
</body>
</html>
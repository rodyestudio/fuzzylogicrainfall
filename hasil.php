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

    <!-- Select-Boxes CSS -->
    <link rel="stylesheet" href="css/components/select-boxes.css" type="text/css" />

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
    <!-- #header end -->

    <!-- Page Title
    ============================================= -->
    <section id="page-title">

        <div class="container clearfix">
            <h1>Fuzzy Logic</h1>
            <span>Hasil Perhitungan Menggunakan Fuzzy Logic</span>
            <ol class="breadcrumb">
                <li><a href="index.php">Home</a></li>
                <li class="active">Fuzzy Logic</li>
            </ol>
        </div>

    </section><!-- #page-title end -->

    <!-- Content
    ============================================= -->
    <?php

    if(!empty($_POST['derajat_temperatur']) && !empty($_POST['persen_kelembaban']) && !empty($_POST['kecepatan_angin'])){
        require_once "koneksi.php";
        include "fungsi_simpan.php";


        $derajat_temperatur = $_POST['derajat_temperatur'];
        $persen_kelembaban = $_POST['persen_kelembaban'];
        $kecepatan_angin = $_POST['kecepatan_angin'];



        ///---- Perhitungan dilakukan pada File 'fungsi_perhitungan.php'-----///
        require "fungsi_perhitungan.php";
        $hitung = new perhitungan();
        $hasil = $hitung->hitung($derajat_temperatur,$persen_kelembaban,$kecepatan_angin);

        //---------- Keluarin Value Dari Array Multi --------
        $hasil_temperatur = $hasil['temperatur'];
        $hasil_kelembaban = $hasil['kelembaban'];
        $hasil_angin = $hasil['angin'];
        //-------------- END PERHITUNGAN --------------

        //print_r($hasil);

    }else{
        echo "<script>alert('Sistem Error, Fuzzy Logic Tidak Dapat Bekerja!'); window.location ='input.php' </script>";
    }

    ?>
    <section id="content">

        <div class="content-wrap">

            <div class="container clearfix">

                <div class="col_full">
                    <div class="tabs side-tabs responsive-tabs clearfix" id="tab-main">
                        <!-- Navigasi Tab -->
					
						<nav id="primary-menu">
						
                        <ul class="tab-nav clearfix">
                            <li><a href="#tabs-1">Di Dapat Himpunan Fuzzy</a></li>
                            <li><a href="#tabs-2">Rule Di Peroleh</a></li>
                            <li><a href="#tabs-3">Tabel Linguistik</a></li>
                            <li><a href="#tabs-4">Hasil Perhitungan</a></li>
                            <li><a href="#tabs-5">Mesin Inferensi</a></li>
                            <li><a href="#tabs-6">Tahap Defuzzyfikasi</a></li>
                        </ul>

						</nav>
					
						
                        <div class="tab-container">

                            <!-- Ini Tab 1 : Table Himpunan Fuzzy -->
                            <div class="tab-content clearfix" id="tabs-1">
                                <div class="col_full">
                                    <h4>Tabel Himpunan Fuzzy</h4>
                                    <?php
                                    //require_once "koneksi.php";
                                    $sql = "SELECT MIN(temperatur) as min_temperatur, MIN(kelembaban) as min_kelembaban, MIN(angin) as min_angin, 
MAX(temperatur) as max_temperatur, MAX(kelembaban) as max_kelembaban, MAX(angin) as max_angin, AVG(temperatur) as rata_temperatur, 
AVG(kelembaban) as rata_kelembaban, AVG(angin) as rata_angin FROM `data`";
                                    $query = mysqli_query($con, $sql) or die ("Gagal " . mysqli_error($con));

                                    //Definisi ambil nilai terkecil, terbesar, rata - rata dari setiap variable
                                    if($tampil = mysqli_fetch_array($query)){
                                        $min_temperatur = $tampil['min_temperatur'];
                                        $min_kelembaban = $tampil['min_kelembaban'];
                                        $min_angin = $tampil['min_angin'];

                                        $max_temperatur = $tampil['max_temperatur'];
                                        $max_kelembaban = $tampil['max_kelembaban'];
                                        $max_angin = $tampil['max_angin'];

                                        $rata_temperatur = $tampil['rata_temperatur'];
                                        $rata_kelembaban = $tampil['rata_kelembaban'];
                                        $rata_angin = $tampil['rata_angin'];

                                    }

                                    // SQL Untuk Output = ringan, sedang, lebat
                                    $sql_status = mysqli_query($con, "SELECT `status`,`min`,`max` FROM `status`") or die("Gagal" . mysqli_error($con));
                                    while ($tampil_status = mysqli_fetch_array($sql_status)){
                                        if($tampil_status['status'] == "ringan"){
                                            $min_ringan = $tampil_status['min'];
                                            $max_ringan = $tampil_status['max'];
                                        }elseif ($tampil_status['status'] == "sedang"){
                                            $min_sedang = $tampil_status['min'];
                                            $max_sedang = $tampil_status['max'];
                                        }elseif ($tampil_status['status'] == "lebat"){
                                            $min_lebat = $tampil_status['min'];
                                            $max_lebat = $tampil_status['max'];
                                        }
                                    }
                                    $sql_output = mysqli_query($con, "SELECT MIN(min) as min_output, MAX(max) as max_output FROM `status`");
                                    if($tampil_out = mysqli_fetch_array($sql_output)){
                                        $min_output = $tampil_out['min_output'];
                                        $max_output = $tampil_out['max_output'];
                                    }
                                    ?>

                                    <!-- Table HImpunan Fuzzy pada tab1 -->
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Fungsi</th>
                                                <th>Nama Variabel</th>
                                                <th>Himpunan Fuzzy</th>
                                                <th>Semesta Pembicara</th>
                                                <th>Domain</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td rowspan="9">Input</td>
                                                <td rowspan="3">Temperatur</td>
                                                <td>Rendah</td>
                                                <td rowspan="3"> [<?php echo $min_temperatur . " - ". $max_temperatur; ?>] </td>
                                                <td>[<?php echo $min_temperatur . " - ". $rata_temperatur; ?>]</td>
                                            </tr>
                                            <tr>
                                                <td>Sedang</td>
                                                <td>[<?php echo $min_temperatur . " - ". $max_temperatur; ?>]</td>
                                            </tr>
                                            <tr>
                                                <td>Tinggi</td>
                                                <td>[<?php echo $rata_temperatur . " - ". $max_temperatur; ?>]</td>
                                            </tr>
                                            <tr>
                                                <td rowspan="3">Kelembaban</td>
                                                <td>Rendah</td>
                                                <td rowspan="3">[<?php echo $min_kelembaban . " - ". $max_kelembaban; ?>]</td>
                                                <td>[<?php echo $min_kelembaban . " - ". $rata_kelembaban; ?>]</td>
                                            </tr>
                                            <tr>
                                                <td>Sedang</td>
                                                <td>[<?php echo $min_kelembaban . " - ". $max_kelembaban; ?>]</td>
                                            </tr>
                                            <tr>
                                                <td>Tinggi</td>
                                                <td>[<?php echo $rata_kelembaban . " - ". $max_kelembaban; ?>]</td>
                                            </tr>
                                            <tr>
                                                <td rowspan="3">Kecepatan Angin</td>
                                                <td>Rendah</td>
                                                <td rowspan="3">[<?php echo $min_angin . " - ". $max_angin; ?>]</td>
                                                <td>[<?php echo $min_angin . " - ". $rata_angin; ?>]</td>
                                            </tr>
                                            <tr>
                                                <td>Sedang</td>
                                                <td>[<?php echo $min_angin . " - ". $max_angin; ?>]</td>
                                            </tr>
                                            <tr>
                                                <td>Tinggi</td>
                                                <td>[<?php echo $rata_angin . " - ". $max_angin; ?>]</td>
                                            </tr>
                                            <tr>
                                                <td rowspan="3">Output</td>
                                                <td rowspan="3">Curah Hujan</td>
                                                <td>Hujan Ringan</td>
                                                <td rowspan="3"> [<?php echo $min_output . " - ". $max_output; ?>] </td>
                                                <td>[<?php echo $min_ringan . " - ". $max_ringan; ?>]</td>
                                            </tr>
                                            <tr>
                                                <td>Hujan Sedang</td>
                                                <td>[<?php echo $min_sedang . " - ". $max_sedang; ?>]</td>
                                            </tr>
                                            <tr>
                                                <td>Hujan Lebat</td>
                                                <td>[<?php echo $min_lebat . " - ". $max_lebat; ?>]</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <!-- Ini Tab ke-2 : RULE -->
                            <div class="tab-content clearfix" id="tabs-2">
                                <div class="col_full">
                                    <h4>Rule</h4>
                                    <div class="table-responsive">
                                        <table class="table">
                                            <tbody>
                                            <?php
                                            //SQL Untuk Menampilkan RULE
                                            $sql_rule = mysqli_query($con, "SELECT * FROM `rule`") or die ("Gagal " . mysqli_error($con));
                                            while($tampil_rule = mysqli_fetch_array($sql_rule)){
                                                //echo "IF" . " REM " . $tampil_rule['rem']. " RANGKA " . $tampil_rule['rangka']. " EMISI " . $tampil_rule['emisi'] . " THEN ". $tampil_rule['hasil'] . "<br>";
                                            ?>
                                            <tr>
                                                <td>IF</td>
                                                <td>Temperatur <?php echo $tampil_rule['temperatur']; ?></td>
                                                <td>AND</td>
                                                <td>Kelembaban <?php echo $tampil_rule['kelembaban']; ?></td>
                                                <td>AND</td>
                                                <td>Kecepatan Angin <?php echo $tampil_rule['angin']; ?></td>
                                                <td>THEN</td>
                                                <td><?php echo $tampil_rule['hasil']; ?></td>
                                            </tr>
                                            <?php };?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                            <!-- Ini Tab ke-3 : Menampilkan Linguistik -->
                            <div class="tab-content clearfix" id="tabs-3">
                                <h4>Linguistik</h4>
                                <div class="table-responsive">
                                    <table class="table">
                                        <tbody>
                                        <?php
                                        $sql_linguistik = mysqli_query($con, "SELECT * FROM `rule` WHERE `temperatur` NOT IN('tinggi') AND `kelembaban` NOT IN ('tinggi') AND `angin` NOT IN ('tinggi')") or die ("Gagal " . mysqli_error($con));
                                        while($tampil_linguistik = mysqli_fetch_array($sql_linguistik)){

                                            ///---- Fungsi Cari Minimal (Conjucntion) ada disini -----///
                                            $cari_min = array($hasil_temperatur[$tampil_linguistik['temperatur']], $hasil_kelembaban[$tampil_linguistik['kelembaban']], $hasil_angin[$tampil_linguistik['angin']]);

                                            if($tampil_linguistik['hasil']=="lebat"){
                                                $lebat[]= min($cari_min);
                                            }elseif ($tampil_linguistik['hasil']=="sedang"){
                                                $sedang[]=min($cari_min);
                                            }elseif ($tampil_linguistik['hasil']=="ringan"){
                                                $ringan[]=min($cari_min);
                                            }

                                            //---- End Cari Minimal -----//
                                            ?>
                                            <tr>
                                                <td>IF</td>
                                                <td>Temperatur <?php echo $tampil_linguistik['temperatur']; ?></td>
                                                <td>AND</td>
                                                <td>Kelembaban <?php echo $tampil_linguistik['kelembaban']; ?></td>
                                                <td>AND</td>
                                                <td>Kecepatan Angin <?php echo $tampil_linguistik['angin']; ?></td>
                                                <td>THEN</td>
                                                <td><?php echo $tampil_linguistik['hasil']; ?></td>
                                            </tr>
                                        <?php };?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <!-- Ini Tab ke-4 : Perhitungan -->
                            <!-- Variabel PHP Ada diatas pada  table Awal -->
                            <div class="tab-content clearfix" id="tabs-4">
                                <h4>Temperatur</h4>
                                <p>
                                    Rendah = (<?php echo $hasil_temperatur['rendah']; ?>)<br>
                                    <?php
                                    echo "1 = ". $derajat_temperatur . " ≤ " . $min_temperatur . "<br>";
                                    echo $min_temperatur . " ≤ " . $derajat_temperatur . " ≤ " . $rata_temperatur . "<br>";
                                    if($hasil_temperatur['rendah'] !="0" && $hasil_temperatur['rendah']!= "1"){
                                        echo "( " . $rata_temperatur . " - " . $derajat_temperatur . " ) / ( " . $rata_temperatur . " - " . $min_temperatur . ")<br>";
                                    }
                                    echo "0 = ". $derajat_temperatur . " ≥ " . $rata_temperatur . "<br>";
                                    ?>
                                </p>
                                <p>
                                    Sedang = (<?php echo $hasil_temperatur['sedang']; ?>)<br>
                                    <?php
                                    echo "0 = ". $derajat_temperatur . " ≤ " . $min_temperatur . " atau " . $derajat_temperatur . " ≥ " . $max_temperatur . "<br>";
                                    echo $min_temperatur . " ≤ " . $derajat_temperatur . " ≤ " . $rata_temperatur . "<br>" ;
                                    if($hasil_temperatur['sedang'] != "1" && $hasil_temperatur['sedang'] != "0" ){
                                        echo "( " . $derajat_temperatur . " - " . $min_temperatur . " ) / ( " . $rata_temperatur . " - " . $min_temperatur . ")<br>";
                                    }
                                    echo "1 = " . $rata_temperatur . " ≤ " . $derajat_temperatur . " ≤ " . $max_temperatur . "<br>";
                                    ?>
                                </p>
                                <h4>Kelembaban</h4>
                                <p>
                                    Ringan = (<?php echo $hasil_kelembaban['rendah']; ?>)<br>
                                    <?php
                                    echo "1 = ". $persen_kelembaban . " ≤ " . $min_kelembaban . "<br>";
                                    echo $min_kelembaban . " ≤ " . $persen_kelembaban . " ≤ " . $rata_kelembaban . "<br>";
                                    if($hasil_kelembaban['rendah'] !="0" && $hasil_kelembaban['rendah']!= "1"){
                                        echo "( " . $rata_kelembaban . " - " . $persen_kelembaban . " ) / ( " . $rata_kelembaban . " - " . $min_kelembaban . ")<br>";
                                    }
                                    echo "0 = ". $persen_kelembaban . " ≥ " . $rata_kelembaban . "<br>";
                                    ?>
                                </p>
                                <p>
                                    Sedang = (<?php echo $hasil_kelembaban['sedang']; ?>)<br>
                                    <?php
                                    echo "0 = ". $persen_kelembaban . " ≤ " . $min_kelembaban . " atau " . $persen_kelembaban . " ≥ " . $max_kelembaban . "<br>";
                                    echo $min_kelembaban . " ≤ " . $persen_kelembaban . " ≤ " . $rata_kelembaban . "<br>" ;
                                    if($hasil_kelembaban['sedang'] != "1" && $hasil_kelembaban['sedang'] != "0" ){
                                        echo "( " . $persen_kelembaban . " - " . $min_kelembaban . " ) / ( " . $rata_kelembaban . " - " . $min_kelembaban . ")<br>";
                                    }
                                    echo "1 = " . $rata_kelembaban . " ≤ " . $persen_kelembaban . " ≤ " . $max_kelembaban . "<br>";
                                    ?>
                                </p>
                                <h4>Kecepatan Angin</h4>
                                <p>
                                    Rendah = (<?php echo $hasil_angin['rendah']; ?>)<br>
                                    <?php
                                    echo "1 = ". $kecepatan_angin . " ≤ " . $min_angin . "<br>";
                                    echo $min_angin . " ≤ " . $kecepatan_angin . " ≤ " . $rata_angin . "<br>";
                                    if($hasil_angin['rendah'] !="0" && $hasil_angin['rendah']!= "1"){
                                        echo "( " . $rata_angin . " - " . $kecepatan_angin . " ) / ( " . $rata_angin . " - " . $min_angin . ")<br>";
                                    }
                                    echo "0 = ". $kecepatan_angin . " ≥ " . $rata_angin . "<br>";
                                    ?>
                                </p>
                                <p>
                                    Sedang = (<?php echo $hasil_angin['sedang']; ?>)<br>
                                    <?php
                                    echo "0 = ". $kecepatan_angin . " ≤ " . $min_angin . " atau " . $kecepatan_angin . " ≥ " . $max_angin . "<br>";
                                    echo $min_angin . " ≤ " . $kecepatan_angin . " ≤ " . $rata_angin . "<br>" ;
                                    if($hasil_angin['sedang'] != "1" && $hasil_angin['sedang'] != "0" ){
                                        echo "( " . $kecepatan_angin . " - " . $min_angin . " ) / ( " . $rata_angin . " - " . $min_angin . ")<br>";
                                    }
                                    echo "1 = " . $rata_angin . " ≤ " . $kecepatan_angin . " ≤ " . $max_angin . "<br>";
                                    ?>
                                </p>
                            </div>

                            <!-- Ini Tab ke 5 : Mesin Inferensi Mamddani -->
                            <div class="tab-content clearfix" id="tabs-5">
                                <h4>Mesin Inferensi</h4>
                                <h5>Conjunction (^)</h5>
                                <div class="table-responsive">
                                    <table class="table">
                                        <tbody>
                                        <?php
                                        $sql_linguistik = mysqli_query($con, "SELECT * FROM `rule` WHERE `temperatur` NOT IN('tinggi') AND `kelembaban` NOT IN ('tinggi') AND `angin` NOT IN ('tinggi')") or die ("Gagal " . mysqli_error($con));
                                        while($tampil_linguistik = mysqli_fetch_array($sql_linguistik)){
                                            $cari_min = array($hasil_temperatur[$tampil_linguistik['temperatur']], $hasil_kelembaban[$tampil_linguistik['kelembaban']], $hasil_angin[$tampil_linguistik['angin']]);
                                            ?>
                                            <tr>
                                                <td>IF</td>
                                                <td>Temperatur <?php echo $tampil_linguistik['temperatur'] . " (". $hasil_temperatur[$tampil_linguistik['temperatur']] .") " ;?></td>
                                                <td>AND</td>
                                                <td>Kelembaban <?php echo $tampil_linguistik['kelembaban']. " (". $hasil_kelembaban[$tampil_linguistik['kelembaban']] .") " ; ?></td>
                                                <td>AND</td>
                                                <td>Kecepetan Angin <?php echo $tampil_linguistik['angin']. " (". $hasil_angin[$tampil_linguistik['angin']] .") " ; ?></td>
                                                <td>THEN</td>
                                                <td><?php echo $tampil_linguistik['hasil']. " (". min($cari_min) .") "  ; ?></td>
                                            </tr>
                                        <?php };?>
                                        </tbody>
                                    </table>
                                </div>
                                <h5>Disjunction (v)</h5>
                                <div class="table-responsive">
                                    <table class="table">
                                        <tbody>
                                            <tr>
                                                <?php foreach ($ringan as $ringan_v){ ?>
                                                <td>Kondisi is Ringan <?php echo $ringan_v; ?></td>
                                                <?php }
                                                $ringan_dis = max($ringan)?>
                                                <td>Dihasilkan Kondisi is Ringan <?php echo $ringan_dis; ?></td>
                                            </tr>
                                            <tr>
                                                <?php foreach ($sedang as $sedang_v){ ?>
                                                    <td>Kondisi is Sedang <?php echo $sedang_v; ?></td>
                                                <?php }
                                                $sedang_dis = max($sedang)?>
                                                <td>Dihasilkan Kondisi is Sedang <?php echo $sedang_dis; ?></td>
                                            </tr>
                                            <tr>
                                                <?php foreach ($lebat as $lebat_v){ ?>
                                                    <td>Kondisi is Lebat <?php echo $lebat_v; ?></td>
                                                <?php }
                                                $lebat_dis = max($lebat)?>
                                                <td>Dihasilkan Kondisi is Lebat <?php echo $lebat_dis; ?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="tab-content clearfix" id="tabs-6">
							<h4>Tahap Defuzzyfikasi</h4>
                                <?php
                                $deret = 2.5;
                                for($array_out1 = $min_ringan; $array_out1 < $max_ringan; $array_out1 = $array_out1+ $deret){
                                    $center_ringan[]=$array_out1;
                                    $pembagi_ringan[]= $ringan_dis;

                                    $batas_ringan = $max_ringan;
                                }
                                $batas_sedang = $max_angin - 6;
                                for($array_out2 = $batas_ringan; $array_out2 < $min_lebat; $array_out2 = $array_out2+ $deret){
                                    $center_sedang[] = $array_out2;
                                    $pembagi_sedang[] = $sedang_dis;
                                }

                                for($array_out3 = $min_lebat; $array_out3 <=  $max_output; $array_out3 = $array_out3 + $deret){
                                    $center_lebat[]=$array_out3;
                                    $pembagi_lebat[] = $lebat_dis;
                                }

                                $def_ringan = array_sum($center_ringan)* $ringan_dis;
                                $def_sedang = array_sum($center_sedang)* $sedang_dis;
                                $def_lebat = array_sum($center_lebat)* $lebat_dis;
                                $def_center = $def_ringan + $def_sedang + $def_lebat;

                                $def_pembagi = array_sum($pembagi_ringan) + array_sum($pembagi_sedang) + array_sum($pembagi_lebat);
                                if($def_pembagi== 0){
                                    $def_pembagi = 1;
                                }
                                $hasil_def = $def_center / $def_pembagi;

                                echo "( (" . implode(" + ",$center_ringan) . ") * " . $ringan_dis . ") +";
                                echo "( (" . implode(" + ",$center_sedang) . ") * " . $sedang_dis . ") +";
                                echo "( (" . implode(" + ",$center_lebat) . ") * " . $lebat_dis . ") <br>";
                                echo "------------------------------------------- <br>";
                                echo implode(" + ",$pembagi_ringan) . " + ";
                                echo implode(" + ",$pembagi_sedang) . " + ";
                                echo implode(" + ",$pembagi_lebat) . " <br>";
                                echo "= " . $hasil_def . "<br>";
                                echo "Kesimpulannya adalah, kondisi Hari ini = ";

                                //---- Logika menentukan Hasil --- //
                                if($min_ringan <= $hasil_def && $hasil_def <= $max_ringan ){
                                    $kondisi = "Hujan Ringan";
                                }elseif ($min_sedang <= $hasil_def && $hasil_def <= $min_lebat){
                                    $kondisi = "Hujan Sedang";
                                    //backup $min_layak <= $hasil_def && $hasil_def <= $max_layak
                                }elseif($hasil_def > $min_lebat){
                                    $kondisi = "Hujan Lebat";
                                }elseif($hasil_def < $min_lebat){
                                    $kondisi = "Tidak Hujan";
                                }
                                echo $kondisi;
                                echo "<br>";

                                $simpan = new simpan();
                                //$simpan->save($_POST,$kondisi);
                                if(!empty($_POST['id_hidden'])){
                                    //echo "HERE";
                                    $simpan->update($_POST,$kondisi,$_POST['id_hidden']);
                                }else{
                                    //echo "Tidak Ada";
                                    $simpan->save($_POST,$kondisi);
                                }
                                ?>
                            </div>
                        </div>
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

<!-- Select-Boxes Plugin -->
<script type="text/javascript" src="js/components/select-boxes.js"></script>

<!-- Footer Scripts
============================================= -->
<script type="text/javascript" src="js/functions.js"></script>
<script type="text/javascript">
    jQuery(document).ready( function($){

        // Multiple Select
        $(".select-1").select2({
            placeholder: "Select Multiple Values"
        });

        // Loading array data
        var data = [{ id: 0, text: 'enhancement' }, { id: 1, text: 'bug' }, { id: 2, text: 'duplicate' }, { id: 3, text: 'invalid' }, { id: 4, text: 'wontfix' }];
        $(".select-data-array").select2({
            data: data
        })
        $(".select-data-array-selected").select2({
            data: data
        });

        // Enabled/Disabled
        $(".select-disabled").select2();
        $(".select-enable").on("click", function () {
            $(".select-disabled").prop("disabled", false);
            $(".select-disabled-multi").prop("disabled", false);
        });
        $(".select-disable").on("click", function () {
            $(".select-disabled").prop("disabled", true);
            $(".select-disabled-multi").prop("disabled", true);
        });

        // Without Search
        $(".select-hide").select2({
            minimumResultsForSearch: Infinity
        });

        // select Tags
        $(".select-tags").select2({
            tags: true
        });

        // Select Splitter
        $('.selectsplitter').selectsplitter();

    });
</script>

</body>
</html>
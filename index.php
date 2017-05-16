<!DOCTYPE html>
<html lang="en" class="no-js">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Prediksi Curah Hujan Menggunakan Logika Fuzzy</title>
    <meta name="description" content="Some WebGL experiments with raindrop effects" />
    <meta name="keywords" content="webgl, raindrops, effect, rain, web, video, background" />
    <meta name="author" content="Lucas Bebber for Codrops" />
    <link rel="shortcut icon" href="favicon.ico">
    <link rel="stylesheet" type="text/css" href="css/normalize.css" />
    <link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,700,500,900' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" type="text/css" href="css/demo.css" />
    <link rel="stylesheet" type="text/css" href="css/style1.css" />
    <!--[if IE]>
        <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
</head>

<body class="demo-1">
    <div class="image-preload">
        <img src="img/drop-color.png" alt="">
        <img src="img/drop-alpha.png" alt="">
        <img src="img/weather/texture-rain-fg.png" />
        <img src="img/weather/texture-rain-bg.png" />
        <img src="img/weather/texture-sun-fg.png" />
        <img src="img/weather/texture-sun-bg.png" />
        <img src="img/weather/texture-fallout-fg.png" />
        <img src="img/weather/texture-fallout-bg.png" />
        <img src="img/weather/texture-drizzle-fg.png" />
        <img src="img/weather/texture-drizzle-bg.png" />
    </div>
    <div class="container">
        <header class="codrops-header">
            <div class="codrops-links">
            </div>
            <img src="images/unsera.png" style="margin-right:4px" height="55px" width="330px">
            <h1>Prediksi Curah Hujan</h1>
            <nav id="primary-menu">

                    <ul>

                        <?php
                        require_once "koneksi.php";
                        if(!isset($_SESSION)) {
                            session_start();
                        }
                        if (!empty($_SESSION['username'])){
                            $sql_nav = mysqli_query($con, "SELECT * FROM `menu`");
                            while($rs_nav = mysqli_fetch_array($sql_nav)){
                                ?>
                                <li><a href="<?php echo $rs_nav['link']; ?>"><?php echo $rs_nav['nama'] ?></a></li>
                                <?php
                            }
                        }else{
                            echo "<li class=\"current\"><a href=\"index.php\"><div>Beranda</div></a></li>";
                            echo "<li><a href=\"login.php\"><div>Masuk</div></a></li>";
                        }
                        ?>
                    </ul>

                </nav><!-- #primary-menu end -->


        </header>
        <div class="slideshow">
            <canvas width="1" height="1" id="container" style="position:absolute"></canvas>
            <!-- Hujan Ringan -->
            <div class="slide" id="slide-2" data-weather="drizzle">
                <div class="slide__element slide__element--date"><?php
$today = date("F j, Y, g:i a");                
echo $today;
?></div>
                <div class="slide__element slide__element--temp">5 - 20<small>mm/24jam</small></div>
            </div>
            <!-- Hujan Sedang -->
            <div class="slide" id="slide-1" data-weather="rain">
                <div class="slide__element slide__element--date"><?php
$today = date("F j, Y, g:i a");                
echo $today;
?></div>
                <div class="slide__element slide__element--temp">21 - 50<small>mm/24jam</small></div>
            </div>
          
    
            <!-- Sunny -->
            <!--<div class="slide" id="slide-3" data-weather="sunny">
                <div class="slide__element slide__element--date">Monday, 26<sup>th</sup> of October 2043</div>
                <div class="slide__element slide__element--temp">25°<small>C</small></div>
            </div>-->
            <!-- Hujan Lebat -->
            <div class="slide" id="slide-5" data-weather="storm">
                <div class="slide__element slide__element--date"><?php
$today = date("F j, Y, g:i a");                
echo $today;
?></div>
                <div class="slide__element slide__element--temp">51 - 100<small>mm/24jam</small></div>
            </div>
            <!-- Fallout (greenish overlay with slightly greenish/yellowish drops) -->
            <!--<div class="slide" id="slide-4" data-weather="fallout">
                <div class="slide__element slide__element--date">Tuesday, 27<sup>th</sup> of October 2043</div>
                <div class="slide__element slide__element--temp">34°<small>C</small></div>
            </div>-->
            <nav class="slideshow__nav">
                <a class="nav-item" href="#slide-2"><i class="icon icon--drizzle"></i><span>Hujan Ringan</span></a>
                <a class="nav-item" href="#slide-1"><i class="icon icon--rainy"></i><span>Hujan Sedang</span></a>
                <!--<a class="nav-item" href="#slide-3"><i class="icon icon--sun"></i><span>Cerah</span></a>-->
                <a class="nav-item" href="#slide-5"><i class="icon icon--storm"></i><span>Hujan Lebat</span></a>
                <!--<a class="nav-item" href="#slide-4"><i class="icon icon--radioactive"></i><span>Hujan Asam</span></a>-->
            </nav>

<script type='text/javascript'>
$(document).ready(function() {$(&#39;img#closed&#39;).click(function(){$(&#39;#bl_banner&#39;).hide(90);});});
</script>

<div class='iklan-kanan' style="position:absolute; z-index:9999;">
  <div id="tamvan2" style="width:autopx; height:autopx; text-align:right; display:scroll;position:fixed; bottom:0px;right:20px;">
    <!--Tombol Exit Iklan Kanan [www.mastamvan.blogspot.com] -->
    <div>
      <a href="#" id="close-teaser" onclick="document.getElementById('tamvan2').style.display = 'none';" style="cursor:pointer;">
        <center><img src='images/bmkg.png' height="70" width="60"/></center>
      </a>
      <!--Mulai Iklan Kanan-->
      <div class="separator" style="clear: both; text-align: center;">
        <a href="http://www.bmkg.go.id/"><small><b> Sumber :</b> BMKG Stasiun Meteorologi Kelas I Serang</small></a>
        
      </div><br /></div>
  </div>
  <!--Akhir Iklan Kanan -->
</div>
        </div>

        <p class="nosupport">Sorry, but your browser does not support WebGL!</p>
    </div>
    <!-- /container -->
    <script src="js/index.min.js"></script>
</body>

</html>
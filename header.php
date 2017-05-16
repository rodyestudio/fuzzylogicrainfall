    <!-- Font Awesome -->
 
    <link rel="stylesheet" href="css/header/font-awesome.min.css">

    <!-- Bootstrap core CSS -->
    <link href="css/header/bootstrap.min.css" rel="stylesheet">

    <!-- Material Design Bootstrap -->
    <link href="css/header/mdb.min.css" rel="stylesheet">

    <!-- Template styles -->
    <style rel="stylesheet">
        /* TEMPLATE STYLES */
        /* Necessary for full page carousel*/
        
        html,
        body {
            height: 100%;
        }
        /* Navigation*/
        
        .navbar {
            background-color: transparent;
        }
        
        .top-nav-collapse {
            background-color: #11a08d;
        }
        
        footer.page-footer {
            background-color: #11a08d;
        }
        
        @media only screen and (max-width: 768px) {
            .navbar {
                background-color: #11a08d;
            }
        }
        /* Carousel*/
        
        .carousel {
            height: 50%;
        }
        
        @media (max-width: 776px) {
            .carousel {
                height: 100%;
            }
        }
        
        .carousel-item,
        .active {
            height: 100%;
        }
        
        .carousel-inner {
            height: 100%;
        }
        
        .carousel-item:nth-child(1) {
            background-image: url("img/slide2.jpg");
            background-repeat: no-repeat;
            background-size: cover;
            opacity: 0.4;
        }
        
        .carousel-item:nth-child(2) {
            background-image: url("img/slide1.jpg");
            background-repeat: no-repeat;
            background-size: cover;
        }
        
        .carousel-item:nth-child(3) {
            background-image: url("img/slide3.jpg");
            background-repeat: no-repeat;
            background-size: cover;
        }
        /*Caption*/
        
        .flex-center {
            color: #fff;
        }
         }
    </style>



   <!--Navbar-->
    <nav class="navbar navbar-dark navbar-fixed-top scrolling-navbar">

        <!-- Collapse button-->
        <button class="navbar-toggler hidden-sm-up" type="button" data-toggle="collapse" data-target="#collapseEx">
            <i class="fa fa-bars"></i>
        </button>

        <div class="container-fluid">

            <!--Collapse content-->
            <div class="collapse navbar-toggleable-xs" id="collapseEx">
                <!--Navbar Brand-->
                <a class="navbar-brand" href="http://mdbootstrap.com/material-design-for-bootstrap/" target="_blank">KELOMPOK 4</a>
                <!--Links-->
                <ul class="nav navbar-nav pull-xs-right">
                    <li class="nav-item active">
                        <a class="nav-link" href="index.php?page=home"><i class="fa fa-home"  style="font-size:20px;"></i> &nbsp;Home<span class="sr-only"></span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="?page=hasil"><i class="fa fa-stethoscope"  style="font-size:20px;"></i> &nbsp;Hasil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="?page=diagnosa"><i class="fa fa-stethoscope"  style="font-size:20px;"></i> &nbsp;Diagnosa</a>
                    </li>
                     <li class="nav-item">
                        <a class="nav-link" href="?page=panduan"><i class="fa fa-book"  style="font-size:20px;"></i> &nbsp;Panduan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php"><i class="fa fa-sign-out"  style="font-size:20px;"></i> &nbsp;logout</a>
                    </li>
                </ul>
                <!--Search form-->
            </div>
            <!--/.Collapse content-->

        </div>

    </nav>
    <!--/.Navbar-->

    <!--Carousel Wrapper-->
    <div id="carousel-example-1" class="carousel slide carousel-fade" data-ride="carousel">
        <!--Indicators-->
        <ol class="carousel-indicators">
            <li data-target="#carousel-example-1" data-slide-to="0" class="active"></li>
            <li data-target="#carousel-example-1" data-slide-to="1"></li>
            <li data-target="#carousel-example-1" data-slide-to="2"></li>
        </ol>
        <!--/.Indicators-->

        <!--Slides-->
        <div class="carousel-inner" role="listbox">

            <!--First slide-->
            <div class="carousel-item active">
                <!--Caption-->
                <div class="flex-center animated fadeInDown">
                    <ul>
                        <li>
                            <h1 class="h1-responsive">Curah Hujan Menggunakan Logika Fuzzy</h1></li>
                        <li>
                            <p>Di persembahkan oleh Kelompok 4</p>
                        </li>
                        <li>
                            <a  href="?page=diagnosa" class="btn btn-default btn-lg"><i class="fa fa-stethoscope"  style="font-size:20px;"></i> &nbsp; &nbsp;Start diagnosis</a>
                        </li>
                    </ul>
                </div>
                <!--Caption-->
            </div>
            <!--/.First slide-->

            <!--Second slide -->
            <div class="carousel-item">
                <!--Caption-->
                <div class="flex-center animated fadeInDown">
                    <ul>
                        <li>
                            <h1 class="h1-responsive">Team Yang Terlibat</h1>
                        </li>
                        <li>
                            <p>dalam pembuatan sistem pakar ini</p>
                        </li>
                        <li>
                            <a target="_blank" href="#" class="btn btn-default btn-lg"><i class="fa fa-user"  style="font-size:20px;"></i> &nbsp;My profile</a>
                        </li>
                    </ul>
                </div>
                <!--Caption-->
            </div>
            <!--/.Second slide -->

          <!--Third slide-->
            <div class="carousel-item">
                <!--Caption-->
                <div class="flex-center animated fadeInDown">
                    <ul>
                        <li>
                            <h1 class="h1-responsive">Panduan</h1></li>
                        <li>
                            <p>baca terlebih dahulu sebelum memulai diagnosa</p>
                        </li>
                        <li>
                            <a target="_blank" href="http://mdbootstrap.com/forums/forum/support/" class="btn btn-default btn-lg"><i class="fa fa-book"  style="font-size:20px;"></i> &nbsp;Panduan</a>
                        </li>
                    </ul>
                </div>
                <!--Caption-->
            </div>
            <!--/.Third slide-->
        </div>
        <!--/.Slides-->

        <!--Controls-->
        <a class="left carousel-control" href="#carousel-example-1" role="button" data-slide="prev">
            <span class="icon-prev" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#carousel-example-1" role="button" data-slide="next">
            <span class="icon-next" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
        <!--/.Controls-->
    </div>
    <!--/.Carousel Wrapper-->
<!DOCTYPE html>
<?php
require_once "koneksi.php";
if(!isset($_SESSION)) {
    session_start();
}
if (empty($_SESSION['username'])){
    session_destroy();
    header('Location: login.php');
}
//------ PREDIKSI CURAH HUJAN ----//
if(isset($_GET['edit'])){
    $id = $_GET['edit'];
    $selected = "selected=\"selected\"";
    $selected_default = "";

    $sql = mysqli_query($con, "SELECT * FROM `data_kendaraan` WHERE `id`='$id'");
    if($tampil= mysqli_fetch_array($sql)){
        $merek = $tampil['merek'];
        $rem = $tampil['rem'];
        $rangka = $tampil['rangka'];
        $emisi = $tampil['emisi'];
    }
}else{
    $selected_default = "selected=\"selected\"";
    $id = "";
    $merek = "";
    $rem = "";
    $rangka = "";
    $emisi = "";
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
    <link rel="stylesheet" href="css/set2.css"/>
    <link rel="stylesheet" href="css/demo.css"/>
    <link rel="stylesheet" href="css/animate.css" type="text/css" />
    <link rel="stylesheet" href="css/magnific-popup.css" type="text/css" />
    <link rel="shortcut icon" href="favicon.ico">

    
    <!-- Select-Boxes CSS -->
    <link rel="stylesheet" href="css/components/select-boxes.css" type="text/css" />

    <link rel="stylesheet" href="css/responsive.css" type="text/css" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />



    <!-- Document Title
    ============================================= -->
    <title>Prediksi Curah Hujan</title>


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
            <h1>Prediksi Curah Hujan</h1>
            <span>Mulai Prediksi</span>
            <ol class="breadcrumb">
                <li><a href="#">Home</a></li>
                <li class="active">Input Data</li>
            </ol>
        </div>

    </section><!-- #page-title end -->
    
    <!-- Content
    ============================================= -->
    <section id="content">

        <div class="content-wrap">

            <div class="container">

                <form id="input_data" name="input_data" action="hasil.php" method="post" class="nobottommargin">
                
               <section class="content bgcolor-10">
				<span class="input input--shoko">
					<input class="input__field input__field--shoko" type="text" id="input-4" />
					<label class="input__label input__label--shoko" for="input-4">
						<span class="input__label-content input__label-content--shoko"> Wilayah </span>
					</label>
					<svg class="graphic graphic--shoko" width="300%" height="100%" viewBox="0 0 1200 60" preserveAspectRatio="none">
						<path d="M0,56.5c0,0,298.666,0,399.333,0C448.336,56.5,513.994,46,597,46c77.327,0,135,10.5,200.999,10.5c95.996,0,402.001,0,402.001,0"/>
						<path d="M0,2.5c0,0,298.666,0,399.333,0C448.336,2.5,513.994,13,597,13c77.327,0,135-10.5,200.999-10.5c95.996,0,402.001,0,402.001,0"/>
					</svg>
				</span>
				<span class="input input--shoko">
					<input class="input__field input__field--shoko" type="text" id="input-5" />
					<label class="input__label input__label--shoko" for="input-5">
						<span class="input__label-content input__label-content--shoko">Tahun </span>
					</label>
					<svg class="graphic graphic--shoko" width="300%" height="100%" viewBox="0 0 1200 60" preserveAspectRatio="none">
						<path d="M0,56.5c0,0,298.666,0,399.333,0C448.336,56.5,513.994,46,597,46c77.327,0,135,10.5,200.999,10.5c95.996,0,402.001,0,402.001,0"/>
						<path d="M0,2.5c0,0,298.666,0,399.333,0C448.336,2.5,513.994,13,597,13c77.327,0,135-10.5,200.999-10.5c95.996,0,402.001,0,402.001,0"/>
					</svg>
				</span>
				<span class="input input--shoko">
					<input class="input__field input__field--shoko" type="text" id="input-6" />
					<label class="input__label input__label--shoko" for="input-6">
						<span class="input__label-content input__label-content--shoko">World</span>
					</label>
					<svg class="graphic graphic--shoko" width="300%" height="100%" viewBox="0 0 1200 60" preserveAspectRatio="none">
						<path d="M0,56.5c0,0,298.666,0,399.333,0C448.336,56.5,513.994,46,597,46c77.327,0,135,10.5,200.999,10.5c95.996,0,402.001,0,402.001,0"/>
						<path d="M0,2.5c0,0,298.666,0,399.333,0C448.336,2.5,513.994,13,597,13c77.327,0,135-10.5,200.999-10.5c95.996,0,402.001,0,402.001,0"/>
					</svg>
				</span>
			</section>
                    <div class="col_full">
                    
                    <span class="input input--shoko">
					<input class="input__field input__field--shoko" type="text" id="id_hidden" name="id_hidden" value="<?php echo $id; ?>"/>
					<label class="input__label input__label--shoko" for="input-4">
						<span class="input__label-content input__label-content--shoko"> Wilayah </span>
					</label>
					<svg class="graphic graphic--shoko" width="300%" height="100%" viewBox="0 0 1200 60" preserveAspectRatio="none">
						<path d="M0,56.5c0,0,298.666,0,399.333,0C448.336,56.5,513.994,46,597,46c77.327,0,135,10.5,200.999,10.5c95.996,0,402.001,0,402.001,0"/>
						<path d="M0,2.5c0,0,298.666,0,399.333,0C448.336,2.5,513.994,13,597,13c77.327,0,135-10.5,200.999-10.5c95.996,0,402.001,0,402.001,0"/>
					</svg>
				</span>
                        <label>Wilayah :</label>
                        <input id="id_hidden" name="id_hidden" type="hidden" class="form-control" value="<?php echo $id; ?>">
                        <input id="merek_kendaraan" name="merek_kendaraan" class="form-control" placeholder="Wilayah" value="<?php echo $merek; ?>">
                    </div>

                    <div class="divider divider-center"><i class="icon-calendar2"></i></div>

                    <div class="col_full">
                        <label>Tahun :</label>
                        <input id="nama_pembuat" name="nama_pembuat" class="form-control" placeholder="Tahun" value="<?php echo $pembuat; ?>">
                    </div>
                    <div class="col_half">
                        <label>Bulan :</label>
                        <select id="tipe_kendaraan" name="tipe_kendaraan" class="select-hide form-control bottommargin-sm" style="width: 100%;">
                            <option value="" <?php echo $selected_default; ?> disabled="disabled">-Pilih Bulan-</option>
                            <option value="Januari" <?php if($tipe=="Januari"){echo $selected;} ?>>Januari</option>
                            <option value="Februari" <?php if($tipe=="Februari"){echo $selected;} ?>>Februari</option>
                            <option value="Maret" <?php if($tipe=="Januari"){echo $selected;} ?>>Maret</option>
                            <option value="April" <?php if($tipe=="Februari"){echo $selected;} ?>>April</option>
                            <option value="Mei" <?php if($tipe=="Januari"){echo $selected;} ?>>Mei</option>
                            <option value="Juni" <?php if($tipe=="Februari"){echo $selected;} ?>>Juni</option>
                            <option value="Juli" <?php if($tipe=="Januari"){echo $selected;} ?>>Juli</option>
                            <option value="Agustus" <?php if($tipe=="Februari"){echo $selected;} ?>>Agustus</option>
                            <option value="September" <?php if($tipe=="Januari"){echo $selected;} ?>>September</option>
                            <option value="Oktober" <?php if($tipe=="Februari"){echo $selected;} ?>>Oktober</option>
                            <option value="November" <?php if($tipe=="Januari"){echo $selected;} ?>>November</option>
                            <option value="Desember" <?php if($tipe=="Februari"){echo $selected;} ?>>Desember</option>
                        </select>
                    </div>

                    <div class="col_half col_last">
                        <label>Tanggal :</label>
                        <select id="jenis_kendaraan" name="jenis_kendaraan" class="select-hide form-control bottommargin-sm" style="width: 100%;">
                            <option value="" selected="selected" disabled="disabled">-Pilih Tanggal-</option>
                            <option value="1" <?php if($jenis=="1"){echo $selected;} ?>>1</option>
                            <option value="2" <?php if($jenis=="2"){echo $selected;} ?>>2</option>
                            <option value="3" <?php if($jenis=="3"){echo $selected;} ?>>3</option>
                            <option value="4" <?php if($jenis=="4"){echo $selected;} ?>>4</option>
                            <option value="5" <?php if($jenis=="5"){echo $selected;} ?>>5</option>
                            <option value="6" <?php if($jenis=="6"){echo $selected;} ?>>6</option>
                            <option value="7" <?php if($jenis=="7"){echo $selected;} ?>>7</option>
                            <option value="8" <?php if($jenis=="8"){echo $selected;} ?>>8</option>
                            <option value="9" <?php if($jenis=="9"){echo $selected;} ?>>9</option>
                            <option value="10" <?php if($jenis=="10"){echo $selected;} ?>>10</option>
                            <option value="11" <?php if($jenis=="11"){echo $selected;} ?>>11</option>
                            <option value="12" <?php if($jenis=="12"){echo $selected;} ?>>12</option>
                            <option value="13" <?php if($jenis=="13"){echo $selected;} ?>>13</option>
                            <option value="14" <?php if($jenis=="14"){echo $selected;} ?>>14</option>
                            <option value="15" <?php if($jenis=="15"){echo $selected;} ?>>15</option>
                            <option value="16" <?php if($jenis=="16"){echo $selected;} ?>>16</option>
                            <option value="17" <?php if($jenis=="17"){echo $selected;} ?>>17</option>
                            <option value="18" <?php if($jenis=="18"){echo $selected;} ?>>18</option>
                            <option value="19" <?php if($jenis=="19"){echo $selected;} ?>>19</option>
                            <option value="20" <?php if($jenis=="20"){echo $selected;} ?>>20</option>
                            <option value="21" <?php if($jenis=="21"){echo $selected;} ?>>21</option>
                            <option value="22" <?php if($jenis=="22"){echo $selected;} ?>>22</option>
                            <option value="23" <?php if($jenis=="23"){echo $selected;} ?>>23</option>
                            <option value="24" <?php if($jenis=="24"){echo $selected;} ?>>24</option>
                            <option value="25" <?php if($jenis=="25"){echo $selected;} ?>>25</option>
                            <option value="26" <?php if($jenis=="26"){echo $selected;} ?>>26</option>
                            <option value="27" <?php if($jenis=="27"){echo $selected;} ?>>27</option>
                            <option value="28" <?php if($jenis=="28"){echo $selected;} ?>>28</option>
                            <option value="29" <?php if($jenis=="29"){echo $selected;} ?>>29</option>
                            <option value="30" <?php if($jenis=="30"){echo $selected;} ?>>30</option>
                            <option value="31" <?php if($jenis=="31"){echo $selected;} ?>>31</option>
                        </select>
                    </div>

                    <div class="divider divider-center"><i class="icon-graph"></i></div>

                    <div class="col_half">
                        <label>Latitude :</label>
                        <input id="chassis_no" name="chassis_no" class="form-control" placeholder="Latitude" value="<?php echo $chassis; ?>" >
                    </div>

                    <div class="col_half col_last">
                        <label>Longitude :</label>
                        <input id="engine_no" name="engine_no" class="form-control" placeholder="Longitude" value="<?php echo $engine; ?>">
                    </div>

                    <div class="divider divider-center"><i class="icon-printer"></i></div>

                    <div class="col_one_third">
                        <label>Temperatur (%) :</label>
                        <input id="sistem_pengereman" name="sistem_pengereman" class="form-control" placeholder="20% - 90%" value="<?php echo $rem; ?>" >
                    </div>
                    <div class="col_one_third">
                        <label>Kelembaban (%) :</label>
                        <input id="rangka_landasan" name="rangka_landasan" class="form-control" placeholder="20% - 90%" value="<?php echo $rangka; ?>">
                    </div>
                    <div class="col_one_third col_last">
                        <label>Kecepatan Angin (%) :</label>
                        <input id="gas_emisi" name="gas_emisi" class="form-control" placeholder="20% - 90%" value="<?php echo $emisi; ?>">
                    </div>

                    <div class="coll_full nobottommargin">
                        <button id="submit_input" name="submit_input" class="button button-3d button-black nomargin" value="submit">Submit</button>
                    </div>
                </form>

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
<script src="js/classie.js"></script>
		<script>
			(function() {
				// trim polyfill : https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects/String/Trim
				if (!String.prototype.trim) {
					(function() {
						// Make sure we trim BOM and NBSP
						var rtrim = /^[\s\uFEFF\xA0]+|[\s\uFEFF\xA0]+$/g;
						String.prototype.trim = function() {
							return this.replace(rtrim, '');
						};
					})();
				}

				[].slice.call( document.querySelectorAll( 'input.input__field' ) ).forEach( function( inputEl ) {
					// in case the input is already filled..
					if( inputEl.value.trim() !== '' ) {
						classie.add( inputEl.parentNode, 'input--filled' );
					}

					// events:
					inputEl.addEventListener( 'focus', onInputFocus );
					inputEl.addEventListener( 'blur', onInputBlur );
				} );

				function onInputFocus( ev ) {
					classie.add( ev.target.parentNode, 'input--filled' );
				}

				function onInputBlur( ev ) {
					if( ev.target.value.trim() === '' ) {
						classie.remove( ev.target.parentNode, 'input--filled' );
					}
				}
			})();
		</script>
        </body>
</html>
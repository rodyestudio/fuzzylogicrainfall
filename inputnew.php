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

    $sql = mysqli_query($con, "SELECT * FROM `data` WHERE `id`='$id'");
    if($tampil= mysqli_fetch_array($sql)){
        $wilayah = $tampil['wilayah'];
        $temperatur = $tampil['temperatur'];
        $kelembaban = $tampil['kelembaban'];
        $angin = $tampil['angin'];
    }
}else{
    $selected_default = "selected=\"selected\"";
    $id = "";
    $wilayah = "";
    $temperatur = "";
    $kelembaban = "";
    $angin = "";
}
?>
<!DOCTYPE html>
<html lang="en" class="no-js">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Input Data</title>
		<meta name="description" content="Simple ideas for enhancing text input interactions" />
		<meta name="keywords" content="input, text, effect, focus, transition, interaction, inspiration, web design" />
		<meta name="author" content="Codrops" />
		<link rel="shortcut icon" href="../favicon.ico">
		<link rel="stylesheet" type="text/css" href="css/normalize2.css" />
		<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.2.0/css/font-awesome.min.css" />
		<link rel="stylesheet" type="text/css" href="css/demo1.css" />
		<link rel="stylesheet" type="text/css" href="css/set1.css" />
		<!--[if IE]>
  		<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
	</head>
	<body>
		<div class="container">
			<header class="codrops-header">
				<div class="codrops-links">
					<a class="codrops-icon codrops-icon--prev" href="index.php"><span>Previous Demo</span></a>
					<a class="codrops-icon codrops-icon--drop" href="http://tympanus.net/codrops/?p=21991" title="Back to the a"><span>Back to the Codrops a</span></a>
				</div>
				<h1>Input Data <span></span></h1>
			</header>
            <form id="input_data" name="input_data" action="hasil.php" method="post" class="nobottommargin">
            
            <section class="content">
				<span class="input input--hoshi">
                <input id="id_hidden" name="id_hidden" type="hidden" value="<?php echo $id; ?>">
					<input class="input__field input__field--hoshi" id="wilayah" name="wilayah" value="<?php echo $wilayah; ?>" />
					<label class="input__label input__label--hoshi input__label--hoshi-color-4" for="input-4">
						<span class="input__label-content input__label-content--hoshi">Wilayah</span>
					</label>
				</span>
			</section>
                
			<section class="content">
				<span class="input input--hoshi">
					<input class="input__field input__field--hoshi" id="derajat_temperatur" name="derajat_temperatur" value="<?php echo $temperatur; ?>" />
					<label class="input__label input__label--hoshi input__label--hoshi-color-1" for="input-4">
						<span class="input__label-content input__label-content--hoshi">Temperatur %</span>
					</label>
				</span>
				<span class="input input--hoshi">
					<input class="input__field input__field--hoshi" id="persen_kelembaban" name="persen_kelembaban" value="<?php echo $kelembaban; ?>" />
					<label class="input__label input__label--hoshi input__label--hoshi-color-2" for="input-5">
						<span class="input__label-content input__label-content--hoshi">Kelembaban</span>
					</label>
				</span>
				<span class="input input--hoshi">
					<input class="input__field input__field--hoshi" id="kecepatan_angin" name="kecepatan_angin" class="form-control" value="<?php echo $angin; ?>" />
					<label class="input__label input__label--hoshi input__label--hoshi-color-3" for="input-6">
						<span class="input__label-content input__label-content--hoshi">Kecepatan Angin</span>
					</label>
				</span>
				<div class="coll_full nobottommargin">
                        <button id="submit_input" name="submit_input" class="btn-submit" value="submit">Submit</button>
                    </div>
			</section>
            </form>
			<!-- Related demos -->
		</div><!-- /container -->
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

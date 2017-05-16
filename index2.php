<!DOCTYPE html>
<html lang="en" class="no-js">

<head>
	<meta charset="UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Rain Effect Experiments | Demo 1 | Codrops</title>
	<meta name="description" content="Some WebGL experiments with raindrop effects" />
	<meta name="keywords" content="webgl, raindrops, effect, rain, web, video, background" />
	<meta name="author" content="Lucas Bebber for Codrops" />
	<link rel="shortcut icon" href="favicon.ico">
	<link rel="stylesheet" type="text/css" href="css/normalize1.css" />
	<link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,700,500,900' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" type="text/css" href="css/demo1.css" />
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
				<a class="codrops-icon codrops-icon--prev" href="http://tympanus.net/Development/CardStackEffects/" title="Previous Demo"><span>Previous Demo</span></a>
				<a class="codrops-icon codrops-icon--drop" href="http://tympanus.net/codrops/?p=25417" title="Back to the article"><span>Back to the Codrops article</span></a>
			</div>
			<h1>Rain &amp; Water Effects</h1>
			<nav class="codrops-demos">
				<a class="current-demo" href="index.html">Weather</a>
				<a href="index2.html">Water</a>
				<a href="index3.html">Video</a>
			</nav>
		</header>
		<div class="slideshow">
			<canvas width="1" height="1" id="container" style="position:absolute"></canvas>
			<!-- Heavy Rain -->
			<div class="slide" id="slide-1" data-weather="rain">
				<div class="slide__element slide__element--date">Sunday, 24<sup>th</sup> of October 2043</div>
				<div class="slide__element slide__element--temp">12°<small>C</small></div>
			</div>
			<!-- Drizzle -->
			<div class="slide" id="slide-2" data-weather="drizzle">
				<div class="slide__element slide__element--date">Saturday, 25<sup>th</sup> of October 2043</div>
				<div class="slide__element slide__element--temp">18°<small>C</small></div>
			</div>
			<!-- Sunny -->
			<div class="slide" id="slide-3" data-weather="sunny">
				<div class="slide__element slide__element--date">Monday, 26<sup>th</sup> of October 2043</div>
				<div class="slide__element slide__element--temp">25°<small>C</small></div>
			</div>
			<!-- Heavy rain -->
			<div class="slide" id="slide-5" data-weather="storm">
				<div class="slide__element slide__element--date">Wednesday, 28<sup>th</sup> of October 2043</div>
				<div class="slide__element slide__element--temp">20°<small>C</small></div>
			</div>
			<!-- Fallout (greenish overlay with slightly greenish/yellowish drops) -->
			<div class="slide" id="slide-4" data-weather="fallout">
				<div class="slide__element slide__element--date">Tuesday, 27<sup>th</sup> of October 2043</div>
				<div class="slide__element slide__element--temp">34°<small>C</small></div>
			</div>
			<nav class="slideshow__nav">
				<a class="nav-item" href="#slide-1"><i class="icon icon--rainy"></i><span>10/24</span></a>
				<a class="nav-item" href="#slide-2"><i class="icon icon--drizzle"></i><span>10/25</span></a>
				<a class="nav-item" href="#slide-3"><i class="icon icon--sun"></i><span>10/26</span></a>
				<a class="nav-item" href="#slide-5"><i class="icon icon--storm"></i><span>10/28</span></a>
				<a class="nav-item" href="#slide-4"><i class="icon icon--radioactive"></i><span>10/27</span></a>
			</nav>
		</div>
		<p class="nosupport">Sorry, but your browser does not support WebGL!</p>
	</div>
	<!-- /container -->
	<script src="js/index.min.js"></script>
</body>

</html>

<!doctype html>
<html lang="en" class="no-js">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700' rel='stylesheet' type='text/css'>

	<link rel="stylesheet" href="css/reset.css"> <!-- CSS reset -->
	<link rel="stylesheet" href="css/style.css"> <!-- Resource style -->
	<script src="js/modernizr.js"></script> <!-- Modernizr -->

	<title>Projectenwebsite ICTEO14</title>
</head>
<body>
	<header class="cd-header">

	</header>
<div class="headerFixedBar">
	<div class="row">
		<div class="col-lg-12">
			<div id='cssmenu'>
				<div class="pullLeft">
					<a href="index.html" title="ProjectenWebsite.com"><img class="headerLogoImage" src="img/odiseelogo.png"></a>
			</div>
			<ul>
			   <li class='active' ><a href='/'><span>Overzicht</span></a></li>
			   <li ><a href='#'><span>Studenten</span></a></li>
			   <li ><a href='#'><span>Archief</span></a></li>
			   <li ><a href='/belbin'><span>Belbintest</span></a></li>
			   <li class='last'><a href='/nieuwproject'><span>Nieuw Project</span></a></li>

			</ul>
			
		</div>
	</div>
</div>

</div>
	<main class="cd-main-content">
		<div class="cd-tab-filter-wrapper">
			<div class="cd-tab-filter">
				<ul class="cd-filters">
					<li class="placeholder">
						<a data-type="all" href="#0">Alles</a> <!-- voor Mobiel -->
					</li>
					<li class="filter"><a class="selected" href="#0" data-type="all">Alle Projecten</a></li>
					<li class="filter" data-filter=".groep-1"><a href="#0" data-type="groep-1">groep 1</a></li>
					<li class="filter" data-filter=".groep-2"><a href="#0" data-type="groep-2">groep 2</a></li>
				</ul>

			</div>
		</div>

		<section class="cd-gallery">
			<ul>
				<li class="mix groep-1 check1 radio2 option3"><img src="img/img-1.jpg" alt="Image 2"></li> <!-- img om te testen -->
				<li class="mix groep-2 check2 radio2 option2"><img src="img/img-2.jpg" alt="Image 2"></li>
				<li class="mix groep-1 check3 radio3 option1"><img src="img/img-3.jpg" alt="Image 3"></li>
				<li class="mix groep-1 check3 radio2 option4"><img src="img/img-4.jpg" alt="Image 4"></li>
				<li class="mix groep-1 check1 radio3 option2"><img src="img/img-5.jpg" alt="Image 5"></li>
				<li class="mix groep-2 check2 radio3 option3"><img src="img/img-6.jpg" alt="Image 6"></li>
				<li class="mix groep-2 check2 radio2 option1"><img src="img/img-7.jpg" alt="Image 7"></li>
				<li class="mix groep-1 check1 radio3 option4"><img src="img/img-8.jpg" alt="Image 8"></li>
				<li class="mix groep-2 check1 radio2 option3"><img src="img/img-9.jpg" alt="Image 9"></li>
				<li class="mix groep-1 check3 radio2 option4"><img src="img/img-10.jpg" alt="Image 10"></li>
				<li class="mix groep-1 check3 radio3 option2"><img src="img/img-11.jpg" alt="Image 11"></li>
				<li class="mix groep-2 check1 radio3 option1"><img src="img/img-12.jpg" alt="Image 12"></li>
				<li class="gap"></li>
				<li class="gap"></li>
				<li class="gap"></li>
			</ul>
			<div class="cd-fail-message">Geen resultaten</div>
		</section>

		<div class="cd-filter">
			<form>
				<div class="cd-filter-block">
					<h4>Zoeken</h4>

					<div class="cd-filter-content">
						<input type="search" placeholder="bv groep-1...">
					</div>
				</div>
				<div class="cd-filter-block">
					<h4>Categoriën</h4>

					<div class="cd-filter-content">
						<div class="cd-select cd-filters">
							<select class="filter" name="selectThis" id="selectThis">
								<option value="">Geen Voorkeur</option>
								<option value=".option1">Elektronica </option>
								<option value=".option2">ICT </option>
								<option value=".option3">Robots </option>
								<option value=".option4">Domotica </option>
							</select>
						</div>
					</div>
				</div>

				<div class="cd-filter-block">
					<h4>Aantal groepsleden</h4>

					<ul class="cd-filter-content cd-filters list">
						<li>
							<input class="filter" data-filter="" type="radio" name="radioButton" id="radio1" checked>
							<label class="radio-label" for="radio1">Geen voorkeur</label>
						</li>

						<li>
							<input class="filter" data-filter=".radio2" type="radio" name="radioButton" id="radio2">
							<label class="radio-label" for="radio2">1</label>
						</li>

						<li>
							<input class="filter" data-filter=".radio3" type="radio" name="radioButton" id="radio3">
							<label class="radio-label" for="radio3">2</label>
						</li>

						<li>
							<input class="filter" data-filter=".radio4" type="radio" name="radioButton" id="radio4">
							<label class="radio-label" for="radio4">3</label>
						</li>

						<li>
							<input class="filter" data-filter=".radio5" type="radio" name="radioButton" id="radio5">
							<label class="radio-label" for="radio5">4</label>
						</li>

					</ul>
				</div>
			</form>

			<a href="#0" class="cd-close">Sluiten</a>
		</div>
		<a href="#0" class="cd-filter-trigger">Filters</a>
		<div class="footer">
  			<p>&copy; ICTEO14</p>
		</div>
	</main>
<script src="js/jquery-2.1.1.js"></script>
<script src="js/jquery.mixitup.min.js"></script>
<script src="js/main.js"></script> <!-- Resource jQuery -->
</body>
</html>

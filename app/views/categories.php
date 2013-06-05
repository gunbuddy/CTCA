<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width" />

	<title>Comparateca | Busca, compara, adquiere</title>

	<?php print HTML::style("css/normalize.css") ?>
	<?php print HTML::style("css/foundation.css") ?>

	<link href='http://fonts.googleapis.com/css?family=Lato:100,300,400' rel='stylesheet' type='text/css'>
	<?php print HTML::script("js/vendor/custom.modernizr.js") ?>
	
	<style type="text/css">
		body {
			font:14px/1.231 "Lato", sans-serif;
		}

		header {
			background: #ECF0F1;
			border-radius: 4px;
			padding: 10px 15px;
			margin-top: 20px;
		}

			header h1 {
				color: #506273;
				display: inline-block;
				font-weight: 500;
				font-size: 22px;
				font-family: "Lato", sans-serif;
				margin: 0;
			}

			header nav {
				display: inline-block;
				margin-left: 40px;
			}

				header nav a {
					color: #5C6B79;
					font-size: 14px;
					font-weight: 500;
					font-family: inherit;
					margin: 0 10px;
				}

				header nav a:hover, a.active {
					color: #4FAD99;
				}

	</style>
</head>

<body ng-app>
	<div class="row">
		<div class="large-12 columns">
			<header>
				<h1>Comparateca</h1>

				<nav>
					<?php foreach($categories as $category): ?>
					<a href="#"><?php echo $category->name; ?></a>
					<?php endforeach; ?>
				</nav>
			</header>
		</div>
	</div>

	<?php print HTML::script("js/angular/angular.js") ?>
</body>
</html>
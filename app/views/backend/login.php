<!DOCTYPE html>
<!--[if IE 8]> 				 <html class="no-js lt-ie9" lang="es" > <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="es"> <!--<![endif]-->
<html>
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width" />
	<title>Comparateca | El cerebro detras las comparaciones</title>
	
	<?php print HTML::style("css/normalize.css") ?>
	<?php print HTML::style("css/foundation.css") ?>
	<?php print HTML::style("css/mfglabs_iconset.css") ?>
		
	<link href='http://fonts.googleapis.com/css?family=Lato:100,300,400' rel='stylesheet' type='text/css'>
	<?php print HTML::script("js/vendor/custom.modernizr.js") ?>
	
	
	<style type="text/css" media="screen">
		body {
			background: #E6474D;
			font-family: "Lato", "Helvetica Neue", sans-serif;
			font-size: 16px;
			font-weight: 300;
			color: #FFF;
		}
		
		a {
			color: #db4c51;
			font-family: inherit;
			font-weight: 300;
			font-size: 14px;
		}
		
		a:hover {
			color: #db4c51;
			text-decoration: underline;
		}
		
		.login {
			margin-top: 8em;
		}
		
		.login-logo {
			padding: 4em 0 0;
		}
		
		.login-logo p {
			margin-top: 1em;
			font-weight: 300;
		}
		
		.login-logo p strong {
			font-weight: 400;
		}
		
		
		.login-fields {
			margin-top: 1em;
			background: #ECEFF1;
			padding: 2em 2em 2em 2em;
			border-radius: 5px;
		}
		
		.login-fields:before {
			content: "";
			border-style: solid;
			border-width: 18px 12px 18px 0;
			border-color: transparent #eceff1 transparent transparent;
			height: 0px;
			position: absolute;
			left: 3px;
			top: 35px;
			width: 0;
			-webkit-transform: rotate(360deg);
		}
		
		.login-fields input.field {
			
			background: #FFF;
			border: 2px solid #FFF;
			box-shadow: none;
			padding: 1.5em 1em;
			text-indent: 3px;
			font-size: 17px;
			border-radius: 5px;
			color: #34495e;
		}
		
		.login-fields input.field:focus {
			border-color: #E6474D;
		}
		
		.login-fields input.field:focus + i {
			color: #E6474D
		}
		
		.login-fields .field-icon.username i {
			display: block;
			position: absolute;
			color: #BFC9CA;
			left: 78%;
			top: 22%;
			font-size: 20px;
		}
		
		.login-fields .field-icon.password i {
			display: block;
			position: absolute;
			color: #BFC9CA;
			left: 79%;
			top: 46%;
			font-size: 20px;
		}
		
		.login-fields .button {
			background: #E6474D;
			box-shadow: none;
			border: 1px solid transparent;
			font-family: inherit;
			font-weight: inherit;
			border-radius: 5px;
			margin-bottom: 0;
		}
		
		.login-fields .button:hover {
			background: #ff6167;
			border: 1px solid transparent
		}
		
		.error {
			text-align: justify;
			padding: 1em;
			background: #F0C336;
			margin-top: 1em;
			border-radius: 5px;
		}
		
		::-webkit-input-placeholder { /* WebKit browsers */
		    color:    #BDC3C7;
		}
		:-moz-placeholder { /* Mozilla Firefox 4 to 18 */
		    color:    #BDC3C7;
		}
		::-moz-placeholder { /* Mozilla Firefox 19+ */
		    color:    #BDC3C7;
		}
		:-ms-input-placeholder { /* Internet Explorer 10+ */
		    color:    #BDC3C7;
		}
	</style>
</head>
<body>
	<div class="row">
		<div class="large-7 large-centered columns">
		
			<section class="login" align="center">
				<div class="row">
					<div class="large-5 columns">
						<section class="login-logo">
							<img width="250" src="<?php echo asset("img/logo2.png") ?>" id="logo" />
							<p>Bienvenido a <strong>Comparateca MB</strong></p>
						</section>
					</div>
					<div class="large-7 columns">		
						<section class="login-fields">
							<form method="post" action="<?php echo route('backend.login') ?>" autocomplete="off">
								 
								
								<div class="field-icon username">
									<input type="text" name="email" class="field username" placeholder="correo electrónico">
									<i class="icon-user"></i>
								</div>
								<div class="field-icon password">
									<input type="password" name="password" class="field password" placeholder="contraseña">
									<i class="icon-lock"></i>
								</div>
								<input type="submit" class="button expand" value="Ingresar">
							</form>
							
							<a href="#">Acabo de extraviar la contraseña...</a>
						</section>
						
						<?php if (Session::has('error')): ?>
						<section class="error"><?php echo Session::get('error'); ?></section>			
						<?php endif; ?>
					</div>
				</div>											
			</section>
		</div>
	</div>
</body>
</html>
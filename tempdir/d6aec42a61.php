<?php
// source: index.html

use Latte\Runtime as LR;

class Templated6aec42a61 extends Latte\Runtime\Template
{

	function main()
	{
		extract($this->params);
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Css -->
    <link href="css/bootstrap.css" rel="stylesheet">
	<link href="css/style.css" rel="stylesheet">

</head>

<body background="img/slide-1.jpg" >

	<section>
		<h2 align="center">Rozpoznávanie tvárí</h2>
		<div class="container about">
			<div class="row">
				<div class="col-md-6">
					<iframe width="580" height="305" src="https://www.youtube.com/embed/XGSy3_Czz8k"></iframe>
				</div>
				<div class="col-md-6">
					<iframe width="580" height="305" src="https://www.youtube.com/embed/XGSy3_Czz8k"></iframe>
				</div>
			</div>
		</div>
	</section>


	<!-- Galery -->
	<section>
		<h2 align="center">Neznáme osoby</h2>
		<div class="container">
			<div class="row">

				<div class="col-md-4 thumbnail">
					<div class="hovereffect">
						<div class="col-md-12 photo-4"></div>
						<a href="#mybox" data-toggle="modal" data-slide-to="3">
							<div class="overlay">
								Meno:<br>
								<input type="text" name="name" autocomplete="off"><br>
							</div>
						</a>
					</div>
				</div>

				<div class="col-md-4 thumbnail">
					<div class="hovereffect">
						<div class="col-md-12 photo-4"></div>
						<a href="#mybox" data-toggle="modal" data-slide-to="3">
							<div class="overlay">
									Meno:<br>
									<input type="text" name="name" autocomplete="off"><br>
							</div>
						</a>
					</div>
				</div>

				<div class="col-md-4 thumbnail">
					<div class="hovereffect">
						<div class="col-md-12 photo-4"></div>
						<a href="#mybox" data-toggle="modal" data-slide-to="3">
							<div class="overlay">
									Meno:<br>
									<input type="text" name="name" autocomplete="off"><br>
							</div>
						</a>
					</div>
				</div>

				<div class="col-md-4 thumbnail">
					<div class="hovereffect">
						<div class="col-md-12 photo-4"></div>
						<a href="#mybox" data-toggle="modal" data-slide-to="3">
							<div class="overlay">
									Meno:<br>
									<input type="text" name="name" autocomplete="off"><br>
							</div>
						</a>
					</div>
				</div>


				</div>
			</div>
		</div>	
	</section>


    <!-- script -->
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
	<script src="js/modernizr.js"></script>
	<script src="js/script.js"></script>
	
	

</body>
</html><?php
		return get_defined_vars();
	}

}

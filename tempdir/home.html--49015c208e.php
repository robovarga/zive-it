<?php
// source: templates/home.html

use Latte\Runtime as LR;

class Template49015c208e extends Latte\Runtime\Template
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
    <link href="css/bootstrap.min.css" rel="stylesheet">
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
<?php
		$iterations = 0;
		foreach ($users as $user) {
?>
				<div class="col-sm-6 col-md-2">
					<div class="thumbnail">
						<img src="<?php
			echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($photosCDN)) /* line 43 */;
			echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($user->photo)) /* line 43 */ ?>" alt="" class="img-thumbnail">
						<div class="caption">
							<h3><?php echo LR\Filters::escapeHtmlText($user->name) /* line 45 */ ?></h3>
						</div>
					</div>
				</div>


<?php
			$iterations++;
		}
?>
				<!-- <div class="col-md-4 thumbnail">
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
				</div> -->


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


	function prepare()
	{
		extract($this->params);
		if (isset($this->params['user'])) trigger_error('Variable $user overwritten in foreach on line 40');
		
	}

}

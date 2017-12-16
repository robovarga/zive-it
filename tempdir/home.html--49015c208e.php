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
	<div class="navbar navbar-inverse">
		<div class="container">
			<div class="navbar-header">
				<a href="#" class="navbar-brand">Rozpoznavanie tvari</a>
				<p href="" class="navbar-text"> Stranka na rozpoznavanie tvari </p>
			</div>
		</div>
	</div>
	
	<div class="container">
		
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

					<div class="row">
<?php
		$iterations = 0;
		foreach ($users as $user) {
?>
						<div class="col-sm-6 col-md-2">
							<div class="thumbnail">
								<img src="<?php
			echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($photosCDN)) /* line 52 */;
			echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($user->photo)) /* line 52 */ ?>" alt="" class="img-thumbnail">
								<div class="caption">
									<h3><?php echo LR\Filters::escapeHtmlText($user->name) /* line 54 */ ?></h3>
								</div>
							</div>
						</div>								
<?php
			$iterations++;
		}
?>
					</div>
	</section>
	
</div>
	
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
		if (isset($this->params['user'])) trigger_error('Variable $user overwritten in foreach on line 49');
		
	}

}

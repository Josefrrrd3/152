<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8">
	<meta charset="utf-8">
	<title>Facebook CFPT</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<link href="styles/css/bootstrap.css" rel="stylesheet">
	<link href="styles/css/facebook.css" rel="stylesheet">
</head>
<body>
	<div class="wrapper">
		<div class="column col-sm-12 col-xs-11" id="main">
			<!-- top nav -->
			<div class="navbar navbar-blue navbar-static-top">
				<div class="navbar-header">
					<button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".navbar-collapse">
						<span class="sr-only">Toggle</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a href="#" class="navbar-brand logo">b</a>
				</div>
				<nav class="collapse navbar-collapse" role="navigation">
					<form class="navbar-form navbar-left">
						<div class="input-group input-group-sm" style="max-width:360px;">
							<input class="form-control" placeholder="Search" name="srch-term" id="srch-term" type="text">
							<div class="input-group-btn">
								<button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
							</div>
						</div>
					</form>
					<ul class="nav navbar-nav">
						<li class="<?= ($uc == 'home') ? "active" : "" ?>">
							<a href="index.php?uc=home"><i class="glyphicon glyphicon-home"></i> Home</a>
						</li>
						<li>
							<a href="#postModal" role="button" data-toggle="modal"><i class="glyphicon glyphicon-plus"></i> Direct Post</a>
						</li>
						<li class="<?= ($uc == 'home') ? "active" : "" ?>">
							<a href="index.php?uc=post"><i class="glyphicon glyphicon-plus"></i>Form Post</a>
						</li>
						<li>
							<a href="#"><span class="badge">badge</span></a>
						</li>
					</ul>
					<ul class="nav navbar-nav navbar-right">
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="glyphicon glyphicon-user"></i></a>
							<ul class="dropdown-menu">
								<li><a href="">Login</a></li>
								<li><a href="">Register</a></li>
							</ul>
						</li>
					</ul>
				</nav>
			</div>
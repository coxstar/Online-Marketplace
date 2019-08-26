<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from bootstrapmaster.com/live/metro/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 08 Jan 2018 16:57:00 GMT -->
<head>
	
	<!-- start: Meta -->
	<meta charset="utf-8">
	<title>Metro Admin Template - Metro UI Style Bootstrap Admin Template</title>
	<meta name="description" content="Metro Admin Template.">
	<meta name="author" content="Łukasz Holeczek">
	<meta name="keyword" content="Metro, Metro UI, Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
	<!-- end: Meta -->
	
	<!-- start: Mobile Specific -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- end: Mobile Specific -->
	
	<!-- start: CSS -->
	<link id="bootstrap-style" href="<?php echo e(asset('backend/css/bootstrap.min.css')); ?>" rel="stylesheet">
	<link href="<?php echo e(asset('backend/css/bootstrap-responsive.min.css')); ?>" rel="stylesheet">
	<link id="base-style" href="<?php echo e(asset('backend/css/style.css')); ?>" rel="stylesheet">
	<link id="base-style-responsive" href="<?php echo e(asset('backend/css/style-responsive.css')); ?>" rel="stylesheet">
	<link href="http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800&amp;subset=latin,cyrillic-ext,latin-ext" rel='stylesheet' type='text/css'>
	<!-- end: CSS -->
	

	<!-- The HTML5 shim, for IE6-8 support of HTML5 elements -->
	<!--[if lt IE 9]>
	  	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<link id="ie-style" href="css/ie.css" rel="stylesheet">
	<![endif]-->
	
	<!--[if IE 9]>
		<link id="ie9style" href="css/ie9.css" rel="stylesheet">
	<![endif]-->
		
	<!-- start: Favicon -->
	<link rel="shortcut icon" href="<?php echo e(URL::to('backend/img/favicon.ico')); ?>">
	<!-- end: Favicon -->
	
			<!-- <style type="text/css">
			body { background: url() !important; }
		</style> -->
		
		
		
</head>

<body>
		<div class="container-fluid-full">
		<div class="row-fluid">
					
			<div class="row-fluid">
				<div class="login-box">
					<div class="icons">
						<a href="index.html"><i class="halflings-icon home"></i></a>
						<a href="#"><i class="halflings-icon cog"></i></a>
					</div>


					<p class="alert-danger">
					<?php
						$messege = Session::get('messege');

						if($messege)
						{
							echo $messege;
							Session::put('messege',null);
						}
					?>

					</p>
				




					<h2>Login to your account</h2>
					<form class="form-horizontal" action="<?php echo e(url('/admin-dashboard')); ?>" method="post">
					<?php echo e(csrf_field()); ?>

						<fieldset>
							
							<div class="input-prepend" title="Username">
								<span class="add-on"><i class="halflings-icon user"></i></span>
								<input class="input-large span10" name="username" type="text" placeholder="type username"/>
							</div>
							<div class="clearfix"></div>

							<div class="input-prepend" title="Password">
								<span class="add-on"><i class="halflings-icon lock"></i></span>
								<input class="input-large span10" name="Password" id="password" type="password" placeholder="type password"/>
							</div>
							
							
							

							<div class="button-login">	
								<button type="submit" class="btn btn-primary">Login</button>
							</div>
							<div class="clearfix"></div>
					</form>
					
						
				</div><!--/span-->
			</div><!--/row-->
			

	</div>
	
		</div><!--/fluid-row-->
	
	<!-- start: JavaScript-->

		<script src="<?php echo e(asset('backend/js/jquery-1.9.1.min.js')); ?>"></script>
	    <script src="<?php echo e(asset('backend/js/jquery-migrate-1.0.0.min.js')); ?>"></script>
	
		<script src="<?php echo e(asset('backend/js/jquery-ui-1.10.0.custom.min.js')); ?>"></script>
	
	
	
		<script src="<?php echo e(asset('backend/js/modernizr.js')); ?>"></script>
	
		<script src="<?php echo e(asset('backend/js/bootstrap.min.js')); ?>"></script>
	
		<script src="<?php echo e(asset('backend/js/jquery.cookie.js')); ?>"></script>
	
		

		<script src="<?php echo e(asset('backend/js/excanvas.js')); ?>"></script>

        
	
		<script src="<?php echo e(asset('backend/js/jquery.uniform.min.js')); ?>"></script>
		
		
	
		<script src="<?php echo e(asset('backend/js/counter.js')); ?>"></script>
	
		

	<!-- end: JavaScript-->
	
</body>
</html>
<?php /**PATH C:\xampp\htdocs\onlineshop\resources\views/adminLogin.blade.php ENDPATH**/ ?>
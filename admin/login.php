<?php 
	require '../core/init.php';
	$general->logged_in_protect();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="robots" content="noindex">
	<meta name="googlebot" content="noindex">
	<title>Control Website</title>
  <link rel="stylesheet" href="../assets/css/style.css">
	<style type="text/css" media="screen">
		body {
			background-color: #A78FFE;
		}
		.form-contact {
	    width:100%;
	    margin:50% auto;
	    padding: 2rem;
	    background-color:rgba(0,0,0,0.25);
	  }
	  .form-group input[type=text] input[type=password] {
      margin-bottom:20px;
      border:none;
      color: grey;
		}
		input[type=submit] {
			background-color:rgba(0,0,0,0.7);
			color: #fff;
		}

		 
  </style>
</head>
<body>

  	<h1 class="text-center">Controller Admin</h1>
  <div class="container">
    <div class="row">
      <div class="col-4 offset-4">
        <div class="form-contact">
	    		<h4 class="card-title text-center">Login</h4>
					<form method="post" action="../controller/login.php">
						<div class="form-group">
							<input type="text" class="form-control" autocomplete="off" name="username" placeholder="Username">
						</div>
						<div class="form-group">
							<input type="password" class="form-control" autocomplete="off" name="password" placeholder="Password">
						</div>
						<input type="submit" class="btn btn-default btn-block" name="login" value="Login">
					</form>
					<?php 
						if(empty($errors) === false){
							echo '<p class="card-description">'. implode('</p><p>', $errors).'</p>';	
						}
					?>
				</div>
			</div>
		</div>
	</div>

</body>
</html>
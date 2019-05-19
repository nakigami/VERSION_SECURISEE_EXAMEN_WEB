<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.css"  >
    <title>Home page</title>
</head>
<body>
	<br>
<h2 class="text-center">Connectez-vous</h2>
<?php 
		session_start();
		if(isset($_SESSION['error'])){
			echo $_SESSION['error'];
		}
		unset($_SESSION['error']);
		session_destroy();
	 ?>
<div class="container">
<form action="connect.php" method="POST">
	<div class="form-group">
		<label for="email">Email</label>
		<input type="email" name="email" class="form-control" id="email" required>
	</div>
	<div class="form-group">
		<label for="pass">Password</label>
		<input type="text" id="pass" class="form-control" name="pass" required>
    </div>
<br>
<div class="text-center">
<input type="submit" name="upl_btn" value="Connecter" class="btn btn-primary ">
<a href="index.php" class="btn btn-info">Page d'acceuil</a>
	</div>
</form>
</div>

<script src="node_modules/jquery/dist/jquery.slim.min.js" ></script>
<script src="node_modules/popper.js/dist/popper.min.js"  ></script>
<script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    
</body>
</html>
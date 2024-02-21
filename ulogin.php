<?php include('userver.php') ?>
<!DOCTYPE html>
<html>
<head>
  <title>User Login</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	
	<p>
  		 <a href="login.php" style="color:white;">HOME</a>
  	</p>
  <div class="header">
  	<h2>User Login</h2>
  </div>
	 
  <form method="post" action="ulogin.php">
  	<?php include('errors.php'); ?>
  	<div class="input-group">
  		<label>Username</label>
  		<input type="text" name="username" >
  	</div>
  	<div class="input-group">
  		<label>Password</label>
  		<input type="password" name="password">
  	</div>
  	<div class="input-group">
  		<button type="submit" class="btn" name="login_user">Login</button>
  	</div>
  	<p>
  		Not yet a member? <a href="uregister.php">Sign up</a>
  	</p>
  </form>
</body>
</html>
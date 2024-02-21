<?php include('dserver.php') ?>
<!DOCTYPE html>
<html>
<head>
  <title>Dietician Registration</title>
  <link rel="stylesheet" type="text/css" href="dstyle.css">
</head>
<body>
	<p>
  		 <a href="login.php">HOME</a>
  	</p>
  <div class="header">
  	<h2>Dietician Register</h2>
  </div>
	
  <form method="post" action="dregister.php">
  	<?php include('errors.php'); ?>
  	<div class="input-group">
  	  <label>Username</label>
  	  <input type="text" name="username" value="<?php echo $username; ?>">
  	</div>
  	<div class="input-group">
  	  <label>Email</label>
  	  <input type="email" name="email" value="<?php echo $email; ?>">
  	</div>
  	<div class="input-group">
  	  <label>Password</label>
  	  <input type="password" name="password_1">
  	</div>
  	<div class="input-group">
  	  <label>Confirm password</label>
  	  <input type="password" name="password_2">
  	</div>
  	<div class="input-group">
  	  <button type="submit" class="btn" name="reg_user">Register</button>
  	</div>
  	<p>
  		Already a member? <a href="dlogin.php">Log in</a>
  	</p>
  </form>
</body>
</html>
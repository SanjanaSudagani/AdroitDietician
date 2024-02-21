<?php include('userver.php') ?>
<!DOCTYPE html>
<html>
<head>
  <title>User Information</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	
  <div class="header">
  	<h2>User Information</h2>
  </div>
	
  <form method="post" action="uinfo.php">
  	<?php include('errors.php'); ?>
  	<div class="input-group">
  	  <label>Fullname</label>
  	  <input type="text" name="fname" value="<?php echo $fname; ?>">
  	</div>
  	<div class="input-group">
  	  <label>Age</label>
  	  <input type="text" name="age" value="<?php echo $age; ?>">
  	</div>
  	<div class="input-group">
  	  <label>Height (in cm)</label>
  	  <input type="text" name="ht" value="<?php echo $ht; ?>">
  	</div>
  	<div class="input-group">
  	  <label>Weight (in kg)</label>
  	  <input type="text" name="wt"value="<?php echo $wt; ?>">
  	</div>
      <div class="input-group">
  	  <label>Activities (Yoga, Aerobics, Exercise..,)</label>
  	  <input type="text" name="act" value="<?php echo $act; ?>">
  	</div>
  	<div class="input-group">
  	  <label>Working Hours (per week)</label>
  	  <input type="text" name="wh"value="<?php echo $wh; ?>">
  	</div>
      <div class="input-group">
  	  <label>Health issues (heart, kidney, liver, lung)</label>
  	  <input type="text" name="health1" value="<?php echo $health1; ?>">
  	</div>
	  <div class="input-group">
	  <label>Health issues (BP, diabetes, thyroid)</label>
  	  <input type="text" name="health2" value="<?php echo $health2; ?>">
  	</div>
	  <div class="input-group">
	  <label>Health issues (bodypains if any)</label>
  	  <input type="text" name="health3" value="<?php echo $health3; ?>">
  	</div>
  	<div class="input-group">
  	  <button type="submit" class="btn" name="save_uinfo">Submit</button>
  	</div>
  </form>
</body>
</html>
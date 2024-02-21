<?php include('userver.php') ?>
<!DOCTYPE html>
<html>
<head>
  <title>View User Information</title>
  <link rel="stylesheet" type="text/css" href="dstyle.css">
</head>
<body>

  <div class="header">
  	<h2>View User Information</h2>
  </div>
  <form method="post" action="viewuser.php">
  	<?php include('errors.php'); ?>
	  
  	<div class="input-group">
  	  <label>Enter User fullname</label>
  	  <input type="text" name="fname">
  	</div>
	  <div class="input-group">
  	  <button type="submit" class="btn" name="view_uinfo">View details</button>
  	</div>
  
<?php

$result = mysqli_query($db,"SELECT fullname,age,height,weight,activities,workinghrs,health1,health2,health3 FROM user_info where fullname='$fname'"); 
while ($row = $result->fetch_assoc()) {
?>
<div class="input-group">
  	  <label>Fullname</label>
  	  <input type="text" name="fname" value="<?php echo $row['fullname']; ?>">
  	</div>
<div class="input-group">
  	  <label>Age</label>
  	  <input type="text" name="age" value="<?php echo $row['age']; ?>">
  	</div>
  	<div class="input-group">
  	  <label>Height (in cm)</label>
  	  <input type="text" name="ht" value="<?php echo $row['height']; ?>">
  	</div>
  	<div class="input-group">
  	  <label>Weight (in kg)</label>
  	  <input type="text" name="wt" value="<?php echo $row['weight']; ?>">
  	</div>
      <div class="input-group">
  	  <label>Activities (Yoga, Aerobics, Exercise..,)</label>
  	  <input type="text" name="act" value="<?php echo $row['activities']; ?>">
  	</div>
  	<div class="input-group">
  	  <label>Working Hours (per week)</label>
  	  <input type="text" name="wh" value="<?php echo $row['workinghrs']; ?>">
		</div>
      <div class="input-group">
  	  <label>Health issues (heart, kidney, liver, lung)</label>
  	  <input type="text" name="health1" value="<?php echo $row['health1']; ?>">
  	</div>
	  <div class="input-group">
	  <label>Health issues (BP, diabetes, thyroid)</label>
  	  <input type="text" name="health2" value="<?php echo $row['health2']; ?>">
  	</div>
	  <div class="input-group">
	  <label>Health issues (bodypains if any)</label>
  	  <input type="text" name="health3" value="<?php echo $row['health3']; ?>">
  	</div>
	  <div class="input-group">
  	  <button type="submit" class="btn" name="ok">view another</button>
  	</div>
	  <div class="input-group">
  	  <button type="submit" class="btn" name="back">Go back</button>
  	</div>
<?php
}
?>
  </form>
</body>
</html>

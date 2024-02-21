<?php include('userver.php') ?>
<!DOCTYPE html>
<html>
<head>
  <title>User Information</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

  <div class="header">
  	<h2>Update Information</h2>
  </div>
  
<?php
$uname=$_SESSION['username'];
$result = mysqli_query($db,"SELECT fullname,age,height,weight,activities,workinghrs,health1,health2,health3 FROM user_login NATURAL JOIN user_info where username='$uname'"); 
while ($row = $result->fetch_assoc()) {
    
?>
	
  <form method="post" action="updateinfo.php">
  	<?php include('errors.php'); ?>
	  
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
<?php
}
?>
  	<div class="input-group">
  	  <button type="submit" class="btn" name="update_uinfo">Submit</button>
  	</div>
  </form>
</body>
</html>
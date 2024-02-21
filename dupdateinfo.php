<?php include('dserver.php') ?>
<!DOCTYPE html>
<html>
<head>
  <title>Dietician Information</title>
  <link rel="stylesheet" type="text/css" href="dstyle.css">
</head>
<body>

  <div class="header">
  	<h2>Update Information</h2>
  </div>
  
<?php
$uname=$_SESSION['username'];
$result = mysqli_query($db,"SELECT fullname,qualification,location,address,sh,ch,status FROM diet_login NATURAL JOIN diet_info where username='$uname'"); 
while ($row = $result->fetch_assoc()) {
    
?>
	
  <form method="post" action="dupdateinfo.php">
  	<?php include('errors.php'); ?>
	  
  	<div class="input-group">
  	  <label>Fullname</label>
  	  <input type="text" name="fname" value="<?php echo $row['fullname']; ?>">
  	</div>
  	<div class="input-group">
  	  <label>Qualification</label>
  	  <input type="text" name="qual" value="<?php echo $row['qualification']; ?>">
  	</div>
  	<div class="input-group">
  	  <label>Clinic Main Location</label>
  	  <input type="text" name="loc" value="<?php echo $row['location']; ?>">
  	</div>
  	<div class="input-group">
  	  <label>Full Address</label>
  	  <input type="text" name="add" value="<?php echo $row['address']; ?>">
  	</div>
      <div class="input-group">
  	  <label>Starting Hour</label>
  	  <input type="text" name="sh" value="<?php echo $row['sh']; ?>">
  	</div>
  	<div class="input-group">
  	  <label>Closing Hour</label>
  	  <input type="text" name="ch" value="<?php echo $row['ch']; ?>">
  	</div>
      <div class="input-group">
  	  <label>Available days (weekdays, weekends)</label>
  	  <input type="text" name="st" value="<?php echo $row['status']; ?>">
  	</div>
<?php
}
?>
  	<div class="input-group">
  	  <button type="submit" class="btn" name="update_dinfo">Submit</button>
  	</div>
  </form>
</body>
</html>
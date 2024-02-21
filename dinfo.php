<?php include('dserver.php') ?>
<!DOCTYPE html>
<html>
<head>
  <title>Dietician Information</title>
  <link rel="stylesheet" type="text/css" href="dstyle.css">
</head>
<body>
	
  <div class="header">
  	<h2>Dietician Information</h2>
  </div>
	
  <form method="post" action="dinfo.php">
  	<?php include('errors.php'); ?>
  	<div class="input-group">
  	  <label>Fullname</label>
  	  <input type="text" name="fname" value="<?php echo $fname; ?>">
  	</div>
  	<div class="input-group">
  	  <label>Qualification</label>
  	  <input type="text" name="qual" value="<?php echo $qual; ?>">
  	</div>
  	<div class="input-group">
  	  <label>Clinic Main Location</label>
  	  <input type="text" name="loc" value="<?php echo $loc; ?>">
  	</div>
  	<div class="input-group">
  	  <label>Full Address</label>
  	  <input type="text" name="add"value="<?php echo $add; ?>">
  	</div>
      <div class="input-group">
  	  <label>Starting Hour</label>
  	  <input type="text" name="sh" value="<?php echo $sh; ?>">
  	</div>
  	<div class="input-group">
  	  <label>Closing Hour</label>
  	  <input type="text" name="ch"value="<?php echo $ch; ?>">
  	</div>
      <div class="input-group">
  	  <label>Available days (weekdays, weekends)</label>
  	  <input type="text" name="st" value="<?php echo $st; ?>">
  	</div>
  	<div class="input-group">
  	  <button type="submit" class="btn" name="save_dinfo">Submit</button>
  	</div>
  </form>
</body>
</html>
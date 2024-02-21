<?php include('dserver.php') ?>
<!DOCTYPE html>
<html>
<head>
  <title>Search Dietician</title>
  <link rel="stylesheet" type="text/css" href="searchstyle.css">
</head>
<body>

  <div class="header">
  	<h2>Search dietician</h2>
  </div>
  <form method="post" action="search.php">
  	<?php include('errors.php'); ?>
	  
  	<div class="input-group">
  	  <label>Enter Location</label>
  	  <input type="text" name="loc">
  	</div>
	  <div class="input-group">
  	  <button type="submit" class="btn" name="view_dinfo">Search</button>
        </div>
   
<?php

$result = mysqli_query($db,"SELECT fullname,qualification,location,address,sh,ch,status FROM diet_info where location='$loc'"); 
?>

      
<?php
while ($row = $result->fetch_assoc()) {
?>
<TABLE BORDER="5" align="center"   WIDTH="50%"   CELLPADDING="4" CELLSPACING="3">
   
   <TR>
      <TH>Fullname</TH>
      <TH>Qualification</TH>
      <TH>Main Location</TH>
      <TH>Clinic Address</TH>
      <TH>Starting hour</TH>
	<TH>closing hour</TH>
	<TH>Availability</TH>
   </TR>
<tr>
    <td><?php echo $row['fullname']; ?></td>
    <td><?php echo $row['qualification']; ?></td>
    <td><?php echo $row['location']; ?></td>
    <td><?php echo $row['address']; ?></td>
    <td><?php echo $row['sh']; ?></td>
    <td><?php echo $row['ch']; ?></td>
    <td><?php echo $row['status']; ?></td>
  </tr>	
  <?php
}
?>

</table>

	  <div class="input-group">
  	  <button type="submit" class="btn" name="back">Go back</button>
  	</div>
      </form>
</body>
</html>
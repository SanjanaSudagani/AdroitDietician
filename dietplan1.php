<?php include('userver.php') ?>
<!DOCTYPE html>
<html>
<head>
  <title>Dietplan</title>
  <link rel="stylesheet" type="text/css" href="planstyle.css">
</head>
<?php
$uname=$_SESSION['username'];
$result = mysqli_query($db,"SELECT fullname,age,height,weight,activities,workinghrs,health1,health2,health3 FROM user_login NATURAL JOIN user_info where username='$uname'"); 
while ($row = $result->fetch_assoc()) {
    
?>

<body>
<div class="header">
  	<h2>Non-Vegetarian Diet Plan</h2>
  </div>
<form method="post" action="dietplan.php">
<script type="text/javascript">
var fname = '<?php echo $row['fullname']; ?>';
var age = '<?php echo $row['age']; ?>';
var ht = '<?php echo $row['height']; ?>';
var wt = '<?php echo $row['weight']; ?>';
var act = '<?php echo $row['activities']; ?>';
var wh = '<?php echo $row['workinghrs']; ?>';
var h1 = '<?php echo $row['health1']; ?>';
var h2 = '<?php echo $row['health2']; ?>';
var h3 = '<?php echo $row['health3']; ?>';
var counth=0;
var countl=0;
if(age<31){
counth+=1;
}
else{
  countl+=1;
}
bmi=wt/(ht*0.01);
if(bmi<25){
  counth+=1;
}
else{
  countl+=1;
}
if(act.includes("none")){
  countl+=1;
}
else{
  counth+=1;
}
if(wh<30){
  countl+=1;
}
else{
  counth+=1;
}
//monday
if(counth==countl){
  document.write("<table border='1'><thead><th>WEEKLY PLAN</th><th>BREAKFAST</th><th>LUNCH</th><th>DINNER</th></thead><tbody>");
  document.write("<tr><th rowspan=2>" + "MONDAY" + "</th><td>" + "Sprouts" + "</td><td>" + "Brown Rice" + "</td><td>" + "Papaya" + "</td></tr>");
  document.write("<tr><td>" + "Yougurt" + "</td><td>" + "Potatoes" + "</td><td>" + "Pistachios" + "</td></tr>")
}
else if(counth<countl){
  document.write("<table border='1'><thead><th>WEEKLY PLAN</th><th>BREAKFAST</th><th>LUNCH</th><th>DINNER</th></thead><tbody>");
  document.write("<tr><th rowspan=2>" + "MONDAY" + "</th><td>" + "Sprouts" + "</td><td>" + "Soup" + "</td><td>" + "Papaya" + "</td></tr>");
  document.write("<tr><td>" + "Yougurt" + "</td><td>" + "Cucumber" + "</td><td>" + "Cherries" + "</td></tr>")
}
else if(countl<counth){
  document.write("<table border='1'><thead><th>WEEKLY PLAN</th><th>BREAKFAST</th><th>LUNCH</th><th>DINNER</th></thead><tbody>");
  document.write("<tr><th rowspan=2>" + "MONDAY" + "</th><td>" + "Sprouts" + "</td><td>" + "Beans" + "</td><td>" + "Carrots" + "</td></tr>");
  document.write("<tr><td>" + "Fruit Smoothie" + "</td><td>" + "Brown Rice" + "</td><td>" + "Dark Chocolate" + "</td></tr>")
}
//tuesday
if(h2.includes("bp")){
  document.write("<tr><th rowspan=2>" + "TUESDAY" + "</th><td>" + "Banana" + "</td><td>" + "prawns" + "</td><td>" + "Tomatoes" + "</td></tr>");
  document.write("<tr><td>" + "Grapes" + "</td><td>" + "Grains" + "</td><td>" + "Spinach" + "</td></tr>")
}
else {
  document.write("<tr><th rowspan=2>" + "TUESDAY" + "</th><td>" + "Strawberry" + "</td><td>" + "Peas" + "</td><td>" + "Pumpkin" + "</td></tr>");
  document.write("<tr><td>" + "Buttermilk" + "</td><td>" + "Cabbage" + "</td><td>" + "Dates" + "</td></tr>")
}
//wednesday
if(h2.includes("thyroid")){
  document.write("<tr><th rowspan=2>" + "WEDNESDAY" + "</th><td>" + "kiwi" + "</td><td>" + "Mushroom(olive oil)" + "</td><td>" + "Almonds" + "</td></tr>");
  document.write("<tr><td>" + "Apple" + "</td><td>" + "Grilled Fish" + "</td><td>" + "Dal" + "</td></tr>")
}
else {
  document.write("<tr><th rowspan=2>" + "WEDNESDAY" + "</th><td>" + "Bread" + "</td><td>" + "Corn" + "</td><td>" + "Fish(Salmon)" + "</td></tr>");
  document.write("<tr><td>" + "Peanut Butter" + "</td><td>" + "Cauliflower" + "</td><td>" + "Orange juice" + "</td></tr>")
}
//thursday
if(h1.includes("liver") || h1.includes("lung")){
  document.write("<tr><th rowspan=2>" + "THURSDAY" + "</th><td>" + "Green Tea" + "</td><td>" + "Brown Rice" + "</td><td>" + "Broccoli" + "</td></tr>");
  document.write("<tr><td>" + "Blue berries" + "</td><td>" + "Tomatoes" + "</td><td>" + "Peppers" + "</td></tr>")
}
else{
  document.write("<tr><th rowspan=2>" + "THURSDAY" + "</th><td>" + "Ice Tea" + "</td><td>" + "Rice" + "</td><td>" + "Carrot" + "</td></tr>");
  document.write("<tr><td>" + "Figs" + "</td><td>" + "Soya Beans" + "</td><td>" + "Tortilla" + "</td></tr>")
}
//friday
if(h1.includes("heart") || h1.includes("kidney")){
  document.write("<tr><th rowspan=2>" + "FRIDAY" + "</th><td>" + "Oats" + "</td><td>" + "Salmon" + "</td><td>" + "Nuts" + "</td></tr>");
  document.write("<tr><td>" + "Egg Whites" + "</td><td>" + "Chicken(skinless)" + "</td><td>" + "Pineapple" + "</td></tr>")
}
else{
  document.write("<tr><th rowspan=2>" + "FRIDAY" + "</th><td>" + "Mango" + "</td><td>" + "Chicken" + "</td><td>" + "Avacado" + "</td></tr>");
  document.write("<tr><td>" + "Cereal bar" + "</td><td>" + "Barley" + "</td><td>" + "Red grapes" + "</td></tr>")
}
//saturday
if(h2.includes("diabetes")){
  document.write("<tr><th rowspan=2>" + "SATURDAY" + "</th><td>" + "Pears" + "</td><td>" + "Drumstick" + "</td><td>" + "Spinach" + "</td></tr>");
  document.write("<tr><td>" + "Aloevera Juice" + "</td><td>" + "Cabbage" + "</td><td>" + "Sorghum" + "</td></tr>")
}
else {
  document.write("<tr><th rowspan=2>" + "SATURDAY" + "</th><td>" + "Protien shake" + "</td><td>" + "Beetroot" + "</td><td>" + "Pumpkin seeds" + "</td></tr>");
  document.write("<tr><td>" + "Brown Bread" + "</td><td>" + "Cucumber" + "</td><td>" + "Milk" + "</td></tr>")
}
//sunday
if(h2.includes("none")){
  document.write("<tr><th rowspan=2>" + "SUNDAY" + "</th><td>" + "Coffee" + "</td><td>" + "Fish" + "</td><td>" + "Dates" + "</td></tr>");
  document.write("<tr><td>" + "Coconut Water" + "</td><td>" + "Tomatoes" + "</td><td>" + "Cherries" + "</td></tr>")
}
else {
  document.write("<tr><th rowspan=2>" + "SUNDAY" + "</th><td>" + "Mint tea" + "</td><td>" + "Fish" + "</td><td>" + "Raisins" + "</td></tr>");
  document.write("<tr><td>" + "Red grapes" + "</td><td>" + "Beans" + "</td><td>" + "Rice" + "</td></tr>")
}
document.write("</tbody></table>");
</script>
<div class="input-group">
  	  <button type="submit" class="btn" name="va1">view previous</button>
  	</div>
    <div class="input-group">
  	  <button type="submit" class="btn" name="backp1">Home</button>
  	</div>
</form>
<?php
}
?>
</body>
</html>


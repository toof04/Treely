
<?php     
 session_start(); 
 $username = $_SESSION['user'];
    ?>

<style>
.button {
  background-color: #4CAF50; /* Green */
  border: none;
  color: white;
  padding: 16px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  transition-duration: 0.4s;
  cursor: pointer;
  width:200px;
}

.button1 {
  background-color: white; 
  color: black; 
  border: 2px solid #4CAF50;
}

.button1:hover {
  background-color: #4CAF50;
  color: white;
}
</style>


<html>
<?php 
include("connection.php");
$query="select name from psignup  where username = '$username'";
$result = mysqli_query($con, $query);
?>
<body style="size:100%;height:100%;background:url('bgp.jpg') no-repeat; background-size: cover; margin-left:10%"> 
<?php
    while($rows=mysqli_fetch_array($result)){
        echo "<span style = \"font-size:60px\"><center>Welcome ",$rows['name']," !</center></span>";
    }
 ?>
 <br><h1>what do you want to do today?</h1>
<a href = "2record.php" class="button button1">View Your Record</a> <br>
<a href = "updatepatient.php" class="button button1">Update Your Record</a><br>
<a href = "2appoi.html" class="button button1">Book An Appointment</a><br>
 </body>

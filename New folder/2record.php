
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
$query="select name,age,gender,email,phone from psignup  where username = '$username';";
$query1="select name from psignup  where username = '$username';";
$query2="SELECT Appointments,appDoc,dob,Allergies,Vaccination,Height,weight,Temp,Medication  FROM `psignup` where Username='$username';";

$result = mysqli_query($con, $query);
$result1 = mysqli_query($con, $query1);
$result2 = mysqli_query($con, $query2);

?>
<body style="size:100%;height:100%;background:url('bgp.jpg') no-repeat; background-size: cover; margin-left:10%"> 
<?php
    while($rows=mysqli_fetch_array($result1)){
        echo "<span style = \"font-size:60px\"><center>Welcome ",$rows['name']," !</center></span>";
    }
    ?>
 <br><h1>Here are your saved records :</h1> 
 <h2>Basic Details : </h2>
 <p style= "font-size:20px; padding:5px;border:2px black dashed; width: 20%">
 <?php
    while($rows=mysqli_fetch_array($result)){
        echo "Name : ",$rows['name'],"<br>";
        echo "Age : ",$rows['age'],"<br>";
        echo "Gender : ",$rows['gender'],"<br>";
        echo "Email : ",$rows['email'],"<br>";
        echo "Phone : ",$rows['phone'],"<br>";
    }
 ?>
 </p>
<h2>Medical Details:</h2> 
 <p style= "font-size:20px; padding:5px;border:2px black dashed; width: 20%">
 <?php
    while($rows=mysqli_fetch_array($result2)){
        echo "Appointment : ",$rows['Appointments'],"<br>";
        echo "Appointed Doctor : ",$rows['appDoc'],"<br>";
        echo "Date of birth : ",$rows['dob'],"<br>";
        echo "Allergies : ",$rows['Allergies'],"<br>";
        echo "Vaccination History : ",$rows['Vaccination'],"<br>";
        echo "Height : ",$rows['Height']," cm <br>";
        echo "Weight : ",$rows['weight']," cm <br>";
        echo "temp : ",$rows['Temp']," Celsius<br>";
        echo "Ongoing Medication : ",$rows['Medication'],"<br>";
    }
 ?>
 </p>
 <a href = "2.php" class = "button button1"> Go back </a>
 </body>

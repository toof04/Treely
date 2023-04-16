<?php
$insert = false;
if(isset($_POST['name'])){
    // Set connection variables
    $server = "localhost";
    $username = "root";
    $password = "";
    session_start(); 
    $username1 = $_SESSION['user'];
   
    // Create a database connection
    $con = mysqli_connect($server, $username, $password);

    // Check for connection success
    if(!$con){
        die("connection to this database failed due to" . mysqli_connect_error());
    }
    // echo "Success connecting to the db";

    // Collect post variables
    $name = $_POST['name'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $Allergies = $_POST['Allergies'];
    $dob = $_POST['dob'];
    $email = $_POST['email'];
    $Medication = $_POST['Medication'];
    $Vaccination = $_POST['Vaccination'];
    $Height = $_POST['Height'];
    $Weight = $_POST['Weight'];
    $Temp = $_POST['Temp'];
    $sql = "UPDATE `patient`.`psignup` SET name =  '$name' , age =  '$age',  gender='$gender',email='$email',phone='$phone',dob='$dob',Allergies='$Allergies',Vaccination='$Vaccination',Height='$Height',Weight='$Weight',Temp='$Temp',Medication='$Medication' WHERE username='$username1';";
    // echo $sql;

    // Execute the query
    if($con->query($sql) == true){
        // echo "Successfully inserted";

        // Flag for successful insertion
        $insert = true;
    }
    else{
        echo "ERROR: $sql <br> $con->error";
    }

    // Close the database connection
    $con->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://fonts.googleapis.com/css?family=Roboto|Sriracha&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body style="overflow: hidden; size:100%;height:100%;background:url('bgp.jpg') no-repeat; background-size: cover; margin-left:10%">

    <div class="container">
    <center><span style="font-size:50px">Update Details</span></center>
       <div style = " margin-left: 9%; "> <p><h1>Update Your Details :</h1>  </p>
        
        <form action="updatepatient.php" method="post">
        <p style= "font-size:20px; padding:15px;border:2px black dashed; width: 20%">Name  : <input type="text" name="name" id="name" placeholder="Enter your name"> <br><br>
            Age   : <input type="text" name="age" id="age" placeholder="Enter your Age"><br><br>
            Gender: Male <input type="radio" id="gender" name="gender" value="Male"> |  Female <input type="radio" id="gender" name="gender" value="Female"><br><br>
            Email : <input type="email" name="email" id="email" placeholder="Enter your email"><br><br>
            Phone : <input type="phone" name="phone" id="phone" placeholder="Enter your phone"><br><br>

            Date of birth : <input type="date" name="dob" id="dob"><br>

</p>  <p style= "font-size:20px; padding:15px;border:2px black dashed; width: 20%">
            Allergies: <input type="text" name="Allergies" id="Allergies" placeholder="Enter Allergies, if any"> <br><BR>
            Vaccination: <input type="text" name="Vaccination" id="Vaccination" placeholder="Enter your Vaccination history"><br><BR>
            Medication: <input type="text" name="Medication" id="Medication" placeholder="Enter if you are taking any Medication"><br><BR>
            Height: <input type="text" name="Height" id="Height" placeholder="Enter your Height"><br><BR>
            Weight: <input type="text" name="Weight" id="Height" placeholder="Enter your Weight"><br><BR>
            Temp: <input type="text" name="Temp" id="Temp" placeholder="Enter your temperatue in c"><br><BR>
</p>


            <div style="margin-left:19%;position:absolute;top:75%;"> <center><button class="btn button button1">Update</button> <a href = "2.php" class="button button 1">Go Back</a></center>
           <?php
        if($insert == true){
        echo "<p class='submitMsg'>Congrats ! your account has been made, now you can Login.</p>";
        }
    ?> </div>
        </form>
    </div>
    </div>
    <script src="index.js"></script>
    
</body>
</html>
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
}</style>
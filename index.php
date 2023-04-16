<style>
    .btn {
  background-color: #4CAF50; /* Green */
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
}
    </style>
<?php
$insert = false;
if(isset($_POST['name'])){
    // Set connection variables
    $server = "localhost";
    $username = "root";
    $password = "";

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
    $username = $_POST['username'];
    $pass = $_POST['password'];
    $sql = "INSERT INTO `patient`.`psignup` (`name`, `age`, `gender`, `email`, `phone`, `username`, `password`) VALUES ('$name', '$age', '$gender', '$email', '$phone', '$username', '$pass');";
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
<body style="overflow: hidden;">

    <div class="container">
    <center><h1>Patient Signup</h3></center>
       <div style = " margin-left: 20%; "> <p>Enter your details and submit this form  </p>
        
        <form action="index.php" method="post">
            Name  : <input type="text" name="name" id="name" placeholder="Enter your name"> <br><br>
            Age   : <input type="text" name="age" id="age" placeholder="Enter your Age"><br><br>
            Gender: Male <input type="radio" id="gender" name="gender" value="Male"> |  Female <input type="radio" id="gender" name="gender" value="Female"><br><br>
            Email : <input type="email" name="email" id="email" placeholder="Enter your email"><br><br>
            Phone : <input type="phone" name="phone" id="phone" placeholder="Enter your phone"><br>
            <div style="border: 2px solid gray; padding:10px;margin-left:20%;position:absolute;top:35%;"> 
             Address:<input type="text" name = "address" id = "address" placeholder="Enter your address" style="height:30px"></div><br>
             <div style="border: 2px solid gray; padding:10px;margin-left:40%;position:absolute;top:35%;"> Username: <input type="username" name="username" id="username"  placeholder="Username"><br>
            <br>Password:  <input type="password" name="password" id="password"  placeholder="Password"></div>
            <div style="margin-left:49%;position:absolute;top:75%;"> <center><button class="btn">Submit</button> </center>
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

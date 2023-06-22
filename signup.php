<?php

session_start();

if($_SERVER['REQUEST_METHOD']=='POST')
{
    $servername="localhost";
    $username="root";
    $password="";
    $database="register";

    $conn = new mysqli($servername, $username, $password, $database);

// Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

//$insert=false

    $firstname=$_POST['fname'];
    $lastname=$_POST['lname'];
    $Gender=$_POST['gender'];
    $num=$_POST['number'];
    $address=$_POST['add'];
    $gmail=$_POST['mail'];
    $password=$_POST['pass'];

    $sql = "SELECT * from form WHERE email = '$gmail'";
    $result = $conn->query($sql);

    if($result -> num_rows == 1){
        echo"<script type='text/javascript'> alert('Email already exists.Please try another one!')</script>";
    }


    else{
        

        if(!empty($gmail) && !empty($password) && !is_numeric($gmail))
        {
            $sql="INSERT into form (fname, lname, gender, cnum, address, email, pass) values('$firstname','$lastname','$Gender','$num','$address','$gmail','$password')";
        
            //$conn->query($sql);

            if($conn->query($sql) === true){
                header("Location: login.php");
                //$insert=true;
            }
            else{
                echo "ERROR: $sql <br> $conn->error";
            }
        }
        else{
            echo"<script type='text/javascript'> alert('Please Enter some Valid Information')</script>";

        }

    
    } 
}
?>


<!Doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewsport" content="width=device-width,initial-scale=1">
    <title>Form Login and Register</title>
    <link rel="stylesheet" href="style.css">    

</head>
<body>
    <div class="signup">
        <h1>Sign Up</h1>
        <h4>It's free and only takes a minute</h4>
        <form action="signup.php" method="post">
    
            <label>First Name</label>
            <input type="text" id="fname" name="fname" required>

            <label>Last Name</label>
            <input type="text" name="lname" required>

            <label>Gender</label>
            <input type="text" name="gender" required>

            <label>Contact Address</label>
            <input type="tel" name="number" required>

            <label>Address</label>
            <input type="text" name="add" required>

            <label>Email</label>
            <input type="email" name="mail" required>

            <label>Password</label>
            <input type="password" name="pass" required>

            <input type="submit" name="" value="Submit">
            

        </form>
        <p>By clicking the signup button, you agree to our<br>
        <a href="">Terms and conditions</a>  and <a href="#">Policy Privacy</a>
        </p>
        <p>Already have an account? <a href="login.php">Login Here</a></p>
    </div>
</body>
</html>    

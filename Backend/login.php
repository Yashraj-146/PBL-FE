//<?php
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
    $gmail=$_POST['mail'];
    $password=$_POST['pass'];

    if(!empty($gmail) && !empty($password) && !is_numeric($gmail))
    {
        $sql="SELECT * from form WHERE email='$gmail' AND pass='$password' ";

        $result=$conn->query($sql);

        if($result->num_rows == 1)
        {
            header("Location: index.php");
        }
        else{
            echo"<script type='text/javascript'> alert('Wrong username or password')</script>";
        }
        // $result=mysqli_query($conn,$query);
        // if($result){
        //     if ($result && mysqli_num_rows($result) > 0) {
        //         $row = mysqli_fetch_assoc($result);
        //         if ($row['pass'] == $password) {
        //             header("location: index.php");
        //             die;
        //         }
        //     }
            
        // }
        

    }
    else{
        echo"<script type='text/javascript'> alert('Wrong username or password')</script>";

    }

}








?>
<Doctype html>
    <html>
    <head>
        <meta charset="utf-8">
        <meta name="viewsport" content="width=device-width,initial-scale=1">
        <title>Form Login and Register</title>
        <link rel="stylesheet" href="style.css">
    
    </head>
    <body>
        <div class="login">
            <h1>Login</h1>
            <form action ="login.php" method="POST">
                <label>Email</label>
                <input type="email" name="mail" required>

                <label>Password</label>
                <input type="password" name="pass" required>

                <input type="submit" name="" value="Submit">
            </form>
            <p>Not having an account?<a href="signup.php">Sign Up here</a></p>
</body>
</html>

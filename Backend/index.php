<?php
$servername="localhost";
$username="root";
$password="";
$database="register";

$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}?>
<!Doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewsport" content="width=device-width,initial-scale=1">
    <title>Form Login and Register</title>
    <link rel="stylesheet" href="style.css">

</head>
<body>
<h1>Welcome user</h1>
<a href="login.php">Logout</a>
</body>
</html>








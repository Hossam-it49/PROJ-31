 
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "project_31";

// Create connection
$bis = mysqli_connect($servername, $username, $password, $dbname);
//Check connection
if (!$bis) {
    die("<h1 style=color:red; > <center> Faild connection:</center> </h1> " . mysqli_connect_error());
  }
// if($bis){
// echo "Connected successfully";
// }
?> 
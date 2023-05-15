<?php 
   include '/xampp/htdocs/project31/Connections/bis.php';

$sSQL= 'SET CHARACTER SET utf8'; 
mysqli_query($bis, $sSQL) or die ('Can\'t charset in DataBase'); 
 
$query="SELECT doctors_account.NameAr FROM doctors_account ,doctorscourse  WHERE doctors_account.DoctorCode=doctorscourse.DoctorCode AND doctorscourse.CourseCode='BIS403'";
$query1=mysqli_query($bis, $query) or die(mysqli_error($bis));
$quer=mysqli_fetch_array($query1);
 
foreach ($quer as $que) {
?>
<?php
    echo $que['NameAr'];
  };
?>
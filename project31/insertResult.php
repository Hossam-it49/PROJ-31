

<?php

ini_set('max_execution_time', 300); 


if (!isset($_SESSION)) {
  session_start();
}


// ** Logout the current user. **
// $logoutAction = $_SERVER['PHP_SELF']."?doLogout=true";
// if ((isset($_SERVER['QUERY_STRING'])) && ($_SERVER['QUERY_STRING'] != "")){
//   $logoutAction .="&". htmlentities($_SERVER['QUERY_STRING']);
// }

if ((isset($_GET['doLogout'])) &&($_GET['doLogout']=="true")){
  //to fully log out a visitor we need to clear the session varialbles
  $_SESSION['asd'] = NULL;
  $_SESSION['qwe'] = NULL;
  $_SESSION['confirm'] = NULL;
  $_SESSION['PrevUrl'] = NULL;
  unset($_SESSION['asd']);
  unset($_SESSION['confirm']);
  unset($_SESSION['qwe']);
  unset($_SESSION['PrevUrl']);
	
  $logoutGoTo = "indexAdmin.php";
  if ($logoutGoTo) {
    header("Location: $logoutGoTo");
    exit;
  }
}

// qwe for program value
if (!isset($_SESSION['asd']))

{
	  echo ' 
		   <script type="text/javascript"> 
			  window.location = "indexAdmin.php" 
		   </script>';
 }
 
 else 
 {
$user = $_SESSION['asd'];
$prog = $_SESSION['qwe'];
$pass = $_SESSION['id'];

  }
?>
<?php
if($prog == 'BIS')
{
require_once('Connections/bis.php'); 
$url = "images/st_images/bis/";
}
else
if($prog == 'FMI')
{
require_once('Connections/FMI.php'); 
$url = "images/st_images/fmi/";
 }
 
 ?>

<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? "'" . doubleval($theValue) . "'" : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}


$courseCode = $_GET['code'];
$doctorCode = $_GET['doc'];



mysqli_select_db($bis,$database_bis);
$query_CourseGroup = "SELECT doctorscourse.id, doctorscourse.group, doctorscourse.DoctorCode, doctorscourse.CourseCode, doctors_account.DoctorName, courses.CourseName, courses.CourseArbName, doctors_account.NameAr FROM doctorscourse, doctors_account, courses WHERE doctorscourse.DoctorCode = doctors_account.DoctorCode  AND doctorscourse.CourseCode = courses.CourseCode AND courses.CourseCode = '$courseCode' AND doctors_account.DoctorCode='$doctorCode' ";
$CourseGroup = mysqli_query($bis,$query_CourseGroup) or die('Error'.mysqli_error($bis));
$row_CourseGroup = mysqli_fetch_assoc($CourseGroup);
$totalRows_CourseGroup = mysqli_num_rows($CourseGroup);

// current data & time  بنقص ساعتين
$t = date('Y-m-d h:i:s', time());


$query_currentSemester = "SELECT curentsemester.semesterYear, curentsemester.SemesterCode FROM curentsemester ";
$currentSemester = mysqli_query($bis,$query_currentSemester) or die(mysqli_error($bis));
$row_currentSemester = mysqli_fetch_assoc($currentSemester);
$totalRows_currentSemester = mysqli_num_rows($currentSemester);

$sem = $row_currentSemester['SemesterCode'];
$year = $row_currentSemester['semesterYear'];

$query_currentResult = "SELECT variables.variable, variables.value FROM variables WHERE variables.value=1 ";
$currentResult = mysqli_query($bis,$query_currentResult) or die('Error'.mysqli_error($bis));
$row_currentResult = mysqli_fetch_assoc($currentResult);
$totalRows_currentResult = mysqli_num_rows($currentResult);


?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>البرامج الجديدة - كلية التجارة وإدارة الأعمال</title>

<style type="text/css">
<!--
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
	background-color: #06213F;
}
-->
</style>

<style type="text/css">
<!--
.style4 {
	font-family: "Traditional Arabic";
	font-size: 22px;
	color: #FFFFFF;
}
.style142 {font-size: 19px}
body,td,th {
	font-family: Traditional Arabic;
	font-size: 19px;
	font-weight: bold;
}
.style48 {font-family: "Traditional Arabic";
	color: #FFFFFF;
	font-size: 25px;
}
.style50 {font-family: "Traditional Arabic";
	font-size: 22px;
	font-weight: bold;
	color: #FFFF00;
}
.style8 {font-weight: bold;
	font-family: Andalus;
	font-size: 18px;
	color: #003366;
}
body {
	background-color: #06213F;
}
.style1 {font-size: 23px;
	font-family: "traditional Arabic";
	font-weight: bold;
	color: #FFFFFF;
}
.style146 {
	font-size: 24px;
	color: #FFFFFF;
}
.style158 {font-family: "traditional Arabic"; font-size: 24px; font-weight: bold; color: #006666; }
.style160 {color: #FF0000}
.style161 {
	color: #006699;
	font-size: 23px;
}
-->
.style66 {
	font-family: "traditional Arabic";
	font-size: 24px;
	font-weight: bold;
	color: #FF0000;
}
.style67 {
	font-family: "traditional Arabic";
	font-weight: bold;
	font-size: 20px;
}
.style1 {	font-size: 23px;
	font-family: "traditional Arabic";
	font-weight: bold;
	color: #FFFFFF;
}
.style69 {
	font-family: "Traditional Arabic";
	font-size: 21px;
	font-weight: bold;
}
.style142 {font-size: 19px}
.style146 {	font-size: 24px;
	color: #FFFFFF;
}
.style158 {font-family: "traditional Arabic"; font-size: 24px; font-weight: bold; color: #006666; }
.style160 {color: #FF0000}
.style161 {	color: #006699;
	font-size: 23px;
}
.style166 {color: #000000}
.style4 {	font-family: "Traditional Arabic";
	font-size: 22px;
	color: #FFFFFF;
}
.style38 {
  font-size: 25px;
  color: #0000FF;
}
.style33 {font-size: 22px}
.style34 {color: #FF0000; font-size: 22px; }
.style36 {font-weight: bold; font-family: "Traditional Arabic";}
.style37 {font-size: 21px; }
.style167 {font-size: 21px}
.style168 {color: #FFFFFF}
.style169 {font-size: 21px; color: #FFFFFF; }
.style170 {font-size: 24px}
-->
.title{
color:#800000;
font-size: 22px;
font-weight: bold;
}
.red{
color:#800000;
font-size: 18px;
font-weight: bold;
}
.button {
  background-color: #2F4F4F;
  border-color:black;
  color: white;
  text-align: center;
 font-weight: bold;
  font-size: 18px;
  cursor: pointer;
  width:120px;
  height:40px;
  margin-top: 10px;
}

.text{
color: darkblue;
}
fieldset{
border: 5px double black;

}
</style>
</head>

<body>
<p></p>
<table width="1000" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="100%" align="center" valign="top" bgcolor="#FFFFFF">
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr bgcolor="#EBEBEB">
        <td width="249" height="130" align="center" valign="middle" bgcolor="#FFFFFF"><?php
if($prog == 'BIS')  { 
?>
              <img src="images/logo/bis.png" width="200" height="100" />
              <?php } 
 else if($prog == 'FMI')
{ 
 ?>
              <img src="images/logo/FMI.png" width="120" height="120" />
              <?php } ?>
        </td>
        <td width="520" height="130" align="center" valign="middle" bgcolor="#993300" class="style8"><p class="style48"><span class="style1">&nbsp;الخدمات الإلكترونية للبرامج الجديدة<br />
          كلية التجارة وإدارة الأعمال - جامعة حلوان</span></p></td>
        <td width="231" height="130" align="center" valign="middle" bgcolor="#FFFFFF"><img src="Helwan_univercity_logo.jpg" width="130" height="120" /></td>
      </tr>
    
        <td colspan="3" align="center" valign="top" bgcolor=" #F5F5F5">     
          <span class="style26 style170">نتائج امتحانات الفصل الدراسي <span style="color:red;"> <?php if($row_currentSemester['SemesterCode'] == 1 ) echo "الاول"; else if($row_currentSemester['SemesterCode'] == 2 ) echo "الثانى"; else if($row_currentSemester['SemesterCode'] == 3 ) echo "الصيفى"; ?> </span>للعام الجامعي <span style="color:red;"> <?php echo $row_currentSemester['semesterYear']; ?> - <span class="style170">نتيجة <span style="color:darkblue;"> <?php if($row_currentResult['variable'] == 'Midterm' ) echo "الميدترم"; else if($row_currentResult['variable'] == 'Coursework' ) echo "أعمال السنة"; else if($row_currentResult['variable'] == 'Final' ) echo "الفصل الدراسي"; ?> </span></span></span></span></td>
      </tr>
          
<tr>

<?php  
if($row_currentResult['variable'] == 'Midterm' ) 

{
$L= 'SET CHARACTER SET utf8'; 
mysqli_query($bis,$L) or die ('Can\'t charset in DataBase');
 $sQL= 'SET NAMES utf8'; 
mysqli_query($bis,$sQL) or die ('Can\'t NAMES in DataBase'); 
if(isset($_POST["submit"]))
{
 if($_FILES['file']['name'])
 {
  $filename = explode(".", $_FILES['file']['name']);
  if($filename[1] == 'csv')
  {

   $handle = fopen($_FILES['file']['tmp_name'], "r");
   while($data = fgetcsv($handle))
   {
                $item1 = mysqli_real_escape_string($bis, $data[0]);  
                $item2 = mysqli_real_escape_string($bis, $data[1]);

                $query = "INSERT into bis_mid(StudentCode, midterm,CourseCode,DoctorCode) values('$item1','$item2','$courseCode','$doctorCode')";
              $result=mysqli_query($bis, $query);
   }
   fclose($handle);
   echo "<script>alert('تم تحميل النتيجة بنجاح');</script>";
    echo ' 
       <script type="text/javascript"> 
        window.location = "adminSubjectsSelectList.php" 
       </script>';
  }
 }
}

}

if($row_currentResult['variable'] == 'Coursework' ){

$L= 'SET CHARACTER SET utf8'; 
mysqli_query($bis,$L) or die ('Can\'t charset in DataBase');
 $sQL= 'SET NAMES utf8'; 
mysqli_query($bis,$sQL) or die ('Can\'t NAMES in DataBase'); 
if(isset($_POST["submit"]))
{
 if($_FILES['file']['name'])
 {
  $filename = explode(".", $_FILES['file']['name']);
  if($filename[1] == 'csv')
  {

   $handle = fopen($_FILES['file']['tmp_name'], "r");
   while($data = fgetcsv($handle))
   {
                $item1 = mysqli_real_escape_string($bis, $data[0]);  
                $item2 = mysqli_real_escape_string($bis, $data[1]);
                $item3 = mysqli_real_escape_string($bis, $data[2]);  
                $item4 = mysqli_real_escape_string($bis, $data[3]);

                $query = "INSERT into coursework(StudentCode,CourseCode,DoctorCode,midterm,classwork,EvaluationTerm) 
                values('$item4','$courseCode','$doctorCode','$item3','$item2','$item1')";
                mysqli_query($bis, $query);

              }
   fclose($handle);
   echo "<script>alert('تم تحميل النتيجة بنجاح');</script>";
    echo ' 
       <script type="text/javascript"> 
        window.location = "adminSubjectsSelectList.php" 
       </script>';
  }
 }
}





}
?>



<table width="700" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <th height="30" align="left" valign="middle" class="style136" scope="col"></th>
  </tr>
  <tr>
    <th scope="col"><fieldset>
      <legend class="title">تحميل النتيجة</legend>
      <p class="style8"></p>
      <form method="post" enctype="multipart/form-data">
        <table width="598" align="center">
          <tr valign="baseline" bgcolor="#F3F3F3">
            <td height="30" align="right" valign="middle" nowrap><?php echo $row_CourseGroup['CourseArbName']; ?></td>
            <td align="right" valign="middle">:&nbsp;</td>
            <td height="30" align="right" valign="middle"><span class="style10">&nbsp;&nbsp;&nbsp;&nbsp;اسم المقرر</span></td>
          </tr>
          <tr valign="baseline">
            <td height="30" align="right" valign="middle" nowrap>د / <?php echo $row_CourseGroup['NameAr']; ?>&nbsp; </td>
            <td align="right" valign="middle">:&nbsp;</td>
            <td height="30" align="right" valign="middle"><span class="style10">&nbsp;&nbsp;&nbsp;&nbsp;اسم الدكتور</span></td>
          </tr>
<tr> 
<td height="30" align="right" valign="middle" nowrap>

<img src="result1.png"  />


</td>
  <td align="right" valign="middle">:&nbsp;</td>
 <td height="30" align="right" valign="middle"><span class="style10">&nbsp;&nbsp;&nbsp;&nbsp;شكل الملف المراد تحميله  ونوع الملف (.CSV)</span></td> 
</tr>
          <tr valign="baseline" bgcolor="#F3F3F3">
          
            <td width="417" height="30" align="right" valign="middle" nowrap>
              
                <input type="file" name="file" />
            </td>
            <td width="30" align="right" valign="middle">:&nbsp;</td>
            <td width="135" height="30" align="right" valign="middle"><span class="style10">&nbsp;&nbsp;&nbsp;&nbsp;الملف</span></td>
          </tr>
<p></p>
          <tr valign="baseline">
            <td height="30" colspan="3" align="center" valign="middle" nowrap><input type="submit" name="submit" value="Upload" class="button"></td>
          </tr>
        </table>
        <input type="hidden" name="group_id" value="<?php echo $groupid ; ?>">
        <input type="hidden" name="Sem_ID" value="<?php echo $sem ; ?>">
        <input type="hidden" name="year" value="<?php echo $year ; ?>">
        <input type="hidden" name="MM_insert" value="form1">
      </form>
      <p></p>
      <legend class="style8"></legend>
    </fieldset></th>
  </tr>
  <tr><td colspan="3" align="center" valign="top" bgcolor=" #ffffff"> </br></td></tr>
</table>



</tr>
 
      <tr>
        <td colspan="3" align="center" valign="top" bgcolor="#F5F5F5"> 
          <span class="style26 style170"><a href="adminSelectList.php">العودة الى الصفحة الرئيسية</a> &nbsp; | &nbsp;&nbsp;<a href="<?php echo $logoutAction ?>"> الخروج من البرنامج</a></span>          </td>
      </tr>
      
      <tr>
        <td colspan="3" align="center" valign="top" bgcolor="#06213F"><span class="style50">جميع الحقوق محفوظة &copy;  وحده تكنولوجيا المعلومات للبرامج الجديدة بالكلية</span></td>
      </tr>

    </table></td>
  </tr>
</table>

<p></p>
</body>
</html>

<?php 
session_start();

include '/xampp/htdocs/project31/Connections/bis.php';
include '/xampp/htdocs/project31/shared/headNav.php';
include '/xampp/htdocs/project31/admin/logout.php';
// include '/xampp/htdocs/project31/admin_dashboard/pages/aside.php';
?>
<?php
if(isset($_POST['login'])){
$user = $_POST['user'];
$pass = $_POST['pass'];
$select="SELECT*FROM `p31_users` WHERE name_en or email='$user'   and password='$pass' ";
$s=mysqli_query($bis, $select);  
$nomRows=mysqli_num_rows($s);
 
    if($nomRows > 0){     
 $_SESSION['admin'] =$user;   
    header('location:/project31/admin_dashboard/adminDash/pages/dashboard.php');
    }else{
        echo 'you are not admin';
    }
}
?>

<form method="POst" class="text-center text-light mx-auto bg-dark" style='width:550px;    margin-top:40px; padding:30px; '>
  <div><h3>Welcome in Login page</h3> </div>
  <div class="form-group ">
    <label for="exampleInputEmail1"  >User Name</label>
    <input name='user' placeholder="enter your user name" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
     
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input name='pass'   placeholder="enter your Password" type="password" class="form-control" id="exampleInputPassword1">
  </div>
  <div class="form-group form-check">
    
  </div>
  <button name='login' type="submit" class="btn btn-primary text-white">  Login </button>
</form>
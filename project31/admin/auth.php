 <?php 
 session_start();
 if($_SESSION['admin']){

}
else{
 
  header('location:/project31/admin/login.php');
}
 ?>
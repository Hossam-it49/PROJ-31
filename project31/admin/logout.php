<?php
// session_start();

// if(isset($_SESSION['admin'])){
//     unset($_SESSION['admin']);
//     session_destroy();
//     session_unset();
//     header("location: /graduation_project/admin/login.php");
// }




?>

<?php
// include '/xampp/htdocs/graduation_project/admin_dashboard/adminDash/pages/aside.php';
// session_start();

if (isset($_SESSION['admin'])){
        unset($_SESSION['admin']);
        session_destroy();
        session_unset();
    header('Location:/project31/admin/login.php');
    exit();
}
?>
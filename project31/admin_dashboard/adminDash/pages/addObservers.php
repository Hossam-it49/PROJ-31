<?php
    include '/xampp/htdocs/project31/admin_dashboard/adminDash/pages/aside.php';
    include '/xampp/htdocs/project31/admin_dashboard/adminDash/pages/color.php';
    include '/xampp/htdocs/project31/Connections/bis.php';

    if(isset($_POST['save']))  { 

        $nameE=$_POST['NameEn'] ;  
        $nameA=$_POST['NameAr'] ;
        $nid=$_POST['nid'] ;
        $phone=$_POST['phone'] ;
        $image=$_POST['image'] ;
       
        
        
       $observer = "INSERT INTO p31_observers (name_en, name_ar, nid, phone, image)
       VALUES ('$nameen','$namear', '$nid' , '$phone','$image')";
        $query1=mysqli_query($bis, $observer) or die(mysqli_error($bis));
       
        };


        $select = "SELECT * FROM p31_observers";
      $s = mysqli_query($bis , $select);
      if(isset($_GET['delete'])){
          $id = $_GET['delete'];
          $delete = "DELETE FROM p31_observers WHERE code = $id";
         $d = mysqli_query($bis , $delete);
         
      }
$nameE= "";
$nameA= "";
$nid = "";
$phone = "";
$image = "";
$update = false;
if(isset($_GET['edit'])){
  $update = true;
$id = $_GET['edit'];
$select = "SELECT * FROM `p31_observers` WHERE code = $id";
$s = mysqli_query($bis , $select);
$row = mysqli_fetch_assoc($s);
$nameE=$row['name_en'] ;  
$code=$row['code'] ;  
$nameA=$row['name_ar'] ;
$nid=$row['nid'] ;
$phone=$row['phone'] ;
$image=$row['image'] ;}
 
 
if(isset($_POST['Update'])){
  $code=$_POST['code'] ;  
  $nameE=$_POST['NameEn'] ;  
  $nameA=$_POST['NameAr'] ;
  $nid=$_POST['nid'] ;
  $phone=$_POST['phone'] ;
  $image=$_POST['image'] ;

$update = "UPDATE `p31_observers` SET name_en = '$nameE', name_ar = '$nameA', nid = '$nid' , phone = '$phone' ,image = '$image' WHERE code='$code' ";
$u = mysqli_query($bis , $update);
}
$block=false;
if(isset($_GET['block'])){
  $block=true;
$id=$_GET['block'];

$block = "UPDATE `p31_observers` SET block = 1  WHERE code='$id' ";
$u = mysqli_query($bis , $block);
}
if(isset($_GET['unblock'])){
 
$id=$_GET['unblock'];

$unblock = "UPDATE `p31_observers` SET block = 0  WHERE code='$id' ";
$u = mysqli_query($bis , $unblock);

}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <title>
    Graduation Project 31
  </title>
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <!-- Nucleo Icons -->
  <link href="../assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- CSS Files -->
  <link id="pagestyle" href="../assets/css/soft-ui-dashboard.css?v=1.0.7" rel="stylesheet" />
  <link rel="stylesheet" href="/admin_dashboard/adminDash/assets/css/all.min.css">
  <script src="https://kit.fontawesome.com/d941f7cd74.js" crossorigin="anonymous"></script>
  <script src="/admin_dashboard/adminDash/assets/js/all.min.js" crossorigin="anonymous"></script>
  
</head>

<body class="g-sidenav-show  bg-gray-100">
  
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" navbar-scroll="true">
      <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pages</a></li>
            <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Add Observers</li>
          </ol>
          <h6 class="font-weight-bolder mb-0">Add Observers</h6>
        </nav>
        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
          <div class="ms-md-auto pe-md-3 d-flex align-items-center">
            <div class="input-group">
              <span class="input-group-text text-body"><i class="fas fa-search" aria-hidden="true"></i></span>
              <input type="text" class="form-control" placeholder="Type here...">
            </div>
          </div>
          <ul class="navbar-nav  justify-content-end">
            <li class="nav-item d-flex align-items-center">
              <a href="/project31/admin/login.php" class="nav-link text-body font-weight-bold px-0">
                <i class="fa fa-user me-sm-1"></i>
                 <button  class="btn btn-primary "  >LogOut</button> 
              </a>
            </li>
            <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
              <a href="javascript:;" class="nav-link text-body p-0" id="iconNavbarSidenav">
                <div class="sidenav-toggler-inner">
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                </div>
              </a>
            </li>
            <li class="nav-item px-3 d-flex align-items-center">
              <a href="javascript:;" class="nav-link text-body p-0">
                <i class="fa fa-cog fixed-plugin-button-nav cursor-pointer"></i>
              </a>
            </li>
            
                      
    </nav>
    <!-- End Navbar -->

    <form style="width: 60%; margin:auto; background-color:#D1D9DF;" action="addObservers.php" method="post" class="rounded mt-5 align-items-center border border-danger-subtle border-3  p-1 text-center">

    <div  class=" p-1">
<input hidden name="code" class="form-control" type="text" value="<?php echo $code?>" placeholder="Enter Code" aria-label="default input example">
</div>
<div  class=" p-2">
 <label>  Name in English </label>
<input name="NameEn" class="form-control" type="text" value="<?php echo $nameE?>" placeholder="Enter Name in English" aria-label="default input example">
</div>

<div  class=" p-2">
 <label> Name in Arabic </label>
<input name="NameAr" class="form-control" type="text" type="text" value="<?php echo $nameA?>"  placeholder="Enter Name in Arabic" aria-label="default input example">
</div>

<div  class=" p-2">
 <label> National ID </label>
<input name="nid" class="form-control" type="number" value="<?php echo $nid?>" placeholder="Enter national id" aria-label="default input example">
</div>
<div  class=" p-2">
 <label> Phone </label>
<input name="phone" class="form-control" type="number" value="<?php echo $phone?>" type="number" placeholder="Enter phone"  aria-label="default input example">
</div>
<div  class=" p-1">
 <label> image </label>
<input name="image" class="form-control" type="file"  value="<?php echo $image?>"   aria-label="default input example">
</div>
  
<?php 
if($update){ ?>
    <button type="submit" name="Update" class="btn btn-dark btn-block">update</button>
    <?php
    }
    else{  
    ?> <button type="submit" name="save" class="btn btn-dark btn-block">save</button>
  <?php } ?>


</form>
    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card mb-4">
            <div class="card-header pb-0">
              <h6>Observers table</h6>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Code</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Name</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">phone</th>
                      <th class="text-secondary opacity-7"></th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
  $getData= "SELECT * FROM  p31_observers"; 
 $observers=mysqli_query($bis, $getData) or die(mysqli_error($bis));
$getData1=mysqli_fetch_array($observers);
foreach($observers as $observer){
?>
                    <tr>
                      <td>
                        <div class="d-flex px-2 py-1">
                        <div>                          
                            <img src="../assets//img/<?php echo $observer['image'];?>" class="avatar avatar-sm me-3" alt="user2">
                          </div>
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm"><?php echo $observer['code']; ?></h6>
                            
                          </div>
                        </div>
                      </td>
                      <td>
                        <p class="text-xs font-weight-bold mb-0"><?php echo $observer['name_en']; ?></p>
                        <p class="text-xs text-secondary mb-0"><?php echo $observer['nid']; ?></p>
                      </td>
                      <td class="align-middle text-center text-sm">
                        <span class="badge badge-sm bg-gradient-success"><?php echo $observer['phone']; ?></span>
                      </td>

                      <td class="align-middle text-center">
                      <a href="addobservers.php?edit=<?php echo $observer['code']?>"> <button name="edit" type="submit" class="btn btn-outline-info">Edit</button></a>
                      </td>
                      <td class="align-middle text-center">
                      <a href="addobservers.php?delete=<?php  echo $observer['code']?>"><button name="delete" type="submit" class="btn btn-outline-danger">delete</button></a> 
                      </td>
                      <td class="align-middle text-center">
                       <?php
                        
                           if($observer['block']==1){
                       ?>
                      <a href="addobservers.php?unblock=<?php echo $observer['code']?>"><button name="unblock" type="submit" class="btn btn-dark">UnBlock</button></a> 
                          
                      <?php
                           
                           }else{
                          
                      ?>
                      <a href="addobservers.php?block=<?php  echo $observer['code']?>"><button name="block" type="submit" class="btn btn-danger">Block</button></a> 
                         <?php
                        }
                         ?>
                      </td>
                    
                    </tr>
                     <?php
                        };
                     ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
      
  <!--   Core JS Files   -->
  <script src="../assets/js/core/popper.min.js"></script>
  <script src="../assets/js/core/bootstrap.min.js"></script>
  <script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="../assets/js/plugins/smooth-scrollbar.min.js"></script>
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../assets/js/soft-ui-dashboard.min.js?v=1.0.7"></script>
</body>

</html>
<?php
    include '/xampp/htdocs/project31/admin_dashboard/adminDash/pages/aside.php';
    include '/xampp/htdocs/project31/Connections/bis.php';
     include '/xampp/htdocs/project31/admin_dashboard/adminDash/pages/color.php';

     $getData= "SELECT * FROM  p31_staff"; 
     $staffs=mysqli_query($bis, $getData) or die(mysqli_error($bis));
    $getData1=mysqli_fetch_array($staffs);


    if (isset($_POST['save'])) {
      $code=$_POST['x'];
      
      for($i=1; $i <= 10; $i++){
      if(isset($_POST['checkbox'.$code])){
     
      $checkbox=$_POST['checkbox'.$code]; 
        // Update database
        $query = "UPDATE p31_staff SET attendance=0 WHERE code=$checkbox";
        mysqli_query($bis, $query);
      };
    }}
    

      
      

    if(isset($_POST['success'])){
      $success=$_POST['success'];
        
      $query = "UPDATE p31_staff SET attendance=1 WHERE code=$success";
      mysqli_query($bis, $query);
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

<div style="margin-left: 17%; width: 80%;" class="container-fluid py-4 mt-5">
      <div class="row">
        <div class="col-12">
          <div class="card mb-4">
            <div class="card-header pb-0">
              <h6>Staff Attendance Table</h6>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-0">
              <form method="post" action="staff_absence.php">
                <table class="table align-items-center mt-3">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Name</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Degree</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Department</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">phone</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Attendance</th>
 
                    </tr>
                  </thead>
                  <tbody>
                   <?php
                         $getData= "SELECT * FROM  p31_staff WHERE attendance=1" ; 
                         $staffs=mysqli_query($bis, $getData) or die(mysqli_error($bis));
                        $getData1=mysqli_fetch_array($staffs);
                        foreach($staffs as $staf){
                          $x=1
                   ?>
                    <tr>
                      <td>
                        <div class="d-flex px-2 py-1">
                          <div>
                            <img src="../assets//img/<?php echo $staf['image'];?>" class="avatar avatar-sm me-3" alt="user2">
                          </div>
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm"><?php echo $staf['name_en']; ?></h6>
                            <p class="text-xs text-secondary mb-0"><?php echo $staf['nid']; ?></p>
                          </div>
                        </div>
                      </td>
                      <td>
                        <p class="text-xs font-weight-bold mb-0"><?php echo $staf['degree']; ?></p>
                      </td>
                      <td class="align-middle text-center text-sm">
                        <span class="badge badge-sm bg-gradient-success"><?php echo $staf['dep']; ?></span>
                      </td>
                      <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold"><?php echo $staf['phone']; ?></span>
                      </td>
                      <td class="align-middle text-center">
                    
                   
                         
                      <input type="checkbox" name="checkbox<?php echo $x?>" value="<?php echo $staf['code']; ?>" >
                     
                      <?php
                          
                      ?>
                      <input  hidden name="code" value="<?php echo $staf['code'] ?>" >
                      <input  hidden name="x" value="<?php echo $x ?>" >
                    
                 
                  
                      </td>
               
                   
                    </tr>
                    
                     <?php
                    $x++;
                          };
                     ?>
                  </tbody>
                  
                </table>
                 

                <center> <button type="submit" name="save" class="btn btn-dark btn-block">save</button></center> 
          
                              

              </div>
            </div>
          </div>
        </div>
      </div>


      <div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card mb-4">
            <div class="card-header pb-0">
              <h6>Staff table</h6>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Name</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Degree</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Department</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Retrieve</th>
                      
                    </tr>
                  </thead>
                  <tbody>
                   <?php
                         $getData= "SELECT * FROM  p31_staff WHERE attendance=0"; 
                         $staffs=mysqli_query($bis, $getData) or die(mysqli_error($bis));
                        $getData1=mysqli_fetch_array($staffs);
                        foreach($staffs as $staf){
                   ?>
                    <tr>
                      <td>
                        <div class="d-flex px-2 py-1">
                          <div>
                            <img src="../assets//img/<?php echo $staf['image'];?>" class="avatar avatar-sm me-3" alt="user2">
                          </div>
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm"><?php echo $staf['name_en']; ?></h6>
                            <p class="text-xs text-secondary mb-0"><?php echo $staf['nid']; ?></p>
                          </div>
                        </div>
                      </td>
                      <td>
                        <p class="text-xs font-weight-bold mb-0"><?php echo $staf['degree']; ?></p>
                      </td>
                      <td class="align-middle text-center text-sm">
                        <span class="badge badge-sm bg-gradient-success"><?php echo $staf['dep']; ?></span>
                      </td>
                      <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold"><?php echo $staf['phone']; ?></span>
                      </td>

                      <td class="align-middle text-center">
                       <?php
                        
                           if($staf['attendance']==0){
                       ?>
                      <a href="staff_absence.php"><button value="<?php echo $staf['code']; ?>" name="success" type="submit" class="btn btn-success">Retrieve</button></a> 
                          
                      <?php
                           
                           }else{
                          
                      ?>
                      <a href="addStaff.php?block=<?php  echo $staf['code']?>"><button name="block" type="submit" class="btn btn-danger">Block</button></a> 
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
<?php
 $username = 'User';
include('connection.php');
session_start();
if(isset($_SESSION['userID'])){
    $userid = $_SESSION['userID'];
    $profileLink = '';
    $sql = "SELECT `id`, `role_id`, `name`, `phone`, `email`, `email_verified_at`, `password`, `notification_token`, `remember_token`, `rewards_token`, `profilepic` ,  `created_at`, `updated_at` FROM `users` WHERE `id` = $userid";
    $result = mysqli_query($conn,$sql);
    while($row= mysqli_fetch_array($result)){
        $username = $row['name'];
        $profileLink = $row['profilepic'];
        //echo "<script>alert('$username')</script>";
    }

}else{
  
    header("location:auth-login.php");
   

}
?>

<html>
    <head>

    </head>
    <body>
        <nav class="header-navbar navbar-expand-lg navbar navbar-with-menu floating-nav navbar-light navbar-shadow">
      <div class="navbar-wrapper">
        <div class="navbar-container content">
          <div class="navbar-collapse" id="navbar-mobile">
            <div class="mr-auto float-left bookmark-wrapper d-flex align-items-center">
             
              
             
             
            </div>
            <ul class="nav navbar-nav float-right">
              
              <li class="nav-item d-none d-lg-block"><a class="nav-link nav-link-expand"><i class="ficon feather icon-maximize"></i></a></li>
             
              </li> 
              <!--<img class="round" src="./Images/ProfileImage.png" alt="avatar" height="40" width="40">-->
              <li class="dropdown dropdown-user nav-item"><a class="dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown">
                  <div class="user-nav d-sm-flex d-none"><span class="user-name text-bold-600"><?php echo "$username";  ?></span><span class="user-status">Available</span></div><span></span></a>
                <div class="dropdown-menu dropdown-menu-right"><a class="dropdown-item" href="logout.php"></i> Logout</a>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </nav>
    </body>
</html>
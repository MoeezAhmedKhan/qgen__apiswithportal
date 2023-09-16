<?php
 $currentFile = $_SERVER["SCRIPT_NAME"];
      $parts = Explode('/', $currentFile);
      $currentFile = $parts[count($parts) - 1];    
?>

<html>
    <head>

    </head>
    <body>
     <div class="main-menu menu-fixed menu-dark menu-accordion menu-shadow" data-scroll-to-active="true">
      <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
          <li class="nav-item mr-auto"><a class="navbar-brand" href="./index.php">
              <div class="brand-logo"></div>
              <h4 class="brand-text mb-0">QGen</h4></a></li>
          <li class="nav-item nav-toggle"><a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse"><i class="feather icon-x d-block d-xl-none font-medium-4 primary toggle-icon"></i><i class="toggle-icon feather icon-disc font-medium-4 d-none d-xl-block collapse-toggle-icon primary" data-ticon="icon-disc"></i></a></li>
        </ul>
      </div>
      <div class="shadow-bottom"></div>
      <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
<!--           <li class=" nav-item"><a href="index.php"><i class="feather icon-home"></i><span class="menu-title" data-i18n="Dashboard">Dashboard</span></a>
            <ul class="menu-content">
            <?php if($currentFile=="index.php"){?>
              <li class="active nav-item"><a href="index.php"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="Analytics">Analytics</span></a>
              </li>
             <?php }else{ ?>
              <li class="nav-item"><a href="index.php"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="Analytics">Analytics</span></a>
              </li>
             <?php } ?>
            </ul>
          </li> -->
          
          </li>
         
         
           <li class=" navigation-header"><span>Data</span>
          </li>
            
           <?php if($currentFile=="index.php"){?>
          <li class="active nav-item"><a href="index.php"><i class="feather icon-edit"></i><span class="menu-title" data-i18n="Calender">Analytics</span></a>
          </li>
           <?php }else{ ?>
            <li class=" nav-item"><a href="index.php"><i class="feather icon-edit"></i><span class="menu-title" data-i18n="Calender">Analytics</span></a>
          </li>
           <?php } ?>
           
           
         
    
          <li class=" navigation-header"><span>Enter Data Options</span>
          </li>
          
            <?php if($currentFile=="view_user.php"){?>
          <li class="active nav-item"><a href="view_user.php"><i class="feather icon-edit"></i><span class="menu-title" data-i18n="Calender">Manage User</span></a>
          </li>
           <?php }else{ ?>
            <li class=" nav-item"><a href="view_user.php"><i class="feather icon-edit"></i><span class="menu-title" data-i18n="Calender">Manage User</span></a>
          </li>
           <?php } ?>
           
            <?php if($currentFile=="view_client.php"){?>
          <li class="active nav-item"><a href="view_client.php"><i class="feather icon-edit"></i><span class="menu-title" data-i18n="Calender">Manage Client</span></a>
          </li>
           <?php }else{ ?>
            <li class=" nav-item"><a href="view_client.php"><i class="feather icon-edit"></i><span class="menu-title" data-i18n="Calender">Manage Client</span></a>
          </li>
           <?php } ?>
           
              <?php if($currentFile=="view_categories.php"){?>
          <li class="active nav-item"><a href="view_categories.php"><i class="feather icon-edit"></i><span class="menu-title" data-i18n="Calender">Manage Categories</span></a>
          </li>
           <?php }else{ ?>
            <li class=" nav-item"><a href="view_categories.php"><i class="feather icon-edit"></i><span class="menu-title" data-i18n="Calender">Manage Categories</span></a>
          </li>
           <?php } ?>
           
           <?php if($currentFile=="view_list.php"){?>
          <li class="active nav-item"><a href="view_list.php"><i class="feather icon-edit"></i><span class="menu-title" data-i18n="Calender">Manage List</span></a>
          </li>
           <?php }else{ ?>
            <li class=" nav-item"><a href="view_list.php"><i class="feather icon-edit"></i><span class="menu-title" data-i18n="Calender">Manage List</span></a>
          </li>
           <?php } ?>
           
          
          
          
          <li class=" navigation-header"><span>View the Details</span>
          </li>
          
        
             
        </ul>
      </div>
    </div>
    </body>
</html>
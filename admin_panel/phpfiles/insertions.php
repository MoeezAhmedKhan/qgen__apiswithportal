<?php


if(isset($_POST['btnSubmit_insertAnnouncement'])){
include('../assets/connection.php');

  $title = $_POST['title'];  
  $desc = $_POST['desc'];


        $sql = "INSERT INTO `sliders`(`title`, `description`) VALUES ('$title','$desc')";
        $result = mysqli_query($conn,$sql);
        if($result){
          header("Location:../add_announcements.php?Massage=Sucessfully added new announcement.");
        }
     
      

}


// for the insertion of News
if(isset($_POST['btnSubmit_insertCategory'])){
include('../assets/connection.php');

  $CatName = $_POST['CatName'];  
  $CatDes = $_POST['CatDes'];


        $sql = "INSERT INTO `questions_categories`(`category_name`, `category_description`) VALUES ('$CatName','$CatDes')";
        $result = mysqli_query($conn,$sql);
        if($result){
          header("Location:../addquestion_category.php?Massage=Sucessfully added new news.");
        }
     
      

}

if(isset($_POST['btnSubmit_insertmiles'])){
include('../assets/connection.php');

  $id = $_POST['id']; 
  $miles = $_POST['miles']; 



        // $sql = "INSERT INTO `distance`(`distance`) VALUES ('$miles')";
        $sql = "UPDATE `distance` SET `distance` = '$miles' WHERE `id` = '$id' ";
        $result = mysqli_query($conn,$sql);
        if($result){
          header("Location:../add_miles.php?Massage=Sucessfully added new news.");
        }
     
      

}

// for the insertion of packages
if(isset($_POST['btnSubmit_insertpackage'])){
include('../assets/connection.php');

  $package_name = $_POST['package_name'];  
  $package_price = $_POST['package_price'];


        $sql = "INSERT INTO `packages`(`package_name`, `package_price`) VALUES ('$package_name','$package_price')";
        $result = mysqli_query($conn,$sql);
        if($result){
          header("Location:../packages.php?Massage=Sucessfully added new package.");
        }
}











// for the insertion of classes
if(isset($_POST['btnSubmit_insertClass'])){
include('../assets/connection.php');

  
$course_name = $_POST['course_name'];
$description = $_POST['description'];
$class_timings =$_POST['class_timings'];
$class_days =$_POST['class_days'];
$exercise_name =$_POST['exercise_name'];
$class_timingsx =implode("#imp#",$class_timings);
$class_daysx =implode("#imp#",$class_days);
$exercise_namex =implode("#imp#",$exercise_name);




$target_dir = "uploads/";
$fileName = rand()."_".basename($_FILES["image"]["name"]);
$target_file = $target_dir . $fileName;

$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {


$sql = "INSERT INTO `classes`(`course_name`, `description`,`class_timings`,`class_days`,`exercise_name`, `image`) VALUES ('$course_name','$description','$class_timingsx','$class_daysx','$exercise_namex','$fileName')";

   $result = mysqli_query($conn,$sql);
        if($result){
          header("Location:../classes.php?Massage=Sucessfully added new classes.");
        }
} else {
    $data = ["status"=>false,
                "message"=>"there was a problem while uploading image"];
      echo json_encode($data);   
  }
    
}























// for the insertion of shedules
if(isset($_POST['btnSubmit_insertshedule'])){
include('../assets/connection.php');

  $shedule_name = $_POST['shedule_name'];  
  $shedule_description = $_POST['shedule_description'];
// $shedule_image = $_POST['shedule_image'];
        $sql = "INSERT INTO `shedule`(`shedule_name`, `shedule_description`) VALUES ('$shedule_name','$shedule_description')";
        $result = mysqli_query($conn,$sql);
        if($result){
          header("Location:../shedule.php?Massage=Sucessfully added new shedule.");
        
        }
}




if(isset($_POST['btnUpdateImage'])){
include('../assets/connection.php');
  
  $CatID = $_POST['CatID'];
  $target_dir = "../Uploads/";
  $target_file = $target_dir . basename($_FILES["updatedImage"]["name"]);
  $uploadOk = 1;
  $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
  
  if ($_FILES["updatedImage"]["size"] > 500000) {
  echo "<script>alert('Sorry, your file is too large.')</script>";
    $uploadOk = 0;
  }
  
  if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
      
       echo "<script>alert('Sorry, only JPG, JPEG, PNG & GIF files are allowed.')</script>";
      $uploadOk = 0;
    }
    
   if ($uploadOk == 0) {
       echo "<script>alert('Sorry, your file was not uploaded.')</script>";
    } else {
      $get_file_name = "SELECT  `img`  FROM `categories` WHERE `id` = $CatID";
      $ex_file_name = mysqli_query($conn,$get_file_name);
      if(mysqli_num_rows($ex_file_name)>0){
          $Data = mysqli_fetch_array($ex_file_name);
           $image_name = $Data['img'];
          if (move_uploaded_file($_FILES["updatedImage"]["tmp_name"], $target_dir.$image_name)) {
            echo "The file ". htmlspecialchars( basename( $_FILES["CatImage"]["name"])). " has been updated.";
          
               header("Location:../addmaincat.php?Massage=Sucessfully updated category.");
            
          } else {
           
            echo "<script>alert('Sorry, there was an error uploading your file.')</script>";
          }
      }
      
   }
   
}


if(isset($_POST['btnUpdateProdImage'])){
include('../assets/connection.php');
 
  $ProdID = $_POST['ProID'];
  $target_dir = "../Uploads/";
  $target_file = $target_dir . basename($_FILES["updatedImage"]["name"]);
  $uploadOk = 1;
  $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
  
  if ($_FILES["updatedImage"]["size"] > 500000) {
  echo "<script>alert('Sorry, your file is too large.')</script>";
    $uploadOk = 0;
  }
  
  if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
      
       echo "<script>alert('Sorry, only JPG, JPEG, PNG & GIF files are allowed.')</script>";
      $uploadOk = 0;
    }
    
   if ($uploadOk == 0) {
       echo "<script>alert('Sorry, your file was not uploaded.')</script>";
    } else {
      $get_file_name = "SELECT  `img`  FROM `product_images` WHERE `product_id` = $ProdID";
      $ex_file_name = mysqli_query($conn,$get_file_name);
      if(mysqli_num_rows($ex_file_name)>0){
          $Data = mysqli_fetch_array($ex_file_name);
           $image_name = $Data['img'];
          if (move_uploaded_file($_FILES["updatedImage"]["tmp_name"], $target_dir.$image_name)) {
              echo "The file ". htmlspecialchars( basename( $_FILES["updatedImage"]["name"])). " has been updated.";
               header("Location:../addmaincat.php?manageproducts=Sucessfully updated product.");
            
          } else {
           
            echo "<script>alert('Sorry, there was an error uploading your file.')</script>";
          }
      }
      
   }
   
}



if(isset($_POST['btnUpdateSubCatImage'])){
include('../assets/connection.php');
  session_start();
  $CatID = $_POST['CatID'];
  $target_dir = "../Uploads/";
  $target_file = $target_dir . basename($_FILES["updatedImage"]["name"]);
  $uploadOk = 1;
  $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
  
  if ($_FILES["updatedImage"]["size"] > 500000) {
  echo "<script>alert('Sorry, your file is too large.')</script>";
    $uploadOk = 0;
  }
  
  if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
      
       echo "<script>alert('Sorry, only JPG, JPEG, PNG & GIF files are allowed.')</script>";
      $uploadOk = 0;
    }
    
   if ($uploadOk == 0) {
       echo "<script>alert('Sorry, your file was not uploaded.')</script>";
    } else {
      $get_file_name = "SELECT  `img`  FROM `sub_categories` WHERE `id` = $CatID";
      $ex_file_name = mysqli_query($conn,$get_file_name);
      if(mysqli_num_rows($ex_file_name)>0){
          $Data = mysqli_fetch_array($ex_file_name);
           $image_name = $Data['img'];
          if (move_uploaded_file($_FILES["updatedImage"]["tmp_name"], $target_dir.$image_name)) {
            echo "The file ". htmlspecialchars( basename( $_FILES["CatImage"]["name"])). " has been updated.";
           
               header("Location:../SubCat.php?Massage=Sucessfully updated sub category.");
            
          } else {
           
            echo "<script>alert('Sorry, there was an error uploading your file.')</script>";
          }
      }
      
   }
   
}



if(isset($_POST['BtnSendpush'])){
    include('../assets/connection.php');
    $v = $_POST['checkbox'];
    $cont = $_POST['content'];
    $playerId = [];
    $subject = '';
    foreach($v as $i){
        $user_id = $i;
        $sql_get_token = "SELECT `name`, `notification_token` FROM `users` WHERE `id`=$user_id";
        $ex = mysqli_query($conn,$sql_get_token);
        $Data = mysqli_fetch_array($ex);
         $Data['notification_token'];
        array_push($playerId, $Data['notification_token']);   
    }
      $content = array(
                    "en" => $cont
                    );

                $fields = array(
                    'app_id' => "daa2ba7b-daef-4363-935e-d5138d73cf98",
                     'include_player_ids' => $playerId,
                    'data' => array("foo" => "NewMassage","Id" => $taskid),
                    'large_icon' =>"ic_launcher_round.png",
                    'contents' => $content
                );

                $fields = json_encode($fields);
               

                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, "https://onesignal.com/api/v1/notifications");
                curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json; charset=utf-8',
                                                           'Authorization: Basic ODU5ZDhiZjAtOWRkZS00NDIyLWI0ZWItOTYxMDc5YzQzMGIz'));
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
                curl_setopt($ch, CURLOPT_HEADER, FALSE);
                curl_setopt($ch, CURLOPT_POST, TRUE);
                curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);    

                 $response = curl_exec($ch);
                curl_close($ch);
                header("Location:../SendNotifications.php?Massage=Sucessfully sent notification.");
    
}


if(isset($_POST['btnSubmit_insertSubCategories'])){
include('../assets/connection.php');
  session_start();
  $cat_name = $_POST['CatName'];
  $main_cat = $_POST['MainCat'];
  $target_dir = "../Uploads/";
  $target_file = $target_dir . basename($_FILES["CatImage"]["name"]);
  $uploadOk = 1;
  $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
  
  if ($_FILES["CatImage"]["size"] > 500000) {
  echo "<script>alert('Sorry, your file is too large.')</script>";
    $uploadOk = 0;
  }
  
  if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
      
       echo "<script>alert('Sorry, only JPG, JPEG, PNG & GIF files are allowed.')</script>";
      $uploadOk = 0;
    }
    
   if ($uploadOk == 0) {
       echo "<script>alert('Sorry, your file was not uploaded.')</script>";
    } else {
      $filewithnewname =  date("Ymdis")."_Sub_Cat.".$imageFileType;    
      if (move_uploaded_file($_FILES["CatImage"]["tmp_name"], $target_dir.$filewithnewname)) {
         "The file ". htmlspecialchars( basename( $_FILES["CatImage"]["name"])). " has been uploaded.";
        $sql = "INSERT INTO `sub_categories`(`category_id`, `name`, `img`) VALUES ($main_cat,'$cat_name','$filewithnewname')";
        $result = mysqli_query($conn,$sql);
        if($result){
           header("Location:../addSubCat.php?Massage=Sucessfully added new category.");
        }
      } else {
       
        echo "<script>alert('Sorry, there was an error uploading your file.')</script>";
      }
   }
  
  

}


if(isset($_POST['btnSubmit_insertSliders'])){
include('../assets/connection.php');
  session_start();
  $cat_name = $_POST['CatName'];
  $main_cat = $_POST['MainCat'];
  $target_dir = "../Uploads/";
  $target_file = $target_dir . basename($_FILES["CatImage"]["name"]);
  $uploadOk = 1;
  $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
  
  if ($_FILES["CatImage"]["size"] > 500000) {
  echo "<script>alert('Sorry, your file is too large.')</script>";
    $uploadOk = 0;
  }
  
  if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
      
       echo "<script>alert('Sorry, only JPG, JPEG, PNG & GIF files are allowed.')</script>";
      $uploadOk = 0;
    }
    
   if ($uploadOk == 0) {
       echo "<script>alert('Sorry, your file was not uploaded.')</script>";
    } else {
      $filewithnewname =  date("Ymdis")."_Slider.".$imageFileType;    
      if (move_uploaded_file($_FILES["CatImage"]["tmp_name"], $target_dir.$filewithnewname)) {
         "The file ". htmlspecialchars( basename( $_FILES["CatImage"]["name"])). " has been uploaded.";
         $sql = "INSERT INTO `sliders`(`alt_name`, `type`, `img`) VALUES ('$cat_name','$main_cat','$filewithnewname')";
        $result = mysqli_query($conn,$sql);
        if($result){
           header("Location:../addslider.php?Massage=Sucessfully added new slider.");
        }
      } else {
       
        echo "<script>alert('Sorry, there was an error uploading your file.')</script>";
      }
   }
  
  

}

if(isset($_POST['btnSubmit_insertProduct'])){
include('../assets/connection.php');
  session_start();
  $ProName = $_POST['ProName'];
  $ProDes = $_POST['ProDes'];
  $ProCost = $_POST['ProCost'];
  $ProPrice = $_POST['ProPrice'];
  $ProQty = $_POST['ProQty'];
  $ProDiscount = $_POST['ProDiscount'];
  $MainCat = $_POST['MainCat'];
  $target_dir = "../Uploads/";
  $target_file = $target_dir . basename($_FILES["ProImage"]["name"]);
  $uploadOk = 1;
  $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
  
  if ($_FILES["CatImage"]["size"] > 500000) {
  echo "<script>alert('Sorry, your file is too large.')</script>";
    $uploadOk = 0;
  }
  
  if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
      
      echo "<script>alert('Sorry, only JPG, JPEG, PNG & GIF files are allowed.')</script>";
      $uploadOk = 0;
    }
    
  if ($uploadOk == 0) {
      echo "<script>alert('Sorry, your file was not uploaded.')</script>";
    } else {
      $filewithnewname =  date("Ymdis")."_Product.".$imageFileType;    
      if (move_uploaded_file($_FILES["ProImage"]["tmp_name"], $target_dir.$filewithnewname)) {
         "The file ". htmlspecialchars( basename( $_FILES["ProImage"]["name"])). " has been uploaded.";
         
         $sql = "INSERT INTO `products`(`sub_category_id`, `name`, `description`, `cost`, `price`, `discount`, `qty`) VALUES ($MainCat,'$ProName','$ProDes',$ProCost,$ProPrice,$ProDiscount,$ProQty)";
        $result = mysqli_query($conn,$sql);
        $last_id = mysqli_insert_id($conn);
         $sql_image = "INSERT INTO `product_images`(`product_id`, `img`) VALUES ($last_id,'$filewithnewname')";
        $result_image = mysqli_query($conn,$sql_image);
        
        if($result_image){
          header("Location:../addnewProduct.php?Massage=Sucessfully added new product.");
        }
      } else {
       
        echo "<script>alert('Sorry, there was an error uploading your file.')</script>";
      }
  }


}

if(isset($_POST['btnSubmit_Action'])){
    $status = $_POST['Action'];
    $order_id = $_POST['order_id'];
    $shipping = $_POST['shipping'];
    include('../assets/connection.php');
    $sql;
    if($status == 'shipped'){
        $sql = "UPDATE `orders` SET `status` = '$status'  , `Shipping_Cost` = $shipping WHERE `id` = $order_id"; 
    }else{
        $sql = "UPDATE `orders` SET `status` = '$status'WHERE `id` = $order_id";
    }
   
    $update = mysqli_query($conn,$sql);
     $sqltaskMembers = "SELECT orders.id , users.name, users.notification_token FROM `orders` INNER JOIN users On users.id = orders.user_id WHERE orders.id = $order_id";
        $taskMembers = mysqli_query($conn,$sqltaskMembers);
        $playerId = [];
        $subject = '';
        while($row = mysqli_fetch_array($taskMembers)){
        	     $order_id =  $row['id'];
                 array_push($playerId, $row['notification_token']);           
            }
            
                $content = array(
                    "en" => ' Your order no: '.$order_id.' has been '.$status.'.'
                    );

                $fields = array(
                    'app_id' => "daa2ba7b-daef-4363-935e-d5138d73cf98",
                     'include_player_ids' => $playerId,
                    'data' => array("foo" => "NewMassage","Id" => $taskid),
                    'large_icon' =>"ic_launcher_round.png",
                    'contents' => $content
                );

                $fields = json_encode($fields);
               

                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, "https://onesignal.com/api/v1/notifications");
                curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json; charset=utf-8',
                                                           'Authorization: Basic ODU5ZDhiZjAtOWRkZS00NDIyLWI0ZWItOTYxMDc5YzQzMGIz'));
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
                curl_setopt($ch, CURLOPT_HEADER, FALSE);
                curl_setopt($ch, CURLOPT_POST, TRUE);
                curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);    

                 $response = curl_exec($ch);
                curl_close($ch);
    
    
    if($update){
         header("Location:../order_details.php?order_id=".$order_id."&Massage=Sucessfully updated order.");
    }
    
    
}

if(isset($_POST['updateCategory'])){
    $ProName = $_POST['ProName'];
    $product_id = $_POST['product_id'];
    include('../assets/connection.php');
    $sql = "UPDATE `categories` SET `name` = '$ProName' WHERE `id` = $product_id";
    $update = mysqli_query($conn,$sql);
    if($update){
         header("Location:../viewcategories.php?Massage=Sucessfully updated category.");
    }
}

if(isset($_POST['btnSubmit_insertrevenue'])){
    $user_id = $_POST['MainCat'];
      $amount = $_POST['amount'];
    include('../assets/connection.php');
    $sql = "INSERT INTO `revenue`(`user_id`, `total_revenue`)  VALUES ('$user_id','$amount')";
    $update = mysqli_query($conn,$sql);
    if($update){
        
        
          $sqltaskMembersx = "SELECT `notification_token` FROM `users` WHERE `id` = '$user_id' ";
        $taskMembersx = mysqli_query($conn,$sqltaskMembersx);
        $playerIdx = [];
        $subject = '';
        $newstatus = '';
        
        while($row = mysqli_fetch_array($taskMembersx)){
        	     
                 array_push($playerIdx, $row['notification_token']);
                
            }
            
         
             
                    $order_content = 'Dear inspector your account has been debited with $'  .$amount.'.';
                     $contentx = array(
                    "en" => $order_content
                    );

               
                    $insert_noti_details = "INSERT INTO `notification_log`(`user_id`, `content`, `purpose`)
                                                            VALUES ('$user_id','$order_content','transaction')";
                    $execute_insert_noti = mysqli_query($conn,$insert_noti_details);
                    
                    
                    
                $fields = array(
                     'app_id' => "6b3fec5c-62d8-4d02-b4a0-48740ae54df9",
                     'include_player_ids' => $playerIdx,
                    'data' => array("foo" => "NewMassage","Id" => $taskid),
                    'large_icon' =>"ic_launcher_round.png",
                    'contents' => $contentx
                );

                $fields = json_encode($fields);
               

                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, "https://onesignal.com/api/v1/notifications");
                curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json; charset=utf-8',
                                                           'Authorization: Basic ODU5ZDhiZjAtOWRkZS00NDIyLWI0ZWItOTYxMDc5YzQzMGIz'));
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
                curl_setopt($ch, CURLOPT_HEADER, FALSE);
                curl_setopt($ch, CURLOPT_POST, TRUE);
                curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);    

                 $response = curl_exec($ch);
                curl_close($ch);

        
        
        
        
            $sql2 = "INSERT INTO `transactions_log`(`user_id`, `amount`, `status`)
                    VALUES ('$user_id','$amount','transaction')";
            $exec = mysqli_query($conn,$sql2);
            
            
        
        
         header("Location:../add_transactions.php?Massage=Sucessfully added new transaction.");
    }
}


if(isset($_POST['updateProduct'])){
    $product_id = $_POST['product_id'];
    $ProName = $_POST['ProName'];
    $ProDes = $_POST['ProDes'];
    $ProCost = $_POST['ProCost'];
    $ProPrice = $_POST['ProPrice'];
    $ProDis = $_POST['ProDis'];
    include('../assets/connection.php');
    $sql = "UPDATE `products` SET `name`='$ProName',`description`='$ProDes',`cost`=$ProCost,`price`=$ProPrice,`discount`=$ProDis WHERE `id`=$product_id";
    $update = mysqli_query($conn,$sql);
    if($update){
         header("Location:../manageproducts.php?&Massage=Sucessfully updated product.");
    }
}

if(isset($_POST['updateInventory'])){
    $Type = $_POST['Type'];
 
    if($Type == "add"){
       $availabale_qty = $_POST['old_qty'];
       $product_id= $_POST['product_id'];
       $newqty = $_POST['newqty'] + $availabale_qty;
       include('../assets/connection.php');
         $sql = "UPDATE `products` SET `qty` = $newqty Where `id` = $product_id";
        $update = mysqli_query($conn,$sql);
        if($update){
             echo $sqladd = "INSERT INTO `stock_log`(`product_id`, `qty`, `type`) VALUES ($product_id,$newqty,'$Type')";
             $add = mysqli_query($conn,$sqladd);
             if($add){
                 header("Location:../manageinventory.php?Massage=Sucessfully updated inventory."); 
             }
            
        }
        
        
    }else if($Type == "sub"){
        $availabale_qty = $_POST['old_qty'];
       $product_id= $_POST['product_id'];
       $newqty = $availabale_qty - $_POST['newqty'];
       include('../assets/connection.php');
         $sql = "UPDATE `products` SET `qty` = $newqty Where `id` = $product_id";
        $update = mysqli_query($conn,$sql);
        if($update){
             echo $sqladd = "INSERT INTO `stock_log`(`product_id`, `qty`, `type`) VALUES ($product_id,$newqty,'$Type')";
             $add = mysqli_query($conn,$sqladd);
             if($add){
                 header("Location:../manageinventory.php?Massage=Sucessfully updated inventory."); 
             }
            
        }
        
    }
    
}
  
if(isset($_POST['updatePoints'])){
    $Type = $_POST['Type'];
 
    if($Type == "add"){
       $availabale_qty = $_POST['old_qty'];
       $user_id= $_POST['product_id'];
       $newqty = $_POST['newqty'] + $availabale_qty;
       $qty = $_POST['newqty'];
       include('../assets/connection.php');
         $sql = "UPDATE `users` SET `rewards_token` = $newqty WHERE `id`=$user_id";
        $update = mysqli_query($conn,$sql);
        if($update){
             $sqladd = "INSERT INTO `rewards`( `user_id`, `name`, `value`) VALUES ($user_id,'Credited by admin',$qty)";
             $add = mysqli_query($conn,$sqladd);
             if($add){
                 header("Location:../managePoints.php?Massage=Sucessfully updated points."); 
             }
            
        }
        
        
    }else if($Type == "sub"){
        $availabale_qty = $_POST['old_qty'];
       $user_id= $_POST['product_id'];
       $newqty = $availabale_qty - $_POST['newqty'];
       $qty = $_POST['newqty'];
       include('../assets/connection.php');
         $sql = "UPDATE `users` SET `rewards_token` = $newqty WHERE `id`=$user_id";
        $update = mysqli_query($conn,$sql);
        if($update){
             echo $sqladd = "INSERT INTO `rewards`( `user_id`, `name`, `value`) VALUES ($user_id,'Debited by admin',$qty)";
             $add = mysqli_query($conn,$sqladd);
             if($add){
                 header("Location:../managePoints.php?Massage=Sucessfully updated points."); 
             }
            
        }
        
    }
    
}
// function sendMessage($userid){
//     require 'connection.php';
//     $sqltaskMembers = "SELECT `id`, `role_id`, `name`, `phone`, `email`, `email_verified_at`, `password`, `notification_token`, `remember_token`, `rewards_token`, `created_at`, `updated_at` FROM `users` WHERE `id` = $userid";
//         $taskMembers = mysqli_query($conn,$sqltaskMembers);
//         $playerId = [];
//         $subject = '';
//         while($row = mysqli_fetch_array($taskMembers)){
//         	     $subject =  $row['firstname'];
//                  array_push($playerId, '1913aa90-d6ce-40b5-8480-f17595f18ab6');           
//             }
            
//                 $content = array(
//                     "en" => ' you got new message '.$subject.'.'
//                     );

//                 $fields = array(
//                     'app_id' => "daa2ba7b-daef-4363-935e-d5138d73cf98",
//                      'include_player_ids' => $playerId,
//                     'data' => array("foo" => "NewMassage","Id" => $taskid),
//                     'large_icon' =>"ic_launcher_round.png",
//                     'contents' => $content
//                 );

//                 $fields = json_encode($fields);
               

//                 $ch = curl_init();
//                 curl_setopt($ch, CURLOPT_URL, "https://onesignal.com/api/v1/notifications");
//                 curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json; charset=utf-8',
//                                                           'Authorization: Basic ODU5ZDhiZjAtOWRkZS00NDIyLWI0ZWItOTYxMDc5YzQzMGIz'));
//                 curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
//                 curl_setopt($ch, CURLOPT_HEADER, FALSE);
//                 curl_setopt($ch, CURLOPT_POST, TRUE);
//                 curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
//                 curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);    

//                  $response = curl_exec($ch);
//                 curl_close($ch);

               


        
           
               
// }

?>
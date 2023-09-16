<?php
include('connection.php');

if($_POST['token'] == 'as23rlkjadsnlkcj23qkjnfsDKJcnzdfb3353ads54vd3favaeveavgbqaerbVEWDSC'){
    
    $email = $_POST['email'];  
    $password = $_POST['password'];  
    $notification_token= $_POST['notification_token'];
 
 
 if(empty($email))
 {
    $data = ["status"=>false,
             "message"=>"email is required",
            ];
    echo json_encode($data); 
 }
 else if
 (empty($password))
 {
    $data = ["status"=>false,
             "message"=>"password is required",
            ];
    echo json_encode($data);
 }
 else{
 
    $check_if_dataisin_db = "SELECT * FROM `users` WHERE `email`= '$email' AND `password`='$password'";
    $execute = mysqli_query($conn,$check_if_dataisin_db);
    
    if(mysqli_num_rows($execute) > 0){
      
       $fetch_user_data = mysqli_fetch_array($execute);
       $user_id = $fetch_user_data['id'];
       $update_data = "UPDATE `users` SET `notification_token` = '$notification_token' WHERE `id` = '$user_id'";
       $execute_update = mysqli_query($conn,$update_data);
       
       if($execute_update){
            
            $temp = [
                       "user_id"=>$fetch_user_data['id'],
                       "fullname"=>$fetch_user_data['fullname'],
                       "phone"=>$fetch_user_data['phone'],
                       "email"=>$fetch_user_data['email'],
                       "password"=>$fetch_user_data['password'],
                       "notification_token"=>$fetch_user_data['notification_token'],
                       
                    ];
           $data = ["status"=>true,
                    "message"=>"logged in successfully.",
                    "data"=>$temp];
           echo json_encode($data); 
           
       }else{
           
            $data = ["status"=>false,
            "message"=>"Error"];
            echo json_encode($data);   
       }
      
      
    }else{
       $data = ["status"=>false,
                "message"=>"email or password is invalid"];
       echo json_encode($data);   
     }
  
  
  
  
  }

}else{
  $data = ["status"=>false,
            "Response_code"=>403,
            "Message"=>"Access denied"];
  echo json_encode($data);          
 }

?>
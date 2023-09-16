<?php
 include('connection.php');

if($_POST['token'] == 'as23rlkjadsnlkcj23qkjnfsDKJcnzdfb3353ads54vd3favaeveavgbqaerbVEWDSC'){
    
    $fname= $_POST['fullname'];
    $phone= $_POST['phone'];
    $email= $_POST['email'];
    $password = $_POST['password'];
    $notification_token= $_POST['notification_token'];


      

        $check_if_dataisin_db="SELECT `id` FROM `users` WHERE `email` = '$email'";
        $execute = mysqli_query($conn,$check_if_dataisin_db);
  
        if(mysqli_num_rows($execute) == 0){
            
        $insert_user = "INSERT INTO `users`(`role_id`, `first_name`, `phone`, `email`, `password`, `notification_token`)
        VALUES ('1','$fname','$phone','$email','$password','$notification_token')";
        $result = mysqli_query($conn,$insert_user);
        
        if($result){
            
          $last_id = $conn->insert_id;
          $temp = [
                       "user_id"=> $last_id,
                       "fullname"=>$fname,
                       "phone"=>$phone,
                        "email"=> $email,
                        "password"=> $password,
                        "notification_token"=> $notification_token,
                    ];
                    
          $data = ["status"=>true,
                "message"=>"user has been registered sucessfully.",
                "data"=>$temp];
          echo json_encode($data);   
      }else{
          
         $data = ["status"=>false,
                "message"=>"there was some error"];
         echo json_encode($data);   
      }
      
    }else{
      
      $data = ["status"=>false,
                "message"=>"email already exists"];
      echo json_encode($data);
      
     }
      
 
  
}
else{
  $data = ["status"=>false,
            "Response_code"=>403,
            "Message"=>"Access denied"];
  echo json_encode($data);          
}

  
  
  

  

 


?>
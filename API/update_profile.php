<?php
include('connection.php');

if($_POST['token'] == 'as23rlkjadsnlkcj23qkjnfsDKJcnzdfb3353ads54vd3favaeveavgbqaerbVEWDSC'){
  
    $user_id  = $_POST['id'];    
    $fullname = $_POST['fname'] ." ". $_POST['lname'];  
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    
            
            $select_user = "SELECT `id`, `fullname`,`phone`,`email`,`address` FROM `users` WHERE `id` = '$user_id' ";
            $execute_select_user = mysqli_query($conn,$select_user);
            
            if(mysqli_num_rows($execute_select_user) > 0){
                
                $user_data = mysqli_fetch_array($execute_select_user);
                $user_id = $user_data['id'];
                $user_update = "UPDATE `users` SET `fullname` = '$fullname', `phone` = '$phone' , `email` = '$email', `address` = '$address' WHERE `id` = '$user_id'";
                $execute_update = mysqli_query($conn,$user_update);
                
                if($execute_update){
                    
                    $temp = [
                      "user_id"=>$user_id,
                      "fullname"=>$fullname,
                      "phone"=>$phone,
                      "email"=>$email,
                      "address"=>$address,
                        ];
                    $data = ["status"=>true,
                      "message"=>"your profile has been updated successfully.",
                      "data"=>$temp];
                    echo json_encode($data);
                    
                }else{
                    $data = ["status"=>false,
                             "message"=>"cannot update your profile"];
                    echo json_encode($data);
                }
                
            }else{
                $data = ["status"=>false,
                    "message"=>"there was a problem while updating profile"];
                echo json_encode($data);
            }
        
    // }else{
    //     $data = ["status"=>false,
    //              "message"=>"current password is incorrect!"];
    //     echo json_encode($data);
    // }
    
    
    
    
    
}else{
   $data = ["status"=>false,
            "message"=>"Access denied"];
   echo json_encode($data); 
}



?>
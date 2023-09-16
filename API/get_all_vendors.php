<?php
 include('connection.php');

if($_POST['token'] == 'as23rlkjadsnlkcj23qkjnfsDKJcnzdfb3353ads54vd3favaeveavgbqaerbVEWDSC'){
    
    // $c_title= $_POST['title'];

      $user_id  = $_POST['user_id'];

        $check_if_dataisin_db = "SELECT  `id`, `role_id`, `first_name`, `phone`, `email`, `address`, `password`, `notification_token`, `Status`, `created_at` FROM `users` WHERE role_id = '1' and id != '$user_id'";
        $execute = mysqli_query($conn,$check_if_dataisin_db);
  
        if(mysqli_num_rows($execute) > 0)
        {
            $vendor_arr = array();
            while($ar = mysqli_fetch_array($execute))
            {
                
                  $temp = [
                               "first_name"=> $ar['first_name'],
                               "phone"=> $ar['phone'],
                               "email"=> $ar['email'],
                               "address"=> $ar['address'],
                               "password"=> $ar['password'],
                               "notification_token"=> $ar['notification_token'],
                          ];
                            array_push($vendor_arr,$temp);
                            
                 
            }
            $data = ["status"=>true,
                        "message"=>"all vendors here",
                        "data"=>$vendor_arr];
                  echo json_encode($data); 
                  
        }
        else
        {
          
          $data = ["status"=>false,
                    "message"=>"Error"];
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
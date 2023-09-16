<?php
 include('connection.php');

if($_POST['token'] == 'as23rlkjadsnlkcj23qkjnfsDKJcnzdfb3353ads54vd3favaeveavgbqaerbVEWDSC')
{
    
    
   $vendorid= $_POST['user_id'];
    $fname = $_POST['fname'];
     $lname = $_POST['lname'];
    $fullname = $fname." ".$lname;
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $category_id = $_POST['category_id'];
    $address = $_POST['address'];



  if (empty($fname))
  {
      
     $data = ["status"=>false,
                "message"=>"fname is required",
             ];
         echo json_encode($data); 
         
  }
  else if(empty($lname))
  {
      $data = ["status"=>false,
                "message"=>"lname is required",
             ];
         echo json_encode($data); 
  }
  
  else if(empty($email))
  {
      $data = ["status"=>false,
                "message"=>"email is required",
             ];
         echo json_encode($data); 
  }
  
  else if(empty($phone))
  {
      $data = ["status"=>false,
                "message"=>"phone is required",
             ];
         echo json_encode($data); 
  }
  
  else if(empty($category_id))
  {
      $data = ["status"=>false,
                "message"=>"category is required",
             ];
         echo json_encode($data); 
  }
  
  else if(empty($address))
  {
      $data = ["status"=>false,
                "message"=>"address is required",
             ];
         echo json_encode($data); 
  }


  else
  {
                  $insert = "INSERT INTO `clients`(`full_name`, `email`, `contact`, `category_id`, `address`, `added_by`)
                  VALUES ('$fullname','$email','$phone','$category_id','$address','$vendorid')";
                  $run = mysqli_query($conn,$insert);
                  if($run)
                  {
                                
                      $data = ["status"=>true,
                            "message"=>"user record has been added"];
                      echo json_encode($data);   
                  }
                  else
                  {
                      
                     $data = ["status"=>false,
                            "message"=>"there was some error"];
                     echo json_encode($data);   
                  }
                  
                
                
                
          }
            

          
  
            
}
  
else{
  $data = ["status"=>false,
            "response_code"=>403,
            "message"=>"Access denied"];
  echo json_encode($data);          
}


?>
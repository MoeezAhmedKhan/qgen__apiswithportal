<?php
 include('connection.php');

if($_POST['token'] == 'as23rlkjadsnlkcj23qkjnfsDKJcnzdfb3353ads54vd3favaeveavgbqaerbVEWDSC')
{
    

      $user_id  = $_POST['user_id'];
      $category_id= $_POST['id'];
      $vendor_id = $_POST['vendor_id'];
      $cat_array    = json_decode($category_id);
      
      
      
      if (empty($category_id))
        {
      
         $data = ["status"=>false,
                    "message"=>"List is required",
                 ];
             echo json_encode($data); 
         
        }
        
        foreach($cat_array as $val) 
        {
            $insert = "INSERT INTO `list`(`user_id`, `vendor_id`, `category_id`) VALUES ('$user_id','$vendor_id','$val')";
             $run = mysqli_query($conn,$insert);
                  if($run)
                  {
                      
                      $data = ["status"=>true,
                            "message"=>"list has been added"];
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

else
{
  $data = ["status"=>false,
            "Response_code"=>403,
            "Message"=>"Access denied"];
  echo json_encode($data);          
}

  
  
  

  

 


?>
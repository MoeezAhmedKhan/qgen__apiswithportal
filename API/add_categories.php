<?php
 include('connection.php');

if($_POST['token'] == 'as23rlkjadsnlkcj23qkjnfsDKJcnzdfb3353ads54vd3favaeveavgbqaerbVEWDSC')
{
    
    $c_title= $_POST['title'];
    $user_id = $_POST['user_id'];



  if (empty($c_title))
  {
      
     $data = ["status"=>false,
                "message"=>"Title is required",
             ];
         echo json_encode($data); 
         
  }


  else
  {
      $insert = "INSERT INTO `categories`(`title`, `user_id`) VALUES ('$c_title','$user_id')";
      $run = mysqli_query($conn,$insert);
      if($run)
      {
          $arr = array();
           $last_id = $conn->insert_id;
          $temp = [
                       "category_id"=> $last_id,
                       "title"=>$c_title,
                    ];
                    array_push($arr,$temp);
                    
          $data = ["status"=>true,
                "message"=>"category has been added",
                "data"=>$temp];
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
            "Response_code"=>403,
            "Message"=>"Access denied"];
  echo json_encode($data);          
}

  
  
  

  

 


?>
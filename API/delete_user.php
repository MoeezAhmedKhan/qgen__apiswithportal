<?php
 include('connection.php');

if($_POST['token'] == 'as23rlkjadsnlkcj23qkjnfsDKJcnzdfb3353ads54vd3favaeveavgbqaerbVEWDSC')
{
    
    $client_id = $_POST['customer_id'];
    $vendor_id = $_POST['user_id'];
    

                  $insert = "DELETE FROM `clients` WHERE id = '$client_id' and added_by = '$vendor_id'";
                  $run = mysqli_query($conn,$insert);
                  if($run)
                  {
                                
                      $data = ["status"=>true,
                            "message"=>"user record has been delete"];
                      echo json_encode($data);   
                  }
                  else
                  {
                      
                     $data = ["status"=>false,
                            "message"=>"there was some error"];
                     echo json_encode($data);   
                  }
                  
                
                
                
}

else{
  $data = ["status"=>false,
            "response_code"=>403,
            "message"=>"Access denied"];
  echo json_encode($data);          
}


?>
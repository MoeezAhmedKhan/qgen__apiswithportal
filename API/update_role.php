<?php


if($_POST['token'] == 'as23rlkjadsnlkcj23qkjnfsDKJcnzdfb3353ads54vd3favaeveavgbqaerbVEWDSC')
{

    
            $id = $_POST['id'];
             
            include('connection.php');
     
       
            $sql="SELECT * FROM `users` WHERE `id` = '$id'";
            $execute = mysqli_query($conn,$sql);
            
            if(mysqli_num_rows($execute) > 0)
            {
                
                $user_data = mysqli_fetch_array($execute);
                $user_id = $user_data['id'];
                $user_update = "UPDATE `users` SET `role_id` = '1' WHERE `id` = '$user_id'";
                $execute_update = mysqli_query($conn,$user_update);
                
                if($execute_update)
                {
                    
                     $temp = 
                          [
                            "status"=>true,
                            "message"=>"role has been updated",
                          ];
                     echo json_encode($temp);
                    
                
                }
                else
                {
                    $temp = 
                          [
                            "status"=>false,
                            "message"=>"there was a some error",
                          ];
                     echo json_encode($temp);
                }
            }
            else
            {
                    
                              $temp = 
                              [
                                "status"=>false,
                                "message"=>"user don't exist",
                              ];
                         echo json_encode($temp);
                    
            }
  
}
    
else
{
  $data = ["status"=>false,
            "Response_code"=>403,
            "Message"=>"Access denied"];
  echo json_encode($data);          
}

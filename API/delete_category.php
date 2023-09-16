<?php


if($_POST['token'] == 'as23rlkjadsnlkcj23qkjnfsDKJcnzdfb3353ads54vd3favaeveavgbqaerbVEWDSC')
{


        $id = $_POST['id'];
        $user_id = $_POST['user_id'];
         
        include('connection.php');
 
        $sql = "SELECT `id` FROM `categories` WHERE `id` = '$id'";
        $execute = mysqli_query($conn,$sql);
        if(mysqli_num_rows($execute) > 0)
        {
            
                 $sql2 = "SELECT `user_id` FROM `categories` WHERE `user_id` = '$user_id'";
                 $execute2 = mysqli_query($conn,$sql2);
                 if(mysqli_num_rows($execute2) > 0)
                 {
                     
                     
                        $data1 = mysqli_fetch_array($execute);
                        $data2 = mysqli_fetch_array($execute2);
                        $cat_id = $data1['id'];
                        $user_id = $data2['user_id'];
                        $delete = "DELETE FROM `categories` WHERE id = '$cat_id' and user_id = '$user_id'";
                        $execute_delete = mysqli_query($conn,$delete);
                        
                        if($execute_delete)
                        {
                            
                             $temp = 
                                  [
                                    "status"=>true,
                                    "message"=>"category has been delete",
                                  ];
                             echo json_encode($temp);
                            
                        
                        }
                      else
                      {
                            
                                      $temp = 
                                      [
                                        "status"=>false,
                                        "message"=>"category delete failed",
                                      ];
                                 echo json_encode($temp);
                            
                        }
                     
                     
                 }
                 else
                 {
                      $temp = 
                              [
                                "status"=>false,
                                "message"=>"your user doesnt exist",
                              ];
                         echo json_encode($temp);
                 }
           
  
        }
        else
        {
            $temp = 
                              [
                                "status"=>false,
                                "message"=>"your category doesnt exist",
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

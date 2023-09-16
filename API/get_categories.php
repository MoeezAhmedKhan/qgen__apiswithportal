<?php
 include('connection.php');

if($_POST['token'] == 'as23rlkjadsnlkcj23qkjnfsDKJcnzdfb3353ads54vd3favaeveavgbqaerbVEWDSC'){
    
    // $c_title= $_POST['title'];

      $user_id  = $_POST['user_id'];

        $check_if_dataisin_db = "SELECT  `id`, `title` FROM `categories` WHERE `user_id` = '$user_id' ";
        $execute = mysqli_query($conn,$check_if_dataisin_db);
  
        if(mysqli_num_rows($execute) > 0)
        {
            $cat_arr = array();
            while($ar = mysqli_fetch_array($execute))
            {
                
                  $temp = [
                               "value"=> $ar['id'],
                               "label"=> $ar['title'],
                          ];
                            array_push($cat_arr,$temp);
                            
                 
            }
            $data = ["status"=>true,
                        "message"=>"all categories here",
                        "data"=>$cat_arr];
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
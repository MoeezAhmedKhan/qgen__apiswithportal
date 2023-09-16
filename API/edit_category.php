<?php
 include('connection.php');

if($_POST['token'] == 'as23rlkjadsnlkcj23qkjnfsDKJcnzdfb3353ads54vd3favaeveavgbqaerbVEWDSC'){
    
    $c_id = $_POST['id']; 
    $c_title = $_POST['title'];
    $Update_title = $_POST['update_title'];


        $check_if_dataisin_db="SELECT `id`,`title` FROM `categories` WHERE `id` = '$c_id'";
        $execute = mysqli_query($conn,$check_if_dataisin_db);
  
        if(mysqli_num_rows($execute) > 0)
        {
            $aray  = mysqli_fetch_array($execute);
            $cid = $aray['id'];
            
        $insert = "UPDATE `categories` SET `title`= '$Update_title'  WHERE id = '$cid'";
        $result = mysqli_query($conn,$insert);
        
        if($result){
            
             $cat_arr = array();
             
          $temp = [
                        "id"=>$c_id,
                       "title"=>$Update_title,
                  ];
                    array_push($cat_arr,$temp);
                    
          $data = ["status"=>true,
                "message"=>"Category has been Updated",
                "data"=>$cat_arr];
          echo json_encode($data);   
      }else{
          
         $data = ["status"=>false,
                "message"=>"there was some error"];
         echo json_encode($data);   
      }
      
    }else{
      
      $data = ["status"=>false,
                "message"=>"Category does'nt exist"];
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
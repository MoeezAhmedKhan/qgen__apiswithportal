<?php
 include('connection.php');

if($_POST['token'] == 'as23rlkjadsnlkcj23qkjnfsDKJcnzdfb3353ads54vd3favaeveavgbqaerbVEWDSC')
{
    
        $vendorid= $_POST['id'];
      
      $sql = "SELECT `id`, `full_name`, `email`, `contact`, `category_id`, `address`,`status`,`created_at` FROM `clients` WHERE `added_by` = '$vendorid' ORDER BY `id` DESC";
      $exec_sql = mysqli_query($conn , $sql);
      
      if(mysqli_num_rows($exec_sql) > 0 )
      {
          $dataArray = array();
         while($row = mysqli_fetch_array($exec_sql)){
             
             $cat = json_decode($row['category_id']);
          
                    $categoryArray = array();
                    foreach($cat as $cc){
                        $sql2 = "SELECT `id`,`title`, `user_id` FROM `categories` WHERE `id` = ".$cc;
                        $exec_sql2 = mysqli_query($conn , $sql2);
                        if(mysqli_num_rows($exec_sql2) > 0 ){
                             while($row2 = mysqli_fetch_array($exec_sql2)){
                                 $temp2 = [
                                     "id"=>$row2['id'],
                                     "title"=>$row2['title'],
                                     ];
                                    array_push($categoryArray , $temp2); 
                                     
                             }
                        }
                    }
                 
             
             
             $temp = [
                 "id"=>$row['id'],
                 "full_name"=>$row['full_name'],
                //  "last_name"=>$row['last_name'],
                 "email"=>$row['email'],
                 "contact"=>$row['contact'],
                 "address"=>$row['address'],
                 "status"=>$row['status'],
                 "created_at"=>$row['created_at'],
                 "category_data"=>$categoryArray != null ? $categoryArray : [],
                 ];
                 
                 array_push($dataArray , $temp);

             
         }
         
                          
                 
                 $categoryArray = null;
             
             $data = ["status"=>true,
            "Response_code"=>200,
            "Message"=>"Users found successfully!",
            "user_data"=>$dataArray];
            echo json_encode($data);  
         
       
      }
      else{
            $data = ["status"=>true,
            "Response_code"=>200,
            "Message"=>"No users added yet!"];
            echo json_encode($data);  
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
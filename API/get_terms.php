<?php

include('connection.php');

if($_POST['token'] == 'as23rlkjadsnlkcj23qkjnfsDKJcnzdfb3353ads54vd3favaeveavgbqaerbVEWDSC')
{
    
     $sql = "SELECT `id`, `title`, `description` FROM `terms`";
     $execute = mysqli_query($conn,$sql);
     if(mysqli_num_rows($execute) > 0)
     {
         $terms_array = array();
         
         while($row = mysqli_fetch_array($execute))
         {
             $temp =[
                        "id"=>$row['id'],
                        "title"=>$row['title'],
                        "description"=>$row['description'],
                    ];
            array_push($terms_array,$temp);
         
        }
        
        $data = ["status"=>true,
            "Response_code"=>200,
            "Message"=>"terms Found.",
            "Data"=>$terms_array,
            ];
        echo json_encode($data);   
        
     }
     else
     {
          $data = ["status"=>false,
            "Response_code"=>202,
            "Message"=>"Not found!"];
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




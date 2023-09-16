<?php


if($_POST['token'] == 'as23rlkjadsnlkcj23qkjnfsDKJcnzdfb3353ads54vd3favaeveavgbqaerbVEWDSC')
{
    
     $sql = "SELECT `id`, `account_titile`, `features` FROM `accounts`";
     include('connection.php');
     $execute = mysqli_query($conn,$sql);
     if(mysqli_num_rows($execute) > 0)
     {
         $features_array = array();
         
         while($row = mysqli_fetch_array($execute))
         {
             $temp =[
                        "id"=>$row['id'],
                        "account_titile"=>$row['account_titile'],
                        "features"=>$row['features'],
                    ];
            array_push($features_array,$temp);
         
        }
        
        $data = ["status"=>true,
            "Response_code"=>200,
            "Message"=>"Features Found.",
            "Data"=>$features_array,
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




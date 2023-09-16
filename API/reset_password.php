<?php


if($_POST['token'] == 'as23rlkjadsnlkcj23qkjnfsDKJcnzdfb3353ads54vd3favaeveavgbqaerbVEWDSC'){


 $email = $_POST['email'];   
 
 include('connection.php');
 
   

    

  if (empty($email)){
     $data = [
        "status"=>false,
        "message"=>"email is required",
             ];
         echo json_encode($data); 
  }else{
      
    $sql="SELECT `id` FROM `users` WHERE `email` = '$email'";
    $execute = mysqli_query($conn,$sql);
        if(mysqli_num_rows($execute) <= 0){
              $temp = [
            "status"=>false,
            "message"=>"Email does not exists",
        ];
      echo json_encode($temp);
  }else{

            $digits = 4;
      $OTP = rand(pow(10, $digits-1), pow(10, $digits)-1);
        
        $data = [
            "OTP"=>$OTP,
            ];
        $temp = [
            "status"=>true,
            "data"=>$data,
            "message"=>"your OTP has been sent to your email",
        ];
      echo json_encode($temp);  
  }
  }
  
}else{
  $data = ["status"=>false,
            "Response_code"=>403,
            "Message"=>"Access denied"];
  echo json_encode($data);          
}

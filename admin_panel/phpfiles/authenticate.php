<?php

include_once('../assets/connection.php');
session_start();
if(isset($_POST['submitLogin'])){
   
     $username = $_POST['email'];
     $password = $_POST['password'];

    $sql = "SELECT * FROM `users` WHERE `email` = '$username' AND password = '$password' AND role_id = 0";
    $result= mysqli_query($conn,$sql);
    if($result){
             $Data = mysqli_fetch_array($result);
             $userid = $Data['id'];
             $user_type = $Data['role_id'];
             $_SESSION['userID'] = $userid;
             $_SESSION['user_type'] = $user_type;
             $id = $_SESSION['userID'];
            
             header('location:../index.php');
    }else{
       echo "<script>alert('username or passsword may be incorrect!')</script>";
    }
    
}


?>
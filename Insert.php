<?php 
    if($_SERVER['REQUEST_METHOD']=='POST') {
        $response = array();
        //mendapatkan data
        $username = $_POST['username'];
        $password = $_POST['password'];
        $pin = $_POST['pin'];
    
       require_once('Connection.php');
         //$sql = "INSERT INTO testing1 SET pin ='$pin' where username = '$username' and password = '$password'";
         $sql = "UPDATE testing1 set pin = '$pin' where username = '$username' and password = '$password'";
          //$sql = "INSERT INTO testing1 (username,password,pin) VALUES('$username','$password','$pin')";
         if(mysqli_query($connection,$sql)) {
           $response["value"] = 1;
           echo json_encode($response);
         } else {
           $response["value"] = 0;
           echo json_encode($response);
         }
         mysqli_close($connection);
       }
       
      
    
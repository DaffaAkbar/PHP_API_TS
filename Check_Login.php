<?php
    if($_SERVER['REQUEST_METHOD']=='POST') {
        $response = array();
        //get data
        $username = $_POST['username'];
        $password = $_POST['password'];
        $key_check = $_POST['key_check'];
    
        require_once('Connection.php');
        $check_key = "SELECT key_check from testing1 where username = '$username' and password = '$password'";
        $insert_key= "UPDATE testing1 SET key_check ='$key_check' where username = '$username' and password = '$password'";
        
        //Getting the key_check value from the database
        if ($result =  mysqli_query($connection,$check_key)){

            $row = mysqli_fetch_array($result);
            
            //if key_check value is Null Insert new data from the POST method to the key_check
            if(isset($row['key_check'])){
                
                mysqli_query($connection,$insert_key);
                
            } else{
                // $response["value"] = 0;
                // echo json_encode($response);
            
            }
        } else {
        
            // $response["value"] = 0;
            // echo json_encode($response);
            // die("Error: The file does not exist.");
            
        }

        if ($result2 = mysqli_query($connection,$check_key)){

        
                //Creating a file that include the key_check Value
                $row2 = mysqli_fetch_array($result2);
    

                if(isset($row2['key_check'])){
                $response["key_check"] = $row2['key_check'];
                $url = "$key_check.json";
                $fp = fopen($url, 'w');
                fwrite ($fp,json_encode($response));
                fclose($fp);
                echo json_encode($response);
                mysqli_close($connection); 

                }
               
        }
    
       }
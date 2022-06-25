<?php

if ($_SERVER['REQUEST_METHOD']=='POST') {
    
    
$serverName = "localhost";
    
$databaseName = "consuline";
    
$userName = "root";
    
$password= "";
    
$conn=mysqli_connect($serverName,$userName,$password,$databaseName);
    
if(!$conn){
      echo "Error Connecting to Database";
    }
    
    
$email = $_POST['email'];
    
$password = $_POST['password'];
    
$name = $_POST['un'];
    
$phoneNo = $_POST['no'];
     
    

    
$sql = "SELECT * FROM users WHERE email='$email' ";

    
$response = mysqli_query($conn, $sql);
    
    
$result = array();
   
    
    
if ( mysqli_num_rows($response) > 0 ) {
        
        
	$result['success'] = "0";
        
	$result['message'] = "duplicate email";
        
	echo json_encode($result);
        
	mysqli_close($conn);
        
        
    
	}
   else{
        
        
$sql = "INSERT INTO `users`( `name`,`password`, `email`,  `phoneNo`) VALUES ('$name','$password','$email','$phoneNo')";
        
        
if(mysqli_query($conn, $sql)){
           
	 $last_id = mysqli_insert_id($conn);
            
	$result['success'] = "1";
            
	$result['message'] = "success";
            
	$result['id']=$last_id;
            
	echo json_encode($result);
            
	mysqli_close($conn);

        
	}else{
            
	$result['success'] = "0";
            
	$result['message'] = "error inserting";
            
	echo json_encode($result);
            
	mysqli_close($conn);
        }
        
 
   }
 
 
}

?>
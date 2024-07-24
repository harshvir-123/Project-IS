<?php


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "post";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if(!$conn){
    die("Connection failed: ". mysqli_connect_error());
}else{
    
    $message = $_POST['message'];
    $sql="INSERT INTO `users`( `message`) VALUES ( '$message')";

    if(mysqli_query($conn, $sql)){
        echo ('message sent');
      
    }else{
        echo "something went wrong";
       
    }
}

?>


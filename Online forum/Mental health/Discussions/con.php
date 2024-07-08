<?php


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "discussions";


$conn = mysqli_connect($servername, $username, $password, $dbname);


if(!$conn){
    die("Connection failed: ".mysqli_connect_error());
}else{
    $title = $_POST["title"];
    $content = $_POST["content"];
 


    $sql="INSERT INTO `users`(`title`, `content`) VALUES ('$title','$content')";

    if(mysqli_query($conn,$sql)){
        echo ("Record inserted successfully");
    }else{
        echo "error";
    }
}






?>
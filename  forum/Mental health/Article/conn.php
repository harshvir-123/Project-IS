<?php


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "article";


$conn = mysqli_connect($servername, $username, $password, $dbname);


if(!$conn){
    die("Connection failed: ".mysqli_connect_error());
}else{
    $title = $_POST["title"];
    $content = $_POST["content"];
    $date = $_POST["date"];


    $sql="INSERT INTO `users`(`title`, `content`, `date`) VALUES ('$title','$content','$date')";

    if(mysqli_query($conn,$sql)){
        echo ("Record inserted successfully");
    }else{
        echo "error";
    }
}






?>
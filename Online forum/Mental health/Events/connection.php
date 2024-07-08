<?php 

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "event";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if(!$conn){
    die("Connection failed: ". mysqli_connect_error());
}else{

    $title = $_POST["title"];
    $content = $_POST["content"];
    $location = $_POST["location"];
    $date = $_POST["date"];
    $link = $_POST["link"];


    $sql="INSERT INTO `users`(`title`, `content`, `location`, `date`, `link`) VALUES ('$title','$content','$location','$date','$link')";

    if(mysqli_query($conn, $sql)){
        echo ("it has worked");
    }else{
        echo "It didnt not work";

    }

    
}





?>
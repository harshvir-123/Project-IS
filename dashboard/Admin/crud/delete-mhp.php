<?php
//1. include the db.php file
require_once 'db.php';


//2. check the form submission 
if(isset($_POST['id'])){

    //get form data
    $id = $_POST['id'];
    //4 write the query
    $sql = "DELETE  FROM `mhp` WHERE `id` = $id";
    if($conn->query($sql)){
        session_start();
        $_SESSION['message'] = "MHP deleted successfully!";
        header('location:../manage-mhp.php');
    }else{
        die("Sorry, there was an error uploading an MHP : <a href='../add-mhp.php'>Try Again</a>");
    }
  }






?> 
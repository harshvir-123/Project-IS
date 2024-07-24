<?php
//include the connnection once 
require_once '../config/db.php';
//2. check that the request is valid 
//i.e it is a POST request
//the form was actually submitted 
//var_dump($_POST);
if(isset($_POST['first_name'])){
    //--server side validation important 
    // get the form from the data
    $first_name = $row['first_name'];
    $last_name = $row['last_name'];
    $phone = $row['phone'];
    $email = $row['email'];
    $status = $row['status'];
    //these are location details 
  


   
    //--

    //4. image
   /// $targetDirectory = '../assets/images/';
    //$target_dir = 'assets/images/';
   //  var_dump($_FILES["photo"]);
   // $file_type = $_FILES["photo"]["type"];//image/png
   // $_FILES["photo"]["type"];
    //$file_extension = explode('/', $file_type)[1];

    //var_dump($file_extension);
  // $file_name = md5(basename($_FILES["photo"]["name"])).time().'.'.$file_extension;
   // $target_file = $targetDirectory. $file_name;

   // upload it
   if(move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file)) {
    $photo = $target_dir.$file_name;
    //4. write the query 
    $sql = "INSERT INTO `owners`( `photo`, `name`, `email`, `phone`, `occupation`, `license_number`, `experience`, `location`, `records`) VALUES ('$photo','$name','$email','$phone','$occupation','$license_number','$experience','$location','$records')"; 
    //exectude the query
    if($conn->query($sql)){
        session_start();
        $_SESSION['message'] = "MHP Added successfully!";
        header('location:../manage-mhp.php');
    }else{
        die("Sorry, there was an error uploading an MHP : <a href='../add-mhp.php'>Try Again</a>");
    }


    
  } else {
     //var_dump($_FILES["photo"]["error"]);
    die ( "Sorry, there was an error uploading your file : <a href='../add-mhp.php'>Try Again</a>");
  }

}else{
   header('location: ../add-mhp.php');
}


?>
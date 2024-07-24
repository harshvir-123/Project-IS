<?php
//include the connnection once 
require_once 'db.php';
//2. check that the request is valid 
//i.e it is a POST request
//the form was actually submitted 
//var_dump($_POST);
if (isset($_POST['name'])) {
    //--server side validation important 
    // get the form from the data
    $id = $_POST['id'];
    @$editImage = $_POST['editPhoto'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $occupation = $_POST['occupation'];
    $license_number = $_POST['license_number'];
    $experience = $_POST['experience'];
    //these are location details 
    $county = $_POST['county'];
    $town = $_POST['town'];
    $building = $_POST['building'];
    $records = $_POST['records'];

    $location = $building . ',' . $town . ',' . ucwords($county) . 'County';
    //  echo $editImage;die();
    if (isset($editImage)) {
        //4. image
        $targetDirectory = '../assets/images/';
        $target_dir = 'assets/images/';
        //  var_dump($_FILES["photo"]);
        $file_type = $_FILES["photo"]["type"]; //image/png
        $_FILES["photo"]["type"];
        $file_extension = explode('/', $file_type)[1];

        //var_dump($file_extension);
        $file_name = md5(basename($_FILES["photo"]["name"])) . time() . '.' . $file_extension;
        $target_file = $targetDirectory . $file_name;

        if (move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file)) {
            $photo = $target_dir . $file_name;
            //4. write the query 
            $sql = "UPDATE mhp SET photo = '$photo',  name = '$name', email = '$email', phone = '$phone', occupation = '$occupation', license_number = '$license_number', experience = '$experience', location = 
            '$location', records = '$records' WHERE id=$id";

            //exectude the query
            if ($conn->query($sql)) {
                session_start();
                $_SESSION['message'] = "MHP Added successfully!";
                header('location:../manage-mhp.php');
            } else {
                die("Sorry, there was an error uploading an MHP : <a href='../add-mhp.php'>Try Again</a>");
            }
        } else {
            //var_dump($_FILES["photo"]["error"]);
            die("Sorry, there was an error uploading your file : <a href='../add-mhp.php'>Try Again</a>");
        }
    } else {
           //4. write the query 
           $sql = "UPDATE mhp SET name = '$name', email = '$email', phone = '$phone', occupation = '$occupation', license_number = '$license_number', experience = '$experience', location = 
            '$location', records = '$records' WHERE id=$id";

           //exectude the query
           if ($conn->query($sql)) {
               session_start();
               $_SESSION['message'] = "MHP Added successfully!";
               header('location:../manage-mhp.php');
           } else {
               die("Sorry, there was an error uploading an MHP : <a href='../add-mhp.php'>Try Again</a>");
           }
    }



    //--


    // upload it


} else {
    header('location: ../add-mhp.php');
}

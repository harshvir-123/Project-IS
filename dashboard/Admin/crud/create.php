<?php
include "../config/db.php";
if(isset($_POST['submit'])){
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $status = $_POST['status'];
    $sql = "INSERT INTO `users`(firstname, lastname, email) VALUES ('$firstname', '$lastname', '$email', '$status')";

    $query = mysqli_query($conn, $sql);


}



?>








<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="Keywords" content="offering scooba life">
    <meta name="description" content="Enjoy scooba life">
    <meta name="author" content="Harshvir singh ahuja">
    <title>Contact us </title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.4.2/css/fontawesome.min.css" integrity="sha384-BY+fdrpOd3gfeRvTSMT+VUZmA728cfF9Z2G42xpaRkUGu2i3DyzpTURDo5A6CaLK" crossorigin="anonymous">
    <link rel="stylesheet" href="create.css">
</head>
<body>
<div class="contactUs">
<div class="title">

  <h2>Add a user</h2>
</div>
<div class="box">
  <!--Form-->
<div class="contact form">
  <h3>Create a user </h3>
  <form action="../user.php" method="post">
    <div class="formBox">
      <div class="row50">
        <div class="inputBox">
          <span>First name</span>
          <input type="text" placeholder="john" name="firstname" required>

        </div>
        <div class="inputBox">
          <span>Last name</span>
          <input type="text" placeholder="D0e" name="lastname"required>

        </div>
      </div>

      <div class="row50">
        <div class="inputBox">
          <span>Email</span>
          <input type="text" placeholder="johndoe@gmail.com" name="email" required>

        </div>
        </div>
        <div class="row100">
          <div class="inputBox">
            <span>status</span>
           <input type="text" placeholder="status" name="status" required>
  
          </div>
      </div>
      <div class="row100">
        <div class="inputBox">
          <span>Message</span>
         <input type="submit" value="Submit" name="submit">
         <a href="index.html" class="read-more">Click to go back</a>
        </div>
    </div>
    </div>
  </form>
</div>




</body>
</html>
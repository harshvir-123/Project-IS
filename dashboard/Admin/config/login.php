<?php

//1. get a database connection
require_once'../config/db.php';


if (isset($_POST['username'])) {
    //do something
    $username = $_POST['username'];
    $password = $_POST['password'];
    $hashedPassword = md5($password);
    

    //sql to ceck if user  exits
    $sql ="SELECT * from users WHERE username = '$username' AND password ='$hashedPassword'";
    
   
   $results = $conn->query($sql);   
        if ($results->num_rows > 0):
            //there is a user
            // log them in
            session_start();
            //set variables in session
            $data = $results->fetch_assoc();
            $_SESSION['username'] = $username;
            $_SESSION['name'] = $data['name'];
            $_SESSION['role'] = $data['role'];
            $_SESSION['id'] = $data['id'];
            
            //redirect to dasboard
            header('Location:../Admin/crud/dashboard.php?msg=welcome');
        else:
            // no user
            header('Location:../login.php?msg=error');
        endif;
          
}else {
   //redirect the user back to login page
   header('Location:../login.php');
}
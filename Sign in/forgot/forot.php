<?php
session_start();
$error = array();

if(!$conn = mysqli_connect("localhost","root","","forgot_pass")){
    die("connection failed");
}

$mode = "enter_email";
if(isset($_GET['mode'])){
    $mode = $_GET['mode'];
}


//something is posted

if(count($_POST)>0){

    switch($mode){
        case "enter_email":
            //valid email
            if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
                $error[] = "Invalid email";

            }else{

                $email = $_POST['email'];
                $_SESSION['email'] = $email;
                 send_email($email);
                    header("Location: ../forgot/forot.php?mode=enter_code");
                    die;

            }

   
            
         
        break;

        case "enter_code":
            $code = $_POST['code'];
            $result = is_code_correct($code);
            if($result == "the code is correct"){
                header("Location: ../forgot/forot.php?mode=enter_password");
                die;

            }else{
                $error[] = $result;
            }
      
            
         
        break;

        case "enter_password":
             $password = $_POST['password'];
             $password2 = $_POST['password2'];
             if($password!= $password2){
                 $error[] = "Passwords do not match";
             }else{
                 save_password($password);
            header("Location: ../Sign in/index.html");
            die;
            
             }
        break;

        default:


}
}


function save_password($password){
    
    $expire = time() + (60* 1);
    $password = password_hash($password, PASSWORD_DEFAULT);
    $email = addslashes($_SESSION['email']);
    $conn = mysqli_connect("localhost","root","","forgot_pass");


    $query = "update `users` set `password`='$password' where `email`='$email' limit 1";
      mysqli_query($conn,$query);

      //sned email here 
     // mail($email, 'Website: reset password', 'your code is ' . $code);
 


}






function send_email($email){
    
    $expire = time() + (60* 1);
    $code = rand(10000,99999);
    $email = addslashes($email);
    $conn = mysqli_connect("localhost","root","","forgot_pass");


    $query = "INSERT INTO `codes`( `email`, `code`, `expire`) VALUES ('$email','$code','$expire')";
      mysqli_query($conn,$query);

      //sned email here 
     // mail($email, 'Website: reset password', 'your code is ' . $code);
 


}

function is_code_correct($code){

    $code = addslashes($code);
    $expire = time();
    $email = addslashes($_SESSION['email']);
    $conn = mysqli_connect("localhost","root","","forgot_pass");
    $query = "SELECT * FROM `codes` WHERE `code`='$code' AND `email`='$email' AND `expire`>'$expire' order by id declimit 1";
   $result =  mysqli_query($conn,$query);
   if($result){
    if(mysqli_num_rows($result) > 0){
        $row = mysqli_fetch_assoc($result);
        if($row['expire'] > time()){
            return "the code is correct";

        }else{
            return "the code is expired";
        }
        
    }else{
        return "the code is incorrect";
    }

   }


    return false;

}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register & Login</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="../login.css">
</head>
<body>



    <div class="container" id="signIn">
        <h1 class="form-title"></h1>
        <?php



    switch($mode){
      
        case "enter_email":
            ?>
                <h1 class="form-title"> enter your email</h1>
            <form method="post" action="../forgot/forot.php?mode=enter_email">
            <div class="input-group">
                <i class="fas fa-envelope"></i>
                <input type="email" name="email" id="email" placeholder="Email" required>
                <label for="email">Email</label>
            </div>
          
           <input type="submit" class="btn" value="Reset" name="signIn">
          </form>
        
    
         <?php

        break;

        case "enter_code":
            ?>
                <h1 class="form-title">Enter your code</h1>
          <form method="post" action="../forgot/forot.php?mode=enter_code">
            <div class="input-group">
                <i class="fas fa-envelope"></i>
                <input type="code" name="code" id="code" placeholder="Enter the code sent to your email" required>
                <label for="code">Enter the code sendt to your mail</label>
            </div>
           <input type="submit" class="btn" value="Reset" name="signIn">
          </form>
        
    
         <?php
            
         
        break;

        case "enter_password":

            ?>
                <h1 class="form-title">Enter your new password</h1>
         <form method="post" action="../forgot/forot.php?mode=enter_password">
            <div class="input-group">
                <i class="fas fa-lock"></i>
                <input type="text" name="password" id="password" placeholder="Password" required>
                <label for="password">Password</label>
             
                <input type="text" name="password2" id="password" placeholder="Retype Password" required>
                
                <label for="password2">Retype Password</label>
            </div>
           <input type="submit" class="btn" value="Reset" name="signIn">
          </form>
        
    
         <?php
            
         
        break;

        default:


}




?>
     <!--    <form method="post" action="../register.php">
          <div class="input-group">
              <i class="fas fa-envelope"></i>
              <input type="email" name="email" id="email" placeholder="Email" required>
              <label for="email">Email</label>
          </div>
          <div class="input-group">
              <i class="fas fa-lock"></i>
              <input type="password" name="password" id="password" placeholder="Password" required>
              <label for="password">Password</label>
          </div>
         <input type="submit" class="btn" value="Reset" name="signIn">
        </form>
        <p class="or">
          ----------or--------
        </p>
        <div class="icons">
          <i class="fab fa-google"></i>
          <i class="fab fa-facebook"></i>
        </div>
        <div class="links">
          <p>Don't have account yet?</p>
          <button id="signUpButton">Sign Up</button>
        </div>
      </div>
      <script src="../login.js"></script>
-->
</body>
</html>
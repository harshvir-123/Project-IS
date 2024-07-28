<?php

@include '../Admin/config/db.php';

$id = $_GET['edit'];

if(isset($_POST['update_user'])){

   $first_name = $_POST['first_name'];
   $last_name = $_POST['last_name'];
   $email = $_POST['email'];
   $phone = $_POST['phone'];
   $status = $_POST['status'];

   if(empty($first_name) || empty($last_name) || empty($email) || empty($phone) || empty($status)){
      $message[] = 'please fill out all!';    
   }else{

      $update_data = "UPDATE users SET first_name='$first_name', last_name='$last_name', email='$email', phone='$phone', status='$status' WHERE id = '$id'";
      $upload = mysqli_query($conn, $update_data);

      if($upload){
         header('location:admin_page.php');
      }else{
         $$message[] = 'please fill out all!'; 
      }

   }
};

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="../php admin crud/css/style.css">
</head>
<body>

<?php
   if(isset($message)){
      foreach($message as $message){
         echo '<span class="message">'.$message.'</span>';
      }
   }
?>

<div class="container">


<div class="admin-product-form-container centered">

   <?php
      
      $select = mysqli_query($conn, "SELECT * FROM users WHERE id = '$id'");
      while($row = mysqli_fetch_assoc($select)){

   ?>
   
   <form action="" method="post" enctype="multipart/form-data">
      <h3 class="title">update the product</h3>
      <input type="text" class="box" name="first_name" value="<?php echo $row['first_name']; ?>" placeholder="enter your first name">
      <input type="text" min="0" class="box" name="last_name" value="<?php echo $row['last_name']; ?>" placeholder="enter your last name">
      <input type="email" class="box" name="email" value="<?php echo $row['email'];?>" placeholder="enter your email">
      <input type="text" class="box" name="phone" value="<?php echo $row['phone'];?>" placeholder="enter phone number">
      <input type="text" class="box" name="status" value="<?php echo $row['status'];?>" placeholder="enter your status">
      <input type="submit" value="update user" name="update_user" class="btn">
      <a href="admin_page.php" class="btn">go back!</a>
   </form>
   


   <?php }; ?>

   

</div>

</div>

</body>
</html>
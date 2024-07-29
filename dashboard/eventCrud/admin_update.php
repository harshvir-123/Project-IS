<?php

@include '../eventCrud/config.php';

$id = $_GET['edit'];

if(isset($_POST['update_user'])){

   
   $title = $_POST['title'];
   $content = $_POST['content'];
   $location = $_POST['location'];
   $date = $_POST['date'];
   $link = $_POST['link'];

   if(empty($title) || empty($content) || empty($location) || empty($date) || empty($link)){
      $message[] = 'please fill out all!';    
   }else{

      $update_data = "UPDATE users SET title='$title', content='$content', location='$location', date='$date', link='$link' WHERE id = '$id'";
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
      <input type="text" class="box" name="title" value="<?php echo $row['title']; ?>" placeholder="enter your new title">
      <input type="text" min="0" class="box" name="content" value="<?php echo $row['content']; ?>" placeholder="enter content">
      <input type="text" class="box" name="location" value="<?php echo $row['location'];?>" placeholder="enter your location">
      <input type="datetime" class="box" name="date" value="<?php echo $row['date'];?>" placeholder="enter date">
      <input type="url" class="box" name="link" value="<?php echo $row['link'];?>" placeholder="enter the link">
      <input type="submit" value="update user" name="update_user" class="btn">
      <a href="admin_page.php" class="btn">go back!</a>
   </form>
   


   <?php }; ?>

   

</div>

</div>

</body>
</html>
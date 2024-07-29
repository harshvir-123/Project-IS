<?php

@include '../feedbackCrud/config.php';

$id = $_GET['edit'];

if(isset($_POST['update_feedback'])){

   

   $feedback_type = $_POST['feedback_type'];
   $rating = $_POST['rating'];
   $feedback_text = $_POST['feedback_text'];
   $created_at = $_POST['created_at'];


   if(empty($feedback_type) || empty($rating) || empty($feedback_text) || empty($created_at)){
      $message[] = 'please fill out all!';    
   }else{

      $update_data = "UPDATE feedback SET feedback_type='$feedback_type', rating='$rating', feedback_text='$feedback_text', created_at='$created_at' WHERE id = '$id'";
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
      
      $select = mysqli_query($conn, "SELECT * FROM feedback WHERE id = '$id'");
      while($row = mysqli_fetch_assoc($select)){

   ?>
   
   <form action="" method="post" enctype="multipart/form-data">
      <h3 class="title">update the product</h3>
      <input type="text" class="box" name="feedback_type" value="<?php echo $row['feedback_type']; ?>" placeholder="enter your new title">
      <input type="text" min="0" class="box" name="rating" value="<?php echo $row['rating']; ?>" placeholder="enter content">
      <input type="text" class="box" name="feedback_text" value="<?php echo $row['feedback_text'];?>" placeholder="enter your location">
      <input type="datetime" class="box" name="created_at" value="<?php echo $row['created_at'];?>" placeholder="enter date">
  
      <input type="submit" value="update user" name="update_feedback" class="btn">
      <a href="admin_page.php" class="btn">go back!</a>
   </form>
   


   <?php }; ?>

   

</div>

</div>

</body>
</html>
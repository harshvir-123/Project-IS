<?php

@include '../feedbackCrud/config.php';

if(isset($_POST['add_feedback'])){

   $feedback_type = $_POST['feedback_type'];
   $rating = $_POST['rating'];
   $feedback_text = $_POST['feedback_text'];
   $created_at = $_POST['created_at'];


   if(empty($feedback_type) || empty($rating) || empty($feedback_text) || empty($created_at)){
      $message[] = 'please fill out all';
   }else{
      $insert = "INSERT INTO feedback ( `feedback_type`, `rating`, `feedback_text`, `created_at`) VALUES ('$feedback_type', '$rating', '$feedback_text', '$created_at')";
      $upload = mysqli_query($conn,$insert);
      if($upload){
         
         $message[] = 'new event added successfully';
      }else{
         $message[] = 'could not add the event';
      }
   }

};

if(isset($_GET['delete'])){
   $id = $_GET['delete'];
   mysqli_query($conn, "DELETE FROM feedback WHERE id = $id");
   header('location:admin_page.php');
};

?>


<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>admin page</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

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

   <div class="admin-product-form-container">

      <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">
         <h3>add a new feedback</h3>
         <input type="text" placeholder="enter a new title" name="feedback_type" class="box">
         <input type="number" placeholder="content" name="rating" class="box">
         <input type="text" placeholder="location" name="feedback_text" class="box">
         <input type="datetime" placeholder="enter date" name="created_at" class="box">
       
         <input type="submit" class="btn" name="add_feedback" value="add user">
      </form>

   </div>

   <?php

   $select = mysqli_query($conn, "SELECT * FROM feedback");
   
   ?>
   <div class="product-display">
      <table class="product-display-table">
         <thead>
         <tr>
            <th>feedback_type</th>
            <th>rating</th>
            <th>feedback_text</th>
            <th>created_at</th>
            <th>Action</th>
         </tr>
         </thead>
         <?php while($row = mysqli_fetch_assoc($select)){ ?>
         <tr>
          
            <td><?php echo $row['feedback_type']; ?></td>
            <td><?php echo $row['rating']; ?></td>
            <td><?php echo $row['feedback_text']; ?></td>
            <td><?php echo $row['created_at']; ?></td>
          
            <td>
               <a href="admin_update.php?edit=<?php echo $row['id']; ?>" class="btn"> <i class="fas fa-edit"></i> edit </a>
               <a href="admin_page.php?delete=<?php echo $row['id']; ?>" class="btn"> <i class="fas fa-trash"></i> delete </a>
            </td>
         </tr>
      <?php } ?>
      </table>
   </div>

</div>


</body>
</html>
<?php

@include '../eventCrud/config.php';

if(isset($_POST['add_event'])){

   $title = $_POST['title'];
   $content = $_POST['content'];
   $location = $_POST['location'];
   $date = $_POST['date'];
   $link = $_POST['link'];

   if(empty($title) || empty($content) || empty($location) || empty($date) || empty($link)){
      $message[] = 'please fill out all';
   }else{
      $insert = "INSERT INTO `users`(`title`, `content`, `location`, `date`, `link`) VALUES ('$title','$content','$location','$date','$link')";
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
   mysqli_query($conn, "DELETE FROM users WHERE id = $id");
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
         <h3>add a new event</h3>
         <input type="text" placeholder="enter a new title" name="title" class="box">
         <input type="text" placeholder="content" name="content" class="box">
         <input type="text" placeholder="location" name="location" class="box">
         <input type="datetime" placeholder="enter date" name="date" class="box">
         <input type= "url"   name="link" class="box">
         <input type="submit" class="btn" name="add_event" value="add user">
      </form>

   </div>

   <?php

   $select = mysqli_query($conn, "SELECT * FROM users");
   
   ?>
   <div class="product-display">
      <table class="product-display-table">
         <thead>
         <tr>
            <th>Title</th>
            <th>Content</th>
            <th>location</th>
            <th>Date</th>
            <th>Link</th>
            <th>Action</th>
         </tr>
         </thead>
         <?php while($row = mysqli_fetch_assoc($select)){ ?>
         <tr>
          
            <td><?php echo $row['title']; ?></td>
            <td><?php echo $row['content']; ?></td>
            <td><?php echo $row['location']; ?></td>
            <td><?php echo $row['date']; ?></td>
            <td><?php echo $row['link']; ?></td>
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
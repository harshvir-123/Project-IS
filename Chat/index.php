<?php
if(isset($_SESSION["userName"]) && 
isset($_SESSION["phoneNo"])){
 



?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Strathmore chatRoom</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <h1>ChatRoom</h1>
    <div class="chat">
        <h2>Welcome to <span>user</span></h2>
        <div class="msg">
           


        </div>
        <div class="input_msg">
            <input type="text" placeholder="write msg here">
            <button>Send</button>
        </div>
    </div>
      
</body>
</html>

<?php
}else{

    header("location: login.php");

}

?>
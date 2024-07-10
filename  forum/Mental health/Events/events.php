  <!--Creating a forum--->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ChatRoom</title>
    <link rel="stylesheet" href="events.css">
</head>
<body>
    
   
    <div class="event">
        <h2>Fill this forum to create a event</h2>
        <form action="connection.php" method="post">
            <label>Title</label>
            <input type="text" name="title" placeholder="Enter the title of the event">
            <br><br>
            <label>Content</label>
            <input type="text" name="content" placeholder="Enter the content of the event">
            <br>
            <label>location</label>
            <input type="text" name="location" placeholder="Enter the location of the event">
            <br>
            <label>date</label>
            <input type="datetime-local" name="date" placeholder="Enter the date of the event">
            <br>
            <label>Event link</label>
            <input type="url" name="link" placeholder="Enter the link of the event">
            <button class="see-more-btn">Send <i class="fa-solid fa-angle-down"></i></button>
        </form>

        
        
    </form>
    </div>
   
</body>
</html>
 
    
</body>
</html>
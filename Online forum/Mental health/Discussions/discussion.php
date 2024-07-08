<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Discussions</title>
    <link rel="stylesheet" href="discussion.css">
</head>
<body>
    <!--Discussion page-->
    <div class="discussion">
        <h2>Create a discussion to share with others</h2>

        <form action="con.php" method="post">
            <label>Title</label>
            <input type="text" name="title" placeholder="Enter title">
            <br>
            <label>Content</label>
            <input type="text" name="content" placeholder="What are your toughts">
            <br>
            <button class="see-more-btn">Share<i class="fa-solid fa-angle-down"></i></button>
        </form>
    </div>
</body>
</html>
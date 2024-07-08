<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Article</title>
    <link rel="stylesheet" href="article.css">
</head>
<body>
    <!--THIS IS A PAGE WHERE USERS CAN CREATE ARTICLE BY FILLING A FORUM-->
<div class="article">
    <h2>Create an article</h2>

    <form action="conn.php" method="post">
        <label>Title</label>
        <input type="text" name="title" placeholder="Enter Title">
        <br>
        <label>Content</label>
        <input type="text-area" name="content" placeholder="Enter Content">
        <br>
        <label>Date</label>
        <input type="datetime-local" name="date" placeholder="Enter Date">
        <br>
        <button class="see-more-btn">Send <i class="fa-solid fa-angle-down"></i></button>
    </form>
</div>
</body>
</html>
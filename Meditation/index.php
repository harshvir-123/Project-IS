<?php require_once 'config.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mindfulness Practices Module</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>Mindfulness Practices</h1>
    </header>
    <nav>
        <ul>
            <li><a href="#" data-category="meditation">Meditation</a></li>
            <li><a href="#" data-category="breathing">Breathing Exercises</a></li>
            <li><a href="#" data-category="relaxation">Relaxation Techniques</a></li>
            
        </ul>
    </nav>
    <main>
        <section id="sessions-list"></section>
        <section id="progress-dashboard">
            <h2>Your Progress</h2>
            <div id="progress-stats"></div>
        </section>
    </main>
    <br><br><br>
    <footer>
        <p>&copy; 2024 Student Well-being App</p>
    </footer>
    <script src="meditation.js"></script>
</body>
</html>

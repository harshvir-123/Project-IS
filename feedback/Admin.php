<?php
require_once 'config.php';
require_once 'Database.php';
 
$db = new Database();
$feedback = $db->getFeedback();
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Feedback Dashboard</title>
    <link rel="stylesheet" href="Admin.css">
</head>
<body>
    <header>
        <h1>Admin Feedback Dashboard</h1>
    </header>
    <main>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Type</th>
                    <th>Rating</th>
                    <th>Feedback</th>
                    <th>Date</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($feedback as $item): ?>
                <tr>
                    <td><?php echo htmlspecialchars($item['id']); ?></td>
                    <td><?php echo htmlspecialchars($item['feedback_type']); ?></td>
                    <td><?php echo htmlspecialchars($item['rating']); ?></td>
                    <td><?php echo htmlspecialchars($item['feedback_text']); ?></td>
                    <td><?php echo htmlspecialchars($item['created_at']); ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </main>
    <footer>
        <p>&copy; 2024 Student Well-being App - Admin Panel</p>
    </footer>
</body>
</html>

<?php
include'auth_check.php';
include 'db.php';

$id = $_GET['id'];
$result = $conn->query("SELECT * FROM notes WHERE id='$id' AND user_id='{$_SESSION['user_id']}'");
$note = $result->fetch_assoc();

echo "<h2>{$note['title']}</h2>";
echo "<p>{$note['content']}</p>";
echo "<p>Created: {$note['created_at']}</p>";
echo "<p>Last Modified: {$note['updated_at']}</p>";
echo "<a href='dashboard.php'>Back to Dashboard</a>";
?>>
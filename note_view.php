<?php
include 'auth_check.php';
include 'db.php';

if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id'];

    $stmt = $conn->prepare("SELECT * FROM notes WHERE id = ? AND user_id = ?");
    $stmt->bind_param("ii", $id, $_SESSION['user_id']);
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if note exists
    if ($result->num_rows > 0) {
        $note = $result->fetch_assoc();

        echo "<h2>" . htmlspecialchars($note['title']) . "</h2>";
        echo "<p>" . nl2br(htmlspecialchars($note['content'])) . "</p>";
        echo "<p>Created: " . htmlspecialchars($note['created_at']) . "</p>";
        echo "<p>Last Modified: " . htmlspecialchars($note['updated_at']) . "</p>";
        echo "<a href='dashboard.php'>Back to Dashboard</a>";
    } else {
        echo "<p>No note found or you don't have permission to view it.</p>";
        echo "<a href='dashboard.php'>Back to Dashboard</a>";
    }

} else {
    echo "<p>No note ID provided.</p>";
    echo "<a href='dashboard.php'>Back to Dashboard</a>";
}
?>

<?php
session_start();
include 'auth_check.php'; 
include 'db.php';


if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}
$user_id = intval($_SESSION['user_id']);

$id = intval($_GET['id']);

$stmt = $conn->prepare("DELETE FROM note WHERE id = ? AND user_id = ?");
$stmt->bind_param("ii", $id, $user_id);

if ($stmt->execute()) {
    $stmt->close();
    header("Location:node_create.php ");
    exit();
} else {
    echo "Error deleting note: " . $conn->error;
}
?>


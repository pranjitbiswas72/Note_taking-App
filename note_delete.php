<?php
session_start();
include 'auth_check.php';
include 'db.php';

$id = $_GET["id"];

$conn->query("DELETE FROM note WHERE id=$id AND user_id=$user_id");
header("Location: note_view.php");
exit();



?>
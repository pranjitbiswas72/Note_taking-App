<?php
include 'auth_check.php';
include 'db.php';
include 'helper.php';

$id =$_GET['id'];
$result = $conn->query("SELECT * FROM notes WHERE id='$id' AND user_id='{$_SESSION['user-id']}'");
 $note = $result->fetch_assoc();



?>
    <form method="POST">
    Titel:<input type="text" name="title" value="<?= $note['title'] ?>" required><br><br>
    content:<textarea name="content" required><?=$note['content'] ?></textarea><br>

    <button type="submit">Add Note</button>
</form>

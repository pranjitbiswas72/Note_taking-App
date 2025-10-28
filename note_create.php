<?php

include 'db.php';
include 'helper.php';
include 'auth_check.php';


if (isset($_POST['note'])) {
    $title = $_POST["title"];
    $content = $_POST["content"];
    $user_id = $_SESSION["user_id"];

 $note_insert = "INSERT INTO `note`( `user_id`, `title`, `content` ) VALUES ('$user_id','$title','$content')";
        if ($conn->query($note_insert) === true) {
            header("Location: note_view.php");
            exit();
        }
 
}
?>

<form method="POST">
    Titel:<input type="text" name="title" required><br>
    content:<input type="text" name="content" required><br>

    <button type="submit">Add Note</button>
</form>

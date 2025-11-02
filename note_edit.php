<?php
include 'db.php';

 
if (!isset($_GET['id'])) {
    echo "No note ID provided. <a href='dashboard.php'>Back to Dashboard</a>";
    exit();
}


 
$id =$_GET['id'];
$result = $conn->query("SELECT * FROM notes WHERE id='$id'");
 $note = $result->fetch_assoc();



?>
 <form method="POST">
    Titel:<input type="text" name="title" required><br><br>
    content:<input type="text" name="content" required><br><br>

    <button type="submit" name="note">Add Note</button>
</form>
   

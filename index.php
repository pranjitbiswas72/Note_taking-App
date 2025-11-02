<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Note_App</title>
</head>
<body>
  <a href="register.php">Register:</a> | <a href="login.php">Login:</a>

    <?php
    include 'db.php';
  
        $sql = "SELECT * FROM users";
        $result = $conn->query($sql);
    ?>
   <a href="note_create.php">+ Add New Item:</a>
<hr>
   <table border="1" cellpadding="8">
     <tr>
       <th>ID</th>
       <th>Name</th>
       <th>Action</th>
     </tr>

     
      <?php

          while ($row = $result->fetch_assoc()):

?>
        <tr>
             <td><?php echo $row['id']?></td>
             <td><?php echo $row['name']?></td>
             <td>
                <a href="note_edit.php?id=<?php echo $row['id']?>">Edit:</a>
                <a href="note_delete.php?id=<?php echo $row['id']?>">Delete:</a>
             </td>
        </tr>
       <?php
           endwhile;
        ?>
</body>
</html>
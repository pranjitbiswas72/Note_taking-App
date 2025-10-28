<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
  <a href="register.php">Register</a> | <a href="login.php">Login</a>

    <?php
    include 'db.php';
    //include 'note_creat.php';
    //include 'note_delete.php';
    //include 'note_edit.php';
        $sql = "SELECT * FROM users";
        $result = $conn->query($sql);
    ?>
   <a href="create.php">+ Add New Item</a>
<hr>
   <table border="1" cellpadding="8">
     <tr>
       <th>ID</th>
       <th>Name</th>
       <th>Action</th>
     </tr>

     
      <?php
         // output data of each row

          while ($row = $result->fetch_assoc()):

?>
        <tr>
             <td><?php echo $row['id']?></td>
             <td><?php echo $row['name']?></td>
             <td>
                <a href="edit.php?id=<?php echo $row['id']?>">Edit</a>
                <a href="delete.php?id=<?php echo $row['id']?>">Delete</a>
             </td>
        </tr>
       <?php
           endwhile;
        ?>
</body>
</html>
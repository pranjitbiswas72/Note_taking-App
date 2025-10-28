<?php
session_start();
include 'db.php';
include 'helper.php';

if (isset($_POST['login'])){
    $email = input_test($_POST['email']);
    $password = input_test($_POST['password']);

    $check_log = "SELECT * FROM users WHERE email='$email'";
    $result_log = $conn->query($check_log);

    if ($result_log->num_rows > 0) {
        $row = $result_log->fetch_assoc();
        if (password_verify($password, $row['password'])) {

            $_SESSION['user_id']=$row['id'];
            $_SESSION['email']=$email;
            header("Location: dashboard.php");  
            exit();
        } else { username_error;
           
        }
    } else {
       password_error;
        
    }
}


?>

<form method="POST">
    Email : <input type= "email" name="email" required><br>
    password :<input type="password" name="password" required><br>

    <button type="submit">Login </button>
</form>
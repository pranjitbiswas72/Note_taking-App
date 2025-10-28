
<?php
include 'db.php';
include 'helper.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = input_test($_POST['username']);
    $email = input_test($_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $sql = "INSERT INTO users (name, email, password) VALUES ('$username', '$email', '$password')";

    if ($conn->query($sql) === TRUE) {
        echo "register succeaafully <a href='login.php'>Logine </a>";
    } else {
        echo "error: " . $conn->error;
    }
}
?>

<form method="POST">
    Username: <input type="text" name="username" required><br>
    Email: <input type="email" name="email" required><br>
    Password: <input type="password" name="password" required><br>
    <button type="submit">Register</button>
</form>
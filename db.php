<?php
$server = "localhost";
$username = "root";
$password = "";
$dbname = "notes_app";

$conn = new mysqli($server, $username, $password);

if ($conn->connect_error) {
    die("Connaction Failed" . $conn->connect_error);
} else {
}

$sql_db = "CREATE DATABASE IF NOT EXISTS $dbname";

if ($conn->query($sql_db) === true) {
}
$conn = new mysqli($server, $username, $password, $dbname);
$sql_table = "CREATE TABLE IF NOT EXISTS users(
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL, 
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP

)";
if ($conn->query($sql_table) === true) {
}
$sql_table = "CREATE TABLE IF NOT EXISTS note(
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    title VARCHAR(255),
    content TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
)";
if ($conn->query($sql_table) === true) {
}

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

?>
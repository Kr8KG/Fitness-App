<?php
$servername = "fitify-db.ctq460w22gbq.us-east-2.rds.amazonaws.com";
$username = "root";  
$password = "fitify123";  
$database = "fitifyDB"; 

// Create a connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $conn->real_escape_string($_POST['username']);
    $email = $conn->real_escape_string($_POST['email']);
    $age = $conn->real_escape_string($_POST['age']);
    $weight = $conn->real_escape_string($_POST['weight']);
    $height = $conn->real_escape_string($_POST['height']);

    $password_hash = password_hash("default_password", PASSWORD_DEFAULT); 

    $sql = "INSERT INTO users (username, email, password_hash, age, weight, height) 
            VALUES ('$username', '$email', '$password_hash', '$age', '$weight', '$height')";
    
    if ($conn->query($sql) === TRUE) {
        echo "Data inserted successfully! <a href='display.php'>View Data</a>";
    } else {
        echo "Error: " . $conn->error;
    }
}

$conn->close();
?>
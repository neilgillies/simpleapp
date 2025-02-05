<?php
$servername = "localhost";
$username = "root";
$password = "P@$$w0rd"; // Replace with your password!
$dbname = "my_webapp";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];

    $sql = "INSERT INTO users (name, email) VALUES ('$name', '$email')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
        header("Location: index.php"); // Redirect back to the main page
        exit(); // Important to stop further execution
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Simple Web App</title>
</head>
<body>

<h1>Add User</h1>

<form action="add_user.php" method="post">
    Name: <input type="text" name="name" required><br>
    Email: <input type="email" name="email" required><br>
    <input type="submit" value="Add User">
</form>

<h2>Users</h2>

<?php
$servername = "localhost";
$username = "root";
$password = "123456"; // Replace with your password!
$dbname = "my_webapp";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM users";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table><tr><th>ID</th><th>Name</th><th>Email</th></tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["id"]. "</td><td>" . $row["name"]. "</td><td>" . $row["email"]. "</td></tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}
$conn->close();
?>

</body>
</html>

<?php
include 'config.php';

// Set your secret key
$secret_key = "my_secret_key"; // Change this to something unique

// Check if the correct key is provided in the URL
if (!isset($_GET['key']) || $_GET['key'] !== $secret_key) {
    die("Unauthorized access!");
}

// If the form is submitted, insert data into the database
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST["title"];
    $content = $_POST["content"];

    $sql = "INSERT INTO updates (title, content) VALUES ('$title', '$content')";
    if ($conn->query($sql) === TRUE) {
        echo "Update posted successfully!";
    } else {
        echo "Error: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Post Church Update</title>
</head>
<body>
    <h2>Post an Update</h2>
    <form method="post">
        <input type="text" name="title" placeholder="Update Title" required><br>
        <textarea name="content" placeholder="Update Content" required></textarea><br>
        <button type="submit">Post Update</button>
    </form>
</body>
</html>
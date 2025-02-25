<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];

    // Delete update from the database
    $sql = "DELETE FROM updates WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        echo "Update deleted successfully!";
    } else {
        echo "Error deleting update: " . $conn->error;
    }
    
    $stmt->close();
    $conn->close();

    // Redirect back to updates page
    header("Location: updates.php");
    exit();
}
?>
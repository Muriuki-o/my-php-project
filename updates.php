<?php
include 'config.php';

// Fetch updates from the database
$sql = "SELECT * FROM updates ORDER BY created_at DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Church Updates</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            background-color: #f4f4f4;
        }
        .container {
            max-width: 800px;
            margin: 50px auto;
            padding: 20px;
            background: white;
            border-radius: 8px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            color: #333;
        }
        .update {
            background: #fff;
            padding: 10px;
            margin: 10px 0;
            border-radius: 5px;
            box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.1);
        }
        .delete-btn {
            background: red;
            color: white;
            border: none;
            padding: 5px 10px;
            cursor: pointer;
            border-radius: 5px;
        }
        .delete-btn:hover {
            background: darkred;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Latest Updates</h2>
        <?php while ($row = $result->fetch_assoc()) { ?>
            <div class="update">
                <h3><?php echo $row['title']; ?></h3>
                <p><?php echo $row['content']; ?></p>
                <form method="post" action="delete_update.php">
                    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                    <button type="submit" class="delete-btn">Delete</button>
                </form>
            </div>
        <?php } ?>
    </div>
</body>
</html>
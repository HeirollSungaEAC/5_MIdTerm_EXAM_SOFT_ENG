<?php 
session_start(); 
require_once 'core/dbConfig.php'; 
require_once 'core/models.php'; 

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pokémon Merchandise Store</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1>Welcome to the Pokémon Merchandise Store</h1>
    <a href="add.php">Add New Merchandise</a>
    <h2>Available Merchandise</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Category</th>
            <th>Price</th>
            <th>Actions</th>
        </tr>
        <?php 
        $merchandise = getAllMerchandise($pdo);
        foreach ($merchandise as $item) { 
            $category = getCategories($pdo)[$item['category_id'] - 1]; // Adjust index
        ?>
        <tr>
            <td><?php echo $item['id']; ?></td>
            <td><?php echo $item['name']; ?></td>
            <td><?php echo $category['name']; ?></td>
            <td><?php echo $item['price']; ?></td>
            <td>
                <a href="edit.php?id=<?php echo $item['id']; ?>">Edit</a>
                <a href="delete.php?id=<?php echo $item['id']; ?>">Delete</a>
            </td>
        </tr>
        <?php } ?>
    </table>
    <a href="logout.php">Logout</a> <!-- Add logout link -->
</body>
</html>

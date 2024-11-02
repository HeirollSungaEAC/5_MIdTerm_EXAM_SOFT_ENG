<?php 
session_start(); 
require_once 'core/dbConfig.php'; 
require_once 'core/models.php'; 

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $category_id = $_POST['category_id'];
    $price = $_POST['price'];
    $user_id = $_SESSION['user_id'];

    addMerchandise($pdo, $name, $category_id, $price, $user_id);
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Merchandise</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1>Add New Merchandise</h1>
    <form action="" method="POST">
        <label for="name">Name:</label>
        <input type="text" name="name" required>
        
        <label for="category_id">Category:</label>
        <select name="category_id" required>
            <?php foreach (getCategories($pdo) as $category) { ?>
                <option value="<?php echo $category['id']; ?>"><?php echo $category['name']; ?></option>
            <?php } ?>
        </select>

        <label for="price">Price:</label>
        <input type="number" name="price" step="0.01" required>

        <input type="submit" value="Add Merchandise">
    </form>
    <a href="index.php">Back to Merchandise List</a>
</body>
</html>

<?php 
session_start(); 
require_once 'core/dbConfig.php'; 
require_once 'core/models.php'; 

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

if (isset($_GET['id'])) {
    deleteMerchandise($pdo, $_GET['id']);
    header("Location: index.php");
    exit();
}
?>

<?php

function getCategories($pdo) {
    $stmt = $pdo->query("SELECT * FROM categories");
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function getAllMerchandise($pdo) {
    $stmt = $pdo->query("SELECT * FROM merchandise");
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function getMerchandiseById($pdo, $id) {
    $stmt = $pdo->prepare("SELECT * FROM merchandise WHERE id = ?");
    $stmt->execute([$id]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function deleteMerchandise($pdo, $id) {
    $stmt = $pdo->prepare("DELETE FROM merchandise WHERE id = ?");
    $stmt->execute([$id]);
}

function addMerchandise($pdo, $name, $category_id, $price, $user_id) {
    $stmt = $pdo->prepare("INSERT INTO merchandise (name, category_id, price, added_by) VALUES (?, ?, ?, ?)");
    return $stmt->execute([$name, $category_id, $price, $user_id]);
}

function updateMerchandise($pdo, $id, $name, $category_id, $price, $user_id) {
    $stmt = $pdo->prepare("UPDATE merchandise SET name = ?, category_id = ?, price = ?, last_updated = NOW(), added_by = ? WHERE id = ?");
    return $stmt->execute([$name, $category_id, $price, $user_id, $id]);
}

function registerUser($pdo, $first_name, $last_name, $email, $password) {
    $stmt = $pdo->prepare("INSERT INTO users (first_name, last_name, email, password) VALUES (?, ?, ?, ?)");
    return $stmt->execute([$first_name, $last_name, $email, $password]);
}

function getUserByEmail($pdo, $email) {
    $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->execute([$email]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}
?>

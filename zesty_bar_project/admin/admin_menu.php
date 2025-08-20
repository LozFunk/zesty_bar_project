<?php

session_start();
include '../config/db.php';
require_once 'dashboard.php';

if (!isset($_SESSION['loggedIn'])) exit('<p class="denied">Access denied.</p>');


$error = "";
$success = "";

if($_SERVER['REQUEST_METHOD']==="POST" && isset($_POST['add'])){

    $cocktail_name = $_POST['cocktail_name'] ?? '';
    $description = $_POST['description'] ?? '';
    $ingredients = $_POST['ingredients'] ?? '';
    $category = $_POST['cocktail_category'] ?? '';


    if(!empty($cocktail_name) && !empty($description) && !empty($ingredients) && !empty($category)){
        $stmt = $db->prepare('INSERT INTO menu (cocktail_name, description, ingredients, cocktail_category) VALUES (:cocktail_name, :description, :ingredients, :category)');

        $stmt->bindValue(':cocktail_name', $cocktail_name);
        $stmt->bindValue(':description', $description);
        $stmt->bindValue(':ingredients', $ingredients);
        $stmt->bindValue(':category', $category);
        $stmt->execute();

        $success = "Item successfully added.";
    }else{
        $error = 'Please fill in all fields.';
    }
    
}

if (isset($_GET['delete'])) {
    $id = (int)$_GET['delete'];
    if ($id > 0) {
        $stmt = $db->prepare('DELETE FROM menu WHERE id = ?');
        $stmt->execute([$id]);
        
        header("Location: admin_menu.php");
        exit;
    }
}

$items = $db->query('SELECT * FROM menu ORDER BY cocktail_category')->fetchAll();


?>
<div class="content-pos">
    <div class="centered">
    <h2>Menu Items</h2>
    <table>
    <tr><th>Name</th><th>Description</th><th>Note</th><th>Category</th><th></th></tr>
    <?php foreach ($items as $item): ?>
    <tr>
    <td><?=$item['cocktail_name'] ?></td>
    <td><?=$item['description'] ?></td>
    <td><?=$item['ingredients'] ?></td>
    <td><?=$item['cocktail_category'] ?></td>
    <td><a href="?delete=<?= $item['id'] ?>" class="button">Delete</a></td>
    </tr>
    <?php endforeach; ?>
    </table>

    <div class="add-form">
    <h3>Add New Item</h3>
    <div class="denied"><?=$error?></div>
    <div class="succeed"><?=$success?></div>
    <form method="POST">
        <input type="text" name="cocktail_name" placeholder="Cocktail Name"><br>
        <textarea name="description" placeholder="Description"></textarea><br>
        <textarea name="ingredients" placeholder="Ingredients"></textarea><br>
        <input type="text" name="cocktail_category" placeholder="Category"><br>
        <button type="submit" name="add" class="button add-btn">Add Item</button>
    </form>
    </div>
    </div>
</div>
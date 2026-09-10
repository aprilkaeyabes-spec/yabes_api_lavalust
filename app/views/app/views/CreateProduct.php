<?php
// filepath: c:\laragon\www\Lavalust\app\views\CreateProduct.php

$baseUrl = rtrim($_SERVER['SCRIPT_NAME'], '/');
?>

<h2>Add Product</h2>

<form method="POST" action="<?= htmlspecialchars($baseUrl . '/ProductController/create') ?>">
    <label>Product Name:</label><br>
    <input type="text" name="product_name" maxlength="100" required><br><br>

    <label>Description:</label><br>
    <textarea name="description" required></textarea><br><br>

    <label>Price:</label><br>
    <input type="number" name="price" step="0.01" min="0" required><br><br>

    <label>Quantity:</label><br>
    <input type="number" name="quantity" min="0" required><br><br>

    <button type="submit">Save Product</button>
    <a href="<?= htmlspecialchars($baseUrl . '/ProductController') ?>">Cancel</a>
</form>
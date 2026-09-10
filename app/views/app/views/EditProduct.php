<?php
// filepath: c:\laragon\www\Lavalust\app\views\EditProduct.php

$baseUrl = rtrim($_SERVER['SCRIPT_NAME'], '/');
?>

<h2>Edit Product</h2>

<form method="POST" action="<?= htmlspecialchars($baseUrl . '/ProductController/edit/' . $product['id']) ?>">
    <label>Product Name:</label><br>
    <input
        type="text"
        name="product_name"
        maxlength="100"
        value="<?= htmlspecialchars($product['product_name'] ?? '') ?>"
        required
    ><br><br>

    <label>Description:</label><br>
    <textarea name="description" required><?= htmlspecialchars($product['description'] ?? '') ?></textarea><br><br>

    <label>Price:</label><br>
    <input
        type="number"
        name="price"
        step="0.01"
        min="0"
        value="<?= htmlspecialchars($product['price'] ?? 0) ?>"
        required
    ><br><br>

    <label>Quantity:</label><br>
    <input
        type="number"
        name="quantity"
        min="0"
        value="<?= htmlspecialchars($product['quantity'] ?? 0) ?>"
        required
    ><br><br>

    <button type="submit">Update Product</button>
    <a href="<?= htmlspecialchars($baseUrl . '/ProductController') ?>">Cancel</a>
</form>
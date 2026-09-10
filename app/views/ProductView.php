<?php
// filepath: c:\laragon\www\Lavalust\app\views\ProductView.php

$frontController = rtrim($_SERVER['SCRIPT_NAME'], '/');
?>

<h2>Product List</h2>

<a href="<?= htmlspecialchars($frontController . '/ProductController/create', ENT_QUOTES, 'UTF-8') ?>">
    Add Product
</a>

<br><br>

<table border="1">
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Description</th>
        <th>Price</th>
        <th>Quantity</th>
        <th>Actions</th>
    </tr>

    <?php foreach (($products ?? []) as $product): ?>
        <tr>
            <td><?= htmlspecialchars($product['id'] ?? '') ?></td>
            <td><?= htmlspecialchars($product['product_name'] ?? '') ?></td>
            <td><?= htmlspecialchars($product['description'] ?? '') ?></td>
            <td><?= htmlspecialchars($product['price'] ?? '') ?></td>
            <td><?= htmlspecialchars($product['quantity'] ?? 0) ?></td>
            <td>
                <a href="<?= htmlspecialchars($frontController . '/ProductController/edit/' . (int) $product['id']) ?>">
                    Edit
                </a>
                <a href="<?= htmlspecialchars($frontController . '/ProductController/delete/' . (int) $product['id']) ?>">
                    Delete
                </a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>
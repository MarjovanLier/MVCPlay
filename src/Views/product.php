<?php
/* @var string $title */
/* @var array<\App\Models\Product> $products */
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
</head>
<body>
<h1><?= $title ?></h1>

<form action="/products/add" method="post">
    <input type="text" name="name" placeholder="Product Name" required>
    <input type="text" name="description" placeholder="Description" required>
    <input type="number" step="0.01" name="price" placeholder="Price" required>
    <button type="submit">Add Product</button>
</form>

<table>
    <thead>
    <tr>
        <th>Product ID</th>
        <th>Product Name</th>
        <th>Price</th>
        <th>Checked</th>
        <th>Actions</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($products as $product): ?>
        <tr>
            <td><?= $product->getId() ?></td>
            <td><?= $product->getName() ?></td>
            <td><?= $product->getPrice() ?></td>
            <td><?= $product->isChecked() ? 'Yes' : 'No' ?></td>
            <td>
                <a href="/products/edit/<?= $product->getId() ?>">Edit</a>
                <a href="/products/delete/<?= $product->getId() ?>">Delete</a>
                <a href="/products/toggleChecked/<?= $product->getId() ?>">
                    <?= $product->isChecked() ? 'Uncheck' : 'Check' ?>
                </a>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
</body>
</html>


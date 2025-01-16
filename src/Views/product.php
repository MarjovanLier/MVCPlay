<?php

use App\Models\Product;

/* @var string $title */
/* @var array<Product> $products */
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php
        echo $title; ?></title>
</head>
<body>
<?php include 'menu.php'; ?>
<h1><?php echo $title; ?></h1>

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
    <?php
    foreach ($products as $product) { ?>
        <tr>
            <td><?php
                echo $product->getId(); ?></td>
            <td><?php
                echo $product->getName(); ?></td>
            <td><?php
                echo $product->getPrice(); ?></td>
            <td><?php
                echo $product->isChecked() ? 'Yes' : 'No'; ?></td>
            <td>
                <a href="/products/edit/<?php
                echo $product->getId(); ?>">Edit</a>
                <a href="/products/delete/<?php
                echo $product->getId(); ?>">Delete</a>
                <a href="/products/toggleChecked/<?php
                echo $product->getId(); ?>">
                    <?php
                    echo $product->isChecked() ? 'Uncheck' : 'Check'; ?>
                </a>
            </td>
        </tr>
        <?php
    }
    ?>
    </tbody>
</table>
</body>
</html>


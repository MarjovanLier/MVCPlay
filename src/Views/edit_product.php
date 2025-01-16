<?php

/* @var \App\Models\Product $product */
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product</title>
</head>
<body>
<h1>Edit Product</h1>

<form action="/products/edit/<?php echo $product->getId(); ?>" method="post">
    <input type="text" name="name" value="<?= htmlspecialchars((string) $product->getName(), ENT_QUOTES | ENT_HTML5) ?>" placeholder="Product Name" required>
    <input type="text" name="description" value="<?= htmlspecialchars((string) $product->getDescription(), ENT_QUOTES | ENT_HTML5) ?>" placeholder="Description" required>
    <input type="number" step="0.01" name="price" value="<?= htmlspecialchars((string) $product->getPrice(), ENT_QUOTES | ENT_HTML5); ?>" placeholder="Price" required>
    <button type="submit">Save Changes</button>
</form>

<a href="/products">Back to Products</a>
</body>
</html>
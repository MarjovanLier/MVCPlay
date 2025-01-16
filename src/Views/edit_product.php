<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product</title>
</head>
<body>
<h1>Edit Product</h1>

<form action="/products/edit/<?= $product['id'] ?>" method="post">
    <input type="text" name="name" value="<?= htmlspecialchars($product['name']) ?>" placeholder="Product Name" required>
    <input type="text" name="description" value="<?= htmlspecialchars($product['description']) ?>" placeholder="Description" required>
    <input type="number" step="0.01" name="price" value="<?= htmlspecialchars($product['price']) ?>" placeholder="Price" required>
    <button type="submit">Save Changes</button>
</form>

<a href="/products">Back to Products</a>
</body>
</html>

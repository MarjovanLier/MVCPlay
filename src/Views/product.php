<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
</head>
<body>
<h1><?= $title ?></h1>

<table>
    <thead>
    <tr>
        <th>Product ID</th>
        <th>Product Name</th>
        <th>Price</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($products as $product): ?>
        <tr>
            <td><?= $product['id'] ?></td>
            <td><?= $product['name'] ?></td>
            <td><?= $product['price'] ?></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
</body>
</html>

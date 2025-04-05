<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?= esc($game['title']) ?> | Wolves Games</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <a href="/cart/add/<?= $game['id'] ?>" class="btn btn-success">Add to Cart</a>
</head>
<body>
<div class="container mt-5">
    <h1><?= esc($game['title']) ?></h1>
    <img src="<?= base_url('uploads/' . $game['image']) ?>" alt="<?= esc($game['title']) ?>" class="img-fluid mb-3" style="max-height: 400px;">
    <p><strong>Genre:</strong> <?= esc($game['genre']) ?></p>
    <p><strong>Price:</strong> £<?= esc($game['price']) ?></p>
    <p><strong>Description:</strong> <?= esc($game['description']) ?></p>

    <a href="<?= base_url('/checkout/' . $game['id']) ?>" class="btn btn-success">Buy Now</a>
</div>
</body>
</html>

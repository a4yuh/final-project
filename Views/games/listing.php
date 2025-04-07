<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Game Listings | Wolves Games</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <a href="/cart/add/<?= $game['id'] ?>" class="btn btn-success">Add to Cart</a>
</head>
<body>
<div class="container mt-5">
    <h1 class="mb-4 text-center">All Games</h1>

    <div class="row">
        <?php if (!empty($games) && is_array($games)): ?>
            <?php foreach ($games as $game): ?>
                <div class="col-md-3 mb-4">
                    <div class="card h-100">
                        <img src="<?= base_url('uploads/' . $game['image']) ?>" class="card-img-top" alt="<?= esc($game['title']) ?>">
                        <div class="card-body">
                            <h5 class="card-title"><?= esc($game['title']) ?></h5>
                            <p class="card-text">£<?= esc($game['price']) ?></p>
                            <a href="<?= base_url('/games/' . $game['id']) ?>" class="btn btn-primary">View Details</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p class="text-center">No games available.</p>
        <?php endif; ?>
    </div>
</div>
</body>
</html>

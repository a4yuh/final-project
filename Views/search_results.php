<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Results - Wolves Games</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>

<div class="container mt-4">
    <h2>Search Results for "<?= esc($query) ?>"</h2>

    <?php if (!empty($games)): ?>
        <div class="row row-cols-1 row-cols-md-3 g-4">
            <?php foreach ($games as $game): ?>
                <div class="col">
                    <div class="card h-100">
                        <img src="<?= base_url('assets/images/' . $game['image']) ?>" class="card-img-top" alt="<?= esc($game['title']) ?>">
                        <div class="card-body">
                            <h5 class="card-title"><?= esc($game['title']) ?></h5>
                            <p class="card-text">Genre: <?= esc($game['genre']) ?></p>
                            <p class="card-text">Price: $<?= esc($game['price']) ?></p>
                            <a href="#" class="btn btn-primary">View Game</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php else: ?>
        <p class="text-muted">No results found.</p>
    <?php endif; ?>
</div>

</body>
</html>
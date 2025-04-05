<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
    <title>Games in <?= esc($genre) ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <a href="/cart/add/<?= $game['id'] ?>" class="btn btn-success">Add to Cart</a>
</head>
<body>
    <div class="container mt-4">
        <h2 class="mb-4">Games in <?= esc($genre) ?> Genre</h2>
        <div class="row row-cols-1 row-cols-md-3 g-4">
            <?php if(!empty($games)): ?>
                <?php foreach($games as $game): ?>
                    <div class="col">
                        <div class="card h-100 bg-dark text-white">
                            <img src="<?= base_url('assets/images/' . $game['image']) ?>" class="card-img-top" alt="<?= esc($game['title']) ?>">
                            <div class="card-body">
                                <h5 class="card-title"><?= esc($game['title']) ?></h5>
                                <p class="card-text"><?= esc($game['description']) ?></p>
                                <!-- Link to a details page if you have one -->
                                <a href="<?= base_url('details/'.$game['id']) ?>" class="btn btn-outline-light">View Details</a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p>No games found for this genre.</p>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>

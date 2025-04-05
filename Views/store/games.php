<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Games - Wolves Games</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center">Game Store</h2>
        <div class="row">
            <?php foreach ($games as $game): ?>
                <div class="col-md-4">
                    <div class="card">
                        <img src="<?= base_url('assets/images/' . $game['image']) ?>" class="card-img-top" alt="<?= $game['title'] ?>">
                        <div class="card-body">
                            <h5 class="card-title"><?= $game['title'] ?></h5>
                            <p class="card-text">$<?= $game['price'] ?></p>
                            <a href="<?= base_url('/checkout/' . $game['id']) ?>" class="btn btn-primary">Buy Now</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</body>
</html>

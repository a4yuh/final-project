<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Saved Games</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
  <div class="container mt-4">
    <h2>Saved Games</h2>
    <div class="row row-cols-1 row-cols-md-3 g-4">
      <?php if (!empty($games)): ?>
        <?php foreach ($games as $game): ?>
          <div class="col">
            <div class="card h-100">
              <?php if (!empty($game['image'])): ?>
                <img src="<?= esc($game['image']) ?>" class="card-img-top" alt="<?= esc($game['title']) ?>">
              <?php endif; ?>
              <div class="card-body">
                <h5 class="card-title"><?= esc($game['title']) ?></h5>
                <p class="card-text">
                  <strong>Genre:</strong> <?= esc($game['genre']) ?><br>
                  <strong>Released:</strong> <?= esc($game['released_date']) ?><br>
                  <strong>Rating:</strong> <?= esc($game['rating']) ?><br>
                  <?= esc($game['description']) ?>
                </p>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      <?php else: ?>
        <p>No saved games found.</p>
      <?php endif; ?>
    </div>
    <a href="<?= base_url('/') ?>" class="btn btn-primary mt-4">Back to Home</a>
  </div>
</body>
</html>

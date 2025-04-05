<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Search Results for <?= esc($query) ?></title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
  <div class="container mt-4">
    <h2>Search Results for "<?= esc($query) ?>"</h2>

    <?php if (!empty($game)): ?>
      <div class="card mb-4">
        <?php if (!empty($game['background_image'])): ?>
          <img src="<?= esc($game['background_image']) ?>" class="card-img-top" alt="<?= esc($game['name']) ?>">
        <?php endif; ?>
        <div class="card-body">
          <h3 class="card-title"><?= esc($game['name']) ?></h3>
          <p class="card-text">
            <strong>Released:</strong> <?= esc($game['released'] ?? 'N/A') ?><br>
            <strong>Rating:</strong> <?= esc($game['rating'] ?? 'N/A') ?><br>
            <strong>Price:</strong> $49.99 (Placeholder)
          </p>
          <!-- Add any other RAWG fields you want to display -->
        </div>
      </div>
    <?php else: ?>
      <p>No game data available.</p>
    <?php endif; ?>

    <a href="<?= base_url('/') ?>" class="btn btn-primary">Back to Home</a>
  </div>
</body>
</html>
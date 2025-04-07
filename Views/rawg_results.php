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
        </div>
      </div>

      <!-- Button row -->
      <div class="mb-3">
        <button id="saveToLocal" class="btn btn-success me-2">Save to Account</button>
        <a href="<?= base_url('/') ?>" class="btn btn-primary">Back to Home</a>
      </div>

      <script>
  // Prepare game data from the RAWG API result
  const gameData = {
    title: "<?= esc($game['name']) ?>",
    genre: "<?= !empty($game['genres'][0]['name']) ? esc($game['genres'][0]['name']) : 'Unknown' ?>",
    description: "<?= isset($game['description_raw']) ? esc($game['description_raw']) : 'No description available' ?>",
    image: "<?= !empty($game['background_image']) ? esc($game['background_image']) : '' ?>",
    released_date: "<?= !empty($game['released']) ? esc($game['released']) : '' ?>",
    rating: "<?= isset($game['rating']) ? esc($game['rating']) : '' ?>"
  };

  document.getElementById('saveToLocal').addEventListener('click', function() {
    // Trigger vibration for 200ms if supported
    if (navigator.vibrate) {
      navigator.vibrate(200);
    }
    
    fetch('<?= base_url('games/saveLocal') ?>', {
      method: 'POST',
      headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
      body: new URLSearchParams(gameData)
    })
    .then(response => {
      if (!response.ok) {
        throw new Error('Network response was not ok');
      }
      // Manual redirect since fetch doesn't follow PHP redirects automatically:
      window.location.href = '<?= base_url('saved-games') ?>';
    })
    .catch(error => {
      console.error('Error saving game locally:', error);
      alert('Error saving game to database.');
    });
  });
</script>

    <?php else: ?>
      <p>No game data available.</p>
      <a href="<?= base_url('/') ?>" class="btn btn-primary">Back to Home</a>
    <?php endif; ?>
  </div>
</body>
</html>

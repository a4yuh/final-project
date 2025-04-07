<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Game Details - <?= esc($game['title']) ?></title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
  <div class="container mt-4">
    <h2><?= esc($game['title']) ?></h2>
    <?php if (!empty($game['image'])): ?>
      <img src="<?= base_url('assets/images/' . $game['image']) ?>" alt="<?= esc($game['title']) ?>" class="img-fluid">
    <?php endif; ?>
    <p><?= esc($game['description']) ?></p>
    
    <!-- Customer Reviews Section -->
    <div id="reviewsSection">
      <h4>Customer Reviews</h4>
      <form id="reviewForm">
        <input type="hidden" name="game_id" value="<?= esc($game['id']) ?>">
        <input type="hidden" name="user_id" value="<?= session()->get('user_id') ?>"> 
        <div class="form-group">
          <label for="rating">Rating (1-5):</label>
          <input type="number" class="form-control" name="rating" min="1" max="5" required>
        </div>
        <div class="form-group">
          <label for="review_text">Your Review:</label>
          <textarea class="form-control" name="review_text" rows="4" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary mt-2">Submit Review</button>
      </form>
      <div id="reviewMessage" class="mt-2"></div>
    </div>
    
    <a href="<?= base_url('/') ?>" class="btn btn-secondary mt-3">Back to Home</a>
  </div>
  
  <script>
    document.getElementById('reviewForm').addEventListener('submit', function(e) {
      e.preventDefault();
      let formData = new URLSearchParams(new FormData(this));
      
      fetch('<?= base_url('reviews/save') ?>', {
        method: 'POST',
        headers: {
          'Content-Type': 'application/x-www-form-urlencoded'
        },
        body: formData
      })
      .then(response => response.json())
      .then(data => {
        document.getElementById('reviewMessage').innerText = data.message;
        this.reset();
      })
      .catch(error => {
        console.error('Error:', error);
        document.getElementById('reviewMessage').innerText = 'Error saving review';
      });
    });
  </script>
</body>
</html>
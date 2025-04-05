<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout - Wolves Games</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center">Checkout</h2>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title"><?= $game['title'] ?></h5>
                <p class="card-text">Price: $<?= $game['price'] ?></p>
                <form action="<?= base_url('/order/place') ?>" method="POST">
                    <input type="hidden" name="game_id" value="<?= $game['id'] ?>">
                    <div class="mb-3">
                        <label for="address" class="form-label">Shipping Address</label>
                        <textarea class="form-control" id="address" name="address" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-success w-100">Place Order</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard - Wolves Games</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center">Welcome, <?= $user['name'] ?></h2>
        <p class="text-center">Email: <?= $user['email'] ?></p>

        <h3 class="mt-4">Your Orders</h3>
        <table class="table">
            <thead>
                <tr>
                    <th>Game</th>
                    <th>Price</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($orders as $order): ?>
                    <tr>
                        <td><?= $order['game_title'] ?></td>
                        <td>$<?= $order['price'] ?></td>
                        <td><?= $order['status'] ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <a href="<?= base_url('/logout') ?>" class="btn btn-danger">Logout</a>
    </div>
</body>
</html>

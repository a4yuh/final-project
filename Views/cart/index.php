<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<div class="container mt-4">
    <h2>Your Cart</h2>
    <?php if (empty($cart)) : ?>
        <p>Your cart is empty.</p>
    <?php else : ?>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Game</th>
                    <th>Price (£)</th>
                    <th>Quantity</th>
                    <th>Total (£)</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $grandTotal = 0; ?>
                <?php foreach ($cart as $item) : ?>
                    <tr>
                        <td><?= esc($item['title']) ?></td>
                        <td><?= number_format($item['price'], 2) ?></td>
                        <td><?= $item['quantity'] ?></td>
                        <td><?= number_format($item['price'] * $item['quantity'], 2) ?></td>
                        <td><a href="/cart/remove/<?= $item['id'] ?>" class="btn btn-danger btn-sm">Remove</a></td>
                    </tr>
                    <?php $grandTotal += $item['price'] * $item['quantity']; ?>
                <?php endforeach; ?>
                <tr>
                    <td colspan="3"><strong>Grand Total</strong></td>
                    <td colspan="2"><strong>£<?= number_format($grandTotal, 2) ?></strong></td>
                </tr>
            </tbody>
        </table>
        <a href="/checkout" class="btn btn-primary">Proceed to Checkout</a>
        <a href="/cart/clear" class="btn btn-warning">Clear Cart</a>
    <?php endif; ?>
</div>
<?= $this->endSection() ?>
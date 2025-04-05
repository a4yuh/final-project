<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Checkout - Wolves Games</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-dark text-light">
<div class="container mt-5">
    <h2>Checkout</h2>

    <form action="/checkout/process" method="post" class="row g-3 mt-4">
        <div class="col-md-6">
            <h4>Shipping Details</h4>
            <div class="mb-3">
                <label class="form-label">Full Name</label>
                <input type="text" name="fullname" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Address</label>
                <textarea name="address" class="form-control" rows="3" required></textarea>
                <button type="button" class="btn btn-secondary mb-3" onclick="autoFillAddress()">📍 Auto-Fill Address</button>
            </div>
            <div class="mb-3">
                <label class="form-label">Phone</label>
                <input type="text" name="phone" class="form-control" required>
            </div>
        </div>

        <div class="col-md-6">
            <h4>Payment Method</h4>
            <p>💳 Placeholder for payment integration.</p>

            <h4 class="mt-4">Order Summary</h4>
            <?php if (!empty($cart)) : ?>
                <ul class="list-group">
                    <?php foreach ($cart as $item): ?>
                        <li class="list-group-item d-flex justify-content-between bg-dark text-light">
                            <span><?= esc($item['name']) ?> x <?= esc($item['qty']) ?></span>
                            <span>£<?= esc($item['price'] * $item['qty']) ?></span>
                        </li>
                    <?php endforeach; ?>
                </ul>
                <div class="mt-3">
                    <strong>Total: £<?= esc($total) ?></strong>
                </div>
            <?php else : ?>
                <p>No items in cart.</p>
            <?php endif; ?>
        </div>

        <div class="col-12">
            <button type="submit" class="btn btn-success w-100">Place Order</button>
        </div>
    </form>
</div>
<script>
function autoFillAddress() {
    // Use HTML5 Geolocation API first (more accurate)
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(function(position) {
            const lat = position.coords.latitude;
            const lon = position.coords.longitude;

            fetch(`https://nominatim.openstreetmap.org/reverse?format=jsonv2&lat=${lat}&lon=${lon}`)
                .then(response => response.json())
                .then(data => {
                    const address = data.display_name;
                    document.querySelector('textarea[name="address"]').value = address;
                })
                .catch(err => alert("Failed to auto-fill address: " + err));
        }, function() {
            fallbackToIP();
        });
    } else {
        fallbackToIP();
    }
}

function fallbackToIP() {
    fetch("https://ipinfo.io/json?token=0b28f7c647298f")
        .then(response => response.json())
        .then(data => {
            const address = `${data.city}, ${data.region}, ${data.country}, ${data.postal}`;
            document.querySelector('textarea[name="address"]').value = address;
        })
        .catch(err => alert("Could not get location from IP: " + err));
}
</script>
</body>
</html>
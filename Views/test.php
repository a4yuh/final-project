<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wolves Games</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        body { background-color: #121212; color: white; }
        .navbar { background-color: #1f1f1f; }
        .navbar a, .navbar-brand { color: white; }
        .category-img { width: 80px; height: 80px; }
        .product-img { width: 100px; height: 100px; }
        .carousel-item img { width: 100%; height: 400px; object-fit: cover; }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container d-flex justify-content-center">
            <a class="navbar-brand" href="#">Wolves Games</a>
        </div>
    </nav>

    <div id="gameCarousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="/assets/images/game1.jpg" class="d-block w-100" alt="Game 1">
            </div>
            <div class="carousel-item">
                <img src="/assets/images/game2.jpg" class="d-block w-100" alt="Game 2">
            </div>
            <div class="carousel-item">
                <img src="/assets/images/game3.jpg" class="d-block w-100" alt="Game 3">
            </div>
            <div class="carousel-item">
                <img src="/assets/images/game4.jpg" class="d-block w-100" alt="Game 4">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#gameCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#gameCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
        </button>
    </div>

    <div class="container mt-4 text-center">
        <h2>Browse by Genre</h2>
        <div class="row">
            <div class="col"><a href="#" class="btn btn-outline-light">Adventure</a></div>
            <div class="col"><a href="#" class="btn btn-outline-light">RPG</a></div>
            <div class="col"><a href="#" class="btn btn-outline-light">Arcade</a></div>
            <div class="col"><a href="#" class="btn btn-outline-light">Shooter</a></div>
        </div>
    </div>

    <footer class="mt-5 p-4 text-center" style="background-color: #1f1f1f; color: white;">
        <p>&copy; 2025 Wolves Games. All Rights Reserved.</p>
        <p>Contact us at: <a href="mailto:support@wolvesgames.com" class="text-white">support@wolvesgames.com</a></p>
        <p><a href="#" class="text-white">Terms and Conditions</a> | <a href="#" class="text-white">Privacy Policy</a></p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
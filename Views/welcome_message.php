<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Wolves Games</title>

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
  
  <style>
      body { 
          background-color: #121212; 
          color: white; 
          font-family: Arial, sans-serif; 
      }
      .navbar { 
          background-color: #1a1a1a; 
      }
      .navbar a, .navbar-brand { 
          color: white; 
      }
      .genre-img, .product-img { 
          width: 100px; 
          height: 100px; 
      }
      
    
      .carousel-item img {
          width: 100%;
          height: auto;
          object-fit: contain; /* Ensures the entire image is visible without cropping */
          max-height: 800px;   
      }
      @media (max-width: 768px) {
          .carousel-item img {
              max-height: 500px;
          }
      }
      
      /* Footer Styles */
      footer { 
          background-color: #1a1a1a; 
          padding: 30px 0; 
          text-align: center; 
          font-size: 14px; 
      }
      footer a { 
          color: #bdbdbd; 
          text-decoration: none; 
      }
      footer a:hover { 
          color: white; 
      }
  </style>
</head>
<body>

  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-dark">
      <div class="container">
          <a class="navbar-brand d-flex align-items-center" href="#">
              <img src="/assets/images/game-icon.png" alt="Wolves Games Logo" width="40" height="40">
              <span class="fs-4 ms-2">Wolves Games</span>
          </a>
  
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navMenu">
              <span class="navbar-toggler-icon"></span>
          </button>
  
          <div class="collapse navbar-collapse justify-content-end" id="navMenu">
              <ul class="navbar-nav">
                  <li class="nav-item"><a class="nav-link" href="#">Home</a></li>
                  <li class="nav-item"><a class="nav-link" href="#">Shop</a></li>
                  <li class="nav-item"><a class="nav-link" href="#">Contact</a></li>
                  <li class="nav-item"><a class="nav-link" href="http://localhost/login">User</a></li>
              </ul>
          </div>
      </div>
  </nav>
  
  <!-- Search Bar -->
  <div class="container mt-3">
      <form action="<?= base_url('search') ?>" method="GET" class="d-flex">
          <input class="form-control me-2" type="search" name="query" placeholder="Search games..." aria-label="Search" required>
          <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
  </div>
  
  <!-- Slideshow -->
  <div id="gameCarousel" class="carousel slide mt-3" data-bs-ride="carousel">
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
          <div class="carousel-item">
              <img src="/assets/images/game5.jpg" class="d-block w-100" alt="Game 5">
          </div>
          <div class="carousel-item">
              <img src="/assets/images/game6.jpg" class="d-block w-100" alt="Game 6">
          </div>
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#gameCarousel" data-bs-slide="prev">
          <span class="carousel-control-prev-icon"></span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#gameCarousel" data-bs-slide="next">
          <span class="carousel-control-next-icon"></span>
      </button>
  </div>
  
  <!-- Browse by Genre -->
  <div class="container mt-4 text-center">
      <h2>Browse by Genre</h2>
      <div class="row row-cols-2 row-cols-md-4 g-3">
          <?php 
          $genres = [
              ["Action", "action.jpg"],
              ["Adventure", "adventure.jpg"],
              ["RPG", "rpg.jpg"],
              ["Racing", "racing.jpg"],
              ["Sports", "sports.jpg"],
              ["Shooter", "shooter.jpg"],
              ["Horror", "horror.jpg"],
              ["Strategy", "strategy.jpg"],
          ];
  
          foreach ($genres as $genre) {
              echo '
              <div class="col text-center">
                  <a href="' . base_url('genre/' . strtolower($genre[0])) . '" style="text-decoration: none; color: white;">
                      <img src="/assets/images/' . $genre[1] . '" class="genre-img rounded">
                      <p>' . $genre[0] . '</p>
                  </a>
              </div>';
          }
          ?>
      </div>
  </div>
  
  <!-- Footer -->
  <footer class="mt-5">
      <div class="container">
          <div class="row">
              <div class="col-md-4">
                  <h5>Contact Us</h5>
                  <p>Email: support@wolvesgames.com</p>
                  <p>Phone: +44 123 456 789</p>
              </div>
              <div class="col-md-4">
                  <h5>Quick Links</h5>
                  <p><a href="#">Home</a> | <a href="#">Shop</a> | <a href="#">Contact</a></p>
                  <p><a href="#">Terms & Conditions</a> | <a href="#">Privacy Policy</a></p>
              </div>
              <div class="col-md-4">
                  <h5>Follow Us</h5>
                  <p>
                      <a href="#">Facebook</a> | 
                      <a href="#">Twitter</a> | 
                      <a href="#">Instagram</a>
                  </p>
              </div>
          </div>
          <p class="mt-3">&copy; 2025 Wolves Games. All Rights Reserved.</p>
      </div>
  </footer>
  
  <!-- Bootstrap Scripts -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Game Store</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        body {
            background-color: #121212;
            color: #fff;
            font-family: Arial, sans-serif;
            text-align: center;
        }
        .slideshow-container {
            position: relative;
            max-width: 100%;
            overflow: hidden;
            margin: auto;
        }
        .slide {
            display: none;
            width: 100%;
        }
        .slide img {
            width: 100%;
            height: auto;
            object-fit: contain;
        }
        .genre-container {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            margin-top: 20px;
        }
        .genre {
            background-color: #1e1e1e;
            padding: 10px 20px;
            margin: 10px;
            border-radius: 5px;
            cursor: pointer;
        }
        footer {
            margin-top: 50px;
            padding: 20px;
            background-color: #1e1e1e;
        }
    </style>
</head>
<body>
    <h1>Welcome to the Online Game Store</h1>
    <div class="slideshow-container">
    <div class="slide">
        <img src="assets/images/game1.jpg" alt="Game 1">
    </div>
    <div class="slide">
        <img src="assets/images/game5.jpg" alt="Game 5">
    </div>
    <div class="slide">
        <img src="assets/images/game6.jpg" alt="Game 6">
    </div>
    <div class="slide">
        <img src="assets/images/game2.jpg" alt="Game 2">
    </div>
    <div class="slide">
        <img src="assets/images/game3.jpg" alt="Game 3">
    </div>
    <div class="slide">
        <img src="assets/images/game4.jpg" alt="Game 4">
    </div>
</div>
    
    <h2>Browse by Genre</h2>
    <div class="genre-container">
        <div class="genre">Adventure</div>
        <div class="genre">RPG</div>
        <div class="genre">Arcade</div>
        <div class="genre">Shooter</div>
    </div>
    
    <footer>
        <p>Contact Info: email@example.com | Phone: 123-456-7890</p>
        <p><a href="#">Terms & Conditions</a> | <a href="#">Privacy Policy</a></p>
    </footer>
    
    <script>
        let slideIndex = 0;
        showSlides();

        function showSlides() {
            let slides = document.getElementsByClassName("slide");
            for (let i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";
            }
            slideIndex++;
            if (slideIndex > slides.length) { slideIndex = 1; }
            slides[slideIndex - 1].style.display = "block";
            setTimeout(showSlides, 3000);
        }
    </script>
</body>
</html>
<!DOCTYPE html>
<html>
<head>
  <title>Culture Geek - Mon Site Web</title>
  <link rel="stylesheet" type="text/css" href="./css/page.css">
</head>
<body>
  <?php include('header.php'); ?>

  <main>
    <div class="container">
      <h2>Bienvenue dans l'univers Geek</h2>
      <p>Découvrez l'actualité, les critiques et les événements de la culture Geek.</p>

      <div id="slideshow-container">
        <div class="slide fade">
          <img src="../image/1706831-bg3-1-article_image_t-2.jpg" alt="Image 1">
        </div>

        <div class="slide fade">
          <img src="../image/Starfield-game-HD-scaled-1.webp" alt="Image 2">
        </div>

        <div class="slide fade">
          <img src="../image/PayDay-3.jpg" alt="Image 3">
        </div>

        <a class="prev" onclick="changeSlide(-1)">&#10094;</a>
        <a class="next" onclick="changeSlide(1)">&#10095;</a>
      </div>
    </div>
  </main>

  <footer>
    <p>&copy; 2023 Culture Geek. Tous droits réservés.</p>
  </footer>

  <script src="./js/page.js"></script>
</body>
</html>

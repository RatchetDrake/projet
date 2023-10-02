<?php
include('header.php');
?>
  <link rel="stylesheet" href="./css/page.css">
</head>
<body>
    <style>body {
  font-family: Arial, sans-serif;

}

.container {
  margin-top: 50px;
}

button {
  font-size: 24px;
  padding: 10px 20px;
}

p {
  font-size: 24px;
  font-weight: bold;
}
</style>
  <div class="container">
    <button id="gameButton">Cliquez ici pour marquer un point</button>
    <p id="noir">Votre score : <span id="score">0</span></p>
  </div>
  <script src="script.js"></script>
</body>

</html>
<script>let score = 0;

document.getElementById('gameButton').addEventListener('click', () => {
  score++;
  document.getElementById('score').innerText = score;
});
 </script>

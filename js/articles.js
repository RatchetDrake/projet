// Vous pouvez simuler des données pour le flux d'actualités
const newsData = [
    "Nouvel article 1 : Les dernières tendances geek",
    "Nouvel article 2 : Les jeux vidéo à ne pas manquer",
    "Nouvel article 3 : L'évolution de la technologie",
  ];
  
  const newsfeed = document.getElementById("newsfeed");
  
  function displayNews() {
    newsfeed.innerHTML = ""; // Efface le contenu actuel du flux
  
    // Ajoute chaque article au flux
    newsData.forEach((article, index) => {
      const newsItem = document.createElement("div");
      newsItem.classList.add("news-item");
      newsItem.textContent = `${index + 1}. ${article}`;
      newsfeed.appendChild(newsItem);
    });
  }
  
  // Affiche les nouvelles au chargement de la page
  window.onload = function () {
    displayNews();
  
    // Mettez en place un intervalle pour rafraîchir les nouvelles toutes les X secondes
    setInterval(() => {
      // Vous pouvez obtenir de nouvelles données du serveur ici
      // Pour l'exemple, nous utiliserons les mêmes données
      displayNews();
    }, 5000); // Rafraîchissement toutes les 5 secondes (5000 ms)
  };
  
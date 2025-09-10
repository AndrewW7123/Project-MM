/*
 * gamescript.js
 *
 * Purpose: Handles the dynamic display of games on the Games page.
 * Filters games by genre based on user selection and injects the appropriate game cards.
 *
 * Author: Haoran Li (Mike)
 * Date: April 25, 2025
 * Student Number: 400495145
 */

document.addEventListener("DOMContentLoaded", () => {
  const gameList = document.getElementById("game-list");
  const buttons = document.querySelectorAll(".category");

  /**
   * displayGames
   * 
   * Purpose: Filters and displays games based on the selected genre.
   * Parameters:
   *  - filter (string): The genre to filter games by ("Shooter", "MOBA", etc.)
   * Returns: None
   */
  function displayGames(filter = "All Games") {
    gameList.innerHTML = "";

    const filtered = filter === "All Games"
      ? games
      : games.filter(g => g.genre === filter);

    filtered.forEach(game => {
      const card = document.createElement("div");
      card.className = "game-card";

      card.innerHTML = `
        <img src="${game.image}" alt="${game.name}" class="game-image" />
        <div class="game-info">${game.name}</div>
      `;

      gameList.appendChild(card);
    });
  }

  /**
   * Event Listeners for Category Buttons
   * 
   * Purpose: Changes active button state and updates displayed games.
   */
  buttons.forEach(btn => {
    btn.addEventListener("click", () => {
      buttons.forEach(b => b.classList.remove("active"));
      btn.classList.add("active");
      displayGames(btn.textContent);
    });
  });

  // Initial load: show all games
  displayGames();
});

/*
 * coaches.js
 *
 * Purpose: JavaScript file for dynamically loading coach page content.
 * Handles displaying the game title, live news updates, featured YouTube clips, 
 * and fetching coach data from the server.
 *
 * Author: Haoran Li (Mike)
 * Date: April 25, 2025
 * Student Number: 400495145
 */

// ========== Read Game Name from URL ==========
const urlParams = new URLSearchParams(window.location.search);
const game = urlParams.get("game") || "Unknown Game";
document.getElementById("game-title").textContent = game.toUpperCase();

// ========== Dummy News Data ==========
const newsItems = [
  "Patch notes released.",
  "Coaching seminar this Friday!",
  "Tourney signup closes soon.",
  "Community spotlight: Best clips!"
];

/**
 * updateNews
 * 
 * Purpose: Dynamically populate the news feed list for the selected game.
 * Parameters: None
 * Returns: None
 */
function updateNews() {
  const feed = document.getElementById("news-feed");
  feed.innerHTML = "";
  newsItems.forEach(item => {
    const li = document.createElement("li");
    li.textContent = item;
    feed.appendChild(li);
  });
}

// Call to populate news on page load
updateNews();

// ========== Fetch and Display Coach Data ==========

/**
 * Fetches coach data from the server and displays coach cards in the right column.
 * Parameters: None
 * Returns: None
 */
fetch(`get_coaches.php?game=${encodeURIComponent(game)}`)
  .then(res => res.json())
  .then(data => {
    const coachList = document.getElementById("coach-list");
    coachList.innerHTML = "";
    data.forEach(coach => {
      const card = document.createElement("div");
      card.className = "coach-card";
      card.innerHTML = `
        <h4>${coach.username} (${coach.rating.toFixed(1)})</h4>
        <p>${coach.biography}</p>
      `;
      coachList.appendChild(card);
    });
  })
  .catch(err => {
    document.getElementById("coach-list").innerHTML =
      "<p style='color:red'>Failed to load coach data.</p>";
    console.error(err);
  });

// ========== Featured YouTube Clips Data ==========
const clipContainer = document.getElementById("clip-container");

const featuredClips = {
  "VALORANT": [
    {
      youtube: "niQTsITVvhQ",
      text: "VALORANT insane moment!"
    },
    {
      youtube: "aPioXO8FarI",
      text: "VALORANT 1v5 clutch!"
    }
  ],
  "FORTNITE": [
    {
      youtube: "96mUw3SYplE",
      text: "FORTNITE creative tournament highlights!"
    },
    {
      youtube: "EXuqhgghPuA",
      text: "FORTNITE World Cup Championship!"
    }
  ],
  "LEAGUE OF LEGENDS": [
    {
      youtube: "85TgQW0afgE",
      text: "LEAGUE Worlds Pentakill!"
    }
  ]
};

/**
 * renderHighlights
 * 
 * Purpose: Dynamically render embedded YouTube video highlights based on the selected game.
 * Parameters:
 *  - game (string): The selected game name from the URL.
 * Returns: None
 */
function renderHighlights(game) {
  const clips = featuredClips[game.toUpperCase()];
  if (!clips) return;

  clips.forEach(clip => {
    const div = document.createElement("div");
    div.className = "video-card";
    div.innerHTML = `
      <iframe 
        width="100%" 
        height="200" 
        src="https://www.youtube.com/embed/${clip.youtube}?autoplay=1&mute=1&loop=1&playlist=${clip.youtube}" 
        frameborder="0" 
        allow="autoplay; encrypted-media" 
        allowfullscreen>
      </iframe>
      <div class="video-info">${clip.text}</div>
    `;
    clipContainer.appendChild(div);
  });
}

// Call to populate highlights on page load
renderHighlights(game);

# 🔄 Game Loop Architecture — Cours complet

## 📌 1. C'est quoi une Game Loop ?

La **Game Loop** est le **cœur de tout jeu vidéo**. C'est une boucle infinie qui tourne en continu et fait 3 choses :

1. **Lire les inputs** (clavier, souris, touch)
2. **Mettre à jour la logique** (positions, collisions, score)
3. **Dessiner le résultat** (render à l'écran)

👉 Sans game loop = pas de jeu. Juste une image statique.

---

## 🧠 2. Pourquoi pas un simple setInterval ?

```js
// ❌ Mauvaise approche
setInterval(() => {
  update();
  render();
}, 1000 / 60);
```

Problèmes :

- `setInterval` ne respecte pas le rythme réel du navigateur
- Pas synchronisé avec le rafraîchissement écran
- Continue en arrière-plan (onglet inactif = gaspillage CPU)
- Dérive dans le temps (accumulation de retard)

👉 Solution : `requestAnimationFrame`

---

## ✅ 3. La Game Loop basique

```js
function gameLoop() {
  update();
  render();
  requestAnimationFrame(gameLoop);
}

gameLoop();
```

- `requestAnimationFrame` = synchronisé avec l'écran (~60 FPS)
- Se met en pause automatiquement si l'onglet est inactif
- Retourne un timestamp utilisable pour le delta time

---

## ⏱️ 4. Delta Time — Le concept clé

### Le problème

Sans delta time, la vitesse du jeu **dépend du FPS** :

- 60 FPS → le carré bouge à 60 pixels/seconde
- 30 FPS → le carré bouge à 30 pixels/seconde

👉 Le jeu tourne 2x plus lent sur un téléphone bas de gamme.

### La solution

```js
let lastTime = 0;

function gameLoop(timestamp) {
  const deltaTime = (timestamp - lastTime) / 1000; // en secondes
  lastTime = timestamp;

  update(deltaTime);
  render();

  requestAnimationFrame(gameLoop);
}

requestAnimationFrame(gameLoop);
```

### Utilisation dans update()

```js
const speed = 200; // pixels par seconde

function update(dt) {
  player.x += speed * dt;
}
```

👉 Maintenant le carré bouge à **200 px/s** peu importe le FPS.

---

## 🏗️ 5. Architecture propre — Séparer logique et rendu

### Principe

```
Input → Update (logique) → Render (dessin)
```

Chaque phase a une responsabilité unique :

| Phase | Rôle | Exemple |
|---|---|---|
| Input | Lire les actions du joueur | Touch, clavier, souris |
| Update | Calculer le nouvel état | Positions, collisions, score |
| Render | Afficher l'état à l'écran | Canvas draw calls |

### Implémentation

```js
// --- STATE ---
const state = {
  player: { x: 50, y: 50, speed: 200 },
  keys: {}
};

// --- INPUT ---
document.addEventListener("keydown", (e) => state.keys[e.key] = true);
document.addEventListener("keyup", (e) => state.keys[e.key] = false);

// --- UPDATE ---
function update(dt) {
  if (state.keys["ArrowRight"]) state.player.x += state.player.speed * dt;
  if (state.keys["ArrowLeft"]) state.player.x -= state.player.speed * dt;
  if (state.keys["ArrowDown"]) state.player.y += state.player.speed * dt;
  if (state.keys["ArrowUp"]) state.player.y -= state.player.speed * dt;
}

// --- RENDER ---
function render() {
  ctx.clearRect(0, 0, canvas.width, canvas.height);
  ctx.fillStyle = "red";
  ctx.fillRect(state.player.x, state.player.y, 40, 40);
}

// --- GAME LOOP ---
let lastTime = 0;

function gameLoop(timestamp) {
  const dt = (timestamp - lastTime) / 1000;
  lastTime = timestamp;

  update(dt);
  render();

  requestAnimationFrame(gameLoop);
}

requestAnimationFrame(gameLoop);
```

---

## 🎮 6. Gestion des états du jeu (Game States)

Un vrai jeu a plusieurs écrans : menu, jeu, pause, game over.

```js
let currentState = "menu";

function update(dt) {
  switch (currentState) {
    case "menu":
      updateMenu(dt);
      break;
    case "playing":
      updateGame(dt);
      break;
    case "gameover":
      updateGameOver(dt);
      break;
  }
}

function render() {
  switch (currentState) {
    case "menu":
      renderMenu();
      break;
    case "playing":
      renderGame();
      break;
    case "gameover":
      renderGameOver();
      break;
  }
}
```

👉 Chaque état a son propre `update()` et `render()`.

---

## 💥 7. Détection de collision (basique)

### AABB — Axis-Aligned Bounding Box

La méthode la plus simple pour deux rectangles :

```js
function collides(a, b) {
  return (
    a.x < b.x + b.width &&
    a.x + a.width > b.x &&
    a.y < b.y + b.height &&
    a.y + a.height > b.y
  );
}
```

### Utilisation dans update()

```js
function update(dt) {
  player.x += player.speed * dt;

  if (collides(player, enemy)) {
    currentState = "gameover";
  }
}
```

---

## 🧩 8. Structure de fichiers (projet propre)

```
/game
├── index.html
├── js/
│   ├── main.js        // Game loop + init
│   ├── state.js        // État global
│   ├── input.js        // Gestion inputs
│   ├── update.js       // Logique de jeu
│   ├── render.js       // Dessin canvas
│   └── collision.js    // Détection collisions
└── assets/
    ├── sprites/
    └── sounds/
```

👉 Pour un playable ad Voodoo : tout dans un seul fichier HTML. Cette structure est pour les projets plus gros.

---

## ⚡ 9. Optimisations performance

- **clearRect** ciblé : ne nettoyer que les zones modifiées (avancé)
- **Object pooling** : réutiliser les objets au lieu d'en créer de nouveaux (évite le garbage collector)
- **Éviter les allocations dans la loop** : pas de `new`, pas de `[]` ou `{}` dans update/render
- **requestAnimationFrame** uniquement : jamais `setInterval` ou `setTimeout`
- **Réduire les draw calls** : grouper les dessins similaires

---

## 🔥 10. Template complet — Mini jeu

```html
<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
    * { margin: 0; padding: 0; }
    canvas { display: block; background: #1a1a2e; }
  </style>
</head>
<body>
<canvas id="canvas"></canvas>
<script>
  const canvas = document.getElementById("canvas");
  const ctx = canvas.getContext("2d");
  canvas.width = window.innerWidth;
  canvas.height = window.innerHeight;

  // State
  const player = { x: canvas.width / 2, y: canvas.height - 60, w: 40, h: 40, speed: 300 };
  const target = { x: 0, y: 0, w: 30, h: 30 };
  let score = 0;
  let keys = {};

  // Input
  document.addEventListener("keydown", (e) => keys[e.key] = true);
  document.addEventListener("keyup", (e) => keys[e.key] = false);

  canvas.addEventListener("touchmove", (e) => {
    e.preventDefault();
    const touch = e.touches[0];
    const rect = canvas.getBoundingClientRect();
    player.x = touch.clientX - rect.left - player.w / 2;
  });

  // Helpers
  function randomTarget() {
    target.x = Math.random() * (canvas.width - target.w);
    target.y = Math.random() * (canvas.height / 2);
  }

  function collides(a, b) {
    return a.x < b.x + b.w && a.x + a.w > b.x &&
           a.y < b.y + b.h && a.y + a.h > b.y;
  }

  // Update
  function update(dt) {
    if (keys["ArrowLeft"]) player.x -= player.speed * dt;
    if (keys["ArrowRight"]) player.x += player.speed * dt;

    // Clamp
    player.x = Math.max(0, Math.min(canvas.width - player.w, player.x));

    // Collision
    if (collides(player, target)) {
      score++;
      randomTarget();
    }
  }

  // Render
  function render() {
    ctx.clearRect(0, 0, canvas.width, canvas.height);

    // Player
    ctx.fillStyle = "#e94560";
    ctx.fillRect(player.x, player.y, player.w, player.h);

    // Target
    ctx.fillStyle = "#0f3460";
    ctx.fillRect(target.x, target.y, target.w, target.h);

    // Score
    ctx.fillStyle = "#fff";
    ctx.font = "20px monospace";
    ctx.fillText("Score: " + score, 10, 30);
  }

  // Game Loop
  let lastTime = 0;
  randomTarget();

  function gameLoop(timestamp) {
    const dt = (timestamp - lastTime) / 1000;
    lastTime = timestamp;

    update(dt);
    render();

    requestAnimationFrame(gameLoop);
  }

  requestAnimationFrame(gameLoop);
</script>
</body>
</html>
```

---

## 🧠 11. Résumé

| Concept | À retenir |
|---|---|
| Game Loop | Boucle infinie : Input → Update → Render |
| requestAnimationFrame | Toujours. Jamais setInterval. |
| Delta Time | Rend le jeu indépendant du FPS |
| Séparation | Logique (update) ≠ Affichage (render) |
| Game States | Switch entre menu / playing / gameover |
| Collision AABB | Méthode simple pour rectangles |
| Performance | Pas d'allocation dans la loop |

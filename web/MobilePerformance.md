# ⚡ Performance Mobile — 60 FPS & Optimisation

## 📌 1. Pourquoi 60 FPS ?

L'écran se rafraîchit **60 fois par seconde**. Chaque frame a un budget de :

```
1000ms / 60 = ~16.6ms par frame
```

👉 Si ton code met plus de 16.6ms à s'exécuter → **frame drop** → saccade visible.

Sur mobile, le CPU est plus faible qu'un PC. Chaque milliseconde compte.

---

## 🧠 2. Le pipeline de rendu du navigateur

Chaque frame, le navigateur fait (dans cet ordre) :

```
JavaScript → Style → Layout → Paint → Composite
```

| Étape | Ce qui se passe | Coût |
|---|---|---|
| JavaScript | Ton code s'exécute | Variable |
| Style | Calcul des CSS | Léger |
| Layout | Calcul des positions/tailles | Lourd |
| Paint | Dessin des pixels | Lourd |
| Composite | Assemblage des couches | Léger |

👉 L'objectif : **éviter de déclencher Layout et Paint** inutilement.

---

## 🚫 3. DOM Manipulation — Le piège principal

### Pourquoi le DOM est lent

Chaque modification du DOM peut déclencher un **reflow** (recalcul Layout) et un **repaint** :

```js
// ❌ Chaque ligne déclenche un reflow
element.style.width = "100px";
element.style.height = "50px";
element.style.left = "200px";
```

### La règle d'or

**Pour un jeu : ne touche JAMAIS au DOM dans la game loop.**

Canvas dessine directement sur un bitmap. Pas de DOM, pas de reflow, pas de repaint.

```js
// ✅ Canvas = zéro DOM manipulation
function render() {
  ctx.clearRect(0, 0, canvas.width, canvas.height);
  ctx.fillRect(player.x, player.y, 40, 40);
}
```

### Si tu dois utiliser le DOM (score, UI)

Mets à jour le DOM **uniquement quand la valeur change**, pas à chaque frame :

```js
// ❌ MAJ DOM à chaque frame
function render() {
  document.getElementById("score").textContent = score;
}

// ✅ MAJ DOM seulement si le score change
let displayedScore = -1;

function render() {
  if (score !== displayedScore) {
    document.getElementById("score").textContent = score;
    displayedScore = score;
  }
}
```

---

## 🗑️ 4. Garbage Collector — L'ennemi invisible

Le **Garbage Collector (GC)** libère la mémoire inutilisée. Quand il tourne → **pause** → frame drop.

### Ce qui déclenche le GC

```js
// ❌ Créer des objets dans la loop
function update(dt) {
  const velocity = { x: speed * dt, y: 0 };  // nouvel objet à chaque frame
  player.x += velocity.x;
}

// ✅ Réutiliser un objet existant
const velocity = { x: 0, y: 0 };

function update(dt) {
  velocity.x = speed * dt;
  velocity.y = 0;
  player.x += velocity.x;
}
```

### Règles anti-GC dans la game loop

- Pas de `new` (pas de `new Object()`, `new Array()`)
- Pas de littéraux `{}` ou `[]`
- Pas de `concat()`, `slice()`, `map()`, `filter()` (ils créent de nouveaux tableaux)
- Pas de string concatenation avec `+`
- Pré-allouer tout avant le lancement du jeu

---

## 🏊 5. Object Pooling

### Le problème

Un jeu crée et détruit des objets en permanence (balles, ennemis, particules). Chaque `new` → allocation mémoire → futur GC.

### La solution : le pool

```js
class Pool {
  constructor(createFn, size) {
    this.available = [];
    this.active = [];
    for (let i = 0; i < size; i++) {
      this.available.push(createFn());
    }
  }

  get() {
    const obj = this.available.pop() || null;
    if (obj) this.active.push(obj);
    return obj;
  }

  release(obj) {
    const idx = this.active.indexOf(obj);
    if (idx > -1) {
      this.active.splice(idx, 1);
      this.available.push(obj);
    }
  }
}
```

### Utilisation

```js
// Créer le pool au démarrage
const bulletPool = new Pool(() => ({ x: 0, y: 0, active: false }), 50);

// Obtenir une balle
function shoot() {
  const bullet = bulletPool.get();
  if (bullet) {
    bullet.x = player.x;
    bullet.y = player.y;
    bullet.active = true;
  }
}

// Rendre la balle au pool
function recycleBullet(bullet) {
  bullet.active = false;
  bulletPool.release(bullet);
}
```

👉 Zéro allocation pendant le jeu.

---

## 🖼️ 6. Optimisations Canvas

### clearRect ciblé

```js
// ❌ Nettoyer tout le canvas
ctx.clearRect(0, 0, canvas.width, canvas.height);

// ✅ Nettoyer uniquement la zone du joueur (avancé)
ctx.clearRect(player.prevX, player.prevY, player.w, player.h);
```

👉 Utile seulement si peu d'éléments bougent. Pour un jeu actif, `clearRect` global est souvent plus simple.

### Réduire les changements d'état

```js
// ❌ Changer fillStyle pour chaque ennemi identique
enemies.forEach(e => {
  ctx.fillStyle = "red";
  ctx.fillRect(e.x, e.y, e.w, e.h);
});

// ✅ Un seul changement de style, puis dessiner tout
ctx.fillStyle = "red";
enemies.forEach(e => {
  ctx.fillRect(e.x, e.y, e.w, e.h);
});
```

### Offscreen Canvas (pré-rendu)

Pour les éléments statiques ou complexes, dessiner une seule fois sur un canvas caché :

```js
const offscreen = document.createElement("canvas");
offscreen.width = 100;
offscreen.height = 100;
const offCtx = offscreen.getContext("2d");

// Dessiner une seule fois
offCtx.fillStyle = "blue";
offCtx.beginPath();
offCtx.arc(50, 50, 40, 0, Math.PI * 2);
offCtx.fill();

// Dans la game loop : copier l'image (très rapide)
function render() {
  ctx.drawImage(offscreen, player.x, player.y);
}
```

👉 `drawImage` d'un canvas est beaucoup plus rapide que re-dessiner des formes complexes.

---

## 📱 7. Spécificités mobile

### Taille du canvas

```js
// Adapter à la densité de pixels
const dpr = window.devicePixelRatio || 1;
canvas.width = window.innerWidth * dpr;
canvas.height = window.innerHeight * dpr;
canvas.style.width = window.innerWidth + "px";
canvas.style.height = window.innerHeight + "px";
ctx.scale(dpr, dpr);
```

👉 Sans ça : rendu flou sur écrans Retina / haute densité.

### Désactiver les comportements par défaut

```js
// Empêcher le zoom, le scroll, le menu contextuel
document.addEventListener("touchmove", (e) => e.preventDefault(), { passive: false });
document.addEventListener("gesturestart", (e) => e.preventDefault());
document.addEventListener("contextmenu", (e) => e.preventDefault());
```

### Meta viewport

```html
<meta name="viewport" content="width=device-width, initial-scale=1.0, 
  maximum-scale=1.0, user-scalable=no">
```

### Throttle les événements touch

`touchmove` peut fire 120+ fois par seconde sur certains appareils :

```js
let lastTouchX = 0;

canvas.addEventListener("touchmove", (e) => {
  e.preventDefault();
  lastTouchX = e.touches[0].clientX;
}, { passive: false });

// Lire lastTouchX dans update(), pas dans l'event handler
function update(dt) {
  player.x = lastTouchX - player.w / 2;
}
```

👉 L'event stocke la valeur, la game loop la consomme. Pas de logique dans le handler.

---

## 🔍 8. Mesurer la performance

### FPS counter maison

```js
let frames = 0;
let fpsTime = 0;
let currentFPS = 0;

function gameLoop(timestamp) {
  frames++;
  if (timestamp - fpsTime >= 1000) {
    currentFPS = frames;
    frames = 0;
    fpsTime = timestamp;
  }

  update(dt);
  render();

  // Afficher le FPS
  ctx.fillStyle = "#0f0";
  ctx.font = "14px monospace";
  ctx.fillText("FPS: " + currentFPS, 10, 20);

  requestAnimationFrame(gameLoop);
}
```

### Chrome DevTools

- **Performance tab** → enregistrer une session → voir les frame drops
- **Rendering tab** → activer "FPS meter" et "Paint flashing"
- **Memory tab** → vérifier les allocations dans la loop

---

## 📋 9. Checklist performance — Playable Ad

| Check | Détail |
|---|---|
| ✅ requestAnimationFrame | Jamais setInterval |
| ✅ Delta time | Jeu indépendant du FPS |
| ✅ Zéro DOM dans la loop | Canvas uniquement |
| ✅ Zéro allocation dans la loop | Pas de new, {}, [] |
| ✅ Object pooling | Pour objets créés/détruits souvent |
| ✅ Un seul fillStyle par groupe | Grouper les draw calls |
| ✅ Offscreen canvas | Pour éléments statiques |
| ✅ devicePixelRatio | Rendu net sur mobile |
| ✅ preventDefault | Pas de scroll/zoom parasite |
| ✅ Touch → variable → loop | Pas de logique dans les handlers |
| ✅ Poids total < 2MB | Contrainte playable ad |

---

## 🧠 10. Résumé

| Concept | Règle |
|---|---|
| Budget par frame | 16.6ms max |
| DOM | Jamais dans la game loop |
| GC | Zéro allocation pendant le jeu |
| Canvas | Grouper les draws, offscreen pour le statique |
| Mobile | devicePixelRatio, preventDefault, throttle touch |
| Mesure | FPS counter + Chrome DevTools |

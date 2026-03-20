# 🎨 HTML5 Canvas API — Guide rapide (pour dev web)

## 📌 1. C'est quoi Canvas ?

**Canvas** est une **API JavaScript intégrée au navigateur** qui permet de **dessiner des graphiques** dans une page web.

👉 Contrairement au HTML/CSS, tu dessines **pixel par pixel** avec du JavaScript.

---

## 🧠 2. API Canvas vs API HTTP

| Type d'API | Usage |
|---|---|
| API HTTP | Communiquer avec un serveur |
| Canvas API | Dessiner dans le navigateur |

👉 Canvas = API locale (pas de réseau)

---

## 🧩 3. Comment ça marche ?

### Étape 1 : créer un canvas

```html
<canvas id="canvas" width="300" height="150"></canvas>
```

### Étape 2 : récupérer le contexte

```js
const canvas = document.getElementById("canvas");
const ctx = canvas.getContext("2d");
```

👉 `ctx` = ton outil pour dessiner

---

## ✏️ 4. Dessiner des formes

### Rectangle

```js
ctx.fillStyle = "blue";
ctx.fillRect(10, 10, 100, 50);
```

### Cercle

```js
ctx.beginPath();
ctx.arc(100, 75, 50, 0, Math.PI * 2);
ctx.fill();
```

### Ligne

```js
ctx.beginPath();
ctx.moveTo(0, 0);
ctx.lineTo(200, 100);
ctx.stroke();
```

---

## 🧭 5. Système de coordonnées

- Origine = (0, 0) en haut à gauche
- X → horizontal (droite)
- Y → vertical (bas)

---

## 🎞️ 6. Animation (Game Loop)

```js
function draw() {
  ctx.clearRect(0, 0, canvas.width, canvas.height);

  ctx.fillRect(10, 10, 50, 50);

  requestAnimationFrame(draw);
}

draw();
```

👉 `requestAnimationFrame` = boucle fluide (60 FPS)

---

## 🎮 7. Cas d'usage

- Jeux (hyper-casual)
- Playable ads
- Animations
- Graphiques (charts)
- Outils de dessin

---

## ⚡ 8. Bonnes pratiques

- Toujours utiliser `clearRect` pour nettoyer
- Séparer logique et rendu
- Optimiser les redraws
- Utiliser `requestAnimationFrame` (pas setInterval)

---

## 🔥 9. Mini projet (idée test technique)

👉 Objectif : faire un carré qui bouge

```js
let x = 0;

function draw() {
  ctx.clearRect(0, 0, canvas.width, canvas.height);

  ctx.fillRect(x, 50, 50, 50);
  x += 2;

  requestAnimationFrame(draw);
}

draw();
```

---

## 🧠 10. Résumé

- Canvas = API JS pour dessiner
- Pas un framework
- Utilisé pour jeux et animations
- Très utile pour tests techniques (type playable ads)

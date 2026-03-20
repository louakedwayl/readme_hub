# 🪶 Asset-Light Design — Zéro sprites, maximum impact

## 📌 1. C'est quoi l'Asset-Light Design ?

Créer des visuels **sans images externes** : tout est généré par **code** (Canvas, CSS, SVG).

👉 Pourquoi ? Les playable ads ont une contrainte de poids : **< 2MB total**. Chaque PNG/JPEG pèse lourd. Le code pèse presque rien.

| Approche | Poids | Flexibilité |
|---|---|---|
| Sprite PNG 200x200 | ~15-50 KB | Fixe |
| Même visuel en code | ~0.2 KB | Dynamique, animable |

---

## 🎨 2. Dessiner avec Canvas — Remplacer les sprites

### Cercle (joueur, balle, ennemi)

```js
function drawCircle(x, y, radius, color) {
  ctx.beginPath();
  ctx.arc(x, y, radius, 0, Math.PI * 2);
  ctx.fillStyle = color;
  ctx.fill();
}
```

### Étoile

```js
function drawStar(cx, cy, spikes, outerR, innerR, color) {
  ctx.beginPath();
  let rot = Math.PI / 2 * 3;
  const step = Math.PI / spikes;

  ctx.moveTo(cx, cy - outerR);
  for (let i = 0; i < spikes; i++) {
    ctx.lineTo(cx + Math.cos(rot) * outerR, cy + Math.sin(rot) * outerR);
    rot += step;
    ctx.lineTo(cx + Math.cos(rot) * innerR, cy + Math.sin(rot) * innerR);
    rot += step;
  }
  ctx.closePath();
  ctx.fillStyle = color;
  ctx.fill();
}

// Usage
drawStar(100, 100, 5, 30, 15, "#FFD700");
```

### Triangle

```js
function drawTriangle(x, y, size, color) {
  ctx.beginPath();
  ctx.moveTo(x, y - size);
  ctx.lineTo(x - size, y + size);
  ctx.lineTo(x + size, y + size);
  ctx.closePath();
  ctx.fillStyle = color;
  ctx.fill();
}
```

### Rectangle arrondi

```js
function drawRoundRect(x, y, w, h, radius, color) {
  ctx.beginPath();
  ctx.moveTo(x + radius, y);
  ctx.lineTo(x + w - radius, y);
  ctx.quadraticCurveTo(x + w, y, x + w, y + radius);
  ctx.lineTo(x + w, y + h - radius);
  ctx.quadraticCurveTo(x + w, y + h, x + w - radius, y + h);
  ctx.lineTo(x + radius, y + h);
  ctx.quadraticCurveTo(x, y + h, x, y + h - radius);
  ctx.lineTo(x, y + radius);
  ctx.quadraticCurveTo(x, y, x + radius, y);
  ctx.closePath();
  ctx.fillStyle = color;
  ctx.fill();
}
```

---

## 🌈 3. Gradients Canvas

### Gradient linéaire

```js
const gradient = ctx.createLinearGradient(0, 0, canvas.width, 0);
gradient.addColorStop(0, "#e94560");
gradient.addColorStop(1, "#0f3460");

ctx.fillStyle = gradient;
ctx.fillRect(0, 0, canvas.width, canvas.height);
```

### Gradient radial

```js
const gradient = ctx.createRadialGradient(
  canvas.width / 2, canvas.height / 2, 10,  // centre intérieur, rayon
  canvas.width / 2, canvas.height / 2, 200   // centre extérieur, rayon
);
gradient.addColorStop(0, "#fff");
gradient.addColorStop(1, "#1a1a2e");

ctx.fillStyle = gradient;
ctx.fillRect(0, 0, canvas.width, canvas.height);
```

### Gradient sur une forme

```js
function drawGradientCircle(x, y, radius) {
  const grad = ctx.createRadialGradient(x, y, 0, x, y, radius);
  grad.addColorStop(0, "#ff6b6b");
  grad.addColorStop(1, "#c0392b");

  ctx.beginPath();
  ctx.arc(x, y, radius, 0, Math.PI * 2);
  ctx.fillStyle = grad;
  ctx.fill();
}
```

👉 Un cercle avec gradient > un cercle plat. Effet 3D gratuit.

---

## ⚡ 4. Optimisation — Pré-calculer les gradients

Les gradients sont coûteux à créer. Ne pas les recréer à chaque frame :

```js
// ❌ Recréer à chaque frame
function render() {
  const grad = ctx.createLinearGradient(0, 0, 200, 0);
  grad.addColorStop(0, "red");
  grad.addColorStop(1, "blue");
  ctx.fillStyle = grad;
  ctx.fillRect(0, 0, 200, 50);
}

// ✅ Créer une seule fois
const bgGradient = ctx.createLinearGradient(0, 0, 200, 0);
bgGradient.addColorStop(0, "red");
bgGradient.addColorStop(1, "blue");

function render() {
  ctx.fillStyle = bgGradient;
  ctx.fillRect(0, 0, 200, 50);
}
```

---

## 🎭 5. Ombres et effets

### Ombre portée

```js
ctx.shadowColor = "rgba(0, 0, 0, 0.5)";
ctx.shadowBlur = 10;
ctx.shadowOffsetX = 4;
ctx.shadowOffsetY = 4;

ctx.fillStyle = "#e94560";
ctx.fillRect(50, 50, 100, 60);

// Désactiver après usage
ctx.shadowColor = "transparent";
```

⚠️ Les ombres sont **très coûteuses** sur mobile. Utiliser avec parcimonie ou pré-rendre sur un offscreen canvas.

### Glow (lueur)

```js
ctx.shadowColor = "#00ff88";
ctx.shadowBlur = 20;

ctx.fillStyle = "#00ff88";
ctx.beginPath();
ctx.arc(100, 100, 20, 0, Math.PI * 2);
ctx.fill();

ctx.shadowColor = "transparent";
```

### Outline (contour)

```js
function drawOutlinedCircle(x, y, radius, fillColor, strokeColor, lineWidth) {
  ctx.beginPath();
  ctx.arc(x, y, radius, 0, Math.PI * 2);
  ctx.fillStyle = fillColor;
  ctx.fill();
  ctx.strokeStyle = strokeColor;
  ctx.lineWidth = lineWidth;
  ctx.stroke();
}

drawOutlinedCircle(100, 100, 30, "#e94560", "#fff", 3);
```

---

## 🔤 6. Typographie comme visuel

Pas besoin de sprites pour du texte stylé :

### Texte avec ombre

```js
function drawStyledText(text, x, y, size, color) {
  ctx.font = `bold ${size}px Arial`;
  
  // Ombre
  ctx.fillStyle = "rgba(0,0,0,0.3)";
  ctx.fillText(text, x + 2, y + 2);
  
  // Texte
  ctx.fillStyle = color;
  ctx.fillText(text, x, y);
}
```

### Texte centré

```js
function drawCenteredText(text, y, size, color) {
  ctx.font = `bold ${size}px Arial`;
  ctx.fillStyle = color;
  ctx.textAlign = "center";
  ctx.fillText(text, canvas.width / 2, y);
  ctx.textAlign = "start"; // reset
}
```

### Texte avec outline

```js
function drawOutlinedText(text, x, y, size, fillColor, strokeColor) {
  ctx.font = `bold ${size}px Arial`;
  ctx.strokeStyle = strokeColor;
  ctx.lineWidth = 4;
  ctx.strokeText(text, x, y);
  ctx.fillStyle = fillColor;
  ctx.fillText(text, x, y);
}
```

---

## 🧱 7. Construire des personnages en code

### Personnage simple (bonhomme)

```js
function drawCharacter(x, y, color) {
  // Tête
  ctx.beginPath();
  ctx.arc(x, y - 25, 15, 0, Math.PI * 2);
  ctx.fillStyle = color;
  ctx.fill();

  // Corps
  ctx.fillRect(x - 10, y - 10, 20, 30);

  // Yeux
  ctx.fillStyle = "#fff";
  ctx.beginPath();
  ctx.arc(x - 5, y - 28, 3, 0, Math.PI * 2);
  ctx.arc(x + 5, y - 28, 3, 0, Math.PI * 2);
  ctx.fill();

  // Pupilles
  ctx.fillStyle = "#000";
  ctx.beginPath();
  ctx.arc(x - 4, y - 27, 1.5, 0, Math.PI * 2);
  ctx.arc(x + 6, y - 27, 1.5, 0, Math.PI * 2);
  ctx.fill();
}
```

### Bouton (CTA — Call to Action)

Indispensable dans une playable ad :

```js
function drawButton(x, y, w, h, text) {
  // Fond avec gradient
  const grad = ctx.createLinearGradient(x, y, x, y + h);
  grad.addColorStop(0, "#4CAF50");
  grad.addColorStop(1, "#388E3C");

  // Rectangle arrondi
  const r = 10;
  ctx.beginPath();
  ctx.moveTo(x + r, y);
  ctx.lineTo(x + w - r, y);
  ctx.quadraticCurveTo(x + w, y, x + w, y + r);
  ctx.lineTo(x + w, y + h - r);
  ctx.quadraticCurveTo(x + w, y + h, x + w - r, y + h);
  ctx.lineTo(x + r, y + h);
  ctx.quadraticCurveTo(x, y + h, x, y + h - r);
  ctx.lineTo(x, y + r);
  ctx.quadraticCurveTo(x, y, x + r, y);
  ctx.closePath();

  ctx.fillStyle = grad;
  ctx.fill();

  // Texte
  ctx.fillStyle = "#fff";
  ctx.font = "bold 18px Arial";
  ctx.textAlign = "center";
  ctx.fillText(text, x + w / 2, y + h / 2 + 6);
  ctx.textAlign = "start";
}

// Usage
drawButton(canvas.width / 2 - 75, canvas.height - 80, 150, 50, "PLAY NOW");
```

---

## 🎲 8. Particules — Sans sprites

Les particules donnent un effet de polish énorme pour zéro poids :

```js
// Pré-allouer le pool
const particles = [];
for (let i = 0; i < 50; i++) {
  particles.push({ x: 0, y: 0, vx: 0, vy: 0, life: 0, maxLife: 0, color: "", active: false });
}

function emitParticles(x, y, count, color) {
  let spawned = 0;
  for (const p of particles) {
    if (!p.active && spawned < count) {
      p.x = x;
      p.y = y;
      p.vx = (Math.random() - 0.5) * 200;
      p.vy = (Math.random() - 0.5) * 200;
      p.life = 0;
      p.maxLife = 0.5 + Math.random() * 0.5;
      p.color = color;
      p.active = true;
      spawned++;
    }
  }
}

function updateParticles(dt) {
  for (const p of particles) {
    if (!p.active) continue;
    p.x += p.vx * dt;
    p.y += p.vy * dt;
    p.life += dt;
    if (p.life >= p.maxLife) p.active = false;
  }
}

function renderParticles() {
  for (const p of particles) {
    if (!p.active) continue;
    const alpha = 1 - (p.life / p.maxLife);
    ctx.globalAlpha = alpha;
    ctx.fillStyle = p.color;
    ctx.fillRect(p.x - 3, p.y - 3, 6, 6);
  }
  ctx.globalAlpha = 1;
}
```

👉 Object pooling intégré. Zéro allocation. Effet visuel pro.

---

## 🎨 9. Palettes de couleurs — Avoir l'air pro

Pas besoin de designer. Utilise des palettes éprouvées :

### Hyper-casual classique

```js
const COLORS = {
  bg: "#1a1a2e",
  primary: "#e94560",
  secondary: "#0f3460",
  accent: "#16213e",
  text: "#ffffff"
};
```

### Pastel (puzzle games)

```js
const COLORS = {
  bg: "#fdf6e3",
  primary: "#ff6b6b",
  secondary: "#4ecdc4",
  accent: "#ffe66d",
  text: "#2c3e50"
};
```

### Neon (arcade)

```js
const COLORS = {
  bg: "#0d0d0d",
  primary: "#00ff88",
  secondary: "#ff00ff",
  accent: "#00e5ff",
  text: "#ffffff"
};
```

👉 Choisir 4-5 couleurs max. Les appliquer partout de manière cohérente.

---

## 📐 10. Background dynamique — Sans image

### Grille

```js
function drawGrid(spacing, color) {
  ctx.strokeStyle = color;
  ctx.lineWidth = 0.5;

  for (let x = 0; x < canvas.width; x += spacing) {
    ctx.beginPath();
    ctx.moveTo(x, 0);
    ctx.lineTo(x, canvas.height);
    ctx.stroke();
  }
  for (let y = 0; y < canvas.height; y += spacing) {
    ctx.beginPath();
    ctx.moveTo(0, y);
    ctx.lineTo(canvas.width, y);
    ctx.stroke();
  }
}

// Usage
drawGrid(30, "rgba(255,255,255,0.05)");
```

### Ciel étoilé

```js
// Générer une fois au démarrage
const stars = [];
for (let i = 0; i < 100; i++) {
  stars.push({
    x: Math.random() * canvas.width,
    y: Math.random() * canvas.height,
    r: Math.random() * 2
  });
}

function drawStars() {
  ctx.fillStyle = "#fff";
  for (const s of stars) {
    ctx.beginPath();
    ctx.arc(s.x, s.y, s.r, 0, Math.PI * 2);
    ctx.fill();
  }
}
```

### Dégradé animé (subtle)

```js
let hue = 0;

function drawAnimatedBg() {
  hue = (hue + 0.1) % 360;
  const grad = ctx.createLinearGradient(0, 0, 0, canvas.height);
  grad.addColorStop(0, `hsl(${hue}, 50%, 10%)`);
  grad.addColorStop(1, `hsl(${hue + 40}, 50%, 5%)`);
  ctx.fillStyle = grad;
  ctx.fillRect(0, 0, canvas.width, canvas.height);
}
```

⚠️ Recréer un gradient à chaque frame = coûteux. Utiliser un offscreen canvas si le background ne change pas souvent.

---

## 📋 11. Checklist Asset-Light

| Check | Détail |
|---|---|
| ✅ Zéro fichier image | Tout en code |
| ✅ Palette cohérente | 4-5 couleurs max |
| ✅ Gradients pré-calculés | Créés une seule fois |
| ✅ Formes réutilisables | Fonctions drawCircle, drawRect, etc. |
| ✅ Particules avec pool | Effet visuel, zéro allocation |
| ✅ Texte stylé | Ombres, outlines, centré |
| ✅ Background en code | Grille, étoiles, gradient |
| ✅ Bouton CTA en code | Gradient + rounded rect + texte |
| ✅ Poids total < 2MB | Vérifier avec DevTools Network |

---

## 🧠 12. Résumé

| Concept | Règle |
|---|---|
| Sprites | Remplacer par des formes Canvas |
| Couleurs | Gradients > couleurs plates |
| Effets | Ombres avec parcimonie, glow pour l'accent |
| Texte | Police système (Arial), stylé en code |
| Particules | Pool pré-alloué, petits rectangles |
| Background | Généré en code, jamais une image |
| Poids | Objectif : < 200 KB pour le code complet |

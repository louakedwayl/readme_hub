# `getBoundingClientRect()`

## Introduction

`getBoundingClientRect()` est une méthode JavaScript fondamentale pour travailler avec les positions et dimensions d'éléments HTML. Elle est essentielle pour :
- Détecter des collisions
- Créer des animations
- Positionner des éléments dynamiquement
- Gérer des interactions utilisateur avancées

---

## 1. Syntaxe de base

```javascript
const rect = element.getBoundingClientRect();
```

**Retourne** : Un objet `DOMRect` contenant les informations de position et de taille.

---

## 2. Propriétés retournées

### Structure de l'objet DOMRect

```javascript
{
  top: number,      // Distance entre le haut de l'élément et le haut de la fenêtre
  bottom: number,   // Distance entre le haut de la fenêtre et le bas de l'élément
  left: number,     // Distance entre la gauche de l'élément et la gauche de la fenêtre
  right: number,    // Distance entre la gauche de la fenêtre et le bord droit de l'élément
  width: number,    // Largeur de l'élément (inclut padding et border)
  height: number,   // Hauteur de l'élément (inclut padding et border)
  x: number,        // Alias de left
  y: number         // Alias de top
}
```

### Exemple pratique

```javascript
const box = document.querySelector('.box');
const rect = box.getBoundingClientRect();

console.log(`Position X: ${rect.x}px`);
console.log(`Position Y: ${rect.y}px`);
console.log(`Largeur: ${rect.width}px`);
console.log(`Hauteur: ${rect.height}px`);
```

---

## 3. Schéma explicatif

```
┌──────────────────── Viewport (Fenêtre) ────────────────────┐
│                                                             │
│  (0, 0) ← Origine                                          │
│                                                             │
│      left: 100px                                           │
│      ↓                                                      │
│      ┌─────────────────────┐  ← top: 50px                 │
│      │                     │                               │
│      │    Mon Élément      │  height: 80px                │
│      │    (DOMRect)        │                               │
│      │                     │                               │
│      └─────────────────────┘                               │
│           width: 200px                                     │
│                                                             │
│      bottom = top + height = 130px                        │
│      right = left + width = 300px                         │
│                                                             │
└─────────────────────────────────────────────────────────────┘
```

---

## 4. Calculs utiles

### Centre de l'élément

```javascript
const rect = element.getBoundingClientRect();

const centerX = rect.left + (rect.width / 2);
const centerY = rect.top + (rect.height / 2);

console.log(`Centre: (${centerX}, ${centerY})`);
```

### Distance entre deux éléments

```javascript
const rect1 = element1.getBoundingClientRect();
const rect2 = element2.getBoundingClientRect();

const distanceX = Math.abs(rect1.left - rect2.left);
const distanceY = Math.abs(rect1.top - rect2.top);

console.log(`Distance: ${distanceX}px horizontale, ${distanceY}px verticale`);
```

---

## 5. Détection de collision

### Collision simple (rectangles)

```javascript
function isColliding(rect1, rect2) {
  return !(
    rect1.right < rect2.left ||   // rect1 est à gauche de rect2
    rect1.left > rect2.right ||   // rect1 est à droite de rect2
    rect1.bottom < rect2.top ||   // rect1 est au-dessus de rect2
    rect1.top > rect2.bottom      // rect1 est en dessous de rect2
  );
}

// Utilisation
const ball = document.querySelector('.ball').getBoundingClientRect();
const paddle = document.querySelector('.paddle').getBoundingClientRect();

if (isColliding(ball, paddle)) {
  console.log('Collision détectée !');
}
```

### Collision avec les bords de l'écran

```javascript
const element = document.querySelector('.element');
const rect = element.getBoundingClientRect();

// Touche le haut
if (rect.top <= 0) {
  console.log('Collision avec le haut !');
}

// Touche le bas
if (rect.bottom >= window.innerHeight) {
  console.log('Collision avec le bas !');
}

// Touche la gauche
if (rect.left <= 0) {
  console.log('Collision avec la gauche !');
}

// Touche la droite
if (rect.right >= window.innerWidth) {
  console.log('Collision avec la droite !');
}
```

---

## 6. Points importants à retenir

### ✅ Avantages

- **Précis** : Donne la position réelle à l'écran
- **Tient compte des transformations CSS** (translate, scale, rotate)
- **Tient compte du scroll** : Les valeurs changent quand on scrolle
- **Inclut padding et border** dans les dimensions

### ⚠️ Points d'attention

1. **Performance** : Appeler `getBoundingClientRect()` est relativement coûteux. Dans une boucle d'animation, stockez le résultat si possible.

```javascript
// ❌ Mauvais
function animate() {
  const rect = element.getBoundingClientRect(); // Appelé à chaque frame
  // ...
  requestAnimationFrame(animate);
}

// ✅ Mieux (si l'élément ne change pas)
const rect = element.getBoundingClientRect();
function animate() {
  // Utilise rect
  requestAnimationFrame(animate);
}
```

2. **Le scroll affecte les valeurs** : Si la page est scrollée, `top` et `left` changent.

3. **Relatif à la fenêtre, pas au document** : Les coordonnées sont relatives au viewport visible.

---

## 7. Position absolue dans le document

Si tu veux la position par rapport au document complet (et non la fenêtre) :

```javascript
const rect = element.getBoundingClientRect();

const absoluteTop = rect.top + window.scrollY;
const absoluteLeft = rect.left + window.scrollX;

console.log(`Position dans le document: (${absoluteLeft}, ${absoluteTop})`);
```

---

## 8. Cas d'usage pratiques

### A. Tooltip qui suit un élément

```javascript
function positionTooltip(targetElement, tooltip) {
  const rect = targetElement.getBoundingClientRect();
  
  tooltip.style.position = 'fixed';
  tooltip.style.left = `${rect.left}px`;
  tooltip.style.top = `${rect.bottom + 10}px`; // 10px sous l'élément
}
```

### B. Vérifier si un élément est visible à l'écran

```javascript
function isInViewport(element) {
  const rect = element.getBoundingClientRect();
  
  return (
    rect.top >= 0 &&
    rect.left >= 0 &&
    rect.bottom <= window.innerHeight &&
    rect.right <= window.innerWidth
  );
}
```

### C. Animation au scroll (effet parallaxe)

```javascript
window.addEventListener('scroll', () => {
  const element = document.querySelector('.parallax');
  const rect = element.getBoundingClientRect();
  
  // Calcule le pourcentage de visibilité
  const percentVisible = (window.innerHeight - rect.top) / window.innerHeight;
  
  // Applique une transformation
  element.style.transform = `translateY(${percentVisible * 50}px)`;
});
```

### D. Drag and Drop

```javascript
let isDragging = false;
let offsetX, offsetY;

element.addEventListener('mousedown', (e) => {
  isDragging = true;
  const rect = element.getBoundingClientRect();
  offsetX = e.clientX - rect.left;
  offsetY = e.clientY - rect.top;
});

document.addEventListener('mousemove', (e) => {
  if (isDragging) {
    element.style.left = `${e.clientX - offsetX}px`;
    element.style.top = `${e.clientY - offsetY}px`;
  }
});

document.addEventListener('mouseup', () => {
  isDragging = false;
});
```

---

## 9. Exemple complet : Jeu Pong

```javascript
const ball = document.querySelector('.ball');
const screen = document.querySelector('.game-screen');

let ballX = 0;
let ballY = 0;
let speedX = 2;
let speedY = 2;

function animate() {
  // Déplace la balle
  ballX += speedX;
  ballY += speedY;
  
  // Récupère les positions
  const ballRect = ball.getBoundingClientRect();
  const screenRect = screen.getBoundingClientRect();
  
  // Rebond horizontal
  if (ballRect.right >= screenRect.right || ballRect.left <= screenRect.left) {
    speedX = -speedX;
  }
  
  // Rebond vertical
  if (ballRect.bottom >= screenRect.bottom || ballRect.top <= screenRect.top) {
    speedY = -speedY;
  }
  
  // Applique la position
  ball.style.transform = `translate(${ballX}px, ${ballY}px)`;
  
  requestAnimationFrame(animate);
}

animate();
```

---

## 10. Alternatives et comparaison

### `offsetTop` / `offsetLeft`

```javascript
// Position relative au parent positionné
const offsetTop = element.offsetTop;
const offsetLeft = element.offsetLeft;
```

**Différence** : Ces propriétés donnent la position par rapport au parent positionné (position: relative/absolute), pas par rapport à la fenêtre.

### `clientWidth` / `clientHeight`

```javascript
const width = element.clientWidth;   // Sans bordures
const height = element.clientHeight; // Sans bordures
```

**Différence** : N'incluent pas les bordures (contrairement à `getBoundingClientRect()`).

---

## 11. Exercices pratiques

### Exercice 1 : Indicateur de scroll
Crée une barre de progression qui se remplit en fonction du scroll de la page.

### Exercice 2 : Zone de drop
Crée une zone où on peut déposer des éléments, avec détection de collision.

### Exercice 3 : Zoom sur hover
Quand la souris survole un élément, affiche une version agrandie à côté.

### Exercice 4 : Jeu du serpent
Utilise `getBoundingClientRect()` pour détecter quand le serpent mange la nourriture.

---

## Conclusion

`getBoundingClientRect()` est un outil puissant pour :
- Connaître la position exacte d'un élément
- Détecter des collisions
- Créer des interactions avancées
- Gérer des animations complexes

Maîtrise cette méthode et tu pourras créer des interfaces dynamiques et des jeux web impressionnants ! 🚀

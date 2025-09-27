# Comprendre `requestAnimationFrame` en JavaScript

## 1. Qu'est-ce que `requestAnimationFrame` ?

`requestAnimationFrame` est une méthode JavaScript utilisée pour **planifier des animations** dans le navigateur.
Elle indique au navigateur : *"Je veux effectuer une animation. Appelle cette fonction avant le prochain rendu de l’écran."*

Cette méthode est **plus efficace que `setTimeout` ou `setInterval`** pour les animations, car le navigateur peut **optimiser le rendu des images**, assurant des animations plus fluides et une consommation CPU réduite.

---

## 2. Comment ça fonctionne

Quand on utilise `requestAnimationFrame`, on passe une **fonction de rappel (callback)** qui sera exécutée **juste avant le prochain repaint de l’écran** :

```javascript
function animate() {
    // Mettre à jour l'état de l'animation (position, couleur, etc.)
    console.log("Frame rendue");

    // Demander la prochaine frame
    requestAnimationFrame(animate);
}

// Démarrer l'animation
requestAnimationFrame(animate);
```

* La callback s’exécute à la **fréquence de rafraîchissement de l’écran** (souvent 60 images par seconde).
* Le navigateur peut **mettre l’animation en pause** si l’onglet n’est pas visible, économisant CPU et batterie.

---

## 3. Pourquoi utiliser `requestAnimationFrame` ?

### Avantages par rapport à `setTimeout` ou `setInterval` :

1. **Animations fluides**
   Le navigateur synchronise l’animation avec son cycle de rendu.
2. **Meilleures performances**
   Évite les calculs inutiles lorsque la page n’est pas visible.
3. **Fréquence d’images adaptative**
   Si l’appareil ne peut pas rendre 60fps, le navigateur ajuste automatiquement la fréquence.

---

## 4. Exemples courants

### Déplacer un élément de façon fluide

```javascript
const box = document.querySelector(".box");
let position = 0;

function moveBox() {
    position += 2; // déplacer de 2px par frame
    box.style.transform = `translateX(${position}px)`;

    if (position < 300) { // s'arrêter à 300px
        requestAnimationFrame(moveBox);
    }
}

requestAnimationFrame(moveBox);
```

### Utiliser un timestamp pour une animation précise

```javascript
let start = null;

function step(timestamp) {
    if (!start) start = timestamp;
    const progress = timestamp - start;

    box.style.transform = `translateX(${Math.min(progress / 10, 300)}px)`;

    if (progress < 3000) { // exécuter pendant 3 secondes
        requestAnimationFrame(step);
    }
}

requestAnimationFrame(step);
```

---

## 5. Bonnes pratiques

1. **Annuler les animations si elles ne sont plus nécessaires**

```javascript
let id = requestAnimationFrame(animate);
cancelAnimationFrame(id);
```

2. **Utiliser `requestAnimationFrame` pour toutes les animations basées sur les frames** au lieu de `setTimeout`.
3. **Combiner avec les transformations CSS** pour des performances optimales (GPU accéléré).

---

## 6. Résumé

* `requestAnimationFrame` est la **méthode recommandée pour les animations JavaScript**.
* Elle **synchronise les animations avec le rendu du navigateur**.
* Elle **économise CPU et batterie** en mettant en pause les animations hors écran.
* À utiliser pour des animations fluides et efficaces.

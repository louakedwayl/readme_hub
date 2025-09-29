# `cancelAnimationFrame` en JavaScript

## 1. Introduction

En JavaScript, l’API `requestAnimationFrame` permet de créer des animations fluides en synchronisant l’exécution d’une fonction avec le **rafraîchissement de l’écran** (souvent ~60 FPS).

Mais parfois, il est nécessaire **d’arrêter** une animation en cours.  
C’est là qu’intervient la fonction **`cancelAnimationFrame`**.

---

## 2. Syntaxe

```js
cancelAnimationFrame(id);
```

- **`id`** : l’identifiant numérique renvoyé par `requestAnimationFrame`.

---

## 3. Fonctionnement

1. Quand on appelle `requestAnimationFrame(callback)`, le navigateur retourne un **ID** unique.
2. Cet ID sert à annuler la future exécution de `callback`.
3. Avec `cancelAnimationFrame(id)`, on empêche l’appel de la fonction prévue.

---

## 4. Exemple simple

```js
let animationId;

function bouger() {
  const element = document.getElementById("carre");
  const left = parseInt(element.style.left || 0, 10);
  element.style.left = left + 2 + "px";

  // Boucle : planifier le prochain appel
  animationId = requestAnimationFrame(bouger);
}

// Lancer l'animation
document.getElementById("start").addEventListener("click", () => {
  animationId = requestAnimationFrame(bouger);
});

// Stopper l'animation
document.getElementById("stop").addEventListener("click", () => {
  cancelAnimationFrame(animationId);
});
```

Ici :
- `start` → démarre l’animation.
- `stop` → interrompt immédiatement l’animation.

---

## 5. Cas d’usage

- **Arrêter une animation au clic d’un bouton.**
- **Stopper un jeu** (ex: pause).
- **Économiser des ressources** quand l’élément n’est plus visible.
- **Empêcher les animations multiples en double**.

---

## 6. Différence avec `clearInterval`

- `clearInterval` s’utilise pour **arrêter un `setInterval`**.
- `cancelAnimationFrame` s’utilise uniquement avec **`requestAnimationFrame`**.
- `requestAnimationFrame` est généralement **plus performant** car optimisé par le navigateur.

---

## 7. Bonnes pratiques

✅ Toujours stocker l’ID retourné par `requestAnimationFrame`.  
✅ Annuler l’animation quand elle n’est plus nécessaire.  
✅ Utiliser `cancelAnimationFrame` dans des événements comme `blur`, `visibilitychange`, ou lors du `cleanup` dans React/Vue.  

---

## 8. Schéma simplifié

```
requestAnimationFrame → renvoie un ID → cancelAnimationFrame(ID) stoppe l’animation
```

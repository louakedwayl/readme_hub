# 👆 Touch Events — Guide rapide

## 📌 1. C'est quoi ?

Les **Touch Events** sont des événements JavaScript déclenchés par les **interactions tactiles** (smartphone, tablette).

👉 Indispensable pour les jeux mobiles et les playable ads.

---

## 🧠 2. Les 4 événements principaux

| Événement | Quand ? |
|---|---|
| `touchstart` | Le doigt touche l'écran |
| `touchmove` | Le doigt glisse sur l'écran |
| `touchend` | Le doigt quitte l'écran |
| `touchcancel` | Le touch est interrompu (notification, etc.) |

---

## 🧩 3. Usage basique

```js
canvas.addEventListener("touchstart", (e) => {
  e.preventDefault();
  const touch = e.touches[0];
  console.log(touch.clientX, touch.clientY);
});
```

👉 `e.touches[0]` = premier doigt sur l'écran

---

## 📍 4. Récupérer la position sur le Canvas

```js
function getTouchPos(canvas, e) {
  const rect = canvas.getBoundingClientRect();
  const touch = e.touches[0];
  return {
    x: touch.clientX - rect.left,
    y: touch.clientY - rect.top
  };
}
```

---

## ⚡ 5. Bonnes pratiques

- Toujours appeler `e.preventDefault()` pour bloquer le scroll/zoom
- Utiliser `touches[0]` pour le premier doigt
- Tester sur mobile réel (le simulateur ment parfois)
- Prévoir un fallback souris pour desktop

---

## 🖱️ 6. Fallback souris

```js
// Touch
canvas.addEventListener("touchstart", handleStart);

// Souris (desktop)
canvas.addEventListener("mousedown", handleStart);
```

👉 Un jeu mobile-first doit gérer les deux.

---

## 🧠 7. Résumé

- `touchstart` / `touchmove` / `touchend` = les 3 essentiels
- `e.touches[0]` = position du doigt
- Toujours `preventDefault()` pour éviter les comportements par défaut
- Toujours prévoir le fallback souris

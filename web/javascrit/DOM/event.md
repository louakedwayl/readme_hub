# 🎯 Les Événements en JavaScript

En JavaScript, un **événement** est une action qui se produit dans le navigateur, déclenchée par l’utilisateur ou le système, et qui peut être **écoutée** via un **Event Listener**.

---

## 1️⃣ Mouse Events (Événements souris)

Ces événements sont liés aux interactions avec une souris.

| Événement       | Description                                  |
|-----------------|----------------------------------------------|
| `click`         | Clic sur un élément                           |
| `dblclick`      | Double clic                                   |
| `mousedown`     | Bouton de souris enfoncé                     |
| `mouseup`       | Bouton de souris relâché                      |
| `mousemove`     | Déplacement de la souris                      |
| `mouseenter`    | La souris entre sur un élément (pas de bubbling) |
| `mouseleave`    | La souris quitte un élément (pas de bubbling) |
| `mouseover`     | La souris survole un élément                  |
| `mouseout`      | La souris sort d’un élément                   |
| `contextmenu`   | Clic droit pour ouvrir le menu contextuel     |

**Exemple :**
```js
element.addEventListener("click", () => {
  console.log("Élément cliqué !");
});
```

---

## 2️⃣ Keyboard Events (Événements clavier)

Ces événements sont déclenchés par l’utilisation du clavier.

| Événement   | Description                        |
|-------------|------------------------------------|
| `keydown`   | Une touche est enfoncée             |
| `keyup`     | Une touche est relâchée             |
| `keypress`  | Une touche est enfoncée (obsolète) |

**Exemple :**
```js
document.addEventListener("keydown", (event) => {
  console.log("Touche pressée :", event.key);
});
```

---

## 3️⃣ Form Events (Événements de formulaire)

| Événement        | Description                          |
|-----------------|--------------------------------------|
| `submit`        | Formulaire soumis                     |
| `change`        | Valeur d’un champ modifiée           |
| `input`         | Valeur d’un champ en cours de saisie |
| `focus`         | Champ sélectionné                     |
| `blur`          | Champ perdu le focus                  |

**Exemple :**
```js
form.addEventListener("submit", (event) => {
  event.preventDefault(); // empêche le rechargement
  console.log("Formulaire soumis !");
});
```

---

## 4️⃣ Focus Events (Événements de focus)

| Événement   | Description                  |
|-------------|------------------------------|
| `focus`     | Élément reçoit le focus      |
| `blur`      | Élément perd le focus        |
| `focusin`   | Comme focus, se propage      |
| `focusout`  | Comme blur, se propage       |

---

## 5️⃣ Pointer Events (Événements de pointage)

Unifient souris, tactile et stylet.

| Événement            | Description                                         |
|---------------------|----------------------------------------------------|
| `pointerdown`       | Pointage enfoncé                                   |
| `pointerup`         | Pointage relâché                                   |
| `pointermove`       | Pointage bouge                                     |
| `pointerover`       | Pointer survole un élément                         |
| `pointerenter`      | Pointer entre dans un élément (pas de bubbling)    |
| `pointerout`        | Pointer sort d’un élément                          |
| `pointerleave`      | Pointer quitte un élément (pas de bubbling)       |
| `pointercancel`     | Pointer annulé par le système                      |
| `gotpointercapture` | Capture du pointer sur un élément                  |
| `lostpointercapture`| Perte de capture                                   |

**Exemple :**
```js
element.addEventListener("pointerdown", (event) => {
  console.log("Pointer :", event.pointerType);
});
```

---

## 6️⃣ Touch Events (Événements tactiles)

Spécifiques aux écrans tactiles.

| Événement       | Description                           |
|-----------------|---------------------------------------|
| `touchstart`    | Un doigt touche l’écran                |
| `touchmove`     | Doigt bouge sur l’écran                |
| `touchend`      | Doigt relâché                          |
| `touchcancel`   | Interaction interrompue                |

---

## 7️⃣ Drag & Drop Events (Événements glisser-déposer)

| Événement      | Description                            |
|----------------|----------------------------------------|
| `dragstart`    | Début du glisser                        |
| `drag`         | Pendant le glisser                      |
| `dragend`      | Fin du glisser                           |
| `dragenter`    | Pointer entre sur une zone de drop      |
| `dragover`     | Pointer bouge sur la zone de drop       |
| `dragleave`    | Pointer quitte la zone de drop          |
| `drop`         | Dépose l’élément                         |

---

## 8️⃣ Window Events (Événements de la fenêtre)

| Événement   | Description                        |
|-------------|------------------------------------|
| `load`      | Page terminée de charger           |
| `unload`    | Page en cours de quitter           |
| `resize`    | Fenêtre redimensionnée             |
| `scroll`    | Fenêtre ou élément scrollé         |
| `beforeunload` | Avant de quitter la page          |

---

## 9️⃣ Clipboard Events (Événements du presse-papiers)

| Événement   | Description                        |
|-------------|------------------------------------|
| `copy`      | Copie dans le presse-papiers       |
| `cut`       | Coupé dans le presse-papiers       |
| `paste`     | Collé depuis le presse-papiers     |

---

## 10️⃣ Miscellaneous Events (Autres événements utiles)

| Événement       | Description                        |
|-----------------|------------------------------------|
| `contextmenu`   | Clic droit                          |
| `wheel`         | Roue de la souris                  |
| `animationstart`| Début d’une animation CSS           |
| `animationend`  | Fin d’une animation CSS             |
| `transitionend` | Fin d’une transition CSS            |

---

## ✅ Bonnes pratiques

- Préférer `addEventListener` à `on<Event>` pour plus de flexibilité.  
- Toujours nommer les fonctions de callback si tu veux pouvoir les retirer.  
- Connaître la **phase de propagation** : capture, target, bubbling.  
- Utiliser `stopPropagation()` et `preventDefault()` selon les besoins.  
- Pour gérer les dispositifs multiples (souris, tactile, stylet), privilégier **Pointer Events**.

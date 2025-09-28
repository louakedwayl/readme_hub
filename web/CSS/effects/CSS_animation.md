# Les animations en CSS

## 1. Différence entre transition et animation

- **Transition** : permet de passer d'un état A → B quand une propriété change (ex: au survol d'un bouton).  
- **Animation** : permet de définir **plusieurs étapes (keyframes)** et de faire bouger un élément **même sans interaction**.

👉 Donc si tu veux un effet déclenché uniquement quand une propriété change → **transition**.  
👉 Si tu veux un mouvement complexe, répété ou autonome → **animation**.

---

## 2. Structure d'une animation

Une animation en CSS repose sur deux choses :

1. La règle `@keyframes` → décrit **l'évolution d'un élément** étape par étape.  
2. La propriété `animation` → applique l'animation à un élément.

---

## 3. @keyframes

C'est le cœur de l'animation. On définit des étapes avec des pourcentages (%) ou avec `from` / `to`.

Exemple simple :

```css
@keyframes slide {
  from {
    transform: translateX(0);
  }
  to {
    transform: translateX(200px);
  }
}
```

Exemple avec plusieurs étapes :

```css
@keyframes bounce {
  0%   { transform: translateY(0); }
  50%  { transform: translateY(-50px); }
  100% { transform: translateY(0); }
}
```

---

## 4. Les propriétés `animation-*`

Tu peux utiliser la forme **courte** (`animation`) ou chaque propriété séparée.

### Principales propriétés :

- **`animation-name`** : le nom défini dans `@keyframes`.  
- **`animation-duration`** : durée (ex: `2s`, `500ms`).  
- **`animation-timing-function`** : vitesse (ex: `linear`, `ease`, `ease-in-out`, `cubic-bezier(...)`).  
- **`animation-delay`** : délai avant le début.  
- **`animation-iteration-count`** : nombre de répétitions (`1`, `3`, `infinite`).  
- **`animation-direction`** : sens (`normal`, `reverse`, `alternate`, `alternate-reverse`).  
- **`animation-fill-mode`** : comportement avant/après (`none`, `forwards`, `backwards`, `both`).  
- **`animation-play-state`** : `running` ou `paused`.

---

## 5. Exemple complet

```css
.box {
  width: 100px;
  height: 100px;
  background: royalblue;

  /* Animation */
  animation-name: bounce;
  animation-duration: 2s;
  animation-iteration-count: infinite;
  animation-direction: alternate;
  animation-timing-function: ease-in-out;
}

@keyframes bounce {
  0%   { transform: translateY(0); }
  100% { transform: translateY(-100px); }
}
```

👉 La box monte et descend à l'infini.

---

## 6. Gestion avec JavaScript (événements)

On peut écouter :  
- `animationstart` → quand ça commence.  
- `animationend` → quand ça finit.  
- `animationiteration` → à chaque boucle.

Exemple :

```js
const box = document.querySelector(".box");

box.addEventListener("animationend", () => {
  box.style.background = "tomato"; // change la couleur à la fin
});
```

---

## 7. Cas pratiques

- **Loader** (spinner qui tourne à l'infini).  
- **Animations de texte** (écrire, clignoter, apparaître).  
- **Jeux & UI dynamiques** (rebonds, déplacements).  
- **Effets de transition entre pages**.

---

## 8. Raccourci `animation`

Tu peux tout écrire en une ligne :

```css
animation: bounce 2s ease-in-out 1s infinite alternate forwards;
```

### Format détaillé :

```css
animation: name duration timing-function delay iteration-count direction fill-mode play-state;
```

- **`name`** (obligatoire) → nom de l’animation (`@keyframes`).  
- **`duration`** (obligatoire) → durée d’un cycle (`2s`, `500ms`).  
- **`timing-function`** (optionnel, défaut = `ease`) → vitesse de progression (`linear`, `ease-in-out`, `steps(3)`, etc.).  
- **`delay`** (optionnel, défaut = `0s`) → délai avant le début.  
- **`iteration-count`** (optionnel, défaut = `1`) → répétitions (`1`, `5`, `infinite`).  
- **`direction`** (optionnel, défaut = `normal`) → sens (`normal`, `reverse`, `alternate`, `alternate-reverse`).  
- **`fill-mode`** (optionnel, défaut = `none`) → état avant/après (`forwards`, `backwards`, `both`).  
- **`play-state`** (optionnel, défaut = `running`) → permet de mettre en pause (`paused`).  

---

### Exemple décrypté :

```css
.my-box {
  animation: bounce 2s ease-in-out 1s infinite alternate forwards running;
}
```

➡️ Signifie :  
- `bounce` → nom de l’animation  
- `2s` → durée d’un cycle  
- `ease-in-out` → accélère puis ralentit  
- `1s` → commence après 1 seconde  
- `infinite` → répète à l’infini  
- `alternate` → fait un aller-retour (0% → 100% puis retour)  
- `forwards` → garde la dernière étape à la fin  
- `running` → l’animation est active (non en pause)

---

👉 La version **minimale valide** est :

```css
animation: name duration;
```

Exemple :

```css
animation: blink 0.5s;
```

---


## 9. Les `animation-timing-function`

La propriété **`animation-timing-function`** définit la **vitesse de progression de l’animation dans le temps**.  
En d’autres mots : est-ce que l’animation va démarrer doucement, aller vite, ralentir à la fin, ou rester constante ?

---

### 1. Valeurs de base

- **`linear`** → vitesse constante du début à la fin.  
- **`ease`** (valeur par défaut) → commence doucement, accélère, puis ralentit à la fin.  
- **`ease-in`** → commence lentement puis accélère.  
- **`ease-out`** → commence vite puis ralentit.  
- **`ease-in-out`** → lent au début, rapide au milieu, lent à la fin.  

---

### 2. Courbes personnalisées

- **`cubic-bezier(x1, y1, x2, y2)`**  
  Permet de définir une courbe de Bézier pour contrôler la vitesse.  
  Exemple :  
  ```css
  animation-timing-function: cubic-bezier(0.25, 1, 0.5, 1);
  ```

---

### 3. Étapes (steps)

- **`steps(n, start|end)`** → coupe l’animation en *n* étapes nettes.  
  Exemple :  
  ```css
  animation-timing-function: steps(4, end);
  ```
  → L’animation avance par **sauts**, comme une animation image par image.

- **`step-start`** = `steps(1, start)` → saute directement au prochain état dès le début.  
- **`step-end`** = `steps(1, end)` → garde l’état courant puis saute à la fin.  

👉 Très utilisé pour un effet **clignotant**, type texte qui écrit caractère par caractère, ou sprite animé.

---

### 4. Exemple visuel

```css
.box1 { animation: move 2s linear infinite; }
.box2 { animation: move 2s ease infinite; }
.box3 { animation: move 2s ease-in infinite; }
.box4 { animation: move 2s ease-out infinite; }
.box5 { animation: move 2s ease-in-out infinite; }
.box6 { animation: move 2s steps(5, end) infinite; }

@keyframes move {
  from { transform: translateX(0); }
  to   { transform: translateX(200px); }
}
```

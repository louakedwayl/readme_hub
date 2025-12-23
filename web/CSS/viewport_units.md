# 📘 Les unités viewport (`vh`, `vw`, etc.)

## 1️⃣ Qu’est-ce que le viewport ?

Le **viewport** est la **zone visible de la page dans le navigateur**.

- Sur ordinateur : la fenêtre du navigateur
- Sur mobile : la partie visible de l’écran (sans les barres système)

👉 Les unités *viewport* sont donc **basées sur la taille de l’écran**, et non sur le parent ou le contenu.

---

## 2️⃣ L’unité `vh` (Viewport Height)

### 🔹 Définition
`vh` signifie **Viewport Height** (hauteur de la fenêtre).

- `1vh` = 1 % de la hauteur du viewport
- `100vh` = 100 % de la hauteur du viewport

### 🔹 Exemple simple
```css
.section {
  height: 100vh;
}
```

➡️ L’élément occupe **toute la hauteur de l’écran**.

---

## 3️⃣ Différence entre `height` et `min-height`

### `height: 100vh`
- Hauteur **fixe**
- Le contenu peut **déborder** si trop grand

```css
height: 100vh;
```

### `min-height: 100vh`
- Hauteur **minimum**
- L’élément peut **s’agrandir si le contenu dépasse**

```css
min-height: 100vh;
```

✅ **Préférable pour les layouts de page**

---

## 4️⃣ Les autres unités viewport

| Unité | Signification | Description |
|-----|-------------|-------------|
| `vw` | Viewport Width | Largeur de l’écran |
| `vh` | Viewport Height | Hauteur de l’écran |
| `vmin` | Minimum viewport | Plus petit entre `vw` et `vh` |
| `vmax` | Maximum viewport | Plus grand entre `vw` et `vh` |

### Exemple :
```css
.box {
  width: 50vw;
  height: 50vh;
}
```

---

## 5️⃣ Cas d’utilisation courants

### 🖥️ Section plein écran
```css
.hero {
  min-height: 100vh;
}
```

### 🎯 Centrage vertical
```css
.container {
  min-height: 100vh;
  display: flex;
  align-items: center;
  justify-content: center;
}
```

### 📌 Footer collé en bas
```css
body {
  min-height: 100vh;
  display: flex;
  flex-direction: column;
}

footer {
  margin-top: auto;
}
```

---

## 6️⃣ Problèmes connus avec `100vh` ⚠️

### 📱 Sur mobile
- Les barres du navigateur changent de taille
- `100vh` peut dépasser la hauteur réelle visible
- Apparition d’un scroll non désiré

### ✅ Nouvelles unités (CSS moderne)
```css
height: 100dvh;
```

| Unité | Description |
|-----|------------|
| `dvh` | Dynamic Viewport Height |
| `svh` | Small Viewport Height |
| `lvh` | Large Viewport Height |

---

## 7️⃣ Bonnes pratiques ✅

✔️ Préférer `min-height` à `height`  
✔️ Tester sur mobile  
✔️ Éviter `100vw` (scrollbar horizontale)  
✔️ Combiner avec Flexbox ou Grid  

---

## 8️⃣ Récapitulatif

- `vh` = pourcentage de la hauteur de l’écran
- `100vh` = plein écran
- `min-height` est plus flexible
- Attention aux mobiles
- `dvh` est la solution moderne

---

📌 **Fin du cours**

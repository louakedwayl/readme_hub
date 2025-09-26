# 📘 CPU vs GPU dans le rendu CSS et les animations

## 1. Le pipeline de rendu d’un navigateur
Quand un navigateur affiche une page, il suit plusieurs étapes :

1. **Layout (ou Reflow)**  
   - Calcul de la position et des dimensions de chaque élément.  
   - Déclenché par les changements liés à `position`, `width`, `height`, `margin`, etc.  
   - Effectué par le **CPU**.

2. **Paint (Repaint)**  
   - Dessin visuel des éléments (couleurs, bordures, ombres).  
   - Effectué aussi par le **CPU**.

3. **Composite**  
   - Combinaison des calques dessinés pour afficher la scène finale à l’écran.  
   - Peut être accéléré par le **GPU** (cartes graphiques).

---

## 2. Différence CPU vs GPU

### ✨ CPU (processeur principal)
- Gère le **layout** et le **paint**.  
- Moins efficace pour les calculs graphiques lourds.  
- Chaque changement de `position: absolute` + `top/left`, `width`, `height`, etc. peut redéclencher **layout + paint**, donc coûteux.

### 🚀 GPU (processeur graphique)
- Spécialisé dans le rendu et les calculs parallèles.  
- Utilisé lors des **transformations visuelles** comme :  
  - `transform: translate/scale/rotate/skew`  
  - `opacity`  
  - `filter` (souvent accéléré aussi)  
- Plus fluide pour les animations, car il évite de recalculer tout le layout.

---

## 3. Bonnes pratiques pour les animations

✅ **Utiliser :**
- `transform: translate(...)` au lieu de `top/left` pour déplacer un élément.  
- `opacity` pour faire apparaître/disparaître.  
- Combiner `transform` + `opacity` pour des animations douces.

❌ **Éviter :**
- Animer `width`, `height`, `margin`, `padding`, `top`, `left`.  
- Ces propriétés déclenchent **layout + paint** → moins performant.

---

## 4. Tableau récapitulatif

| Type d’opération | Propriétés CSS concernées                 | Utilise | Performance |
|------------------|-------------------------------------------|---------|-------------|
| **Layout (Reflow)** | `width`, `height`, `margin`, `padding`, `position` | CPU     | ⚠️ Coûteux  |
| **Paint**          | `background-color`, `border`, `box-shadow` | CPU     | ⚠️ Moyen    |
| **Composite**      | `transform`, `opacity`, `filter`          | GPU     | ✅ Fluide   |

---

## 5. Exemple pratique

```css
/* Moins performant (CPU) */
.bad {
  position: absolute;
  top: 100px; /* déclenche reflow */
}

/* Plus performant (GPU) */
.good {
  transform: translateY(100px); /* accéléré par le GPU */
}
```

---

👉 Conclusion :  
Pour les animations **fluides et performantes**, privilégie **`transform`** et **`opacity`**, car elles sont gérées par le GPU.

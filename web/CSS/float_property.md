# 🏄 La propriété `float` en CSS

## 1. Définition
La propriété **`float`** permet de **placer un élément à gauche ou à droite** de son conteneur, de sorte que le texte et les éléments en ligne (inline) s’enroulent autour de lui.  
Historiquement, `float` a été beaucoup utilisé pour créer des mises en page, mais aujourd’hui on lui préfère **Flexbox** ou **Grid**. On l’utilise surtout pour faire flotter des images ou des petits blocs dans du texte.

---

## 2. Les valeurs possibles

### 🔹 `none` (valeur par défaut)
L’élément reste à sa position normale, sans flotter.

```css
.box {
  float: none; /* par défaut */
}
```

### 🔹 `left`
L’élément flotte à **gauche** de son conteneur. Le contenu suivant s’aligne à sa droite.

```css
img {
  float: left;
  margin-right: 10px; /* espace entre l’image et le texte */
}
```

### 🔹 `right`
L’élément flotte à **droite** de son conteneur. Le contenu suivant s’aligne à sa gauche.

```css
img {
  float: right;
  margin-left: 10px; /* espace entre l’image et le texte */
}
```

### 🔹 `inline-start` et `inline-end` (CSS logique)
Ces valeurs tiennent compte de la direction du texte (`ltr` ou `rtl`).  
- `inline-start` : flotte au début de la ligne (gauche si `ltr`, droite si `rtl`).  
- `inline-end` : flotte à la fin de la ligne.

---

## 3. Exemple simple
```html
<p>
  <img src="photo.jpg" alt="photo" style="float:left; width:120px;">
  Voici un texte qui va s’enrouler autour de l’image placée à gauche. 
</p>
```

---

## 4. Problème courant : le *collapsing parent*
Quand on met des enfants flottants dans un conteneur, ce conteneur peut avoir une **hauteur de 0** car les flottants sont retirés du flux normal du document.

Exemple :

```css
.container {
  border: 2px solid red;
}
.child {
  float: left;
  width: 50%;
}
```

Le parent `.container` n’aura pas de hauteur visible.  

---

## 5. Solution : la propriété `clear` ou le *clearfix*

### 🔹 `clear`
Permet d’empêcher un élément de se placer à côté d’un flottant.  

Valeurs :  
- `clear: left;` → évite les flottants à gauche.  
- `clear: right;` → évite les flottants à droite.  
- `clear: both;` → évite les flottants des deux côtés.  

```css
.footer {
  clear: both;
}
```

### 🔹 Le clearfix
Technique classique pour forcer un parent à englober ses flottants.

```css
.container::after {
  content: "";
  display: block;
  clear: both;
}
```

---

## 6. Résumé rapide

| Valeur       | Effet |
|--------------|--------------------------------|
| `none`       | Pas de flottement (valeur par défaut) |
| `left`       | L’élément flotte à gauche |
| `right`      | L’élément flotte à droite |
| `inline-start` | Flotte au début de la ligne selon la direction du texte |
| `inline-end`   | Flotte à la fin de la ligne selon la direction du texte |

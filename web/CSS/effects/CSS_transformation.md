# Transformations en CSS

En CSS, les **transformations** permettent de **modifier la forme, la taille ou la position** d’un élément sans changer son flux dans la page. Elles sont très utiles pour les animations et les effets interactifs.

---

## 1. La propriété de base
```css
.element {
  transform: valeur;
}
```
- Plusieurs transformations peuvent être combinées :
```css
transform: translateX(100px) rotate(45deg) scale(1.5);
```

---

## 2. Types de transformations

### 🔹 Translation (déplacement)
- `translateX(px ou %)` → déplace sur l’axe horizontal  
- `translateY(px ou %)` → déplace sur l’axe vertical  
- `translate(x, y)` → déplace en 2D  
- `translate3d(x, y, z)` → déplace en 3D

Exemple :
```css
transform: translate(50px, 20px);
```

### 🔹 Rotation
- `rotate(angle)` → rotation 2D (autour du centre par défaut)  
- `rotateX(angle)` → rotation autour de l’axe X (3D)  
- `rotateY(angle)` → rotation autour de l’axe Y (3D)  
- `rotateZ(angle)` → rotation autour de l’axe Z

Exemple :
```css
transform: rotate(45deg);
```

### 🔹 Mise à l’échelle (Scale)
- `scale(x, y)` → agrandir/rétrécir  
- `scaleX(valeur)` → largeur uniquement  
- `scaleY(valeur)` → hauteur uniquement  
- `scale3d(x, y, z)` → échelle 3D

Exemple :
```css
transform: scale(1.5);
```

### 🔹 Inclinaison (Skew)
- `skewX(angle)` → inclinaison horizontale  
- `skewY(angle)` → inclinaison verticale  
- `skew(x, y)` → inclinaison 2D

Exemple :
```css
transform: skew(20deg, 10deg);
```

### 🔹 Matrices (avancé)
- `matrix(a, b, c, d, e, f)` → transformation 2D  
- `matrix3d(...)` → transformation 3D  
> Peu utilisé directement mais base des autres transformations.

---

## 3. Point d’origine
La transformation se fait **autour du centre par défaut**, mais on peut changer avec `transform-origin` :

```css
transform-origin: left top;   /* coin haut gauche */
transform-origin: 50% 100%;  /* milieu en bas */
```

---

## 4. Exemple complet
```css
.box {
  width: 100px;
  height: 100px;
  background: tomato;
  transform: translateX(100px) rotate(30deg) scale(1.2);
  transform-origin: center bottom;
}
```
➡ La box est déplacée, tournée et agrandie autour de son bas-centre.

---

## 5. Résumé rapide
| Transformation | Description                  | Exemple CSS                    |
|----------------|-----------------------------|--------------------------------|
| translate      | Déplacement X/Y             | `transform: translate(50px, 20px);` |
| rotate         | Rotation 2D ou 3D           | `transform: rotate(45deg);`        |
| scale          | Agrandir/rétrécir           | `transform: scale(1.5);`          |
| skew           | Inclinaison                | `transform: skew(20deg, 10deg);`  |
| matrix         | Transformation avancée      | `transform: matrix(1,0,0,1,0,0);` |

---

Les transformations sont souvent combinées avec des **animations CSS** pour créer des effets dynamiques et visuels.

# Les Media Queries

## 📌 Introduction

Les **media queries** sont une fonctionnalité du CSS qui permet
d'appliquer des styles différents selon les caractéristiques du
périphérique :\
taille d'écran, orientation, résolution, etc.

Elles sont essentielles pour créer des sites **responsive**,
c'est-à-dire qui s'adaptent aux mobiles, tablettes et ordinateurs.

## 🧩 1. Syntaxe de base

``` css
@media (condition) {
    /* Styles qui s’appliquent si la condition est vraie */
}
```

Exemple simple :

``` css
@media (max-width: 600px) {
    body {
        background: lightblue;
    }
}
```

## 🖥️ 2. Pourquoi les media queries ?

-   Adapter le site au mobile\
-   Changer des tailles de police\
-   Réorganiser des layouts\
-   Modifier des images\
-   Cacher certains éléments\
-   Créer des grilles qui s'ajustent automatiquement

## 📱 3. Les media queries les plus utilisées

### ✔️ Mobile (≤ 600px)

``` css
@media (max-width: 600px) {
    /* Styles pour mobile */
}
```

### ✔️ Petites tablettes (600px à 768px)

``` css
@media (min-width: 600px) and (max-width: 768px) {
    /* Styles pour petites tablettes */
}
```

### ✔️ Tablettes (768px à 1024px)

``` css
@media (min-width: 768px) and (max-width: 1024px) {
    /* Styles pour tablettes */
}
```

### ✔️ Desktop (≥ 1024px)

``` css
@media (min-width: 1024px) {
    /* Styles pour ordinateur */
}
```

## 📏 4. max-width vs min-width

### 🔹 max-width

S'applique quand **l'écran est plus petit que**.

``` css
@media (max-width: 800px) { ... }
```

### 🔹 min-width

S'applique quand **l'écran est plus grand que**.

``` css
@media (min-width: 800px) { ... }
```

## 🧭 5. Orientation : portrait / landscape

``` css
@media (orientation: portrait) {
    /* Smartphone tenu verticalement */
}
```

``` css
@media (orientation: landscape) {
    /* Smartphone tenu horizontalement */
}
```

## 📺 6. Media queries multiples (AND / OR)

### ✔️ AND

``` css
@media (min-width: 600px) and (max-width: 900px) {
    /* entre 600 et 900px */
}
```

### ✔️ OR (avec plusieurs media queries)

``` css
@media (max-width: 500px), (orientation: landscape) {
    /* Si l'écran fait ≤ 500px OU s'il est en paysage */
}
```

## 🧱 7. Exemples pratiques

### 🔹 Adapter la taille du texte

``` css
p {
    font-size: 18px;
}

@media (max-width: 600px) {
    p {
        font-size: 14px;
    }
}
```

### 🔹 Changer un layout en mobile

``` css
.container {
    display: flex;
    flex-direction: row;
}

@media (max-width: 700px) {
    .container {
        flex-direction: column;
    }
}
```

### 🔹 Cacher un élément en mobile

``` css
@media (max-width: 600px) {
    .sidebar {
        display: none;
    }
}
```

## 🎯 8. Bonnes pratiques

-   Toujours partir du **mobile-first** quand c'est possible\
-   Éviter d'écrire 15 media queries différentes\
-   Utiliser des unités relatives (%, rem, vw)\
-   Tester sur plusieurs tailles (Chrome DevTools)\
-   Grouper les media queries par breakpoints

## ✔️ 9. Conclusion

Les media queries sont la base du **responsive design** :\
elles permettent de rendre les sites lisibles sur **tous les
appareils**.

Elles reposent sur une logique simple :

-   **Observer l'écran**\
-   **Appliquer des règles selon les conditions**

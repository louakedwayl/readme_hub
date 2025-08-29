# Changer une propriété CSS d'un élément avec JavaScript

En JavaScript, il est très courant de vouloir **modifier le style d’un élément HTML** directement depuis le script. Cela permet de rendre les pages interactives et dynamiques.

---

## 1. Sélectionner l'élément

Avant de modifier le style, il faut **sélectionner l'élément**. On peut utiliser plusieurs méthodes :

```javascript
// Sélection par ID
const element = document.getElementById("monElement");

// Sélection par classe (renvoie le premier élément)
const element2 = document.querySelector(".maClasse");

// Sélection de tous les éléments avec une classe
const elements = document.querySelectorAll(".maClasse");
```

---

## 2. Modifier une propriété CSS

Chaque élément possède un objet `style` qui correspond à ses **styles en ligne** (inline styles).

```javascript
const element = document.getElementById("monElement");

// Changer la couleur du texte
element.style.color = "red";

// Changer la largeur
element.style.width = "200px";

// Changer le fond
element.style.backgroundColor = "yellow";
```

> ⚠️ Remarque : les propriétés CSS avec un trait d’union (ex: `background-color`) deviennent en **camelCase** (`backgroundColor`) en JavaScript.

---

## 3. Modifier plusieurs propriétés

On peut modifier plusieurs propriétés à la suite :

```javascript
element.style.color = "white";
element.style.backgroundColor = "blue";
element.style.fontSize = "20px";
```

Ou avec **`Object.assign`** :

```javascript
Object.assign(element.style, {
  color: "white",
  backgroundColor: "blue",
  fontSize: "20px"
});
```

---

## 4. Utiliser des variables CSS

Si vous utilisez des **variables CSS** (`--ma-couleur`), vous pouvez les changer avec `setProperty` :

```javascript
// Dans votre CSS :
// :root {
//   --ma-couleur: red;
// }

document.documentElement.style.setProperty("--ma-couleur", "green");
```

---

## 5. Modifier le style de plusieurs éléments

Pour modifier plusieurs éléments en même temps :

```javascript
const elements = document.querySelectorAll(".maClasse");

elements.forEach(el => {
  el.style.color = "purple";
});
```

---

## 6. Astuces

* `element.style` ne reflète que les **styles en ligne**. Pour récupérer les styles appliqués par CSS externe, utilisez `getComputedStyle` :

```javascript
const style = getComputedStyle(element);
console.log(style.color); // renvoie la couleur actuelle
```

* Pour **ajouter ou retirer des classes** et appliquer des styles définis dans le CSS, utilisez `classList` :

```javascript
element.classList.add("active");
element.classList.remove("active");
element.classList.toggle("active");
```

Cette méthode est souvent **préférable** à la modification directe des styles pour garder le CSS séparé du JavaScript.

---

## 7. Exemple complet

```html
<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<title>Changer style</title>
<style>
  .box {
    width: 100px;
    height: 100px;
    background-color: red;
  }
  .active {
    background-color: green;
  }
</style>
</head>
<body>

<div id="maBox" class="box"></div>
<button id="btn">Changer la couleur</button>

<script>
  const box = document.getElementById("maBox");
  const btn = document.getElementById("btn");

  btn.addEventListener("click", () => {
    // Méthode 1 : changer directement la propriété
    box.style.backgroundColor = "blue";

    // Méthode 2 : ajouter une classe
    // box.classList.toggle("active");
  });
</script>

</body>
</html>
```

---

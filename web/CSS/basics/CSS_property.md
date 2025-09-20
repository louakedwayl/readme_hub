# 📝 Les propriétés CSS et les éléments HTML

Chaque élément HTML possède un ensemble de propriétés CSS, même si vous ne les définissez pas explicitement. Ce cours explique comment elles fonctionnent et comment elles sont calculées.

---

## 1️⃣ Propriétés CSS finies

- CSS dispose d’un **ensemble limité de propriétés** (color, font-size, margin, padding, display, etc.).
- Ces propriétés sont définies dans les **standards CSS** (CSS1 à CSS4 et modules récents).
- Tous les navigateurs modernes implémentent la **majorité de ces propriétés**, avec parfois des différences pour les modules récents.

---

## 2️⃣ Chaque élément HTML a toutes les propriétés CSS

- Chaque élément possède **toutes les propriétés CSS dans un état par défaut**.
- Exemple : un `<div>` possède `color`, `font-size`, `display`, `margin`, etc., même si vous ne définissez aucune valeur.
- L’état par défaut provient de plusieurs sources :
  - 1. **User Agent Stylesheet** : le style par défaut défini par le navigateur (ex : `display: block` pour `<div>`).
  - 2. **Valeurs héritées** : certaines propriétés comme `color` ou `font-family` sont transmises des éléments parents.
  - 3. **Valeurs initiales** : si aucune valeur n’est héritée ni définie, la propriété prend sa **valeur initiale** définie par le standard CSS.

---

## 3️⃣ Valeurs calculées

- On peut récupérer toutes les propriétés CSS calculées pour un élément avec JavaScript :

```js
const div = document.querySelector("div");
const styles = getComputedStyle(div);

console.log(styles.color);      // Couleur effective
console.log(styles.fontSize);   // Taille de police effective
console.log(styles.margin);     // Valeurs calculées pour margin
```
Même les propriétés que vous n’avez jamais définies apparaissent avec une valeur calculée.

## 4️⃣ Modifications

Vous pouvez modifier les propriétés CSS via :

CSS dans vos feuilles de style ou <style> :

```CSS
div {
  color: red;
  margin: 10px;
}

JavaScript :

        div.style.color = "blue";
        div.style.margin = "20px";
```
## 5️⃣ Résumé

Chaque élément HTML possède toutes les propriétés CSS, mais elles peuvent être :

- Héritées d’un parent

- Initiales si non définies

- Redéfinies via CSS ou JavaScript

  Pour connaître l’état actuel de toutes les propriétés, utilisez getComputedStyle(element).

 ## Conclusion

Même si vous ne définissez aucune propriété CSS, chaque élément HTML a un style complet calculé, grâce aux valeurs initiales, héritées et aux styles par défaut du navigateur.
Cela permet aux navigateurs de rendre chaque élément de manière cohérente et prévisible.

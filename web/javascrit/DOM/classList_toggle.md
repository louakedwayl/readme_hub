# classList.toggle

## 1. Définition
La méthode **`toggle`** est utilisée avec `element.classList`.  
Elle permet de **basculer une classe CSS** sur un élément :  
- Si la classe est **absente**, elle est **ajoutée**.  
- Si la classe est **présente**, elle est **supprimée**.  

C'est très pratique pour gérer des états dynamiques comme : afficher/masquer un menu ou passer en mode sombre.

---

## 2. Exemple simple
HTML :
```html
<button id="btn">Basculer</button>
<p id="texte">Hello world</p>
```

CSS :
```css
.caché {
  display: none;
}
```

JS :
```js
const btn = document.querySelector("#btn");
const texte = document.querySelector("#texte");

btn.addEventListener("click", () => {
  texte.classList.toggle("caché");
});
```

👉 À chaque clic :
- Si `<p>` n’a pas la classe `caché`, elle est ajoutée → le texte disparaît.  
- Si `<p>` a déjà la classe, elle est supprimée → le texte réapparaît.

---

## 3. Version avec valeur forcée
`toggle` peut accepter un **second paramètre booléen** pour forcer l’état :

```js
element.classList.toggle("classe", true);  // force l’ajout
element.classList.toggle("classe", false); // force la suppression
```

Exemple pratique :
```js
document.body.classList.toggle("dark", true);  // active le mode sombre
```

---

## 4. Résumé
- `toggle` = bascule une classe CSS sur un élément.  
- Sans paramètre → ajoute si absente, enlève si présente.  
- Avec un booléen → force l’ajout ou le retrait.  
- Utile pour des fonctionnalités interactives (menus, dark mode, etc.).

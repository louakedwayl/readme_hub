# Reset CSS

Chaque navigateur applique par défaut des styles aux éléments HTML (marges, paddings, polices, etc.). Ces styles par défaut peuvent varier d’un navigateur à l’autre, ce qui rend la mise en page **incohérente** si l’on ne les neutralise pas. C’est là qu’intervient le **reset CSS**.

---

## 1. Qu’est-ce que le Reset CSS ?

Le reset CSS est un ensemble de règles CSS visant à **remettre à zéro** les styles par défaut du navigateur pour tous les éléments HTML. Cela permet de commencer avec une base **propre et uniforme**.

Exemple classique :

```css
/* Reset CSS */
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: "Courier New", monospace;
}
```

### Explications :

* `*` : sélectionne tous les éléments.
* `margin: 0;` : supprime toutes les marges par défaut.
* `padding: 0;` : supprime tous les paddings par défaut.
* `box-sizing: border-box;` : rend la taille des éléments plus facile à gérer (largeur/hauteur incluent padding et border).
* `font-family: "Courier New", monospace;` : définit une police uniforme sur tous les éléments.

---

## 2. Pourquoi utiliser un reset CSS ?

1. **Uniformité entre navigateurs** : Les éléments HTML ont des styles par défaut différents selon les navigateurs.
2. **Simplification de la mise en page** : Commencer avec zéro marge et zéro padding évite les surprises lors du positionnement.
3. **Contrôle total** : Tu décides ensuite exactement comment chaque élément doit s’afficher.

---

## 3. Différence entre reset et normalize

* **Reset CSS** : supprime complètement tous les styles par défaut.
* **Normalize CSS** : conserve certains styles utiles mais les rend cohérents entre navigateurs.

💡 Astuce : Le reset est parfait si tu veux **partir d’une page totalement vierge**, tandis que normalize est plus doux et moins radical.

---

## 4. Exemple d’utilisation pratique

```css
/* Reset CSS minimal */
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}

/* Exemple de style personnalisé après reset */
body {
  font-family: Arial, sans-serif;
  background-color: #f0f0f0;
}

h1 {
  font-size: 2rem;
  margin-bottom: 1rem;
}
```

Après le reset, tu peux **styler tous tes éléments** sans te soucier des valeurs par défaut du navigateur.

---

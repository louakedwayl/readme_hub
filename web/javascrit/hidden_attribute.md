# 📘 L’attribut `hidden` en HTML

## 1. Qu’est-ce que l’attribut `hidden` ?

* `hidden` est un **attribut boolean** en HTML qui permet de **masquer un élément** dans la page.
* Un élément avec l’attribut `hidden` **n’est pas affiché** dans le navigateur et n’occupe **pas d’espace**.
* L’élément reste dans le DOM et peut être manipulé via JavaScript ou CSS.

### Exemple HTML :

```html
<p hidden>Ceci est un paragraphe caché.</p>
```

---

## 2. Utilisation en JavaScript

Tu peux ajouter ou enlever l’attribut `hidden` dynamiquement :

### Ajouter `hidden`

```js
const elem = document.querySelector('p');
elem.setAttribute('hidden', 'hidden');
// ou plus simplement
elem.hidden = true;
```

### Supprimer `hidden`

```js
elem.removeAttribute('hidden');
// ou plus simplement
elem.hidden = false;
```

---

## 3. Différence avec `display: none` en CSS

| Aspect                  | `hidden`                                          | `display: none` |
| ----------------------- | ------------------------------------------------- | --------------- |
| Masque l’élément        | ✅                                                 | ✅               |
| Occupe de l’espace      | ❌                                                 | ❌               |
| Accessible via JS       | ✅                                                 | ✅               |
| Peut être stylé via CSS | ✅, mais nécessite `:not([hidden])` ou `hidden {}` | ✅               |

---

## 4. Bonnes pratiques

✅ Utiliser `hidden` pour **masquer temporairement** des éléments que tu veux montrer/masquer via JS.
✅ Ne pas l’utiliser pour masquer des éléments critiques pour l’accessibilité sans raison, car certains lecteurs d’écran peuvent les ignorer.
✅ Préférer `elem.hidden = true/false` en JS pour une syntaxe plus simple.

---

## 5. Résumé

* `hidden` est un attribut boolean HTML pour **masquer un élément**.
* L’élément reste dans le DOM mais **n’est pas visible**.
* Peut être manipulé via **JavaScript** (`setAttribute`, `removeAttribute`, ou `elem.hidden`).
* Différent de `display: none` par sa syntaxe HTML native et sa simplicité pour le masquage rapide.

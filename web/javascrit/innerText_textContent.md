# 📘 `innerText` vs `textContent` en JavaScript

## 1. Qu’est-ce que `innerText` ?

* `innerText` est une propriété des éléments DOM qui permet de **récupérer ou modifier le texte visible** d’un élément.
* Il **respecte le rendu CSS** : par exemple, le texte caché (`display: none`) n’est pas inclus.
* Lecture et écriture déclenchent un **recalcul du rendu**, ce qui peut être moins performant.

### Exemple

```html
<div id="demo" style="display:none">Hello World</div>
<script>
  const elem = document.getElementById('demo');
  console.log(elem.innerText); // '' (texte non visible)
  elem.innerText = 'Bonjour';  // remplace le texte affiché
</script>
```

---

## 2. Qu’est-ce que `textContent` ?

* `textContent` est une propriété des éléments DOM qui retourne **tout le texte contenu dans l’élément**, peu importe s’il est visible ou non.
* Plus **rapide** car il ne déclenche pas de recalcul de rendu.
* Inclus le texte des éléments enfants.

### Exemple

```html
<div id="demo" style="display:none">Hello <span>World</span></div>
<script>
  const elem = document.getElementById('demo');
  console.log(elem.textContent); // 'Hello World'
  elem.textContent = 'Bonjour tout le monde'; // remplace tout le texte
</script>
```

---

## 3. Différences principales

| Propriété     | Texte visible uniquement ? | Performance  | Recalcule le rendu ? | Inclut le texte des enfants ? |
| ------------- | -------------------------- | ------------ | -------------------- | ----------------------------- |
| `innerText`   | Oui                        | Moins rapide | Oui                  | Oui                           |
| `textContent` | Non                        | Plus rapide  | Non                  | Oui                           |

---

## 4. Quand utiliser quoi ?

* **`innerText`** : quand tu veux récupérer ou modifier **uniquement le texte visible** à l’utilisateur.
* **`textContent`** : quand tu veux **tout le texte** d’un élément, rapide et sûr, indépendamment du style CSS.

---

## 5. Bonnes pratiques

✅ Pour la plupart des opérations sur le texte des éléments, **`textContent`** est recommandé pour sa rapidité.
✅ Utiliser `innerText` seulement quand le style CSS affecte ce que tu veux récupérer.
✅ Éviter `innerText` dans des boucles importantes pour ne pas impacter la performance.

---

## 6. Résumé

* `innerText` : texte visible, dépend du rendu CSS, recalcul du rendu.
* `textContent` : texte complet, rapide, ne dépend pas du rendu CSS.
* Les deux peuvent être **modifiés pour changer le texte** d’un élément.

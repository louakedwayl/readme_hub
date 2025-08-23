# 📘 Les attributs `defer`, `async` et `type` en JavaScript

## 1. La balise `<script>`

En HTML, on utilise la balise `<script>` pour inclure du code JavaScript dans une page.
Exemple de base :

```html
<script src="app.js"></script>
```

Mais cette balise possède plusieurs **attributs** qui modifient la façon dont le navigateur charge et exécute le script :

* `defer`
* `async`
* `type`

---

## 2. L’attribut `defer`

### Fonctionnement :

* Le script est **téléchargé en parallèle** avec le HTML.
* Mais il est **exécuté après que le DOM est complètement construit**.
* Les scripts avec `defer` s’exécutent **dans l’ordre d’apparition**.

### Exemple :

```html
<script src="app.js" defer></script>
```

➡ Idéal pour les scripts principaux qui doivent interagir avec le DOM.
➡ Ne bloque pas le rendu de la page.

---

## 3. L’attribut `async`

### Fonctionnement :

* Le script est **téléchargé en parallèle**.
* Il est **exécuté dès qu’il est prêt**, sans attendre la fin du chargement du HTML.
* L’ordre d’exécution **n’est pas garanti** si plusieurs scripts ont `async`.

### Exemple :

```html
<script src="analytics.js" async></script>
```

➡ Idéal pour les scripts indépendants (statistiques, publicités, trackers, etc.).
➡ Ne convient pas si ton code dépend du DOM ou d’autres scripts.

---

## 4. L’attribut `type`

### Fonctionnement :

L’attribut `type` définit le **langage du script**.

* Par défaut : `type="text/javascript"` (souvent implicite).
* On peut aussi l’utiliser pour charger des modules ES6 : `type="module"`.

### Exemples :

```html
<!-- Script classique -->
<script src="app.js" type="text/javascript"></script>

<!-- Script module ES6 -->
<script src="app.js" type="module"></script>
```

👉 Avec `type="module"` :

* Les scripts sont **toujours exécutés en mode `defer`** par défaut.
* On peut utiliser `import` et `export` en JavaScript.

---

## 5. Comparaison : `defer` vs `async` vs `type`

| Attribut        | Téléchargement  | Exécution                           | Ordre garanti ? | Usage principal                   |
| --------------- | --------------- | ----------------------------------- | --------------- | --------------------------------- |
| *(aucun)*       | Pendant le HTML | Immédiate, bloque le rendu          | Oui             | Petits scripts inline             |
| `defer`         | Pendant le HTML | Après le DOM chargé                 | Oui             | Scripts liés à la page            |
| `async`         | Pendant le HTML | Dès que prêt                        | Non             | Scripts indépendants              |
| `type="module"` | Pendant le HTML | Après le DOM chargé (comme `defer`) | Oui             | Code moderne avec `import/export` |

---

## 6. Bonnes pratiques

✅ Utiliser **`defer`** pour la plupart des scripts liés au DOM.
✅ Utiliser **`async`** uniquement pour les scripts indépendants.
✅ Préférer **`type="module"`** pour les projets modernes afin de profiter d’ES6+.
✅ Éviter de mettre un `<script>` sans attribut dans le `<head>` (bloque le rendu).


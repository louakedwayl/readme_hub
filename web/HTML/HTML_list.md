# Les listes en HTML

## 1. Introduction aux listes

En HTML, une **liste** est un moyen d’organiser des éléments de manière ordonnée ou non ordonnée.

Il existe deux types principaux de listes :

1. **Liste non ordonnée** (`<ul>`) :

   * Les éléments ne sont pas numérotés.
   * Chaque élément est représenté par `<li>` (list item).
   * Par défaut, chaque élément a un **point (bullet)** devant lui.

2. **Liste ordonnée** (`<ol>`) :

   * Les éléments sont numérotés automatiquement.
   * Chaque élément est représenté par `<li>` également.

---

## 2. Syntaxe d’une liste non ordonnée (`<ul>`)

```html
<ul>
  <li>Premier élément</li>
  <li>Deuxième élément</li>
  <li>Troisième élément</li>
</ul>
```

**Résultat affiché par défaut :**

* Premier élément
* Deuxième élément
* Troisième élément

---

## 3. Supprimer le point (bullet) des éléments de liste

Pour enlever le point devant chaque `<li>`, on utilise la propriété CSS `list-style-type: none;`.

### Exemple :

```html
<ul class="no-bullets">
  <li>Premier élément</li>
  <li>Deuxième élément</li>
  <li>Troisième élément</li>
</ul>
```

```css
.no-bullets {
  list-style-type: none; /* supprime le point */
  padding: 0;             /* supprime le padding par défaut */
  margin: 0;              /* supprime la marge par défaut */
}
```

**Explications :**

* `list-style-type: none;` → enlève les bullets.
* `padding: 0;` et `margin: 0;` → nettoient les espacements par défaut appliqués par le navigateur.

---

## 4. Autres styles de liste non ordonnée

Vous pouvez aussi changer le type de bullet avec `list-style-type` :

| Valeur   | Résultat       |
| -------- | -------------- |
| `disc`   | • (par défaut) |
| `circle` | ○              |
| `square` | ▪              |

### Exemple :

```css
ul.circle {
  list-style-type: circle;
}
```

---

## 5. Conclusion

* `<ul>` et `<li>` servent à créer des listes non ordonnées.
* `list-style-type: none;` permet de **supprimer les points**.
* Pour un design plus moderne, on combine souvent cela avec Flexbox ou Grid pour créer des menus ou des cartes avec icônes.

---

**Astuce pratique :**
Si vous utilisez des icônes à la place des points, vous pouvez combiner `list-style-type: none;` et `display: flex;` sur les `<li>` pour aligner texte et icône facilement.

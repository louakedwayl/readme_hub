# Flexbox : La propriété `flex-direction`

La propriété `flex-direction` est utilisée avec **Flexbox** pour définir l'orientation principale des éléments enfants (les *flex items*) à l'intérieur d'un conteneur flex. Elle détermine **dans quel sens les éléments vont se placer**.

---

## 1. Syntaxe

```css
.container {
  display: flex;
  flex-direction: row | row-reverse | column | column-reverse;
}
```

* `row` (par défaut) : les éléments sont disposés **horizontalement de gauche à droite**.
* `row-reverse` : les éléments sont disposés **horizontalement de droite à gauche**.
* `column` : les éléments sont disposés **verticalement de haut en bas**.
* `column-reverse` : les éléments sont disposés **verticalement de bas en haut**.

---

## 2. Exemples

### a) `row` (par défaut)

```html
<div class="container">
  <div>1</div>
  <div>2</div>
  <div>3</div>
</div>
```

```css
.container {
  display: flex;
  flex-direction: row;
}
```

* Résultat : `1 2 3` horizontalement.

---

### b) `row-reverse`

```css
.container {
  display: flex;
  flex-direction: row-reverse;
}
```

* Résultat : `3 2 1` horizontalement (inversé).

---

### c) `column`

```css
.container {
  display: flex;
  flex-direction: column;
}
```

* Résultat :

```
1
2
3
```

* Les éléments s’empilent verticalement.

---

### d) `column-reverse`

```css
.container {
  display: flex;
  flex-direction: column-reverse;
}
```

* Résultat :

```
3
2
1
```

* Les éléments s’empilent verticalement **en inversant l’ordre**.

---

## 3. Points importants

1. La propriété `flex-direction` définit **l’axe principal** du conteneur :

   * `row` → axe principal horizontal
   * `column` → axe principal vertical

2. L’orientation de l’axe secondaire (axe perpendiculaire) est gérée par `align-items`.

3. Les autres propriétés Flexbox comme `justify-content` suivent l’**axe principal**, donc elles changent de comportement selon `flex-direction`.

---

## 4. Exemple complet avec styles

```html
<div class="container">
  <div class="item">A</div>
  <div class="item">B</div>
  <div class="item">C</div>
</div>
```

```css
.container {
  display: flex;
  flex-direction: column; /* changer en row, row-reverse, column-reverse pour tester */
  justify-content: center;
  align-items: center;
  height: 200px;
  border: 2px solid black;
}

.item {
  background: lightblue;
  padding: 10px;
  margin: 5px;
}
```

* En changeant `flex-direction`, tu verras les éléments se déplacer selon l’orientation principale définie.

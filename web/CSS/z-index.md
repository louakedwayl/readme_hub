# Comprendre le `z-index` en CSS

Le `z-index` est une propriété CSS qui contrôle **l'empilement des éléments** sur l'axe z (profondeur) dans une page web. Il permet de déterminer quel élément doit apparaître **au-dessus** ou **en dessous** d'un autre.

---

## 1. Concept de base

* Tous les éléments HTML sont **empilés par défaut** en fonction de leur ordre dans le DOM.
* Le `z-index` fonctionne **uniquement sur les éléments positionnés**, c’est-à-dire ayant :

  ```css
  position: relative;
  position: absolute;
  position: fixed;
  position: sticky;
  ```
* Plus la valeur du `z-index` est **élevée**, plus l'élément sera affiché **au-dessus** des autres.

```css
div {
  position: relative;
  z-index: 1; /* cet élément sera au-dessus de ceux avec z-index inférieur */
}
```

---

## 2. Syntaxe

```css
z-index: auto | nombre;
```

* `auto` : valeur par défaut, l’élément suit l’ordre normal du DOM.
* `nombre` : peut être **positif, négatif ou zéro**.

  * Positif : élément devant les autres.
  * Négatif : élément derrière les autres.
  * 0 : neutre, équivalent à la valeur par défaut si pas d'autres éléments.

---

## 3. Exemple simple

```html
<div class="fond"></div>
<div class="milieu"></div>
<div class="avant"></div>
```

```css
.fond {
  position: relative;
  width: 100px;
  height: 100px;
  background: blue;
  z-index: 1;
}

.milieu {
  position: relative;
  width: 100px;
  height: 100px;
  background: green;
  margin-top: -50px;
  z-index: 2;
}

.avant {
  position: relative;
  width: 100px;
  height: 100px;
  background: red;
  margin-top: -50px;
  z-index: 3;
}
```

➡️ Résultat : Le carré rouge est **au-dessus** du vert, et le vert est **au-dessus** du bleu.

---

## 4. Notes importantes

### a) Contexte d’empilement

Chaque élément crée un **contexte d’empilement** si :

* Il est positionné et a un `z-index` différent de `auto`.
* Certains éléments CSS modernes (`opacity < 1`, `transform`, `filter`, `flex`, `grid`) peuvent créer un **nouveau contexte d’empilement**, ce qui peut modifier l’effet du `z-index`.

### b) Valeurs négatives

```css
.element {
  position: relative;
  z-index: -1; /* passe derrière les autres éléments */
}
```

### c) Pas de position, pas de `z-index`

Si un élément n’a **pas de `position` définie**, le `z-index` ne fonctionne pas.

---

## 5. Bonnes pratiques

1. Utiliser des valeurs simples : 1, 2, 3… plutôt que des nombres gigantesques.
2. Comprendre le contexte d’empilement pour éviter des surprises.
3. Éviter d’utiliser `z-index` négatif sur des éléments critiques.
4. Pour les menus ou modales, définir un `z-index` **suffisamment élevé** pour qu’ils apparaissent au-dessus du reste.

---

## 6. Exemples avancés

### Modal

```css
.modal-background {
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background: rgba(0,0,0,0.5);
  z-index: 1000;
}

.modal-content {
  position: fixed;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  z-index: 1001;
  background: white;
  padding: 20px;
}
```

➡️ La **fenêtre modale** apparaît **au-dessus du fond sombre** grâce à un `z-index` plus élevé.

---

## 7. Résumé

* Le `z-index` contrôle **l’ordre des éléments en profondeur**.
* Fonctionne uniquement sur les éléments **positionnés**.
* Plus la valeur est grande → plus l’élément est **au premier plan**.
* Comprendre le **contexte d’empilement** est crucial pour éviter les bugs visuels.

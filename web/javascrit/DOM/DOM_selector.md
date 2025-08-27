# DOM Selectors

En JavaScript, un **sélecteur** est un moyen de **trouver un ou plusieurs éléments HTML** dans la page afin de pouvoir les manipuler. Il existe plusieurs méthodes pour sélectionner des éléments dans le DOM.

---

## 1️⃣ Sélecteur par ID

### Syntaxe

```js
const element = document.getElementById("mon-id");
```

### Caractéristiques

* Sélectionne **un seul élément** dont l’attribut `id` correspond exactement.
* Retourne directement l’élément (pas un tableau).
* L’id doit être **unique dans la page**.

### Exemple

```html
<input id="todo-1" type="checkbox">
```

```js
const checkbox = document.getElementById("todo-1");
checkbox.checked = true; // coche la checkbox
```

---

## 2️⃣ Sélecteur par classe

### Syntaxe

```js
const elements = document.getElementsByClassName("ma-classe");
```

### Caractéristiques

* Sélectionne **tous les éléments** ayant cette classe.
* Retourne une **HTMLCollection**, qu’on peut parcourir avec un index.
* Attention : ce n’est **pas un tableau JS**, mais un objet semblable à un tableau.

### Exemple

```html
<label class="form-check-label">Tâche 1</label>
<label class="form-check-label">Tâche 2</label>
```

```js
const labels = document.getElementsByClassName("form-check-label");
labels[0].innerText = "Nouvelle Tâche"; // modifie le premier label
```

---

## 3️⃣ Sélecteur par nom de balise

### Syntaxe

```js
const elements = document.getElementsByTagName("li");
```

* Sélectionne **tous les éléments d’une balise donnée**.
* Retourne également une **HTMLCollection**.

### Exemple

```html
<li>Tâche 1</li>
<li>Tâche 2</li>
```

```js
const listItems = document.getElementsByTagName("li");
listItems[1].innerText = "Tâche modifiée";
```

---

## 4️⃣ Sélecteur CSS avec `querySelector` et `querySelectorAll`

### Syntaxe

```js
const element = document.querySelector("sélecteur-css"); // premier élément correspondant
const elements = document.querySelectorAll("sélecteur-css"); // tous les éléments correspondants
```

### Caractéristiques

* Permet d’utiliser **tout le pouvoir des sélecteurs CSS**.
* `querySelector` retourne **le premier élément correspondant**.
* `querySelectorAll` retourne **une NodeList** (itérable avec `forEach`).

### Exemples

```html
<label for="todo-1">Tâche 1</label>
<label for="todo-2">Tâche 2</label>
```

```js
// Sélectionne le label associé à l'input id="todo-1"
const label1 = document.querySelector('label[for="todo-1"]');
label1.innerText = "Nouvelle tâche";

// Sélectionne tous les labels
const allLabels = document.querySelectorAll('label[for^="todo"]');
allLabels.forEach(l => l.style.color = "blue");
```

💡 Astuce : Les sélecteurs CSS permettent des sélections très précises, comme :

* `#id` → par ID
* `.classe` → par classe
* `tag` → par balise
* `parent > child` → enfant direct
* `[attribut="valeur"]` → par attribut

---

## 5️⃣ Résumé rapide

| Méthode                             | Retour                    | Usage                                                     |
| ----------------------------------- | ------------------------- | --------------------------------------------------------- |
| `getElementById("id")`              | 1 élément                 | Id unique obligatoire                                     |
| `getElementsByClassName("classe")`  | HTMLCollection            | Tous les éléments avec cette classe                       |
| `getElementsByTagName("tag")`       | HTMLCollection            | Tous les éléments de cette balise                         |
| `querySelector("sélecteur-css")`    | 1er élément correspondant | Très flexible avec sélecteurs CSS                         |
| `querySelectorAll("sélecteur-css")` | NodeList                  | Tous les éléments correspondants, itérable avec `forEach` |

---

## 6️⃣ Exemple complet

```html
<ul>
  <li>
    <input id="todo-1" type="checkbox">
    <label for="todo-1">Faire la vaisselle</label>
  </li>
  <li>
    <input id="todo-2" type="checkbox">
    <label for="todo-2">Passer l'aspirateur</label>
  </li>
</ul>
```

```js
// Modifier le texte du premier label
document.querySelector('label[for="todo-1"]').innerText = "Nouvelle tâche";

// Modifier tous les labels
document.querySelectorAll('label[for^="todo"]').forEach(l => l.style.color = "red");
```

---


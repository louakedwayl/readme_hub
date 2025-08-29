# 🎯 Les éléments `select` et `option` en HTML

## 📌 Introduction

En HTML, les éléments `<select>` et `<option>` sont utilisés pour créer des **listes déroulantes**. Ces listes permettent à l’utilisateur de **choisir une ou plusieurs options** dans un formulaire.

---

## 🛠️ Structure de base

```html
<form>
  <label for="fruits">Choisissez un fruit :</label>
  <select id="fruits" name="fruits">
    <option value="apple">Pomme</option>
    <option value="banana">Banane</option>
    <option value="orange">Orange</option>
  </select>
  <button type="submit">Envoyer</button>
</form>
```

- `<select>` : conteneur de la liste déroulante.
- `id` et `name` : permettent d’identifier et de récupérer la valeur.
- `<option>` : chaque élément représente un choix disponible.
- `value` : valeur envoyée lors de la soumission du formulaire.
- Le texte entre `<option>` et `</option>` est ce qui est affiché à l’utilisateur.

---

## 🔹 Sélection par défaut

```html
<option value="apple" selected>Pomme</option>
```

- L’attribut `selected` définit l’option affichée par défaut.

---

## 🔹 Désactiver une option

```html
<option value="orange" disabled>Orange</option>
```

- L’attribut `disabled` rend l’option **non sélectionnable**.

---

## 🔹 Sélection multiple

```html
<select id="fruits" name="fruits" multiple>
  <option value="apple">Pomme</option>
  <option value="banana">Banane</option>
  <option value="orange">Orange</option>
</select>
```

- L’attribut `multiple` permet de **sélectionner plusieurs options** en maintenant la touche Ctrl (ou Cmd sur Mac).

---

## 🔹 Récupérer la valeur avec JavaScript

```html
<select id="fruits">
  <option value="apple">Pomme</option>
  <option value="banana">Banane</option>
  <option value="orange">Orange</option>
</select>
<button id="btn">Afficher</button>

<script>
  const select = document.getElementById("fruits");
  const button = document.getElementById("btn");

  button.addEventListener("click", () => {
    console.log(select.value); // Valeur de l'option sélectionnée
  });
</script>
```

- `select.value` retourne la **valeur de l’option sélectionnée**.
- Pour plusieurs sélections, il faut parcourir `select.selectedOptions`.

---

## 🔹 Exemple avec sélection multiple

```js
const select = document.getElementById("fruits");
const selected = Array.from(select.selectedOptions).map(option => option.value);
console.log(selected); // tableau des valeurs sélectionnées
```

---

## ✅ Bonnes pratiques

- Toujours associer `<label>` avec `for` pour l’accessibilité.
- Définir une option par défaut si nécessaire.
- Utiliser `value` pour envoyer des données cohérentes au serveur.
- Pour plusieurs sélections, informer l’utilisateur qu’il peut utiliser Ctrl/Cmd.

---


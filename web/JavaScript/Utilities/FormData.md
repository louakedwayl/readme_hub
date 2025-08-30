# 🎯 La classe FormData en JavaScript

## 📌 Introduction

La classe **`FormData`** permet de collecter et manipuler les données d’un formulaire HTML facilement. Elle est très utile pour envoyer les données via AJAX ou Fetch API sans recharger la page.

---

## 🛠️ Création d’un objet FormData

### 1. À partir d’un formulaire existant

```html
<form id="myForm">
  <input type="text" name="username" placeholder="Nom">
  <input type="email" name="email" placeholder="Email">
  <button type="submit">Envoyer</button>
</form>
```

```js
const form = document.getElementById("myForm");
const formData = new FormData(form);
```

- `new FormData(form)` crée un objet contenant **tous les champs du formulaire**.
- Les champs désactivés (`disabled`) **ne sont pas inclus**.

### 2. À partir de zéro

```js
const formData = new FormData();
formData.append("username", "Alice");
formData.append("email", "alice@example.com");
```

- `append(name, value)` ajoute un champ.
- On peut ajouter plusieurs fois le même `name` (utile pour les fichiers multiples ou checkboxes).

---

## 🔄 Méthodes utiles

| Méthode             | Description |
|--------------------|-------------|
| `append(name, value)` | Ajoute une entrée. |
| `delete(name)`        | Supprime l’entrée avec ce nom. |
| `get(name)`           | Retourne la première valeur associée au nom. |
| `getAll(name)`        | Retourne toutes les valeurs associées au nom. |
| `has(name)`           | Vérifie si le nom existe. |
| `set(name, value)`    | Remplace la valeur existante ou ajoute si elle n’existe pas. |
| `entries()`           | Retourne un itérateur `[name, value]` pour parcourir toutes les données. |
| `keys()`              | Retourne un itérateur sur tous les noms. |
| `values()`            | Retourne un itérateur sur toutes les valeurs. |
| `forEach(callback)`   | Parcourt toutes les paires clé/valeur. |

---

## 📋 Exemple pratique : lecture des données

```js
form.addEventListener("submit", (event) => {
  event.preventDefault();
  const formData = new FormData(event.currentTarget);

  // Afficher toutes les données
  formData.forEach((value, key) => {
    console.log(key, value);
  });
});
```

---

## 🌐 Envoi via Fetch

```js
form.addEventListener("submit", (event) => {
  event.preventDefault();
  const formData = new FormData(event.currentTarget);

  fetch("/submit", {
    method: "POST",
    body: formData
  })
  .then(response => response.json())
  .then(data => console.log("Réponse serveur :", data))
  .catch(error => console.error(error));
});
```

- `FormData` peut être envoyé directement dans le **body** d’une requête `POST`.  
- Les données sont encodées en **`multipart/form-data`** par défaut.

---

## 💡 Astuces

- Pour inclure des fichiers : `<input type="file" name="photo">` → `FormData` les gère automatiquement.  
- Pour ajouter un fichier depuis JavaScript :

```js
const fileInput = document.querySelector('input[type="file"]');
formData.append("photo", fileInput.files[0]);
```

- `FormData` est idéal pour **éviter le rechargement de page** et gérer les formulaires avec JavaScript.  
- Les champs `disabled` ou les boutons `<button type="submit">` **ne sont pas inclus**.

---

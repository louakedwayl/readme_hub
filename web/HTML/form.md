# 🎯 La balise `<form>` en HTML

## 📌 Introduction

La balise `<form>` permet de créer un **formulaire** dans une page web, utilisé pour **envoyer des données à un serveur** ou pour **interactions côté client** avec JavaScript.  

Un formulaire peut contenir des **champs de saisie**, des **boutons**, des **menus déroulants**, des **cases à cocher**, et d’autres éléments interactifs.

### À propos de la balise `<form>`

- La balise `<form>` **ne crée aucun champ visible**.  
- Les éléments visibles d’un formulaire sont : `<input>`, `<textarea>`, `<select>`, `<button>`, etc.  
- `<form>` sert **à regrouper ces éléments** et à définir **comment envoyer ou traiter les données** (via `action`, `method` ou événements JavaScript).  

💡 En pratique :  
On peut techniquement créer un "formulaire" avec seulement des `<input>` et `<label>` sans `<form>`.  

### Mais sans `<form>` :  
- Pas d’envoi automatique des données au serveur (`submit`).  
- On perd les événements globaux comme `submit` ou `reset`.  
- L’accessibilité peut être moins bonne.

---

## 🛠️ Structure de base

```html
<form action="/submit" method="post">
  <label for="name">Nom :</label>
  <input type="text" id="name" name="name" />

  <label for="email">Email :</label>
  <input type="email" id="email" name="email" />

  <button type="submit">Envoyer</button>
</form>
```

### Explications

- **`action`** : URL vers laquelle les données du formulaire sont envoyées.  
- **`method`** : méthode HTTP utilisée (`GET` ou `POST`).  
- **`name`** : identifiant du champ, utilisé lors de l’envoi des données.  
- **`id`** : identifiant unique dans le DOM, utile pour `<label>` et JS.  
- **`type`** : type de champ (`text`, `email`, `password`, `checkbox`, etc.).

---

## 🎯 Types d’éléments courants

| Élément          | Description                                   |
|-----------------|-----------------------------------------------|
| `<input>`        | Champ de saisie (texte, email, mot de passe…)|
| `<textarea>`     | Zone de texte multi-lignes                    |
| `<select>`       | Liste déroulante                              |
| `<option>`       | Option dans une liste déroulante             |
| `<button>`       | Bouton (submit, reset ou button)             |
| `<label>`        | Étiquette pour un champ                       |
| `<fieldset>`     | Regroupe des champs liés                     |
| `<legend>`       | Légende d’un fieldset                        |

---

## 📋 Événements courants avec `<form>`

- **`submit`** → déclenché lors de l’envoi du formulaire.
- **`reset`** → déclenché lors de la réinitialisation du formulaire.
- **`input`** → déclenché à chaque modification d’un champ.
- **`change`** → déclenché lorsque la valeur d’un champ change et perd le focus.
- **`focus` / `blur`** → focus ou perte de focus sur un champ.

### Exemple JavaScript

```html
<form id="myForm">
  <input type="text" name="username" placeholder="Nom">
  <button type="submit">Envoyer</button>
</form>

<script>
const form = document.getElementById("myForm");

form.addEventListener("submit", (event) => {
  event.preventDefault(); // empêche l'envoi réel
  console.log("Formulaire soumis !");
});
</script>
```

---

## ✅ Bonnes pratiques

- Toujours utiliser `<label>` pour chaque champ pour **l’accessibilité**.  
- Utiliser `type` approprié pour chaque `<input>` pour **validation automatique**.  
- Valider les données **côté client** et **côté serveur**.  
- Utiliser `name` pour que les données soient correctement envoyées au serveur.  
- Ne pas oublier `event.preventDefault()` si tu veux **gérer l’envoi avec JavaScript** sans recharger la page.

---

## 🌐 Méthodes et propriétés utiles en JavaScript

- **`form.submit()`** → envoie le formulaire par JS.  
- **`form.reset()`** → réinitialise les champs.  
- **`form.elements`** → tableau des champs du formulaire.  
- **`form.length`** → nombre de champs.  
- **`form.checkValidity()`** → vérifie la validité des champs.

---

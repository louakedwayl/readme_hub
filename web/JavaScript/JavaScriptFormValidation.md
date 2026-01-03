# Validation des formulaires en JavaScript

La **validation des formulaires** est essentielle pour garantir que les données envoyées par l’utilisateur sont correctes avant d’être traitées côté serveur. La validation peut se faire **en front-end (JavaScript)** et/ou **en back-end (PHP, Node.js, etc.)**.

---

## 1. Pourquoi valider un formulaire ?

1. **Sécurité** : Empêcher l’injection de code ou des données malveillantes.
2. **Qualité des données** : S’assurer que les informations reçues sont dans le bon format.
3. **Expérience utilisateur** : Informer l’utilisateur immédiatement des erreurs, sans attendre la réponse du serveur.

---

## 2. Les types de validation

### a) Validation simple (HTML5)

HTML5 propose des attributs pour vérifier certains formats de données automatiquement :

```html
<form id="form">
  <input type="text" name="username" required minlength="3" maxlength="20">
  <input type="email" name="email" required>
  <input type="password" name="password" required pattern=".{6,}">
  <button type="submit">Envoyer</button>
</form>
```

* `required` : le champ doit être rempli
* `minlength` / `maxlength` : longueur minimale/maximale
* `pattern` : regex pour le format exact
* `type="email"` : vérifie automatiquement un format email

⚠️ **Limitation** : HTML5 ne suffit pas pour les validations complexes ou personnalisées.

---

### b) Validation avec JavaScript

JavaScript permet de créer une validation **plus flexible et interactive**.

#### Étape 1 : Sélectionner le formulaire et empêcher l’envoi par défaut

```javascript
const form = document.getElementById('form');

form.addEventListener('submit', function(e) {
  e.preventDefault(); // Empêche l'envoi automatique du formulaire
  validateForm();     // Appelle la fonction de validation
});
```

---

#### Étape 2 : Créer la fonction de validation

```javascript
function validateForm() {
  const username = document.querySelector('input[name="username"]').value.trim();
  const email = document.querySelector('input[name="email"]').value.trim();
  const password = document.querySelector('input[name="password"]').value.trim();

  let errors = [];

  // Vérifier le username
  if (username.length < 3) {
    errors.push("Le nom doit contenir au moins 3 caractères.");
  }

  // Vérifier l'email avec regex
  const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
  if (!emailRegex.test(email)) {
    errors.push("Email invalide.");
  }

  // Vérifier le mot de passe
  if (password.length < 6) {
    errors.push("Le mot de passe doit contenir au moins 6 caractères.");
  }

  // Afficher les erreurs ou soumettre
  if (errors.length > 0) {
    alert(errors.join("\n")); // Affiche toutes les erreurs
  } else {
    form.submit(); // Soumission du formulaire si tout est correct
  }
}
```

---

## 3. Validation en temps réel

Pour améliorer l’expérience utilisateur, tu peux vérifier les champs **au moment où l’utilisateur tape** :

```javascript
const usernameInput = document.querySelector('input[name="username"]');

usernameInput.addEventListener('input', function() {
  if (usernameInput.value.length < 3) {
    usernameInput.style.borderColor = 'red';
  } else {
    usernameInput.style.borderColor = 'green';
  }
});
```

---

## 4. Bonnes pratiques

1. Toujours valider **en front-end et back-end**.
2. Ne jamais faire confiance aux données envoyées par l’utilisateur.
3. Afficher des messages d’erreur clairs et précis.
4. Éviter les alertes pour les erreurs complexes, préférer un affichage dans le HTML :

```html
<div id="errors" style="color:red"></div>
```

```javascript
document.getElementById('errors').innerHTML = errors.join('<br>');
```

5. Utiliser des regex pour valider les emails, numéros de téléphone, codes postaux, etc.
6. Séparer la logique de validation dans une fonction distincte pour rendre le code plus propre.

---

## 5. Exemples de regex utiles

| Type                  | Regex exemple                              | Description         |
| --------------------- | ------------------------------------------ | ------------------- |
| Email                 | `/^[^\s@]+@[^\s@]+\.[^\s@]+$/`             | Format email simple |
| Mot de passe sécurisé | `/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{6,}$/` | Lettres + chiffres  |
| Numéro de téléphone   | `/^\d{10}$/`                               | 10 chiffres         |
| Nom                   | `/^[A-Za-zÀ-ÿ\s'-]+$/`                     | Lettres et accents  |

---

## 6. Exemple complet : empêcher la soumission si erreur

```javascript
form.addEventListener('submit', function(e) {
  e.preventDefault();

  if (validateForm()) { // validateForm retourne true si tout est correct
    form.submit();
  }
});

function validateForm() {
  let isValid = true;
  const errors = [];

  // Exemple : validation username
  const username = document.querySelector('input[name="username"]').value.trim();
  if (username.length < 3) {
    errors.push("Nom trop court");
    isValid = false;
  }

  // afficher les erreurs
  document.getElementById('errors').innerHTML = errors.join('<br>');
  return isValid;
}
```

---

Ce cours couvre **tous les aspects essentiels** pour valider un formulaire en JavaScript, du simple HTML5 à la validation avancée avec JS et regex.

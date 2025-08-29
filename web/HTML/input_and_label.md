# 🎯 Les balises `<input>` et `<label>` en HTML

## 📌 Introduction

Les balises `<input>` et `<label>` sont les éléments principaux pour créer des **champs de saisie interactifs** dans un formulaire.  
- `<input>` : permet de saisir ou sélectionner une donnée.  
- `<label>` : fournit une **étiquette descriptive** pour un champ et améliore l’**accessibilité**.

---

## 🛠️ La balise `<input>`

### Syntaxe de base

```html
<input type="text" id="nom" name="nom" placeholder="Votre nom">
```

### Attributs courants

| Attribut       | Description |
|----------------|-------------|
| `type`         | Définit le type de champ (`text`, `email`, `password`, `number`, `checkbox`, `radio`, `date`, `file`, etc.) |
| `id`           | Identifiant unique pour le DOM et pour lier un `<label>` |
| `name`         | Nom utilisé lors de l’envoi du formulaire |
| `value`        | Valeur initiale du champ |
| `placeholder`  | Texte d’exemple affiché dans le champ |
| `required`     | Rend le champ obligatoire |
| `readonly`     | Champ non modifiable |
| `disabled`     | Champ désactivé (non utilisable) |
| `maxlength`    | Longueur maximale autorisée |
| `min` / `max`  | Valeurs minimale et maximale pour certains types (`number`, `date`) |

### Exemples

```html
<input type="text" name="username" placeholder="Nom d'utilisateur" required>
<input type="email" name="email" placeholder="Adresse email">
<input type="password" name="password" placeholder="Mot de passe">
<input type="number" name="age" min="1" max="120">
<input type="checkbox" name="newsletter"> S'abonner à la newsletter
<input type="radio" name="sexe" value="homme"> Homme
<input type="radio" name="sexe" value="femme"> Femme
```

---

## 🛠️ La balise `<label>`

### Syntaxe

```html
<label for="id_du_champ">Texte de l’étiquette</label>
```

- L’attribut **`for`** doit correspondre à l’`id` de l’`<input>`.  
- Cliquer sur le `<label>` **active automatiquement le champ associé** (utile pour les checkbox et radio).  

### Exemple

```html
<label for="username">Nom :</label>
<input type="text" id="username" name="username">

<label>
  <input type="checkbox" name="newsletter">
  S'abonner à la newsletter
</label>
```

- Le second exemple montre la **méthode imbriquée** où le `<input>` est à l’intérieur du `<label>` (plus simple pour checkbox/radio).

---

## 📋 Bonnes pratiques

- Toujours associer un `<label>` à chaque `<input>` pour **l’accessibilité**.  
- Utiliser des **types d’`input` adaptés** (`email` pour email, `number` pour nombres…).  
- Ajouter `required` pour les champs obligatoires.  
- Utiliser `placeholder` comme **aide visuelle**, mais jamais comme seul moyen d’indication.  
- Pour les checkbox et radio, préférer l’**association `<label>` + `<input>`** pour améliorer l’expérience utilisateur.

---

## 🌐 Événements JavaScript courants

- `input` → déclenché à chaque modification du champ.  
- `change` → déclenché lorsque la valeur change et que le champ perd le focus.  
- `focus` / `blur` → lorsqu’un champ gagne ou perd le focus.  
- `keydown` / `keyup` → pour intercepter les touches du clavier.  

### Exemple JS

```html
<input type="text" id="username" placeholder="Nom">

<script>
const input = document.getElementById("username");

input.addEventListener("input", (e) => {
  console.log("Valeur actuelle :", e.target.value);
});
</script>
```

---

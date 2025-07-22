# Introduction au JavaScript

## 1. Qu’est-ce que JavaScript ?

**JavaScript (JS)** est un **langage de programmation** :
- utilisé pour rendre les **pages web interactives**,
- **exécuté dans le navigateur** (Chrome, Firefox...),
- aussi utilisé côté serveur via **Node.js**.

🔹 Exemples d’usages : menus dynamiques, formulaires, animations, jeux, applications web (Gmail, Discord...).

---

## 2. Fonctionnement dans une page HTML

Le code JS est placé entre des balises `<script>` :

```html
<!DOCTYPE html>
<html>
  <head><title>Exemple</title></head>
  <body>
    <h1>Hello World</h1>

    <script>
      alert("Bienvenue sur ma page !");
    </script>
  </body>
</html>
```

---

## 3. Les bases du langage

### Déclaration de variables

```js
let nom = "Alice";     // variable modifiable
const age = 25;        // constante
var ancien = true;     // ancienne syntaxe
```

### Types de données

| Type             | Exemple              |
|------------------|----------------------|
| String (texte)   | "Bonjour"            |
| Number (nombre)  | 42, 3.14             |
| Boolean (booléen)| true, false          |
| Array (tableau)  | [1, 2, 3]            |
| Object (objet)   | { nom: "Alice" }     |
| null / undefined | null, undefined      |

---

## 4. Opérations

```js
let a = 10;
let b = 3;

let somme = a + b;
let produit = a * b;
let estPair = a % 2 == 0;
```

---

## 5. Conditions

```js
if (age >= 18) 
{
  console.log("Majeur");
} 
else 
{
  console.log("Mineur");
}
```

---

## 6. Boucles

### Boucle for

```js
for (let i = 0; i < 5; i++) 
{
  console.log("i =", i);
}
```

### Boucle while

```js
let i = 0;
while (i < 5) 
{
  console.log(i);
  i++;
}
```

---

## 7. Fonctions

```js
function direBonjour(nom) 
{
  return "Bonjour " + nom;
}

console.log(direBonjour("Ming Lee"));
```

---

## 🎯 8. Interagir avec la page (DOM)

```html
<button onclick="clique()">Clique-moi</button>

<script>
  function clique() 
{
    alert("Tu as cliqué !");
}
</script>
```


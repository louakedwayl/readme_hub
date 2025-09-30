# Le JSON (JavaScript Object Notation)

## 1. Introduction

**JSON** (JavaScript Object Notation) est un format léger d’échange de données.  
Il est **lisible par les humains** et **facile à interpréter par les machines**.

Il est très utilisé dans :
- Les **API web** (envoi/réception de données entre client et serveur).
- Le **stockage** de données (fichiers de configuration).
- La **sérialisation** d’objets.

---

## 2. Syntaxe de base

Un document JSON est une collection de **paires clé/valeur** ou une **liste de valeurs**.

### Exemple d’objet JSON

```json
{
  "nom": "Alice",
  "age": 25,
  "etudiant": true
}
```

### Exemple de tableau JSON

```json
[
  "pomme",
  "banane",
  "cerise"
]
```

---

## 3. Types de données supportés

En JSON, on retrouve seulement quelques types :

- **Chaîne de caractères** (string) : `"texte"`
- **Nombre** (number) : `42`, `3.14`
- **Booléen** (boolean) : `true` ou `false`
- **Objet** (object) : `{ "clé": "valeur" }`
- **Tableau** (array) : `[ 1, 2, 3 ]`
- **Null** : `null`

---

## 4. Exemple structuré

```json
{
  "utilisateur": {
    "id": 1,
    "nom": "Wayl",
    "langages": ["JavaScript", "Python", "C"],
    "actif": true
  }
}
```

---

## 5. JSON vs JavaScript

- En **JavaScript**, un objet peut contenir des **fonctions** ou des **symboles**.
- En **JSON**, seules les données brutes sont stockées → **pas de fonctions**.

Exemple :

```js
// Objet JavaScript
const user = {
  name: "Alice",
  greet: function() { console.log("Salut !"); }
};

// JSON (équivalent simplifié)
{
  "name": "Alice"
}
```

---

## 6. Conversion en JavaScript

- **Objet → JSON (chaîne de caractères)** :
```js
const obj = { nom: "Alice", age: 25 };
const jsonString = JSON.stringify(obj);
console.log(jsonString); // {"nom":"Alice","age":25}
```

- **JSON → Objet JavaScript** :
```js
const data = '{"nom":"Alice","age":25}';
const obj = JSON.parse(data);
console.log(obj.nom); // Alice
```

---

## 7. Utilisations courantes

✅ Réponse d’API (`fetch` en JS).  
✅ Sauvegarde de préférences utilisateur.  
✅ Configuration de projets (fichiers `package.json`, `tsconfig.json` etc.).  

---

## 8. Bonnes pratiques

- Les **clés** doivent toujours être entre guillemets doubles `"`.  
- Pas de **virgule finale** après le dernier élément.  
- Bien valider la structure avec un **validateur JSON**.  

---

## 9. Schéma visuel

```
Objet JSON
{
  "clé": "valeur",
  "clé2": 42,
  "clé3": [ "val1", "val2" ]
}
```

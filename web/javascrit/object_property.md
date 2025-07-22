# Les Propriétés en JavaScript

## 📌 Définition

En JavaScript, **une propriété** est une association entre un **nom (clé)** et une **valeur** sur un objet. Elle peut contenir **une valeur primitive**, une **fonction (méthode)** ou un autre objet.

```js
const personne = {
  nom: "Mei-ling",
  age: 25
};
```

Dans cet exemple :
- `nom` est une propriété contenant la chaîne `"Ming"`
- `age` est une propriété contenant le nombre `25`

---

## 🧠 Accéder aux propriétés

### 1. Accès par point
```js
console.log(personne.nom); // "Ming"
```

### 2. Accès par crochets
```js
console.log(personne["age"]); // 25
```

> 🔸 L'accès par crochets est utile quand le nom de la propriété est dynamique ou contient des caractères spéciaux.

---

## 🧩 Ajouter / Modifier une propriété

### Ajouter :
```js
personne.ville = "Paris";
```

### Modifier :
```js
personne.age = 30;
```

---

## ❌ Supprimer une propriété

```js
delete personne.nom;
```

---

## 🔄 Propriétés dynamiques

```js
const cle = "email";
personne[cle] = "ming@exemple.com";
```

---

## 🔍 Lister les propriétés

```js
console.log(Object.keys(personne)); // ["age", "ville", "email"]
```

---

## ✅ Vérifier l'existence d'une propriété

```js
console.log("ville" in personne); // true
```

---

## 🛠️ Définir une propriété avec `Object.defineProperty`

```js
Object.defineProperty(personne, "sexe", {
  value: "non spécifié",
  writable: true,
  enumerable: true,
  configurable: true
});
```

---

## 🔐 Propriétés et encapsulation

En JS moderne (ES6+), on peut simuler des propriétés privées avec `#` :
```js
class Compte {
  #solde = 0;

  getSolde() {
    return this.#solde;
  }

  deposer(valeur) {
    if (valeur > 0) this.#solde += valeur;
  }
}
```

---

## 📦 Résumé

| Action                | Syntaxe                          |
|-----------------------|----------------------------------|
| Accès point           | `obj.prop`                      |
| Accès crochets        | `obj["prop"]`                   |
| Ajout/modification    | `obj.prop = valeur`             |
| Suppression           | `delete obj.prop`               |
| Vérification          | `"prop" in obj`                 |
| Définition avancée    | `Object.defineProperty()`       |

---

## 🧪 Exemple complet

```js
const voiture = {
  marque: "Toyota",
  modele: "Corolla",
  annee: 2020
};

voiture.couleur = "rouge";
console.log(voiture);
```

---

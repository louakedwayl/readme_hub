# L'objet global `JSON` en JavaScript

JavaScript dispose d'un **objet global `JSON`** qui permet de travailler facilement avec le format JSON (JavaScript Object Notation). Il est intégré directement dans le langage, il n'y a donc pas besoin de l'importer.

---

## 1. Méthodes principales

| Méthode                 | Description                                                                        |
| ----------------------- | ---------------------------------------------------------------------------------- |
| `JSON.stringify(value)` | Convertit une valeur JavaScript (objet, tableau, nombre, etc.) en **chaîne JSON**. |
| `JSON.parse(text)`      | Convertit une **chaîne JSON** en valeur JavaScript (objet, tableau, etc.).         |

---

## 2. Exemples

### a) `JSON.stringify`

```javascript
const obj = { nom: "Alice", age: 25 };
const jsonStr = JSON.stringify(obj);
console.log(jsonStr); // {"nom":"Alice","age":25}
```

### b) `JSON.parse`

```javascript
const jsonStr = '{"nom":"Alice","age":25}';
const obj = JSON.parse(jsonStr);
console.log(obj.nom); // Alice
console.log(obj.age); // 25
```

### c) Utilisation avec tableaux

```javascript
const arr = [1, 2, 3, 4];
const jsonArr = JSON.stringify(arr);
console.log(jsonArr); // [1,2,3,4]

const parsedArr = JSON.parse(jsonArr);
console.log(parsedArr[0]); // 1
```

---

## 3. Points importants

1. `JSON.stringify()` ne peut pas convertir les **fonctions**, **symboles** ou **undefined**.
2. `JSON.parse()` lance une **erreur** si la chaîne n’est pas un JSON valide.
3. L’objet `JSON` est **global**, accessible dans tout le code JavaScript.
4. Très utilisé pour **échanger des données avec des API** ou pour stocker des données dans `localStorage`.

---

## 4. Comparaison avec PHP

| PHP                        | JavaScript             |
| -------------------------- | ---------------------- |
| `json_encode($data)`       | `JSON.stringify(data)` |
| `json_decode($json, true)` | `JSON.parse(json)`     |

> Les deux servent à convertir entre objets/arrays et chaînes JSON pour échanger des données.

---

## 5. Conclusion

L'objet `JSON` en JavaScript est essentiel pour travailler avec les **données structurées**, notamment pour la communication avec des serveurs via AJAX, Fetch API ou le stockage local. Sa simplicité et son intégration native en font un outil incontournable pour tout développeur JS.

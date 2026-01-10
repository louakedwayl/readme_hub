# Cours : La méthode `json()` en JavaScript

## 1️⃣ Introduction

La méthode **`json()`** est une méthode de l’objet **`Response`**, qui est retourné par **`fetch()`**.

Elle permet de **lire le corps de la réponse HTTP** et de **le convertir automatiquement en objet JavaScript** si le contenu est au format JSON.

---

## 2️⃣ Syntaxe

```js
response.json()
```

* **`response`** : objet `Response` retourné par `fetch`
* Retour : une **Promise** qui sera résolue avec **un objet JavaScript** représentant le JSON
* Asynchrone : il faut **`await`** ou `.then()` pour récupérer la valeur

---

## 3️⃣ Pourquoi `json()` est une Promise ?

* Le corps de la réponse (`body`) est un **flux de données (stream)**
* Il faut **lire entièrement le flux**
* Puis **parser le texte JSON**
* Même pour une petite réponse, ce processus est asynchrone → d’où la Promise

---

## 4️⃣ Exemple avec `async/await`

```js
async function getPost() {
  try {
    const response = await fetch("https://jsonplaceholder.typicode.com/posts/1");

    if (!response.ok) {
      throw new Error(`Erreur HTTP ${response.status}`);
    }

    const data = await response.json(); // data est un objet JS
    console.log(data);

  } catch (err) {
    console.error("Erreur :", err.message);
  }
}

getPost();
```

---

## 5️⃣ Exemple avec `.then()`

```js
fetch("https://jsonplaceholder.typicode.com/posts/1")
  .then(response => {
    if (!response.ok) throw new Error("Erreur HTTP " + response.status);
    return response.json();
  })
  .then(data => {
    console.log(data); // data est un objet JS
  })
  .catch(err => console.error("Erreur :", err.message));
```

---

## 6️⃣ Erreurs fréquentes

1️⃣ **Oublier `await` ou `return` dans `.then()`**

```js
const data = response.json(); // ❌ data est une Promise, pas l'objet
```

✅ Correct :

```js
const data = await response.json(); // await récupère la valeur réelle
```

ou

```js
return response.json().then(data => console.log(data));
```

2️⃣ **Lire le body deux fois**

```js
await response.json();
await response.text(); // ❌ erreur : body déjà consommé
```

3️⃣ **JSON invalide**

```js
const data = await response.json(); // ❌ SyntaxError si JSON mal formé
```

➡ Toujours prévoir un `try/catch`.

---

## 7️⃣ Méthodes similaires

| Méthode                  | Type de retour                 |
| ------------------------ | ------------------------------ |
| `response.json()`        | Promise → objet JS             |
| `response.text()`        | Promise → chaîne de caractères |
| `response.blob()`        | Promise → Blob                 |
| `response.arrayBuffer()` | Promise → ArrayBuffer          |
| `response.formData()`    | Promise → FormData             |

---

## 8️⃣ Résumé pratique

1. `json()` sert à **convertir le JSON d’une réponse en objet JS**
2. Toujours utiliser **`await`** ou **`.then()`**
3. Le corps **ne peut être lu qu’une seule fois**
4. Gérer les erreurs avec `try/catch` ou `.catch()`
5. Vérifier `response.ok` avant de parser le JSON pour gérer les erreurs HTTP

💡 **Astuce :** Pour des appels API répétitifs, il est souvent utile de créer une fonction générique :

```js
async function fetchJSON(url) {
  const response = await fetch(url);
  if (!response.ok) throw new Error(`Erreur HTTP ${response.status}`);
  return response.json();
}
```

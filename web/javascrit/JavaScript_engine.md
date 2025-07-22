# JavaScript Engine

---

## 🔹 1. Définition

Un **moteur JavaScript** est un **programme écrit en C/C++** qui sert à :

> ✅ **Lire**, ✅ **analyser**, ✅ **traduire** et ✅ **exécuter** le code JavaScript.

Sans moteur, ton code JavaScript **ne peut pas être compris ni exécuté** par l’ordinateur.

---

## 🔹 2. À quoi ça sert ?

Tu écris du code :

```js
console.log("Bonjour");
```

Mais ce code est **du texte**. Le moteur JavaScript le **transforme en instructions** que le processeur peut comprendre et exécuter.

---

## 🔹 3. Où trouve-t-on un moteur JavaScript ?

| Moteur JS        | Intégré dans…                |
|------------------|------------------------------|
| **V8**           | Google Chrome, Node.js       |
| **SpiderMonkey** | Mozilla Firefox              |
| **JavaScriptCore** | Apple Safari               |
| **Chakra**       | Ancien Microsoft Edge        |

> 🧠 Quand tu ouvres une page web, ton **navigateur** utilise son moteur JS pour faire tourner les scripts !

---

## 🔹 4. Que fait un moteur JavaScript ? (étapes)

### Étape 1 – Lecture (Parsing)  
Le moteur **analyse le code** caractère par caractère et construit une **structure** appelée *AST* (Abstract Syntax Tree).

### Étape 2 – Compilation  
Le moteur convertit l’AST en **bytecode** ou directement en **langage machine**.

- Certains moteurs utilisent un **interpréteur**
- D’autres utilisent un **JIT compiler** (*Just-In-Time* → compile pendant l'exécution)

### Étape 3 – Exécution  
Le code est **exécuté ligne par ligne** ou **optimisé** pour aller plus vite si nécessaire.

---

## 🔹 5. Exemple concret

```js
let nom = "Lee";
console.log(nom.toUpperCase());
```

Voici ce que fait le moteur :

1. Il **lit** le code
2. Il transforme `"Lee"` en un objet temporaire
3. Il exécute `toUpperCase()` (défini en C++ dans le moteur)
4. Il affiche `"LEE"` dans la console

---

## 🔹 6. Node.js et les moteurs

**Node.js** est un environnement qui permet d'exécuter JavaScript **en dehors du navigateur**.

> Node.js utilise le **moteur V8** (le même que dans Chrome) pour faire tourner du JS sur ton ordinateur.

---

## 🔹 7. Résumé visuel

```plaintext
Ton code JavaScript
        ↓
[Moteur JavaScript]
        ↓
Instructions machine exécutées par ton CPU
```

---

## 🔸 En résumé

- Le **moteur JavaScript** est essentiel : il transforme ton code en instructions exécutable.
- Il est **invisible pour toi**, mais sans lui ton code ne fait rien.
- Tu utilises déjà un moteur JS chaque fois que tu ouvres une page web ou exécutes un script Node.js.


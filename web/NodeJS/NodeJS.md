# Introduction à Node.js

## 🌍 Qu'est-ce que Node.js ?

**Node.js** est un **environnement d'exécution JavaScript côté serveur**.  
Contrairement au JavaScript classique exécuté dans un navigateur, Node.js permet d'exécuter du code JavaScript directement sur une machine, sans interface graphique.

Il est construit sur le **moteur V8 de Google Chrome**, ce qui le rend très rapide pour exécuter du code JavaScript.

---

## ⚙️ Pourquoi utiliser Node.js ?

### ✅ Avantages
- **Exécution rapide** grâce à V8 (moteur C++)  
- **Non bloquant** et **asynchrone**, idéal pour les applications temps réel (chat, API, etc.)  
- **Même langage** pour le front et le back (JavaScript)  
- **Énorme écosystème** de modules via **npm (Node Package Manager)**  
- **Facile à apprendre** pour ceux qui connaissent déjà JS  

### ❌ Inconvénients
- Moins performant pour les calculs lourds (CPU intensif)  
- Le code asynchrone peut être complexe à gérer sans bonnes pratiques  

---

## 📦 Installation

### 1. Télécharger Node.js
> https://nodejs.org/

### 2. Vérifier l'installation
```bash
node -v     # Affiche la version de Node.js
npm -v      # Affiche la version de npm
```

---

## 🧠 Concepts de base

### 1. Le module `fs`
Le module **fs** (File System) permet de manipuler les fichiers.

```js
const fs = require('fs');

// Lire un fichier
fs.readFile('texte.txt', 'utf8', (err, data) => {
  if (err) throw err;
  console.log(data);
});
```

---

### 2. Le module `http`
Créer un **serveur web** basique avec Node.js :

```js
const http = require('http');

const server = http.createServer((req, res) => {
  res.writeHead(200, { 'Content-Type': 'text/plain' });
  res.end('Hello, Node.js !');
});

server.listen(3000, () => {
  console.log('Serveur en écoute sur le port 3000');
});
```

Accède ensuite à [http://localhost:3000](http://localhost:3000)

---

### 3. Importer / Exporter des modules
#### Avec CommonJS (ancien système)
```js
// math.js
function addition(a, b) {
  return a + b;
}
module.exports = addition;

// main.js
const addition = require('./math');
console.log(addition(2, 3));
```

#### Avec ES Modules (nouvelle syntaxe)
```js
// math.mjs
export function addition(a, b) {
  return a + b;
}

// main.mjs
import { addition } from './math.mjs';
console.log(addition(2, 3));
```

---

## ⚡ Programmation asynchrone

Node.js repose sur un modèle **asynchrone non bloquant**, basé sur la **boucle d’événements (event loop)**.

Exemple :
```js
console.log('Début');

setTimeout(() => {
  console.log('Après 2 secondes');
}, 2000);

console.log('Fin');
```

Résultat :
```
Début
Fin
Après 2 secondes
```

👉 Le `setTimeout` est exécuté plus tard, sans bloquer le reste du code.

---

## 🧩 npm : Node Package Manager

### Installer un package
```bash
npm install express
```

### Exemple avec Express (framework web)
```js
import express from 'express';
const app = express();

app.get('/', (req, res) => {
  res.send('Bienvenue sur mon serveur Express !');
});

app.listen(3000, () => {
  console.log('Serveur démarré sur le port 3000');
});
```

---

## 🧰 Commandes utiles

| Commande | Description |
|-----------|--------------|
| `node fichier.js` | Exécuter un script Node |
| `npm init -y` | Créer un fichier `package.json` |
| `npm install <package>` | Installer une dépendance |
| `npm start` | Lancer un script défini dans `package.json` |

---

## 🧩 Architecture typique d’un projet Node.js

```
mon-projet/
│
├── package.json
├── server.js
├── routes/
│   └── users.js
├── controllers/
│   └── userController.js
└── models/
    └── userModel.js
```

---

## 🚀 Pour aller plus loin
- [Documentation officielle Node.js](https://nodejs.org/en/docs)
- [npmjs.com](https://www.npmjs.com/)
- Frameworks populaires :
  - **Express.js** – serveur HTTP minimaliste
  - **NestJS** – architecture modulaire et typée
  - **Fastify** – très performant

---

## 💡 Résumé

| Concept | Description |
|----------|--------------|
| Node.js | Exécute du JavaScript côté serveur |
| npm | Gestionnaire de paquets Node |
| Asynchrone | Code non bloquant grâce aux callbacks / Promises |
| Modules | Permettent de structurer le code |
| Express | Framework le plus utilisé pour créer des API |

---

> ✨ **En résumé :**  
> Node.js te permet de créer des applications serveurs performantes en JavaScript, avec une approche asynchrone et un écosystème riche.

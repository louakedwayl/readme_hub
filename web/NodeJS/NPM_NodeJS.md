# 🧩 NPM et son lien avec Node.js

## 1. Introduction à NPM

**NPM** signifie **Node Package Manager**.  
C’est le **gestionnaire de paquets officiel** de **Node.js**.  
Il permet d’**installer, partager et gérer** des modules JavaScript réutilisables appelés **packages**.

Quand tu installes **Node.js**, **npm est automatiquement installé avec**.

---

## 2. À quoi sert NPM ?

NPM te permet de :

- 📦 **Installer** des bibliothèques externes (ex : Express, Axios, Lodash)
- 🔄 **Gérer les dépendances** d’un projet
- 🚀 **Partager ton propre code** sous forme de package
- 🧰 **Automatiser des tâches** avec des scripts personnalisés (ex : `npm run start`)

---

## 3. Les commandes NPM les plus utilisées

| Commande | Description |
|-----------|--------------|
| `npm init` | Initialise un nouveau projet Node.js et crée un fichier `package.json` |
| `npm install <package>` | Installe un package localement |
| `npm install -g <package>` | Installe un package **globalement** (accessible partout sur ta machine) |
| `npm uninstall <package>` | Désinstalle un package |
| `npm update <package>` | Met à jour un package |
| `npm run <script>` | Exécute un script défini dans le `package.json` |
| `npm list` | Liste les packages installés |
| `npm outdated` | Affiche les packages obsolètes |

---

## 4. Le fichier `package.json`

Ce fichier est **le cœur de tout projet Node.js**.  
Il contient les **métadonnées du projet** et la **liste de ses dépendances**.

Exemple :
```json
{
  "name": "mon-projet-node",
  "version": "1.0.0",
  "description": "Un exemple de projet Node.js",
  "main": "index.js",
  "scripts": {
    "start": "node index.js"
  },
  "dependencies": {
    "express": "^4.18.2"
  },
  "devDependencies": {
    "nodemon": "^3.0.0"
  }
}
```

### 🧠 À retenir :
- `dependencies` → nécessaires à l’exécution du projet.  
- `devDependencies` → utilisées uniquement en développement.  
- `scripts` → pour automatiser des commandes (tests, démarrage du serveur, etc.).

---

## 5. Le lien entre NPM et Node.js

- **Node.js** est le **runtime** (environnement d’exécution JavaScript côté serveur).
- **NPM** est l’**écosystème** qui permet d’étendre les capacités de Node.js.

Sans npm, tu devrais **tout coder à la main**.  
Avec npm, tu peux facilement :
- Ajouter **Express** pour créer un serveur HTTP.  
- Ajouter **Mongoose** pour interagir avec une base de données MongoDB.  
- Ajouter **dotenv** pour gérer les variables d’environnement.

Exemple :
```bash
npm install express
```

Puis dans ton code :
```js
const express = require('express');
const app = express();

app.get('/', (req, res) => {
  res.send('Hello NPM + Node.js!');
});

app.listen(3000, () => console.log('Serveur démarré sur http://localhost:3000'));
```

---

## 6. Bonus : NPM vs Yarn

| Outil | Description |
|--------|-------------|
| **NPM** | Gestionnaire de paquets officiel de Node.js |
| **Yarn** | Alternative développée par Facebook, plus rapide sur certains projets |

Les deux utilisent le même registre de packages.

---

## ✅ À retenir pour ton entretien

- NPM est **inclus avec Node.js**.  
- Il permet d’**installer et gérer** les dépendances.  
- Le fichier `package.json` décrit ton projet et ses dépendances.  
- Tu peux créer et exécuter des **scripts npm** pour automatiser ton travail.  
- Comprendre NPM est **essentiel** avant de coder en Node.js.

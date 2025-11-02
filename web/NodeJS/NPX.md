# 📦 Cours sur `npx` en Node.js

## 🧠 Introduction

`npx` est un outil fourni avec **npm** (à partir de la version 5.2) qui permet d’**exécuter des packages Node.js** sans les installer globalement.  
Il est particulièrement pratique pour tester des outils ou lancer des scripts fournis par des packages npm.

---

## 1️⃣ Qu’est-ce que `npx` ?

- `npx` n’est **pas un serveur** et n’est pas le moteur Node.js.  
- C’est un **exécuteur de packages** : il permet de lancer un package **local ou distant** directement depuis la ligne de commande.  
- Objectifs :
  - Éviter d’installer globalement des packages dont tu as besoin ponctuellement.
  - Lancer des scripts ou outils fournis par des packages npm.
  - Simplifier la commande pour exécuter des packages locaux au projet.

---

## 2️⃣ Comment fonctionne `npx`

Quand tu tapes une commande comme :

```bash
npx <package> [arguments]
```

1. `npx` cherche d’abord le package dans le dossier **`node_modules/.bin`** de ton projet.  
2. Si le package n’existe pas localement, `npx` peut le **télécharger temporairement depuis le registre npm** et l’exécuter.  
3. Une fois exécuté, le package temporaire est supprimé (sauf si installé).

---

## 3️⃣ Exemple concret

Dans ton projet frontend, tu peux avoir dans `package.json` :

```json
"scripts": {
  "start": "npx http-server . -p 4200"
}
```

- `http-server` est le package qui crée le serveur web.  
- `npx` exécute ce package même si tu ne l’as pas installé globalement.  
- Résultat : ton site est servi sur **http://localhost:4200**.

---

### 🔹 Exemples d’utilisation

1. Lancer un package déjà installé localement :

```bash
npx jest
```

2. Lancer un package temporairement sans l’installer :

```bash
npx create-react-app my-app
```

3. Exécuter une version spécifique d’un package :

```bash
npx webpack@5
```

---

## 4️⃣ Différence entre Node, npm et npx

| Outil | Rôle |
|-------|------|
| **Node.js** | Moteur JavaScript pour exécuter ton code (`node app.js`) |
| **npm** | Gestionnaire de packages (`npm install`) |
| **npx** | Exécute des packages npm directement sans installation globale |

---

## 5️⃣ Avantages de `npx`

- Pas besoin d’installer globalement un package pour un usage ponctuel.  
- Permet d’utiliser **la version exacte du package** du projet (`node_modules/.bin`).  
- Facilite la création de projets ou la génération de fichiers (`create-react-app`, `vite`, etc.).  
- Permet de tester rapidement un package sans “polluer” ton système avec des installations globales.

---

## 6️⃣ Bonnes pratiques

- Utiliser `npx` pour des packages utilisés **une seule fois** ou pour tester.  
- Installer globalement un package uniquement si tu comptes l’utiliser **souvent**.  
- Toujours vérifier la **version** que tu exécutes, surtout pour des outils de build ou CLI (`npx <package>@<version>`).

---

## 📚 Conclusion

- `npx` est **un outil pratique fourni avec npm** pour exécuter des packages Node.js.  
- Il permet de **gagner du temps**, d’éviter des installations globales et de tester des packages rapidement.  
- Il est largement utilisé pour lancer des serveurs locaux, créer des projets ou exécuter des scripts CLI.

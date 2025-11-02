# Node.js : `npm install` et l’option `--save`

## 1. Introduction à npm

`npm` (Node Package Manager) est le gestionnaire de paquets officiel pour Node.js.  
Il permet de :  
- Installer des packages depuis le **registry npm**.  
- Gérer les dépendances d’un projet Node.js.  
- Publier vos propres packages.

---

## 2. La commande `npm install`

La commande `npm install` sert à **installer des packages** dans votre projet.  

### Syntaxe de base

```bash
npm install <package_name>
```
<package_name> : nom du package que vous voulez installer.

Par défaut, le package est installé dans le dossier node_modules du projet.

### Exemple :
```bash
npm install express
```
Cela va télécharger Express et ses dépendances dans le dossier node_modules.

## 2.1 Installer plusieurs packages
```js
npm install express mongoose body-parser
```
## 2.2 Installer une version spécifique
```js
npm install express@4.18.2
```
## 3. L’option --save

## Historique

### Avant npm v5 :

npm install <package> --save ajoutait automatiquement le package à la section "dependencies" du fichier package.json.

Sans --save, le package était installé mais non listé dans package.json, donc les autres développeurs ne savaient pas que ton projet en dépendait.

### Exemple avec --save
```bash
npm install express --save
```
### Résultat dans le package.json :

{
  "dependencies": {
    "express": "^4.18.2"
  }
}

Aujourd’hui (npm ≥5), l’option --save est automatique : npm install express suffit pour ajouter le package dans "dependencies".

## 4. Installer des dépendances de développement

Pour les packages nécessaires uniquement pendant le développement (ex. tests, build tools) :
```js
npm install nodemon --save-dev
```
Ajoute nodemon dans "devDependencies" du package.json.

Ces packages ne sont pas installés en production si vous utilisez npm install --production.

## 5. Installer toutes les dépendances d’un projet

Si vous clonez un projet existant et que vous avez un package.json :
```js
npm install
```
Installe automatiquement tous les packages listés dans "dependencies" et "devDependencies".

Crée le dossier node_modules si nécessaire.

## 6. Résumé

npm install <package> : installe un package dans le projet.

--save : (historique) ajoutait le package dans "dependencies" du package.json. Aujourd’hui, c’est automatique.

--save-dev : installe une dépendance uniquement pour le développement.

npm install sans argument : installe toutes les dépendances d’un projet existant.

## 7. Astuces utiles

Vérifier les packages installés :
```bash
npm list --depth=0
```
## Supprimer un package :
```bash
npm uninstall <package_name>
```
## Mettre à jour un package :
```bash
npm update <package_name>
```

npm update <package_name>

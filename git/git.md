# Git
---

Git a été créé en **2005** par **Linus Torvalds**, le créateur de Linux, pour gérer le développement
du noyau Linux.  

Avant Git, le projet Linux utilisait **BitKeeper**, un projet propriétaire, mais des désaccords concernant son modèle de licence ont poussé Linus Torvalds à développer son propre outil.

Git est publié sous une licence **open-source**, la **GPLv2** (*GNU General Public License, version 2*),  
qui est également utilisée par de nombreux logiciels GNU.  
Cela signifie que Git respecte les principes du logiciel libre définis par GNU, **mais ce n'est pas un projet GNU**.

---

## Fonctionnement de Git

Lorsque l’on travaille avec Git, le processus suit généralement **trois étapes** :

1. **Zone de travail (Working Directory)** :  
   Les fichiers sur lesquels vous travaillez localement. Vous pouvez les modifier, créer ou supprimer des fichiers ici.

2. **Index (Staging Area)** :  
   Une zone temporaire où vous préparez vos modifications avant de les valider (**commit**).

3. **Dépôt Git (Repository)** :  
   Une fois les modifications validées, elles sont stockées de façon permanente dans l’historique des commits.

> L'index est donc une étape intermédiaire où vous pouvez **sélectionner les modifications** que 
vous souhaitez inclure dans le prochain commit.  
Cela permet de valider uniquement certaines parties des modifications effectuées, ce qui est très utile pour organiser des commits **clairs et cohérents**.

---

## Commandes de base

- `git init` : Initialiser un dépôt Git.  
- `git add` : Ajouter des modifications à la zone de staging.  
- `git commit` : Valider les modifications dans l’historique.  
- `git push` : Envoyer les commits vers un dépôt distant.  
- `git pull` : Récupérer les modifications depuis un dépôt distant.  
- `git clone` : Copier un dépôt existant.
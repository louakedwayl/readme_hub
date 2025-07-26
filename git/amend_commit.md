
# Modifier un Commit avec `git commit --amend`

## Introduction
Il arrive souvent qu'après avoir fait un commit, on se rende compte :
- Qu'on a oublié un fichier.
- Que le message de commit est incorrect.
- Qu'on veut modifier le contenu du dernier commit.

Dans ce cas, la commande **`git commit --amend`** est la solution.

---

## 1. Modifier le Message du Dernier Commit
Si tu as fait un commit avec un mauvais message et que tu n'as **pas encore poussé** (push), tu peux le changer :
```bash
git commit --amend -m "Nouveau message de commit"
```
Le dernier commit sera remplacé par un nouveau avec le bon message.

---

## 2. Ajouter des Fichiers Oubliés au Commit
Si tu as oublié d’ajouter un fichier :
```bash
git add fichier_oublie.js
git commit --amend
```
Git ouvrira l’éditeur pour que tu confirmes ou modifies le message du commit.  
Si tu veux garder le même message, enregistre et ferme simplement l’éditeur.

---

## 3. Modifier le Commit sans Changer son Message
Pour garder le même message :
```bash
git commit --amend --no-edit
```
Pratique quand tu veux juste ajouter des fichiers sans toucher au message.

---

## 4. Attention si tu as déjà poussé
Si tu as **déjà fait un `git push`**, **évite d’utiliser `--amend`** car ça réécrit l’historique.  
Si tu dois vraiment le faire :
```bash
git commit --amend
git push --force
```
⚠️ **Danger** : Utiliser `--force` peut poser des problèmes si d’autres personnes travaillent sur le projet.

---

## Cas Pratiques
### Exemple 1 : Changer un message
```bash
git commit --amend -m "Correction : ajout des fichiers manquants"
```

### Exemple 2 : Ajouter un fichier oublié
```bash
git add style.css
git commit --amend --no-edit
```

### Exemple 3 : Modifier à la fois message et contenu
```bash
git add nouveau.js
git commit --amend -m "Ajout du script et correction du bug"
```

---

## Conclusion
`git commit --amend` est une commande **puissante** pour corriger rapidement le dernier commit, **tant qu'il n'a pas été poussé**.  
C’est un outil essentiel pour garder un historique propre.


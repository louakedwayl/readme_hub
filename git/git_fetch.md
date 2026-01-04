# Git Fetch

## 1. Qu'est-ce que `git fetch` ?

`git fetch` est une commande Git qui permet de **récupérer les changements depuis un dépôt distant** sans les appliquer automatiquement à votre branche locale.  
C’est une façon sûre de voir ce qui a changé sur le dépôt distant avant de décider de fusionner ces changements.

En anglais, **fetch** signifie "aller chercher" ou "rapporter".

---

## 2. Que fait `git fetch` exactement ?

Lorsque vous faites :

```bash
git fetch
```

Git fait deux choses principales :

1. **Télécharge les nouveaux commits, branches, tags** depuis le dépôt distant.
2. Les stocke dans vos **branches distantes locales** (appelées `origin/nom-de-branche`) **sans toucher à votre branche actuelle**.

---

## 3. Exemple concret

Supposons que vous êtes sur la branche `main` locale.

1. Vous faites `git fetch`.
2. Git récupère les nouveaux commits de `origin/main`.
3. Votre branche `main` locale **reste inchangée**.
4. Pour appliquer ces changements, vous pouvez ensuite faire :

```bash
git merge origin/main
```

ou simplement :

```bash
git pull
```

> Remarque : `git pull` = `git fetch` + `git merge`.

---

## 4. Pourquoi utiliser `git fetch` ?

- **Sécurité** : vos modifications locales ne sont jamais écrasées.
- **Contrôle** : vous pouvez vérifier les changements avant de les fusionner.
- **Préparer une fusion ou un rebase** sans risquer de conflit immédiat.

---

## 5. Commandes utiles liées à `git fetch`

- `git fetch origin` → récupère les changements depuis le dépôt distant `origin`.
- `git fetch --all` → récupère les changements depuis **tous les dépôts distants**.
- `git fetch --prune` → supprime les branches distantes qui ont été supprimées sur le serveur.

---

## 6. Schéma simplifié

```
Avant git fetch :

Local main: A — B — C
Remote main: A — B — C — D — E

Après git fetch :

Local main: A — B — C
Remote-tracking origin/main: A — B — C — D — E
```

Pour intégrer D et E dans votre branche locale, il faut faire `git merge origin/main`.

---

## 7. Conclusion

`git fetch` est un outil indispensable pour :

- Récupérer les nouveautés sur le dépôt distant.
- Travailler en toute sécurité sans écraser vos modifications locales.
- Préparer les fusions ou rebases avant de les appliquer.

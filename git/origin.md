# `origin`

Dans Git, `origin` est un concept central pour gérer les dépôts distants.

---

## 1. Qu’est-ce que `origin` ?

* `origin` est **l’alias par défaut donné au dépôt distant** lors d’un `git clone`.
* Il représente l’URL du dépôt sur lequel vous allez **récupérer (fetch/pull)** ou **envoyer (push)** vos modifications.
* Exemple :

```bash
git clone https://github.com/Wayl/mon-projet.git
```

Git crée automatiquement un alias `origin` pour `https://github.com/Wayl/mon-projet.git`.

* Quand vous voyez :

```
origin/main
```

cela fait référence à **la branche `main` du dépôt distant nommé `origin`**.

---

## 2. Vérifier les dépôts distants

Pour voir vos dépôts distants et leurs URL :

```bash
git remote -v
```

Exemple de sortie :

```
origin  https://github.com/Wayl/mon-projet.git (fetch)
origin  https://github.com/Wayl/mon-projet.git (push)
```

* `(fetch)` : URL utilisée pour récupérer les changements depuis le serveur
* `(push)` : URL utilisée pour envoyer vos changements vers le serveur

---

## 3. Travailler avec `origin`

### a) Récupérer les dernières modifications

```bash
git fetch origin
```

* Met à jour vos **branches distantes locales** (`origin/nom-de-branche`) sans toucher à vos branches locales.

```bash
git pull origin main
```

* Récupère les changements et les fusionne avec votre branche locale.

### b) Envoyer vos modifications

```bash
git push origin ma-branche
```

* Envoie votre branche locale `ma-branche` vers la branche distante du dépôt `origin`.
* Avec `-u`, vous établissez un **lien de suivi** :

```bash
git push -u origin ma-branche
```

---

## 4. Gérer plusieurs dépôts distants

* `origin` n’est qu’un nom par convention.
* Vous pouvez ajouter d’autres dépôts distants avec un nom différent :

```bash
git remote add upstream https://github.com/Autre/mon-projet.git
```

* Pour pousser ou récupérer depuis ce dépôt :

```bash
git fetch upstream
 git push upstream ma-branche
```

---

## 5. Résumé

| Concept                                            | Commande / Exemple            | Description                               |
| -------------------------------------------------- | ----------------------------- | ----------------------------------------- |
| Vérifier les dépôts distants                       | `git remote -v`               | Affiche les URL des dépôts distants       |
| Récupérer les branches d’`origin`                  | `git fetch origin`            | Met à jour vos branches distantes locales |
| Mettre à jour votre branche locale depuis `origin` | `git pull origin main`        | Récupère et fusionne                      |
| Envoyer une branche locale vers `origin`           | `git push origin ma-branche`  | Pousse la branche locale vers le serveur  |
| Ajouter un autre dépôt distant                     | `git remote add upstream URL` | Permet de gérer plusieurs dépôts          |

---

### Schéma mental

```
[Serveur distant - origin]
      |
      | git fetch / git pull
      v
[Branches distantes locales] origin/main
      |
      | checkout -b
      v
[Branches locales] main
```

* `origin` = alias pour le dépôt distant
* `origin/main` = copie locale de la branche distante `main` sur le dépôt `origin`
* `main` = votre branche locale sur laquelle vous travaillez

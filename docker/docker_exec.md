# Docker : La commande `docker exec`

## 1. Introduction

En Docker, les **conteneurs** sont des environnements isolés qui exécutent des applications. Parfois, il est nécessaire d'**interagir directement avec un conteneur en cours d'exécution** pour exécuter des commandes, inspecter des fichiers ou dépanner. La commande `docker exec` permet exactement cela.

---

## 2. Syntaxe de base

```bash
docker exec [options] nom_ou_id_du_conteneur commande
```

* `nom_ou_id_du_conteneur` : le nom ou l'identifiant du conteneur cible.
* `commande` : la commande à exécuter à l'intérieur du conteneur.

### Exemple simple :

```bash
docker exec mon_conteneur ls /app
```

> Liste les fichiers du répertoire `/app` dans le conteneur `mon_conteneur`.

---

## 3. Options courantes

| Option  | Description                                                               |
| ------- | ------------------------------------------------------------------------- |
| `-i`    | Mode interactif : permet de fournir des entrées à la commande.            |
| `-t`    | Alloue un pseudo-terminal (tty), souvent utilisé avec `-i`.               |
| `-u`    | Exécuter la commande en tant qu’utilisateur spécifique (par défaut root). |
| `--env` | Définir des variables d’environnement pour la commande.                   |

### Exemple interactif :

```bash
docker exec -it mon_conteneur bash
```

> Ouvre un shell Bash interactif dans le conteneur `mon_conteneur`.

### Exemple avec utilisateur spécifique :

```bash
docker exec -u www-data mon_conteneur whoami
```

> Affiche `www-data` si le conteneur exécute la commande avec cet utilisateur.

---

## 4. Cas d'utilisation

1. **Dépannage et inspection**

   ```bash
   docker exec -it mon_conteneur cat /var/log/app.log
   ```

   > Permet de lire les logs d’une application à l’intérieur du conteneur.

2. **Exécution de commandes ponctuelles**

   ```bash
   docker exec mon_conteneur php artisan migrate
   ```

   > Lance une migration Laravel directement dans le conteneur.

3. **Accéder à un shell interactif**

   ```bash
   docker exec -it mon_conteneur sh
   ```

   > Ouvre un shell minimal si Bash n’est pas disponible.

4. **Vérification de l’état**

   ```bash
   docker exec mon_conteneur ps aux
   ```

   > Vérifie les processus en cours dans le conteneur.

---

## 5. Bonnes pratiques

* Utiliser `-it` pour des commandes interactives.
* Privilégier l’utilisateur non root si possible avec `-u`.
* Limiter l’utilisation de `docker exec` pour éviter de modifier l’état du conteneur de production.
* Préférer les scripts ou commandes définies dans le `Dockerfile` ou `docker-compose` pour des actions répétitives.

---

## 6. Résumé

* `docker exec` permet d’exécuter des commandes dans un conteneur en cours d’exécution.
* Les options `-i` et `-t` sont essentielles pour l’interaction.
* On peut spécifier l’utilisateur, les variables d’environnement, et exécuter n’importe quelle commande à l’intérieur du conteneur.
* Utile pour le dépannage, les migrations, la vérification et l’administration directe des conteneurs.

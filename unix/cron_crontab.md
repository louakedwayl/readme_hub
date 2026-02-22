# Cron & Crontab — L'essentiel

## C'est quoi Cron ?

Cron est un **service Linux** qui tourne en arrière-plan (un daemon). Son rôle est simple : **exécuter des tâches automatiquement à des horaires définis**.

Il est utilisé pour tout ce qui doit se répéter : sauvegardes, nettoyage de fichiers, envoi de mails, redémarrage de services, etc.

## C'est quoi Crontab ?

Crontab (cron + table) est le **fichier de configuration** où tu définis tes tâches planifiées. Chaque utilisateur du système peut avoir son propre crontab.

Pour l'éditer :

```bash
crontab -e    # éditer ses tâches
crontab -l    # lister ses tâches
crontab -r    # supprimer toutes ses tâches
```

## La syntaxe d'une tâche

Chaque ligne du crontab suit ce format :

```
┌───────── minute (0 - 59)
│ ┌─────── heure (0 - 23)
│ │ ┌───── jour du mois (1 - 31)
│ │ │ ┌─── mois (1 - 12)
│ │ │ │ ┌─ jour de la semaine (0 - 7, 0 et 7 = dimanche)
│ │ │ │ │
* * * * *  /chemin/vers/script.sh
```

Le `*` signifie **"toutes les valeurs"**.

## Exemples courants

| Expression | Signification |
|---|---|
| `0 * * * *` | Toutes les heures (à :00) |
| `0 */2 * * *` | Toutes les 2 heures |
| `30 8 * * *` | Tous les jours à 8h30 |
| `0 0 * * 0` | Tous les dimanches à minuit |
| `*/10 * * * *` | Toutes les 10 minutes |
| `0 9 1 * *` | Le 1er de chaque mois à 9h |

## Commandes utiles

```bash
# Installer cron (si absent)
sudo apt install cron

# Démarrer le service
sudo systemctl start cron

# Activer cron au démarrage du système
sudo systemctl enable cron

# Vérifier que cron tourne
sudo systemctl status cron
```

## Bonnes pratiques

- **Toujours utiliser des chemins absolus** dans tes scripts (`/home/user/script.sh` et non `./script.sh`).
- **Rediriger les logs** pour débugger : `0 */2 * * * /home/user/script.sh >> /var/log/mon-cron.log 2>&1`
- **Tester ton script manuellement** avant de le mettre dans le cron.
- **Vérifier les permissions** : le script doit être exécutable (`chmod +x`).

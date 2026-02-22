# Systemd & Systemctl — L'essentiel

## C'est quoi Systemd ?

Systemd est le **premier processus lancé par Linux** (PID 1). C'est le gestionnaire de services du système. Il s'occupe de démarrer, arrêter et surveiller tous les services : réseau, Docker, cron, base de données, serveur web, etc.

## C'est quoi Systemctl ?

Systemctl est la **commande** pour interagir avec systemd. C'est avec elle que tu contrôles tes services au quotidien.

## Commandes principales

### Gérer un service

```bash
# Démarrer un service
sudo systemctl start nginx

# Arrêter un service
sudo systemctl stop nginx

# Redémarrer un service
sudo systemctl restart nginx

# Recharger la config sans couper le service
sudo systemctl reload nginx

# Voir le statut d'un service
sudo systemctl status nginx
```

### Activer / désactiver au démarrage

```bash
# Lancer automatiquement au boot
sudo systemctl enable nginx

# Ne plus lancer au boot
sudo systemctl disable nginx

# Combiner : activer + démarrer immédiatement
sudo systemctl enable --now nginx
```

### Lister les services

```bash
# Tous les services actifs
systemctl list-units --type=service

# Tous les services (actifs ou non)
systemctl list-units --type=service --all

# Services qui ont échoué
systemctl --failed
```

## Consulter les logs d'un service

Systemd a son propre système de logs via **journalctl** :

```bash
# Logs d'un service précis
journalctl -u nginx

# Logs en temps réel (comme tail -f)
journalctl -u nginx -f

# Logs depuis le dernier boot
journalctl -u nginx -b
```

## Les états d'un service

| État | Signification |
|---|---|
| `active (running)` | Le service tourne |
| `inactive (dead)` | Le service est arrêté |
| `enabled` | Se lance au démarrage |
| `disabled` | Ne se lance pas au démarrage |
| `failed` | Le service a crashé |

## Bonnes pratiques

- **Toujours vérifier le statut** après un `start` ou `restart` pour confirmer que ça tourne.
- **Utiliser `enable --now`** pour activer et démarrer en une seule commande.
- **Consulter les logs avec `journalctl`** quand un service refuse de démarrer, c'est là que se trouve l'erreur.
- **Ne pas oublier `sudo`** : la plupart des commandes systemctl nécessitent les droits root.

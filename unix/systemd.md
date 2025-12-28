# systemd, systemctl et le démarrage de Linux

## 1. Qu’est-ce que systemd ?

**systemd** est le **système d’init** des distributions Linux modernes.

Son rôle principal :
- démarrer le système
- lancer et gérer les services
- superviser les processus
- gérer les dépendances entre services

👉 systemd est le **premier processus en espace utilisateur**.

---

## 2. Le rôle du PID 1

Lors du démarrage de Linux :

1. BIOS / UEFI  
2. Bootloader (GRUB)  
3. Kernel Linux  
4. Le kernel lance le **processus PID 1**  
5. PID 1 lance tout le reste  

Sur un système Linux moderne :
```
PID 1 = systemd
```

### Pourquoi PID 1 est spécial
- s’il meurt → kernel panic
- il récupère les processus zombies
- il contrôle l’ordre de démarrage

---

## 3. systemd ≠ Unix

systemd est **spécifique à Linux**.

Autres systèmes Unix :
- BSD → init / rc
- macOS → launchd
- Solaris → SMF

Phrase correcte :
> Sur Linux avec systemd, systemd est le processus PID 1

---

## 4. systemctl : l’outil de contrôle

**systemctl** est la commande qui permet de **communiquer avec systemd**.

- systemd = moteur  
- systemctl = interface  

---

## 5. Qu’est-ce qu’un service systemd ?

Un **service** est un programme géré par systemd.

Il est défini par un fichier :
```
nom.service
```

Exemples :
- apache2.service
- mariadb.service
- ssh.service

---

## 6. Où sont définis les services ?

```
/usr/lib/systemd/system/   → services du système
/etc/systemd/system/       → overrides / services custom
```

---

## 7. Structure d’un fichier .service

```ini
[Unit]
Description=Apache HTTP Server
After=network.target

[Service]
ExecStart=/usr/sbin/apachectl start
Restart=always

[Install]
WantedBy=multi-user.target
```

---

## 8. Commandes systemctl essentielles

```bash
systemctl status apache2
systemctl start apache2
systemctl stop apache2
systemctl restart apache2
systemctl enable apache2
systemctl disable apache2
```

---

## 9. Active vs Enabled

- **active** → service en cours d’exécution
- **enabled** → démarre au boot

---

## 10. Pourquoi phpMyAdmin n’est pas un service

phpMyAdmin :
- n’est pas un démon
- n’a pas de processus propre
- est une application PHP

Il dépend de :
- Apache / Nginx
- PHP
- MySQL / MariaDB

---

## 11. Exemple : pile LAMP

```
Navigateur
   ↓
Apache (service)
   ↓
PHP / phpMyAdmin
   ↓
MariaDB (service)
```

---

## 12. Commandes utiles

```bash
ps -p 1 -o pid,comm
systemctl list-units --type=service
```

---

## 13. Résumé

| Élément | Rôle |
|------|------|
| systemd | système d’init |
| PID 1 | premier processus |
| systemctl | outil de contrôle |
| service | programme supervisé |
| phpMyAdmin | app PHP |

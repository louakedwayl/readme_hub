# Connexion aux SGBD : Socket Unix vs TCP/IP

## Introduction

Les systèmes de gestion de base de données (SGBD) comme **MariaDB**, **MySQL**, **PostgreSQL** utilisent deux principaux moyens pour qu'un client se connecte au serveur :

1. **Socket Unix (Unix Domain Socket)**
2. **TCP/IP (Transmission Control Protocol / Internet Protocol)**

Comprendre ces mécanismes est essentiel pour la sécurité, les performances et la configuration des utilisateurs.

---

## 1. Socket Unix

### 1.1 Définition

Un **socket Unix** est un fichier spécial sur le système de fichiers qui permet la communication entre processus locaux sans passer par le réseau.
Exemple : `/run/mysqld/mysqld.sock` pour MariaDB/MySQL.

### 1.2 Fonctionnement

* Le serveur SGBD crée le fichier socket lors de son démarrage.
* Les clients locaux utilisent ce fichier pour se connecter.
* La communication passe directement via le système de fichiers, ce qui est **plus rapide et sécurisé** qu’un passage par le réseau.

### 1.3 Utilisation par défaut

* MariaDB/MySQL configure souvent l’utilisateur **root** pour ne pouvoir se connecter **que via le socket**.
* Cela garantit que root ne peut se connecter que depuis la machine locale, renforçant la sécurité.

### 1.4 Exemple de connexion

```bash
sudo mariadb
# ou
mysql -u root -S /run/mysqld/mysqld.sock
```

---

## 2. Connexion TCP/IP

### 2.1 Définition

TCP/IP est le protocole réseau classique permettant à un client de se connecter à un serveur via une **adresse IP** et un **port** (ex. `127.0.0.1:3306`).

### 2.2 Fonctionnement

* Le serveur écoute sur un port TCP.
* Les clients locaux ou distants peuvent se connecter s’ils connaissent l’adresse IP, le port et les identifiants.
* Moins rapide qu’un socket Unix pour les connexions locales mais nécessaire pour les accès réseau.

### 2.3 Exemple de connexion

```bash
mysql -u root -h 127.0.0.1 -P 3306 -p
```

---

## 3. Différences principales

| Critère            | Socket Unix                    | TCP/IP                                                |
| ------------------ | ------------------------------ | ----------------------------------------------------- |
| Usage local        | Oui                            | Oui                                                   |
| Usage distant      | Non                            | Oui                                                   |
| Sécurité           | Très élevée (local uniquement) | Moyenne à élevée (requiert firewall et mots de passe) |
| Performance        | Très rapide                    | Légèrement plus lent                                  |
| Configuration root | Par défaut via socket          | Nécessite modification                                |

---

## 4. Autres SGBD

* **PostgreSQL** : utilise `/var/run/postgresql/.s.PGSQL.5432` pour les connexions locales.
* **SQLite** : n’a pas de serveur, accède directement au fichier, pas de socket.
* **Oracle / SQL Server sur Linux** : utilisent TCP/IP pour les clients distants, parfois socket interne pour les clients locaux.

---

## 5. Bonnes pratiques

1. Pour les utilisateurs root, privilégier le **socket Unix** pour éviter les connexions réseau non sécurisées.
2. Pour les utilisateurs distants ou applications web, utiliser TCP/IP avec un mot de passe fort et un firewall.
3. Toujours vérifier que le fichier socket existe et que le serveur est démarré avant d’essayer de se connecter.

---

## 6. Résumé

* Le **socket Unix** est le moyen préféré pour les connexions locales à un SGBD sous Linux/Unix.
* TCP/IP est nécessaire pour les connexions réseau.
* MariaDB/MySQL utilise le socket Unix pour root par défaut pour des raisons de sécurité et de performance.

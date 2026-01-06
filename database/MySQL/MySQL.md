# Introduction à MySQL et différences avec SQLite

## 1. Qu’est-ce que MySQL ?

**MySQL** est un système de gestion de base de données relationnelle (SGBDR) open source, très populaire pour les applications web et les services en ligne. Il utilise le langage **SQL (Structured Query Language)** pour gérer les données.

### Caractéristiques principales

* Relationnel : les données sont organisées en **tables** avec colonnes et lignes.
* Multi-utilisateur : plusieurs clients peuvent se connecter en même temps.
* Serveur-client : MySQL fonctionne comme un **serveur** auquel les applications se connectent via un **port réseau** (par défaut 3306).
* Transactions et sécurité : support des **transactions**, des **verrous** et des **droits d’accès par utilisateur**.

---

## 2. Structure de base d’une base MySQL

Une base de données MySQL contient :

* **Database (base de données)** : ensemble de tables.
* **Table** : ensemble de lignes (enregistrements) et colonnes (champs).
* **Index** : structures qui accélèrent les recherches.
* **Clé primaire / étrangère** : pour garantir l’intégrité des données.

### Exemple simple

```sql
CREATE DATABASE test_db;

USE test_db;

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    email VARCHAR(100),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO users (username, email) VALUES ('Alice', 'alice@example.com');

SELECT * FROM users;
```

---

## 3. Qu’est-ce que SQLite ?

**SQLite** est également un SGBDR, mais avec quelques différences clés :

* **Serverless** : pas besoin de serveur séparé, tout est contenu dans un simple fichier `.db`.
* **Léger** : idéal pour des applications mobiles, petites apps, ou tests.
* **Multi-plateforme** : fonctionne presque partout sans installation complexe.
* **Moins adapté au multi-utilisateur** : concurrent limité, surtout en écriture.

---

## 4. Différences clés entre MySQL et SQLite

| Caractéristique | MySQL                                           | SQLite                                   |
| --------------- | ----------------------------------------------- | ---------------------------------------- |
| Architecture    | Client-serveur                                  | Serverless (fichier unique)              |
| Concurrence     | Multi-utilisateurs, transactions complexes      | Simple, verrouillage fichier             |
| Performance     | Meilleur sur gros volumes et multi-utilisateurs | Meilleur pour petite base, app mobile    |
| Installation    | Nécessite un serveur                            | Aucun serveur nécessaire                 |
| Port réseau     | Oui (3306 par défaut)                           | Non (local uniquement)                   |
| Sécurité        | Gestion d’utilisateurs et droits                | Basique, fichier protégé                 |
| Support SQL     | Complet (transactions, joins, triggers)         | SQL limité, certaines fonctions manquent |

---

## 5. Quand choisir MySQL vs SQLite ?

* **MySQL** :

  * Applications web avec plusieurs utilisateurs
  * Besoin de sécurité avancée
  * Bases de données volumineuses

* **SQLite** :

  * Applications locales ou mobiles
  * Prototypage rapide
  * Tests unitaires et petits projets

---

## 6. Résumé

* **MySQL** = robuste, multi-utilisateur, serveur-client, idéal pour applications web.
* **SQLite** = léger, serverless, parfait pour tests et apps locales.
* **Les deux utilisent SQL**, mais MySQL est plus complet pour le travail en production.

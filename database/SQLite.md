# Cours sur SQLite

## 1. Qu'est-ce que SQLite ?

SQLite est un **Système de Gestion de Base de Données (SGBD) relationnel léger et embarqué** :

* Stocke toutes les données dans un **fichier unique**.
* **Pas de serveur** nécessaire, tout fonctionne localement.
* Idéal pour : applications mobiles, applications desktop, projets simples, tests.
* Compatible avec le langage **SQL**.

> Exemple : un fichier `db.sqlite` contient toutes les tables et données.

---

## 2. Caractéristiques principales

* **Fichier unique** : chaque base est un fichier `.sqlite`.
* **Pas de configuration serveur** : simple à utiliser.
* **Transactions ACID** : garantit Atomicité, Cohérence, Isolation et Durabilité.
* **Support SQL complet** : SELECT, INSERT, UPDATE, DELETE, JOIN, etc.
* **Multi-plateforme** : fonctionne sur Linux, Windows, macOS.

---

## 3. Installation

### 3.1 Sur Linux (Debian/Ubuntu)

```bash
sudo apt-get update
sudo apt-get install sqlite3
```

Vérifier l'installation :

```bash
sqlite3 --version
```

### 3.2 Sur Windows / macOS

* Windows : [SQLite Download Page](https://www.sqlite.org/download.html)
* macOS : `brew install sqlite` (si Homebrew installé)

---

## 4. Créer une base de données

### 4.1 Depuis le terminal

```bash
sqlite3 db.sqlite
```

* Ouvre le shell SQLite et crée un fichier `db.sqlite` si inexistant.

### 4.2 Depuis VS Code

1. Ouvrir le terminal intégré.
2. Tapez : `sqlite3 db.sqlite`
3. Créez des tables et insérez des données via SQL.

---

## 5. Commandes SQL de base

### 5.1 Créer une table

```sql
CREATE TABLE users (
    id INTEGER PRIMARY KEY,
    name TEXT,
    age INTEGER
);
```

### 5.2 Insérer des données

```sql
INSERT INTO users(name, age) VALUES ('Alice', 25);
INSERT INTO users(name, age) VALUES ('Bob', 30);
```

### 5.3 Lire des données

```sql
SELECT * FROM users;
SELECT name FROM users WHERE age > 25;
```

### 5.4 Mettre à jour des données

```sql
UPDATE users SET age = 26 WHERE name = 'Alice';
```

### 5.5 Supprimer des données

```sql
DELETE FROM users WHERE name = 'Bob';
```

---

## 6. Transactions et ACID

* **Transaction** : bloc d'opérations qui s'exécutent ensemble.
* Exemple :

```sql
BEGIN TRANSACTION;
INSERT INTO users(name, age) VALUES ('Charlie', 28);
UPDATE users SET age = 29 WHERE name = 'Alice';
COMMIT;
```

* **ACID** garantit : Atomicité, Cohérence, Isolation, Durabilité.

---

## 7. Index

* Permettent d'accélérer les recherches.

```sql
CREATE INDEX idx_name ON users(name);
```

---

## 8. Avantages de SQLite

* Très léger et rapide.
* Aucun serveur nécessaire.
* Portable : le fichier `.sqlite` peut être déplacé facilement.
* Supporte SQL complet.
* Parfait pour tests et projets simples.

---

## 9. Exemple pratique complet

```sql
-- Créer table
CREATE TABLE users (id INTEGER PRIMARY KEY, name TEXT, age INTEGER);

-- Ajouter données
INSERT INTO users(name, age) VALUES ('Alice', 25);
INSERT INTO users(name, age) VALUES ('Bob', 30);

-- Lire données
SELECT * FROM users;

-- Mettre à jour
UPDATE users SET age = 26 WHERE name = 'Alice';

-- Supprimer
DELETE FROM users WHERE name = 'Bob';
```

> Ce fichier SQL peut être exécuté sur une vraie base SQLite ou dans VS Code avec l'extension SQLite.

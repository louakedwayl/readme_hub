# Cours sur les SGBD (Systèmes de Gestion de Bases de Données)

## 1. Définition

Un **Système de Gestion de Base de Données (SGBD)** est un logiciel qui permet de :

* **Créer** des bases de données.
* **Organiser** et **structurer** les données.
* **Stocker** les données de manière sécurisée.
* **Interroger** et **modifier** les données via des requêtes.
* **Garantir** l’intégrité et la cohérence des données.

> Exemples de SGBD : SQLite, MySQL, PostgreSQL, Oracle Database, MongoDB.

---

## 2. Composants principaux d’un SGBD

1. **Base de données** : un fichier ou un ensemble de fichiers qui contiennent les données.
2. **Moteur de stockage** : gère l’écriture, lecture et organisation physique des données.
3. **Langage de requête** : pour interagir avec la base (ex : SQL pour SQLite, MySQL…).
4. **Interface de gestion** : outils graphiques ou en ligne de commande pour administrer les bases.

---

## 3. Types de SGBD

### 3.1. SGBD relationnel (RDBMS)

* Les données sont stockées dans des **tables** composées de lignes et colonnes.
* Relations possibles entre tables via des **clés primaires** et **clés étrangères**.
* Exemple : **SQLite, MySQL, PostgreSQL, Oracle DB**
* Langage : **SQL (Structured Query Language)**

**Exemple de table : `users`**

| id | name  | age |
| -- | ----- | --- |
| 1  | Alice | 25  |
| 2  | Bob   | 30  |

**Requête SQL :**

```sql
SELECT name FROM users WHERE age > 25;
```

### 3.2. SGBD non relationnel (NoSQL)

* Les données ne sont pas forcément tabulaires.
* Exemples : **MongoDB (document), Redis (clé-valeur), Cassandra (colonnes larges)**
* Utilisé pour les applications nécessitant **scalabilité** ou **flexibilité des schémas**.

**Exemple MongoDB (document JSON) :**

```json
{
  "name": "Alice",
  "age": 25
}
```

---

## 4. Concepts clés

### 4.1. Table

* Structure qui contient les données dans les SGBD relationnels.
* Composée de **lignes (enregistrements)** et **colonnes (attributs)**.

### 4.2. Clé primaire

* Identifie de manière unique chaque ligne dans une table.
* Exemple : `id` dans `users`.

### 4.3. Clé étrangère

* Lien entre deux tables.
* Permet de **maintenir la cohérence** des données.

### 4.4. Requête SQL

* Permet de récupérer ou modifier des données.
* Types :

  * **SELECT** → lire des données
  * **INSERT** → ajouter des données
  * **UPDATE** → modifier des données
  * **DELETE** → supprimer des données

### 4.5. Index

* Accélère la recherche de données.
* Fonctionne un peu comme l’index d’un livre.

### 4.6. Transactions

* Permettent d’exécuter plusieurs opérations comme un **bloc atomique**.
* Garantissent **ACID** :

  * **A** = Atomicité
  * **C** = Cohérence
  * **I** = Isolation
  * **D** = Durabilité

---

## 5. Avantages des SGBD

* Centralisation et organisation des données.
* Sécurité et contrôle des accès.
* Intégrité et cohérence des données.
* Possibilité de faire des requêtes complexes rapidement.
* Sauvegarde et restauration faciles.

---

## 6. SQLite : exemple simple

SQLite est un **SGBD relationnel léger et embarqué**.

* Stockage : **un seul fichier `.sqlite`**
* Pas besoin de serveur
* Idéal pour des projets simples ou des tests

**Exemple pratique :**

```sql
-- Créer une table
CREATE TABLE users (
    id INTEGER PRIMARY KEY,
    name TEXT,
    age INTEGER
);

-- Ajouter des utilisateurs
INSERT INTO users(name, age) VALUES ('Alice', 25);
INSERT INTO users(name, age) VALUES ('Bob', 30);

-- Lire les utilisateurs
SELECT * FROM users;
```

---

## 7. Résumé

| Concept       | Définition                                      |
| ------------- | ----------------------------------------------- |
| SGBD          | Logiciel pour gérer des bases de données        |
| Table         | Structure contenant des lignes et colonnes      |
| Clé primaire  | Identifiant unique d’une ligne                  |
| Clé étrangère | Lien entre deux tables                          |
| SQL           | Langage pour interagir avec un SGBD relationnel |
| NoSQL         | Base non relationnelle pour données flexibles   |
| Transaction   | Bloc d’opérations atomique garantissant ACID    |

# Introduction aux Bases de Données

## 1. Qu'est-ce qu'une base de données ?

Une **base de données** (ou **database**) est un ensemble structuré d'informations ou de données stockées de manière organisée. Elle permet de :

* Stocker de grandes quantités de données.
* Accéder aux données rapidement.
* Mettre à jour, supprimer ou manipuler les données facilement.
* Garantir l'intégrité et la sécurité des données.

---

## 2. Types de bases de données

### 2.1 Bases de données relationnelles (SQL)

* Organisent les données en **tables** (lignes et colonnes).
* Chaque table a des **champs** (colonnes) et des **enregistrements** (lignes).
* Utilisent le langage **SQL** (Structured Query Language) pour manipuler les données.
* Exemples : MySQL, PostgreSQL, SQLite, Oracle.

**Exemple de table `utilisateurs` :**

| id | nom   | email                                   |
| -- | ----- | --------------------------------------- |
| 1  | Alice | [alice@mail.com](mailto:alice@mail.com) |
| 2  | Bob   | [bob@mail.com](mailto:bob@mail.com)     |

### 2.2 Bases de données non relationnelles (NoSQL)

* Stockent les données sous différents formats : documents, clé-valeur, colonnes ou graphes.
* Plus flexibles que les bases relationnelles pour certains types d'applications.
* Exemples : MongoDB (documents), Redis (clé-valeur), Neo4j (graphes).

---

## 3. Concepts de base

### 3.1 Table

* Une table est une collection d’enregistrements.
* Chaque table représente une entité, par exemple `utilisateurs`, `produits`, `commandes`.

### 3.2 Clé primaire

* Une **clé primaire** est un champ unique pour identifier chaque enregistrement d’une table.
* Exemple : `id` dans la table `utilisateurs`.

### 3.3 Clé étrangère

* Une **clé étrangère** relie une table à une autre.
* Exemple : `commande.user_id` fait référence à `utilisateur.id`.

### 3.4 Relation

* Les relations permettent de connecter plusieurs tables.
* Types de relations :

  * **Un-à-un (1:1)**
  * **Un-à-plusieurs (1:N)**
  * **Plusieurs-à-plusieurs (N:M)**

---

## 4. Opérations de base (CRUD)

Les opérations les plus fréquentes sur une base de données :

* **C**reate → Ajouter un enregistrement
* **R**ead → Lire ou récupérer des données
* **U**pdate → Modifier des données existantes
* **D**elete → Supprimer des données

**Exemple SQL :**

```sql
-- Créer un utilisateur
INSERT INTO utilisateurs (nom, email) VALUES ('Charlie', 'charlie@mail.com');

-- Lire les utilisateurs
SELECT * FROM utilisateurs;

-- Mettre à jour un utilisateur
UPDATE utilisateurs SET email = 'alice123@mail.com' WHERE id = 1;

-- Supprimer un utilisateur
DELETE FROM utilisateurs WHERE id = 2;
```

---

## 5. Avantages d'une base de données

* Centralisation des données
* Sécurité et contrôle d'accès
* Rapidité d'accès et recherche efficace
* Fiabilité et intégrité des données
* Possibilité de gérer de grandes quantités d'informations

---

## 6. Conclusion

Les bases de données sont au cœur de presque toutes les applications modernes. Comprendre leurs concepts et savoir les manipuler est essentiel pour tout développeur ou administrateur système.


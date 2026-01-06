# Cours : Les scripts SQL

## 1. Introduction aux scripts SQL

Un **script SQL** est un fichier ou un ensemble de commandes SQL exécutées dans une base de données pour réaliser des opérations comme :

* Création de tables
* Insertion de données
* Modification ou suppression de données
* Gestion des utilisateurs et permissions
* Requêtes de sélection (SELECT)

Les scripts permettent d’automatiser les tâches et de reproduire facilement des configurations sur différentes bases de données.

## 2. Structure d’un script SQL

Un script SQL est composé de **commandes SQL** séparées par des points-virgules (`;`).
Exemple simple :

```sql
-- Création d'une table
CREATE TABLE etudiants (
    id INT PRIMARY KEY,
    nom VARCHAR(50),
    prenom VARCHAR(50),
    age INT
);

-- Insertion de données
INSERT INTO etudiants (id, nom, prenom, age) VALUES (1, 'Dupont', 'Marie', 22);
INSERT INTO etudiants (id, nom, prenom, age) VALUES (2, 'Martin', 'Paul', 24);

-- Sélection des données
SELECT * FROM etudiants;
```

## 3. Exécuter un script SQL

Pour exécuter un script SQL, il faut utiliser un **client SQL** ou un outil de gestion de base de données (ex. MySQL Workbench, pgAdmin, SQL Server Management Studio). Voici comment faire :

1. **Ouvrir le client SQL**.
2. **Se connecter à la base de données**.
3. **Charger le script** depuis le fichier `.sql`.
4. **Exécuter le script** pour que toutes les commandes soient appliquées dans la base.

Exemple avec MySQL en ligne de commande :

```bash
mysql -u utilisateur -p nom_base < script.sql
```

Cela exécute toutes les commandes contenues dans `script.sql` sur la base `nom_base`.

---

## 4. Commandes SQL principales

### 4.1. Commandes de définition (DDL)

| Commande          | Description                  | Exemple                                         |
| ----------------- | ---------------------------- | ----------------------------------------------- |
| `CREATE DATABASE` | Crée une base de données     | `CREATE DATABASE école;`                        |
| `CREATE TABLE`    | Crée une table               | Voir exemple ci-dessus                          |
| `ALTER TABLE`     | Modifie une table existante  | `ALTER TABLE etudiants ADD email VARCHAR(100);` |
| `DROP TABLE`      | Supprime une table           | `DROP TABLE etudiants;`                         |
| `DROP DATABASE`   | Supprime une base de données | `DROP DATABASE école;`                          |

### 4.2. Commandes de manipulation (DML)

| Commande      | Description                     | Exemple                                                 |
| ------------- | ------------------------------- | ------------------------------------------------------- |
| `INSERT INTO` | Ajoute une ligne dans une table | `INSERT INTO etudiants (id, nom) VALUES (3, 'Durand');` |
| `UPDATE`      | Modifie des données existantes  | `UPDATE etudiants SET age = 23 WHERE id = 1;`           |
| `DELETE`      | Supprime des données            | `DELETE FROM etudiants WHERE id = 2;`                   |

### 4.3. Commandes de requête (DQL)

| Commande   | Description              | Exemple                                                                            |
| ---------- | ------------------------ | ---------------------------------------------------------------------------------- |
| `SELECT`   | Sélectionne des données  | `SELECT nom, prenom FROM etudiants;`                                               |
| `WHERE`    | Filtre les données       | `SELECT * FROM etudiants WHERE age > 22;`                                          |
| `ORDER BY` | Tri des résultats        | `SELECT * FROM etudiants ORDER BY nom ASC;`                                        |
| `JOIN`     | Combine plusieurs tables | `SELECT e.nom, c.nom_cours FROM etudiants e JOIN cours c ON e.id = c.id_etudiant;` |

### 4.4. Commandes de contrôle (TCL)

| Commande    | Description                                        |
| ----------- | -------------------------------------------------- |
| `COMMIT`    | Valide les modifications                           |
| `ROLLBACK`  | Annule les modifications                           |
| `SAVEPOINT` | Définit un point de sauvegarde dans la transaction |

Exemple :

```sql
BEGIN;
INSERT INTO etudiants (id, nom) VALUES (4, 'Lemoine');
ROLLBACK; -- annule l'insertion
```

### 4.5. Commandes de contrôle d’accès (DCL)

| Commande | Description       | Exemple                                      |
| -------- | ----------------- | -------------------------------------------- |
| `GRANT`  | Donne des droits  | `GRANT SELECT ON etudiants TO user_test;`    |
| `REVOKE` | Retire des droits | `REVOKE SELECT ON etudiants FROM user_test;` |

## 5. Bonnes pratiques pour les scripts SQL

1. **Commentaires**
   Utiliser `--` pour des commentaires sur une ligne ou `/* ... */` pour des commentaires multi-lignes.

   ```sql
   -- Ceci est un commentaire
   /* Ceci est un commentaire
      sur plusieurs lignes */
   ```

2. **Nommer clairement les objets**
   Tables, colonnes et contraintes doivent avoir des noms explicites.

3. **Transactions pour modifications critiques**
   Utiliser `BEGIN`, `COMMIT`, `ROLLBACK` pour éviter les erreurs irréversibles.

4. **Séparer les scripts**
   Par exemple : un script pour la création de tables, un autre pour l’insertion de données.

5. **Tester sur une base de données de test**
   Ne jamais exécuter un script directement sur une base de production sans validation.

## 6. Exemple complet d’un script SQL

```sql
-- Création de la base
CREATE DATABASE IF NOT EXISTS ecole;
USE ecole;

-- Création de la table
CREATE TABLE IF NOT EXISTS etudiants (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nom VARCHAR(50) NOT NULL,
    prenom VARCHAR(50),
    age INT
);

-- Insertion de données
INSERT INTO etudiants (nom, prenom, age) VALUES
('Dupont', 'Marie', 22),
('Martin', 'Paul', 24),
('Durand', 'Claire', 23);

-- Requête de sélection
SELECT * FROM etudiants WHERE age > 22 ORDER BY nom ASC;

-- Mise à jour d’un enregistrement
UPDATE etudiants SET age = 25 WHERE nom = 'Durand';

-- Suppression d’un enregistrement
DELETE FROM etudiants WHERE nom = 'Martin';
```

---

**Note :** Après avoir créé ce script, utilisez un client SQL pour l'exécuter et appliquer toutes les commandes dans votre base de données.

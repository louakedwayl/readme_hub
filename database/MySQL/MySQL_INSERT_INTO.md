# MySQL : La commande `INSERT INTO`

## 1. Introduction

La commande **`INSERT INTO`** en MySQL est utilisée pour **ajouter des données dans une table**. C’est l’une des commandes SQL les plus utilisées pour gérer les données d’une base.

---

## 2. Syntaxe de base

### a) Insertion simple

```sql
INSERT INTO nom_table (colonne1, colonne2, colonne3)
VALUES (valeur1, valeur2, valeur3);
```

* `nom_table` : nom de la table où vous voulez insérer des données
* `(colonne1, colonne2, ...)` : colonnes ciblées (optionnel si vous remplissez toutes les colonnes)
* `VALUES (...)` : valeurs correspondantes aux colonnes

### Exemple

```sql
INSERT INTO clients (nom, email, date_inscription)
VALUES ('Alice', 'alice@example.com', NOW());
```

---

### b) Insertion dans toutes les colonnes

Si vous fournissez toutes les colonnes, vous pouvez omettre la liste des colonnes :

```sql
INSERT INTO clients
VALUES (NULL, 'Bob', 'bob@example.com', NOW());
```

* `NULL` pour une colonne `AUTO_INCREMENT` permet à MySQL de générer automatiquement la valeur.

---

### c) Insertion de plusieurs lignes

```sql
INSERT INTO clients (nom, email, date_inscription)
VALUES
('Charlie', 'charlie@example.com', NOW()),
('David', 'david@example.com', NOW()),
('Eve', 'eve@example.com', NOW());
```

* Permet d’insérer **plusieurs enregistrements en une seule commande** pour améliorer les performances.

---

## 3. Utilisation avec `SELECT`

On peut insérer des données issues d’une autre table :

```sql
INSERT INTO clients_backup (nom, email, date_inscription)
SELECT nom, email, date_inscription FROM clients;
```

* Très utile pour **sauvegarder ou copier des données**.

---

## 4. `INSERT IGNORE` et `ON DUPLICATE KEY UPDATE`

### a) `INSERT IGNORE`

```sql
INSERT IGNORE INTO clients (nom, email)
VALUES ('Alice', 'alice@example.com');
```

* Ignore les erreurs (ex : violation de clé primaire ou unique) et continue l’insertion des autres lignes.

### b) `ON DUPLICATE KEY UPDATE`

```sql
INSERT INTO clients (id, nom, email)
VALUES (1, 'Alice', 'alice_new@example.com')
ON DUPLICATE KEY UPDATE email = VALUES(email);
```

* Si la clé primaire ou unique existe déjà, **met à jour les colonnes spécifiées** au lieu de générer une erreur.

---

## 5. Bonnes pratiques

1. Toujours **spécifier les colonnes** si vous n’insérez pas toutes les colonnes pour éviter les erreurs futures lors de modifications de structure.
2. Utiliser **`NOW()`** pour les colonnes timestamp si vous voulez enregistrer la date et l’heure actuelles.
3. Pour de **grosses insertions**, préférer plusieurs lignes dans un seul `INSERT` plutôt que plusieurs commandes individuelles.
4. Utiliser **`INSERT IGNORE`** ou **`ON DUPLICATE KEY UPDATE`** pour gérer les conflits de clé proprement.

---

## 6. Résumé

* `INSERT INTO` sert à **ajouter des données** dans une table MySQL.
* Peut insérer **une seule ligne ou plusieurs lignes** à la fois.
* Peut insérer **depuis un `SELECT`** ou gérer les conflits avec `IGNORE` ou `ON DUPLICATE KEY UPDATE`.
* Bonne pratique : **toujours préciser les colonnes** et gérer les clés uniques ou primaires avec soin.

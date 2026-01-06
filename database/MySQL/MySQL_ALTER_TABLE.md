# MySQL : La commande `ALTER TABLE`

## 1. Introduction

La commande **`ALTER TABLE`** en MySQL permet de **modifier la structure d'une table existante** sans avoir à la recréer.
On peut ajouter ou supprimer des colonnes, changer le type de données, modifier des clés, renommer la table, ou changer son jeu de caractères et sa collation.

---

## 2. Syntaxe de base

```sql
ALTER TABLE nom_table action;
```

* `nom_table` : table que l’on souhaite modifier
* `action` : modification à appliquer (ajouter, modifier, supprimer, renommer, changer charset, etc.)

---

## 3. Ajouter une colonne

```sql
ALTER TABLE clients
ADD date_naissance DATE;
```

* `ADD` permet d’ajouter une colonne à la fin de la table.
* On peut préciser la position avec `AFTER` :

```sql
ALTER TABLE clients
ADD telephone VARCHAR(20) AFTER email;
```

---

## 4. Modifier une colonne

```sql
ALTER TABLE clients
MODIFY email VARCHAR(150) NOT NULL;
```

* `MODIFY` permet de changer le type de données ou les contraintes d’une colonne existante.
* Pour renommer la colonne tout en modifiant le type, on utilise `CHANGE` :

```sql
ALTER TABLE clients
CHANGE nom nom_complet VARCHAR(100) NOT NULL;
```

---

## 5. Supprimer une colonne

```sql
ALTER TABLE clients
DROP COLUMN date_naissance;
```

* Supprime une colonne existante de la table.

---

## 6. Renommer une table

```sql
ALTER TABLE clients
RENAME TO clients_backup;
```

* Permet de changer le nom de la table.

---

## 7. Ajouter / supprimer une clé primaire ou index

```sql
-- Ajouter une clé primaire
ALTER TABLE commandes
ADD PRIMARY KEY (id_commande);

-- Supprimer un index
ALTER TABLE commandes
DROP INDEX idx_client;
```

---

## 8. Modifier le jeu de caractères et la collation

```sql
ALTER TABLE clients
CONVERT TO CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
```

* Permet de **changer le charset et la collation d

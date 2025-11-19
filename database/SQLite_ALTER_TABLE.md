# ALTER TABLE en SQLite

## 1. Introduction

En **SQLite**, `ALTER TABLE` est utilisé pour modifier une table existante. Contrairement à d'autres SGBD, SQLite a **un support limité** pour certaines opérations avec `ALTER TABLE`.

Syntaxe générale :

```sql
ALTER TABLE nom_table action;
```

* `nom_table` : nom de la table existante.
* `action` : modification à effectuer (ex : renommer la table, ajouter une colonne, renommer une colonne).

---

## 2. Renommer une table

Pour renommer une table existante :

```sql
ALTER TABLE ancien_nom RENAME TO nouveau_nom;
```

Exemple :

```sql
ALTER TABLE users RENAME TO clients;
```

---

## 3. Ajouter une colonne

Pour ajouter une nouvelle colonne à une table existante :

```sql
ALTER TABLE nom_table ADD COLUMN nom_colonne TYPE_CONTRAINTE;
```

* La nouvelle colonne sera ajoutée à la fin de la table.
* Les valeurs existantes seront `NULL` par défaut, sauf si un `DEFAULT` est spécifié.

Exemple :

```sql
ALTER TABLE users ADD COLUMN phone TEXT;
ALTER TABLE users ADD COLUMN age INTEGER DEFAULT 18;
```

---

## 4. Renommer une colonne (SQLite >= 3.25.0)

Depuis la version 3.25.0 de SQLite, il est possible de renommer une colonne :

```sql
ALTER TABLE nom_table RENAME COLUMN ancien_nom TO nouveau_nom;
```

Exemple :

```sql
ALTER TABLE users RENAME COLUMN username TO login;
```

---

## 5. Limitations de ALTER TABLE en SQLite

Contrairement à d'autres SGBD comme MySQL ou PostgreSQL, SQLite **ne permet pas directement** :

* Supprimer une colonne.
* Modifier le type d'une colonne.
* Supprimer une contrainte.
* Modifier une contrainte `PRIMARY KEY`.

Pour effectuer ces opérations, il faut généralement :

1. Créer une nouvelle table avec la structure désirée.
2. Copier les données depuis l’ancienne table.
3. Supprimer l’ancienne table.
4. Renommer la nouvelle table.

Exemple :

```sql
-- 1. Créer nouvelle table
CREATE TABLE users_new (
    id INTEGER PRIMARY KEY,
    login TEXT NOT NULL,
    email TEXT
);

-- 2. Copier les données
INSERT INTO users_new (id, login, email)
SELECT id, username, email FROM users;

-- 3. Supprimer l'ancienne table
DROP TABLE users;

-- 4. Renommer la nouvelle table
ALTER TABLE users_new RENAME TO users;
```

---

## 6. Bonnes pratiques

* Vérifier la version de SQLite pour s'assurer que certaines fonctionnalités (comme renommer une colonne) sont disponibles.
* Toujours **faire une sauvegarde** avant de modifier une table.
* Préférer `ADD COLUMN` ou `RENAME` pour éviter les étapes complexes.
* Utiliser des transactions pour garantir l'intégrité des données.

---

### Références

* [Documentation SQLite - ALTER TABLE](https://www.sqlite.org/lang_altertable.html)

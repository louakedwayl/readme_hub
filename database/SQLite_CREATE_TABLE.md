# CREATE TABLE en SQLite

## 1. Introduction

En **SQLite**, `CREATE TABLE` est utilisé pour créer une nouvelle table dans une base de données. Une **table** est une structure qui contient des **lignes (records)** et des **colonnes (fields)**.

Syntaxe générale :

```sql
CREATE TABLE nom_table (
    colonne1 TYPE_CONTRAINTE,
    colonne2 TYPE_CONTRAINTE,
    ...
);
```

* `nom_table` : nom de la table.
* `colonne1`, `colonne2`, … : noms des colonnes.
* `TYPE_CONTRAINTE` : type de données et contraintes de la colonne (ex : `INTEGER NOT NULL`).

---

## 2. Types de données en SQLite

SQLite a un système de typage **flexible**, appelé **typage dynamique**. Les types principaux sont :

| Type SQLite | Description                        |
| ----------- | ---------------------------------- |
| `NULL`      | Valeur NULL                        |
| `INTEGER`   | Nombre entier                      |
| `REAL`      | Nombre à virgule flottante         |
| `TEXT`      | Chaîne de caractères               |
| `BLOB`      | Données binaires (fichier, image…) |

> Remarque : même si vous mettez un type différent, SQLite va accepter les valeurs de tout type sauf si vous utilisez des **contraintes** strictes.

---

## 3. Contraintes courantes

* **PRIMARY KEY** : identifie de manière unique une ligne.
* **AUTOINCREMENT** : génère automatiquement un entier unique pour la clé primaire.
* **NOT NULL** : interdit les valeurs NULL.
* **UNIQUE** : interdit les doublons dans cette colonne.
* **CHECK (condition)** : impose une condition sur la valeur de la colonne.
* **DEFAULT valeur** : valeur par défaut si aucune valeur n’est donnée.

Exemple :

```sql
CREATE TABLE users (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    username TEXT NOT NULL UNIQUE,
    email TEXT NOT NULL,
    age INTEGER DEFAULT 18,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP
);
```

---

## 4. Clés étrangères (Foreign Key)

Une **clé étrangère** permet de lier une table à une autre.

Syntaxe :

```sql
CREATE TABLE commandes (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    user_id INTEGER,
    produit TEXT,
    FOREIGN KEY (user_id) REFERENCES users(id)
);
```

> Remarque : par défaut, SQLite **n’active pas les contraintes de clé étrangère**. Pour les activer :

```sql
PRAGMA foreign_keys = ON;
```

---

## 5. Créer une table seulement si elle n’existe pas

Pour éviter les erreurs si la table existe déjà :

```sql
CREATE TABLE IF NOT EXISTS nom_table (
    ...
);
```

---

## 6. Exemple complet

```sql
CREATE TABLE IF NOT EXISTS posts (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    title VARCHAR(158) NOT NULL,
    content TEXT NOT NULL,
    category VARCHAR(50),
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP
);
```

* `id` : clé primaire auto-incrémentée.
* `title` : titre du post, obligatoire.
* `content` : contenu du post, obligatoire.
* `category` : catégorie, optionnelle.
* `created_at` : date de création, par défaut maintenant.

---

## 7. Bonnes pratiques

* Toujours définir une **clé primaire**.
* Utiliser `NOT NULL` pour les champs obligatoires.
* Utiliser `IF NOT EXISTS` si le script peut être exécuté plusieurs fois.
* Choisir des noms clairs et cohérents pour les colonnes.

---

### Références

* [Documentation SQLite - CREATE TABLE](https://www.sqlite.org/lang_createtable.html)

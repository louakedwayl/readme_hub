# 🗝️ Les Clés Primaires en SQLite

## *Cours complet*

## ⭐ Qu'est-ce qu'une clé primaire ?

Une **clé primaire** (PRIMARY KEY) est une contrainte qui permet
d'identifier **de manière unique** chaque ligne d'une table.

Elle garantit deux règles :

1.  **Unicité** → deux lignes ne peuvent pas avoir la même valeur.\
2.  **Non-null** → impossible d'insérer une valeur `NULL`.

Exemple simple :

``` sql
CREATE TABLE users (
    id INTEGER PRIMARY KEY,
    name TEXT
);
```

Ici, `id` est unique et jamais NULL.

------------------------------------------------------------------------

# 1️⃣ Les différents types de clés primaires en SQLite

SQLite accepte plusieurs formes de clés primaires :

------------------------------------------------------------------------

## 1. PRIMARY KEY sur un seul champ

### Exemple classique

``` sql
CREATE TABLE users (
    id INTEGER PRIMARY KEY,
    name TEXT
);
```

ℹ️ Si la clé primaire est un champ **INTEGER**, SQLite lui donne un
comportement spécial → il devient une **alias de ROWID** (plus rapide et
auto-incrémenté).

------------------------------------------------------------------------

## 2. PRIMARY KEY composé (plusieurs colonnes)

Utile quand aucune colonne seule ne peut être unique.

``` sql
CREATE TABLE orders (
    user_id INTEGER,
    product_id INTEGER,
    quantity INTEGER,
    PRIMARY KEY (user_id, product_id)
);
```

Ici, un utilisateur ne peut commander un produit qu'une seule fois.

------------------------------------------------------------------------

## 3. PRIMARY KEY avec AUTOINCREMENT (cas particulier)

``` sql
CREATE TABLE employees (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    name TEXT
);
```

### 🎯 AUTOINCREMENT sert à :

-   Empêcher la réutilisation d'anciens IDs supprimés
-   Garantir que chaque ID est toujours plus grand que le précédent

⚠️ Mais il est **rarement utile** → ralentit un peu, augmente la
fragmentation.

------------------------------------------------------------------------

# 2️⃣ Comment SQLite gère les PRIMARY KEY ?

## 🔹 PRIMARY KEY INTEGER = alias de ROWID

SQLite crée automatiquement un champ caché `rowid`.\
Quand tu mets :

``` sql
id INTEGER PRIMARY KEY
```

Alors `id` = `rowid`.

➜ Résultat :\
- Performances maximales\
- Auto-incrémentation automatique\
- Index unique intégré

------------------------------------------------------------------------

## 🔹 PRIMARY KEY TEXT ou autre type

``` sql
email TEXT PRIMARY KEY
```

Ce n'est **pas** un alias de rowid.\
SQLite gère un index unique séparé.

------------------------------------------------------------------------

# 3️⃣ Ajouter une clé primaire (limitation)

⚠️ SQLite **ne permet pas** d'ajouter une PRIMARY KEY après la création
d'une table :

``` sql
ALTER TABLE table ADD PRIMARY KEY ...   -- ❌ Impossible
```

Si tu veux une clé primaire → tu dois **recréer la table**.

------------------------------------------------------------------------

# 4️⃣ Exemples complets

## Exemple simple

``` sql
CREATE TABLE books (
    id INTEGER PRIMARY KEY,
    title TEXT NOT NULL,
    author TEXT NOT NULL
);
```

## Exemple avec clé composée

``` sql
CREATE TABLE likes (
    user_id INTEGER,
    post_id INTEGER,
    created_at TEXT,
    PRIMARY KEY (user_id, post_id)
);
```

## Exemple avec AUTOINCREMENT

``` sql
CREATE TABLE logs (
    log_id INTEGER PRIMARY KEY AUTOINCREMENT,
    message TEXT
);
```

------------------------------------------------------------------------

# 5️⃣ Vérifier la clé primaire d'une table

``` sql
PRAGMA table_info(users);
```

Cela affiche toutes les colonnes.\
La colonne `pk` indique si elle fait partie de la clé primaire.

------------------------------------------------------------------------

# 6️⃣ Résumé rapide

  Concept                           Explication
  --------------------------------- ------------------------------------------
  `PRIMARY KEY`                     Identifie de manière unique chaque ligne
  `INTEGER PRIMARY KEY`             alias de `rowid` (auto-incrément)
  `AUTOINCREMENT`                   IDs jamais réutilisés (rarement utile)
  Composite key                     Plusieurs colonnes uniques ensemble
  Impossible à ajouter après coup   Il faut recréer la table

------------------------------------------------------------------------

# 📘 Conclusion

Les clés primaires sont fondamentales en SQLite pour assurer l'unicité
et la cohérence des données. La particularité importante : un champ
**INTEGER PRIMARY KEY** devient l'identifiant natif `rowid`, ce qui
donne des performances optimales.

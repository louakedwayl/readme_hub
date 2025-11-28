# 📘 Cours complet : `PRAGMA` dans SQLite

## 🎯 Introduction

Les **PRAGMA** sont des commandes spécifiques à SQLite permettant de
**configurer le comportement du moteur**, **obtenir des informations**,
**ajuster les performances**, et **contrôler la structure interne de la
base**.\
Elles ne font pas partie de la norme SQL, mais sont essentielles pour
tirer le meilleur de SQLite.

La commande PRAGMA foreign_keys = ON; (souvent utilisée dans SQLite) sert à activer la vérification des clés étrangères dans la base de données.

### 📌 Explication simple

Dans SQLite :

Par défaut, les contraintes de clés étrangères ne sont pas appliquées 

```bash
PRAGMA foreign_keys = ON;
```

------------------------------------------------------------------------

# 🔍 1. Qu'est‑ce qu'un PRAGMA ?

Un **PRAGMA** est une commande interne de SQLite qui permet : - de lire
ou modifier des paramètres, - d'obtenir des informations sur la base, -
d'activer des fonctionnalités particulières.

Syntaxe générale :

``` sql
PRAGMA nom_pragma;
PRAGMA nom_pragma = valeur;
```

Parfois on précise la base :

``` sql
PRAGMA main.page_size;
```

------------------------------------------------------------------------

# ⚙️ 2. Les grandes catégories de PRAGMA

SQLite classe implicitement les PRAGMA dans les catégories suivantes :

## ✔️ 2.1. PRAGMA d'information (lecture)

Ils permettent d'inspecter la configuration et la structure : -
`PRAGMA table_info(table_name);` - `PRAGMA index_list(table_name);` -
`PRAGMA database_list;` - `PRAGMA foreign_key_list(table_name);` -
`PRAGMA freelist_count;`

------------------------------------------------------------------------

## ✔️ 2.2. PRAGMA de sécurité / intégrité

-   `PRAGMA foreign_keys = ON;`
-   `PRAGMA trusted_schema = OFF;`
-   `PRAGMA integrity_check;`
-   `PRAGMA quick_check;`

------------------------------------------------------------------------

## ✔️ 2.3. PRAGMA de performance

-   `PRAGMA journal_mode;`
-   `PRAGMA synchronous;`
-   `PRAGMA cache_size;`
-   `PRAGMA mmap_size;`
-   `PRAGMA temp_store;`

------------------------------------------------------------------------

## ✔️ 2.4. PRAGMA d'écriture / stockage

-   `PRAGMA page_size;`
-   `PRAGMA auto_vacuum;`
-   `PRAGMA wal_autocheckpoint;`

------------------------------------------------------------------------

# 🧪 3. PRAGMA les plus utiles (expliqués)

## 🔹 3.1. `PRAGMA table_info(table_name)`

Affiche les colonnes d'une table.

``` sql
PRAGMA table_info(users);
```

Sortie typique : cid, name, type, notnull, dflt_value, pk.

------------------------------------------------------------------------

## 🔹 3.2. `PRAGMA foreign_keys`

Active ou désactive la vérification des clés étrangères.

``` sql
PRAGMA foreign_keys = ON;
```

Doit être activé **manuellement**, car SQLite ne le fait pas par défaut
dans certaines versions.

------------------------------------------------------------------------

## 🔹 3.3. `PRAGMA journal_mode`

Définit la gestion du journal (transactions).

Modes possibles : - `DELETE` (par défaut) - `TRUNCATE` - `PERSIST` -
`MEMORY` - `WAL` → recommandé pour fortes performances - `OFF`

Exemple :

``` sql
PRAGMA journal_mode = WAL;
```

------------------------------------------------------------------------

## 🔹 3.4. `PRAGMA synchronous`

Contrôle la sécurité d'écriture.

-   `FULL` → le plus sûr, le plus lent
-   `NORMAL` → bon compromis
-   `OFF` → rapide mais peu sûr

``` sql
PRAGMA synchronous = NORMAL;
```

------------------------------------------------------------------------

## 🔹 3.5. `PRAGMA cache_size`

Définit la taille du cache (nombre de pages).

``` sql
PRAGMA cache_size = 2000;
```

Valeurs négatives → taille en KB.

------------------------------------------------------------------------

## 🔹 3.6. `PRAGMA mmap_size`

Active l'accès mémoire-mappée.

``` sql
PRAGMA mmap_size = 268435456; -- 256 Mo
```

Améliore parfois la vitesse des lectures.

------------------------------------------------------------------------

## 🔹 3.7. `PRAGMA integrity_check`

Test complet de l'intégrité de la base.

``` sql
PRAGMA integrity_check;
```

------------------------------------------------------------------------

# 📋 4. PRAGMA structuraux

## 🔹 Page size

``` sql
PRAGMA page_size;
PRAGMA page_size = 4096;
```

Doit être défini **avant** la création de tables.

------------------------------------------------------------------------

## 🔹 Auto-vacuum

``` sql
PRAGMA auto_vacuum = FULL;
```

Modes : - `NONE` - `FULL` - `INCREMENTAL`

------------------------------------------------------------------------

# 🛠️ 5. Exemple d'optimisation d'une base SQLite

``` sql
PRAGMA journal_mode = WAL;
PRAGMA synchronous = NORMAL;
PRAGMA temp_store = MEMORY;
PRAGMA mmap_size = 300000000;
PRAGMA foreign_keys = ON;
```

------------------------------------------------------------------------

# 🧭 6. PRAGMA et bases attachées

SQLite permet d'utiliser PRAGMA sur une base attachée :

``` sql
ATTACH DATABASE 'log.db' AS logdb;
PRAGMA logdb.page_size;
```

------------------------------------------------------------------------

# 🎓 Conclusion

Les PRAGMA sont indispensables pour : - configurer SQLite, - améliorer
les performances, - vérifier la sécurité et l'intégrité, - comprendre la
structure interne de la base.

Les maîtriser permet d'utiliser SQLite **de manière avancée et
optimale**.

------------------------------------------------------------------------

Souhaites‑tu : - une version plus détaillée ? - un PDF ou un DOCX ? - un
cours sur un PRAGMA en particulier ?

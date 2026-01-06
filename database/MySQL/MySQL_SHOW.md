# MySQL : La commande `SHOW`

## 1. Introduction

La commande **`SHOW`** en MySQL est utilisée pour **afficher des informations sur la base de données, les tables, les colonnes et la configuration du serveur**. Elle ne modifie pas les données, mais est essentielle pour explorer et comprendre l’état de la base et sa structure.

---

## 2. Syntaxe générale

```sql
SHOW type_objet [LIKE 'motif'] [WHERE condition];
```

* `type_objet` : l’objet que vous souhaitez afficher (databases, tables, columns, indexes, etc.)
* `LIKE 'motif'` : filtre les résultats selon un motif avec des jokers `%` et `_`
* `WHERE condition` : permet de filtrer les résultats selon une condition SQL

---

## 3. Afficher les bases de données

```sql
SHOW DATABASES;
```

* Liste toutes les bases de données présentes sur le serveur MySQL.

```sql
SHOW DATABASES LIKE 'test%';
```

* Affiche seulement les bases dont le nom commence par "test".

---

## 4. Afficher les tables d'une base

```sql
USE ma_base;
SHOW TABLES;
```

* Liste toutes les tables de la base actuellement utilisée.

```sql
SHOW TABLES LIKE 'clients%';
```

* Filtre les tables dont le nom commence par "clients".

---

## 5. Afficher les colonnes d'une table

```sql
SHOW COLUMNS FROM clients;
```

* Affiche toutes les colonnes de la table `clients` avec leur type, si elles acceptent `NULL`, la clé primaire, la valeur par défaut et l’extra.

```sql
SHOW FULL COLUMNS FROM clients;
```

* Fournit des informations supplémentaires comme le collation, le privilège et le commentaire.

---

## 6. Afficher les index d'une table

```sql
SHOW INDEX FROM clients;
```

* Liste tous les index de la table `clients`, y compris les clés primaires et uniques.

---

## 7. Afficher les variables et la configuration du serveur

```sql
SHOW VARIABLES;
```

* Affiche toutes les variables de configuration du serveur MySQL.

```sql
SHOW VARIABLES LIKE 'max_connections';
```

* Filtre pour afficher uniquement la variable `max_connections`.

```sql
SHOW STATUS;
```

* Affiche les statistiques et l’état actuel du serveur.

---

## 8. Afficher les privilèges et utilisateurs

```sql
SHOW GRANTS FOR 'user'@'localhost';
```

* Montre les privilèges d’un utilisateur spécifique.

```sql
SHOW GRANTS;
```

* Montre vos privilèges actuels.

---

## 9. Bonnes pratiques

1. Utiliser `LIKE` pour filtrer les résultats et éviter des listes trop longues.
2. Privilégier `SHOW FULL COLUMNS` si vous avez besoin de plus de détails sur les colonnes.
3. Pour l’analyse de performance, combiner `SHOW STATUS` et `SHOW VARIABLES`.
4. Toujours vérifier l’utilisateur et les privilèges avant d’accéder à certaines informations.

---

## 10. Résumé

* `SHOW` est une commande MySQL pour **explorer la base, les tables, les colonnes, les index, les utilisateurs et la configuration du serveur**.
* Elle est utilisée pour **obtenir des informations sans modifier les données**.
* Permet de filtrer les résultats avec `LIKE` ou `WHERE` et d’obtenir des informations détaillées sur la structure et la configuration du serveur.

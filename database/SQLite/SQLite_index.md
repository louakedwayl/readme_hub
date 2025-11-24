# 📘 Cours : Les index en SQLite

## 1. Introduction

En SQLite, **un index** est une structure de données supplémentaire
utilisée pour **accélérer les recherches**, les tris et les jointures.\
Sans index, SQLite doit scanner toutes les lignes d'une table → ce qu'on
appelle un *full table scan*.

## 2. Pourquoi utiliser un index ?

### ✔️ Avantages

-   Accélère les requêtes avec `WHERE`, `JOIN`, `ORDER BY`, `GROUP BY`
-   Réduit le nombre de pages lues

### ❗ Inconvénients

-   Prend de la place
-   Ralentit `INSERT`, `UPDATE`, `DELETE`

## 3. Création d'un index

``` sql
CREATE INDEX idx_users_email ON users(email);
```

## 4. Index composite

``` sql
CREATE INDEX idx_orders_customer_date
ON orders(customer_id, order_date);
```

## 5. Index UNIQUE

``` sql
CREATE UNIQUE INDEX idx_unique_email ON users(email);
```

## 6. Suppression d'un index

``` sql
DROP INDEX idx_users_email;
```

## 7. Vérifier les index

``` sql
PRAGMA index_list('users');
PRAGMA index_info('idx_users_email');
```

## 8. EXPLAIN QUERY PLAN

``` sql
EXPLAIN QUERY PLAN
SELECT * FROM users WHERE email = 'test@example.com';
```

## 9. Bonnes pratiques

### ✔️ À faire

-   Indexer les colonnes utilisées dans WHERE, ORDER BY, JOIN
-   Indexer les clés étrangères

### ❗ À éviter

-   Indexer toutes les colonnes
-   Indexer des petites tables

## 10. Exemple complet

``` sql
CREATE INDEX idx_orders_customer_id ON orders(customer_id);
CREATE INDEX idx_orders_date ON orders(order_date);
```

# 📘 Les Tables Pivot en SQL

## Comprendre les relations Many-to-Many (M:N)

## 🎯 Introduction

Dans une base de données SQL, certaines entités ont des relations
complexes.\
Parfois, une entité peut être liée à **plusieurs** autres entités, et
inversement.

Exemples classiques :\
- Une recette peut avoir **plusieurs catégories**.\
- Une catégorie peut appartenir à **plusieurs recettes**.\
- Un étudiant peut suivre **plusieurs cours**.\
- Un cours peut avoir **plusieurs étudiants**.

Ce type de relation s'appelle :

> **Relation many-to-many (M:N)**

SQL ne peut **pas représenter** une relation M:N directement entre deux
tables.\
Pour résoudre ça, on utilise une **table pivot**.

------------------------------------------------------------------------

# 🔍 Pourquoi SQL ne peut pas gérer une relation many-to-many directement ?

Le modèle relationnel impose deux règles :

1.  **Une cellule = une seule valeur**
2.  **Une colonne = un seul type**

Donc on ne peut pas faire :

``` sql
category_id = "1,2,5"
```

ni :

``` sql
category_ids = [1, 2, 5]
```

SQL ne peut pas appliquer de `FOREIGN KEY` sur une liste ou un tableau.

➡️ Il faut donc **une troisième table**.

------------------------------------------------------------------------

# 🧱 Qu'est-ce qu'une table pivot ?

Une **table pivot** (ou table de liaison) est une table dédiée qui relie
deux autres tables dans une relation M:N.

Elle contient uniquement les clés étrangères des tables qu'elle relie.

Exemple :

    recipes            categories             categories_recipes
    ---------          -----------            --------------------
    id   <───────────  recipe_id
    title              category_id  ─────────→ id

------------------------------------------------------------------------

# 🧩 Exemple concret

## Table `recipes`

``` sql
CREATE TABLE recipes (
    id INTEGER PRIMARY KEY,
    title TEXT NOT NULL
);
```

## Table `categories`

``` sql
CREATE TABLE categories (
    id INTEGER PRIMARY KEY,
    name TEXT NOT NULL
);
```

## Table pivot `categories_recipes`

``` sql
CREATE TABLE categories_recipes (
    recipe_id INTEGER,
    category_id INTEGER,
    FOREIGN KEY(recipe_id) REFERENCES recipes(id),
    FOREIGN KEY(category_id) REFERENCES categories(id)
);
```

⚠️ La table pivot ne contient **pas** de données propres.\
Elle sert uniquement à relier les deux autres tables.

------------------------------------------------------------------------

# ⚠️ Ce qu'il ne faut jamais faire

## ❌ Mettre `category_id` directement dans `recipes`

Impossible si une recette a plusieurs catégories.

## ❌ Mettre `recipe_id` dans `categories`

Impossible si une catégorie a plusieurs recettes.

## ❌ Faire pointer une table principale vers une table pivot

Exemples faux :

``` sql
FOREIGN KEY(id) REFERENCES categories_recipes(recipe_id)
```

👉 Cela crée des **références circulaires** → erreurs SQL.

------------------------------------------------------------------------

# ✔️ Pourquoi la table pivot est la meilleure solution ?

  -----------------------------------------------------------------------
  Problème résolu                          Explication
  ---------------------------------------- ------------------------------
  Plusieurs relations par entité           Une recette peut avoir 3, 10
                                           ou 50 catégories

  Intégrité des données                    Les FOREIGN KEY assurent que
                                           tout est cohérent

  Requêtes optimisées                      Les JOIN fonctionnent
                                           parfaitement

  Aucune limite fixe                       Contrairement à des colonnes
                                           multiples ou aux listes

  Compatible avec tous les SGBD            Standard universel SQL
  -----------------------------------------------------------------------

------------------------------------------------------------------------

# 🔥 Exemple d'utilisation

## Ajouter une recette

``` sql
INSERT INTO recipes (title) VALUES ('Pâte Carbonara');
```

## Ajouter une catégorie

``` sql
INSERT INTO categories (name) VALUES ('Italien');
```

## Relier les deux

``` sql
INSERT INTO categories_recipes (recipe_id, category_id)
VALUES (1, 1);
```

------------------------------------------------------------------------

# 🔎 Faire des requêtes JOIN

### Trouver les catégories d'une recette

``` sql
SELECT categories.name
FROM categories
JOIN categories_recipes ON categories.id = categories_recipes.category_id
WHERE categories_recipes.recipe_id = 1;
```

### Trouver toutes les recettes d'une catégorie

``` sql
SELECT recipes.title
FROM recipes
JOIN categories_recipes ON recipes.id = categories_recipes.recipe_id
WHERE categories_recipes.category_id = 1;
```

------------------------------------------------------------------------

# 🏁 Conclusion

-   Les relations many-to-many **ne peuvent pas être gérées
    directement** en SQL.\
-   Il faut toujours utiliser une **table pivot**.\
-   C'est une règle **universelle**, valable dans *tous* les SGBD
    (SQLite, MySQL, PostgreSQL...).\
-   Les tables pivot garantissent **performance**, **cohérence**, et
    **flexibilité**.

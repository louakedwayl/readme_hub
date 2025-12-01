# 🎯 Rôle du mot-clé `ON` dans une jointure SQL (SQLite)

Le mot-clé **`ON`** est utilisé pour indiquer **comment deux tables
doivent être reliées** lors d'une jointure.\
SQL doit toujours savoir quelles lignes d'une table correspondent aux
lignes de l'autre.

------------------------------------------------------------------------

# 🧠 Explication simple

Quand tu fais une jointure, tu connectes deux tables.\
Le `ON` sert à dire **quelle colonne de la première table correspond à
quelle colonne de la seconde**.

------------------------------------------------------------------------

# 🧩 Exemple clair

``` sql
SELECT *
FROM recipes
JOIN users
ON recipes.user_id = users.id;
```

### Explication :

-   `recipes.user_id` : l'utilisateur auquel appartient la recette\
-   `users.id` : l'identifiant unique de chaque utilisateur

➡️ SQL fait correspondre les lignes de `recipes` avec celles de `users`
**grâce à cette égalité**.

------------------------------------------------------------------------

# 🖼️ Schéma visuel

    recipes.user_id      users.id
          1      ────────────>    1
          2      ────────────>    2
          3      ────────────>    3

Chaque valeur de `user_id` dans `recipes` doit correspondre à une valeur
`id` dans `users`.

------------------------------------------------------------------------

# ⭐ Résumé

-   Sans `ON`, SQL ne sait pas comment relier les tables.\
-   Avec `ON`, tu lui indiques précisément **quelle colonne relie quelle
    autre**.\
-   C'est la base de presque toutes les jointures SQL.

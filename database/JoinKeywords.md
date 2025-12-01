# 📘 Cours : Mots-clés essentiels pour les jointures SQL (SQLite)

Les jointures en SQL permettent de combiner plusieurs tables dans une
seule requête. Mais au-delà des types de jointures (INNER, LEFT...), il
existe des **mots-clés indispensables** pour contrôler comment ces
tables sont liées.

Ce cours couvre les mots-clés principaux :

-   `ON`
-   `USING`
-   `AS`
-   `WHERE`
-   `ORDER BY`
-   `GROUP BY`
-   `HAVING`

------------------------------------------------------------------------

## 🔗 1. Le mot-clé `ON`

### 🎯 Rôle

Indiquer **comment les deux tables doivent être reliées**.

### Exemple

``` sql
SELECT *
FROM recipes
JOIN users
ON recipes.user_id = users.id;
```

------------------------------------------------------------------------

## 🔗 2. Le mot-clé `USING`

### 🎯 Rôle

Simplifier la jointure lorsque les deux tables ont **la même colonne**
avec **le même nom**.

``` sql
SELECT *
FROM ingredients_recipes
JOIN recipes
USING (recipe_id);
```

------------------------------------------------------------------------

## 🔤 3. Le mot-clé `AS` (alias)

Renommer une table ou une colonne :

``` sql
SELECT r.title, u.name
FROM recipes AS r
JOIN users AS u ON r.user_id = u.id;
```

------------------------------------------------------------------------

## 🔍 4. Le mot-clé `WHERE`

Filtrer les résultats **après** la jointure :

``` sql
WHERE u.age >= 18;
```

------------------------------------------------------------------------

## 🔢 5. `GROUP BY`

Regrouper les résultats selon une colonne :

``` sql
GROUP BY u.name;
```

------------------------------------------------------------------------

## 🔎 6. `HAVING`

Filtrer **après un GROUP BY** :

``` sql
HAVING total_recipes >= 2;
```

------------------------------------------------------------------------

## 🔁 7. `ORDER BY`

Trier les résultats :

``` sql
ORDER BY u.name ASC;
```

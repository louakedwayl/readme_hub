# Jointures en SQLite

Une **jointure (JOIN)** permet de combiner des lignes de deux tables ou plus **en fonction d’une condition liée à des colonnes communes**. Les jointures sont essentielles pour exploiter les bases de données relationnelles.

## 1. Types de jointures

### a) INNER JOIN (jointure interne)

* Renvoie uniquement les lignes **qui ont des correspondances dans les deux tables**.

```sql
SELECT enfants.nom AS enfant, parents.nom AS parent
FROM enfants
INNER JOIN parents ON enfants.parent_id = parents.id;
```

* Ici, on récupère le nom de l’enfant et le nom de son parent **uniquement si le parent existe**.

### b) LEFT JOIN / LEFT OUTER JOIN (jointure gauche)

* Renvoie **toutes les lignes de la table de gauche**, même si aucune correspondance n’existe dans la table de droite. Les colonnes de la table de droite seront `NULL` si aucune correspondance.

```sql
SELECT enfants.nom AS enfant, parents.nom AS parent
FROM enfants
LEFT JOIN parents ON enfants.parent_id = parents.id;
```

* Ici, on récupère tous les enfants, même ceux dont le `parent_id` ne correspond à aucun parent.

### c) RIGHT JOIN / RIGHT OUTER JOIN (jointure droite)

* SQLite **ne supporte pas directement RIGHT JOIN**, mais on peut inverser les tables avec LEFT JOIN pour obtenir le même résultat.

### d) FULL OUTER JOIN (jointure complète)

* SQLite **ne supporte pas directement FULL OUTER JOIN**.
* On peut simuler avec **UNION** de LEFT JOIN et RIGHT JOIN.

### e) CROSS JOIN (produit cartésien)

* Renvoie toutes les combinaisons possibles entre les lignes des deux tables.

```sql
SELECT enfants.nom AS enfant, parents.nom AS parent
FROM enfants
CROSS JOIN parents;
```

* Attention, le résultat peut devenir très volumineux si les tables sont grandes.

## 2. Jointures multiples

* On peut joindre **plus de deux tables** en les chaînant.

```sql
SELECT e.nom AS enfant, p.nom AS parent, c.nom AS classe
FROM enfants e
INNER JOIN parents p ON e.parent_id = p.id
INNER JOIN classes c ON e.classe_id = c.id;
```

* Ici, on combine **enfants → parents → classes** pour obtenir toutes les informations.

## 3. Utilisation des alias

* Les alias permettent de **simplifier la lecture** des requêtes et des colonnes.

```sql
SELECT e.nom AS enfant, p.nom AS parent
FROM enfants AS e
INNER JOIN parents AS p ON e.parent_id = p.id;
```

* `e` est un alias pour `enfants` et `p` pour `parents`.

## 4. Bonnes pratiques

1. Toujours préciser la condition de jointure avec **ON** pour éviter les produits cartésiens non désirés.
2. Utiliser des alias pour améliorer la lisibilité.
3. Pour les grandes tables, préférer INNER JOIN ou LEFT JOIN selon le besoin pour optimiser les performances.
4. Vérifier les résultats avec `LIMIT` au début pour tester la requête avant de la lancer sur toutes les données.

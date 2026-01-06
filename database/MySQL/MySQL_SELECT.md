# MySQL : La commande `SELECT`

## 1. Introduction

La commande **`SELECT`** est l'une des commandes SQL les plus utilisées. Elle permet de **récupérer des données depuis une ou plusieurs tables** dans une base de données MySQL.

---

## 2. Syntaxe de base

```sql
SELECT colonne1, colonne2, ...
FROM nom_table;
```

* `colonne1, colonne2, ...` : les colonnes que vous souhaitez afficher
* `FROM nom_table` : la table d’où proviennent les données

### Exemple simple

```sql
SELECT nom, email FROM clients;
```

* Affiche uniquement les colonnes `nom` et `email` de la table `clients`.

---

## 3. Sélectionner toutes les colonnes

```sql
SELECT * FROM clients;
```

* `*` signifie **toutes les colonnes**.

---

## 4. Utilisation de `WHERE` pour filtrer

```sql
SELECT nom, email
FROM clients
WHERE id = 1;
```

* `WHERE` permet de **filtrer les lignes selon une condition**.
* On peut utiliser des opérateurs : `=`, `>`, `<`, `>=`, `<=`, `!=`, `LIKE`, `IN`, `BETWEEN`.

### Exemple avec `LIKE`

```sql
SELECT nom FROM clients
WHERE email LIKE '%@example.com';
```

* `%` = joker (0 ou plusieurs caractères)
* Retourne les clients dont l’email se termine par `@example.com`.

---

## 5. Trier les résultats avec `ORDER BY`

```sql
SELECT nom, email FROM clients
ORDER BY nom ASC;
```

* `ASC` → tri croissant (par défaut)
* `DESC` → tri décroissant

---

## 6. Limiter le nombre de résultats avec `LIMIT`

```sql
SELECT * FROM clients
ORDER BY date_inscription DESC
LIMIT 5;
```

* Affiche seulement les **5 dernières inscriptions**.

---

## 7. Sélectionner des valeurs uniques avec `DISTINCT`

```sql
SELECT DISTINCT ville FROM clients;
```

* Retourne les **valeurs uniques** de la colonne `ville`.

---

## 8. Fonctions d’agrégation

| Fonction       | Description                     |
| -------------- | ------------------------------- |
| `COUNT(*)`     | Compte le nombre de lignes      |
| `SUM(colonne)` | Somme des valeurs d’une colonne |
| `AVG(colonne)` | Moyenne                         |
| `MIN(colonne)` | Valeur minimale                 |
| `MAX(colonne)` | Valeur maximale                 |

### Exemple

```sql
SELECT COUNT(*) AS total_clients FROM clients;
```

---

## 9. Sélectionner depuis plusieurs tables (JOIN)

```sql
SELECT clients.nom, commandes.montant
FROM clients
JOIN commandes ON clients.id = commandes.client_id;
```

* `JOIN` permet de **combiner les données de plusieurs tables** selon une condition.

---

## 10. Bonnes pratiques

1. Toujours **spécifier les colonnes** plutôt que d’utiliser `*` pour améliorer les performances.
2. Utiliser **`WHERE`** pour filtrer les résultats et éviter de récupérer trop de lignes.
3. Employer **`LIMIT`** lors des tests pour éviter des surcharges.
4. Pour des rapports ou statistiques, utiliser les **fonctions d’agrégation**.
5. Pour joindre plusieurs tables, utiliser **JOIN avec conditions explicites**.

---

## 11. Résumé

* `SELECT` = lire ou récupérer des données dans MySQL.
* Peut être utilisé avec : `WHERE`, `ORDER BY`, `LIMIT`, `DISTINCT`, fonctions d’agrégation et `JOIN`.
* Permet de créer des rapports, filtrer des données et combiner plusieurs tables efficacement.

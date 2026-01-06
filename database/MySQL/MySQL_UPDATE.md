# MySQL : La commande `UPDATE`

## 1. Introduction

La commande **`UPDATE`** en MySQL permet de **modifier les données existantes dans une table**. C’est l’inverse de `INSERT INTO` qui ajoute des données.

---

## 2. Syntaxe de base

```sql
UPDATE nom_table
SET colonne1 = valeur1, colonne2 = valeur2, ...
WHERE condition;
```

* `nom_table` : nom de la table que vous souhaitez modifier
* `SET` : indique les colonnes à mettre à jour et leurs nouvelles valeurs
* `WHERE` : filtre les lignes à modifier (très important pour éviter de tout changer)

---

## 3. Exemple simple

```sql
UPDATE clients
SET email = 'alice_new@example.com'
WHERE id = 1;
```

* Modifie l’email du client dont `id = 1`.

---

## 4. Mettre à jour plusieurs colonnes

```sql
UPDATE clients
SET nom = 'Alice Smith', email = 'alice_smith@example.com'
WHERE id = 1;
```

* Permet de modifier **plusieurs colonnes à la fois**.

---

## 5. Mettre à jour plusieurs lignes

```sql
UPDATE clients
SET statut = 'actif'
WHERE date_inscription < '2025-01-01';
```

* Met à jour toutes les lignes qui respectent la condition `WHERE`.
* ⚠️ **Sans `WHERE`**, toutes les lignes de la table seront modifiées.

---

## 6. Utiliser des expressions ou fonctions

```sql
UPDATE clients
SET points = points + 10
WHERE statut = 'actif';
```

* Ici, on **incrémente la valeur de la colonne `points` de 10** pour tous les clients actifs.

```sql
UPDATE clients
SET date_derniere_connexion = NOW()
WHERE id = 2;
```

* Utilisation de la fonction `NOW()` pour mettre à jour la date/heure actuelle.

---

## 7. `UPDATE` avec `JOIN`

```sql
UPDATE clients c
JOIN commandes o ON c.id = o.client_id
SET c.points = c.points + o.montant
WHERE o.date_commande >= '2026-01-01';
```

* Permet de **mettre à jour une table en fonction d’une autre table**.

---

## 8. Bonnes pratiques

1. Toujours utiliser **`WHERE`** pour éviter de modifier toutes les lignes accidentellement.
2. Pour tester, faire d’abord un `SELECT` avec la même condition :

```sql
SELECT * FROM clients WHERE statut = 'actif';
```

3. Faire une **sauvegarde** si vous mettez à jour des colonnes critiques.
4. Pour les calculs ou modifications complexes, vérifier avec une **transaction** :

```sql
START TRANSACTION;
UPDATE ...;
COMMIT;
```

---

## 9. Résumé

* `UPDATE` sert à **modifier des données existantes** dans une table.
* On peut mettre à jour **une ou plusieurs colonnes**, **une ou plusieurs lignes**.
* Utilisation possible avec **fonctions, expressions, et JOIN**.
* **Ne jamais oublier `WHERE`** sauf si on veut modifier toute la table.
* Préférer tester avec `SELECT` ou utiliser une **transaction** pour sécuriser les modifications.

# Cours : SELECT en SQLite

## Introduction

La commande `SELECT` est la plus utilisée en SQL. Elle permet de récupérer des données depuis une ou plusieurs tables. C'est l'outil fondamental pour interroger une base de données.

## Syntaxe de base

```sql
SELECT colonne1, colonne2, ...
FROM nom_table
WHERE condition
ORDER BY colonne
LIMIT nombre;
```

## Préparation : Table d'exemple

Créons des tables pour illustrer nos exemples :

```sql
CREATE TABLE employes (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    nom TEXT NOT NULL,
    prenom TEXT NOT NULL,
    departement TEXT,
    salaire REAL,
    date_embauche DATE,
    manager_id INTEGER
);

INSERT INTO employes (nom, prenom, departement, salaire, date_embauche, manager_id) VALUES
    ('Dupont', 'Marie', 'Ventes', 45000, '2020-03-15', NULL),
    ('Martin', 'Pierre', 'IT', 55000, '2019-06-01', 1),
    ('Leroy', 'Sophie', 'IT', 52000, '2021-01-10', 1),
    ('Bernard', 'Luc', 'RH', 48000, '2018-09-20', NULL),
    ('Petit', 'Julie', 'Ventes', 43000, '2022-02-14', 1),
    ('Moreau', 'Thomas', 'IT', 58000, '2017-11-30', 1),
    ('Blanc', 'Claire', 'Marketing', 50000, '2020-07-22', 4);
```

## SELECT simple

### Sélectionner toutes les colonnes

```sql
SELECT * FROM employes;
```

Le `*` signifie "toutes les colonnes".

### Sélectionner des colonnes spécifiques

```sql
SELECT nom, prenom, departement FROM employes;
```

**Bonne pratique :** Évitez `SELECT *` en production, spécifiez les colonnes nécessaires pour de meilleures performances.

### Sélectionner avec alias

```sql
SELECT 
    nom AS "Nom de famille",
    prenom AS "Prénom",
    salaire AS "Salaire annuel"
FROM employes;
```

## Clause WHERE : Filtrer les résultats

### Comparaisons simples

```sql
-- Égalité
SELECT * FROM employes WHERE departement = 'IT';

-- Différent
SELECT * FROM employes WHERE departement != 'IT';
SELECT * FROM employes WHERE departement <> 'IT';  -- Équivalent

-- Comparaisons numériques
SELECT * FROM employes WHERE salaire > 50000;
SELECT * FROM employes WHERE salaire >= 50000;
SELECT * FROM employes WHERE salaire < 50000;
SELECT * FROM employes WHERE salaire <= 50000;
```

### Opérateurs logiques

```sql
-- AND : toutes les conditions doivent être vraies
SELECT * FROM employes 
WHERE departement = 'IT' AND salaire > 53000;

-- OR : au moins une condition doit être vraie
SELECT * FROM employes 
WHERE departement = 'IT' OR departement = 'Ventes';

-- NOT : négation
SELECT * FROM employes 
WHERE NOT departement = 'IT';
```

### Opérateur IN

```sql
-- Plusieurs valeurs possibles
SELECT * FROM employes 
WHERE departement IN ('IT', 'Ventes', 'Marketing');

-- Équivalent à plusieurs OR
SELECT * FROM employes 
WHERE departement = 'IT' OR departement = 'Ventes' OR departement = 'Marketing';
```

### Opérateur BETWEEN

```sql
-- Plage de valeurs (inclusif)
SELECT * FROM employes 
WHERE salaire BETWEEN 45000 AND 55000;

-- Équivalent à
SELECT * FROM employes 
WHERE salaire >= 45000 AND salaire <= 55000;
```

### Opérateur LIKE : Recherche de motifs

```sql
-- Commence par 'M'
SELECT * FROM employes WHERE nom LIKE 'M%';

-- Se termine par 'nt'
SELECT * FROM employes WHERE nom LIKE '%nt';

-- Contient 'ar'
SELECT * FROM employes WHERE nom LIKE '%ar%';

-- Deuxième lettre est 'a'
SELECT * FROM employes WHERE nom LIKE '_a%';
```

**Caractères spéciaux :**
- `%` : zéro, un ou plusieurs caractères
- `_` : exactement un caractère

### NULL : Valeurs manquantes

```sql
-- Rechercher les NULL
SELECT * FROM employes WHERE manager_id IS NULL;

-- Rechercher les non-NULL
SELECT * FROM employes WHERE manager_id IS NOT NULL;
```

**Attention :** N'utilisez jamais `= NULL`, utilisez toujours `IS NULL`.

## Tri des résultats : ORDER BY

### Tri ascendant (par défaut)

```sql
SELECT * FROM employes ORDER BY salaire;
SELECT * FROM employes ORDER BY salaire ASC;  -- Équivalent
```

### Tri descendant

```sql
SELECT * FROM employes ORDER BY salaire DESC;
```

### Tri multiple

```sql
-- Trier d'abord par département, puis par salaire décroissant
SELECT * FROM employes 
ORDER BY departement ASC, salaire DESC;
```

### Tri avec NULL

```sql
-- NULL en premier
SELECT * FROM employes ORDER BY manager_id NULLS FIRST;

-- NULL en dernier (comportement par défaut)
SELECT * FROM employes ORDER BY manager_id NULLS LAST;
```

## Limiter les résultats : LIMIT et OFFSET

### LIMIT : Nombre maximum de résultats

```sql
-- Les 3 premiers employés
SELECT * FROM employes LIMIT 3;
```

### OFFSET : Sauter des résultats

```sql
-- Sauter les 2 premiers, puis prendre 3 résultats
SELECT * FROM employes LIMIT 3 OFFSET 2;
```

### Pagination

```sql
-- Page 1 (résultats 1-5)
SELECT * FROM employes ORDER BY id LIMIT 5 OFFSET 0;

-- Page 2 (résultats 6-10)
SELECT * FROM employes ORDER BY id LIMIT 5 OFFSET 5;

-- Page 3 (résultats 11-15)
SELECT * FROM employes ORDER BY id LIMIT 5 OFFSET 10;
```

## DISTINCT : Éliminer les doublons

```sql
-- Tous les départements (avec doublons)
SELECT departement FROM employes;

-- Départements uniques
SELECT DISTINCT departement FROM employes;

-- Combinaisons uniques
SELECT DISTINCT departement, manager_id FROM employes;
```

## Fonctions d'agrégation

### COUNT : Compter les lignes

```sql
-- Nombre total d'employés
SELECT COUNT(*) FROM employes;

-- Nombre d'employés avec un manager
SELECT COUNT(manager_id) FROM employes;

-- Nombre de départements distincts
SELECT COUNT(DISTINCT departement) FROM employes;
```

### SUM : Somme

```sql
-- Masse salariale totale
SELECT SUM(salaire) AS masse_salariale FROM employes;
```

### AVG : Moyenne

```sql
-- Salaire moyen
SELECT AVG(salaire) AS salaire_moyen FROM employes;
```

### MIN et MAX : Minimum et Maximum

```sql
-- Salaire minimum et maximum
SELECT 
    MIN(salaire) AS salaire_min,
    MAX(salaire) AS salaire_max
FROM employes;
```

### Combiner plusieurs fonctions

```sql
SELECT 
    COUNT(*) AS nb_employes,
    AVG(salaire) AS salaire_moyen,
    MIN(salaire) AS salaire_min,
    MAX(salaire) AS salaire_max,
    SUM(salaire) AS masse_salariale
FROM employes;
```

## GROUP BY : Regrouper les données

### Regroupement simple

```sql
-- Nombre d'employés par département
SELECT 
    departement,
    COUNT(*) AS nb_employes
FROM employes
GROUP BY departement;
```

### Regroupement avec plusieurs colonnes

```sql
-- Nombre d'employés par département et manager
SELECT 
    departement,
    manager_id,
    COUNT(*) AS nb_employes
FROM employes
GROUP BY departement, manager_id;
```

### Avec calculs d'agrégation

```sql
-- Statistiques par département
SELECT 
    departement,
    COUNT(*) AS nb_employes,
    AVG(salaire) AS salaire_moyen,
    MIN(salaire) AS salaire_min,
    MAX(salaire) AS salaire_max
FROM employes
GROUP BY departement
ORDER BY salaire_moyen DESC;
```

## HAVING : Filtrer après regroupement

`HAVING` est comme `WHERE`, mais s'applique après le `GROUP BY`.

```sql
-- Départements avec plus de 2 employés
SELECT 
    departement,
    COUNT(*) AS nb_employes
FROM employes
GROUP BY departement
HAVING COUNT(*) > 2;

-- Départements avec un salaire moyen > 50000
SELECT 
    departement,
    AVG(salaire) AS salaire_moyen
FROM employes
GROUP BY departement
HAVING AVG(salaire) > 50000;
```

**Différence WHERE vs HAVING :**
- `WHERE` filtre **avant** le regroupement (sur les lignes individuelles)
- `HAVING` filtre **après** le regroupement (sur les groupes)

```sql
-- Combinaison WHERE et HAVING
SELECT 
    departement,
    AVG(salaire) AS salaire_moyen
FROM employes
WHERE date_embauche >= '2019-01-01'  -- Filtre les lignes
GROUP BY departement
HAVING AVG(salaire) > 48000;  -- Filtre les groupes
```

## Jointures : Combiner plusieurs tables

### Création de tables pour les exemples

```sql
CREATE TABLE projets (
    id INTEGER PRIMARY KEY,
    nom_projet TEXT,
    employe_id INTEGER,
    budget REAL
);

INSERT INTO projets (nom_projet, employe_id, budget) VALUES
    ('Site Web', 2, 50000),
    ('Application Mobile', 3, 80000),
    ('CRM', 2, 120000),
    ('Recrutement 2024', 4, 30000),
    ('Projet Orphelin', NULL, 25000);
```

### INNER JOIN : Correspondances uniquement

```sql
SELECT 
    employes.nom,
    employes.prenom,
    projets.nom_projet,
    projets.budget
FROM employes
INNER JOIN projets ON employes.id = projets.employe_id;
```

### LEFT JOIN : Toutes les lignes de la table de gauche

```sql
-- Tous les employés, avec leurs projets s'ils en ont
SELECT 
    employes.nom,
    employes.prenom,
    projets.nom_projet
FROM employes
LEFT JOIN projets ON employes.id = projets.employe_id;
```

### RIGHT JOIN (simulé avec LEFT JOIN)

SQLite ne supporte pas RIGHT JOIN directement, mais on peut inverser les tables :

```sql
-- Tous les projets, avec leur employé s'il existe
SELECT 
    projets.nom_projet,
    employes.nom,
    employes.prenom
FROM projets
LEFT JOIN employes ON projets.employe_id = employes.id;
```

### Alias de tables

```sql
SELECT 
    e.nom,
    e.prenom,
    p.nom_projet,
    p.budget
FROM employes AS e
INNER JOIN projets AS p ON e.id = p.employe_id
WHERE p.budget > 50000;
```

### Auto-jointure : Joindre une table avec elle-même

```sql
-- Employés et leurs managers
SELECT 
    emp.nom AS employe_nom,
    emp.prenom AS employe_prenom,
    mgr.nom AS manager_nom,
    mgr.prenom AS manager_prenom
FROM employes AS emp
LEFT JOIN employes AS mgr ON emp.manager_id = mgr.id;
```

## Sous-requêtes

### Dans WHERE

```sql
-- Employés avec un salaire supérieur à la moyenne
SELECT nom, prenom, salaire
FROM employes
WHERE salaire > (SELECT AVG(salaire) FROM employes);
```

### Dans FROM

```sql
-- Statistiques des départements avec plus de 2 employés
SELECT *
FROM (
    SELECT 
        departement,
        COUNT(*) AS nb_employes,
        AVG(salaire) AS salaire_moyen
    FROM employes
    GROUP BY departement
) AS stats
WHERE nb_employes > 2;
```

### Avec IN

```sql
-- Employés travaillant sur des projets
SELECT nom, prenom
FROM employes
WHERE id IN (SELECT employe_id FROM projets WHERE employe_id IS NOT NULL);
```

### Avec EXISTS

```sql
-- Employés qui ont au moins un projet
SELECT nom, prenom
FROM employes e
WHERE EXISTS (
    SELECT 1 FROM projets p WHERE p.employe_id = e.id
);
```

## Opérateurs ensemblistes

### UNION : Combiner des résultats (sans doublons)

```sql
SELECT nom, prenom FROM employes WHERE departement = 'IT'
UNION
SELECT nom, prenom FROM employes WHERE salaire > 55000;
```

### UNION ALL : Avec doublons

```sql
SELECT nom FROM employes WHERE departement = 'IT'
UNION ALL
SELECT nom FROM employes WHERE salaire > 50000;
```

### INTERSECT : Intersection

```sql
SELECT nom, prenom FROM employes WHERE departement = 'IT'
INTERSECT
SELECT nom, prenom FROM employes WHERE salaire > 53000;
```

### EXCEPT : Différence

```sql
-- Employés IT qui ne gagnent pas plus de 53000
SELECT nom, prenom FROM employes WHERE departement = 'IT'
EXCEPT
SELECT nom, prenom FROM employes WHERE salaire > 53000;
```

## Expressions et calculs

### Calculs arithmétiques

```sql
SELECT 
    nom,
    prenom,
    salaire,
    salaire * 1.1 AS salaire_augmente_10pct,
    salaire / 12 AS salaire_mensuel
FROM employes;
```

### Concaténation de texte

```sql
SELECT 
    nom || ' ' || prenom AS nom_complet,
    departement
FROM employes;
```

### CASE : Conditions

```sql
SELECT 
    nom,
    prenom,
    salaire,
    CASE 
        WHEN salaire < 45000 THEN 'Junior'
        WHEN salaire < 55000 THEN 'Confirmé'
        ELSE 'Senior'
    END AS niveau
FROM employes;
```

### Fonctions de chaînes

```sql
SELECT 
    UPPER(nom) AS nom_majuscule,
    LOWER(prenom) AS prenom_minuscule,
    LENGTH(nom) AS longueur_nom,
    SUBSTR(prenom, 1, 3) AS initiales
FROM employes;
```

### Fonctions de dates

```sql
SELECT 
    nom,
    date_embauche,
    DATE('now') AS aujourdhui,
    JULIANDAY(DATE('now')) - JULIANDAY(date_embauche) AS jours_anciennete
FROM employes;
```

## Ordre d'exécution des clauses

Ordre logique d'exécution (pas l'ordre d'écriture) :

1. `FROM` et `JOIN` : Récupérer et joindre les tables
2. `WHERE` : Filtrer les lignes
3. `GROUP BY` : Regrouper les lignes
4. `HAVING` : Filtrer les groupes
5. `SELECT` : Sélectionner les colonnes
6. `DISTINCT` : Éliminer les doublons
7. `ORDER BY` : Trier les résultats
8. `LIMIT` et `OFFSET` : Limiter le nombre de résultats

## Bonnes pratiques

1. **Spécifiez toujours les colonnes nécessaires** au lieu de `SELECT *`
2. **Utilisez des alias** pour améliorer la lisibilité
3. **Indexez les colonnes** utilisées dans WHERE, JOIN et ORDER BY pour de meilleures performances
4. **Limitez les résultats** quand possible avec LIMIT
5. **Évitez les sous-requêtes complexes** quand une jointure suffit
6. **Utilisez EXPLAIN QUERY PLAN** pour analyser les performances

```sql
EXPLAIN QUERY PLAN
SELECT * FROM employes WHERE salaire > 50000;
```

## Exercices pratiques

### Exercice 1
Trouvez tous les employés du département IT embauchés après 2019, triés par salaire décroissant.

### Exercice 2
Calculez le salaire moyen par département, en affichant uniquement les départements où ce salaire moyen dépasse 48000.

### Exercice 3
Listez tous les employés avec le nom de leur manager (utilisez une auto-jointure).

### Exercice 4
Trouvez les employés qui ne travaillent sur aucun projet.

### Exercice 5
Créez une requête qui classe les employés en trois catégories de salaire (Bas, Moyen, Élevé) et compte combien d'employés sont dans chaque catégorie.

## Résumé

- `SELECT` récupère des données depuis une ou plusieurs tables
- `WHERE` filtre les lignes individuelles
- `ORDER BY` trie les résultats
- `LIMIT` et `OFFSET` permettent la pagination
- `GROUP BY` regroupe les données pour des agrégations
- `HAVING` filtre les groupes après agrégation
- Les jointures combinent plusieurs tables
- Les sous-requêtes permettent des requêtes imbriquées
- `DISTINCT`, `UNION`, `INTERSECT`, `EXCEPT` manipulent les ensembles de résultats

## Ressources supplémentaires

- Documentation officielle SQLite : https://www.sqlite.org/lang_select.html
- Fonctions SQL intégrées
- Optimisation des requêtes

# MySQL : Types de données et différences avec SQLite

## 1. Introduction

En MySQL, chaque colonne d'une table doit avoir un **type de données** qui définit le genre d'informations qu'elle peut contenir : texte, nombres, dates, etc. SQLite utilise également des types de données, mais fonctionne différemment grâce à son **typage dynamique**.

---

## 2. Types de données courants en MySQL

### a) Numériques

| Type           | Taille / Exemple               | Description                |
| -------------- | ------------------------------ | -------------------------- |
| INT            | -2 147 483 648 à 2 147 483 647 | Entier sur 4 octets        |
| BIGINT         | Très grand entier              | Entier sur 8 octets        |
| DECIMAL        | DECIMAL(10,2)                  | Nombre à virgule fixe      |
| FLOAT / DOUBLE | 3.14, 2.718                    | Nombre à virgule flottante |

### b) Texte / Chaînes

| Type       | Taille / Exemple     | Description                   |
| ---------- | -------------------- | ----------------------------- |
| VARCHAR(n) | 'Bonjour', n ≤ 65535 | Chaîne de caractères variable |
| CHAR(n)    | 'A'                  | Chaîne fixe de n caractères   |
| TEXT       | Texte long           | Stockage de texte volumineux  |

### c) Date et heure

| Type      | Exemple               | Description                                                          |
| --------- | --------------------- | -------------------------------------------------------------------- |
| DATE      | '2026-01-06'          | Date (YYYY-MM-DD)                                                    |
| DATETIME  | '2026-01-06 14:30:00' | Date et heure                                                        |
| TIMESTAMP | '2026-01-06 14:30:00' | Date et heure automatique, utile pour suivi de création/modification |
| TIME      | '14:30:00'            | Heure uniquement                                                     |

### d) Booléen

* `BOOLEAN` ou `TINYINT(1)` : valeur 0 = FALSE, 1 = TRUE

---

## 3. Typage en SQLite

SQLite a une approche plus **souple** appelée **typage dynamique** :

* Chaque colonne a un **type d’affinité** : TEXT, NUMERIC, INTEGER, REAL, BLOB
* SQLite n’empêche pas de stocker un type différent dans une colonne (ex : une chaîne dans une colonne INTEGER)
* Les types sont utilisés surtout pour **les conversions automatiques** lors des opérations SQL

Exemple d’affinités SQLite :

| Affinité | Exemple de stockage |
| -------- | ------------------- |
| TEXT     | 'Bonjour'           |
| INTEGER  | 123                 |
| REAL     | 3.14                |
| NUMERIC  | 1, '1', 1.0         |
| BLOB     | Données binaires    |

---

## 4. Différences principales MySQL vs SQLite

| Aspect              | MySQL                                   | SQLite                                  |
| ------------------- | --------------------------------------- | --------------------------------------- |
| Typage              | Strict, chaque colonne a un type précis | Typage dynamique, plus flexible         |
| Contraintes de type | Forte (erreur si type incorrect)        | Souple (conversion automatique)         |
| Types numériques    | INT, BIGINT, DECIMAL, FLOAT, DOUBLE     | INTEGER, REAL, NUMERIC                  |
| Types texte         | CHAR, VARCHAR, TEXT                     | TEXT                                    |
| Types date/heure    | DATE, DATETIME, TIMESTAMP, TIME         | Stockés généralement en TEXT ou NUMERIC |
| Booléen             | BOOLEAN (TINYINT)                       | INTEGER (0/1)                           |
| Limitation taille   | Respectée strictement                   | Non strict, flexible                    |

---

## 5. Bonnes pratiques

* **MySQL** : choisir le type précis pour optimiser le stockage et la validation des données.
* **SQLite** : choisir un type d’affinité claire pour faciliter la compatibilité et les conversions.
* Toujours prévoir la **taille des champs texte et numérique** selon les besoins.
* Pour le stockage de dates et heures, être cohérent avec le format choisi, surtout en SQLite.

---

## 6. Résumé

* MySQL utilise un **typage strict** avec des types précis pour chaque colonne.
* SQLite utilise un **typage dynamique** : plus souple mais moins strict.
* Les différences impactent la **validation, la compatibilité et la conversion des données**.
* Comprendre ces différences est crucial lorsqu’on migre des bases ou qu’on écrit des scripts SQL compatibles pour les deux systèmes.

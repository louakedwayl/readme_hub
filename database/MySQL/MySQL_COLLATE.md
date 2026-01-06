# MySQL : (`COLLATE`)

## 1. Introduction

En MySQL, **`COLLATE`** est un paramètre qui définit **comment les chaînes de caractères sont comparées et triées**.
La collation est toujours associée à un **jeu de caractères (`CHARACTER SET`)**, et peut être définie à différents niveaux : **base, table, colonne, ou même pour une requête spécifique**.

---

## 2. Syntaxe de base

### a) Pour une base de données

```sql
CREATE DATABASE ma_base
CHARACTER SET utf8mb4
COLLATE utf8mb4_general_ci;
```

* Définit la collation par défaut pour toutes les tables créées dans la base.

### b) Pour une table

```sql
CREATE TABLE clients (
    nom VARCHAR(50),
    email VARCHAR(100)
) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
```

* Définit la collation par défaut pour toutes les colonnes texte de la table.

### c) Pour une colonne

```sql
CREATE TABLE produits (
    nom VARCHAR(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci,
    description TEXT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci
);
```

* Chaque colonne peut avoir sa propre collation, indépendante de la table ou de la base.

### d) Pour une requête

```sql
SELECT nom FROM clients
ORDER BY nom COLLATE utf8mb4_bin;
```

* Applique une collation spécifique **uniquement pour cette requête**, sans modifier la table.

---

## 3. Collations courantes

| Collation            | Description                                                            |
| -------------------- | ---------------------------------------------------------------------- |
| `utf8mb4_general_ci` | Comparaison insensible à la casse (`ci`) avec tri général              |
| `utf8mb4_unicode_ci` | Comparaison basée sur Unicode, meilleure pour les langues avec accents |
| `utf8mb4_bin`        | Comparaison binaire, sensible à la casse et aux accents                |
| `latin1_swedish_ci`  | Comparaison insensible à la casse pour Latin1 (historique)             |

> `ci` = **case-insensitive** (insensible à la casse)
> `cs` = **case-sensitive** (sensible à la casse)

---

## 4. `ALTER` avec COLLATE

### a) Changer la collation d’une base

```sql
ALTER DATABASE ma_base COLLATE utf8mb4_unicode_ci;
```

### b) Changer la collation d’une table

```sql
ALTER TABLE clients CONVERT TO CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
```

* Modifie toutes les colonnes texte de la table pour utiliser la nouvelle collation.

---

## 5. Bonnes pratiques

1. Toujours utiliser **utf8mb4** comme jeu de caractères moderne.
2. Choisir une collation adaptée à la langue et à la sensibilité à la casse.
3. Définir la collation **dès la création** de la base ou de la table pour éviter des problèmes ultérieurs.
4. Pour des colonnes spécifiques avec besoins particuliers, **définir la collation au niveau colonne**.
5. Utiliser la collation dans les requêtes seulement si vous devez **overrider le tri par défaut**.

---

## 6. Résumé

* `COLLATE` détermine **comment MySQL compare et trie les chaînes**.
* Il est lié à un **jeu de caractères (`CHARACTER SET`)**.
* Peut être appliqué à différents niveaux : **base, table, colonne, requête**.
* Bien configurer `COLLATE` assure **compatibilité multilingue et cohérence dans les tris et comparaisons**.

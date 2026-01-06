# MySQL : `CHARACTER SET`

## 1. Introduction

En MySQL, un **jeu de caractères (`CHARACTER SET`)** définit comment les caractères sont encodés et stockés dans une base de données. Cela affecte le **stockage, la comparaison et le tri des chaînes de caractères**.

Le **paramètre `CHARACTER SET`** peut être utilisé à différents niveaux : bases, tables, colonnes et même pour certaines commandes d’altération.

---

## 2. Utilisation dans `CREATE DATABASE`

```sql
CREATE DATABASE ma_base CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
```

* Définit le jeu de caractères par défaut pour toutes les tables créées dans cette base.
* `COLLATE` définit la manière dont MySQL compare et trie les chaînes (sensible ou insensible à la casse, accents, etc.).

### Bonnes pratiques

* Toujours utiliser `utf8mb4` pour supporter tous les caractères Unicode et emojis.
* Choisir une collation adaptée aux besoins linguistiques.

---

## 3. Utilisation dans `CREATE TABLE`

```sql
CREATE TABLE clients (
    nom VARCHAR(50),
    email VARCHAR(100)
) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
```

* Définit le jeu de caractères par défaut pour toutes les colonnes texte de la table.
* Les colonnes peuvent **hériter** de ce jeu ou **avoir leur propre `CHARACTER SET`**.

---

## 4. Utilisation dans `ALTER DATABASE` et `ALTER TABLE`

### Changer le jeu de caractères d’une base existante

```sql
ALTER DATABASE ma_base CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
```

### Changer le jeu de caractères d’une table existante

```sql
ALTER TABLE clients CONVERT TO CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
```

* Permet de **modifier l’encodage des colonnes texte existantes**.

---

## 5. Définir `CHARACTER SET` au niveau d’une colonne

```sql
CREATE TABLE produits (
    nom VARCHAR(100) CHARACTER SET latin1,
    description TEXT CHARACTER SET utf8mb4
);
```

* Chaque colonne peut avoir **son propre jeu de caractères**, indépendant de la table ou de la base.
* Si aucun `CHARACTER SET` n’est défini, la colonne hérite de la valeur par défaut de la table ou de la base.

---

## 6. Différences entre niveaux

| Niveau                       | Impact de `CHARACTER SET`                             | Exemple                                                 |
| ---------------------------- | ----------------------------------------------------- | ------------------------------------------------------- |
| Base                         | Valeur par défaut pour toutes les tables              | `CREATE DATABASE ma_base CHARACTER SET utf8mb4;`        |
| Table                        | Valeur par défaut pour les colonnes texte de la table | `CREATE TABLE clients ... CHARACTER SET utf8mb4;`       |
| Colonne                      | Surcharge le jeu de caractères de la table            | `nom VARCHAR(50) CHARACTER SET latin1;`                 |
| ALTER DATABASE / ALTER TABLE | Permet de changer le jeu de caractères existant       | `ALTER TABLE clients CONVERT TO CHARACTER SET utf8mb4;` |

---

## 7. Bonnes pratiques

1. **Toujours définir `utf8mb4` pour les applications modernes** afin de supporter Unicode complet.
2. **Définir la collation (`COLLATE`) adaptée** aux besoins (tri sensible/insensible aux accents, casse, etc.).
3. **Définir `CHARACTER SET` dès la création** de la base pour éviter des problèmes lors de la création de tables ou de colonnes.
4. Pour les colonnes spécifiques ayant des besoins particuliers, **redéfinir `CHARACTER SET` au niveau colonne**.

---

## 8. Résumé

* `CHARACTER SET` est un **paramètre SQL**, pas un attribut interne, utilisé pour **définir l’encodage des caractères**.
* Il peut s’appliquer à : **base**, **table**, **colonne**, ou via **ALTER**.
* La valeur est héritée si elle n’est pas définie localement.
* Une bonne gestion de `CHARACTER SET` assure **compatibilité multilingue, tri correct et stockage efficace**.

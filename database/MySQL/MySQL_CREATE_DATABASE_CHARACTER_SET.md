# MySQL : `CHARACTER SET` dans `CREATE DATABASE`

## 1. Introduction

Lorsqu’on crée une base de données en MySQL, on peut spécifier un **jeu de caractères** (`CHARACTER SET`) et un **classement** (`COLLATE`). Cela permet de contrôler comment les textes sont stockés et comparés, ce qui est crucial pour le support multilingue et la cohérence des données.

---

## 2. Syntaxe de base

```sql
CREATE DATABASE nom_de_la_base
CHARACTER SET utf8mb4
COLLATE utf8mb4_general_ci;
```

* `CHARACTER SET` : définit l'encodage des caractères utilisés pour les colonnes de type texte.
* `COLLATE` : définit la façon dont MySQL compare et trie les chaînes de caractères.

---

## 3. Jeux de caractères courants

| Jeu de caractères | Description                                                                            |
| ----------------- | -------------------------------------------------------------------------------------- |
| `utf8`            | UTF-8 sur 3 octets, ne supporte pas tous les emojis                                    |
| `utf8mb4`         | UTF-8 sur 4 octets, support complet Unicode, recommandé pour les applications modernes |
| `latin1`          | Encodage ISO-8859-1, pour les langues occidentales                                     |

---

## 4. Collations courantes

La collation détermine comment MySQL compare les chaînes de caractères. Exemple pour `utf8mb4` :

| Collation            | Description                                                            |
| -------------------- | ---------------------------------------------------------------------- |
| `utf8mb4_general_ci` | Comparaison insensible à la casse, générale                            |
| `utf8mb4_unicode_ci` | Comparaison basée sur Unicode, meilleure pour les langues avec accents |
| `utf8mb4_bin`        | Comparaison binaire, sensible à la casse et aux accents                |

---

## 5. Exemple complet

```sql
-- Créer une base avec UTF-8 complet et comparaison générale
CREATE DATABASE boutique_db
CHARACTER SET utf8mb4
COLLATE utf8mb4_general_ci;

-- Utiliser la base pour créer des tables
USE boutique_db;

CREATE TABLE clients (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(50) NOT NULL,
    email VARCHAR(100) NOT NULL,
    commentaire TEXT
) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
```

---

## 6. Bonnes pratiques

1. **Toujours utiliser `utf8mb4`** pour supporter tous les caractères Unicode et emojis.
2. **Choisir la collation en fonction de vos besoins linguistiques**.
3. **Définir le `CHARACTER SET` et la `COLLATE` dès la création de la base** pour éviter les problèmes ultérieurs.
4. Pour les tables et colonnes spécifiques, vous pouvez redéfinir le jeu de caractères si nécessaire.

---

## 7. Résumé

* `CHARACTER SET` contrôle l’encodage des caractères d’une base MySQL.
* `COLLATE` contrôle la façon dont les chaînes sont comparées et triées.
* Pour un support moderne et international, utiliser **utf8mb4** avec **utf8mb4_general_ci** ou **utf8mb4_unicode_ci**.
* Bien configurer ces paramètres dès la création de la base facilite la gestion des textes multilingues et des recherches sensibles aux accents ou à la casse.

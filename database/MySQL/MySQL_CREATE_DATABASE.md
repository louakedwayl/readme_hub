# MySQL : Création de bases de données

## 1. Introduction

En MySQL, une **base de données** est un conteneur qui stocke des **tables**, **vues**, **index**, **procédures stockées** et autres objets liés aux données. Créer une base de données est souvent la première étape avant de créer des tables et insérer des données.

---

## 2. Syntaxe de base

La commande SQL pour créer une base de données :

```sql
CREATE DATABASE nom_de_la_base;
```

* `nom_de_la_base` : le nom que vous choisissez pour votre base de données. Il doit être unique sur le serveur.
* MySQL est **insensible à la casse** pour les noms de base sur la plupart des systèmes, mais il est conseillé d’utiliser des minuscules et underscores pour la lisibilité.

---

## 3. Options supplémentaires

### a) Vérifier si la base existe

Pour éviter une erreur si la base existe déjà :

```sql
CREATE DATABASE IF NOT EXISTS nom_de_la_base;
```

### b) Définir le jeu de caractères

```sql
CREATE DATABASE nom_de_la_base CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
```

* `CHARACTER SET` : définit l’encodage des caractères (utf8mb4 est recommandé pour supporter tous les caractères Unicode).
* `COLLATE` : définit la façon dont MySQL compare les chaînes de caractères.

---

## 4. Utiliser la base de données

Après avoir créé la base, il faut l’utiliser pour créer des tables :

```sql
USE nom_de_la_base;
```

---

## 5. Exemple complet

```sql
-- Créer une base si elle n'existe pas
CREATE DATABASE IF NOT EXISTS boutique_db CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;

-- Sélectionner la base pour créer des tables
USE boutique_db;

-- Créer une table
CREATE TABLE clients (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(50) NOT NULL,
    email VARCHAR(100) NOT NULL,
    date_inscription TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
```

---

## 6. Bonnes pratiques

* Utiliser des noms explicites pour vos bases de données.
* Toujours définir `CHARACTER SET` et `COLLATE` pour éviter des problèmes d’encodage.
* Préférer `IF NOT EXISTS` pour éviter les erreurs lors de scripts réutilisables.
* Séparer les bases de données par application ou service pour plus de clarté et de sécurité.

---

## 7. Résumé

* `CREATE DATABASE` crée une nouvelle base sur le serveur MySQL.
* `IF NOT EXISTS` évite les erreurs si la base existe.
* `CHARACTER SET` et `COLLATE` contrôlent l’encodage et le tri des caractères.
* Après création, utilisez `USE nom_de_la_base;` pour travailler avec cette base.

---

> Cette commande est la première étape avant de créer des tables et gérer les données dans MySQL.

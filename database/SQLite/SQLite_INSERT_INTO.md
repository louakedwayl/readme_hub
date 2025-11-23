# Cours : INSERT INTO en SQLite

## Introduction

La commande `INSERT INTO` en SQLite permet d'ajouter de nouvelles lignes (enregistrements) dans une table. C'est l'une des opérations fondamentales du langage SQL pour manipuler les données.

## Syntaxe de base

### Insertion avec toutes les colonnes

```sql
INSERT INTO nom_table VALUES (valeur1, valeur2, valeur3, ...);
```

### Insertion avec colonnes spécifiées

```sql
INSERT INTO nom_table (colonne1, colonne2, colonne3) 
VALUES (valeur1, valeur2, valeur3);
```

## Exemples pratiques

### Création d'une table exemple

Commençons par créer une table pour illustrer nos exemples :

```sql
CREATE TABLE utilisateurs (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    nom TEXT NOT NULL,
    prenom TEXT NOT NULL,
    email TEXT UNIQUE,
    age INTEGER,
    date_inscription DATE DEFAULT CURRENT_DATE
);
```

### Exemple 1 : Insertion simple

```sql
INSERT INTO utilisateurs (nom, prenom, email, age) 
VALUES ('Dupont', 'Marie', 'marie.dupont@email.com', 28);
```

### Exemple 2 : Insertion sans spécifier les colonnes

Si vous insérez des valeurs pour toutes les colonnes dans l'ordre exact de la table :

```sql
INSERT INTO utilisateurs 
VALUES (NULL, 'Martin', 'Pierre', 'pierre.martin@email.com', 35, '2024-01-15');
```

**Note :** NULL est utilisé pour l'ID car il s'auto-incrémente.

### Exemple 3 : Insertion partielle

Vous pouvez omettre certaines colonnes (elles prendront leur valeur par défaut ou NULL) :

```sql
INSERT INTO utilisateurs (nom, prenom, email) 
VALUES ('Leroy', 'Sophie', 'sophie.leroy@email.com');
```

## Insertion multiple

### Syntaxe pour plusieurs lignes

SQLite permet d'insérer plusieurs enregistrements en une seule commande :

```sql
INSERT INTO utilisateurs (nom, prenom, email, age) 
VALUES 
    ('Bernard', 'Luc', 'luc.bernard@email.com', 42),
    ('Petit', 'Julie', 'julie.petit@email.com', 31),
    ('Moreau', 'Thomas', 'thomas.moreau@email.com', 26);
```

**Avantage :** C'est beaucoup plus rapide que d'exécuter plusieurs commandes INSERT séparées.

## INSERT avec SELECT

Vous pouvez insérer des données provenant d'une autre table ou d'une requête :

```sql
-- Création d'une table de sauvegarde
CREATE TABLE utilisateurs_archive (
    id INTEGER,
    nom TEXT,
    prenom TEXT,
    email TEXT
);

-- Insertion depuis une autre table
INSERT INTO utilisateurs_archive (id, nom, prenom, email)
SELECT id, nom, prenom, email 
FROM utilisateurs 
WHERE age > 30;
```

## Gestion des conflits

### INSERT OR IGNORE

Ignore l'insertion si elle viole une contrainte :

```sql
INSERT OR IGNORE INTO utilisateurs (nom, prenom, email, age) 
VALUES ('Dupont', 'Jean', 'marie.dupont@email.com', 30);
```

Si l'email existe déjà (contrainte UNIQUE), l'insertion sera ignorée sans erreur.

### INSERT OR REPLACE

Remplace l'enregistrement existant en cas de conflit :

```sql
INSERT OR REPLACE INTO utilisateurs (id, nom, prenom, email, age) 
VALUES (1, 'Dupont', 'Marie-Claire', 'marie.dupont@email.com', 29);
```

### Autres variantes

- `INSERT OR ABORT` : Annule l'insertion (comportement par défaut)
- `INSERT OR FAIL` : Échoue mais continue les autres insertions dans une transaction
- `INSERT OR ROLLBACK` : Annule toute la transaction

## Valeurs spéciales

### NULL

Représente l'absence de valeur :

```sql
INSERT INTO utilisateurs (nom, prenom, email, age) 
VALUES ('Blanc', 'Marc', 'marc.blanc@email.com', NULL);
```

### DEFAULT

Utilise la valeur par défaut définie dans la table :

```sql
INSERT INTO utilisateurs (nom, prenom, email, age, date_inscription) 
VALUES ('Roux', 'Claire', 'claire.roux@email.com', 27, DEFAULT);
```

### CURRENT_TIMESTAMP, CURRENT_DATE, CURRENT_TIME

```sql
CREATE TABLE logs (
    id INTEGER PRIMARY KEY,
    message TEXT,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO logs (message) VALUES ('Connexion utilisateur');
```

## Bonnes pratiques

1. **Toujours spécifier les colonnes** : Cela rend votre code plus lisible et résistant aux modifications de structure de table.

```sql
-- Bon
INSERT INTO utilisateurs (nom, prenom, email) 
VALUES ('Doe', 'John', 'john@email.com');

-- Éviter
INSERT INTO utilisateurs VALUES (NULL, 'Doe', 'John', 'john@email.com', NULL, DEFAULT);
```

2. **Utiliser des transactions pour des insertions multiples** : C'est beaucoup plus rapide.

```sql
BEGIN TRANSACTION;

INSERT INTO utilisateurs (nom, prenom, email) VALUES ('A', 'User', 'a@email.com');
INSERT INTO utilisateurs (nom, prenom, email) VALUES ('B', 'User', 'b@email.com');
INSERT INTO utilisateurs (nom, prenom, email) VALUES ('C', 'User', 'c@email.com');

COMMIT;
```

3. **Gérer les contraintes** : Utilisez INSERT OR IGNORE ou INSERT OR REPLACE selon vos besoins.

4. **Échapper les guillemets** : Doublez les guillemets simples dans les chaînes de caractères.

```sql
INSERT INTO utilisateurs (nom, prenom, email) 
VALUES ('O''Brien', 'Patrick', 'patrick@email.com');
```

## Exercices pratiques

### Exercice 1

Créez une table `produits` avec les colonnes : id, nom, prix, stock, categorie. Insérez 5 produits différents.

### Exercice 2

Utilisez INSERT avec SELECT pour copier tous les produits de la catégorie "Électronique" dans une nouvelle table `produits_electronique`.

### Exercice 3

Insérez plusieurs produits en une seule commande, en gérant les conflits potentiels sur le nom du produit (qui doit être unique).

## Résumé

- `INSERT INTO` ajoute des données dans une table
- Vous pouvez spécifier les colonnes ou insérer dans toutes les colonnes
- Les insertions multiples sont possibles et plus performantes
- `INSERT OR IGNORE/REPLACE` gère les conflits de contraintes
- `INSERT ... SELECT` permet de copier des données d'une table à l'autre
- Les transactions améliorent les performances pour de nombreuses insertions

## Ressources supplémentaires

- Documentation officielle SQLite : https://www.sqlite.org/lang_insert.html
- Types de données SQLite
- Contraintes et clés primaires

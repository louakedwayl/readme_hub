# Les clés étrangères en SQLite

Une **clé étrangère (foreign key)** est un champ (ou un ensemble de champs) dans une table qui fait référence à la **clé primaire** d’une autre table. Elles permettent de maintenir **l’intégrité référentielle** dans une base de données relationnelle.

## 1. Activer les clés étrangères dans SQLite

Par défaut, SQLite **n’applique pas les contraintes de clés étrangères**, il faut donc les activer explicitement à chaque connexion à la base de données :

```sql
PRAGMA foreign_keys = ON;
```

Cette commande doit être exécutée **avant toute manipulation des tables** si vous voulez que les contraintes soient respectées.

## 2. Syntaxe de création d’une clé étrangère

### a) Lors de la création de table

```sql
CREATE TABLE parents (
    id INTEGER PRIMARY KEY,
    nom TEXT NOT NULL
);

CREATE TABLE enfants (
    id INTEGER PRIMARY KEY,
    nom TEXT NOT NULL,
    parent_id INTEGER,
    FOREIGN KEY (parent_id) REFERENCES parents(id)
);
```

* `parent_id` est une clé étrangère qui référence la colonne `id` de la table `parents`.
* Cela garantit que **chaque enfant appartient à un parent existant**.

### b) Avec `ON DELETE` et `ON UPDATE`

```sql
CREATE TABLE enfants (
    id INTEGER PRIMARY KEY,
    nom TEXT NOT NULL,
    parent_id INTEGER,
    FOREIGN KEY (parent_id) REFERENCES parents(id)
        ON DELETE CASCADE
        ON UPDATE CASCADE
);
```

Significations :

* **ON DELETE CASCADE** → si un parent est supprimé, tous ses enfants sont supprimés automatiquement.
* **ON UPDATE CASCADE** → si l’ID d’un parent change, la valeur correspondante dans `enfants.parent_id` est mise à jour automatiquement.

Autres options possibles : `SET NULL`, `RESTRICT`, `NO ACTION`.

## 3. Ajouter une clé étrangère à une table existante

SQLite **ne permet pas** d’ajouter directement une clé étrangère avec `ALTER TABLE`. La méthode consiste à :

1. Créer une nouvelle table avec la clé étrangère.
2. Copier les données depuis l’ancienne table.
3. Supprimer l’ancienne table.
4. Renommer la nouvelle table.

```sql
CREATE TABLE enfants_new (
    id INTEGER PRIMARY KEY,
    nom TEXT NOT NULL,
    parent_id INTEGER,
    FOREIGN KEY (parent_id) REFERENCES parents(id)
);

INSERT INTO enfants_new (id, nom, parent_id)
SELECT id, nom, parent_id FROM enfants;

DROP TABLE enfants;

ALTER TABLE enfants_new RENAME TO enfants;
```

## 4. Vérifier l’intégrité référentielle

```sql
PRAGMA foreign_keys;
```

Retourne `1` si activé, `0` sinon.

Exemple d’insertion violant la clé étrangère :

```sql
INSERT INTO enfants (nom, parent_id) VALUES ('Alice', 999);
-- ERREUR : contrainte de clé étrangère violée
```

## 5. Bonnes pratiques

1. Toujours activer les clés étrangères (`PRAGMA foreign_keys = ON`).
2. Définir des **types cohérents** pour les colonnes référencées.
3. Utiliser `ON DELETE CASCADE` avec prudence.
4. Vérifier les dépendances avant de supprimer des tables ou des lignes.

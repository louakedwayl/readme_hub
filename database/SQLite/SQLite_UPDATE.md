# Cours : UPDATE en SQLite

## Introduction

La commande `UPDATE` en SQLite permet de modifier des données existantes dans une table. C'est une opération fondamentale pour maintenir et mettre à jour les informations dans une base de données.

⚠️ **ATTENTION** : UPDATE peut modifier plusieurs lignes simultanément. Utilisez toujours WHERE pour éviter de modifier toute la table par erreur !

## Syntaxe de base

```sql
UPDATE nom_table
SET colonne1 = valeur1, colonne2 = valeur2, ...
WHERE condition;
```

## Préparation : Tables d'exemple

Créons des tables pour illustrer nos exemples :

```sql
CREATE TABLE employes (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    nom TEXT NOT NULL,
    prenom TEXT NOT NULL,
    email TEXT UNIQUE,
    departement TEXT,
    salaire REAL,
    date_embauche DATE,
    statut TEXT DEFAULT 'actif',
    manager_id INTEGER
);

INSERT INTO employes (nom, prenom, email, departement, salaire, date_embauche, manager_id) VALUES
    ('Dupont', 'Marie', 'marie.dupont@email.com', 'Ventes', 45000, '2020-03-15', NULL),
    ('Martin', 'Pierre', 'pierre.martin@email.com', 'IT', 55000, '2019-06-01', 1),
    ('Leroy', 'Sophie', 'sophie.leroy@email.com', 'IT', 52000, '2021-01-10', 1),
    ('Bernard', 'Luc', 'luc.bernard@email.com', 'RH', 48000, '2018-09-20', NULL),
    ('Petit', 'Julie', 'julie.petit@email.com', 'Ventes', 43000, '2022-02-14', 1),
    ('Moreau', 'Thomas', 'thomas.moreau@email.com', 'IT', 58000, '2017-11-30', 1),
    ('Blanc', 'Claire', 'claire.blanc@email.com', 'Marketing', 50000, '2020-07-22', 4);
```

## UPDATE simple

### Modifier une colonne pour une ligne spécifique

```sql
-- Augmenter le salaire de Pierre Martin
UPDATE employes
SET salaire = 60000
WHERE id = 2;
```

### Modifier plusieurs colonnes

```sql
-- Changer le département et le salaire de Sophie
UPDATE employes
SET 
    departement = 'Marketing',
    salaire = 54000
WHERE id = 3;
```

### Vérifier avant de mettre à jour

**Bonne pratique :** Toujours faire un SELECT avant UPDATE pour vérifier les lignes affectées.

```sql
-- 1. Vérifier d'abord
SELECT * FROM employes WHERE id = 2;

-- 2. Puis mettre à jour
UPDATE employes
SET salaire = 60000
WHERE id = 2;

-- 3. Vérifier le résultat
SELECT * FROM employes WHERE id = 2;
```

## WHERE : Cibler les bonnes lignes

### UPDATE avec plusieurs conditions

```sql
-- Augmenter le salaire des employés IT avec salaire < 55000
UPDATE employes
SET salaire = salaire * 1.10
WHERE departement = 'IT' AND salaire < 55000;
```

### UPDATE avec IN

```sql
-- Changer le statut de plusieurs employés
UPDATE employes
SET statut = 'en congé'
WHERE id IN (2, 4, 6);
```

### UPDATE avec LIKE

```sql
-- Mettre à jour tous les employés dont le nom commence par 'M'
UPDATE employes
SET manager_id = 1
WHERE nom LIKE 'M%';
```

### UPDATE avec BETWEEN

```sql
-- Bonus pour les salaires entre 45000 et 52000
UPDATE employes
SET salaire = salaire + 2000
WHERE salaire BETWEEN 45000 AND 52000;
```

### ⚠️ UPDATE sans WHERE (DANGEREUX)

```sql
-- ATTENTION : Ceci modifie TOUTES les lignes !
UPDATE employes
SET statut = 'actif';
```

Cette commande met à jour **tous** les employés. Utilisez-la uniquement si c'est votre intention.

## Calculs et expressions

### Calculs arithmétiques

```sql
-- Augmentation de 5% pour tout le département IT
UPDATE employes
SET salaire = salaire * 1.05
WHERE departement = 'IT';

-- Réduction de 1000 pour les salaires > 55000
UPDATE employes
SET salaire = salaire - 1000
WHERE salaire > 55000;
```

### Utiliser des valeurs d'autres colonnes

```sql
-- Créer une colonne pour l'email professionnel
ALTER TABLE employes ADD COLUMN email_pro TEXT;

-- Générer l'email professionnel à partir du nom et prénom
UPDATE employes
SET email_pro = LOWER(prenom || '.' || nom || '@entreprise.com');
```

### Concaténation de texte

```sql
-- Ajouter un suffixe au département
UPDATE employes
SET departement = departement || ' - Siège'
WHERE departement = 'IT';
```

### Utiliser CASE dans UPDATE

```sql
-- Ajustement salarial basé sur l'ancienneté
UPDATE employes
SET salaire = CASE
    WHEN JULIANDAY('now') - JULIANDAY(date_embauche) > 1825 THEN salaire * 1.10  -- Plus de 5 ans
    WHEN JULIANDAY('now') - JULIANDAY(date_embauche) > 1095 THEN salaire * 1.05  -- Plus de 3 ans
    ELSE salaire * 1.02  -- Moins de 3 ans
END;
```

### Remplacer des parties de texte

```sql
-- Mettre à jour le domaine email
UPDATE employes
SET email = REPLACE(email, '@email.com', '@nouvelleentreprise.com');
```

## UPDATE avec sous-requêtes

### Utiliser une sous-requête dans SET

```sql
-- Mettre à jour avec la moyenne du département
UPDATE employes
SET salaire = (
    SELECT AVG(salaire)
    FROM employes e2
    WHERE e2.departement = employes.departement
)
WHERE salaire < 45000;
```

### Utiliser une sous-requête dans WHERE

```sql
-- Augmenter le salaire des employés qui gagnent moins que la moyenne
UPDATE employes
SET salaire = salaire * 1.08
WHERE salaire < (SELECT AVG(salaire) FROM employes);
```

### Sous-requête avec EXISTS

```sql
-- Créer une table de projets
CREATE TABLE projets (
    id INTEGER PRIMARY KEY,
    nom_projet TEXT,
    employe_id INTEGER
);

INSERT INTO projets VALUES (1, 'Projet A', 2), (2, 'Projet B', 3);

-- Bonus pour les employés qui ont des projets
UPDATE employes
SET salaire = salaire + 3000
WHERE EXISTS (
    SELECT 1 FROM projets WHERE projets.employe_id = employes.id
);
```

## UPDATE avec JOIN (méthode SQLite)

SQLite ne supporte pas UPDATE avec JOIN directement, mais on peut utiliser des sous-requêtes :

```sql
-- Créer une table de bonus
CREATE TABLE bonus_departement (
    departement TEXT PRIMARY KEY,
    montant REAL
);

INSERT INTO bonus_departement VALUES 
    ('IT', 5000),
    ('Ventes', 3000),
    ('RH', 2000);

-- Appliquer les bonus (méthode avec sous-requête)
UPDATE employes
SET salaire = salaire + (
    SELECT montant 
    FROM bonus_departement 
    WHERE bonus_departement.departement = employes.departement
)
WHERE departement IN (SELECT departement FROM bonus_departement);
```

## Gestion des conflits

### UPDATE OR IGNORE

Ignore les erreurs si une contrainte est violée :

```sql
-- Si l'email existe déjà, ignore la mise à jour
UPDATE OR IGNORE employes
SET email = 'existant@email.com'
WHERE id = 5;
```

### UPDATE OR REPLACE

Remplace la ligne existante en cas de conflit :

```sql
UPDATE OR REPLACE employes
SET email = 'nouveau@email.com'
WHERE id = 3;
```

### UPDATE OR ABORT (par défaut)

Annule l'opération en cas d'erreur :

```sql
UPDATE OR ABORT employes
SET salaire = -1000  -- Erreur si contrainte CHECK existe
WHERE id = 2;
```

### UPDATE OR FAIL

Échoue mais ne revient pas en arrière dans une transaction :

```sql
BEGIN TRANSACTION;
UPDATE employes SET salaire = 60000 WHERE id = 1;
UPDATE OR FAIL employes SET email = NULL WHERE id = 2;  -- Échoue
UPDATE employes SET salaire = 62000 WHERE id = 3;  -- Continue
COMMIT;
```

### UPDATE OR ROLLBACK

Annule toute la transaction en cas d'erreur :

```sql
BEGIN TRANSACTION;
UPDATE employes SET salaire = 60000 WHERE id = 1;
UPDATE OR ROLLBACK employes SET email = NULL WHERE id = 2;  -- Annule tout
COMMIT;
```

## Valeurs spéciales

### NULL

Définir une valeur comme NULL (vide) :

```sql
-- Retirer le manager
UPDATE employes
SET manager_id = NULL
WHERE id = 2;
```

### DEFAULT

Restaurer la valeur par défaut :

```sql
-- Remettre le statut par défaut
UPDATE employes
SET statut = DEFAULT
WHERE id = 5;
```

### Dates et timestamps actuels

```sql
-- Créer une colonne de dernière modification
ALTER TABLE employes ADD COLUMN derniere_modif DATETIME;

-- Mettre à jour avec la date actuelle
UPDATE employes
SET derniere_modif = CURRENT_TIMESTAMP
WHERE id = 3;

-- Ou avec la date seule
UPDATE employes
SET date_embauche = CURRENT_DATE
WHERE id = 4;
```

## UPDATE conditionnel avancé

### Mise à jour sélective avec CASE

```sql
-- Ajustement différencié par département
UPDATE employes
SET salaire = CASE departement
    WHEN 'IT' THEN salaire * 1.08
    WHEN 'Ventes' THEN salaire * 1.10
    WHEN 'RH' THEN salaire * 1.06
    ELSE salaire * 1.03
END;
```

### Mise à jour avec plusieurs CASE

```sql
UPDATE employes
SET 
    salaire = CASE
        WHEN salaire < 45000 THEN salaire * 1.10
        WHEN salaire < 55000 THEN salaire * 1.05
        ELSE salaire * 1.03
    END,
    statut = CASE
        WHEN salaire < 45000 THEN 'junior'
        WHEN salaire < 55000 THEN 'confirmé'
        ELSE 'senior'
    END;
```

## Transactions et UPDATE

### Transaction simple

```sql
BEGIN TRANSACTION;

UPDATE employes SET salaire = salaire * 1.05 WHERE departement = 'IT';
UPDATE employes SET salaire = salaire * 1.03 WHERE departement = 'Ventes';

COMMIT;
```

### Annuler avec ROLLBACK

```sql
BEGIN TRANSACTION;

UPDATE employes SET salaire = salaire * 2;  -- Erreur !

-- Annuler les changements
ROLLBACK;
```

### Transaction avec vérifications

```sql
BEGIN TRANSACTION;

-- Sauvegarder l'état initial
CREATE TEMP TABLE employes_backup AS SELECT * FROM employes;

-- Faire les modifications
UPDATE employes SET salaire = salaire * 1.10 WHERE departement = 'IT';

-- Vérifier
SELECT AVG(salaire) FROM employes WHERE departement = 'IT';

-- Si OK : COMMIT, sinon : ROLLBACK
COMMIT;

-- Nettoyer
DROP TABLE employes_backup;
```

## Performances et optimisation

### Créer des index pour les colonnes WHERE

```sql
-- Créer un index sur la colonne utilisée dans WHERE
CREATE INDEX idx_employes_departement ON employes(departement);

-- Maintenant UPDATE sera plus rapide
UPDATE employes
SET salaire = salaire * 1.05
WHERE departement = 'IT';
```

### UPDATE en lot avec LIMIT

SQLite ne supporte pas LIMIT dans UPDATE, mais on peut utiliser une sous-requête :

```sql
-- Mettre à jour seulement 10 employés
UPDATE employes
SET statut = 'en_revue'
WHERE id IN (
    SELECT id FROM employes 
    WHERE statut = 'actif' 
    LIMIT 10
);
```

### Analyser les performances

```sql
EXPLAIN QUERY PLAN
UPDATE employes
SET salaire = salaire * 1.05
WHERE departement = 'IT' AND salaire < 55000;
```

## Patterns courants

### Incrémenter un compteur

```sql
-- Ajouter une colonne de version
ALTER TABLE employes ADD COLUMN version INTEGER DEFAULT 1;

-- Incrémenter la version à chaque modification
UPDATE employes
SET 
    salaire = 60000,
    version = version + 1
WHERE id = 2;
```

### Toggle (inverser) une valeur booléenne

```sql
-- Ajouter une colonne booléenne (0 ou 1 en SQLite)
ALTER TABLE employes ADD COLUMN actif INTEGER DEFAULT 1;

-- Inverser la valeur
UPDATE employes
SET actif = CASE WHEN actif = 1 THEN 0 ELSE 1 END
WHERE id = 3;

-- Ou plus simplement
UPDATE employes
SET actif = 1 - actif
WHERE id = 3;
```

### Mise à jour en cascade simulée

```sql
-- Mettre à jour les salaires de tous les subordonnés quand le manager change
UPDATE employes
SET salaire = salaire * 1.05
WHERE manager_id = (
    SELECT id FROM employes WHERE nom = 'Dupont' AND prenom = 'Marie'
);
```

### Archivage avec UPDATE

```sql
-- Ajouter une colonne d'archivage
ALTER TABLE employes ADD COLUMN archive INTEGER DEFAULT 0;

-- Archiver les anciens employés
UPDATE employes
SET archive = 1
WHERE JULIANDAY('now') - JULIANDAY(date_embauche) > 3650;  -- Plus de 10 ans
```

## Sécurité et bonnes pratiques

### 1. Toujours utiliser WHERE (sauf intention explicite)

```sql
-- ❌ MAUVAIS : Met à jour TOUT
UPDATE employes SET salaire = 50000;

-- ✅ BON : Cible spécifique
UPDATE employes SET salaire = 50000 WHERE id = 5;
```

### 2. Tester avec SELECT d'abord

```sql
-- 1. Vérifier combien de lignes seront affectées
SELECT COUNT(*) FROM employes WHERE departement = 'IT';

-- 2. Voir les valeurs actuelles
SELECT * FROM employes WHERE departement = 'IT';

-- 3. Faire l'UPDATE
UPDATE employes SET salaire = salaire * 1.05 WHERE departement = 'IT';

-- 4. Vérifier le résultat
SELECT * FROM employes WHERE departement = 'IT';
```

### 3. Utiliser des transactions pour les mises à jour importantes

```sql
BEGIN TRANSACTION;

UPDATE employes SET salaire = salaire * 1.10 WHERE departement = 'IT';

-- Vérifier avant de valider
SELECT * FROM employes WHERE departement = 'IT';

-- Si OK
COMMIT;
-- Sinon
-- ROLLBACK;
```

### 4. Sauvegarder avant UPDATE massif

```sql
-- Créer une sauvegarde
CREATE TABLE employes_backup_20241123 AS SELECT * FROM employes;

-- Faire les modifications
UPDATE employes SET salaire = salaire * 1.10;

-- Si problème, restaurer
-- DROP TABLE employes;
-- ALTER TABLE employes_backup_20241123 RENAME TO employes;
```

### 5. Valider les contraintes

```sql
-- S'assurer que les valeurs sont valides
UPDATE employes
SET salaire = CASE
    WHEN salaire * 1.10 > 0 THEN salaire * 1.10
    ELSE salaire
END;
```

### 6. Documenter les UPDATE importants

```sql
-- Augmentation annuelle 2024 - Approuvée par RH le 15/03/2024
BEGIN TRANSACTION;

UPDATE employes 
SET 
    salaire = salaire * 1.05,
    derniere_modif = CURRENT_TIMESTAMP
WHERE departement = 'IT' AND statut = 'actif';

COMMIT;
```

## Erreurs courantes à éviter

### 1. Oublier WHERE

```sql
-- ❌ Modifie TOUTE la table !
UPDATE employes SET departement = 'IT';
```

### 2. Mauvaise condition WHERE

```sql
-- ❌ Attention à l'opérateur
UPDATE employes SET salaire = 50000 WHERE nom = 'Dupont';  -- Peut affecter plusieurs personnes

-- ✅ Utiliser la clé primaire
UPDATE employes SET salaire = 50000 WHERE id = 2;
```

### 3. Ne pas vérifier les valeurs NULL

```sql
-- ❌ Ne fonctionne pas comme prévu
UPDATE employes SET manager_id = 1 WHERE manager_id != 1;  -- Exclut les NULL

-- ✅ Inclure explicitement les NULL
UPDATE employes SET manager_id = 1 WHERE manager_id != 1 OR manager_id IS NULL;
```

### 4. Ordre des opérations incorrect

```sql
-- ❌ PROBLÈME : Utilise la nouvelle valeur
UPDATE employes SET 
    salaire = 50000,
    ancien_salaire = salaire;  -- Copie 50000 au lieu de l'ancienne valeur !

-- ✅ SOLUTION : Inverser l'ordre ou utiliser CASE
UPDATE employes SET 
    ancien_salaire = salaire,
    salaire = 50000;
```

## Exercices pratiques

### Exercice 1
Augmentez de 10% le salaire de tous les employés du département IT qui gagnent moins de 55000.

### Exercice 2
Changez l'email de tous les employés pour qu'il suive le format prenom.nom@entreprise.fr (en minuscules).

### Exercice 3
Mettez à jour le statut de tous les employés embauchés avant 2019 à "vétéran".

### Exercice 4
Pour chaque employé, calculez un bonus basé sur son ancienneté : 5% par année complète, et ajoutez-le au salaire.

### Exercice 5
Créez une mise à jour qui normalise tous les noms de départements : première lettre en majuscule, reste en minuscule.

## Vérifier les modifications

### Nombre de lignes affectées

SQLite fournit la fonction `changes()` pour connaître le nombre de lignes modifiées :

```sql
UPDATE employes SET salaire = salaire * 1.05 WHERE departement = 'IT';
SELECT changes();  -- Retourne le nombre de lignes modifiées
```

### Avec un trigger (avancé)

```sql
-- Créer une table d'audit
CREATE TABLE audit_log (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    table_name TEXT,
    action TEXT,
    timestamp DATETIME DEFAULT CURRENT_TIMESTAMP,
    details TEXT
);

-- Créer un trigger
CREATE TRIGGER audit_employes_update
AFTER UPDATE ON employes
FOR EACH ROW
BEGIN
    INSERT INTO audit_log (table_name, action, details)
    VALUES ('employes', 'UPDATE', 
            'ID: ' || NEW.id || ', Old salary: ' || OLD.salaire || ', New salary: ' || NEW.salaire);
END;
```

## Résumé

- `UPDATE` modifie des données existantes dans une table
- **Toujours utiliser WHERE** sauf si vous voulez modifier toutes les lignes
- **Testez avec SELECT** avant d'exécuter UPDATE
- Utilisez des **transactions** pour les modifications importantes
- Les **sous-requêtes** permettent des mises à jour complexes
- **CASE** permet des mises à jour conditionnelles
- Les **index** améliorent les performances sur les grosses tables
- **Sauvegardez** avant les UPDATE massifs

## Ressources supplémentaires

- Documentation officielle SQLite : https://www.sqlite.org/lang_update.html
- Triggers pour l'audit
- Contraintes et validation de données

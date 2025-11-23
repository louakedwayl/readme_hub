# Cours : DELETE en SQLite

## Introduction

La commande `DELETE` en SQLite permet de supprimer des lignes existantes dans une table. C'est une opération irréversible qui nécessite une grande attention.

⚠️ **ATTENTION CRITIQUE** : DELETE est une opération IRRÉVERSIBLE. Une fois les données supprimées, elles ne peuvent être récupérées que depuis une sauvegarde. Soyez EXTRÊMEMENT prudent !

## Syntaxe de base

```sql
DELETE FROM nom_table
WHERE condition;
```

**Sans WHERE, TOUTES les lignes seront supprimées !**

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
    ('Blanc', 'Claire', 'claire.blanc@email.com', 'Marketing', 50000, '2020-07-22', 4),
    ('Roux', 'Antoine', 'antoine.roux@email.com', 'Ventes', 41000, '2023-05-10', 1),
    ('Dubois', 'Emma', 'emma.dubois@email.com', 'IT', 49000, '2022-08-15', 1),
    ('Laurent', 'Lucas', 'lucas.laurent@email.com', 'RH', 46000, '2021-12-01', 4);

CREATE TABLE projets (
    id INTEGER PRIMARY KEY,
    nom_projet TEXT,
    employe_id INTEGER,
    budget REAL,
    FOREIGN KEY (employe_id) REFERENCES employes(id)
);

INSERT INTO projets (nom_projet, employe_id, budget) VALUES
    ('Site Web', 2, 50000),
    ('Application Mobile', 3, 80000),
    ('CRM', 2, 120000),
    ('Recrutement 2024', 4, 30000);
```

## DELETE simple

### Supprimer une ligne spécifique

```sql
-- Supprimer l'employé avec l'id 8
DELETE FROM employes WHERE id = 8;
```

### Supprimer avec plusieurs conditions

```sql
-- Supprimer les employés du département Ventes avec salaire < 42000
DELETE FROM employes
WHERE departement = 'Ventes' AND salaire < 42000;
```

### Vérifier AVANT de supprimer

**Règle d'or :** Toujours faire un SELECT avant DELETE !

```sql
-- 1. Vérifier combien de lignes seront supprimées
SELECT COUNT(*) FROM employes WHERE departement = 'Marketing';

-- 2. Voir les lignes qui seront supprimées
SELECT * FROM employes WHERE departement = 'Marketing';

-- 3. Si OK, supprimer
DELETE FROM employes WHERE departement = 'Marketing';

-- 4. Vérifier le résultat
SELECT COUNT(*) FROM employes;
```

## WHERE : Cibler les bonnes lignes

### DELETE avec comparaisons

```sql
-- Supprimer les employés avec un salaire > 100000
DELETE FROM employes WHERE salaire > 100000;

-- Supprimer les employés embauchés avant 2018
DELETE FROM employes WHERE date_embauche < '2018-01-01';
```

### DELETE avec IN

```sql
-- Supprimer plusieurs employés spécifiques
DELETE FROM employes WHERE id IN (5, 7, 9);

-- Supprimer plusieurs départements
DELETE FROM employes WHERE departement IN ('Marketing', 'Ventes');
```

### DELETE avec LIKE

```sql
-- Supprimer tous les employés dont le nom commence par 'D'
DELETE FROM employes WHERE nom LIKE 'D%';

-- Supprimer les emails temporaires
DELETE FROM employes WHERE email LIKE '%temp%';
```

### DELETE avec BETWEEN

```sql
-- Supprimer les employés avec un salaire entre 40000 et 45000
DELETE FROM employes WHERE salaire BETWEEN 40000 AND 45000;
```

### DELETE avec IS NULL

```sql
-- Supprimer les employés sans manager
DELETE FROM employes WHERE manager_id IS NULL;

-- Supprimer les lignes avec email manquant
DELETE FROM employes WHERE email IS NULL;
```

### DELETE avec NOT

```sql
-- Supprimer tous les employés SAUF ceux du département IT
DELETE FROM employes WHERE NOT departement = 'IT';

-- Ou équivalent
DELETE FROM employes WHERE departement != 'IT';
DELETE FROM employes WHERE departement <> 'IT';
```

### ⚠️ DELETE sans WHERE (TRÈS DANGEREUX)

```sql
-- ATTENTION : Supprime TOUTES les lignes de la table !
DELETE FROM employes;
```

Cette commande vide complètement la table. Utilisez-la uniquement si c'est votre intention.

## DELETE avec sous-requêtes

### Sous-requête dans WHERE

```sql
-- Supprimer les employés qui gagnent moins que la moyenne
DELETE FROM employes
WHERE salaire < (SELECT AVG(salaire) FROM employes);
```

⚠️ **Important** : La sous-requête est évaluée AVANT la suppression, donc elle utilise toutes les lignes existantes.

### Avec EXISTS

```sql
-- Supprimer les employés qui n'ont aucun projet
DELETE FROM employes
WHERE NOT EXISTS (
    SELECT 1 FROM projets WHERE projets.employe_id = employes.id
);
```

### Avec IN et sous-requête

```sql
-- Supprimer les employés des départements qui ont moins de 2 personnes
DELETE FROM employes
WHERE departement IN (
    SELECT departement
    FROM employes
    GROUP BY departement
    HAVING COUNT(*) < 2
);
```

### Comparaison avec d'autres tables

```sql
-- Supprimer les employés qui ont des projets avec budget < 40000
DELETE FROM employes
WHERE id IN (
    SELECT employe_id 
    FROM projets 
    WHERE budget < 40000
);
```

## DELETE avancé

### DELETE avec LIMIT (via sous-requête)

SQLite ne supporte pas LIMIT directement dans DELETE, mais on peut utiliser une sous-requête :

```sql
-- Supprimer les 3 employés les moins bien payés
DELETE FROM employes
WHERE id IN (
    SELECT id FROM employes 
    ORDER BY salaire ASC 
    LIMIT 3
);
```

### DELETE par lot

```sql
-- Supprimer en plusieurs fois pour de grosses suppressions
DELETE FROM employes
WHERE id IN (
    SELECT id FROM employes 
    WHERE statut = 'inactif' 
    LIMIT 1000
);
-- Répéter jusqu'à ce que toutes les lignes soient supprimées
```

### DELETE conditionnel avec CASE (via sous-requête)

```sql
-- Supprimer selon des critères complexes
DELETE FROM employes
WHERE id IN (
    SELECT id FROM employes
    WHERE CASE
        WHEN departement = 'IT' AND salaire < 50000 THEN 1
        WHEN departement = 'Ventes' AND salaire < 40000 THEN 1
        ELSE 0
    END = 1
);
```

## Gestion des clés étrangères

### Activer les contraintes de clés étrangères

```sql
-- Les contraintes de clés étrangères sont désactivées par défaut en SQLite
PRAGMA foreign_keys = ON;
```

### DELETE avec contrainte RESTRICT (par défaut)

```sql
-- Ceci échouera si des projets référencent cet employé
DELETE FROM employes WHERE id = 2;
-- Erreur : FOREIGN KEY constraint failed
```

### Supprimer d'abord les dépendances

```sql
-- Méthode correcte : supprimer d'abord les projets
DELETE FROM projets WHERE employe_id = 2;

-- Puis supprimer l'employé
DELETE FROM employes WHERE id = 2;
```

### CASCADE (si défini dans la table)

```sql
-- Créer une table avec ON DELETE CASCADE
CREATE TABLE commentaires (
    id INTEGER PRIMARY KEY,
    employe_id INTEGER,
    texte TEXT,
    FOREIGN KEY (employe_id) REFERENCES employes(id) ON DELETE CASCADE
);

-- Maintenant, supprimer un employé supprime aussi ses commentaires
DELETE FROM employes WHERE id = 2;
-- Les commentaires de l'employé 2 sont automatiquement supprimés
```

### SET NULL (si défini dans la table)

```sql
CREATE TABLE taches (
    id INTEGER PRIMARY KEY,
    employe_id INTEGER,
    description TEXT,
    FOREIGN KEY (employe_id) REFERENCES employes(id) ON DELETE SET NULL
);

-- Supprimer un employé met employe_id à NULL dans taches
DELETE FROM employes WHERE id = 3;
-- Les tâches de l'employé 3 ont maintenant employe_id = NULL
```

## Transactions et DELETE

### Transaction simple

```sql
BEGIN TRANSACTION;

-- Supprimer plusieurs groupes de données
DELETE FROM projets WHERE budget < 50000;
DELETE FROM employes WHERE departement = 'Marketing';

COMMIT;
```

### Annuler avec ROLLBACK

```sql
BEGIN TRANSACTION;

DELETE FROM employes WHERE departement = 'IT';

-- Oups, erreur ! Annuler
ROLLBACK;

-- Les données IT sont toujours là
```

### Transaction avec sauvegarde

```sql
BEGIN TRANSACTION;

-- Sauvegarder avant suppression
CREATE TEMP TABLE employes_backup AS 
SELECT * FROM employes WHERE departement = 'Ventes';

-- Supprimer
DELETE FROM employes WHERE departement = 'Ventes';

-- Vérifier
SELECT COUNT(*) FROM employes;

-- Si OK : COMMIT, sinon : ROLLBACK et restaurer
COMMIT;
```

### Point de sauvegarde (SAVEPOINT)

```sql
BEGIN TRANSACTION;

DELETE FROM employes WHERE salaire < 45000;

SAVEPOINT avant_suppression_it;

DELETE FROM employes WHERE departement = 'IT';

-- Annuler uniquement la dernière suppression
ROLLBACK TO SAVEPOINT avant_suppression_it;

COMMIT;
```

## Supprimer toutes les lignes

### DELETE FROM (lent)

```sql
-- Supprime toutes les lignes une par une
DELETE FROM employes;
```

- Déclenche les triggers
- Peut être lent sur de grosses tables
- Peut être annulé avec ROLLBACK dans une transaction

### DELETE vs DROP TABLE

```sql
-- DELETE : Vide la table mais la conserve
DELETE FROM employes;

-- DROP TABLE : Supprime la table complètement
DROP TABLE employes;
```

### DELETE vs TRUNCATE (non supporté en SQLite)

SQLite ne supporte pas TRUNCATE, utilisez DELETE FROM à la place.

```sql
-- Dans d'autres SGBD : TRUNCATE TABLE employes;
-- En SQLite : DELETE FROM employes;
```

Pour "simuler" TRUNCATE (plus rapide) :

```sql
-- Méthode 1 : Supprimer et recréer
DROP TABLE employes;
CREATE TABLE employes (...);  -- Recréer avec la même structure

-- Méthode 2 : DELETE puis VACUUM
DELETE FROM employes;
VACUUM;  -- Libère l'espace disque
```

## Performances et optimisation

### Créer des index pour WHERE

```sql
-- Créer un index sur la colonne utilisée dans WHERE
CREATE INDEX idx_employes_departement ON employes(departement);

-- Maintenant DELETE sera plus rapide
DELETE FROM employes WHERE departement = 'Marketing';
```

### Désactiver les index temporairement (grosses suppressions)

```sql
-- Pour de très grosses suppressions
BEGIN TRANSACTION;

-- Noter les index existants
-- DROP INDEX si nécessaire

DELETE FROM grosse_table WHERE condition;

-- Recréer les index
-- CREATE INDEX ...

COMMIT;
VACUUM;  -- Récupérer l'espace
```

### Analyser les performances

```sql
EXPLAIN QUERY PLAN
DELETE FROM employes
WHERE departement = 'IT' AND salaire < 50000;
```

### VACUUM après grosses suppressions

```sql
-- Supprimer beaucoup de données
DELETE FROM employes WHERE date_embauche < '2015-01-01';

-- Libérer l'espace disque
VACUUM;
```

## Patterns courants

### Soft Delete (suppression logique)

Au lieu de supprimer réellement les données, marquez-les comme supprimées :

```sql
-- Ajouter une colonne
ALTER TABLE employes ADD COLUMN supprime INTEGER DEFAULT 0;
ALTER TABLE employes ADD COLUMN date_suppression DATETIME;

-- "Supprimer" un employé (soft delete)
UPDATE employes
SET 
    supprime = 1,
    date_suppression = CURRENT_TIMESTAMP
WHERE id = 5;

-- Exclure les suppressions dans les SELECT
SELECT * FROM employes WHERE supprime = 0;

-- Créer une vue pour simplifier
CREATE VIEW employes_actifs AS
SELECT * FROM employes WHERE supprime = 0;

-- Utiliser la vue
SELECT * FROM employes_actifs;
```

### Archivage avant suppression

```sql
-- Créer une table d'archives
CREATE TABLE employes_archives (
    id INTEGER,
    nom TEXT,
    prenom TEXT,
    email TEXT,
    departement TEXT,
    date_archive DATETIME DEFAULT CURRENT_TIMESTAMP
);

-- Archiver puis supprimer
BEGIN TRANSACTION;

-- Copier dans les archives
INSERT INTO employes_archives (id, nom, prenom, email, departement)
SELECT id, nom, prenom, email, departement
FROM employes
WHERE date_embauche < '2015-01-01';

-- Supprimer les originaux
DELETE FROM employes WHERE date_embauche < '2015-01-01';

COMMIT;
```

### Suppression en cascade manuelle

```sql
-- Supprimer un employé et toutes ses dépendances
BEGIN TRANSACTION;

-- D'abord les projets
DELETE FROM projets WHERE employe_id = 3;

-- Puis les tâches, commentaires, etc.
-- DELETE FROM taches WHERE employe_id = 3;
-- DELETE FROM commentaires WHERE employe_id = 3;

-- Enfin l'employé
DELETE FROM employes WHERE id = 3;

COMMIT;
```

### Nettoyage périodique

```sql
-- Supprimer les données anciennes (plus de 7 ans)
DELETE FROM employes
WHERE statut = 'inactif' 
AND date_embauche < DATE('now', '-7 years');

-- Supprimer les doublons (garder le plus récent)
DELETE FROM employes
WHERE id NOT IN (
    SELECT MAX(id)
    FROM employes
    GROUP BY email
);
```

### Suppression conditionnelle par âge

```sql
-- Supprimer les enregistrements de plus de 30 jours
DELETE FROM logs
WHERE date_creation < DATE('now', '-30 days');
```

## Audit et traçabilité

### Compter les suppressions

```sql
-- Avant suppression
SELECT COUNT(*) AS avant FROM employes WHERE departement = 'Ventes';

-- Supprimer
DELETE FROM employes WHERE departement = 'Ventes';

-- Vérifier
SELECT changes() AS lignes_supprimees;
```

### Créer un log de suppressions avec trigger

```sql
-- Table d'audit
CREATE TABLE audit_suppressions (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    table_name TEXT,
    record_id INTEGER,
    deleted_data TEXT,
    deleted_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    deleted_by TEXT
);

-- Trigger de suppression
CREATE TRIGGER audit_employes_delete
BEFORE DELETE ON employes
FOR EACH ROW
BEGIN
    INSERT INTO audit_suppressions (table_name, record_id, deleted_data)
    VALUES (
        'employes',
        OLD.id,
        OLD.nom || ' ' || OLD.prenom || ' (' || OLD.email || ')'
    );
END;

-- Maintenant chaque suppression est enregistrée
DELETE FROM employes WHERE id = 5;

-- Consulter l'audit
SELECT * FROM audit_suppressions;
```

## Sécurité et bonnes pratiques

### 1. TOUJOURS utiliser WHERE (sauf intention explicite)

```sql
-- ❌ DANGEREUX : Supprime TOUT
DELETE FROM employes;

-- ✅ BON : Suppression ciblée
DELETE FROM employes WHERE id = 5;
```

### 2. Faire un SELECT avant DELETE

```sql
-- Workflow sécurisé
-- Étape 1 : Compter
SELECT COUNT(*) FROM employes WHERE departement = 'IT';

-- Étape 2 : Voir les données
SELECT * FROM employes WHERE departement = 'IT';

-- Étape 3 : Si OK, supprimer
DELETE FROM employes WHERE departement = 'IT';
```

### 3. Utiliser des transactions

```sql
BEGIN TRANSACTION;

DELETE FROM employes WHERE departement = 'Marketing';

-- Vérifier
SELECT COUNT(*) FROM employes;

-- Si OK
COMMIT;
-- Sinon
-- ROLLBACK;
```

### 4. Créer une sauvegarde avant suppression massive

```sql
-- Sauvegarder toute la table
CREATE TABLE employes_backup_20241123 AS SELECT * FROM employes;

-- Ou sauvegarder uniquement ce qui sera supprimé
CREATE TABLE employes_supprime_backup AS 
SELECT * FROM employes WHERE departement = 'Ventes';

-- Supprimer
DELETE FROM employes WHERE departement = 'Ventes';

-- Si problème, restaurer
-- INSERT INTO employes SELECT * FROM employes_supprime_backup;
```

### 5. Privilégier le Soft Delete pour les données importantes

```sql
-- Au lieu de DELETE, utiliser UPDATE
UPDATE employes
SET supprime = 1, date_suppression = CURRENT_TIMESTAMP
WHERE id = 5;
```

### 6. Activer les contraintes de clés étrangères

```sql
PRAGMA foreign_keys = ON;
```

### 7. Documenter les suppressions importantes

```sql
-- Nettoyage trimestriel Q4 2024 - Approuvé par direction
BEGIN TRANSACTION;

INSERT INTO audit_log (action, description) 
VALUES ('DELETE', 'Suppression employés inactifs > 5 ans');

DELETE FROM employes 
WHERE statut = 'inactif' 
AND date_embauche < DATE('now', '-5 years');

COMMIT;
```

### 8. Utiliser des vues pour les données "supprimées"

```sql
-- Vue des employés actifs
CREATE VIEW employes_actifs AS
SELECT * FROM employes WHERE supprime = 0;

-- Vue des employés supprimés
CREATE VIEW employes_supprimes AS
SELECT * FROM employes WHERE supprime = 1;
```

## Erreurs courantes à éviter

### 1. Oublier WHERE

```sql
-- ❌ Supprime TOUT !
DELETE FROM employes;
```

### 2. Mauvaise condition WHERE

```sql
-- ❌ Peut supprimer plusieurs personnes
DELETE FROM employes WHERE nom = 'Dupont';

-- ✅ Utiliser la clé primaire
DELETE FROM employes WHERE id = 2;
```

### 3. Ignorer les clés étrangères

```sql
-- ❌ Échouera si des projets référencent cet employé
DELETE FROM employes WHERE id = 2;

-- ✅ Supprimer d'abord les dépendances
DELETE FROM projets WHERE employe_id = 2;
DELETE FROM employes WHERE id = 2;
```

### 4. Ne pas vérifier avant de supprimer

```sql
-- ❌ Supprimer directement
DELETE FROM employes WHERE departement = 'IT';

-- ✅ Vérifier d'abord
SELECT COUNT(*) FROM employes WHERE departement = 'IT';
DELETE FROM employes WHERE departement = 'IT';
```

### 5. Oublier VACUUM après grosse suppression

```sql
-- Supprimer beaucoup de données
DELETE FROM grosse_table WHERE condition;

-- Ne pas oublier de libérer l'espace
VACUUM;
```

### 6. Utiliser = NULL au lieu de IS NULL

```sql
-- ❌ Ne fonctionne pas
DELETE FROM employes WHERE manager_id = NULL;

-- ✅ Correct
DELETE FROM employes WHERE manager_id IS NULL;
```

## Récupération après erreur

### Si vous n'avez pas utilisé de transaction

Sans sauvegarde, les données sont **définitivement perdues**. C'est pourquoi les sauvegardes sont cruciales.

### Avec transaction et ROLLBACK

```sql
BEGIN TRANSACTION;

DELETE FROM employes WHERE departement = 'IT';

-- Oups, erreur !
ROLLBACK;

-- Les données sont récupérées
SELECT * FROM employes WHERE departement = 'IT';
```

### Restauration depuis sauvegarde

```sql
-- Si vous aviez fait une sauvegarde
INSERT INTO employes 
SELECT * FROM employes_backup 
WHERE id NOT IN (SELECT id FROM employes);
```

## Exercices pratiques

### Exercice 1
Supprimez tous les employés du département Marketing qui ont été embauchés après 2021.

### Exercice 2
Supprimez les employés qui n'ont aucun projet assigné (utilisez une sous-requête avec NOT EXISTS).

### Exercice 3
Créez un système de soft delete : ajoutez les colonnes nécessaires et écrivez la requête UPDATE équivalente à une suppression.

### Exercice 4
Supprimez les 5 employés les moins bien payés, mais archivez-les d'abord dans une table employes_archives.

### Exercice 5
Créez un trigger qui enregistre dans une table audit_log chaque fois qu'un employé est supprimé, avec son nom, département et date de suppression.

## Résumé

- `DELETE` supprime des lignes de manière **IRRÉVERSIBLE**
- **TOUJOURS utiliser WHERE** sauf si vous voulez vider toute la table
- **Testez avec SELECT** avant d'exécuter DELETE
- Utilisez des **transactions** pour pouvoir annuler
- **Sauvegardez** avant les suppressions importantes
- Considérez le **soft delete** pour les données critiques
- Gérez les **clés étrangères** correctement
- Utilisez **VACUUM** après grosse suppression pour libérer l'espace
- **Activez les contraintes** de clés étrangères : `PRAGMA foreign_keys = ON`
- Créez des **triggers d'audit** pour tracer les suppressions

## Checklist de sécurité DELETE

Avant chaque DELETE, vérifiez :

- [ ] Ai-je fait un SELECT pour voir ce qui sera supprimé ?
- [ ] Ai-je une sauvegarde récente ?
- [ ] Suis-je dans une transaction ?
- [ ] La clause WHERE est-elle correcte ?
- [ ] Y a-t-il des clés étrangères à gérer ?
- [ ] Est-ce que je veux vraiment supprimer définitivement ou plutôt faire un soft delete ?
- [ ] Ai-je vérifié le nombre de lignes qui seront affectées ?

## Ressources supplémentaires

- Documentation officielle SQLite : https://www.sqlite.org/lang_delete.html
- Triggers et audit
- Contraintes de clés étrangères
- Soft delete patterns

# Comprendre le ROWID (Raw identifier) en SQLite
## Cours complet et clair

# ⭐ 1. Qu’est-ce que le ROWID ?
SQLite stocke toutes ses tables sous forme de B-tree.  
Chaque ligne possède un identifiant interne appelé ROWID.

### ✔ Le ROWID est :
- un entier unique pour chaque ligne
- généré automatiquement
- utilisé en interne pour retrouver rapidement les lignes
- invisible, sauf si tu l’affiches

# ⭐ 2. Comment fonctionne le ROWID ?
Exemple d’insertion :
```sql
INSERT INTO users (name) VALUES ('Alice');
INSERT INTO users (name) VALUES ('Bob');
```
SQLite attribue des ROWID automatiquement :
- Alice → ROWID = 1
- Bob → ROWID = 2

Tu peux accéder au ROWID :
```sql
SELECT rowid, name FROM users;
```

# ⭐ 3. Le lien entre ROWID et PRIMARY KEY
Si tu définis :
```sql
id INTEGER PRIMARY KEY
```
Alors **cette colonne devient le ROWID**.  
C’est un **alias du ROWID**.

- `id` et `rowid` = mêmes valeurs  
- auto-incrémentation automatique  
- index intégré → performances maximales

# ⭐ 4. Pourquoi SQLite fait cela ?
- Utilise le ROWID comme clé interne  
- Évite la création d’index supplémentaire  
- Optimisation de la performance et de l’espace

# ⭐ 5. Qu’est-ce qu’un alias du ROWID ?
Une colonne qui **remplace le ROWID** :

Exemple :
```sql
CREATE TABLE users (
    id INTEGER PRIMARY KEY,
    name TEXT
);
INSERT INTO users (name) VALUES ('Alice');
INSERT INTO users (name) VALUES ('Bob');
SELECT id, rowid FROM users;
```
Résultat :
| id | rowid | name |
|----|-------|------|
| 1  | 1     | Alice|
| 2  | 2     | Bob  |

# ⭐ 6. Cas où ce n’est pas un alias
- `email TEXT PRIMARY KEY` → pas alias → index classique
- `id INTEGER UNIQUE` → pas alias → index + pas auto-incrément
- AUTOINCREMENT = alias ROWID mais force à ne pas réutiliser les anciens IDs

# ⭐ 7. Cas spécial : WITHOUT ROWID
```sql
CREATE TABLE users (
    email TEXT PRIMARY KEY
) WITHOUT ROWID;
```
- Plus de ROWID  
- PK = vraie clé interne  
- Optimisé pour les clés non-entiers

# ⭐ 8. Résumé rapide
| Définition | Alias ROWID ? | Auto-incrément ? | Index supplémentaire ? |
|------------|---------------|-----------------|-----------------------|
| id INTEGER PRIMARY KEY | ✔️ Oui | ✔️ Oui | ❌ Non |
| id INTEGER PRIMARY KEY AUTOINCREMENT | ✔️ Oui | ✔️ Strict | ❌ Non |
| email TEXT PRIMARY KEY | ❌ Non | ❌ Non | ✔️ Oui |
| id INTEGER UNIQUE | ❌ Non | ❌ Non | ✔️ Oui |
| Table WITHOUT ROWID | ❌ Non | ❌ Non | ❌ (PK = clé interne) |

# 📘 Conclusion
Le ROWID est le fondement du stockage SQLite.  
`INTEGER PRIMARY KEY` = meilleure manière de définir une clé primaire dans SQLite.

# 📘 Cours : La fonction `COUNT()` en SQL

## 1️⃣ Qu'est-ce que `COUNT()` ?

La fonction `COUNT()` est une fonction d'agrégation SQL qui sert à compter le nombre de lignes dans une table ou correspondant à certains critères.

**Syntaxe générale :**

```sql
SELECT COUNT(*) FROM table_name;
```

- `*` : compte toutes les lignes
- On peut aussi compter une colonne spécifique :

```sql
SELECT COUNT(column_name) FROM table_name;
```

- Dans ce cas, seules les lignes où la colonne n'est pas NULL sont comptées.

## 2️⃣ Utilisation avec `WHERE`

Vous pouvez filtrer les lignes à compter grâce à la clause `WHERE` :

```sql
SELECT COUNT(*) 
FROM users 
WHERE username = 'Alice';
```

- Compte le nombre d'utilisateurs dont le `username` est `'Alice'`.

## 3️⃣ Utilisation avec un alias

On peut renommer le résultat avec `AS` :

```sql
SELECT COUNT(*) AS total_users 
FROM users;
```

- Permet de récupérer le résultat sous le nom `total_users` dans le code.

## 4️⃣ Utilisation avec `GROUP BY`

`COUNT()` est souvent utilisée avec `GROUP BY` pour compter par catégorie :

```sql
SELECT role, COUNT(*) AS total
FROM users
GROUP BY role;
```

- Compte le nombre d'utilisateurs par rôle (`admin`, `editor`, `user`, etc.)

## 5️⃣ Différence entre `COUNT(*)` et `COUNT(colonne)`

| Forme | Compte | Exemple |
|-------|--------|---------|
| `COUNT(*)` | Toutes les lignes, même si certaines colonnes sont NULL | Compter tous les utilisateurs |
| `COUNT(column_name)` | Uniquement les lignes où `column_name` n'est pas NULL | Compter les utilisateurs ayant un email renseigné |

## 6️⃣ Disponibilité dans les SGBD

La fonction `COUNT()` est disponible dans tous les SGBD standards, y compris :

- MySQL / MariaDB ✅
- PostgreSQL ✅
- SQLite ✅
- Oracle SQL ✅
- SQL Server ✅

💡 Seule la syntaxe exacte peut légèrement varier (alias, gestion des NULL, etc.), mais le concept reste identique.

## 7️⃣ Exemples concrets

### Exemple 1 : Compter tous les utilisateurs

```sql
SELECT COUNT(*) AS total_users FROM users;
```

### Exemple 2 : Compter les utilisateurs avec un username spécifique

```sql
SELECT COUNT(*) AS alice_count 
FROM users 
WHERE username = 'Alice';
```

### Exemple 3 : Compter les utilisateurs par rôle

```sql
SELECT role, COUNT(*) AS total
FROM users
GROUP BY role;
```

### Exemple 4 : Compter les emails non nuls

```sql
SELECT COUNT(email) AS emails_filled 
FROM users;
```

## 8️⃣ Bonnes pratiques

- Toujours utiliser `COUNT(*)` si vous voulez toutes les lignes
- Utiliser `COUNT(colonne)` si vous voulez ignorer les NULL
- Avec des filtres, associer `WHERE` ou `GROUP BY` pour des statistiques plus précises
- Ajouter un alias `AS` pour rendre le résultat plus lisible dans le code

## 9️⃣ Résumé

- `COUNT()` : fonction d'agrégation pour compter des lignes
- `COUNT(*)` : toutes les lignes
- `COUNT(colonne)` : lignes non NULL pour cette colonne
- Disponible dans tous les SGBD courants
- Peut être combinée avec `WHERE`, `GROUP BY` et `HAVING`

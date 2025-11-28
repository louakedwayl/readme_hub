
## Intégrité référentielle et ON DELETE CASCADE

### 🔹 1️⃣ Qu’est-ce qu’une clé étrangère ?

Une **clé étrangère** (Foreign Key) est un lien entre deux tables.  
Elle garantit qu’un **enfant** fait référence à un **parent** existant.

```sql
FOREIGN KEY (colonne_enfant)
REFERENCES TableParent(colonne_parent)
```

🎯 Objectif : garder des données **cohérentes**

---

### 🔹 2️⃣ Problème dans SQLite : Foreign Keys désactivées

Dans SQLite, les contraintes de clés étrangères sont **désactivées par défaut** ❌

➡️ Il faut les activer à chaque connexion :

```sql
PRAGMA foreign_keys = ON;
```

Sinon, SQLite **ne vérifie pas** les relations (risque de données incohérentes).

---

### 🔹 3️⃣ Exemple de relation Parent → Enfant

```sql
CREATE TABLE Parents (
  id INTEGER PRIMARY KEY,
  nom TEXT
);

CREATE TABLE Enfants (
  id INTEGER PRIMARY KEY,
  nom TEXT,
  parent_id INTEGER,
  FOREIGN KEY(parent_id) REFERENCES Parents(id)
);
```

📌 Ici, `parent_id` doit exister dans `Parents.id`.

---

### 🔹 4️⃣ Problème sans cascade

Si on supprime un parent qui a des enfants liés :

```sql
DELETE FROM Parents WHERE id = 1;
```

➡️ Cela provoque **une erreur** (si foreign_keys = ON)  
➡️ Ou des données cassées (si foreign_keys = OFF)

---

### 🔹 5️⃣ Solution : ON DELETE CASCADE

`ON DELETE CASCADE` signifie :

> Si je supprime le parent → supprime automatiquement les enfants liés.

Version avec cascade :

```sql
CREATE TABLE Enfants (
  id INTEGER PRIMARY KEY,
  nom TEXT,
  parent_id INTEGER,
  FOREIGN KEY(parent_id)
    REFERENCES Parents(id)
    ON DELETE CASCADE
);
```

---

### 🔹 6️⃣ Résumé des comportements

| Situation | Ce qu’il se passe |
|----------|------------------|
| foreign_keys OFF | Les enfants peuvent pointer vers du vide 😬 |
| foreign_keys ON | Empêche incohérences mais bloque la suppression |
| ON DELETE CASCADE | Suppression parent → enfants supprimés aussi ✔️ |

---

### 🧠 À retenir

- `PRAGMA foreign_keys = ON;` = **obligatoire dans SQLite**
- Les clés étrangères = **intégrité des données**
- `ON DELETE CASCADE` = **propagation automatique des suppressions**
- Présent aussi dans **MySQL, PostgreSQL, SQL Server, Oracle, etc.**

---

### 🔎 Bonus : Autres actions possibles

| Règle SQL | Effet |
|----------|------|
| ON DELETE CASCADE | Supprime les enfants |
| ON UPDATE CASCADE | Met à jour la clé étrangère des enfants |
| ON DELETE SET NULL | Met la référence à NULL |
| ON DELETE RESTRICT | Empêche la suppression du parent |

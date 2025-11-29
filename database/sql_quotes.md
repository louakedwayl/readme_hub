# 🧵 Cours : Quotes en SQL (SQLite, MySQL, PostgreSQL, MariaDB, SQL Server)

Comprendre **comment citer les chaînes** et **comment citer les identifiants** est essentiel en SQL. Chaque SGBD suit les standards SQL… mais certains ont des **exceptions importantes**.

---

# 1. 🔤 Chaînes de caractères (strings)

## ✅ **SQL Standard**

Le standard SQL impose d’utiliser **uniquement des apostrophes (single quotes)** pour les chaînes :

```sql
'Hello world'
'Wayl'
'42 School'
```

Tous les SGBD respectent cette règle. 👉 Les single quotes `' '` = **obligatoires pour les strings**, partout.

### 🗂️ Résumé

| SGBD           | Single quotes `'string'` | Double quotes `"string"`                                              |
| -------------- | ------------------------ | --------------------------------------------------------------------- |
| **SQLite**     | ✔️ correct               | ❌ pas recommandé                                                      |
| **MySQL**      | ✔️ correct               | ⚠️ accepté si SQL_MODE le permet, mais à éviter                       |
| **MariaDB**    | ✔️ correct               | ⚠️ accepté parfois, à éviter                                          |
| **PostgreSQL** | ✔️ correct               | ❌ interdit                                                            |
| **SQL Server** | ✔️ correct               | ⚠️ double quotes possible en mode QUOTED_IDENTIFIER, mais déconseillé |

👉 **La règle universelle : utilise toujours `'...'` pour les chaînes.**

---

# 2. 🏷️ Identifiants (noms de colonnes, tables)

Les identifiants peuvent être cités quand :

* ils contiennent des espaces
* ils contiennent des caractères spéciaux
* ils utilisent un mot réservé

Ex : `order`, `group`, `user`

Mais chaque SGBD utilise **un type de quote différent** pour les identifiants.

---

# 3. 🔍 Citer les identifiants selon le SGBD

## 📌 SQL Standard

Le standard SQL exige **les doubles quotes `"ident"`** :

```sql
SELECT "user name" FROM "order";
```

---

## 🟦 PostgreSQL

PostgreSQL suit strictement le standard.

| Identifiants | Format       |
| ------------ | ------------ |
| ✔️ Correct   | `"myColumn"` |
| ❌ Incorrect  | `'myColumn'` |

---

## 🟥 SQLite

SQLite suit aussi le standard pour les identifiants :

* `"ident"` = recommandé
* `'ident'` = traité comme **string**, pas comme identifiant
* `ident` = accepté (compatibilité MySQL)

---

## 🟧 MySQL / MariaDB

MySQL utilise traditionnellement les **backticks** ` ` :

```sql
SELECT `user name` FROM `order`;
```

Mais il accepte aussi `"ident"` **si** `ANSI_QUOTES` est activé.

| Type    | Recommandé                  |
| ------- | --------------------------- |
| `ident` | ✔️ oui                      |
| "ident" | ⚠️ seulement en ANSI_QUOTES |
| 'ident' | ❌ interdit                  |

---

## 🟩 SQL Server

SQL Server utilise :

| Type    | Usage                               |
| ------- | ----------------------------------- |
| [ident] | ✔️ recommandé                       |
| "ident" | ✔️ possible si QUOTED_IDENTIFIER ON |
| 'ident' | ❌ interdit                          |

Exemple :

```sql
SELECT [order], [user name] FROM users;
```

---

# 4. 🧠 Résumé global

### 📌 Pour les chaînes :

👉 **Toujours `'...'` dans tous les SGBD**.

### 📌 Pour les identifiants :

| SGBD            | Identifiants recommandés |
| --------------- | ------------------------ |
| SQLite          | `"ident"`                |
| PostgreSQL      | `"ident"`                |
| MySQL / MariaDB | `ident`                  |
| SQL Server      | [ident]                  |
| Standard SQL    | `"ident"`                |

---

# 5. 🎯 Tableau final synthèse

| SGBD             | Chaînes `'...'` | Identifiants |
| ---------------- | --------------- | ------------ |
| **SQLite**       | ✔️ obligatoire  | `"ident"`    |
| **MySQL**        | ✔️ obligatoire  | `ident`      |
| **MariaDB**      | ✔️ obligatoire  | `ident`      |
| **PostgreSQL**   | ✔️ obligatoire  | `"ident"`    |
| **SQL Server**   | ✔️ obligatoire  | [ident]      |
| **SQL Standard** | ✔️ obligatoire  | `"ident"`    |

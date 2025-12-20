# Les Clés Primaires en Bases de Données

La **clé primaire** est un concept fondamental en base de données qui permet d'identifier **de manière unique chaque enregistrement** dans une table. Ce concept existe surtout dans les bases relationnelles, mais peut avoir des équivalents dans certaines bases NoSQL.

---

## 1. Bases de données relationnelles (SQL)

Dans les bases de données relationnelles comme **SQLite, MySQL ou PostgreSQL** :

### Définition

* Une clé primaire est un ou plusieurs champs (**colonnes**) qui identifient **de façon unique** chaque ligne de la table.
* Caractéristiques :

  * **Unique** : aucune valeur dupliquée n’est autorisée.
  * **Non NULL** : une clé primaire ne peut pas contenir de valeur NULL.
  * Peut être composée de **plusieurs colonnes** (clé primaire composée).

### Exemple SQLite

```sql
CREATE TABLE users (
    id INTEGER PRIMARY KEY,
    username TEXT NOT NULL
);
```

* `id` est la clé primaire : chaque valeur est unique et non NULL.

### Exemple de clé primaire composée

```sql
CREATE TABLE orders (
    order_id INTEGER,
    product_id INTEGER,
    quantity INTEGER,
    PRIMARY KEY (order_id, product_id)
);
```

* Ici, la combinaison `order_id + product_id` identifie chaque ligne.

---

## 2. Bases de données non relationnelles (NoSQL)

Dans certaines bases NoSQL comme **MongoDB ou Cassandra** :

* Le concept de clé primaire existe mais peut varier :

  * MongoDB : chaque document a un champ `_id` unique.
  * Cassandra : `PRIMARY KEY` existe mais la structure et contraintes diffèrent.
* Les contraintes de **unicité et non-nullité** ne sont pas toujours strictes.
* Certaines bases NoSQL n’imposent pas de clé unique et la gèrent côté application.

---

## 3. Points importants

* Les clés primaires sont **essentielles pour l’intégrité des données**.
* Elles servent souvent de **référence pour les clés étrangères** (FOREIGN KEY).
* Toujours planifier la clé primaire dès la conception de la table.

---

## 4. Bonnes pratiques

* Utiliser un type simple et stable (comme INTEGER ou UUID) pour la clé primaire.
* Pour les tables très grandes, privilégier des clés courtes pour optimiser les index.
* Ne jamais modifier la valeur d’une clé primaire après insertion.

---

## Références

* [SQLite – PRIMARY KEY](https://www.sqlite.org/lang_createtable.html)
* [MongoDB – _id field](https://www.mongodb.com/docs/manual/core/document/#document-id)
* [Cassandra – PRIMARY KEY](https://cassandra.apache.org/doc/latest/cql/index.html)

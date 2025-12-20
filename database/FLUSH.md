# La commande `FLUSH` en MariaDB/MySQL

La commande `FLUSH` permet de **vider ou de recharger certains caches et tables internes de MariaDB/MySQL**, afin que les modifications récentes prennent effet immédiatement. C’est souvent utilisé après des changements de privilèges, des modifications de tables ou de logs.

---

## 1. Objectif principal

* Recharger les **tables de privilèges** pour appliquer les modifications sur les utilisateurs ou leurs droits.
* Vider certains **logs internes**.
* Recharger les **tables ou caches internes** pour que MariaDB/MySQL prenne en compte les changements.

---

## 2. Syntaxe générale

```sql
FLUSH [option];
```

Les options les plus courantes :

| Option                         | Description                                                                                                                                                 |
| ------------------------------ | ----------------------------------------------------------------------------------------------------------------------------------------------------------- |
| `FLUSH PRIVILEGES;`            | Recharge les tables de privilèges après avoir modifié les utilisateurs ou leurs droits directement dans les tables système (`mysql.user`, `mysql.db`, etc.) |
| `FLUSH TABLES;`                | Ferme toutes les tables ouvertes et vide le cache des tables. Utile pour les opérations de maintenance.                                                     |
| `FLUSH TABLES WITH READ LOCK;` | Verrouille toutes les tables pour lecture uniquement, souvent utilisé avant une sauvegarde complète.                                                        |
| `FLUSH HOSTS;`                 | Réinitialise le compteur d’erreurs de connexion pour les hôtes bloqués.                                                                                     |
| `FLUSH LOGS;`                  | Vide ou réinitialise les logs (binary log, error log, etc.).                                                                                                |
| `FLUSH STATUS;`                | Réinitialise les compteurs d’état internes de MariaDB/MySQL.                                                                                                |

---

## 3. Exemple d’utilisation

### 3.1 Appliquer de nouveaux privilèges

Si vous modifiez directement les tables de privilèges sans passer par `CREATE USER` ou `GRANT` :

```sql
UPDATE mysql.user SET plugin='mysql_native_password' WHERE User='bob';
FLUSH PRIVILEGES;
```

### 3.2 Fermer toutes les tables

```sql
FLUSH TABLES;
```

### 3.3 Verrouillage pour une sauvegarde

```sql
FLUSH TABLES WITH READ LOCK;
-- faire la sauvegarde
UNLOCK TABLES;
```

---

## 4. Bonnes pratiques

* Toujours faire un **`FLUSH PRIVILEGES`** après avoir modifié les droits directement dans les tables système.
* Utiliser `FLUSH TABLES WITH READ LOCK` avec prudence, car cela bloque toutes les écritures.
* Ne pas abuser de `FLUSH LOGS` en production, car certains logs sont essentiels pour le diagnostic.

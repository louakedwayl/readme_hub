# GRANT dans MariaDB/MySQL

La commande `GRANT` dans MariaDB/MySQL permet d'accorder des privilèges à un utilisateur, lui permettant d'effectuer certaines actions sur des bases de données, des tables ou des colonnes. Une utilisation correcte de `GRANT` assure un contrôle d'accès et une sécurité optimisée dans votre base de données.

---

## Syntaxe

```sql
GRANT type_de_privilege [(liste_colonnes)]
ON nom_base.nom_table
TO 'utilisateur'@'hôte'
[IDENTIFIED BY 'mot_de_passe']
[WITH GRANT OPTION];
```

---

## Composants clés

* **type_de_privilege** : Le type de permission à accorder. Exemples :

  * `ALL PRIVILEGES` — tous les privilèges
  * `SELECT` — lecture de données
  * `INSERT` — insertion de données
  * `UPDATE` — mise à jour de données
  * `DELETE` — suppression de données
  * `CREATE` — création de tables ou bases
  * `DROP` — suppression de tables ou bases
  * `GRANT OPTION` — permet à l'utilisateur d'accorder ses privilèges à d'autres

* **nom_base.nom_table** : La portée des privilèges. Exemples :

  * `*.*` — toutes les bases, toutes les tables
  * `ma_base.*` — toutes les tables de `ma_base`
  * `ma_base.ma_table` — table spécifique

* **'utilisateur'@'hôte'** : L’utilisateur et l’hôte depuis lequel il peut se connecter :

  * `'user'@'localhost'` — connexion uniquement depuis le serveur local
  * `'user'@'%'` — connexion depuis n’importe quel hôte

* **IDENTIFIED BY 'mot_de_passe'** : Optionnel. Définit un mot de passe pour l’utilisateur s’il n’existe pas encore.

* **WITH GRANT OPTION** : Optionnel. Permet à l’utilisateur de donner ses privilèges à d’autres utilisateurs.

---

## Exemples

### 1. Accorder tous les privilèges sur une base à un utilisateur

```sql
GRANT ALL PRIVILEGES ON ma_base.* TO 'alice'@'localhost' IDENTIFIED BY 'motdepasse';
```

### 2. Accorder uniquement les privilèges SELECT et INSERT sur une table

```sql
GRANT SELECT, INSERT ON ma_base.clients TO 'bob'@'localhost';
```

### 3. Permettre à un utilisateur de se connecter depuis n’importe quel hôte

```sql
GRANT ALL PRIVILEGES ON ma_base.* TO 'charlie'@'%' IDENTIFIED BY 'motdepasse';
```

### 4. Accorder des privilèges avec possibilité de les donner à d’autres

```sql
GRANT SELECT, INSERT ON ma_base.* TO 'dave'@'localhost' WITH GRANT OPTION;
```

---

## Appliquer les changements

Après avoir accordé des privilèges, rechargez toujours les tables de privilèges :

```sql
FLUSH PRIVILEGES;
```

Cela permet aux changements de prendre effet immédiatement.

---

## Bonnes pratiques

* Évitez de donner `ALL PRIVILEGES` sauf si nécessaire.
* Limitez les utilisateurs à des bases et hôtes spécifiques.
* Utilisez des mots de passe forts.
* Révoquez les privilèges inutiles avec `REVOKE`.

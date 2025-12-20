# SQL: CREATE USER

La commande `CREATE USER` permet de créer un nouvel utilisateur dans un système de gestion de base de données (SGBD) comme **MariaDB** ou **MySQL**. Chaque utilisateur possède un nom, un mot de passe et des privilèges spécifiques.

---

## 1. Syntaxe de base

```sql
CREATE USER 'nom_utilisateur'@'hôte' IDENTIFIED BY 'mot_de_passe';
```

* **nom_utilisateur** : le nom de l'utilisateur à créer.
* **hôte** : l'endroit depuis lequel l'utilisateur peut se connecter (ex : `'localhost'` pour se connecter depuis le serveur local, `'%'` pour toutes les adresses).
* **mot_de_passe** : le mot de passe de l'utilisateur.

**Exemple :**

```sql
CREATE USER 'alice'@'localhost' IDENTIFIED BY 'Password123!';
```

Cet exemple crée un utilisateur `alice` qui peut se connecter uniquement depuis le serveur local.

---

## 2. Créer un utilisateur pour toutes les adresses

```sql
CREATE USER 'bob'@'%' IDENTIFIED BY 'Secret456!';
```

* L'utilisateur `bob` peut se connecter depuis n'importe quelle adresse IP.

---

## 3. Spécifier un plugin d’authentification (optionnel)

MariaDB/MySQL permet de choisir le plugin d’authentification :

```sql
CREATE USER 'carol'@'localhost' IDENTIFIED WITH mysql_native_password BY 'Pass789!';
```

* Ici, `mysql_native_password` est utilisé au lieu du plugin par défaut.

---

## 4. Accorder des privilèges

Créer un utilisateur ne lui donne pas de droits par défaut. Il faut ensuite lui accorder des privilèges avec `GRANT` :

```sql
GRANT ALL PRIVILEGES ON ma_base.* TO 'alice'@'localhost';
```

* `ALL PRIVILEGES` : donne tous les droits sur la base de données `ma_base`.
* `ma_base.*` : s'applique à toutes les tables de la base `ma_base`.

**N’oubliez pas de recharger les privilèges :**

```sql
FLUSH PRIVILEGES;
```

---

## 5. Vérifier les utilisateurs existants

```sql
SELECT User, Host FROM mysql.user;
```

* Cette commande liste tous les utilisateurs et l’hôte depuis lequel ils peuvent se connecter.

---

## 6. Supprimer un utilisateur

```sql
DROP USER 'alice'@'localhost';
```

* Supprime l'utilisateur `alice` et ses droits.

---

## 7. Bonnes pratiques

* Ne pas utiliser le compte `root` pour des applications.
* Donner uniquement les privilèges nécessaires à chaque utilisateur.
* Éviter les mots de passe faibles.
* Restreindre l'accès aux adresses IP fiables quand c'est possible.

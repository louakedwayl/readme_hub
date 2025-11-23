# SQLite – DROP TABLE

La commande `DROP TABLE` en SQLite est utilisée pour **supprimer une table existante** dans une base de données. Lorsqu'une table est supprimée, **toutes les données qu'elle contient sont perdues définitivement**. Il est donc important de l'utiliser avec précaution.

---

## Syntaxe

```sql
DROP TABLE [IF EXISTS] nom_table;
```

### Paramètres

* **`IF EXISTS`** *(optionnel)* : permet d'éviter une erreur si la table n’existe pas. Si la table n’existe pas et que `IF EXISTS` n’est pas utilisé, SQLite renverra une erreur.
* **`nom_table`** : le nom de la table à supprimer.

---

## Exemples

### 1. Supprimer une table simple

Supposons que nous ayons une table `users` :

```sql
DROP TABLE users;
```

Si la table `users` existe, elle sera supprimée avec toutes ses données.

### 2. Supprimer une table seulement si elle existe

```sql
DROP TABLE IF EXISTS users;
```

Cette commande supprime la table `users` uniquement si elle existe, sinon SQLite continue sans erreur.

---

## Points importants

* **Irréversible** : toutes les données de la table sont perdues après un `DROP TABLE`.
* **Affecte les dépendances** : si d'autres objets (comme des vues) dépendent de la table, ils peuvent être affectés.
* **Contraintes** : SQLite ne supprimera pas la table si elle est référencée par une contrainte `FOREIGN KEY` active dans une autre table, sauf si la table enfant est également supprimée.

---

## Bonnes pratiques

* Toujours vérifier l’existence de la table avant de la supprimer (`IF EXISTS`).
* Faire une **sauvegarde** avant de supprimer une table contenant des données importantes.
* Préférer la suppression sélective avec `DELETE FROM` si vous voulez juste vider les données mais conserver la structure.

---

## Références

* [Documentation officielle SQLite – DROP TABLE](https://www.sqlite.org/lang_droptable.html)

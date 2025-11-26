# Cours : Normalisation des Associations et Cardinalités

## 1. Définitions

### 1.1 Association

Une **association** est un lien entre deux entités (tables) dans une base de données relationnelle.
Elle représente la manière dont les instances d'une entité peuvent être reliées à celles d'une autre.

**Exemple :**

* Un **Parent** peut avoir plusieurs **Enfants**
* Un **Étudiant** peut suivre plusieurs **Cours**

### 1.2 Cardinalité

La **cardinalité** indique le **nombre de liens possibles** entre deux entités.

Les types principaux :

* **1-1** : Une entité A est liée à **une seule** entité B
* **1-N** : Une entité A est liée à **plusieurs** entités B
* **N-N** : Plusieurs entités A sont liées à plusieurs entités B

---

## 2. Objectif de la normalisation des associations

La normalisation permet d’organiser les relations entre tables pour :

* Éviter les **redondances**
* Prévenir les **anomalies** lors des mises à jour, suppressions ou insertions
* Maintenir l’**intégrité référentielle**

---

## 3. Normalisation selon la cardinalité

### 3.1 Relation 1-1

* Une seule instance d'une table est liée à une seule instance d'une autre table.
* On peut parfois **fusionner les tables** ou utiliser une clé primaire/étrangère pour relier les enregistrements.

**Exemple :**

```
Table Employé : id_employe (PK), nom
Table Badge   : id_badge (PK), id_employe (FK), date_activation
```

* Chaque employé a un seul badge, chaque badge appartient à un seul employé.

### 3.2 Relation 1-N

* Une instance d'une table peut être liée à plusieurs instances d'une autre table.
* La table du côté N reçoit une **clé étrangère** pointant vers la clé primaire de la table du côté 1.

**Exemple :**

```
Parent (id_parent, nom)
Enfant (id_enfant, nom, id_parent (FK))
```

* Un parent peut avoir plusieurs enfants, chaque enfant a un seul parent.

### 3.3 Relation N-N

* Plusieurs instances d'une table peuvent être liées à plusieurs instances d'une autre table.
* Solution : créer une **table associative** contenant les clés primaires des deux tables.

**Exemple :**

```
Etudiant (id_etudiant, nom)
Cours    (id_cours, nom)
Inscription (id_etudiant (FK), id_cours (FK), date_inscription)
```

* `Inscription` relie les étudiants aux cours qu’ils suivent.

---

## 4. Bonnes pratiques

1. Créer des **tables associatives** pour les relations N-N.
2. Ajouter des **clés étrangères** pour l’intégrité référentielle.
3. Vérifier que chaque table suit au moins la **3ème forme normale (3FN)**.
4. Nommer les tables et colonnes clairement pour refléter les relations.

---

## 5. Conclusion

La normalisation des associations et des cardinalités est essentielle pour **concevoir des bases de données efficaces et fiables**.
Elle permet d’organiser les données, de réduire les redondances et de garantir la cohérence entre les tables.

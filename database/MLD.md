# Modèle Logique de Données (MLD)

## 1. Définition

Le **MLD (Modèle Logique de Données)** est une représentation **logique** de la base de données, basée sur le **MCD (Modèle Conceptuel de Données)**.
Il traduit le modèle conceptuel en **tables, colonnes et relations concrètes**, prêtes à être implémentées dans un système de gestion de base de données relationnelle (SGBDR).

---

## 2. Objectifs du MLD

* Transformer les **entités du MCD** en **tables**
* Définir les **clés primaires** pour identifier chaque enregistrement
* Définir les **clés étrangères** pour représenter les relations
* Préparer la base pour la **création physique (SQL)**
* Respecter les **règles de normalisation** (1FN, 2FN, 3FN)

---

## 3. Étapes de création d'un MLD

1. Identifier toutes les **entités du MCD**
2. Déterminer les **attributs** de chaque entité
3. Définir les **clés primaires** pour chaque table
4. Définir les **clés étrangères** pour les relations entre tables
5. Vérifier la **normalisation** pour éviter les redondances et incohérences

---

## 4. Exemple : Enfants et Parents

**MCD :**

```
Parent (id, nom)
    1 ---- N
Enfant (id, nom, parent_id)
```

**MLD correspondant :**

| Table Parent | Clés |
| ------------ | ---- |
| id (PK)      | id   |
| nom          |      |

| Table Enfant   | Clés      |
| -------------- | --------- |
| id (PK)        | id        |
| nom            |           |
| parent_id (FK) | Parent.id |

* Chaque entité devient une **table**
* Les relations deviennent des **clés étrangères**

---

## 5. Avantages du MLD

* Permet de passer du **conceptuel au concret**
* Facilite la **création de la base en SQL**
* Respecte les règles de **normalisation** pour éviter redondances et anomalies
* Sert de **plan clair pour le développement**

---

## 6. Conclusion

Le MLD est une **étape clé dans la conception d'une base de données relationnelle**.
Il transforme le MCD en une structure logique de tables et de relations, prête pour la mise en œuvre.
Cette étape garantit que la base sera **cohérente, normalisée et facile à maintenir**.

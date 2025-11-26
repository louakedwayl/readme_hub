# Diagrammes du Modèle Conceptuel de Données (MCD)

## 1. Définition

Le **MCD (Modèle Conceptuel de Données)** est un diagramme utilisé en **conception de bases de données** pour représenter les données et leurs relations **de manière conceptuelle**.
Il permet d'organiser et de visualiser les informations avant de créer la base de données réelle.

---

## 2. Objectifs du MCD

* Identifier les principales **entités** (tables) d'une base de données
* Définir les **attributs** (colonnes) de chaque entité
* Montrer les **relations** entre les entités
* Déterminer la **cardinalité** des relations (1-1, 1-N, N-N)

---

## 3. Concepts clés

### 3.1 Entité

Une **entité** représente un objet réel ou conceptuel que l'on souhaite modéliser.
Exemple : `Enfant`, `Parent`, `Produit`, `Commande`.

### 3.2 Attribut

Un **attribut** est une information que l'on conserve sur une entité.
Exemple : Pour l'entité `Enfant` : `id`, `nom`, `date_naissance`.

### 3.3 Relation

Une **relation** représente un lien entre deux entités.
Exemple : `Un parent a plusieurs enfants` → relation entre `Parent` et `Enfant`.

### 3.4 Cardinalité

La **cardinalité** indique le nombre de liens possibles entre les entités :

| Type | Signification                                               |
| ---- | ----------------------------------------------------------- |
| 1-1  | Une entité est liée à **une seule** autre entité            |
| 1-N  | Une entité est liée à **plusieurs** autres entités          |
| N-N  | Plusieurs entités sont liées à **plusieurs** autres entités |

---

## 4. Exemple : Enfants et Parents

**Entités :**

* `Parent` : id, nom
* `Enfant` : id, nom, parent_id

**Relation :**

* Un parent peut avoir plusieurs enfants → **1-N**

**MCD simplifié :**

```
Parent (id, nom)
     |
     | 1 ---- N
     |
Enfant (id, nom, parent_id)
```

---

## 5. Règles pour dessiner un MCD

1. Chaque **entité** doit avoir un **identifiant unique** (clé primaire)
2. Les **relations** doivent préciser la **cardinalité**
3. Les **attributs principaux** doivent être listés pour chaque entité
4. Les relations **N-N** nécessitent souvent une **table intermédiaire**

---

## 6. Utilité

* Facilite la **compréhension de la conception de la base de données**
* Aide à **prévenir les erreurs de conception**
* Sert de **référence pour le SQL** et la création des tables

---

## 7. Conclusion

Le MCD est un **outil fondamental en conception de bases de données**.
Il permet de visualiser clairement **les entités, leurs attributs et leurs relations**, et sert de base pour le modèle logique et physique de la base de données.

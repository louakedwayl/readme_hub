# 🌳 Comprendre le B-tree en SQLite
## Cours complet

# 1️⃣ Qu’est-ce qu’un B-tree ?
Un **B-tree** (arbre B) est une **structure de données en arbre équilibré** utilisée pour stocker et retrouver des données rapidement.

### Caractéristiques principales :
- Chaque nœud peut contenir **plusieurs clés**  
- Chaque nœud peut avoir **plusieurs enfants**  
- L’arbre est **équilibré** : toutes les feuilles sont au même niveau  
- Optimisé pour les **bases de données et le stockage sur disque**

✅ Objectif : accéder, insérer ou supprimer une donnée rapidement, même dans de très grandes tables.

# 2️⃣ Pourquoi SQLite utilise un B-tree ?
SQLite utilise des B-trees pour stocker :
1. **Les tables avec ROWID**  
2. **Les index**

### Avantages :
- Recherches rapides : complexité O(log n)  
- Insertion et suppression efficaces  
- Réduction du nombre de lectures/écritures disque

# 3️⃣ Différence entre B-tree et arbre binaire
| Caractéristique | Arbre binaire | B-tree |
|-----------------|---------------|--------|
| Clés par nœud | 1 | plusieurs |
| Enfants par nœud | 2 | plusieurs |
| Hauteur de l’arbre | grande pour beaucoup de données | petite, équilibrée |
| Lecture disque | plus fréquente | optimisée pour disque |

# 4️⃣ Exemple de B-tree
B-tree de degré 3 (chaque nœud peut contenir 2 à 3 clés) :
```
        [10 | 20]
       /    |       [5 | 7] [12 | 15] [25 | 30]
```
- Chaque nœud contient plusieurs clés triées  
- Les feuilles sont toutes au même niveau  
- Chercher “15” : on descend par la bonne branche → très rapide

# 5️⃣ B-tree et ROWID dans SQLite
- Tables avec ROWID : chaque ligne est stockée dans un B-tree avec le ROWID comme clé principale  
- Index : chaque index est un B-tree, avec les colonnes indexées comme clés  

Exemple :
```sql
CREATE TABLE users (
    id INTEGER PRIMARY KEY,
    name TEXT
);
```
- Le `id` (alias du ROWID) est utilisé comme clé dans le B-tree  
- Pour chercher `id = 10`, SQLite descend dans le B-tree et trouve la ligne rapidement

# 6️⃣ Insertion et suppression dans un B-tree
- **Insertion** : si un nœud est plein, il est **divisé** et l’arbre reste équilibré  
- **Suppression** : si un nœud devient trop vide, il **fusionne avec un nœud voisin**  
- L’arbre reste équilibré et performant

# 7️⃣ Résumé
| Concept | Explication |
|---------|-------------|
| B-tree | Arbre équilibré avec plusieurs clés par nœud |
| Utilisation SQLite | Stockage des tables avec ROWID et des index |
| Avantages | Recherches rapides, insertion/suppression efficaces, peu de lectures disque |
| ROWID | Clé principale utilisée dans le B-tree des tables |

# 📘 Conclusion
Le **B-tree est la base de la performance** de SQLite.  
Comprendre son fonctionnement aide à mieux :
- Concevoir des tables et index efficaces  
- Comprendre l’impact des PRIMARY KEY et ROWID  
- Optimiser les requêtes sur de grandes tables

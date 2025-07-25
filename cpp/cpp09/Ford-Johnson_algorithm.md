# L’algorithme de Ford-Johnson (Merge-Insertion Sort)

## 1/ Introduction :

L’algorithme **Ford-Johnson**, aussi connu sous le nom de **Merge-Insertion Sort**, a été proposé en 1959 par L.R. Ford et S.M. Johnson.

Il a longtemps été l’un des algorithmes de tri les plus efficaces en **nombre de comparaisons**, particulièrement pour un **petit nombre d’éléments**.

### 🎯 Objectif :

Minimiser le nombre de **comparaisons nécessaires** pour trier une liste.  
Contrairement à des algorithmes comme **quicksort** ou **mergesort**, Ford-Johnson vise une **complexité en comparaisons plus faible**.

### Idée générale :

1. **Diviser** les éléments en paires, et **trier chaque paire**.  
2. **Conserver les plus grands** dans une liste principale, et **insérer les plus petits** un à un dans cette liste via une **insertion optimisée (recherche binaire)**.  
3. Utiliser la **suite de Jacobsthal** pour déterminer l’ordre d’insertion optimal.

---

## 2/ Étapes de l'algorithme :

### 1/ Création des paires

On divise la liste d’éléments en paires.  
Exemple : `[8, 3, 6, 1, 7]` → paires : `(8, 3)`, `(6, 1)`, et un élément seul `7`.

### 2/ Tri de chaque paire :

Chaque paire est triée localement :
- `(8, 3)` → `(8, 3)`  
- `(6, 1)` → `(6, 1)`  

On conserve :
- **Plus grands** : `[8, 6]` → **liste principale**  
- **Plus petits** : `[3, 1]` → **liste secondaire**

### 3/ Tri de la liste principale

On trie `[8, 6]` → `[6, 8]`.

### 4/ Insertion optimisée :

On insère les éléments de la **liste secondaire** dans un **ordre précis (suite de Jacobsthal)** dans la liste principale, en utilisant **la recherche binaire**.

### 5/ Éléments restants :

Si un élément est seul (ex : `7`), on l’insère ensuite de la même manière.

---

## Suite de Jacobsthal :

La suite est :  
`0, 1, 1, 3, 5, 11, 21, ...`  
Définie par :  
\[
J(n) = J(n-1) + 2×J(n-2)
\]
avec \(J(0)=0\) et \(J(1)=1\).

Elle permet de **définir l’ordre optimal d’insertion** des éléments pour **minimiser les comparaisons**.

---

## Exemple complet :

Soit la liste : `[5, 3, 9, 1, 4]`

1. **Paires** : `(5, 3)`, `(9, 1)` + `4` seul.  
2. **Tri local** : `(5, 3)`, `(9, 1)`.  
   - **Max** : `[5, 9]` → triée → `[5, 9]`  
   - **Min** : `[3, 1]`  
3. **Insertion** :  
   - Insertion de `3` → `[3, 5, 9]`  
   - Insertion de `1` → `[1, 3, 5, 9]`  
4. **Insertion de 4** → `[1, 3, 4, 5, 9]`.

---

## Avantages :

- **Moins de comparaisons** que les autres algorithmes classiques.
- **Optimal pour des petits ensembles** d’éléments.

## Inconvénients :

- **Complexe à implémenter**.
- **Peu adapté aux grandes listes** (lent en pratique).




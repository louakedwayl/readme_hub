# La Notation Polonaise Inversée (RPN)

## Définition :

La notation polonaise inversée (**Reverse Polish Notation**) est une façon d’écrire les expressions mathématiques **sans parenthèses**, en plaçant les opérateurs **après les opérandes**.

> Une **opérande** est une valeur sur laquelle un opérateur agit dans une expression mathématique ou logique.

### Exemples simples :

- Dans `3 + 4` :  
  - `+` est l'opérateur  
  - `3` et `4` sont les opérandes  

- Dans `a * b` :  
  - `*` est l'opérateur  
  - `a` et `b` sont les opérandes  

### Exemple :
- **Expression classique** :  

3 + 4

- **En RPN** :  

3 4 +


---

## Pourquoi l’utiliser ?

- Elle **élimine les ambiguïtés** liées aux parenthèses.  
- Elle est **facile à évaluer avec une pile (stack)**.  
- Très utilisée dans :
- Les calculatrices **HP**  
- Les langages **Forth**, **PostScript**  
- Certaines **machines virtuelles**  

---

## Comment ça fonctionne ?

L’évaluation d’une expression en RPN se fait avec une **pile** :

### Étapes :
1. Lire l'expression de gauche à droite.  
2. Si c'est un **nombre**, on le pousse (`push`) sur la pile.  
3. Si c’est un **opérateur** (`+`, `-`, `*`, `/`), on retire (`pop`) les **deux derniers nombres** de la pile,  
on applique l’opération, puis on pousse le résultat.

---

## Exemple pas à pas :

**Expression RPN** :  

5 1 2 + 4 * + 3 -


**Traduit en infix** :  

5 + ((1 + 2) * 4) - 3


### Évaluation avec une pile :

| Étape | Élément lu | Pile      |
|-------|------------|-----------|
| 1     | 5          | 5         |
| 2     | 1          | 5 1       |
| 3     | 2          | 5 1 2     |
| 4     | +          | 5 3       |
| 5     | 4          | 5 3 4     |
| 6     | *          | 5 12      |
| 7     | +          | 17        |
| 8     | 3          | 17 3      |
| 9     | -          | 14        |

**Résultat final** :  

14


---

## Avantages :

- Pas besoin de gérer la **priorité des opérateurs**.  
- **Facile à implémenter** avec une pile (stack).  
- **Idéal** pour les interpréteurs simples ou les calculatrices.

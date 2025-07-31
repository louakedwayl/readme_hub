# Methods of Passing in langage C
---

En langage C, il existe **deux méthodes principales** de passage de paramètres à une fonction.

---

## 1/ Le passage par valeur

Le passage par valeur consiste à transmettre à la fonction **une copie de la valeur** passée en paramètre.  
Les modifications apportées dans cette fonction **ne modifieront pas** la variable originale.

---

## 2/ Le passage par adresse

Le passage par adresse consiste à transmettre à la fonction **une copie de l’adresse** du pointeur passé en paramètre.  
On pourra alors faire des modifications sur la **zone mémoire pointée** par le pointeur,  
mais **pas** modifier le pointeur lui-même.

---

## 3/ Modifications du pointeur passé en paramètre

Pour pouvoir **modifier un pointeur** passé en paramètre à une fonction,  
on doit passer **un pointeur sur pointeur**.  

Ainsi, on pourra modifier :  
- la zone pointée par le pointeur,  
- **ou le pointeur lui-même**.  

Cela est utile pour changer la valeur d’un pointeur et non seulement la zone sur laquelle il pointe.

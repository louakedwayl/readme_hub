# Dangling Pointer
---

Un **dangling pointer** (ou *pointeur suspendu*) est un pointeur qui pointe  
sur une zone de mémoire qui a été libérée ou n'est plus valide.  

Utiliser un dangling pointer peut entraîner :  
- des comportements indéterminés,  
- des crashs,  
- ou des failles de sécurité.  

---

## Causes communes d'un dangling pointer

### 1/ Libération prématurée de mémoire

La mémoire pointée par un pointeur est libérée (par exemple avec `free` en C  
ou `delete` en C++) mais le pointeur n'est pas réinitialisé à `NULL`  
ou à une autre adresse valide.

---

### 2/ Pointeurs locaux hors de portée

Un pointeur local (comme une variable automatique sur la pile) pointe vers  
une adresse qui n'est plus valide après la fin de la portée de la fonction.

---

### 3/ Ressources libérées par une autre référence

Lorsque plusieurs pointeurs partagent la responsabilité de la même zone de mémoire,  
la libération de cette mémoire par l'un d'eux peut rendre les autres pointeurs invalides.

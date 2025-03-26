                                    virtual 
*************************************************************************************

Le mot-clé virtual en C++ permet d’activer le polymorphisme dynamique, c’est-à-dire que le comportement 
d'une méthode dépend du type réel de l’objet pointé, et non du type du pointeur.

1/ Pourquoi utiliser virtual ? :
--------------------------------

Sans virtual, le liage (appel de fonction) est fait à la compilation (liaison statique).
Avec virtual, le liage est fait à l'exécution (liaison dynamique), ce qui permet de redéfinir 
des comportements dans les classes dérivées.


Chaque objet d’une classe avec des virtual a un pointeur caché vers une table virtuelle (vptr)
Cette vtable contient les adresses des fonctions virtuelles spécifiques à la classe réelle
Au moment du delete, le runtime C++ suit ce vptr pour exécuter le bon destructeur

Destructeur virtuel :
---------------------

    Si une classe est destinée à être héritée, son destructeur doit être virtual.

    Cela garantit que le destructeur de la classe dérivée sera bien appelé,
même si on supprime l’objet via un pointeur vers la classe de base :

AMateria* m = new Ice();
delete m; // appelle ~Ice() puis ~AMateria() si ~AMateria est virtual

    Sans virtual, seul le destructeur de AMateria serait appelé → risque de fuite mémoire.

Fonctionnement interne : vtable et vptr :
-----------------------------------------

    Chaque objet d’une classe contenant au moins une fonction virtuelle possède un pointeur caché (vptr).

    Ce vptr pointe vers une table virtuelle (vtable).

    La vtable contient les adresses des fonctions virtuelles spécifiques à la classe réelle de l'objet.

    Au moment de l’appel d’une fonction virtuelle (y compris delete), 
le runtime suit ce vptr pour exécuter la bonne version de la méthode.

******************************************************************************************

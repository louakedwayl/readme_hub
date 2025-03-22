                                    virtual 
*********************************************************************************************

Le mot-clé virtual en C++ permet d’activer le polymorphisme dynamique, c’est-à-dire que le comportement 
d'une méthode dépend du type réel de l’objet pointé, et non du type du pointeur.

1/ Pourquoi utiliser virtual ? :
--------------------------------

Sans virtual, le liage (appel de fonction) est fait à la compilation (liaison statique).
Avec virtual, le liage est fait à l'exécution (liaison dynamique), ce qui permet de redéfinir 
des comportements dans les classes dérivées.

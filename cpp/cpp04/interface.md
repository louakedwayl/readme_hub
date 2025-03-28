                                                    Interfaces
***************************************************************************************************************

1) C’est quoi une Interface ?
-----------------------------

En C++, il n’existe pas officiellement d’interface comme en Java ou C#.
Mais on peut créer une interface en utilisant une classe abstraite.

Une classe abstraite = classe qui contient au moins une fonction virtuelle pure.

Une interface = classe abstraite qui ne contient que des fonctions virtuelles pures.

But :
C’est un contrat qui dit :

« Toute classe qui hérite de moi doit obligatoirement implémenter ces fonctions. »

2) Comment déclarer une interface ?
-----------------------------------

Syntaxe :
---------

class IAnimal {
public:
    virtual void crier() const = 0; // fonction virtuelle pure
    virtual ~IAnimal() = default;   // destructeur virtuel obligatoire
};

3) Pourquoi un destructeur virtuel ?
------------------------------------

Quand tu supprimes un objet via un pointeur sur l’interface, 
sans destructeur virtuel → comportement imprévisible (fuite mémoire, pas d’appel au bon destructeur).

Toujours mettre un destructeur virtuel dans une interface.

**************************************************************************************************************

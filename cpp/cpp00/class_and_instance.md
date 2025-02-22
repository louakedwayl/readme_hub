           				     class and instance
********************************************************************************************************

1/ Introduction aux classes et instances :
------------------------------------------

	En C++, une classe est un modèle qui définit les attributs et les méthodes d'un objet. Une instance est un objet créé à partir de cette classe.

On peut l'assimiler à un plan de construction qui spécifie :

    Les attributs (ou données membres) : variables qui décrivent l'état de l'objet.
    Les méthodes (ou fonctions membres) : fonctions qui définissent les comportements ou opérations réalisables sur l'objet.

Modificateurs d'accès :
-----------------------

    public : membres accessibles depuis n'importe où.
    private : membres accessibles uniquement depuis l'intérieur de la classe.
    protected : accessible dans la classe et dans ses classes dérivées.

Dans une classe, les attributs et méthodes sont private par défaut, tandis que dans une struct, ils sontpublic par défaut.

2/ Définition d'une classe :
----------------------------

	Une classe se définit à l'aide du mot-clé class, suivi de son nom et d'un bloc de définition 
entre {}. Elle peut etre definie dans un fichier header ou directement dans un fichier source C++.

	Voici un exemple de classe Warrior :
	------------------------------------

class Warrior 
{
private:
    std::string name;
    int pv;
    int mana;
};

4/ Creation d'une instance :
----------------------------

Pour créer une instance, il suffit d'utiliser le nom de la classe comme type :

NomDeLaClasse monObjet; // Appelle le constructeur par défaut

// Ou avec des arguments si la classe définit un constructeur paramétré :

NomDeLaClasse autreObjet(arg1, arg2);

Chaque objet (instance) possède ses propres copies des attributs définis dans la classe, ce qui 
permet de manipuler des données indépendamment pour chaque instance.

Exemple : creation d'une instance Warrior :
-------------------------------------------

Warrior w0;

********************************************************************************************************

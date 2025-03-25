                                                Classe abstraite
*******************************************************************************************************************

Définition :
------------

Une classe abstraite est une classe qui ne peut pas être instanciée directement.
Elle sert à modéliser un comportement commun pour d'autres classes, mais elle laisse certains détails à définir 
dans les sous-classes.

En C++, une classe devient abstraite dès qu’elle contient au moins une méthode virtuelle pure.

Elle peut contenir :
--------------------
                        
                        des méthodes abstraites (sans implémentation),

                        des méthodes concrètes (avec du code),

                        des attributs comme une classe normale.

⚠️ Elle est utilisée pour définir un comportement générique, que ses sous-classes devront compléter ou spécialiser.

Exemple de methode virtuelle pure:
----------------------------------

virtual void makeSound() = 0;

En C++, une méthode virtuelle pure (pure virtual function) est une méthode déclarée dans une classe mais sans implémentation, et elle est égale à 0 (= 0), ce qui indique au compilateur que les classes dérivées devront obligatoirement l’implémenter.


Exemple de classe abstraite :
-----------------------------

class Animal 
{
public:
    virtual void makeSound() = 0; // méthode virtuelle pure
};


**********************************************************************************************************************

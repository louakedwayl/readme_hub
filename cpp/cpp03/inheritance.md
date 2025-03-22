                                                            inheritance
*****************************************************************************************************************

L’héritage en C++ permet à une classe (dite classe dérivée ou fille) d’hériter des attributs et méthodes 
d’une autre classe (dite classe de base ou mère). Cela favorise la réutilisation du code et permet 
d’appliquer le principe de hiérarchie.

1/ Syntaxe de base :
--------------------

class ClasseDeBase {
public:
    void direBonjour() {
        std::cout << "Bonjour depuis la classe de base !" << std::endl;
    }
};

class ClasseDerivee : public ClasseDeBase {
    // ClasseDerivee hérite de ClasseDeBase
};


Remarque :
----------

public ici signifie que les membres public et protected de la classe de base resteront public et protected 
dans la classe dérivée.

Il existe aussi protected et private comme types d’héritage.

2/ 🧬 Types d’héritage :
------------------------

--------------------------------------------------------------------------
|Type	  |Membres public	       |Membres protected	|Membres private |
|-------------------------------------------------------------------------
|public	  |restent public	       |restent protected	|inaccessible    |
|protected|deviennent protected    |restent protected	|inaccessible    |
|private  |deviennent private      |deviennent private	|inaccessible    |
-------------------------------------------------------------------------

3/ Héritage simple :
--------------------

class Animal {
public:
    void parler() {
        std::cout << "Je suis un animal." << std::endl;
    }
};

class Chien : public Animal {
public:
    void aboyer() {
        std::cout << "Wouf!" << std::endl;
    }
};


Chien monChien;
monChien.parler();  // Hérité
monChien.aboyer();  // Propre à Chien

4/ Surcharge et Redéfinition (Override) :
-----------------------------------------

On peux redéfinir une méthode de la classe de base dans la classe dérivée :

class Animal 
{
public:
    virtual void parler() {
        std::cout << "Je suis un animal." << std::endl;
    }
};

class Chat : public Animal 
{
public:
    void parler() override {
        std::cout << "Miaou" << std::endl;
    }
};

5/Constructeurs et héritage :
-----------------------------

Le constructeur de la classe de base est appelé automatiquement avant celui de la dérivée :

class Animal 
{
public:
    Animal() {
        std::cout << "Constructeur Animal" << std::endl;
    }
};

class Chien : public Animal 
{
public:
    Chien() {
        std::cout << "Constructeur Chien" << std::endl;
    }
};

6/ Mots-clés utiles :
---------------------

virtual : permet la redéfinition dynamique (polymorphisme)

override : sécurise le fait de redéfinir une méthode virtuelle

protected : permet à la classe fille d'accéder aux membres de la classe mère

super : n'existe pas en C++, mais tu peux appeler les méthodes de la classe mère avec ClasseDeBase::methode()

*******************************************************************************************************************

                                                    initialization list
***************************************************************************************************************************

1/ Introduction :
-----------------

    En C++, une liste d'initialisation dans un constructeur permet d'initialiser directement les membres d'une classe 
avant l'exécution du corps du constructeur. Cette méthode est plus efficace que l'affectation classique 
dans le corps du constructeur, surtout pour les constantes, les références et les objets complexes.

2/ Syntaxe des Listes d'Initialisation :
----------------------------------------

    Une liste d'initialisation se place après la signature du constructeur, séparée par :.

class Exemple 
{
private:
    int a;
    double b;
public:
    Exemple(int x, double y) : a{x}, b{y} { // Liste d'initialisation
        std::cout << "Constructeur appelé !" << std::endl;
    }
};

Dans cet exemple, a est initialisé avec x et b avec y avant l'exécution du corps du constructeur.

3/ Pourquoi utiliser une Liste d'Initialisation ? :
---------------------------------------------------

a) Amélioration des Performances :
----------------------------------

    Sans liste d'initialisation, les membres sont d'abord initialisés par défaut avant d'être réaffectés 
dans le corps du constructeur, ce qui entraîne un double travail inutile.

Exemple :
---------

class MauvaisExemple 
{
private:
    int a;
public:
    MauvaisExemple(int x) {
        a = x; // Affectation après une initialisation par défaut
    }
};

Avec une liste d'initialisation, a est directement initialisé avec x, ce qui évite une étape supplémentaire.

class BonExemple 
{
private:
    int a;
public:
    BonExemple(int x) : a{x} {}
};

b) Initialisation des Constantes et des Références :
----------------------------------------------------

    Les membres const et les références doivent obligatoirement être initialisés dans une liste d'initialisation, 
car ils ne peuvent pas être modifiés après leur déclaration.

class ExempleConstRef 
{
private:
    const int c;
    int& ref;
public:
    ExempleConstRef(int x, int& y) : c{x}, ref{y} {}
};

**************************************************************************************************************************











































*************************************************************************************************************************

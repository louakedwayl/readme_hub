					        constructor
********************************************************************************************************

1. Introduction :
-----------------

En C++, les constructeurs sont des fonctions membres spéciales qui permettent 
de gérer la création des objets d'une classe.

Il est appelé automatiquement lors de la création d'un objet. Sa mission principale 
est d'initialiser les attributs de l'objet.

2/ Constructeur non definit :
----------------------------

Si aucun constructeur est definit dans une classe, le compilateur génère automatiquement un constructeur par défaut. Ce constructeur par défaut sera très simple : il ne fait rien de spécial, sauf initialiser les membres de données avec des valeurs par défaut (comme 0 pour les types numériques, ou un constructeur par défaut pour les objets).

Par exemple, si tu as cette classe sans définir de constructeur :

class Warrior 
{
private:
    std::string name;
    int pv;
    int mana;
};

Le compilateur va générer en arrière-plan un constructeur par défaut similaire à ceci :

Warrior() : name(""), pv(0), mana(0) {}

	Cela veut dire que si tu crées un objet sans lui fournir de valeurs spécifiques 
(c'est-à-dire sans utiliser de constructeur paramétré), le compilateur va "automatiquement" 
attribuer des valeurs par défaut à ses membres.

Exemple :
---------

Warrior w1;

Ici, le constructeur par défaut que le compilateur génère va initialiser w1 avec un nom vide, des pointsde vie à 0, et du mana à 0.

3/ Constructeur par default :
----------------------------

	Si au moins un constructeur est definit dans une classe , le compilateur ne génère plus 
de constructeur automatique.

	Un constructeur par défaut est un constructeur spécial d'une classe en C++ qui ne prend 
aucun argument ou dont tous les arguments ont des valeurs par défaut. Il est appelé automatiquement 
lorsque tu crées un objet de cette classe sans fournir d'arguments.

Pourquoi utiliser un constructeur par défaut ? :
------------------------------------------------

	Un constructeur par défaut est utile lorsqu'on souhaite initialiser un objet avec 
des valeurs par défaut ou faire certaines initialisations sans avoir besoin de passer des paramètres 
à chaque fois que l'on crée l'objet.

Exemple de constructeur par défaut:
-----------------------------------

Voici un exemple de la façon dont tu peux définir un constructeur par défaut dans une classe :

class Warrior 
{
private:
    std::string name;
    int pv;
    int mana;

public:
    // Constructeur par défaut
    Warrior() : name("Unknown"), pv(100), mana(50) {
        std::cout << "Constructeur par défaut de Warrior appelé" << std::endl;
    }
};


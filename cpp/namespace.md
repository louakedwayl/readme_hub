					Namespace
***************************************************************************************************

	En C++, un namespace est un espace de noms qui permet d'organiser le code et d'eviter les
conflits de noms entre differentes parties d'un programme, Un namespace peut contenir des variables, 
des fonctions, des classes et d'autres éléments du programme.

1/ Déclaration d'un Namespace :
-------------------------------

namespace Nom 
{
	int	value = 0;
}


2/ Accéder au Namespace :
-------------------------

    On peut accéder à un Namespace grâce à l'opérateur :: (Scope Resolution Operator).
Dans un programme, plusieurs espaces de noms peuvent exister, et :: est utilisé pour accéder aux 
éléments d'un namespace spécifique.

Exemple :
---------

printf ("value -> %d", nom::value)


3/ Namespace anonyme (Unnamed namespace) :
------------------------------------------

Un namespace sans nom (namespace {}) en C++ fonctionne comme une fonction static :

    Tout ce qui est défini dedans est limité au fichier source.
C'est une alternative moderne à static pour encapsuler des variables et fonctions internes.

Exemple :
---------

namespace
{
    int value = 0; // Variable uniquement accessible dans ce fichier source
}

// `value` ne sera pas accessible depuis un autre fichier source.

*****************************************************************************************************

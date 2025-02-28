				inline
********************************************************************************

1/ Introduction :
-----------------

Le mot-clé inline est utilisé en C++ pour suggérer au compilateur d’insérer le code 
de la fonction directement à l’endroit où elle est appelée, plutôt que de procéder 
à un appel de fonction classique. Cela permet, en théorie, d’éliminer le surcoût lié 
à l’appel de fonction, notamment pour des fonctions courtes et fréquemment utilisées.

2. Objectifs et fonctionnement :
-------------------------------

    Optimisation :L’objectif principal de l’inline est de réduire l’overhead (la surcharge) 
		  d’un appel de fonction en évitant la mise en place d’un appel traditionnel 
		  (push/pop de la pile, sauts d’instructions, etc.). Ceci est particulièrement 
		  utile pour les fonctions de petite taille qui sont appelées de nombreuses fois.

    Suggestion au compilateur :Il est important de noter que inline n’est qu’une suggestion. 
			       Les compilateurs modernes, dotés d’optimisations avancées, décident 
			       souvent eux-mêmes d’inline ou non une fonction, indépendamment de la 
			       présence du mot-clé.

    Définitions dans les fichiers d’en-tête :L’inline permet également de définir des fonctions dans 
					     des fichiers d’en-tête (.h) sans violer la règle d’unicité 					     de la définition, car le compilateur gère ces fonctions de 					     manière à éviter les erreurs de redéfinition lors de l’édit					     ion des liens.
3. Syntaxe et exemples:
------------------------

Déclaration d’une fonction inline :
-----------------------------------

Pour déclarer une fonction inline, il suffit de placer le mot-clé inline devant la 
définition de la fonction :

#include <iostream>

using namespace std;

// Définition d'une fonction inline qui calcule le carré d'un nombre
inline int carre(int x) 
{
    return x * x;
}

int main() 
{
    int nombre = 5;
    cout << "Le carré de " << nombre << " est : " << carre(nombre) << endl;
    return 0;
}

Dans cet exemple, le compilateur est invité à remplacer l’appel de carre(nombre) par le 
code de la fonction, éliminant ainsi l’overhead d’un appel de fonction classique.

! : Pas besoin d'inline pour les fonctions membres dans une classe dans un header.

3/ Conclusion :
---------------

Si une fonction est définie dans un header en dehors d’une classe, elle doit être 
précédée de inline pour éviter les erreurs de linkage.
Si une fonction est définie à l’intérieur d’une classe, elle est automatiquement inline, 
donc il n’est pas nécessaire d’ajouter inline.

***************************************************************************************************

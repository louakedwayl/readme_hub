				   fonction amies
******************************************************************************************

Introduction :
--------------

En C++, une fonction amie (friend function) est une fonction qui n'appartient pas 
à une classe mais qui a un accès privilégié aux membres privés et protégés de cette classe. 
Elles sont particulièrement utiles lorsque l'on souhaite qu'une fonction externe puisse 
manipuler directement les données privées d'une classe sans passer par des accesseurs.

Déclaration et Utilisation :
----------------------------

Une fonction amie est déclarée à l'intérieur de la classe avec le mot-clé friend, 
mais elle est définie à l'extérieur de la classe.

Syntaxe de base :
-----------------

La classe MaClasse contient un membre privé valeur.

La fonction afficherValeur est déclarée comme amie de la classe.

Comme c'est une fonction amie, elle peut accéder directement à valeur même s'il est private.

Fonctions Amies et Opérateurs :
-------------------------------

Les fonctions amies sont souvent utilisées pour surcharger les opérateurs lorsque la fonction 
ne fait pas partie de la classe.

Exemple : Surcharge de l'opérateur << :
---------------------------------------

L'opérateur << est défini en dehors de la classe mais a besoin d'accéder aux membres privés.

Il est déclaré comme friend pour qu'il puisse lire x et y.


+-------------------+-----------------------------------------+-----------------------------------------+                  |         Fonction Membre                 |         Fonction Amie                   |
+-------------------+-----------------------------------------+-----------------------------------------+
| Définition       | Déclarée dans la classe                 | Déclarée en dehors de la classe        |
| Accès aux       | Accède directement aux membres privés    | Accède aux membres privés via "friend" |
| membres privés  | et protégés de la classe                 |                                        |
| Syntaxe         | Appel via objet : obj.methode()          |                                        |
-------------------------------------------------------------------------------------------------------


**********************************************************************************

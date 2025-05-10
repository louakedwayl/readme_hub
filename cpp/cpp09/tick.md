            Tick
**************************************************************

Un tick de processeur (ou "horloge" du processeur) est une unité de temps très courte correspondant 
à un cycle d’horloge du CPU, c'est le temps minimal entre deux action successives dans un cpu 

Explication simple :
--------------------

Le processeur fonctionne comme une montre très rapide qui bat à un rythme constant,
par exemple 3 GHz (gigahertz), ce qui signifie :

    3 GHz = 3 000 000 000 ticks par seconde

Chaque tick permet au processeur de faire une ou plusieurs petites opérations (selon l'architecture).

Exemple :
---------

    Si ton processeur tourne à 2.5 GHz, cela veut dire :

        Il y a 2.5 milliards de ticks par seconde.

        Une opération qui prend 500 000 000 ticks dure environ 0.2 seconde.

Utilité d’un tick :
-------------------

    En programmation bas-niveau (comme avec clock() en C), les ticks servent à mesurer le temps d’exécution 
d’un programme ou d’un algorithme.

    Ils permettent aussi d’évaluer les performances d’un code ou d’un système.

*******************************************************************************************

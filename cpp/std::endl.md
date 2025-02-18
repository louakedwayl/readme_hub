						std::endl
*******************************************************************************************************

Introduction :
--------------

std::endl (end line) est un manipulateur de flux utilisé avec std::cout pour insérer un retour à la ligne et vider le tampon de sortie (flush).

std::endl fait deux opérations importantes lorsqu'il est utilisé avec un flux (comme std::cout) :

    1/ Insertion d'un saut de ligne : Il insère le caractère de nouvelle ligne ('\n') dans le flux.

    2/ Vidage du tampon de sortie : Il force le flush du tampon, c'est-à-dire que le contenu 
du tampon est immédiatement écrit sur le support de sortie (console, fichier, etc.).

Exemple d'utilisation :
-----------------------

std::cout << "Hello while" << std::endl;

Différence entre std::endl et '\n':
-----------------------------------

    '\n' : C'est simplement un caractère de nouvelle ligne. L'utilisation de '\n' dans un flux, comme 
dans std::cout << "Bonjour\n";, ajoute un saut de ligne mais ne force pas le vidage du tampon.

    std::endl : Comme expliqué, il insère un saut de ligne et vide le tampon de sortie.

*******************************************************************************************************

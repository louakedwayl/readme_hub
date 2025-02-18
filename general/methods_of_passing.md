						Methods of Passing in langage C
***********************************************************************************

	En langage C il y a deux methodes de passage de parametre a une fonction.

1/ Le passage par valeur :
--------------------------

	Le passage par valeurs consiste a transmetre a la fonction une copie de la valeur
passe en parametre . Les modifications apportes dans cette fonction ne modifieras pas
la variable originel.

2/ Le passage par adresse :
---------------------------

	Le passage par adresse consiste a transmetre a la fonction qui copie de l adresse
du pointeur transmis en parametre. On pourras alors faire des modifications sur la
zone memoire pointe par le pointeur mais pas faire de modifications sur le pointeur
lui meme.

3/ Modifications du pointeur passe en parametre :
-------------------------------------------------

	Pour pouvoir modifier un pointeur passe en parametre a une fonction on doit faire
passer un pointeur sur pointeur.
A ce moment la on pourras modifier la zone pointe par le pointeur soit le pointeur
lui meme . Cela est utile pour modifier la valeur d un pointeur et non pas la zone sur
laquelle pointe ce pointeur

***********************************************************************************

				Generic pointer
****************************************************************************************

	Un pointeur générique en C est généralement un pointeur de type void*.
Il peut stocker l'adresse de n'importe quel type de donnée.

	Étant donné qu'un pointeur générique ne contient aucune information sur 
le type de données auquel il pointe, il est impossible de le déférencer directement.
Pour l'utiliser, il faut le convertir explicitement (cast) vers le type approprié. 

int x = 42;
void* p = &x;
int y = *(int*)p;  // Conversion explicite en int*

*****************************************************************************************

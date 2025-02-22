						 insertion and extraction operator
**************************************************************************************************************************

🔗 Voir flux : https://github.com/louakedwayl/readme_hub
--------------

	En C++, la gestion des entrées/sorties est facilitée grâce à des flux (streams). Les deux opérateurs fondamentaux 
qui permettent de travailler avec ces flux sont :

1/ L'opérateur d'insertion (<<) :
---------------------------------

	Il permet d'envoyer (ou d'insérer) des données dans un flux de sortie, comme std::cout.

Exemple :  
---------

int main() 
{
    std::cout << "Bonjour, utilisateur !" << std::endl;
    return 0;
}

2/ L'opérateur d'extraction (>>) :
----------------------------------

	Il permet de lire (ou d'extraire) des données depuis un flux d'entrée, comme std::cin.

Exemple :
---------

int main() 
{
    int age;
    std::cout << "Entrez votre âge : ";
    std::cin >> age;
    std::cout << "Vous avez " << age << " ans." << std::endl;
    return 0;   
}

3/ Remarque :
-------------

Ces opérateurs peuvent aussi être redéfinis pour travailler avec des objets personnalisés (surcharge d'opérateurs).

**************************************************************************************************************************

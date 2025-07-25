# Déclaration anticipée

Une **déclaration anticipée** permet d’annoncer l’existence d’une classe, d’une structure ou d’une fonction 
**avant sa définition complète**.  
C’est une promesse faite au compilateur : « cette chose existe, je te dirai plus tard ce qu’elle contient. »

---

## Syntaxe :

```cpp
class MaClasse; // Déclaration anticipée
```

Cela indique simplement : "Il y a une classe appelée MaClasse, mais je ne donne pas encore les détails."
Pourquoi utiliser une déclaration anticipée ?

1. Pour éviter les inclusions inutiles (et réduire les dépendances)

Tu n’as pas besoin d’inclure un fichier complet (#include) si tu n’utilises que des pointeurs
ou des références à cette classe.

2. Pour accélérer la compilation

Moins de #include = moins de texte à analyser pour le compilateur = compilation plus rapide, surtout dans les gros projets.

3. Pour résoudre les dépendances circulaires :

```cpp
// A.hpp
class B; // Déclaration anticipée

class A {
    B* objetB;
};

// B.hpp
class A; // Déclaration anticipée

class B {
    A* objetA;
};
```

Sans ces déclarations anticipées, tu ne pourrais pas compiler ces deux classes, car chacune aurait
besoin de connaître l’autre avant même d’être définie.

## Quand utiliser une déclaration anticipée ?

| Utilisation                                    | Déclaration anticipée suffisante ? | Inclure le fichier nécessaire ? |
|-----------------------------------------------|-----------------------------------|--------------------------------|
| Utiliser un **pointeur** ou une **référence** (`Classe*`, `Classe&`) | ✅ Oui                            | ❌ Non                         |
| **Définir un objet** (`Classe objet;`)         | ❌ Non                           | ✅ Oui                         |
| **Accéder aux membres ou méthodes** de la classe | ❌ Non                           | ✅ Oui                         |


### Exemple pratique :

Cas 1 : Déclaration anticipée suffisante :

```cpp
// Fichier Dog.hpp
class Brain; // Déclaration anticipée

class Dog {
private:
    Brain* _brain; // OK, on n’a pas besoin de savoir ce qu’est Brain ici
};
```
### Cas 2 : Déclaration anticipée insuffisante :

```cpp
// Fichier Dog.cpp
#include "Brain.hpp" // Nécessaire ici pour utiliser la classe Brain

void Dog::faireQuelqueChoseAvecBrain() {
    _brain->penser(); // Il faut connaître le contenu de Brain
}
```

### Conclusion :

Si tu déclares juste un pointeur ou une référence vers une classe :
→ Une déclaration anticipée (class MaClasse;) suffit.

Si tu veux utiliser les méthodes, membres, ou instancier un objet de cette classe :
→ Il faut faire un #include "MaClasse.hpp" pour avoir la définition complète.
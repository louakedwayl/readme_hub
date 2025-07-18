# `std::endl`

## Introduction :
--------------

`std::endl` (*end line*) est un manipulateur de flux utilisé avec `std::cout` pour insérer un retour à la ligne **et** vider le tampon de sortie (*flush*).

`std::endl` effectue deux opérations importantes lorsqu'il est utilisé avec un flux (comme `std::cout`) :

1. **Insertion d'un saut de ligne** : Il insère le caractère de nouvelle ligne (`'\n'`) dans le flux.  
2. **Vidage du tampon de sortie** : Il force le **flush** du tampon, c'est-à-dire que le contenu 
   du tampon est immédiatement écrit sur le support de sortie (console, fichier, etc.).

---

## Exemple d'utilisation :
-----------------------

```cpp
std::cout << "Hello while" << std::endl;
```
Différence entre std::endl et '\n' :
```cpp
'\n' :
```
C'est simplement un caractère de nouvelle ligne.
Exemple :
```cpp
std::cout << "Bonjour\n";
```
Cela ajoute un saut de ligne mais ne force pas le vidage du tampon.
```cpp
std::endl :
```
Comme expliqué, il insère un saut de ligne et vide le tampon de sortie, ce qui peut être utile pour s'assurer que les données sont bien affichées immédiatement (notamment lors du débogage ou dans les programmes interactifs).

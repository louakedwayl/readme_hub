# Les conversions de type en Python

## Définition

En Python, un **cast** est appelé plus précisément une **conversion de type**.

Cela consiste à transformer une valeur d’un type vers un autre type.

Exemple :

```python
x = "42"
y = int(x)

Ici :

x est une chaîne de caractères (str)
y devient un entier (int)
Pourquoi convertir ?

On convertit une valeur quand son type ne correspond pas à ce qu’on veut faire.

Par exemple :

faire un calcul avec un nombre écrit sous forme de texte,
transformer un nombre en texte pour l’afficher,
convertir un entier en nombre décimal.
Les conversions les plus courantes
int()

int() sert à convertir une valeur en entier.

x = "42"
y = int(x)

print(y)
print(type(y))

Résultat :

42
<class 'int'>
float()

float() sert à convertir une valeur en nombre à virgule.

x = "3.14"
y = float(x)

print(y)
print(type(y))

Résultat :

3.14
<class 'float'>
str()

str() sert à convertir une valeur en texte.

x = 42
y = str(x)

print(y)
print(type(y))

Résultat :

42
<class 'str'>
bool()

bool() sert à convertir une valeur en booléen : True ou False.

print(bool(1))
print(bool(0))
print(bool("bonjour"))
print(bool(""))

Résultat :

True
False
True
False

En général :

une valeur “vide” donne souvent False
une valeur “non vide” donne souvent True
Conversions simples
De str vers int
age = "21"
age_int = int(age)
De str vers float
prix = "19.99"
prix_float = float(prix)
De int vers str
n = 10
texte = str(n)
De int vers float
n = 10
f = float(n)

Résultat :

10.0
De float vers int
x = 3.9
y = int(x)
print(y)

Résultat :

3

Attention : int() ne fait pas un arrondi.
Il enlève simplement la partie décimale.

Point important

Toutes les conversions ne sont pas possibles.

Exemple :

int("bonjour")

Cela provoque une erreur, car "bonjour" ne représente pas un nombre.

De la même façon :

float("abc")

provoque aussi une erreur.

Exemple avec les arguments Python

Quand on récupère une valeur avec sys.argv, elle arrive sous forme de texte.

import sys

print(sys.argv[1])
print(type(sys.argv[1]))

Si on lance :

python3 test.py 42

alors sys.argv[1] vaut "42".

Si on veut l’utiliser comme un nombre :

import sys

n = int(sys.argv[1])
print(n + 1)

Ici, int() convertit l’argument en entier.

Différence entre Python et le C

En C, on parle souvent de cast.

En Python, on parle plutôt de conversion de type, car on utilise des fonctions comme :

int()
float()
str()
bool()

Donc l’idée est proche du cast, mais en Python on écrit la conversion avec des fonctions.

Résumé

Une conversion de type permet de transformer une valeur en un autre type.

Les conversions les plus utilisées sont :

int()
float()
str()
bool()

Exemples :

int("42")      # 42
float("3.14")  # 3.14
str(42)        # "42"
bool(0)        # False

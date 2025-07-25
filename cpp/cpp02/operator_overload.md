# Surcharge d'Opérateur


## 1/ Introduction :

En C++, la **surcharge d'opérateurs** permet de redéfinir le comportement des opérateurs 
pour les types définis par l'utilisateur (classes et structures).  

Cela permet d'améliorer la lisibilité et la manipulation des objets comme 
s'ils étaient des types natifs.

---

## 2/ Opérateurs qui Peuvent Être Surchargés :

Tous les opérateurs arithmétiques, relationnels, d'affectation et de manipulation 
de bits peuvent être surchargés en C++.  

### Opérateurs Arithmétiques :
- `+` (addition)  
- `-` (soustraction)  
- `*` (multiplication)  
- `/` (division)  
- `%` (modulo)  

### Opérateurs Relationnels :
- `==` (égalité)  
- `!=` (différence)  
- `<` (inférieur)  
- `>` (supérieur)  
- `<=` (inférieur ou égal)  
- `>=` (supérieur ou égal)  

### Opérateurs Logiques :
- `&&` (ET logique)  
- `||` (OU logique)  
- `!` (NON logique)  

### Opérateurs d'Affectation :
- `=` (affectation)  
- `+=` (addition et affectation)  
- `-=` (soustraction et affectation)  
- `*=` (multiplication et affectation)  
- `/=` (division et affectation)  
- `%=` (modulo et affectation)  

### Opérateurs de Manipulation de Bits :
- `&` (ET bit-à-bit)  
- `|` (OU bit-à-bit)  
- `^` (OU exclusif bit-à-bit)  
- `<<` (décalage à gauche)  
- `>>` (décalage à droite)  
- `&=` (ET bit-à-bit et affectation)  
- `|=` (OU bit-à-bit et affectation)  
- `^=` (OU exclusif bit-à-bit et affectation)  
- `<<=` (décalage à gauche et affectation)  
- `>>=` (décalage à droite et affectation)  

### Opérateurs d'Incrémentation et de Décrémentation :
- `++` (incrémentation préfixe et suffixe)  
- `--` (décrémentation préfixe et suffixe)  

### Opérateurs de Conversion :
- Surcharge des conversions implicites en utilisant `operator Type()`.

### Opérateurs de Pointeurs :
- `*` (déréférencement d'un pointeur)  
- `->` (accès aux membres d'un objet via un pointeur)  

### Opérateurs de Flux :
- `<<` (flux de sortie, utilisé avec `std::cout`)  
- `>>` (flux d'entrée, utilisé avec `std::cin`)  

---

### Opérateurs qui **Ne Peuvent Pas** Être Surchargés :
- `.` (accès direct aux membres)  
- `::` (résolution de portée)  
- `sizeof` (taille d'un type ou d'un objet)  
- `?:` (opérateur ternaire)  
- `typeid` (RTTI)  

---

## 3/ Syntaxe Générale :

La surcharge d'un opérateur s'effectue en définissant une **fonction membre** 
ou une **fonction amie** avec le mot-clé `operator` suivi de l'opérateur à surcharger.

### Déclaration dans une classe :

```cpp
class ClasseExemple 
{
public:
    ClasseExemple operator+(const ClasseExemple& autre) const; // Surcharge de l'opérateur +
};
```
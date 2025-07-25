# Héritage en diamant

L’**héritage en diamant** (ou *diamond problem*) est une situation qui survient dans un langage 
qui permet l’héritage multiple, comme C++.

Cela se produit lorsqu’une classe dérivée hérite de deux classes de base, qui elles-mêmes 
héritent d’une même classe parente.  
Cela forme une structure en forme de diamant, d’où le nom.

---

## Schéma de l’héritage en diamant :

A

/
B C
\ /
D


- La **classe A** est la classe de base.  
- Les **classes B et C** héritent de A.  
- La **classe D** hérite à la fois de B et C.  

La classe la plus dérivée est celle tout en bas (**D**).  
Lorsqu’on crée une instance de D, **elle contient une instance de chaque classe de la hiérarchie**.

---

## 1/ Problèmes causés :

Le problème, c’est que la classe **D hérite deux fois de la classe A** :  
- une fois via **B**  
- une autre fois via **C**  

Cela peut créer des **ambiguïtés**, par exemple :

```cpp
class A 
{
public:
    void sayHello() { std::cout << "Hello from A" << std::endl; }
};

class B : public A {};
class C : public A {};
class D : public B, public C {};

int main() {
    D obj;
    obj.sayHello(); // Ambiguïté : quelle version de A ?
}
```
Erreur : Le compilateur ne sait pas s’il doit utiliser A via B ou A via C.

## 2/ Solution : l’héritage virtuel

En C++, on peut résoudre le problème avec l’héritage virtuel.
Cela indique au compilateur de ne créer qu’une seule instance de A, même si elle est héritée plusieurs fois.

```cpp
class A {
public:
    void sayHello() { std::cout << "Hello from A" << std::endl; }
};

class B : virtual public A {};
class C : virtual public A {};
class D : public B, public C {};

int main() {
    D obj;
    obj.sayHello(); // ✅ OK ! Une seule instance de A
}
```
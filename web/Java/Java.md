# 🧠 Introduction au langage Java

## 📍 Objectifs du cours
- Comprendre les bases du langage Java  
- Savoir compiler et exécuter un programme Java  
- Découvrir les concepts fondamentaux : classes, objets, variables, types et méthodes  

---

## 🚀 Qu’est-ce que Java ?

Java est un **langage de programmation orienté objet**, créé par **James Gosling** chez **Sun Microsystems** en 1995 (aujourd’hui détenu par Oracle).  
C’est l’un des langages les plus utilisés au monde, notamment pour les applications d’entreprise, Android, et les systèmes embarqués.

### ✅ Les points forts de Java :
- **Portabilité** : “Write once, run anywhere” (écris une fois, exécute partout)  
- **Sécurité** : le code s’exécute dans une machine virtuelle (JVM)  
- **Orienté objet** : tout est basé sur des classes et objets  
- **Grande communauté** et **nombreuses bibliothèques** disponibles  

---

## ⚙️ L’environnement Java

### Les composants principaux :
1. **JDK (Java Development Kit)** : contient les outils pour développer (javac, java, etc.)
2. **JRE (Java Runtime Environment)** : permet d’exécuter un programme Java
3. **JVM (Java Virtual Machine)** : exécute le bytecode produit par le compilateur

---

## 🧩 Premier programme Java

### Exemple : `HelloWorld.java`

```java
public class HelloWorld {
    public static void main(String[] args) {
        System.out.println("Bonjour, monde !");
    }
}
```

### Explication :
- `public class HelloWorld` → définit une **classe publique** nommée `HelloWorld`
- `public static void main(String[] args)` → méthode principale, point d’entrée du programme
- `System.out.println(...)` → affiche du texte dans la console

---

## 🏗️ Compilation et exécution

### Étapes :
1. **Compilation** → transforme le code source `.java` en bytecode `.class`
   ```bash
   javac HelloWorld.java
   ```
2. **Exécution** → lance le bytecode dans la JVM
   ```bash
   java HelloWorld
   ```

---

## 📦 Les bases du langage

### 🧮 Les types de données

| Type        | Exemple | Description                  |
|--------------|----------|------------------------------|
| `int`        | 42       | entier                       |
| `double`     | 3.14     | nombre à virgule flottante    |
| `boolean`    | true     | valeur booléenne              |
| `char`       | 'A'      | caractère unique              |
| `String`     | "Hello"  | chaîne de caractères          |

---

### 🔤 Variables

```java
int age = 25;
String nom = "Alice";
boolean majeur = true;
```

- Une variable doit être **déclarée avec un type** avant utilisation.  
- Java est **fortement typé** : on ne peut pas changer le type d’une variable.

---

### 🧠 Structures de contrôle

#### Condition
```java
if (age >= 18) {
    System.out.println("Majeur");
} else {
    System.out.println("Mineur");
}
```

#### Boucles
```java
for (int i = 0; i < 5; i++) {
    System.out.println(i);
}
```

```java
while (condition) {
    // instructions
}
```

---

## 🧱 Programmation orientée objet (POO)

### Exemple simple

```java
public class Personne {
    // attributs
    String nom;
    int age;

    // constructeur
    public Personne(String nom, int age) {
        this.nom = nom;
        this.age = age;
    }

    // méthode
    public void sePresenter() {
        System.out.println("Je m'appelle " + nom + " et j'ai " + age + " ans.");
    }

    public static void main(String[] args) {
        Personne p = new Personne("Alice", 25);
        p.sePresenter();
    }
}
```

### Concepts clés :
- **Classe** : modèle ou plan d’un objet  
- **Objet** : instance d’une classe  
- **Attributs** : variables associées à la classe  
- **Méthodes** : fonctions associées à la classe  

---

## 🧰 Quelques notions avancées (aperçu)
- **Encapsulation** → protéger les données avec des accesseurs (`get` / `set`)
- **Héritage** → une classe peut hériter d’une autre (`extends`)
- **Polymorphisme** → une même méthode peut se comporter différemment selon l’objet
- **Interfaces** → définissent des comportements que des classes peuvent implémenter

---

## 📚 Conclusion

Java reste un langage :
- **Solide**, **polyvalent** et **pérenne**
- Utilisé dans le **back-end**, **Android**, **big data**, **finance**, etc.
- Excellente base pour apprendre la **programmation orientée objet**

---

## 🔗 Ressources utiles
- [Documentation officielle Java](https://docs.oracle.com/en/java/)
- [OpenJDK](https://openjdk.org/)
- [W3Schools Java Tutorial](https://www.w3schools.com/java/)
- [Cours Java OpenClassrooms](https://openclassrooms.com/fr/courses/26832-apprenez-a-programmer-en-java)

---

# 🧠 Les Types de Données en Java

## 📘 Introduction

En Java, **chaque variable** doit être déclarée avec un **type** avant d’être utilisée.  
Ces types déterminent la **nature des données** que la variable peut contenir (nombre, caractère, texte, etc.)  
Java est un **langage fortement typé**, ce qui signifie qu’une variable de type donné ne peut stocker que des valeurs compatibles.

---

## 🧩 1. Les grandes catégories de types

Java distingue deux grandes familles de types :

| Catégorie | Description | Exemples |
|------------|--------------|-----------|
| **Types primitifs** | Types de base intégrés au langage. | `int`, `double`, `boolean`, `char`... |
| **Types objets (ou références)** | Représentent des objets, souvent dérivés de classes. | `String`, `ArrayList`, `Scanner`... |

---

## 🔢 2. Les types primitifs

Java possède **8 types primitifs**.  
Ils sont très utilisés car légers et rapides.

| Type | Taille | Exemple de valeur | Description |
|------|---------|------------------|--------------|
| `byte` | 8 bits | `127`, `-128` | Entier très petit, utile pour l’économie mémoire. |
| `short` | 16 bits | `32000` | Entier court. |
| `int` | 32 bits | `-42`, `12345` | Type entier le plus utilisé. |
| `long` | 64 bits | `123456789L` | Entier long (on ajoute `L` à la fin). |
| `float` | 32 bits | `3.14f` | Nombre à virgule flottante simple précision (`f` obligatoire). |
| `double` | 64 bits | `3.141592653` | Nombre à virgule double précision (valeur par défaut pour les décimaux). |
| `boolean` | 1 bit | `true`, `false` | Valeur logique (vrai/faux). |
| `char` | 16 bits | `'A'`, `'9'`, `'
'` | Un caractère Unicode. |

---

### 🧮 Exemple :

```java
public class TypesPrimitifs {
    public static void main(String[] args) {
        int age = 25;
        double taille = 1.82;
        boolean majeur = true;
        char initiale = 'W';

        System.out.println("Âge : " + age);
        System.out.println("Taille : " + taille);
        System.out.println("Majeur : " + majeur);
        System.out.println("Initiale : " + initiale);
    }
}
```

---

## 🪣 3. Les types objets (ou de référence)

Ces types représentent des **objets stockés en mémoire**.  
Contrairement aux types primitifs, ils sont manipulés par **référence**.

Quelques exemples de types objets courants :

| Type | Exemple | Description |
|------|----------|--------------|
| `String` | `"Hello"` | Chaîne de caractères (classe spéciale). |
| `Integer`, `Double`, `Boolean`... | `Integer x = 10;` | **Classes wrappers** permettant d’utiliser les types primitifs comme objets. |
| `ArrayList` | `new ArrayList<>()` | Liste dynamique. |
| `Scanner` | `new Scanner(System.in)` | Lecture d’entrées utilisateur. |

---

### 💡 Exemple avec un type objet :

```java
public class TypesObjets {
    public static void main(String[] args) {
        String message = "Bonjour Java !";
        Integer nombre = 42;

        System.out.println(message.toUpperCase());
        System.out.println("Carré du nombre : " + (nombre * nombre));
    }
}
```

---

## 🔁 4. Conversion et casting

### ✅ Conversion implicite (automatique)
Java convertit automatiquement les petits types vers des plus grands :

```java
int x = 10;
double y = x; // conversion implicite int → double
```

### ⚠️ Conversion explicite (casting)
Nécessaire pour convertir vers un type plus petit :

```java
double prix = 9.99;
int entier = (int) prix; // perd la partie décimale
System.out.println(entier); // 9
```

---

## 🧱 5. Type `var` (Java 10+)

Depuis Java 10, le mot-clé `var` permet d’inférer automatiquement le type :

```java
var nom = "Wayl"; // type String
var age = 23;     // type int
```

> ⚠️ `var` ne rend pas Java dynamique : le type est toujours déterminé **à la compilation**.

---

## 🧠 6. Récapitulatif

| Type | Catégorie | Exemple | Taille approx. |
|------|------------|----------|----------------|
| `int` | Primitif | `42` | 4 octets |
| `double` | Primitif | `3.14` | 8 octets |
| `boolean` | Primitif | `true` | 1 bit |
| `char` | Primitif | `'A'` | 2 octets |
| `String` | Objet | `"Hello"` | Variable |
| `Integer` | Objet | `Integer.valueOf(10)` | Variable |

---

## 🚀 Conclusion

Les types de données sont la **base de toute programmation Java**.  
Bien les maîtriser permet :
- d’éviter les erreurs de conversion,  
- d’écrire un code plus clair et efficace,  
- et de mieux comprendre le fonctionnement mémoire du langage.

---

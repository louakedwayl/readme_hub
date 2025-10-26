# Le mot-clé `final` en Java

Le mot-clé `final` en Java est utilisé pour restreindre l'utilisation des variables, méthodes et classes. Il permet de rendre certaines parties du code immuables ou non modifiables.

## 1. `final` avec les variables

Une variable déclarée `final` ne peut être initialisée qu’une seule fois.
Elle devient **constante** après son initialisation.

### Exemple :

```java
public class ExempleFinal {
    final int AGE = 30; // Variable constante

    public void afficher() {
        System.out.println("Âge : " + AGE);
    }

    public static void main(String[] args) {
        ExempleFinal e = new ExempleFinal();
        e.afficher();

        // AGE = 35; // Erreur : impossible de modifier une variable final
    }
}
```

**Points clés :**

* Les variables `final` doivent être initialisées lors de leur déclaration ou dans le constructeur.
* Les variables d’instance `final` doivent être initialisées avant l’utilisation.
* Les variables `final` peuvent être des références d’objets, mais **l’objet pointé peut être modifié**. Seule la référence est constante.

```java
final int[] tab = {1, 2, 3};
tab[0] = 10; // Autorisé
// tab = new int[]{4,5,6}; // Erreur
```

---

## 2. `final` avec les méthodes

Une méthode `final` **ne peut pas être surchargée** par une sous-classe.

### Exemple :

```java
class Parent {
    public final void afficher() {
        System.out.println("Méthode finale du parent");
    }
}

class Enfant extends Parent {
    // public void afficher() { } // Erreur : impossible de redéfinir une méthode final
}
```

**Usage :**

* Garantir qu’une méthode ne sera pas modifiée par les sous-classes.
* Améliorer éventuellement les performances (le compilateur peut optimiser les méthodes finales).

---

## 3. `final` avec les classes

Une classe `final` **ne peut pas être étendue**.

### Exemple :

```java
final class Animal {
    void manger() {
        System.out.println("Je mange");
    }
}

// class Chien extends Animal { } // Erreur : impossible d’hériter d’une classe final
```

**Usage :**

* Sécuriser le comportement d’une classe.
* Empêcher l’héritage pour des raisons de design ou de sécurité.

---

## 4. `final` et paramètres de méthode

Un paramètre `final` ne peut pas être réassigné dans la méthode.

### Exemple :

```java
public class Test {
    public void afficher(final int x) {
        // x = x + 1; // Erreur : impossible de modifier un paramètre final
        System.out.println(x);
    }
}
```

**Usage :**

* Empêcher les modifications accidentelles d’un paramètre.
* Utilisé parfois dans les classes anonymes ou lambda où la variable doit être effectivement finale.

---

## 5. `final` et variables locales

Les variables locales déclarées `final` doivent être initialisées avant leur utilisation et ne peuvent pas être réassignées.

```java
public class ExempleLocal {
    public void demo() {
        final int valeur;
        valeur = 5; // Initialisation obligatoire
        // valeur = 10; // Erreur : réassignation impossible
    }
}
```

---

## 6. Résumé

| Usage             | Effet                                      |
| ----------------- | ------------------------------------------ |
| `final variable`  | Ne peut être assignée qu’une seule fois    |
| `final méthode`   | Ne peut pas être surchargée                |
| `final classe`    | Ne peut pas être étendue                   |
| `final paramètre` | Ne peut pas être réassigné dans la méthode |

**Conclusion :**
Le mot-clé `final` est très utile pour créer du code sûr, immuable et prévisible. Il est souvent utilisé pour les constantes, les classes utilitaires, ou pour sécuriser le comportement des méthodes.

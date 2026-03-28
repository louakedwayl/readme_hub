# `main` en Python

## 1. L'idée générale

Quand on parle de `main`, on parle du **point de départ logique** d'un programme.

En C, `main()` est obligatoire : c'est là que le programme commence.

En Python, c'est différent :

- Il n'existe pas de `main` imposé par le langage.
- Mais on utilise souvent une fonction `main()` **par convention** pour organiser le code.

Donc en Python, `main()` sert surtout à garder un programme propre, lisible et bien structuré.

---

## 2. Pourquoi utiliser un `main()` en Python ?

Même si Python n'en a pas besoin pour fonctionner, `main()` est très utile.

Il permet de :

- Regrouper le lancement du programme au même endroit.
- Éviter de mettre trop de code directement dans le fichier.
- Rendre le code plus clair.
- Mieux séparer les fonctions de la partie "exécution".

En pratique, c'est une bonne habitude.

---

## 3. La forme classique

On écrit souvent un programme Python comme ça :

```python
def main():
    print("Programme lancé")

if __name__ == "__main__":
    main()
```

Cette structure veut dire :

- `main()` contient ce que le programme doit faire au démarrage.
- Le bloc `if __name__ == "__main__":` permet de lancer `main()` seulement si le fichier est exécuté directement.

---

## 4. À quoi sert `if __name__ == "__main__"` ?

Cette ligne sert à distinguer deux cas :

**Cas 1 : le fichier est lancé directement**
Le programme exécute `main()`.

**Cas 2 : le fichier est importé dans un autre fichier**
Le programme ne lance pas `main()` automatiquement.

C'est très pratique, car un même fichier peut servir :

- Soit de programme.
- Soit de module réutilisable.

---

## 5. Différence avec le C

**En C :**

- `main()` est obligatoire.
- C'est le vrai point d'entrée du programme.

**En Python :**

- `main()` n'est pas obligatoire.
- C'est une convention.
- Le fichier est lu de haut en bas.
- On l'utilise pour mieux organiser le code.

Donc on peut dire :

> En C, `main` est une **règle**. En Python, `main` est une **bonne pratique**.

---

## 6. Pourquoi éviter le code global ?

Le code global, c'est le code écrit directement dans le fichier, en dehors des fonctions.

Python peut l'exécuter, mais ce n'est pas toujours une bonne idée.

Mettre la logique dans des fonctions permet :

- D'avoir un code plus propre.
- De tester plus facilement.
- De réutiliser certaines parties.
- De limiter les erreurs.

C'est pour ça qu'on demande souvent :

- Des fonctions.
- Un `main()`.
- Et peu ou pas de logique dans le scope global.

---

## 7. Ce qu'il faut retenir

- Python n'impose pas de `main()`.
- Mais on en écrit souvent un.
- `main()` sert à organiser le programme.
- `if __name__ == "__main__":` permet de lancer le code seulement si le fichier est exécuté directement.
- C'est plus propre que d'écrire tout le programme dans le scope global.

---

## 8. Résumé très court

Le `main()` en Python n'est pas obligatoire comme en C. C'est une convention utilisée pour structurer le programme. On le combine souvent avec :

```python
if __name__ == "__main__":
    main()
```

pour contrôler le lancement du fichier.

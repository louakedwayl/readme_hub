# `main` en Python

## 1. L'idée générale

Quand on parle de `main`, on parle du **point de départ logique** d'un programme.

En C, `main()` est obligatoire : c'est là que le programme commence.

En Python, c'est différent :

- Il n'existe pas de `main` imposé par le langage.
- Mais on utilise souvent une fonction `main()` **par convention** pour organiser le code.

Donc en Python, `main()` ne représente pas le point d'entrée technique du langage, mais plutôt le point de départ logique choisi par le développeur.

---

## 2. Pourquoi utiliser un `main()` en Python ?

Même si Python n'en a pas besoin pour fonctionner, `main()` est très utile.

Il permet de :

- Regrouper le lancement du programme au même endroit.
- Éviter de mettre trop de code directement dans le fichier.
- Rendre le code plus clair.
- Mieux séparer les fonctions de la partie exécution.

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

## 4. Ce qu'il faut bien comprendre : Python lit le fichier de haut en bas

C'est le point le plus important.

En Python, le fichier est exécuté **ligne par ligne, de haut en bas**.

Cela veut dire que `main()` n'est pas appelée immédiatement au début du fichier. Python lit d'abord tout ce qu'il rencontre, puis, quand il arrive à cette ligne :

```python
if __name__ == "__main__":
    main()
```

il vérifie la condition, et appelle `main()` seulement si elle est vraie.

Donc :

- `main()` ne se lance pas "avant tout le reste".
- Elle se lance seulement quand Python atteint cette partie du fichier.

---

## 5. À quoi sert `if __name__ == "__main__"` ?

Cette ligne sert à distinguer deux cas :

**Cas 1 : le fichier est lancé directement**
Le programme exécute `main()`.

**Cas 2 : le fichier est importé dans un autre fichier**
Le programme ne lance pas `main()` automatiquement.

C'est très pratique, car un même fichier peut servir :

- Soit de programme.
- Soit de module réutilisable.

---

## 6. Attention : le code global s'exécute quand même

Le code global, c'est le code écrit directement dans le fichier, en dehors des fonctions.

Exemple :

```python
print("Bonjour")

def main():
    print("Dans main")

if __name__ == "__main__":
    main()
```

Si on **exécute directement** le fichier :

```
Bonjour
Dans main
```

Si on **importe** le fichier :

```
Bonjour
```

Pourquoi ? Parce que :

- Le `print("Bonjour")` est dans le scope global ; il est donc exécuté pendant la lecture du fichier.
- En revanche, `main()` n'est appelée que si `__name__ == "__main__"`.

C'est pour ça qu'on évite de mettre trop de logique dans le code global.

---

## 7. Différence avec le C

**En C :**

- `main()` est obligatoire.
- C'est le vrai point d'entrée du programme.

**En Python :**

- `main()` n'est pas obligatoire.
- C'est une convention.
- Le fichier est lu de haut en bas.
- `main()` n'est appelée que si on décide explicitement de le faire.

> En C, `main` est une **règle**. En Python, `main` est une **bonne pratique**.

---

## 8. Pourquoi éviter le code global ?

Le code global, c'est le code écrit directement dans le fichier, en dehors des fonctions.

Python peut l'exécuter, mais ce n'est pas toujours une bonne idée.

Mettre la logique dans des fonctions permet :

- D'avoir un code plus propre.
- De tester plus facilement.
- De réutiliser certaines parties.
- De limiter les effets indésirables lors d'un import.

C'est pour ça qu'on demande souvent :

- Des fonctions.
- Un `main()`.
- Et peu ou pas de logique dans le scope global.

---

## 9. Ce qu'il faut retenir

- Python n'impose pas de `main()`.
- Mais on en écrit souvent un.
- `main()` sert à organiser le programme.
- Python exécute le fichier de haut en bas.
- `main()` ne se lance pas avant tout le reste.
- `if __name__ == "__main__":` permet de lancer `main()` seulement si le fichier est exécuté directement.
- Le code global, lui, peut s'exécuter même lors d'un import.

---

## 10. Résumé très court

Le `main()` en Python n'est pas obligatoire comme en C. C'est une convention utilisée pour structurer le programme.

Python lit le fichier de haut en bas, puis appelle `main()` seulement quand il arrive à :

```python
if __name__ == "__main__":
    main()
```

Donc `main()` n'est pas le point d'entrée réel du langage, mais le **point de départ logique** du programme.

> **En Python, le fichier est exécuté de haut en bas ; `main()` n'est appelée que lorsque l'interpréteur atteint le bloc `if __name__ == "__main__":`.**

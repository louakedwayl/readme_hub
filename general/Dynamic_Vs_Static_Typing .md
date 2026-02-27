# Typage Dynamique vs Typage Statique

## 1) Introduction

En programmation, le typage définit la manière dont un langage gère les types des variables (nombre, chaîne de caractères, booléen, objet, etc.).

Il existe deux grandes catégories :

- Typage dynamique (dynamic typing)
- Typage statique (static typing)

---

## 2) Typage Dynamique

### Définition

Un langage est à typage dynamique lorsque le type d'une variable est déterminé au moment de l'exécution. On ne déclare généralement pas le type explicitement.

### Fonctionnement

- Le type est associé à la valeur, pas à la variable
- Une même variable peut contenir différents types au cours du programme
- Les erreurs de type apparaissent à l'exécution

### Exemple en Python

```python
x = 10      # x est un entier
x = "hello" # x devient une chaîne
```

### Exemple en JavaScript

```javascript
let x = 42;
x = "Bonjour";
```

### Avantages

- Code plus rapide à écrire
- Plus flexible
- Moins verbeux

### Inconvénients

- Erreurs détectées tardivement
- Moins sécurisé dans les grands projets
- Maintenance plus complexe

---

## 3) Typage Statique

### Définition

Un langage est à typage statique lorsque le type d'une variable est connu à la compilation. On déclare généralement le type, ou il est inféré mais reste fixe.

### Fonctionnement

- Le type est associé à la variable
- Une variable ne peut pas changer de type
- Les erreurs sont détectées avant l'exécution

### Exemple en C

```c
int x = 10;
x = "hello"; // Erreur de compilation
```

### Exemple en TypeScript

```typescript
let x: number = 10;
x = "hello"; // Erreur
```

### Avantages

- Détection précoce des erreurs
- Code plus robuste
- Meilleure maintenabilité
- Outils IDE plus puissants (autocomplétion fiable)

### Inconvénients

- Plus verbeux
- Moins flexible
- Temps de développement parfois plus long

---

## 4) Attention : Inférence de Type

Ne pas écrire le type ne signifie pas typage dynamique.

Exemple en TypeScript :

```typescript
let x = 10;
```

Le type est inféré comme `number`. C'est toujours du typage statique, car le type est fixé à la compilation.

---

## 5) Comparaison

| Caractéristique | Typage Dynamique | Typage Statique |
|---|---|---|
| Moment de vérification | Exécution | Compilation |
| Changement de type | Oui | Non |
| Sécurité | Moins stricte | Plus stricte |
| Rapidité d'écriture | Rapide | Plus structuré |

---

## 6) Quand utiliser quoi ?

- Petits scripts, prototypes rapides → Typage dynamique
- Grands projets, équipes, applications critiques → Typage statique

---

## 7) Conclusion

Le typage dynamique favorise la flexibilité et la rapidité. Le typage statique favorise la sécurité et la robustesse. Les deux ont leur place selon le contexte du projet.

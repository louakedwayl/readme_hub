
# Cours sur le DOM (Document Object Model)

## Qu'est-ce que le DOM ?

Le **DOM (Document Object Model)** est une **interface de programmation** qui représente une page web sous forme d'un **arbre d'objets**.  
Chaque élément HTML (balise, attribut, texte) devient un **nœud** manipulable par JavaScript.

En d'autres termes :
- Le navigateur lit le code HTML.
- Il construit un modèle sous forme d'arbre (le DOM).
- On peut modifier cet arbre avec JavaScript pour changer le contenu, le style ou la structure de la page.

Exemple simple :

```html
<!DOCTYPE html>
<html>
<head>
    <title>Exemple DOM</title>
</head>
<body>
    <h1 id="titre">Bonjour</h1>
    <p>Un paragraphe.</p>
</body>
</html>
```

**Représentation DOM :**  
```
Document
 └── html
      ├── head
      │    └── title
      └── body
           ├── h1 (id="titre")
           └── p
```

## Accéder au DOM

En JavaScript, l'objet **`document`** permet d'accéder au DOM.

Exemples :

```javascript
document.title           // Retourne le titre de la page
document.body            // Retourne l'élément <body>
document.getElementById("titre")  // Retourne l'élément avec l'id "titre"
```

## Modifier le DOM

On peut changer le contenu ou le style d'un élément :

```javascript
let titre = document.getElementById("titre");
titre.textContent = "Bonjour le monde !";   // Change le texte
titre.style.color = "red";                  // Change la couleur
```

## Créer et ajouter des éléments

On peut ajouter dynamiquement des balises :

```javascript
let nouveauParagraphe = document.createElement("p");
nouveauParagraphe.textContent = "Paragraphe ajouté avec JS !";
document.body.appendChild(nouveauParagraphe);
```

## Supprimer des éléments

```javascript
let element = document.getElementById("titre");
element.remove(); // Supprime l'élément
```

## Écouter des événements

Le DOM permet aussi de **réagir aux actions de l'utilisateur** (clics, touches, etc.) :

```javascript
let bouton = document.getElementById("monBouton");
bouton.addEventListener("click", function() {
    alert("Bouton cliqué !");
});
```

## Conclusion

- Le DOM est **la représentation en mémoire** de votre page web.
- Il est **modulable en temps réel** grâce à JavaScript.
- Il permet **d'interagir avec l'utilisateur** (événements).

**À retenir :** Le DOM est la base pour créer des pages web **dynamiques et interactives**.

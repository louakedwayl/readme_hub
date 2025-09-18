# CSS – La propriété `position`

La propriété CSS `position` permet de définir **comment un élément est positionné dans la page**. Elle influence la manière dont l’élément se déplace, se superpose et interagit avec les autres éléments.

## 1. Les différentes valeurs de `position`

### 1.1 `static` (valeur par défaut)
- L’élément est positionné **selon le flux normal du document**.
- Il **ignore les propriétés `top`, `right`, `bottom` et `left`**.

### 1.2 `relative`
- L’élément reste dans le flux normal mais peut être **déplacé par rapport à sa position d’origine**.
- Exemple :
```css
div.relative {
  position: relative;
  top: 20px;
  left: 30px;
}
```

### 1.3 `absolute`
- L’élément est **retiré du flux normal** et se positionne **par rapport à son ancêtre positionné**.
- Exemple :
```css
div.absolute-container {
  position: relative;
  height: 150px;
}
div.absolute {
  position: absolute;
  top: 10px;
  left: 10px;
}
```

### 1.4 `fixed`
- L’élément est **fixé par rapport à la fenêtre du navigateur**, même lors du défilement.
- Exemple :
```css
div.fixed {
  position: fixed;
  bottom: 10px;
  right: 10px;
}
```

### 1.5 `sticky`
- L’élément est **relatif jusqu’à atteindre un certain point de défilement**, puis il devient **fixe**.
- Exemple :
```css
div.sticky {
  position: sticky;
  top: 0;
}
```

## 2. Propriétés complémentaires

Pour les éléments positionnés (`relative`, `absolute`, `fixed`, `sticky`), on peut utiliser :

- `top` : distance par rapport au haut du conteneur de référence.
- `right` : distance par rapport au bord droit.
- `bottom` : distance par rapport au bas.
- `left` : distance par rapport au bord gauche.
- `z-index` : contrôle **l’ordre d’empilement** (éléments au-dessus ou en dessous des autres).

## 3. Note sur `height: 100%` avec `absolute`

- Un élément `position: absolute` peut remplir son conteneur avec `height: 100%`.  
- **Important :** Le conteneur doit avoir une hauteur définie explicitement (en px, %, vh…), sinon `100%` n’a aucune référence.  
- Si tu veux que ça fonctionne sur toute la page :

```css
html, body {
  height: 100%; /* indispensable */
  margin: 0;
}
.absolute-container {
  position: relative;
  height: 100%; /* prend toute la hauteur du body */
}
.absolute {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%; /* prend toute la hauteur du container */
}
```

- Sinon, tu peux fixer la hauteur en pixels pour `.absolute-container`.

### Explication sur l’élément `html`
- `<html>` est la **racine du document HTML**, parent de tout le contenu.  
- `<body>` contient le contenu visible de la page.  
- Les pourcentages de hauteur ne fonctionnent que si **tous les parents jusqu’à `<html>` ont une hauteur définie**.  
- Donc, pour utiliser `height: 100%` avec un élément `absolute`, il faut souvent définir :

```css
html, body {
  height: 100%;
}
```

## 4. Exemple HTML complet
```html
<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Exemple CSS Position</title>
<style>
  body {
    margin: 0;
    font-family: Arial, sans-serif;
  }
  .static {
    background: gray;
    color: white;
    padding: 20px;
  }
  .relative {
    background: blue;
    color: white;
    padding: 20px;
    position: relative;
    top: 20px;
    left: 30px;
  }
  .absolute-container {
    position: relative;
    background: lightgray;
    padding: 20px;
    margin: 10px 0;
  }
  .absolute {
    position: absolute;
    top: 10px;
    left: 10px;
    background: red;
    color: white;
    padding: 10px;
  }
  .sticky {
    position: sticky;
    top: 0;
    background: orange;
    color: white;
    padding: 20px;
  }
  .fixed {
    position: fixed;
    bottom: 10px;
    right: 10px;
    background: green;
    color: white;
    padding: 20px;
  }
</style>
</head>
<body>

<div class="static">Static</div>
<div class="relative">Relative</div>
<div class="absolute-container">
Absolute container
<div class="absolute">Absolute</div>
</div>
<div style="height:300px"></div>
<div class="sticky">Sticky</div>
<div style="height:300px"></div>
<div class="fixed">Fixed</div>

</body>
</html>
```

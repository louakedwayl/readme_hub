# CSS – La propriété `position`

La propriété CSS `position` permet de définir **comment un élément est positionné dans la page**. Elle influence la manière dont l’élément se déplace, se superpose et interagit avec les autres éléments.

## 1. Les différentes valeurs de `position`

### 1.1 `static` (valeur par défaut)
- L’élément est positionné **selon le flux normal du document**.
- Il **ignore les propriétés `top`, `right`, `bottom` et `left`**.

### 1.2 `relative`
- L’élément reste dans le flux normal mais peut être **déplacé par rapport à sa position d’origine**.
- On utilise les propriétés `top`, `right`, `bottom` et `left`.

### 1.3 `absolute`
- L’élément est **retiré du flux normal**, donc **ne prend plus de place dans la page**.
- Il se positionne **par rapport à son ancêtre positionné** (`relative`, `absolute`, `fixed`).

### 1.4 `fixed`
- L’élément est **fixé par rapport à la fenêtre du navigateur**, même lors du défilement.

### 1.5 `sticky`
- L’élément est **relatif jusqu’à atteindre un certain point de défilement**, puis il devient **fixe**.
- Utile pour créer des en-têtes ou menus flottants.

## 2. Propriétés complémentaires

Pour les éléments positionnés (`relative`, `absolute`, `fixed`, `sticky`), on peut utiliser :

- `top` : distance par rapport au haut du conteneur de référence.
- `right` : distance par rapport au bord droit.
- `bottom` : distance par rapport au bas.
- `left` : distance par rapport au bord gauche.
- `z-index` : contrôle **l’ordre d’empilement** (éléments au-dessus ou en dessous des autres).

## 3. Résumé rapide

| Valeur    | Déplacé par | Sort du flux ? | Fixé par             |
|-----------|-------------|----------------|--------------------|
| static    | Non         | Non            | Flux normal         |
| relative  | Oui         | Non            | Sa position originale|
| absolute  | Oui         | Oui            | Ancêtre positionné  |
| fixed     | Oui         | Oui            | Fenêtre             |
| sticky    | Oui         | Non (jusqu’au déclenchement) | Défilement + conteneur |

## 2. Exemple HTML complet
```html
<div class="static">Static</div>
<div class="relative">Relative</div>
<div class="absolute-container">
Absolute container
<div class="absolute">Absolute</div>
</div>
<div style="height:300px"></div> <!-- espace pour scroll -->
<div class="sticky">Sticky</div>
<div style="height:300px"></div>
<div class="fixed">Fixed</div>
```




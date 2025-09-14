# Figma - Transitions et Animations

Les **transitions et animations** dans Figma permettent de rendre les prototypes plus interactifs et réalistes. Elles définissent **comment les éléments passent d'une frame à une autre** ou comment ils réagissent aux interactions.

## Sommaire

1. [Qu'est-ce qu'une transition ?](#quest-ce-quune-transition-)
2. [Types de transitions](#types-de-transitions)
3. [Smart Animate](#smart-animate)
4. [Overlay](#overlay)
5. [Configurer une transition](#configurer-une-transition)
6. [Bonnes pratiques](#bonnes-pratiques)

## Qu'est-ce qu'une transition ?

Une **transition** définit le changement visuel entre deux frames ou états d'un élément lorsque l'utilisateur interagit avec le prototype.

* Exemple : cliquer sur un bouton qui fait apparaître une nouvelle page.
* Elle permet de simuler des animations réalistes et de guider l'utilisateur.

## Types de transitions

Figma propose plusieurs types de transitions :

* **Instant** : le changement se produit immédiatement, sans animation.
* **Dissolve (Fondu)** : l'ancienne frame disparaît progressivement pendant que la nouvelle apparaît.
* **Move In / Move Out** : les éléments entrent ou sortent de la frame selon une direction (haut, bas, gauche, droite).
* **Push** : la nouvelle frame pousse l'ancienne hors de l'écran.
* **Smart Animate** : animation intelligente qui déplace, redimensionne et modifie les propriétés des objets entre deux frames.
* **Overlay** : affiche une frame par-dessus la frame actuelle (utile pour modals, menus, pop-ups).

## Smart Animate

**Smart Animate** est une fonctionnalité avancée :

* Figma calcule les différences entre deux frames pour animer automatiquement les éléments.
* Fonctionne mieux si les **objets ont le même nom** dans les deux frames.
* Permet d’animer la **position, la taille, la couleur, l’opacité et les effets**.

## Overlay

* Une **overlay** est une frame superposée à la frame principale.
* Souvent utilisée pour : pop-ups, menus contextuels, modals.
* Peut être animée avec **Dissolve, Move In**, etc.
* Possibilité de **close when clicking outside** pour simuler la fermeture.

## Configurer une transition

1. Sélectionne l’élément interactif (ex : bouton).
2. Dans l’onglet **Prototype**, tire le **node bleu** vers la frame cible.
3. Choisis le **type de transition** et la **durée**.
4. Si nécessaire, active **Smart Animate** ou configure un overlay.

## Bonnes pratiques

* Utiliser **Smart Animate** uniquement quand les éléments sont identiques pour éviter des comportements étranges.
* Ne pas abuser des animations complexes pour garder le prototype fluide.
* Vérifier les durées : 200-400ms est souvent suffisant.
* Tester les transitions sur différents écrans pour vérifier la fluidité.
* Nommer correctement les objets et frames pour faciliter Smart Animate.

---

Les transitions et animations rendent les prototypes Figma plus dynamiques et proches d'une application réelle, améliorant ainsi la compréhension et l’expérience utilisateur.

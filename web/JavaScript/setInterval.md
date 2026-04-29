# `setInterval` — Exécution répétée en JavaScript

## 1. Définition

`setInterval` est une fonction globale du navigateur (et de Node.js) qui exécute un callback de manière répétée, à intervalle fixe.

## 2. Syntaxe

```js
const id = setInterval(callback, délai, ...args);
```

| Paramètre   | Type       | Description                                      |
| ----------- | ---------- | ------------------------------------------------ |
| `callback`  | `Function` | Fonction exécutée à chaque intervalle            |
| `délai`     | `Number`   | Temps en millisecondes entre chaque exécution    |
| `...args`   | `any`      | Arguments optionnels passés au callback          |

Retourne un identifiant numérique (`id`) utilisé pour stopper l'intervalle.

## 3. Arrêter un intervalle

```js
clearInterval(id);
```

Sans `clearInterval`, l'intervalle tourne indéfiniment — fuite mémoire garantie.

## 4. Comportement

- Le premier appel a lieu après le premier délai, pas immédiatement.
- Le délai est approximatif : le moteur JS est single-threaded, les appels peuvent être retardés si la pile d'exécution est occupée.
- Un délai de `0` ne signifie pas « immédiat » — il passe par la task queue.

## 5. Comparaison avec `setTimeout`

| `setTimeout`               | `setInterval`                  |
| -------------------------- | ------------------------------ |
| Exécution unique           | Exécution répétée              |
| Contrôle fin du timing     | Timing cumulatif non garanti   |
| Chaînable récursivement    | Simple mais rigide             |

> Pour un contrôle précis, `setTimeout` récursif est préféré à `setInterval`.

## 6. Cas d'usage typiques

- Mise à jour d'un affichage (horloge, compteur)
- Polling d'une API
- Animation simple (hors `requestAnimationFrame`)
- Vérification périodique d'un état

## 7. Pièges courants

- Oublier `clearInterval` → fuite mémoire
- Référencer des variables obsolètes (problème de closure)
- Supposer un timing exact → impossible en JS single-threaded
- Empiler des intervalles sans nettoyer les précédents

## 8. Exemple minimal

```js
let compteur = 0;

const id = setInterval(() => {
    compteur++;
    console.log(`Tick : ${compteur}`);

    if (compteur === 5) {
        clearInterval(id);
        console.log("Arrêt.");
    }
}, 1000);
```

## Résumé

`setInterval` = exécution périodique d'une fonction.
Toujours stocker l'`id`. Toujours appeler `clearInterval`. Ne jamais supposer la précision du timing.

# Gérer les animations CSS avec JavaScript

## Introduction

Lorsqu'on développe des applications web interactives, il est fréquent de devoir synchroniser du code JavaScript avec des animations CSS. Ce cours vous apprend à détecter la fin d'une animation et à exécuter du code en conséquence.

## Les événements d'animation

JavaScript propose plusieurs événements pour suivre le cycle de vie des animations CSS :

- `animationstart` : Déclenché au début de l'animation
- `animationiteration` : Déclenché à chaque répétition de l'animation
- `animationend` : Déclenché à la fin de l'animation

## Syntaxe de base

### Écouter la fin d'une animation

```javascript
element.addEventListener('animationend', function(event) {
    console.log('Animation terminée !');
    // Votre code ici
});
```

### Exemple complet

**HTML :**
```html
<div id="box" class="animated-box">Cliquez-moi</div>
<button id="startBtn">Démarrer l'animation</button>
```

**CSS :**
```css
.animated-box {
    width: 100px;
    height: 100px;
    background-color: blue;
    margin: 20px;
}

.slide-animation {
    animation: slideRight 2s ease-in-out;
}

@keyframes slideRight {
    from {
        transform: translateX(0);
    }
    to {
        transform: translateX(300px);
    }
}
```

**JavaScript :**
```javascript
const box = document.getElementById('box');
const btn = document.getElementById('startBtn');

btn.addEventListener('click', () => {
    // Ajouter la classe d'animation
    box.classList.add('slide-animation');
    
    // Écouter la fin de l'animation
    box.addEventListener('animationend', () => {
        console.log('Animation terminée !');
        // Nettoyer : retirer la classe
        box.classList.remove('slide-animation');
        // Exécuter la suite du programme
        nextAction();
    });
});

function nextAction() {
    console.log('Prêt pour la prochaine action !');
}
```

## Bonnes pratiques

### 1. Utiliser `once: true` pour les événements uniques

```javascript
element.addEventListener('animationend', () => {
    // Ce code ne s'exécutera qu'une seule fois
    console.log('Animation finie');
}, { once: true });
```

Cette option supprime automatiquement l'écouteur après le premier déclenchement.

### 2. Gérer plusieurs animations

```javascript
element.addEventListener('animationend', (event) => {
    // Vérifier quelle animation s'est terminée
    if (event.animationName === 'slideRight') {
        console.log('Animation de glissement terminée');
    } else if (event.animationName === 'fadeOut') {
        console.log('Animation de fondu terminée');
    }
});
```

### 3. Nettoyer les classes CSS

```javascript
function startAnimation(element, animationClass) {
    element.classList.add(animationClass);
    
    element.addEventListener('animationend', () => {
        // Toujours nettoyer après l'animation
        element.classList.remove(animationClass);
    }, { once: true });
}
```

## Cas d'usage avancés

### Chaîner plusieurs animations

```javascript
function chainAnimations(element) {
    // Première animation
    element.classList.add('first-animation');
    
    element.addEventListener('animationend', () => {
        element.classList.remove('first-animation');
        
        // Deuxième animation
        element.classList.add('second-animation');
        
        element.addEventListener('animationend', () => {
            element.classList.remove('second-animation');
            console.log('Toutes les animations terminées !');
        }, { once: true });
        
    }, { once: true });
}
```

### Utiliser des Promises pour un code plus lisible

```javascript
function animateElement(element, animationClass) {
    return new Promise((resolve) => {
        element.classList.add(animationClass);
        
        element.addEventListener('animationend', () => {
            element.classList.remove(animationClass);
            resolve();
        }, { once: true });
    });
}

// Utilisation avec async/await
async function sequentialAnimations(element) {
    await animateElement(element, 'slide-in');
    await animateElement(element, 'bounce');
    await animateElement(element, 'fade-out');
    console.log('Séquence d\'animations terminée !');
}
```

## Alternative avec setTimeout

Si vous connaissez la durée exacte de votre animation :

```javascript
// CSS : animation: myAnimation 1.5s ease-in-out;

button.addEventListener('click', () => {
    element.classList.add('animated');
    
    setTimeout(() => {
        element.classList.remove('animated');
        nextStep();
    }, 1500); // 1500ms = 1.5s
});
```

**Avantages :** Simple et direct
**Inconvénients :** Doit être synchronisé manuellement avec le CSS

## Gestion des erreurs

```javascript
function safeAnimate(element, animationClass, timeout = 5000) {
    element.classList.add(animationClass);
    
    let completed = false;
    
    // Écouteur principal
    element.addEventListener('animationend', () => {
        if (!completed) {
            completed = true;
            cleanup();
            onComplete();
        }
    }, { once: true });
    
    // Sécurité : timeout au cas où l'animation ne se termine pas
    setTimeout(() => {
        if (!completed) {
            completed = true;
            console.warn('Animation interrompue par timeout');
            cleanup();
        }
    }, timeout);
    
    function cleanup() {
        element.classList.remove(animationClass);
    }
    
    function onComplete() {
        console.log('Animation terminée normalement');
    }
}
```

## Exemple pratique : Jeu avec animations

```javascript
class GameAnimationManager {
    constructor() {
        this.isAnimating = false;
    }
    
    async startGameSequence() {
        if (this.isAnimating) return;
        this.isAnimating = true;
        
        try {
            const player = document.getElementById('player');
            
            // Animation de préparation
            await this.animate(player, 'player-ready');
            
            // Démarrer le jeu
            this.startGameplay();
            
        } catch (error) {
            console.error('Erreur dans la séquence d\'animation:', error);
        } finally {
            this.isAnimating = false;
        }
    }
    
    animate(element, className) {
        return new Promise((resolve, reject) => {
            if (!element) {
                reject(new Error('Élément non trouvé'));
                return;
            }
            
            element.classList.add(className);
            
            element.addEventListener('animationend', () => {
                element.classList.remove(className);
                resolve();
            }, { once: true });
            
            // Sécurité
            setTimeout(() => {
                reject(new Error('Animation timeout'));
            }, 10000);
        });
    }
    
    startGameplay() {
        console.log('Le jeu commence !');
        // Logique du jeu ici
    }
}

// Utilisation
const gameManager = new GameAnimationManager();
document.getElementById('startButton').addEventListener('click', () => {
    gameManager.startGameSequence();
});
```

## Conclusion

La gestion des animations CSS avec JavaScript est essentielle pour créer des expériences utilisateur fluides. Les points clés à retenir :

1. Utilisez `animationend` pour détecter la fin des animations
2. N'oubliez pas de nettoyer les classes CSS après usage
3. Utilisez `{ once: true }` pour éviter les fuites mémoire
4. Considérez les Promises pour un code plus lisible
5. Implémentez des mécanismes de sécurité (timeout)

Cette approche vous permettra de créer des jeux et applications web avec des transitions fluides et un code maintenable.

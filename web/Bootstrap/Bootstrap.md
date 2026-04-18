# Bootstrap

## Définition

**Bootstrap** est un framework CSS (avec quelques composants JS) qui fournit des classes prêtes à l'emploi pour styliser rapidement un site web sans écrire de CSS custom.

Créé par Twitter en 2011. Version actuelle : **Bootstrap 5**.

---

## À quoi ça sert

Styliser un site rapidement en appliquant des classes prédéfinies directement sur les éléments HTML, sans avoir à coder le CSS soi-même.

**Sans Bootstrap :**

```html
<button style="background: blue; color: white; padding: 8px 16px; border-radius: 4px;">
    Click
</button>
```

**Avec Bootstrap :**

```html
<button class="btn btn-primary">Click</button>
```

---

## Les 4 piliers

### 1. Système de grille (layout responsive)

Grille de 12 colonnes, responsive par défaut.

```html
<div class="container">
    <div class="row">
        <div class="col-md-6">Moitié gauche</div>
        <div class="col-md-6">Moitié droite</div>
    </div>
</div>
```

### 2. Composants pré-stylés

Boutons, formulaires, navbars, cards, modals, alerts, etc.

```html
<button class="btn btn-primary">Bouton</button>
<div class="alert alert-danger">Erreur</div>
<nav class="navbar">...</nav>
```

### 3. Classes utilitaires

Styles rapides via classes atomiques : margin, padding, couleurs, alignement, etc.

```html
<div class="mt-3 p-4 text-center bg-light">Contenu</div>
```

### 4. Responsive par défaut

Breakpoints : `sm`, `md`, `lg`, `xl`, `xxl`. Adaptation automatique au mobile.

---

## Installation

### Via CDN (rapide, pour prototypes)

```html
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
```

### Via npm (production, React)

```bash
npm install bootstrap
```

```js
import 'bootstrap/dist/css/bootstrap.min.css';
```

### Version React dédiée

```bash
npm install react-bootstrap bootstrap
```

```jsx
import { Button } from 'react-bootstrap';
<Button variant="primary">Click</Button>
```

---

## Avantages et inconvénients

| ✅ Avantages | ❌ Inconvénients |
|---|---|
| Rapide à mettre en place | Design générique, sites qui se ressemblent tous |
| Documentation excellente | Bundle CSS lourd si non optimisé |
| Responsive par défaut | Moins flexible que Tailwind |
| Large communauté | Considéré comme vieillissant en 2025-2026 |

---

## Bootstrap vs alternatives

| Framework | Philosophie | Usage typique |
|---|---|---|
| **Bootstrap** | Composants pré-stylés | Prototypes, admin panels, projets legacy |
| **Tailwind CSS** | Utility-first, design custom | Projets modernes, startups |
| **Shadcn/ui** | Components React sur Tailwind | Standard React 2025-2026 |
| **Chakra UI / Radix** | Components React accessibles | Projets sérieux axés UX |

---

## Quand utiliser Bootstrap

| Cas | Bootstrap recommandé ? |
|---|---|
| Prototype rapide | ✅ Oui |
| Admin panel interne | ✅ Oui |
| Projet legacy à maintenir | ✅ Oui |
| Startup / projet design custom | ❌ Non — préférer Tailwind |
| Application React moderne | ❌ Non — préférer Shadcn/Tailwind |

---

## À retenir

- Bootstrap = framework CSS basé sur des classes prédéfinies
- Idéal pour aller vite, pas pour un design unique
- Stack dominante en 2025-2026 pour les projets modernes : **Tailwind + Shadcn**
- Compétence encore utile à connaître pour lire du code legacy, mais ne pas en faire sa stack principale

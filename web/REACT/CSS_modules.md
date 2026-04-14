# CSS Modules

## 1. Définition

Un **CSS Module** est un fichier CSS dans lequel **tous les noms de classes et d'animations sont scopés localement par défaut**. Autrement dit, chaque classe écrite dans un fichier `.module.css` n'existe que dans le composant qui l'importe. Pas de collision globale, pas de fuite de styles, pas de guerre de spécificité.

Ce n'est **pas** un framework ni une librairie runtime : c'est une convention de build. Un outil (Webpack, Vite, Parcel, Next.js…) intercepte les fichiers `*.module.css` et transforme les noms de classes en identifiants uniques au moment de la compilation.

---

## 2. Le problème résolu

En CSS classique, tout est global. Deux développeurs qui écrivent `.button` dans deux fichiers différents entrent en conflit. Les conséquences habituelles :

- cascade imprévisible
- surcharge par `!important`
- conventions de nommage artificielles (BEM, SMACSS, OOCSS)
- peur de supprimer du CSS mort
- styles qui fuient d'un composant à l'autre

Les CSS Modules suppriment ce problème à la racine : **chaque classe appartient à son fichier**.

---

## 3. Fonctionnement

### Fichier source

```css
/* Button.module.css */
.primary {
  background: black;
  color: white;
  padding: 12px 24px;
}

.disabled {
  opacity: 0.5;
}
```

### Import dans le composant

```jsx
import styles from './Button.module.css';

export function Button() {
  return <button className={styles.primary}>Valider</button>;
}
```

### Résultat compilé dans le DOM

```html
<button class="Button_primary__a3f2x">Valider</button>
```

Le bundler a transformé `primary` en un identifiant unique. Impossible de le percuter depuis un autre fichier.

---

## 4. Syntaxe et mécanismes clés

### 4.1. Import par défaut

`styles` est un objet JavaScript dont les clés sont les noms originaux et les valeurs sont les noms hashés.

```js
styles.primary // → "Button_primary__a3f2x"
```

### 4.2. Classes conditionnelles

Combinaison avec template literals ou `clsx` / `classnames` :

```jsx
<button className={`${styles.primary} ${isDisabled ? styles.disabled : ''}`} />
```

### 4.3. Composition locale

Un module peut hériter d'une autre classe locale via `composes` :

```css
.base {
  padding: 12px;
  border-radius: 4px;
}

.primary {
  composes: base;
  background: black;
}
```

### 4.4. Composition depuis un autre fichier

```css
.primary {
  composes: base from './shared.module.css';
  background: black;
}
```

### 4.5. Global explicite

Pour forcer une classe à rester globale (reset, utilitaires tiers) :

```css
:global(.no-scroll) {
  overflow: hidden;
}
```

Ou scope global sur un bloc entier :

```css
:global {
  .legacy-widget { color: red; }
}
```

### 4.6. Local explicite

L'inverse existe, utile dans un contexte mixte :

```css
:local(.card) { ... }
```

---

## 5. Avantages

| Point | Gain |
|---|---|
| Scoping | Zéro collision, zéro BEM |
| Dead code | Une classe non importée = supprimable sans risque |
| Refactor | Renommer une classe n'impacte qu'un fichier |
| Performance | CSS statique, pas de runtime, extraction possible en fichier unique |
| Compatibilité | Reste du CSS standard — pas de DSL propriétaire |

---

## 6. Limites

- **Verbosité** : `className={styles.xxx}` à chaque élément.
- **Classes dynamiques** : `styles[variant]` fonctionne mais casse le tree-shaking.
- **Sélecteurs complexes** : cibler un enfant non-module devient pénible.
- **Theming** : pas de système de variables intégré — à combiner avec CSS custom properties.
- **Pas de logique** : contrairement à Tailwind ou aux CSS-in-JS, aucune conditionnalité native dans le CSS lui-même.

---

## 7. Comparaison rapide

| Approche | Scoping | Runtime | Courbe |
|---|---|---|---|
| CSS global | Non | Non | Faible |
| BEM | Convention | Non | Moyenne |
| CSS Modules | **Oui, build-time** | **Non** | Faible |
| CSS-in-JS (styled-components, Emotion) | Oui | Oui (souvent) | Moyenne |
| Tailwind | N/A (utility-first) | Non | Moyenne |

Les CSS Modules occupent la niche **"CSS standard + scoping gratuit, sans coût runtime"**. C'est le compromis le plus sobre.

---

## 8. Intégration par outil

- **Vite** : natif. Tout fichier `*.module.css` est traité automatiquement.
- **Next.js** : natif depuis la v9. Fonctionne aussi avec `.module.scss`.
- **Webpack** : via `css-loader` avec l'option `modules: true`.
- **Parcel** : natif.
- **Create React App** : natif.

Aucune configuration n'est requise dans l'écrasante majorité des cas — la convention `.module.css` suffit.

---

## 9. Bonnes pratiques

1. **Un module = un composant.** Le fichier CSS vit à côté du composant qui l'utilise.
2. **Noms de classes sémantiques, pas visuels.** `.primary`, pas `.blackBackground`.
3. **`composes` > duplication.** Pour les variantes, composer une classe de base.
4. **Variables CSS globales pour le thème.** Les couleurs, espacements, typographies restent dans `:root` d'un fichier global.
5. **Éviter les sélecteurs profonds.** Un module doit rester plat. Si la hiérarchie devient complexe, c'est que le composant doit être découpé.
6. **Pas de `!important`.** Le scoping supprime la raison d'en avoir besoin.

---

## 10. Quand les utiliser

**Oui** :
- Application React/Vue/Svelte avec composants isolés
- Équipe qui veut rester proche du CSS standard
- Besoin de performance (pas de runtime JS pour les styles)
- Projet de taille moyenne à grande sans dépendance à un design system runtime

**Non** :
- Prototypage ultra-rapide → Tailwind
- Theming dynamique lourd (multi-thèmes changés à la volée) → CSS-in-JS ou variables CSS avancées
- Site purement statique, une page → CSS global suffit

---

## 11. Résumé exécutable

> Les CSS Modules sont du CSS standard, scopé localement au moment du build, importé comme un objet JavaScript dans le composant. Ils éliminent les conflits de classes sans coût runtime, sans DSL, et sans imposer d'architecture particulière. C'est la solution par défaut raisonnable pour toute application à composants qui ne veut ni Tailwind ni CSS-in-JS.

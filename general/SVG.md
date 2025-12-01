# Cours complet sur le format SVG

## Table des matières
1. [Introduction](#introduction)
2. [Qu'est-ce que le SVG ?](#quest-ce-que-le-svg)
3. [Pourquoi utiliser SVG ?](#pourquoi-utiliser-svg)
4. [Comment fonctionne SVG](#comment-fonctionne-svg)
5. [SVG dans le web](#svg-dans-le-web)
6. [Créer et éditer des SVG](#créer-et-éditer-des-svg)
7. [SVG vs autres formats](#svg-vs-autres-formats)
8. [Utilisation pratique](#utilisation-pratique)
9. [Avantages et limitations](#avantages-et-limitations)
10. [Cas d'usage courants](#cas-dusage-courants)

---

## Introduction

Le **SVG (Scalable Vector Graphics)** est un format d'image fondamentalement différent des formats traditionnels comme PNG ou JPEG. Au lieu de stocker des pixels, SVG stocke des **instructions mathématiques** pour dessiner des formes.

### Analogie simple

**Image PNG/JPEG** = Une mosaïque
- Composée de milliers de petits carrés colorés (pixels)
- Si vous l'agrandissez, vous voyez les carrés

**Image SVG** = Une recette de cuisine
- Instructions pour dessiner : "Trace un cercle de 50cm de rayon"
- Si vous l'agrandissez, vous suivez juste les instructions à plus grande échelle
- Résultat toujours parfait, quelle que soit la taille

---

## Qu'est-ce que le SVG ?

### Définition

SVG est un format d'image **vectorielle** basé sur du **code XML** (donc du texte). Au lieu de dire "ce pixel est rouge, celui-là est bleu", SVG dit "dessine un cercle rouge ici, puis un rectangle bleu là".

### Un fichier texte

Un fichier SVG peut être ouvert dans un éditeur de texte simple :

```xml
<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100">
  <circle cx="50" cy="50" r="40" fill="red"/>
  <rect x="20" y="70" width="60" height="20" fill="blue"/>
</svg>
```

Ce code simple dessine :
- Un cercle rouge au centre
- Un rectangle bleu en bas

### Caractéristiques principales

**Scalable (redimensionnable)**
- Aucune perte de qualité peu importe la taille
- Parfait sur un écran de montre ou un panneau publicitaire

**Vector (vectoriel)**
- Basé sur des formules mathématiques
- Formes géométriques : cercles, rectangles, lignes, courbes

**Graphics (graphiques)**
- Pour créer des images, icônes, logos, illustrations

**Textuel**
- Le fichier est du texte XML lisible
- Modifiable avec n'importe quel éditeur de texte
- Peut être généré par du code

---

## Pourquoi utiliser SVG ?

### 1. Qualité parfaite à toutes les tailles

**Problème avec PNG/JPEG :**
```
Logo en PNG 100x100 pixels :
- Sur écran normal : net
- Sur écran haute résolution (Retina) : flou
- Agrandi à 500x500 : très pixelisé

Solution : créer plusieurs versions (logo.png, logo@2x.png, logo@3x.png)
```

**Avec SVG :**
```
Logo en SVG :
- Un seul fichier
- Net sur tous les écrans
- Net à toutes les tailles
- Aucune maintenance de multiples versions
```

### 2. Fichiers très légers

Pour un logo simple :
- PNG (100x100) : 5-20 KB
- PNG (500x500) : 50-200 KB
- **SVG (toutes tailles)** : 1-5 KB

Le SVG décrit juste les formes en quelques lignes de code.

### 3. Modifiable et personnalisable

**Avec CSS :**
```css
/* Changer la couleur d'un logo SVG au survol */
.logo:hover path {
  fill: blue;
}
```

**Avec JavaScript :**
```javascript
// Animer une icône SVG
icon.style.transform = 'rotate(180deg)';
```

Impossible avec PNG/JPEG sans recharger une nouvelle image.

### 4. Accessible et SEO-friendly

Le texte dans un SVG est du vrai texte :
- Sélectionnable
- Indexé par Google
- Lu par les lecteurs d'écran pour l'accessibilité
- Traduisible

### 5. Performance web

- Fichiers légers = chargement rapide
- Mis en cache par le navigateur
- Peuvent être inline dans le HTML (pas de requête HTTP supplémentaire)

---

## Comment fonctionne SVG

### Le principe vectoriel

Au lieu de définir chaque pixel, SVG définit des **formes géométriques**.

**Exemple : dessiner un cercle**

**PNG :** 
```
Pixel (100, 100) = rouge
Pixel (101, 100) = rouge
Pixel (102, 99) = rouge
... (des milliers de pixels à définir)
```

**SVG :**
```xml
<circle cx="100" cy="100" r="50" fill="red"/>
```

Cette unique ligne dit :
- Centre à la position (100, 100)
- Rayon de 50 unités
- Rempli de rouge

### Les éléments de base

SVG comprend plusieurs formes simples :

**Formes géométriques :**
- Cercles et ellipses
- Rectangles (avec coins arrondis possibles)
- Lignes
- Polygones (triangles, étoiles, etc.)

**Éléments avancés :**
- Chemins complexes (courbes de Bézier)
- Texte
- Images embarquées
- Gradients et motifs

### Le système de coordonnées

SVG utilise un plan avec :
- Origine (0,0) en haut à gauche
- X augmente vers la droite
- Y augmente vers le bas

```
(0,0) ──────────► X
  │
  │
  │
  ▼
  Y
```

### Le ViewBox : la clé du responsive

Le **ViewBox** définit le système de coordonnées interne du SVG.

```xml
<svg width="200" height="200" viewBox="0 0 100 100">
  <circle cx="50" cy="50" r="40"/>
</svg>
```

Ici :
- La taille d'affichage est 200x200 pixels
- Mais le système interne va de 0 à 100
- Le cercle au centre (50, 50) sera toujours centré, quelle que soit la taille finale

**Analogie :** Le ViewBox est comme une fenêtre. Vous pouvez agrandir ou rétrécir la fenêtre, mais ce qu'elle cadre reste proportionnel.

---

## SVG dans le web

### Méthodes d'intégration

#### 1. Fichier externe (comme une image)

```html
<img src="logo.svg" alt="Mon logo">
```

**Avantages :**
- Simple
- Mise en cache navigateur

**Limitations :**
- Pas de modification CSS/JavaScript depuis la page
- Pas d'interactivité

#### 2. Background CSS

```css
.header {
  background-image: url('pattern.svg');
}
```

**Avantages :**
- Séparation contenu/style
- Répétition facile pour motifs

**Limitations :**
- Pas d'interactivité

#### 3. Inline (dans le HTML)

```html
<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100">
  <circle cx="50" cy="50" r="40" fill="red"/>
</svg>
```

**Avantages :**
- Modifiable avec CSS de la page
- Interactif avec JavaScript
- Pas de requête HTTP supplémentaire

**Limitations :**
- Alourdit le HTML
- Pas de cache séparé

#### 4. Object ou Iframe

```html
<object data="image.svg" type="image/svg+xml"></object>
```

Rarement utilisé aujourd'hui.

### Compatibilité navigateurs

**Support aujourd'hui : ~99% des utilisateurs**

Tous les navigateurs modernes supportent SVG :
- Chrome, Firefox, Safari, Edge
- Mobiles iOS et Android
- Depuis IE9 (2011)

Seul IE8 et antérieurs ne supportent pas SVG (usage négligeable aujourd'hui).

---

## Créer et éditer des SVG

### Outils graphiques (WYSIWYG)

**Adobe Illustrator**
- Outil professionnel de référence
- Excellent export SVG
- Payant

**Inkscape**
- Alternative gratuite et open-source
- Très puissant
- Interface peut être complexe

**Figma / Sketch**
- Outils de design UI/UX modernes
- Export SVG intégré
- Figma gratuit pour usage personnel

**Affinity Designer**
- Alternative abordable à Illustrator
- Bonne qualité d'export SVG

### Outils en ligne

**Vectr**
- Gratuit, dans le navigateur
- Simple pour débuter

**SVG-Edit**
- Open-source, en ligne
- Basique mais fonctionnel

**Boxy SVG**
- Extension Chrome
- Interface intuitive

### Édition de code

Les SVG peuvent être créés et modifiés directement en code :

**Éditeurs de texte :**
- VS Code (avec extensions SVG)
- Sublime Text
- Atom

**Avantages de l'édition code :**
- Contrôle total
- Optimisation fine
- Génération dynamique
- Intégration avec JavaScript

### Génération par code

SVG peut être généré dynamiquement :

```javascript
// JavaScript
const svg = document.createElementNS('http://www.w3.org/2000/svg', 'svg');
const circle = document.createElementNS('http://www.w3.org/2000/svg', 'circle');
circle.setAttribute('cx', '50');
circle.setAttribute('cy', '50');
circle.setAttribute('r', '40');
svg.appendChild(circle);
```

Utilisé pour :
- Graphiques de données (charts)
- Visualisations interactives
- Générateurs de formes

---

## SVG vs autres formats

### SVG vs PNG

| Critère | SVG | PNG |
|---------|-----|-----|
| Type | Vectoriel | Matriciel |
| Qualité agrandie | Parfaite | Se dégrade |
| Taille (logo simple) | 1-5 KB | 10-100 KB |
| Taille (photo) | Inadapté | Moyenne |
| Modifiable CSS/JS | Oui | Non |
| Animation | Oui (légère) | Non |
| Transparence | Oui | Oui |
| Support navigateurs | 99%+ | 100% |
| Bon pour | Logos, icônes, illustrations | Screenshots, images complexes |

### SVG vs JPEG

| Critère | SVG | JPEG |
|---------|-----|------|
| Type | Vectoriel | Matriciel |
| Compression | Sans perte | Avec perte |
| Photos | Non adapté | Excellent |
| Graphiques nets | Excellent | Artefacts |
| Transparence | Oui | Non |
| Taille (photo) | Inadapté | Très petite |
| Animation | Oui | Non |

### SVG vs GIF

| Critère | SVG | GIF |
|---------|-----|-----|
| Animation | CSS/SMIL | Native |
| Couleurs | Illimitées | 256 max |
| Qualité | Parfaite | Limitée |
| Transparence | Alpha complet | Binaire |
| Taille | Très petite | Moyenne à grande |
| Bon pour | Icônes animées | Animations complexes courtes |

### SVG vs WebP

| Critère | SVG | WebP |
|---------|-----|------|
| Type | Vectoriel | Matriciel |
| Taille (logo) | Plus petit | Plus grand |
| Taille (photo) | Inadapté | Très petit |
| Scalabilité | Infinie | Limitée |
| Support | 99% | 96% |
| Bon pour | Formes simples | Photos, images complexes |

### SVG vs Canvas (HTML5)

| Critère | SVG | Canvas |
|---------|-----|--------|
| Type | DOM (éléments) | Bitmap dessiné |
| Performance | Bon (peu d'objets) | Excellent (beaucoup d'objets) |
| Interactivité | Facile (événements DOM) | Manuel (calcul positions) |
| Accessibilité | Excellente | Difficile |
| SEO | Indexable | Non indexable |
| Bon pour | UI, icônes, graphiques | Jeux, visualisations complexes |

---

## Utilisation pratique

### Icônes de sites web

**Avant (avec PNG) :**
```html
<img src="icon-home.png" alt="Accueil">
<img src="icon-home@2x.png" alt="Accueil"> <!-- Pour écrans Retina -->
```

**Maintenant (avec SVG) :**
```html
<img src="icon-home.svg" alt="Accueil">
<!-- Une seule image, net partout -->
```

Ou encore mieux, inline :
```html
<svg class="icon" viewBox="0 0 24 24">
  <path d="M10 20v-6h4v6h5v-8h3L12 3 2 12h3v8z"/>
</svg>
```

Puis stylisé avec CSS :
```css
.icon {
  width: 24px;
  height: 24px;
  fill: currentColor; /* Prend la couleur du texte */
}

.icon:hover {
  fill: blue;
}
```

### Logos responsive

```html
<svg class="logo" viewBox="0 0 200 60">
  <!-- Contenu du logo -->
</svg>
```

```css
.logo {
  width: 100%;
  max-width: 200px;
  height: auto;
}

/* Sur mobile */
@media (max-width: 768px) {
  .logo {
    max-width: 120px;
  }
}
```

Le logo s'adapte automatiquement tout en restant parfaitement net.

### Graphiques et data visualization

Bibliothèques utilisant SVG :
- **D3.js** : visualisations complexes et interactives
- **Chart.js** : graphiques simples (peut aussi utiliser Canvas)
- **Recharts** : graphiques pour React
- **ApexCharts** : graphiques modernes

Exemple simple :
```html
<svg viewBox="0 0 200 100">
  <!-- Bar chart simple -->
  <rect x="10" y="40" width="30" height="60" fill="steelblue"/>
  <rect x="50" y="20" width="30" height="80" fill="steelblue"/>
  <rect x="90" y="50" width="30" height="50" fill="steelblue"/>
</svg>
```

### Animations et interactivité

**Animation CSS :**
```html
<svg class="spinner" viewBox="0 0 50 50">
  <circle cx="25" cy="25" r="20" fill="none" stroke="blue" stroke-width="3"/>
</svg>
```

```css
.spinner circle {
  animation: spin 2s linear infinite;
  transform-origin: center;
}

@keyframes spin {
  from { transform: rotate(0deg); }
  to { transform: rotate(360deg); }
}
```

**Interactivité JavaScript :**
```javascript
const circle = document.querySelector('circle');

circle.addEventListener('click', () => {
  circle.setAttribute('fill', 'red');
});
```

### Motifs et textures

```html
<svg>
  <defs>
    <pattern id="points" width="10" height="10" patternUnits="userSpaceOnUse">
      <circle cx="5" cy="5" r="2" fill="blue"/>
    </pattern>
  </defs>
  
  <rect width="200" height="200" fill="url(#points)"/>
</svg>
```

Crée un rectangle rempli d'un motif de points répétés.

---

## Avantages et limitations

### Avantages

✅ **Qualité parfaite à toute taille**
- Aucune pixellisation
- Idéal pour responsive design

✅ **Fichiers très légers**
- Pour les formes simples
- Réduit la bande passante

✅ **Modifiable et stylisable**
- CSS pour les couleurs, tailles
- JavaScript pour l'interactivité

✅ **Accessible**
- Texte sélectionnable
- Lecteurs d'écran
- SEO

✅ **Animable**
- CSS animations
- JavaScript
- SMIL (animations natives SVG)

✅ **Éditable**
- Fichiers texte
- Outils graphiques ou code

✅ **Réutilisable**
- Symboles et composants
- Pas besoin de multiples versions

### Limitations

❌ **Pas adapté aux photos**
- Les images complexes deviennent lourdes
- PNG/JPEG bien meilleurs pour photos

❌ **Performance avec beaucoup d'objets**
- Milliers d'éléments = ralentissements
- Canvas HTML5 meilleur pour cela

❌ **Courbe d'apprentissage**
- Concepts vectoriels à comprendre
- Outils professionnels (Illustrator) complexes

❌ **Rendu légèrement différent**
- Peut varier très légèrement entre navigateurs
- Antialiasing différent

❌ **Effets complexes limités**
- Pas d'ombres portées natives (utilisent filtres)
- Effets de flou gourmands en ressources

❌ **Ancien IE**
- IE8 et inférieurs non supportés
- Mais usage négligeable aujourd'hui (<0.1%)

---

## Cas d'usage courants

### ✅ Parfait pour SVG

**Logos et identité visuelle**
- Scalable parfait
- Modification facile des couleurs
- Fichiers légers

**Icônes et pictogrammes**
- Librairies d'icônes (Font Awesome, Material Icons en SVG)
- Icônes d'interface
- Symboles

**Illustrations simples**
- Dessins géométriques
- Flat design
- Infographies

**Graphiques de données**
- Charts et diagrammes
- Visualisations interactives
- Dashboards

**Patterns et motifs**
- Backgrounds répétitifs
- Textures
- Décorations

**Animations légères**
- Boutons animés
- Loaders
- Transitions UI

**Cartes et plans**
- Plans interactifs
- Cartes géographiques simplifiées
- Schémas techniques

### ❌ À éviter avec SVG

**Photos et images réalistes**
→ Utiliser JPEG ou WebP

**Animations complexes**
→ Utiliser GIF, WebP animé, ou vidéo

**Milliers d'objets**
→ Utiliser Canvas HTML5

**Images détaillées avec dégradés complexes**
→ Utiliser PNG ou JPEG

**Screenshots et captures d'écran**
→ Utiliser PNG

---

## Ressources et outils

### Apprendre

**Documentation officielle**
- MDN Web Docs (Mozilla) : guide SVG complet
- W3C SVG Specification : documentation technique

**Tutoriels**
- CSS-Tricks : "A Compendium of SVG Information"
- SVG Basics (cours en ligne gratuits)

### Bibliothèques d'icônes SVG

- **Heroicons** : icônes modernes, gratuites
- **Feather Icons** : icônes minimalistes
- **Font Awesome** : version SVG disponible
- **Material Icons** : design Google
- **Ionicons** : icônes pour mobile

### Outils d'optimisation

**SVGO (SVG Optimizer)**
- Ligne de commande
- Retire code inutile
- Réduit la taille de 30-70%

**SVGOMG**
- Version web de SVGO
- Interface visuelle
- https://jakearchibald.github.io/svgomg/

**Optimisation manuelle**
- Supprimer métadonnées
- Simplifier chemins
- Arrondir décimales

### Générateurs

**Blobmaker** : formes organiques abstraites
**Get Waves** : générateur de vagues
**SVG Backgrounds** : patterns et backgrounds
**Haikei** : générateur de formes et patterns

---

## Résumé des points clés

1. **SVG = Vectoriel** : basé sur formules mathématiques, pas pixels

2. **Scalable** : qualité parfaite à toutes les tailles

3. **Léger** : fichiers texte très compacts pour formes simples

4. **Éditable** : modifiable avec CSS, JavaScript, outils graphiques

5. **Accessible** : texte indexable, lecteurs d'écran, SEO

6. **Responsive natif** : s'adapte automatiquement aux écrans

7. **Bon pour** : logos, icônes, illustrations, graphiques

8. **Pas bon pour** : photos, images complexes, animations lourdes

9. **Support universel** : 99% des navigateurs (tous les modernes)

10. **Format d'avenir** : standard du web pour graphiques vectoriels

---

## Conclusion

Le SVG est devenu **incontournable dans le développement web moderne**. Sa capacité à rester net sur tous les écrans, sa légèreté et sa flexibilité en font le choix privilégié pour :

- Les logos et identités visuelles
- Les systèmes d'icônes
- Les illustrations d'interfaces
- Les visualisations de données

Bien que non adapté aux photographies, SVG excelle dans tout ce qui relève du **graphisme vectoriel**. Avec la montée des écrans haute résolution et du responsive design, maîtriser SVG est une compétence essentielle pour tout développeur ou designer web.

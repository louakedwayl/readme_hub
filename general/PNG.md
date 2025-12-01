# Cours complet sur le format PNG

## Table des matières
1. [Introduction](#introduction)
2. [Histoire et contexte](#histoire-et-contexte)
3. [Caractéristiques techniques](#caractéristiques-techniques)
4. [La compression PNG](#la-compression-png)
5. [Les canaux et la transparence](#les-canaux-et-la-transparence)
6. [PNG vs autres formats](#png-vs-autres-formats)
7. [Utilisation pratique](#utilisation-pratique)
8. [Optimisation des PNG](#optimisation-des-png)
9. [Cas d'usage recommandés](#cas-dusage-recommandés)

---

## Introduction

Le **PNG (Portable Network Graphics)** est un format d'image matricielle (bitmap) créé pour remplacer le format GIF. C'est aujourd'hui l'un des formats d'image les plus utilisés sur le web et dans le design numérique.

### Pourquoi PNG ?
- Compression sans perte de qualité
- Support de la transparence avancée
- Format ouvert et libre de droits
- Excellente qualité pour les graphiques

---

## Histoire et contexte

### Création (1996)
Le PNG a été développé en réponse à un problème juridique avec le format GIF. En 1994, la société Unisys a commencé à réclamer des royalties sur l'algorithme de compression LZW utilisé par les GIF.

### Chronologie
- **1995** : Début du développement par un groupe de développeurs
- **1996** : Première spécification PNG 1.0
- **1996** : Recommandation du W3C
- **2003** : PNG devient un standard ISO
- **Aujourd'hui** : Support universel dans tous les navigateurs et logiciels

### Signification du nom
- **Officiel** : Portable Network Graphics
- **Récursif humoristique** : PNG's Not GIF

---

## Caractéristiques techniques

### Type d'image
PNG est un format **matricielle** (raster/bitmap) :
- L'image est composée de pixels individuels
- Chaque pixel a une position fixe (coordonnées x, y)
- Chaque pixel a une couleur définie

### Profondeurs de couleur supportées

#### 1. Niveaux de gris (Grayscale)
- 1 bit : noir et blanc pur (2 couleurs)
- 2 bits : 4 nuances de gris
- 4 bits : 16 nuances de gris
- 8 bits : 256 nuances de gris
- 16 bits : 65 536 nuances de gris

#### 2. Couleurs indexées (Palette)
- 1 bit : 2 couleurs
- 2 bits : 4 couleurs
- 4 bits : 16 couleurs
- 8 bits : 256 couleurs (comme GIF)

#### 3. Couleurs vraies (Truecolor)
- 24 bits : 16,7 millions de couleurs (8 bits par canal RGB)
- 48 bits : 281 trillions de couleurs (16 bits par canal RGB)

### Structure d'un fichier PNG

Un fichier PNG se compose de :

1. **Signature** (8 octets) : identifie le fichier comme PNG
2. **Chunks (morceaux)** : blocs de données

```
Signature PNG : 89 50 4E 47 0D 0A 1A 0A
```

#### Chunks principaux

**IHDR (Image Header)** - Obligatoire
- Largeur et hauteur
- Profondeur de bits
- Type de couleur
- Méthode de compression
- Méthode de filtrage
- Entrelacement

**PLTE (Palette)** - Obligatoire pour images indexées
- Contient jusqu'à 256 entrées RGB

**IDAT (Image Data)** - Obligatoire
- Contient les données compressées de l'image

**IEND (Image End)** - Obligatoire
- Marque la fin du fichier

**Chunks optionnels :**
- tRNS : transparence
- gAMA : correction gamma
- cHRM : chromaticité
- tEXt : métadonnées textuelles
- tIME : timestamp de dernière modification

---

## La compression PNG

### Principe : compression sans perte

Contrairement au JPEG, PNG utilise une **compression sans perte** (lossless) :
- L'image décompressée est identique pixel par pixel à l'original
- Aucune dégradation de qualité
- Idéal pour les graphiques nécessitant une précision parfaite

### Algorithme de compression

PNG utilise la méthode **DEFLATE** en deux étapes :

#### Étape 1 : Filtrage (pré-compression)
Avant compression, chaque ligne de pixels peut être filtrée selon 5 méthodes :

1. **None (0)** : aucun filtre
2. **Sub (1)** : différence avec pixel précédent
3. **Up (2)** : différence avec pixel au-dessus
4. **Average (3)** : moyenne des deux
5. **Paeth (4)** : prédiction Paeth (algorithme complexe)

Le filtre optimal est choisi ligne par ligne pour maximiser la compression.

#### Étape 2 : Compression DEFLATE
- Combinaison de LZ77 (dictionnaire) et codage Huffman
- Même algorithme que ZIP et GZIP
- Très efficace sur les motifs répétitifs

### Exemple de compression

```
Image avec beaucoup de zones unies :
Taux de compression : 80-90%

Image type photo avec beaucoup de détails :
Taux de compression : 10-30%

Image avec texte ou graphiques vectoriels :
Taux de compression : 70-95%
```

---

## Les canaux et la transparence

### Les canaux de couleur

Un pixel PNG peut contenir plusieurs canaux :

#### RGB (couleurs)
- **R** (Red) : rouge (0-255 en 8 bits)
- **G** (Green) : vert (0-255 en 8 bits)
- **B** (Blue) : bleu (0-255 en 8 bits)

#### Canal Alpha (transparence)
- **A** (Alpha) : opacité (0-255 en 8 bits)
  - 0 = complètement transparent
  - 255 = complètement opaque
  - 1-254 = semi-transparent

### Types de transparence PNG

#### 1. Transparence binaire (1 bit)
- Un pixel est soit transparent, soit opaque
- Similaire au GIF
- Utilisé avec chunk tRNS

#### 2. Transparence alpha (8 bits)
- 256 niveaux de transparence
- Permet des bords lisses et anti-aliasing
- **Avantage majeur du PNG sur le GIF**

### Exemple pratique

```
PNG-8 (palette) + tRNS :
- 256 couleurs
- 1 couleur peut être transparente
- Taille de fichier réduite

PNG-24 (RGB) :
- 16,7 millions de couleurs
- Pas de transparence
- ~33% plus léger que PNG-32

PNG-32 (RGBA) :
- 16,7 millions de couleurs
- 256 niveaux de transparence
- Meilleure qualité mais plus lourd
```

---

## PNG vs autres formats

### PNG vs JPEG

| Critère | PNG | JPEG |
|---------|-----|------|
| Compression | Sans perte | Avec perte |
| Qualité | Parfaite | Dégradée (selon taux) |
| Transparence | Oui (alpha) | Non |
| Taille (photo) | Grande | Petite |
| Taille (graphique) | Petite | Grande |
| Meilleur pour | Logos, icônes, texte | Photos |

### PNG vs GIF

| Critère | PNG | GIF |
|---------|-----|-----|
| Couleurs max | 16,7M (truecolor) | 256 |
| Transparence | Alpha 256 niveaux | Binaire (on/off) |
| Animation | Non (APNG existe) | Oui |
| Compression | Meilleure | Moins bonne |
| Brevets | Libre | Libre maintenant |

### PNG vs WebP

| Critère | PNG | WebP |
|---------|-----|------|
| Compression | Bonne | Excellente |
| Qualité | Parfaite | Parfaite ou avec perte |
| Transparence | Oui | Oui |
| Support navigateurs | 100% | ~96% (2025) |
| Taille fichier | Plus grande | Plus petite (30-50%) |

### PNG vs SVG

| Critère | PNG | SVG |
|---------|-----|-----|
| Type | Matriciel (pixels) | Vectoriel (maths) |
| Scalabilité | Perd qualité | Parfaite à toute taille |
| Photos | Oui | Non |
| Graphiques simples | Oui | Mieux |
| Taille (logo) | Plus grande | Plus petite |
| Éditable | Pixels seulement | Code/formes |

---

## Utilisation pratique

### Dans le HTML

```html
<!-- Image PNG simple -->
<img src="logo.png" alt="Logo de l'entreprise">

<!-- PNG avec attributs responsive -->
<img src="photo.png" 
     alt="Description" 
     width="800" 
     height="600"
     loading="lazy">

<!-- Avec srcset pour différentes résolutions -->
<img src="logo.png"
     srcset="logo@2x.png 2x, logo@3x.png 3x"
     alt="Logo">
```

### Dans le CSS

```css
/* Image de fond */
.header {
  background-image: url('background.png');
  background-size: cover;
}

/* Icône avec PNG transparent */
.icon {
  background: url('icon.png') no-repeat center;
  background-size: contain;
}

/* Sprite PNG (technique classique) */
.sprite {
  background: url('sprites.png') no-repeat;
  background-position: -50px -100px;
  width: 32

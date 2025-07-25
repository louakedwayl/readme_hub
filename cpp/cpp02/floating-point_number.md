# Nombres à Virgule Fixe et Nombres à Virgule Flottante

## 1/ Introduction :

En informatique, représenter des nombres réels (avec une partie décimale) est essentiel,
que ce soit pour les calculs scientifiques, graphiques ou financiers.  
Deux méthodes principales existent pour représenter ces nombres :

1. **Les nombres à virgule fixe (fixed-point)**  
2. **Les nombres à virgule flottante (floating-point)**

---

## 2/ Nombres à Virgule Fixe :

### Définition :

Un nombre à virgule fixe est un nombre réel où la position de la virgule décimale est fixée 
à l’avance. On représente généralement le nombre sous forme d’entier, en supposant que 
certaines positions sont réservées à la partie fractionnaire.

### Exemple :

Si on décide que 2 chiffres sont après la virgule, alors `1234` représente `12.34`.

### Représentation :

- Stocké comme un entier (par exemple sur 16 bits).  
- On connaît à l’avance combien de bits sont pour la partie entière 
et combien pour la partie fractionnaire.

### Avantages :

- Plus rapide et plus simple à calculer (surtout pour les microcontrôleurs).  
- Pas de problèmes d’arrondi aléatoires comme avec le flottant.  
- Précision constante.

---

## 3/ Nombres à Virgule Flottante :

### Définition :

Un nombre à virgule flottante représente un nombre réel en utilisant une notation 
scientifique du type :

\[
\text{nombre} = \text{mantisse} \times \text{base}^{\text{exposant}}
\]

**Exemple :**  
`123.45` pourrait être représenté comme `1.2345 × 10²`.

En binaire, on utilise la base 2 :

- **Mantisse (ou significande)** : les chiffres significatifs  
- **Exposant** : détermine où se place la virgule  

### Représentation (IEEE 754) :

- **Format standard :**
  - `32 bits (float)` : 1 bit signe, 8 bits exposant, 23 bits mantisse  
  - `64 bits (double)` : 1 bit signe, 11 bits exposant, 52 bits mantisse  

### Avantages :

- Peut représenter des valeurs très grandes ou très petites.  
- Plus de flexibilité dans les plages de valeur.

### Inconvénients :

- Plus complexe à calculer (plus lent sur certaines architectures).  
- Peut générer des erreurs d’arrondi.  
- Précision relative : moins précise pour les très grands ou très petits nombres proches les uns des autres.

---

## 5/ Quand utiliser quoi ?

### Virgule Fixe :

- Applications temps réel  
- Systèmes embarqués, microcontrôleurs  
- Calculs financiers (où la précision fixe est plus fiable)

### Virgule Flottante :

- Calcul scientifique ou graphique  
- Modélisation physique, machine learning  
- Besoin d’une grande plage dynamique


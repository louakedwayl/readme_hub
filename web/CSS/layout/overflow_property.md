# 🎨 La propriété `overflow` en CSS

## Valeur initiale et héritage
- **Valeur initiale (par défaut)** : `visible`.
- **Héritage** : `overflow` **n'est pas hérité**. Chaque élément utilise sa propre valeur (ou la valeur initiale si aucune n'est définie).
- Les propriétés **`overflow-x`** et **`overflow-y`** ont aussi `visible` comme valeur initiale.

## 1. Définition
La propriété **`overflow`** contrôle ce qui se passe quand le **contenu d’un élément dépasse sa boîte** (sa zone définie par `width` et `height`).  
Par défaut, le contenu est visible même s’il déborde, mais on peut changer ce comportement.

---

## 2. Les valeurs possibles

### 🔹 `visible` (par défaut)
- Le contenu qui dépasse est affiché **en dehors** de la boîte.  
- Aucun rognage ni barre de défilement.

```css
.box {
  width: 200px;
  height: 100px;
  overflow: visible; /* par défaut */
}
```

### 🔹 `hidden`
- Le contenu qui dépasse est **coupé** (non visible).  
- Pas de barre de défilement.

```css
.box {
  overflow: hidden;
}
```

### 🔹 `scroll`
- Le contenu qui dépasse est **coupé** mais **des barres de défilement apparaissent toujours** (horizontal et/ou vertical), même si elles ne sont pas nécessaires.

```css
.box {
  overflow: scroll;
}
```

### 🔹 `auto`
- Le contenu est coupé **et des barres de défilement apparaissent seulement si nécessaire**.  
- C’est la valeur la plus utilisée.

```css
.box {
  overflow: auto;
}
```

---

## 3. Variantes spécifiques

Il existe aussi des propriétés spécifiques à chaque axe :

- **`overflow-x`** : contrôle le débordement **horizontal** (gauche ↔ droite).  
- **`overflow-y`** : contrôle le débordement **vertical** (haut ↕ bas).

Exemple :

```css
.box {
  overflow-x: scroll; /* barre horizontale obligatoire */
  overflow-y: hidden; /* pas de barre verticale */
}
```

---

## 4. Cas particuliers

### 🔸 Conteneurs avec `position: absolute` ou `fixed`
L’overflow agit toujours par rapport à la boîte de l’élément, même si celui-ci est positionné.

### 🔸 Avec `white-space: nowrap`
Si on empêche le retour à la ligne, l’overflow horizontal devient fréquent, et on peut utiliser `overflow-x: auto;`.

```css
.text {
  white-space: nowrap;
  overflow-x: auto;
}
```

### 🔸 Création de scroll interne
On peut créer une **zone défilante** à l’intérieur d’un élément fixe.

```css
.chat-box {
  width: 300px;
  height: 200px;
  overflow-y: auto;
  border: 1px solid gray;
}
```

---

## 5. Résumé rapide

| Valeur    | Effet |
|-----------|--------------------------------|
| `visible` | Contenu visible même hors boîte |
| `hidden`  | Contenu coupé, pas de scroll |
| `scroll`  | Contenu coupé, scroll toujours affiché |
| `auto`    | Contenu coupé, scroll seulement si besoin |

---

## 6. Astuce pratique
Si tu veux une zone qui défile seulement verticalement, utilise `overflow-y: auto` et `overflow-x: hidden` pour éviter un débordement horizontal imprévu.

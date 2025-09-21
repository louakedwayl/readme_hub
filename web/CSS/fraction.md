# 🎯 Les valeurs fractionnées (`fr`) en CSS

## 1. Définition
La valeur `fr` est une unité spécifique à **CSS Grid Layout**.  
Elle signifie **fraction de l’espace disponible**.  

- `1fr` = une part de l’espace restant dans le conteneur.  
- `2fr` = deux parts de l’espace restant (donc deux fois plus que `1fr`).  

👉 Contrairement aux unités comme `px`, `%`, `em`… la valeur `fr` ne correspond pas à une taille fixe, mais à un **partage proportionnel**.

---

## 2. Exemple simple
```css
.container {
  display: grid;
  grid-template-columns: 1fr 1fr 1fr;
}
```

➡️ Ici, le conteneur est divisé en **3 colonnes égales**.  
Chaque colonne occupe **1/3 de l’espace disponible**.

---

## 3. Mélange avec d’autres unités
Les `fr` peuvent se combiner avec d’autres valeurs fixes :

```css
.container {
  display: grid;
  grid-template-columns: 200px 1fr 2fr;
}
```

- Première colonne : largeur fixe de `200px`.  
- Les deux autres colonnes partagent l’espace restant :  
  - `1fr` → 1 part  
  - `2fr` → 2 parts  

👉 Donc, la 3ème colonne est **deux fois plus large** que la 2ème.

---

## 4. Cas avec plusieurs `fr`
```css
.container {
  display: grid;
  grid-template-columns: 1fr 2fr 3fr;
}
```

- Total de fractions = `1 + 2 + 3 = 6 parts`.  
- Première colonne → 1/6 de l’espace.  
- Deuxième → 2/6 = 1/3.  
- Troisième → 3/6 = 1/2.  

---

## 5. Comparaison avec `%`
- `%` → basé sur **la taille totale du conteneur**, sans tenir compte des marges fixes des autres colonnes.  
- `fr` → basé sur **l’espace restant** après avoir retiré les colonnes fixes.  

Exemple :
```css
grid-template-columns: 50% 200px 1fr;
```
- Colonne 1 : prend 50% direct.  
- Colonne 2 : prend 200px fixe.  
- Colonne 3 : prend ce qui reste.

---

## 6. Avantages de `fr`
✅ Simplicité : pas besoin de calculer en `%` ou `calc()`.  
✅ Flexible : s’adapte automatiquement à la taille du conteneur.  
✅ Lisible : facilite la compréhension de la mise en page.  

---

## 7. Exemple pratique
```html
<div class="container">
  <div>A</div>
  <div>B</div>
  <div>C</div>
</div>
```

```css
.container {
  display: grid;
  grid-template-columns: 150px 1fr 2fr;
  gap: 10px;
}

.container div {
  background: lightblue;
  text-align: center;
  padding: 20px;
}
```

➡️ Ici :  
- `A` fait 150px fixe,  
- `B` prend une part,  
- `C` prend deux parts (donc deux fois la taille de `B`).

---

✨ En résumé :  
L’unité `fr` est **la brique de base pour gérer des grilles flexibles** avec CSS Grid.  
Elle répartit l’espace disponible proportionnellement, et s’adapte automatiquement aux tailles fixes déjà présentes.

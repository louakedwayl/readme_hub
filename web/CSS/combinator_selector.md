# CSS – Sélecteurs Combinators

Les **combinators** en CSS permettent de **cibler des éléments selon leur relation dans le DOM**.  
Ils affinent la sélection pour appliquer des styles précis.

---

## 1. Sélecteur enfant direct `>`

✔ Cible uniquement les **enfants directs** d’un élément.  
❌ Ne sélectionne pas les descendants plus profonds.

```css
div > p {
  color: red;
}
```

**Schéma :**

```html
<div>
  <p>✅ Sélectionné</p>
  <span>
    <p>❌ Non sélectionné</p>
  </span>
</div>
```

---

## 2. Sélecteur frère immédiat `+`

✔ Cible **le premier frère immédiat** qui suit un élément.  
❌ Ignore les autres frères.

```css
h2 + p {
  font-weight: bold;
}
```

**Schéma :**

```html
<h2>Titre</h2>
<p>✅ Ce paragraphe est sélectionné</p>
<p>❌ Celui-ci ne l'est pas</p>
```

---

## 3. Sélecteur frère général `~`

✔ Cible **tous les frères suivants** d’un élément (au même niveau).  
❌ Ne sélectionne pas les éléments qui précèdent.

```css
h2 ~ p {
  color: blue;
}
```

**Schéma :**

```html
<h2>Titre</h2>
<p>✅ Sélectionné</p>
<p>✅ Sélectionné</p>
<p>✅ Sélectionné</p>
```

---

## 4. Sélecteur descendant (espace ` `)

✔ Cible **tous les descendants**, peu importe leur niveau.  

```css
div p {
  font-size: 16px;
}
```

**Schéma :**

```html
<div>
  <p>✅ Sélectionné</p>
  <span>
    <p>✅ Sélectionné aussi</p>
  </span>
</div>
```

---

## 5. Résumé visuel

| Sélecteur    | Signification                         |
| ------------ | ------------------------------------- |
| `>`          | Enfant direct                         |
| `+`          | Frère immédiat                        |
| `~`          | Tous les frères suivants              |
| ` ` (espace) | Descendant (tous les niveaux imbriqués)|

---

✅ Les combinators permettent donc d’écrire du CSS **plus précis et efficace** pour styliser vos pages web.

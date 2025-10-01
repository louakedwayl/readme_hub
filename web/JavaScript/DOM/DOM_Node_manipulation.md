# Manipuler les nœuds DOM avec `childNodes` et `textContent`

## 1. Introduction

En JavaScript, chaque élément HTML dans le DOM est un **nœud**. Ces nœuds peuvent être :

* **Éléments HTML** (`<div>`, `<p>`, `<a>`, etc.)
* **Nœuds texte** (le texte entre les balises)
* **Commentaires** (`<!-- commentaire -->`)

Pour manipuler ces nœuds, le DOM fournit plusieurs propriétés, dont **`childNodes`**.

---

## 2. La propriété `childNodes`

`childNodes` est une propriété disponible sur tous les nœuds DOM (`Node`) et donc sur tous les éléments HTML (`HTMLElement`).

```ts
const footerP = document.querySelector("footer p") as HTMLElement;
console.log(footerP.childNodes);
```

* Retourne une **NodeList** contenant **tous les enfants** du nœud, y compris le texte et les commentaires.
* Chaque élément de `childNodes` est un nœud (`Node`).

### Exemple HTML

```html
<p>© 2025 Wayl Louaked. Ce projet est licencié sous
  <a href="https://opensource.org/licenses/MIT" target="_blank">MIT License</a>
</p>
```

* `footerP.childNodes[0]` → nœud texte `"© 2025 Wayl Louaked. Ce projet est licencié sous "`
* `footerP.childNodes[1]` → élément `<a>`
* `footerP.childNodes[2]` → nœud texte `"."` (si présent après le lien)

---

## 3. Modifier le texte avec `textContent`

La propriété `textContent` permet de **lire ou modifier le texte d’un nœud**, sans toucher aux attributs ni au HTML des enfants.

```ts
const footerlink = document.querySelector("footer a") as HTMLAnchorElement;

// Lire le texte actuel
console.log(footerlink.textContent); // "MIT License"

// Modifier le texte
footerlink.textContent = "Licence MIT";
```

Résultat dans le DOM :

```html
<a href="https://opensource.org/licenses/MIT" target="_blank">Licence MIT</a>
```

---

## 4. Exemple complet : modifier le texte du footer et du lien

```ts
const footerP = document.querySelector("footer p") as HTMLElement;
const footerlink = document.querySelector("footer a") as HTMLAnchorElement;

if (footerP && footerlink) {
    // Texte avant le lien
    footerP.childNodes[0].textContent = "© 2025 Wayl Louaked. Ce projet est licencié sous ";

    // Texte du lien
    footerlink.textContent = "Licence MIT";
}
```

* Le lien `<a>` reste intact.
* Seul le texte est modifié.

---

## 5. Différence entre `childNodes` et `children`

| Propriété    | Contenu renvoyé                                                       |
| ------------ | --------------------------------------------------------------------- |
| `childNodes` | Tous les nœuds enfants (texte, élément, commentaire)                  |
| `children`   | Seulement les **éléments HTML** (ignore le texte et les commentaires) |

```ts
console.log(footerP.children); // HTMLCollection contenant uniquement <a>
console.log(footerP.childNodes); // NodeList contenant texte + <a> + texte
```

---

## 6. Bonnes pratiques

1. **Ne jamais utiliser `element.textContent` sur un parent si vous voulez garder des enfants spécifiques.**

   * Exemple : `footerP.textContent = "..."` supprime tous les enfants, y compris les liens.
2. Utiliser `childNodes` ou `querySelector` pour modifier uniquement ce que vous voulez.
3. `textContent` modifie uniquement le texte, pas le HTML ni les attributs.

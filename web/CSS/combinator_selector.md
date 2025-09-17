# CSS - Sélecteurs Combinators

En CSS, les **combinators** sont des opérateurs qui permettent de **cibler les éléments en fonction de leur relation dans le DOM**. Ils sont essentiels pour appliquer des styles précis selon la hiérarchie et la position des éléments.

## Sommaire

1. [Sélecteur enfant direct `>`](#sélecteur-enfant-direct-)
2. [Sélecteur frère immédiat `+`](#sélecteur-frère-immédiat-)
3. [Sélecteur frère général `~`](#sélecteur-frère-général-)
4. [Sélecteur descendant (espace)](#sélecteur-descendant-espace)
5. [Résumé visuel](#résumé-visuel)

## Sélecteur enfant direct `>`

* Cible uniquement les **enfants directs** d’un élément.
* Syntaxe :

```css
div > p {
  color: red;
}
```

* Exemple : seul le `<p>` directement à l’intérieur d’un `<div>` sera rouge. Les `<p>` plus profondément imbriqués ne le seront pas.

## Sélecteur frère immédiat `+`

* Cible **le premier frère immédiat** après un élément.
* Syntaxe :

```css
h2 + p {
  font-weight: bold;
}
```

* Exemple : seul le `<p>` qui suit immédiatement un `<h2>` sera en gras.

## Sélecteur frère général `~`

* Cible **tous les éléments frères** qui viennent **après** un élément, au même niveau hiérarchique.
* Syntaxe :

```css
h2 ~ p {
  color: blue;
}
```

* Exemple : tous les `<p>` qui suivent un `<h2>` au même niveau seront bleus.

## Sélecteur descendant (espace)

* Cible tous les descendants d’un élément, **pas seulement les enfants directs**.
* Syntaxe :

```css
div p {
  font-size: 16px;
}
```

* Exemple : tous les `<p>` à l’intérieur d’un `<div>`, même profondément imbriqués, auront une taille de 16px.

## Résumé visuel

| Sélecteur    | Signification                            |
| ------------ | ---------------------------------------- |
| `>`          | enfant direct                            |
| `+`          | frère immédiat                           |
| `~`          | frère général (tous les suivants)        |
| ` ` (espace) | descendant (tous les éléments imbriqués) |

Les combinators permettent donc d’écrire du CSS plus précis et efficace pour styliser vos pages web.

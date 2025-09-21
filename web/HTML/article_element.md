# L'élément `<article>` en HTML

## 1. Définition

L'élément **`<article>`** représente un **contenu autonome** et
**indépendant** qui peut être réutilisé ou distribué ailleurs sans
perdre son sens.

📌 **Idée clé :** un `<article>` doit avoir un **sens complet tout
seul**.

------------------------------------------------------------------------

## 2. Exemples typiques d'utilisation

-   Article de blog\
-   Publication d'actualité\
-   Commentaire d'utilisateur\
-   Carte de produit\
-   Post sur un forum\
-   Fiche descriptive

------------------------------------------------------------------------

## 3. Règles d'utilisation

✅ Chaque `<article>` doit avoir son **propre titre** (`<h1>`--`<h6>`)\
✅ Peut contenir des sections, des images, des paragraphes, des
listes...\
✅ Peut être **imbriqué** dans un `<section>` ou être seul dans le
`<main>`

❌ Ne pas utiliser `<article>` pour de simples blocs de mise en page
(préférer `<div>`).

------------------------------------------------------------------------

## 4. Exemple simple

``` html
<article>
  <h2>Titre de l'article</h2>
  <p>Ceci est le contenu de mon article. Il peut être lu indépendamment du reste du site.</p>
</article>
```

------------------------------------------------------------------------

## 5. Exemple plus complet (plusieurs articles)

``` html
<main>
  <h1>Dernières nouvelles</h1>

  <article>
    <h2>Article 1</h2>
    <p>Résumé de l’article 1.</p>
    <footer>
      <p>Publié le <time datetime="2025-09-21">21 septembre 2025</time></p>
    </footer>
  </article>

  <article>
    <h2>Article 2</h2>
    <p>Résumé de l’article 2.</p>
  </article>
</main>
```

------------------------------------------------------------------------

## 6. Accessibilité et SEO

-   Les `<article>` aident les **moteurs de recherche** à identifier les
    blocs de contenu principaux.\
-   Les **lecteurs d'écran** peuvent naviguer de `<article>` en
    `<article>`.\
-   Un bon usage des titres améliore la compréhension et le
    référencement.

------------------------------------------------------------------------

## 7. Comparaison avec `<section>`

| Balise       | Rôle |
|-------------|------|
| `<section>` | Regroupe un contenu lié par un thème, fait partie d'un tout |
| `<article>` | Contenu autonome qui peut être réutilisé ou lu isolément |


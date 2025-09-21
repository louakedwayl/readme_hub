# Bonnes Pratiques en Matière de Sémantique HTML

## 1. Qu'est-ce que la sémantique en HTML ?

La **sémantique** en HTML, c'est le fait d'utiliser les **balises
appropriées** pour donner du sens au contenu, et pas seulement pour la
mise en forme.\
Elle permet :\
- aux **navigateurs** de mieux interpréter le contenu,\
- aux **lecteurs d'écran** d'améliorer l'accessibilité,\
- aux **moteurs de recherche** (SEO) de mieux indexer la page.

------------------------------------------------------------------------

## 2. Principes de base

✅ Utiliser les balises **sémantiques** disponibles avant de recourir à
`<div>` ou `<span>`\
✅ Structurer la page de façon **logique et hiérarchique**\
✅ Employer les **titres** (`<h1>` à `<h6>`) dans l'ordre et sans sauter
de niveaux\
✅ Garder un code **lisible** et **cohérent**

------------------------------------------------------------------------

## 3. Structure de page recommandée

``` html
<header> ... </header>
<nav> ... </nav>
<main>
  <section>
    <h1>Titre principal</h1>
    <article>
      <h2>Sous-titre ou contenu autonome</h2>
      <p>Texte de l’article.</p>
    </article>
  </section>
</main>
<aside> ... </aside>
<footer> ... </footer>
```

------------------------------------------------------------------------

## 4. Utilisation correcte des titres

-   **Un seul `<h1>`** par page (souvent dans `<main>` ou `<header>`)\
-   Utiliser `<h2>`, `<h3>`, etc. pour les sous-parties, dans un ordre
    hiérarchique\
-   Éviter de sauter de `<h1>` à `<h4>` sans logique

Exemple correct :

``` html
<h1>Mon blog</h1>
<h2>Derniers articles</h2>
<h3>Article 1</h3>
<h3>Article 2</h3>
```

------------------------------------------------------------------------

## 5. Bon usage des balises sémantiques

  Balise                        Usage recommandé
  ----------------------------- ------------------------------------------------------
  `<header>`                    En-tête de page ou de section
  `<nav>`                       Liens de navigation principaux
  `<main>`                      Contenu principal de la page (unique)
  `<section>`                   Regroupe un contenu sur un même thème, avec un titre
  `<article>`                   Contenu autonome qui peut exister hors contexte
  `<aside>`                     Contenu complémentaire ou secondaire
  `<footer>`                    Pied de page ou de section
  `<figure>` + `<figcaption>`   Image ou illustration avec légende
  `<time>`                      Représente une date ou une heure

------------------------------------------------------------------------

## 6. Accessibilité et bonnes pratiques

-   **Toujours ajouter un attribut `alt`** aux images (`<img>`)\
-   Utiliser les balises `<label>` pour les champs de formulaire\
-   Privilégier `<button>` à `<div>` ou `<span>` pour les actions
    cliquables\
-   Respecter l'ordre naturel de lecture (éviter les sauts visuels
    uniquement via CSS)

------------------------------------------------------------------------

## 7. Erreurs fréquentes à éviter

❌ Utiliser `<div>` partout au lieu des balises sémantiques\
❌ Mettre plusieurs `<h1>` sans raison\
❌ Oublier d'ajouter des titres aux `<section>`\
❌ Utiliser `<br>` pour espacer du texte (préférer du CSS)\
❌ Mettre du texte important dans des images sans alternative textuelle

------------------------------------------------------------------------

## 8. Avantages d'un code sémantique

✅ Meilleure **accessibilité**\
✅ Meilleur **référencement naturel (SEO)**\
✅ Code plus **lisible et maintenable**\
✅ Plus facile à styliser avec CSS grâce à des sélecteurs clairs

# L'élément `<main>` en HTML

## 1. Définition

L'élément **`<main>`** représente le **contenu principal** de la page.\
Ce contenu est **unique** et doit être directement lié à l'objectif
principal du document ou de l'application.

📌 **Idée clé :** si un visiteur ne voit que le contenu de `<main>`, il
doit avoir accès à l'essentiel de la page.

------------------------------------------------------------------------

## 2. Règles d'utilisation

✅ **Un seul `<main>` par page** (sauf si on l'utilise dans des
composants réutilisés, mais jamais plusieurs en même temps dans le même
DOM).\
✅ Il doit contenir le **contenu central**, pas les en-têtes, menus ou
pieds de page.\
✅ Il peut contenir plusieurs sections, articles, divs...

❌ **Ne pas** mettre `<main>` à l'intérieur de :\
- `<article>`\
- `<aside>`\
- `<footer>`\
- `<header>`\
- `<nav>`

------------------------------------------------------------------------

## 3. Exemple simple

``` html
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Exemple avec &lt;main&gt;</title>
</head>
<body>
  <header>
    <h1>Mon site</h1>
    <nav>
      <a href="#">Accueil</a>
      <a href="#">Articles</a>
      <a href="#">Contact</a>
    </nav>
  </header>

  <main>
    <h2>Bienvenue</h2>
    <p>Voici le contenu principal de la page.</p>
  </main>

  <footer>
    <p>&copy; 2025 Mon site</p>
  </footer>
</body>
</html>
```

------------------------------------------------------------------------

## 4. Accessibilité

L'élément `<main>` aide les technologies d'assistance (lecteurs d'écran)
à **sauter directement** au contenu principal de la page.\
C'est très utile pour :\
- les utilisateurs de clavier\
- les personnes malvoyantes\
- l'optimisation SEO

> Astuce : certains navigateurs et lecteurs d'écran permettent un
> **raccourci clavier** pour aller directement à `<main>`.

------------------------------------------------------------------------

## 5. Bonnes pratiques

-   Utiliser **un seul `<main>` par page**\
-   Mettre uniquement le **contenu principal** (pas de sidebar
    secondaire si elle ne fait pas partie du cœur de la page)\
-   Ne pas le styliser uniquement pour la mise en page, mais l'utiliser
    pour **la sémantique**\
-   Toujours garder un `<main>` même si le contenu est court (améliore
    l'accessibilité)

------------------------------------------------------------------------

## 6. Comparaison rapide avec d'autres balises

  -----------------------------------------------------------------------
  Balise                                        Rôle
  --------------------------------------------- -------------------------
  `<header>`                                    En-tête de page ou de
                                                section

  `<nav>`                                       Liens de navigation
                                                principaux

  `<aside>`                                     Contenu secondaire (barre
                                                latérale, info
                                                complémentaire)

  `<footer>`                                    Pied de page

  **`<main>`**                                  Contenu principal, unique
                                                et central de la page
  -----------------------------------------------------------------------

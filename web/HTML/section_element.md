# L'élément `<section>` en HTML

## 1. Définition

L'élément **`<section>`** représente une **section thématique** d'un
document.\
Il regroupe un contenu qui partage un même sujet ou un même rôle dans la
page.

📌 **Idée clé :** chaque `<section>` doit idéalement être introduite par
un **titre** (`<h1>` à `<h6>`), car elle représente une portion autonome
du document.

------------------------------------------------------------------------

## 2. Règles d'utilisation

✅ Utiliser `<section>` pour délimiter un groupe de contenu cohérent.\
✅ Chaque section doit avoir un **titre** pour être significative.\
✅ Peut contenir d'autres balises sémantiques comme `<article>`,
`<div>`, `<p>`, etc.

❌ Ne pas utiliser `<section>` seulement pour **styler un bloc** (dans
ce cas, préférez `<div>`).

------------------------------------------------------------------------

------------------------------------------------------------------------

## 2.1. Pourquoi un titre est important ?

Un `<section>` sans titre perd sa valeur sémantique.\
- **Accessibilité :** les lecteurs d'écran utilisent les titres pour
naviguer rapidement entre sections.\
- **Structure claire :** le titre indique le sujet de la section et la
rend compréhensible.\
- **SEO :** les moteurs de recherche comprennent mieux le contenu si
chaque section a un titre.

### Exemple correct :

``` html
<section>
  <h2>Derniers articles</h2>
  <p>Voici une sélection de mes derniers articles de blog.</p>
</section>
```

### Exemple incorrect :

``` html
<section>
  <p>Voici une sélection de mes derniers articles de blog.</p>
</section>
```

Dans cet exemple, un `<div>` serait plus approprié car la section n'a
pas de titre.

------------------------------------------------------------------------



## 3. Exemple simple

``` html
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Exemple avec &lt;section&gt;</title>
</head>
<body>
  <header>
    <h1>Mon site</h1>
  </header>

  <main>
    <section>
      <h2>Présentation</h2>
      <p>Bienvenue sur mon site. Voici quelques informations sur moi.</p>
    </section>

    <section>
      <h2>Derniers articles</h2>
      <article>
        <h3>Article 1</h3>
        <p>Contenu de l'article 1.</p>
      </article>
      <article>
        <h3>Article 2</h3>
        <p>Contenu de l'article 2.</p>
      </article>
    </section>
  </main>
</body>
</html>
```

------------------------------------------------------------------------

## 4. Accessibilité et sémantique

-   Les lecteurs d'écran utilisent les titres des sections pour
    **naviguer plus vite**.\
-   Avoir des `<section>` bien nommées améliore le référencement (SEO).\
-   Évite d'utiliser `<section>` sans titre, car cela perd de son
    intérêt sémantique.

------------------------------------------------------------------------

## 5. Bonnes pratiques

-   Utiliser `<section>` pour **structurer logiquement** une page
    longue.\
-   Ajouter des titres clairs et hiérarchisés (`<h2>`, `<h3>`...) pour
    chaque section.\
-   Préférer `<div>` si vous avez juste besoin d'un conteneur sans
    signification particulière.

------------------------------------------------------------------------

## 6. Comparaison rapide avec d'autres balises

| Balise      | Rôle |
|-------------|------|
| `<div>`     | Conteneur générique sans signification sémantique |
| `<article>` | Contenu autonome qui peut exister en dehors de la page |
| `<section>` | Regroupe un contenu lié par un même sujet, avec un titre |

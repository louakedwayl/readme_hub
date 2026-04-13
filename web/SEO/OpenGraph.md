# Les Méta-données Open Graph (OG)

## 1. Qu'est-ce que l'Open Graph ?
Créé à l'origine par **Facebook** en 2010, le protocole Open Graph permet à n'importe quelle page web de devenir un objet riche dans un réseau social.

Concrètement, ce sont des balises `<meta>` que l'on place dans le `<head>` de son code HTML pour dire aux réseaux (Facebook, LinkedIn, Discord, etc.) : 
> "Voici le titre, l'image et la description que tu dois afficher."

---

## 2. Pourquoi est-ce essentiel ?
* **Taux de clic (CTR) :** Une belle image et un titre accrocheur incitent bien plus au clic qu'un lien brut.
* **Contrôle de l'image de marque :** Tu choisis exactement ce qui s'affiche au lieu de laisser l'algorithme prendre une image au hasard sur ta page.
* **Professionnalisme :** Ton contenu paraît plus crédible et "fini".

---

## 3. Les 4 Balises Obligatoires
Pour qu'un aperçu fonctionne, tu as besoin au minimum de ces quatre propriétés :

| Propriété | Rôle |
| :--- | :--- |
| `og:title` | Le titre de ta page (souvent plus court que la balise `<title>` SEO). |
| `og:type` | Le type de contenu (ex: `website`, `article`, `video.movie`). |
| `og:image` | L'URL de l'image qui servira de miniature. |
| `og:url` | L'URL canonique de la page. |

---

## 4. Exemple d'implémentation
```html
<head>
  <meta property="og:title" content="Titre de la page" />
  <meta property="og:type" content="website" />
  <meta property="og:url" content="[https://www.votre-site.com](https://www.votre-site.com)" />
  <meta property="og:image" content="[https://www.votre-site.com/image.jpg](https://www.votre-site.com/image.jpg)" />
</head>

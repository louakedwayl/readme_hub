# Éditeurs WYSIWYG

---

## 1. Définition

**WYSIWYG** = *What You See Is What You Get*

Un éditeur WYSIWYG est une interface qui permet de **créer du contenu de manière visuelle**, sans écrire directement du code HTML.  
Ce que tu vois dans l’éditeur correspond à ce que l’utilisateur final verra sur le site.

---

## 2. Objectif

- Rendre la création de contenu accessible aux non-développeurs.
- Gérer la mise en page, les styles, les médias… via une interface visuelle.
- Éviter d’écrire manuellement du HTML/CSS.

---

## 3. Fonctionnalités typiques

| Fonction               | Description                                       |
|------------------------|---------------------------------------------------|
| Barre d’outils         | Gras, italique, souligné, couleur…               |
| Gestion des liens      | Ajouter/éditer des liens hypertextes             |
| Insertion de médias    | Images, vidéos, fichiers                         |
| Listes                 | Listes à puces ou numérotées                     |
| Tableaux               | Insertion et gestion de tableaux                 |
| Code source HTML       | Accès direct au HTML généré (optionnel)         |
| Drag & Drop            | Glisser-déposer des blocs ou fichiers            |
| Blocs ou composants    | Gestion de contenu par blocs (dans certains cas) |

---

## 4. Exemples d’éditeurs WYSIWYG

| Nom        | Utilisé dans               | Particularités                              |
|------------|----------------------------|---------------------------------------------|
| TinyMCE    | WordPress, CMS divers      | Léger, personnalisable                      |
| CKEditor   | Drupal, Joomla…            | Complet, open-source                        |
| Quill      | Apps modernes (React, Vue) | Moderne, simple et modulaire                |
| Froala     | Applications pro           | UI très propre, payant                      |
| Slate.js   | React personnalisé         | Très flexible, bas niveau                   |
| Gutenberg  | WordPress (nouveau)        | Éditeur par blocs, type page builder        |

---

## 5. Comment ça fonctionne (sous le capot)

Un éditeur WYSIWYG repose sur :

- Une balise HTML avec `contenteditable`
- Un script JavaScript qui **convertit les actions en HTML**
- Parfois, un convertisseur entre **HTML ⇄ Markdown** ou **JSON ⇄ HTML**

---

## 6. ✅ Avantages / ❌ Inconvénients

### ✅ Avantages

- Intuitif pour les utilisateurs
- Aucune compétence technique requise
- Gain de temps énorme

### ❌ Inconvénients

- Génère souvent du HTML sale ou trop complexe
- Moins de contrôle sur la structure exacte du contenu
- Maintenance plus difficile pour les devs
- Risques d’incompatibilités entre éditeurs ou versions

---

## 7. Cas d’usage typiques

| Contexte                    | Pourquoi WYSIWYG ?                     |
|----------------------------|----------------------------------------|
| CMS (WordPress, Joomla…)   | Édition d’articles sans coder          |
| Applications SaaS          | Création de contenu riche              |
| Email builders             | Mise en page visuelle d’emails         |
| Forums / commentaires      | Réponses formatées par les utilisateurs|

---

## 8. Quand **ne pas** utiliser WYSIWYG ?

- Besoin de **contrôle HTML précis**
- Sites très structurés (ex : composants stricts en JSON)
- Projets légers sans JS inutile
- Besoin de cohérence forte dans le contenu (formulaires, règles…)

---

## 9. Alternatives

| Type              | Outils                        | Utilisation                                      |
|-------------------|-------------------------------|--------------------------------------------------|
| Markdown          | SimpleMDE, StackEdit          | Édition propre, légère et technique              |
| Blocs visuels     | Gutenberg, Webflow            | Page building                                    |
| Champs custom     | Strapi, Sanity                | CMS headless / données structurées               |
| Rich Text JSON    | Slate.js, ProseMirror         | Flexible mais nécessite dev complexe             |

---

## Conclusion

Un éditeur WYSIWYG est **parfait pour les utilisateurs non-techniques**.  
Mais en tant que dev, tu dois comprendre :

- Ses **limites**
- Les **formats qu’il génère**
- Et **quand** privilégier des alternatives plus fiables ou maintenables.

---


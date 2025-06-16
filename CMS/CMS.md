# CMS (Content Management Systems)

---

## 1. Définition

Un **CMS** (*Content Management System*) est un logiciel qui permet de créer, gérer et modifier du contenu numérique (souvent des sites web) sans avoir à coder entièrement à la main.

---

## 2. Objectifs d’un CMS

- Créer rapidement un site web.
- Gérer du contenu (textes, images, vidéos) via une interface.
- Déléguer les aspects techniques à un système automatisé.
- Permettre à des utilisateurs non-techniques d’administrer un site.

---

## 3. Structure typique d’un CMS

- **Frontend** : Partie visible par l’utilisateur (HTML/CSS/JS généré dynamiquement).
- **Backend** : Interface d’administration (souvent en PHP, Python, etc.).
- **Base de données** : Stocke les articles, utilisateurs, réglages (souvent MySQL).
- **Thèmes/Templates** : Gèrent l’apparence.
- **Plugins/Modules** : Ajoutent des fonctionnalités (galeries, formulaires, SEO...).

---

## 4. Fonctionnalités principales

| Fonction                  | Détail                                               |
|---------------------------|------------------------------------------------------|
| Éditeur WYSIWYG           | Pour écrire comme dans Word.                         |
| Gestion des utilisateurs  | Rôles (admin, rédacteur, visiteur).                  |
| Système de publication    | Brouillons, planification, mise en ligne.            |
| SEO intégré               | Optimisation pour les moteurs de recherche.          |
| Multilingue               | Support de plusieurs langues.                        |
| Sauvegardes & MAJ         | Automatique ou manuelle.                             |

---

## 5. Exemples de CMS populaires

| CMS        | Langage              | Particularité principale                                |
|------------|----------------------|----------------------------------------------------------|
| WordPress  | PHP                  | Le plus utilisé au monde (43% des sites web).            |
| Drupal     | PHP                  | Très flexible, adapté aux gros projets.                  |
| Joomla     | PHP                  | Entre WordPress et Drupal.                               |
| Ghost      | Node.js              | Axé blogging, rapide.                                    |
| Strapi     | Node.js (headless)   | API-first, très moderne.                                 |
| Magento    | PHP                  | E-commerce complexe.                                     |
| Shopify    | SaaS (propriétaire)  | E-commerce rapide, clé-en-main.                          |

---

## 6. Avantages vs Inconvénients

### ✅ Avantages

- Rapidité de mise en ligne.
- Interface visuelle facile à utiliser.
- Communauté et extensions.
- Moins de code à écrire.

### ❌ Inconvénients

- Moins de flexibilité qu’un développement from scratch.
- Performances souvent inférieures.
- Risques de sécurité si mal configuré.
- Maintenance des plugins/thèmes.

---

## 7. CMS Headless vs CMS Traditionnel

Un **CMS traditionnel** (monolithique) gère **à la fois le contenu et l’affichage** du site.  
**Exemples** : WordPress, Joomla, Drupal.

Un **CMS headless** ne gère **que le contenu**. Il fournit ton contenu via une **API** (REST ou GraphQL), que tu consommes où tu veux.  
**Exemples** : Strapi, Sanity, Contentful, Ghost (en mode API).

| Type               | Caractéristique                                                   |
|--------------------|-------------------------------------------------------------------|
| CMS traditionnel   | Gère contenu + affichage (ex : WordPress).                        |
| CMS headless       | Gère contenu uniquement, fourni via API (ex : Strapi).            |

---

## 8. Quand utiliser un CMS ?

| Besoin                                           | Choix recommandé                      |
|--------------------------------------------------|----------------------------------------|
| Blog personnel                                  | WordPress, Ghost                       |
| Site vitrine PME                                | WordPress, Joomla                      |
| Projet très spécifique ou frontend customisé    | CMS headless                           |
| Gros site institutionnel ou communautaire       | Drupal                                 |
| E-commerce                                      | Shopify (simple) ou Magento (complexe) |

---

## 9. CMS vs Développement sur-mesure

| Critère                  | CMS         | Dev from scratch   |
|--------------------------|-------------|---------------------|
| Coût initial             | Faible      | Élevé               |
| Maintenance              | Moyenne     | Variable            |
| Flexibilité              | Moyenne     | Totale              |
| Délai de mise en ligne   | Court       | Long                |

---


			WYSIWYG
******************************************************************
	
	1/ Définition :
	---------------

WYSIWYG = What You See Is What You Get

Un éditeur WYSIWYG est une interface qui permet de créer du contenu de manière visuelle, sans écrire directement du code HTML.
Ce que tu vois dans l’éditeur correspond directement à ce que l’utilisateur final verra sur le site.

	2/ Objectif :
	-------------

    Rendre la création de contenu accessible aux non-développeurs.

    Gérer la mise en page, les styles, les médias, etc. via une interface visuelle.

    Éviter d’écrire à la main du HTML/CSS.

	3/ Fonctionnalités typiques :
	-----------------------------

Fonction              	      Description
----------------------------  -----------------------------------------------
Barre d’outils               Gras, italique, souligné, couleur…
Gestion des liens            Ajouter/éditer des liens hypertextes
Insertion de médias          Images, vidéos, fichiers
Listes                       Listes à puces ou numérotées
Tableaux                     Insertion et gestion de tableaux
Code source HTML             Accès direct au HTML généré (optionnel)
Drag & Drop                  Glisser-déposer des blocs ou fichiers
Blocs ou composants          (Dans certains cas) gestion par blocs


	4/ Exemples d’éditeurs WYSIWYG :
	--------------------------------

Nom         	      Utilisé dans                       Particularités
---------------      ----------------------------------  ---------------------------------------------------
TinyMCE              WordPress, CMS divers              Léger, personnalisable
CKEditor             Drupal, Joomla, etc.               Complet, open-source
Quill                Apps modernes (React, Vue…)        Moderne, simple et modulaire
Froala               Apps pro                           UI très propre, payant
Slate.js             Customisation avancée (React)      Bas niveau, très flexible
Gutenberg            WordPress (nouveau)                Éditeur par blocs, type page builder


	5/ Comment ça fonctionne (sous le capot) :
	------------------------------------------

Un éditeur WYSIWYG utilise :

    contenteditable sur une div HTML pour permettre à l’utilisateur d’écrire.

    Un système JavaScript qui transforme les actions utilisateur (gras, image, etc.) en HTML.

    Optionnellement un convertisseur HTML ⇄ Markdown ou JSON ⇄ HTML.

	6/ ✅ Avantages / ❌ Inconvénients :
	------------------------------------

✅ Avantages :

    Intuitif pour l’utilisateur final.

    Aucune compétence technique requise.

    Gain de temps énorme pour la rédaction.

❌ Inconvénients :

    Génère souvent du HTML sale ou complexe.

    Moins de contrôle sur la structure exacte du contenu.

    Difficile à maintenir/customiser pour les devs.

    Problèmes de compatibilité entre éditeurs ou versions.

	7/ Cas d’usage typiques :
	-------------------------

Contexte	Pourquoi WYSIWYG ?
CMS (WordPress, Joomla...)	Édition d’articles sans coder
Applications SaaS	Éditeur de contenu riche
Email builders	Mise en page visuelle d’emails
Forums / commentaires riches	Réponses formatées par l’utilisateur
	
	8/ Quand ne pas utiliser WYSIWYG ?
	----------------------------------

    Si tu veux un contrôle total du HTML.

    Pour des sites très structurés (JSON, blocs précis, templates).

    Pour éviter les dépendances JS lourdes dans un projet léger.

    Quand la cohérence du contenu est critique (ex : formulaires structurés, règles strictes).

	9/ Alternatives :
	-----------------

Type             	      Outils                        Utilisation
------------------------  ----------------------------  ----------------------------------------------
Markdown                 SimpleMDE, StackEdit          Édition technique, clean & léger
Blocs visuels            Gutenberg, Webflow            Page building
Champs custom            Strapi, Sanity                Headless CMS / formulaire structuré
Rich Text JSON           Slate.js, ProseMirror         Flexible mais technique

	Conclusion :
	------------

Un éditeur WYSIWYG est parfait pour les utilisateurs non-techniques ou les interfaces de contenu classique.
Mais en tant que dev, tu dois connaître :

    Ses limites,

    Les formats qu’il génère,

    Et quand utiliser des alternatives plus propres ou structurées.

*********************************************************************************************************

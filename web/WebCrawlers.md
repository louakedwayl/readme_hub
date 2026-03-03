# Les Web Crawlers

## 1. Définition

Un web crawler (aussi appelé robot d'exploration ou bot) est un programme automatique qui parcourt Internet pour analyser les pages web.

Son rôle principal est de :

- Découvrir des pages
- Lire leur contenu
- Suivre les liens
- Envoyer les informations à un moteur de recherche pour indexation

## 2. Pourquoi les crawlers existent ?

Sans crawler :

- Google ne connaîtrait pas ton site
- Ton site ne pourrait pas apparaître dans les résultats de recherche

Les crawlers permettent donc :

- L'indexation des sites
- L'actualisation des contenus
- Le classement (SEO)

## 3. Comment fonctionne un crawler ?

**Étape 1 : Point de départ**

Le crawler commence avec une liste d'URL connues.

**Étape 2 : Requête HTTP**

Il envoie une requête :

```
GET / HTTP/1.1
Host: wayl.dev
User-Agent: Googlebot
```

**Étape 3 : Analyse HTML**

Il lit :

- Le texte
- Les balises `<title>`
- Les `<meta>`
- Les liens `<a href="">`

**Étape 4 : Suivi des liens**

Il ajoute les nouveaux liens trouvés dans sa liste et continue l'exploration.

## 4. Crawl vs Indexation vs Ranking

| Terme | Signification |
|-------|--------------|
| Crawl | Exploration des pages |
| Indexation | Ajout de la page dans la base de données |
| Ranking | Positionnement dans les résultats |

⚠️ Une page peut être crawlée mais pas indexée.

## 5. Le fichier robots.txt

Les crawlers respectent généralement un fichier spécial :

```
https://example.com/robots.txt
```

Exemple :

```
User-agent: *
Disallow: /admin
```

Cela signifie : tous les robots ne doivent pas accéder au dossier `/admin`.

## 6. Le Sitemap

Un sitemap aide les crawlers à comprendre la structure de ton site.

Exemple :

```xml
<urlset>
  <url>
    <loc>https://wayl.dev/</loc>
  </url>
  <url>
    <loc>https://wayl.dev/projects</loc>
  </url>
</urlset>
```

Il est souvent accessible via :

```
https://wayl.dev/sitemap.xml
```

## 7. Crawl Budget

Le crawl budget est la quantité de pages qu'un moteur de recherche accepte d'explorer sur ton site pendant un certain temps.

Il dépend de :

- La popularité du site
- La rapidité du serveur
- La qualité des pages

Si ton serveur est lent → le crawler réduit son exploration.

## 8. Problèmes courants liés aux crawlers

**Contenu dupliqué** — Si plusieurs domaines pointent vers la même IP, le crawler peut indexer ton site sous plusieurs noms.

**Mauvaise configuration Nginx** — Sans `server_name` correct ou bloc par défaut, ton site peut répondre à des domaines inconnus.

**Pas indexé** — Causes possibles :

- Site trop récent
- Pas de sitemap
- Bloqué par `robots.txt`
- Mauvais code HTTP

## 9. Codes HTTP importants pour les crawlers

| Code | Signification |
|------|--------------|
| 200 | OK |
| 301 | Redirection permanente |
| 404 | Page inexistante |
| 403 | Accès interdit |
| 444 | Connexion fermée (Nginx) |

## 10. Bonnes pratiques SEO techniques

- Toujours avoir un sitemap
- Configurer correctement Nginx
- Ajouter une meta description
- Éviter le contenu dupliqué
- Vérifier l'indexation avec : `site:wayl.dev`

## Résumé

Un crawler est un robot qui :

1. Explore
2. Analyse
3. Suit les liens
4. Envoie les données à un moteur de recherche

Sans crawler → pas d'indexation → pas de visibilité.

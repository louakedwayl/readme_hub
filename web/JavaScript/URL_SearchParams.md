# URL Search Params (Paramètres de requête URL)

## 1. Qu’est-ce qu’un URL Search Param ?

Les **URL search params** sont des paires `clé=valeur` ajoutées à une URL pour transmettre des informations supplémentaires.

Exemple d’URL :

```
https://example.com/produits?categorie=livres&page=2
```

Ici :

* `categorie=livres`
* `page=2`

Ces paramètres commencent après le caractère `?` et sont séparés par `&`.

---

## 2. Structure d’une URL

Une URL complète peut être décomposée ainsi :

```
https://www.example.com:443/chemin/vers/ressource?cle1=valeur1&cle2=valeur2#ancre
```

| Partie                       | Description       |
| ---------------------------- | ----------------- |
| `https`                      | Protocole         |
| `www.example.com`            | Nom de domaine    |
| `/chemin/vers/ressource`     | Chemin            |
| `?cle1=valeur1&cle2=valeur2` | **Search params** |
| `#ancre`                     | Fragment (hash)   |

---

## 3. À quoi servent les Search Params ?

Ils sont utilisés pour :

* 🔍 Filtrer des résultats (recherche, catégories)
* 📄 Gérer la pagination (`page=2`)
* 🔐 Transmettre des tokens ou des identifiants
* 📊 Suivre des campagnes marketing (UTM)
* 🔁 Conserver l’état d’une application (filtres, tris)

---

## 4. Encodage des paramètres (URL Encoding)

Les URLs ne peuvent pas contenir certains caractères (espaces, accents, symboles spéciaux).

Exemple :

```
?q=bonjour le monde
```

Devient :

```
?q=bonjour%20le%20monde
```

Encodage courant :

* espace → `%20`
* `é` → `%C3%A9`
* `&` → `%26`

---

## 5. Lire les Search Params en JavaScript

### 5.1 Avec `window.location`

```
const params = window.location.search;
console.log(params); // ?categorie=livres&page=2
```

Limite : on obtient une chaîne de caractères brute.

---

### 5.2 Avec `URLSearchParams`

```
const searchParams = new URLSearchParams(window.location.search);

searchParams.get('categorie'); // 'livres'
searchParams.get('page');      // '2'
```

Méthodes utiles :

```
searchParams.has('page');
searchParams.getAll('tag');
searchParams.entries();
```

---

## 6. Créer et modifier des Search Params

### 6.1 Ajouter ou modifier un paramètre

```
const url = new URL(window.location.href);

url.searchParams.set('page', '3');
url.searchParams.set('tri', 'prix');

console.log(url.toString());
```

---

### 6.2 Supprimer un paramètre

```
url.searchParams.delete('tri');
```

---

### 6.3 Ajouter plusieurs valeurs pour une clé

```
url.searchParams.append('tag', 'js');
url.searchParams.append('tag', 'web');
```

Résultat :

```
?tag=js&tag=web
```

---

## 7. Envoi de Search Params côté serveur

### Exemple avec une requête HTTP

```
GET /produits?categorie=livres&page=2 HTTP/1.1
```

### Exemple côté serveur (Node.js / Express)

```
app.get('/produits', (req, res) => {
  const categorie = req.query.categorie;
  const page = req.query.page;

  res.json({ categorie, page });
});
```

---

## 8. Bonnes pratiques

* ✅ Utiliser des noms de paramètres clairs et explicites
* ✅ Préférer `URL` et `URLSearchParams` à la manipulation de chaînes
* ✅ Encoder automatiquement les valeurs
* ❌ Ne pas stocker d’informations sensibles (mot de passe, données privées)
* ❌ Ne pas trop surcharger les URLs

---

## 9. Erreurs courantes

* Oublier l’encodage des caractères spéciaux
* Confondre `?` et `#`
* Traiter les paramètres comme des nombres sans conversion

```
Number(searchParams.get('page'));
```

---

## 10. Résumé

* Les **URL search params** permettent de passer des données via l’URL
* Ils sont composés de paires `clé=valeur`
* L’API `URLSearchParams` simplifie leur lecture et manipulation
* Ils sont largement utilisés dans les applications web modernes

---

## 11. Exercices

1. Lire un paramètre `q` depuis l’URL et l’afficher dans la console
2. Ajouter un paramètre `theme=dark` à l’URL courante
3. Supprimer tous les paramètres existants d’une URL

---

💡 *Astuce* : Combinez les search params avec l’API History (`history.pushState`) pour créer des applications dynamiques sans rechargement de page.

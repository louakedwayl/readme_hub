# 📚 Cours — JSON-LD & Données structurées (SEO)

## 🧠 1. Définition

Le **JSON-LD** (JavaScript Object Notation for Linked Data) est un format qui permet d’ajouter des **données structurées** dans une page web.

Ces données sont destinées aux moteurs de recherche (comme Google), pas aux utilisateurs.

---

## 🎯 2. Objectif

Le but du JSON-LD est d’aider les moteurs de recherche à :

- mieux comprendre le contenu
- interpréter correctement les informations
- afficher des résultats enrichis

---

## 🏗️ 3. Fonctionnement

Le JSON-LD est placé dans le HTML :

```html
<script type="application/ld+json">
{
  "@type": "Person",
  "name": "Wayl Louaked"
}
</script>
```

Ce bloc n’est pas affiché sur la page mais lu par les moteurs.

---

## 🔗 4. Standard utilisé

Les données suivent le vocabulaire de Schema.org.

Types courants :
- Person
- Organization
- Product
- Article

---

## 🧩 5. Exemple

```json
{
  "@context": "https://schema.org",
  "@type": "Person",
  "name": "Wayl Louaked",
  "jobTitle": "Developer"
}
```

---

## 🚀 6. Impact SEO

- meilleure compréhension du site
- meilleure indexation
- rich results possibles

---

## ⚠️ 7. Limites

- pas un facteur direct de ranking
- ne garantit pas la position

---

## 🧠 8. Bonnes pratiques

- infos cohérentes
- bons types
- liens fiables

---

## 🧩 9. Résumé

- JSON-LD = données structurées
- utilisé en SEO technique
- aide Google à comprendre ton site

---

## 🎯 Conclusion

Le JSON-LD améliore la compréhension de ton site par les moteurs de recherche et renforce ton SEO.

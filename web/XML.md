# 📘 Cours : Introduction au XML

## 1. Qu’est-ce que le XML ?

XML signifie **eXtensible Markup Language**.

C’est un **langage de balisage** utilisé pour :

* Stocker des données
* Structurer des informations
* Échanger des données entre applications

Le XML est lisible par les humains **et** les machines.

---

## 2. À quoi sert le XML ?

Le XML est utilisé dans de nombreux domaines :

* Échange de données entre serveurs
* Fichiers de configuration
* Web services (SOAP)
* Formats de fichiers (RSS, SVG, etc.)

👉 Le XML **ne sert pas à afficher** des données comme HTML, mais à les **organiser**.

---

## 3. Structure d’un document XML

Un document XML est composé de :

* Balises
* Attributs (optionnels)
* Contenu texte

### Exemple simple :

```xml
<personne>
  <nom>Dupont</nom>
  <age>30</age>
  <ville>Paris</ville>
</personne>
```

### Règles importantes :

* Chaque balise doit être fermée
* Les balises sont sensibles à la casse (`<Nom>` ≠ `<nom>`)
* Il doit y avoir **une seule balise racine**

---

## 4. Les balises XML

Les balises permettent de décrire les données.

```xml
<livre>
  <titre>Apprendre le XML</titre>
  <auteur>Jean Martin</auteur>
</livre>
```

### Balise ouvrante et fermante

```xml
<age>25</age>
```

### Balise auto-fermante

```xml
<image />
```

---

## 5. Les attributs

Les attributs ajoutent des informations à une balise.

```xml
<livre isbn="123456789">
  <titre>XML Facile</titre>
</livre>
```

🔹 Les attributs sont toujours placés dans la balise ouvrante.

---

## 6. Hiérarchie et arborescence

Le XML est **hiérarchique** :

```xml
<bibliotheque>
  <livre>
    <titre>XML</titre>
    <auteur>Paul</auteur>
  </livre>
</bibliotheque>
```

* `bibliotheque` est le parent
* `livre` est l’enfant
* `titre` et `auteur` sont des sous-enfants

---

## 7. En-tête XML (optionnel mais recommandé)

```xml
<?xml version="1.0" encoding="UTF-8"?>
```

Il indique :

* La version de XML
* L’encodage des caractères

---

## 8. XML bien formé

Un XML est **bien formé** s’il respecte toutes les règles syntaxiques.

❌ Exemple incorrect :

```xml
<nom>Ali
```

✅ Exemple correct :

```xml
<nom>Ali</nom>
```

---

## 9. Validation XML (DTD et XSD)

On peut vérifier qu’un XML respecte une structure précise :

* **DTD** (Document Type Definition)
* **XSD** (XML Schema Definition)

Cela permet de garantir la qualité des données.

---

## 10. XML vs HTML vs JSON

| XML                 | HTML           | JSON               |
| ------------------- | -------------- | ------------------ |
| Stockage de données | Affichage      | Échange de données |
| Verbeux             | Orienté visuel | Léger              |
| Strict              | Plus souple    | Très populaire     |

---

## 11. Avantages et inconvénients

### ✅ Avantages

* Très structuré
* Auto-descriptif
* Standard international

### ❌ Inconvénients

* Verbeux (beaucoup de balises)
* Plus lourd que JSON

---

## 12. Exemple complet

```xml
<?xml version="1.0" encoding="UTF-8"?>
<commande>
  <client>
    <nom>Dupont</nom>
    <email>dupont@mail.com</email>
  </client>
  <produit>
    <nom>Clavier</nom>
    <prix>30</prix>
  </produit>
</commande>
```

---

## 13. Conclusion

Le XML est un langage essentiel pour :

* La structuration des données
* Les échanges entre systèmes

Même s’il est parfois remplacé par JSON, il reste très utilisé dans les systèmes professionnels.

---

📌 *Fin du cours*

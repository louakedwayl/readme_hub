
# 📘 Cours : Clé primaire composite

### 🔹 1️⃣ Qu’est-ce qu’une clé primaire ?

Une **clé primaire** est une colonne (ou un ensemble de colonnes) qui sert à **identifier de manière unique chaque ligne d’une table**.  

- Chaque table doit avoir **une clé primaire**  
- Une clé primaire **ne peut pas contenir de valeur NULL**  

---

### 🔹 2️⃣ Clé primaire composite

Une **clé primaire composite** utilise **plusieurs colonnes** pour identifier une ligne de façon unique.  

- Chaque colonne seule **n’est pas suffisante** pour garantir l’unicité  
- **C’est la combinaison de toutes les colonnes** qui devient unique  

---

### 🔹 3️⃣ Exemple concret : Recettes

Imaginons une application de gestion de recettes :  

**Table `Recettes`**  
| id_recette | nom_recette       |
|------------|------------------|
| 1          | Pizza Margherita  |
| 2          | Omelette         |

**Table `Ingredients_Recette`**  
| id_recette | nom_ingredient | quantité |
|------------|----------------|----------|
| 1          | Farine         | 200g     |
| 1          | Tomate         | 100g     |
| 1          | Mozzarella     | 150g     |
| 2          | Oeufs          | 3        |
| 2          | Sel            | 1 pincée |

---

### 🔹 4️⃣ Pourquoi une clé primaire composite ici ?

Dans `Ingredients_Recette` :  

- Ni `id_recette` **seul** (car plusieurs ingrédients pour la même recette)  
- Ni `nom_ingredient` **seul** (car plusieurs recettes peuvent utiliser le même ingrédient)  

➡️ Donc on combine **`id_recette` + `nom_ingredient`** pour obtenir une **clé primaire composite**  

```sql
CREATE TABLE Ingredients_Recette (
  id_recette INTEGER,
  nom_ingredient TEXT,
  quantité TEXT,
  PRIMARY KEY (id_recette, nom_ingredient)
);
```

- Chaque ligne est unique grâce à cette combinaison  
- On ne peut pas avoir **le même ingrédient deux fois pour la même recette**  

---

### 🔹 5️⃣ Avantages d’une clé primaire composite

1. Garantit **l’unicité des lignes** là où une seule colonne ne suffit pas  
2. Évite d’ajouter une **colonne artificielle** juste pour l’identification  
3. Parfait pour les **tables de relation / jointure** (Many-to-Many)  

---

### 🔹 6️⃣ Résumé visuel

| id_recette | nom_ingredient | quantité | Clé primaire ? |
|------------|----------------|----------|----------------|
| 1          | Farine         | 200g     | ✅ (1+Farine)  |
| 1          | Tomate         | 100g     | ✅ (1+Tomate)  |
| 1          | Mozzarella     | 150g     | ✅ (1+Mozzarella) |
| 2          | Oeufs          | 3        | ✅ (2+Oeufs)   |

- Chaque ligne est **identifiée uniquement par la combinaison des deux colonnes**  

---

💡 **Astuce mnémotechnique** :  
> *“Plusieurs colonnes travaillent ensemble pour faire une clé”* 🗝️  

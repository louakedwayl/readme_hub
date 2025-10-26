# 🧩 Les Conventions de Nommage

## 📘 Introduction

Les **conventions de nommage** définissent la manière dont on nomme les variables, fonctions, classes, fichiers, etc.  
Elles sont essentielles pour rendre le code **lisible**, **cohérent** et **maintenable** par l’ensemble d’une équipe.

---

## 🎯 Objectifs

- Améliorer la **lisibilité** du code  
- Faciliter la **collaboration** entre développeurs  
- Réduire les **erreurs** liées à l’ambiguïté des noms  
- Assurer une **uniformité** dans les projets  

---

## 🧱 Règles Générales

### 1. Utiliser des noms explicites
- ❌ Mauvais : `a`, `data`, `tmp`
- ✅ Bon : `userEmail`, `productPrice`, `sortedList`

> Les noms doivent exprimer clairement **ce qu’ils représentent**.

---

### 2. Éviter les abréviations non standards
- ❌ `usrNm`  
- ✅ `userName`

> Les abréviations peuvent être utilisées si elles sont **universellement reconnues** (ex : `id`, `url`, `html`).

---

### 3. Respecter la casse (majuscule / minuscule)
Chaque langage ou framework a ses conventions, mais voici les principales :

| Convention | Exemple | Utilisation typique |
|-------------|----------|---------------------|
| **camelCase** | `userName` | variables, fonctions (JavaScript, Java, C#) |
| **PascalCase** | `UserProfile` | classes, composants React |
| **snake_case** | `user_name` | variables et fonctions (Python, C, SQL) |
| **kebab-case** | `user-profile` | noms de fichiers, URLs, CSS |
| **SCREAMING_SNAKE_CASE** | `MAX_VALUE` | constantes |

---

## 💻 Par Langage

### 🟦 JavaScript / TypeScript

| Élément | Convention | Exemple |
|----------|-------------|----------|
| Variable | `camelCase` | `let userAge = 25;` |
| Fonction | `camelCase` | `getUserData()` |
| Classe | `PascalCase` | `class UserAccount {}` |
| Constante | `SCREAMING_SNAKE_CASE` | `const MAX_USERS = 100;` |
| Fichier | `kebab-case` | `user-service.js` |

---

### 🐍 Python

| Élément | Convention | Exemple |
|----------|-------------|----------|
| Variable | `snake_case` | `user_name = "Alice"` |
| Fonction | `snake_case` | `def get_user_info():` |
| Classe | `PascalCase` | `class UserAccount:` |
| Constante | `SCREAMING_SNAKE_CASE` | `MAX_RETRIES = 3` |
| Fichier | `snake_case` | `user_service.py` |

---

### ☕ Java

| Élément | Convention | Exemple |
|----------|-------------|----------|
| Variable | `camelCase` | `int userAge = 25;` |
| Méthode | `camelCase` | `getUserData()` |
| Classe | `PascalCase` | `public class UserProfile {}` |
| Constante | `SCREAMING_SNAKE_CASE` | `public static final int MAX_USERS = 100;` |
| Package | `lowercase` | `com.example.utils` |

---

### 🧠 C / C++

| Élément | Convention | Exemple |
|----------|-------------|----------|
| Variable | `snake_case` ou `camelCase` | `int max_value;` |
| Fonction | `snake_case` | `void print_result();` |
| Macro / Constante | `SCREAMING_SNAKE_CASE` | `#define BUFFER_SIZE 256` |
| Classe / Struct | `PascalCase` | `struct UserInfo {}` |

---

## 🧩 Bonnes Pratiques Complémentaires

### ✅ Privilégier la cohérence
> Si un projet utilise `snake_case`, ne mélangez pas avec `camelCase`.

### ✅ Préfixes et suffixes logiques
- `is`, `has`, `can` → pour des booléens :  
  `isValid`, `hasError`, `canSave`
- `get`, `set`, `update` → pour les fonctions d’accès :  
  `getUserName()`, `setUserEmail()`

### ✅ Utiliser des noms au singulier ou au pluriel selon le contexte
- `user` pour un seul utilisateur  
- `users` pour une collection  

### ✅ Éviter les mots inutiles
- ❌ `userDataInfo`  
- ✅ `userInfo`  

---

## 🧭 Conventions de Nommage des Fichiers

| Type de fichier | Convention | Exemple |
|------------------|-------------|----------|
| Script / Module | `kebab-case` ou `snake_case` | `user-service.js` |
| Composant React | `PascalCase` | `UserCard.jsx` |
| Styles CSS | `kebab-case` | `user-profile.css` |
| Tests | `camelCase` ou `snake_case` + suffixe `_test` | `user_service_test.py` |

---

## ⚙️ Conventions pour les Git Branches

| Type | Convention | Exemple |
|------|-------------|----------|
| Feature | `feature/nom-fonctionnalite` | `feature/login-system` |
| Bugfix | `fix/nom-du-bug` | `fix/user-login-error` |
| Hotfix | `hotfix/nom-correctif` | `hotfix/api-crash` |
| Release | `release/x.y.z` | `release/1.2.0` |

---

## 🚀 Conclusion

Les conventions de nommage ne sont pas juste des règles esthétiques.  
Elles permettent de :
- réduire la **charge cognitive**,  
- améliorer la **collaboration**,  
- et renforcer la **qualité du code**.

> “Un code lisible aujourd’hui évite une migraine demain.”

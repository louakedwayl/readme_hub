# 🧩 Les composants en React

## 🔹 Définition

Un **composant** est une fonction qui retourne du JSX.

👉 Il permet de créer une partie de l’interface (UI) réutilisable.

---

## 🔹 Exemple simple

```jsx
function Title() {
  return <h1>Bonjour les gens</h1>;
}
```

👉 `Title` est un composant

---

## 🔹 Utilisation

```jsx
<Title />
```

👉 On utilise le composant comme une **balise HTML**

---

## 🔹 Comment ça fonctionne

Quand React voit :

```jsx
<Title />
```

👉 Il exécute :

```js
Title();
```

👉 Et remplace par :

```jsx
<h1>Bonjour les gens</h1>
```

---

## 🔹 Règle importante

Les composants doivent commencer par une **majuscule** :

```jsx
<Title />   // ✅ composant
<title>     // ❌ HTML
```

---

## 🔹 Pourquoi utiliser des composants

- ✅ Réutiliser du code  
- ✅ Organiser l’application  
- ✅ Rendre le code plus lisible  

---

## 🔹 Exemple avec plusieurs composants

```jsx
function Title() {
  return <h1>Bonjour</h1>;
}

function App() {
  return (
    <>
      <Title />
      <Title />
    </>
  );
}
```

👉 Le composant peut être utilisé plusieurs fois

---

## 🔹 Différence avec une variable

```js
const title = "Bonjour";
```

❌ Ce n’est pas un composant

👉 Un composant est une **fonction**, pas une variable

---

## 🔥 Résumé

- un composant = une fonction qui retourne du JSX  
- on l’utilise comme une balise  
- il doit commencer par une majuscule  
- permet de structurer l’interface  

---

## 🎯 Version simple

👉  
> un composant = une fonction que React transforme en élément affiché

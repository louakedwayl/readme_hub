# 📘 Cours : Link en React Native avec Expo Router

## 1. Introduction

Dans une application React Native avec Expo, la navigation entre écrans est gérée facilement grâce à **Expo Router**.

Le composant **Link** permet de naviguer entre les pages de manière simple et déclarative, sans écrire de logique complexe.

---

## 2. C’est quoi Link ?

`Link` est un composant fourni par Expo Router qui sert à changer d’écran.

Il remplace les méthodes classiques comme :

* navigation.navigate()
* router.push() (dans certains cas)

Mais il est surtout utilisé pour la navigation simple via l’interface.

---

## 3. Importation

```tsx
import { Link } from "expo-router";
```

---

## 4. Utilisation basique

### Exemple simple

```tsx
import { Link } from "expo-router";
import { Text, View } from "react-native";

export default function Home() {
  return (
    <View>
      <Link href="/profile">
        <Text>Aller au profil</Text>
      </Link>
    </View>
  );
}
```

👉 Cela ouvre le fichier :

```
app/profile.tsx
```

---

## 5. Navigation avec paramètres

### Exemple avec ID dans l’URL

```tsx
<Link href="/pokemon/3">
  <Text>Voir Pokémon 3</Text>
</Link>
```

Fichier correspondant :

```
app/pokemon/[id].tsx
```

---

## 6. Version avec params dynamiques

```tsx
<Link
  href={{
    pathname: "/pokemon/[id]",
    params: { id: 3 },
  }}
>
  <Text>Pokémon 3</Text>
</Link>
```

---

## 7. Structure Expo Router

Expo Router fonctionne avec le système de fichiers :

```
app/
 ├── _layout.tsx
 ├── index.tsx
 ├── profile.tsx
 ├── pokemon/
 │    └── [id].tsx
```

---

## 8. Le rôle de _layout.tsx

Le fichier `_layout.tsx` définit la structure globale de navigation.

Il sert à gérer :

* Stack navigation
* Tabs
* Options globales (header, titres...)

### Exemple

```tsx
import { Stack } from "expo-router";

export default function Layout() {
  return <Stack />;
}
```

---

## 9. Options d’écran

```tsx
<Stack
  screenOptions={{
    headerShown: true,
    headerTitle: "Mon App",
  }}
/>
```

---

## 10. Link vs navigation classique

| Link              | router.push             |
| ----------------- | ----------------------- |
| Déclaratif        | Impératif               |
| Simple            | Plus flexible           |
| Utilisé dans l’UI | Utilisé dans la logique |

---

## 11. Quand utiliser Link ?

Utilise Link quand :

* Tu cliques sur un bouton ou texte
* Tu veux une navigation simple

Sinon utilise :

```tsx
import { router } from "expo-router";

router.push("/profile");
```

---

## 12. Résumé

* Link = navigation simple dans l’UI
* Basé sur les fichiers (file-based routing)
* Supporte les params
* Fonctionne avec _layout.tsx

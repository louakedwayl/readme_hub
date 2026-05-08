# 📘 Cours : SafeAreaView en React Native (Expo)

## 1. Introduction

En React Native, certaines zones de l’écran ne doivent pas être utilisées pour afficher du contenu (comme les encoches, barres système, etc.).

👉 **SafeAreaView** sert à éviter que ton interface soit coupée ou cachée.

---

## 2. C’est quoi SafeAreaView ?

`SafeAreaView` est un composant qui place automatiquement ton contenu dans une zone “safe” de l’écran.

Il protège contre :

* 📱 l’encoche (notch) en haut
* 📶 la barre de statut
* ⬇️ la barre de navigation en bas

---

## 3. Importation

### Version React Native classique

```tsx
import { SafeAreaView } from "react-native";
```

### Version recommandée (Expo)

```tsx
import { SafeAreaView } from "react-native-safe-area-context";
```

👉 Cette version est plus fiable sur tous les appareils.

---

## 4. Utilisation simple

```tsx
import { SafeAreaView } from "react-native-safe-area-context";
import { Text } from "react-native";

export default function App() {
  return (
    <SafeAreaView style={{ flex: 1 }}>
      <Text>Hello Safe Area</Text>
    </SafeAreaView>
  );
}
```

---

## 5. Pourquoi `flex: 1` ?

Sans `flex: 1`, le SafeAreaView ne prend pas tout l’écran.

👉 `flex: 1` permet de dire :

> “Prends tout l’espace disponible”

---

## 6. SafeAreaView avec Expo Router

Dans une app Expo Router, tu peux l’utiliser dans `_layout.tsx` :

```tsx
import { SafeAreaView } from "react-native-safe-area-context";
import { Stack } from "expo-router";

export default function Layout() {
  return (
    <SafeAreaView style={{ flex: 1 }}>
      <Stack />
    </SafeAreaView>
  );
}
```

👉 Comme ça, tu n’as pas besoin de le répéter dans chaque écran.

---

## 7. SafeAreaView vs View

| SafeAreaView               | View                     |
| -------------------------- | ------------------------ |
| Respecte les zones sûres   | Ignore les zones système |
| Évite l’encoche            | Peut être caché          |
| Idéal pour écrans complets | Simple conteneur         |

---

## 8. Erreurs fréquentes

### ❌ Oublier flex: 1

Résultat : écran mal affiché ou contenu collé

### ❌ Utiliser la mauvaise importation

```tsx
// moins fiable
import { SafeAreaView } from "react-native";
```

👉 Préfère :

```tsx
import { SafeAreaView } from "react-native-safe-area-context";
```

---

## 9. Quand utiliser SafeAreaView ?

Utilise-le quand :

* tu fais un écran principal
* ton UI est proche des bords
* tu veux un rendu propre sur iPhone

Tu peux t’en passer quand :

* le layout global le gère déjà
* tu es dans un composant interne

---

## 10. Résumé

* SafeAreaView protège ton UI des zones système
* Très important sur iPhone (encoche)
* Version recommandée : `react-native-safe-area-context`
* À utiliser surtout dans les layouts ou écrans principaux

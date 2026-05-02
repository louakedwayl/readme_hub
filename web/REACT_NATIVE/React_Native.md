# Introduction à React Native

## 1. C'est quoi React Native ?

**React Native** est un framework créé par Facebook (Meta) en 2015 qui permet de développer des **applications mobiles natives** (iOS et Android) en utilisant **JavaScript** et **React**.

L'idée : tu écris ton app **une seule fois** en React, et tu obtiens deux apps natives — une iOS, une Android — qui tournent sur les vrais composants UI du téléphone (pas dans une WebView).

### Le slogan officiel

> "Learn once, write anywhere."

Pas "write once, run anywhere" : l'idée n'est pas que ton code soit 100% partagé entre plateformes, mais que **tes compétences React** soient réutilisables pour faire du mobile.

---

## 2. React Native vs React (web) vs Natif pur

| | Natif pur | React Native | React (web) |
|---|---|---|---|
| Langage | Swift/Obj-C (iOS), Kotlin/Java (Android) | JavaScript / TypeScript | JavaScript / TypeScript |
| UI | Composants natifs | Composants natifs (via un pont) | DOM (HTML) |
| Performance | Maximale | Très bonne (proche du natif) | N/A (web) |
| Cross-platform | Non | Oui (iOS + Android) | Oui (tous navigateurs) |
| Courbe d'apprentissage | Élevée (2 stacks) | Moyenne si tu connais React | Faible |

---

## 3. Comment ça marche (vue générale)

Quand tu écris :

```jsx
<View>
  <Text>Hello</Text>
</View>
```

Ce n'est **pas** transformé en HTML. React Native :

1. Exécute ton code JS dans un moteur JS embarqué dans l'app.
2. Traduit tes composants React en **vrais composants natifs** (`UIView` sur iOS, `android.view.View` sur Android).
3. L'utilisateur voit donc une UI 100% native, pas une page web.

### Architecture (en gros)

Historiquement, RN utilisait un **"bridge"** asynchrone entre JS et le natif. Depuis 2024-2025, la nouvelle architecture (**JSI + Fabric + TurboModules**) remplace ce bridge par des appels synchrones plus rapides. Pour un dev débutant, tu n'as pas besoin de connaître les détails — juste savoir que c'est plus performant qu'avant.

---

## 4. Les composants de base

En React Native, tu n'as **pas** de `<div>`, `<span>`, `<p>`, `<button>` HTML. À la place :

| Web (React) | React Native |
|---|---|
| `<div>` | `<View>` |
| `<span>`, `<p>`, texte | `<Text>` (obligatoire pour afficher du texte) |
| `<img>` | `<Image>` |
| `<input>` | `<TextInput>` |
| `<button>` | `<Pressable>` ou `<TouchableOpacity>` |
| `<ul>` long | `<FlatList>` (optimisée) |

### Exemple minimal

```jsx
import { View, Text, Pressable } from 'react-native';

export default function App() {
  return (
    <View>
      <Text>Bonjour Wayl</Text>
      <Pressable onPress={() => alert('clicked')}>
        <Text>Click me</Text>
      </Pressable>
    </View>
  );
}
```

**Règle d'or** : tout texte affiché **doit** être dans un `<Text>`. Si tu mets du texte direct dans une `<View>`, ça crash.

---

## 5. Le styling

Pas de CSS. Tu utilises un objet JS qui ressemble à du CSS, via `StyleSheet` :

```jsx
import { StyleSheet, View, Text } from 'react-native';

const styles = StyleSheet.create({
  container: {
    flex: 1,
    backgroundColor: '#000',
    padding: 20,
  },
  title: {
    color: 'white',
    fontSize: 24,
  },
});

<View style={styles.container}>
  <Text style={styles.title}>Hello</Text>
</View>
```

### Différences principales avec le CSS web

- Pas d'unités : tout est en `dp` (pixels indépendants de la densité).
- **Flexbox par défaut** sur tous les composants (et `flexDirection: 'column'` par défaut, pas `row`).
- Pas de cascade / héritage CSS.
- camelCase (`backgroundColor` pas `background-color`).
- Pas de pseudo-classes (`:hover`, `:active` n'existent pas — logique, c'est tactile).

Beaucoup utilisent **NativeWind** (Tailwind pour RN) ou **styled-components** pour s'éviter ça.

---

## 6. Expo vs React Native CLI

Quand tu démarres un projet RN, tu as deux choix :

### Expo (recommandé pour débuter)

- Setup en une commande, pas besoin de toucher Xcode/Android Studio au début.
- Tu peux tester ton app sur ton téléphone via l'app **Expo Go** (scan d'un QR code).
- Plein d'APIs natives prêtes à l'emploi (caméra, notifications, géoloc...).
- Limitation historique : impossible d'ajouter du code natif custom (levée depuis Expo Dev Client / EAS).

```bash
npx create-expo-app MyApp
```

### React Native CLI (bare)

- Plus de contrôle, accès direct aux projets iOS/Android.
- Tu dois installer Xcode (Mac obligatoire pour iOS) et Android Studio.
- Préférable si tu sais que tu vas écrire des modules natifs.

**Conseil pratique** : commence avec Expo. Tu peux toujours "ejecter" plus tard si besoin.

---

## 7. Écosystème et navigation

RN ne fournit **pas** de système de navigation par défaut (contrairement à Flutter). Tu utilises une lib externe :

- **React Navigation** : standard de fait, le plus utilisé.
- **Expo Router** : approche file-based (comme Next.js), de plus en plus populaire.

Pour le state management, c'est exactement comme en React web : Context, Redux, Zustand, TanStack Query, etc.

---

## 8. Avantages et inconvénients

### ✅ Avantages

- **Réutilisation des compétences React** : si tu connais React, tu es à 70% du chemin.
- **Une codebase pour iOS + Android** : économies massives en temps de dev.
- **Hot reload** : tu vois tes changements instantanément sur le téléphone.
- **Écosystème JS complet** : npm, TypeScript, etc.
- **Adopté par des grosses apps** : Instagram, Discord, Shopify, Coinbase, Tesla...

### ❌ Inconvénients

- **Performances** légèrement en dessous du natif pur pour les cas extrêmes (animations complexes, gros calculs).
- **APIs natives spécifiques** : si tu veux un truc très spécifique à iOS ou Android, tu finis par écrire du natif.
- **Debugging** parfois pénible (stacktraces qui traversent JS et natif).
- **Mises à jour cassantes** : la nouvelle architecture, les changements d'API rendent la maintenance long-terme exigeante.
- **Taille de l'app** plus grosse qu'une app native pure.

---

## 9. Quand choisir React Native ?

### Bon choix si

- Tu connais déjà React.
- Tu veux iOS **et** Android sans doubler le coût de dev.
- Ton app est principalement de la UI + appels API (e-commerce, social, dashboard, productivité...).
- Tu as besoin d'itérer vite (MVP, startup).

### Mauvais choix si

- App ultra-performante / temps réel critique (jeu 3D, traitement vidéo lourd).
- Tu as besoin d'utiliser **massivement** des APIs très spécifiques d'une plateforme.
- Tu veux un binaire le plus léger possible.

### Alternatives à connaître

- **Flutter** (Google, Dart) : concurrent direct, dessine sa propre UI.
- **Swift/Kotlin natif** : performance et fidélité maximales, coût double.
- **Capacitor / Ionic** : approche WebView, moins natif.

---

## 10. Pour démarrer

```bash
# Option recommandée pour débuter
npx create-expo-app@latest MyApp
cd MyApp
npx expo start
```

Tu scannes le QR code avec **Expo Go** (iOS App Store / Google Play) et ton app tourne sur ton vrai téléphone en quelques secondes.

---

## À retenir

1. **React Native = React + composants natifs mobiles**, pas une WebView.
2. Tu codes en JS/TS, l'UI rendue est 100% native (iOS et Android).
3. Composants différents (`<View>`, `<Text>`, `<Image>`...) mais logique React identique.
4. Style en objets JS, flexbox par défaut.
5. **Expo** pour démarrer vite, **RN CLI** pour plus de contrôle.
6. Excellent pour la majorité des apps mobiles modernes — sauf cas où la perf native pure est critique.

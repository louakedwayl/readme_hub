# Router : Stack, `headerShown` et `screenOptions`

---

## 🧱 1. Stack (navigation "pile d'écrans")

`Stack` est un type de navigation où les écrans s'empilent.

👉 Imagine :
- tu es sur une page
- tu vas sur une autre
- tu peux revenir en arrière

```javascript
import { Stack } from "expo-router";

export default function Layout() {
  return <Stack />;
}
```

💡 **Comment ça marche :**
- chaque page = un écran
- quand tu navigues → nouvel écran au-dessus
- bouton "back" → revient en arrière

---

## ⚙️ 2. `screenOptions`

`screenOptions` sert à configurer **tous les écrans du Stack globalement**.

```javascript
<Stack
  screenOptions={{
    headerShown: false
  }}
/>
```

👉 Ça applique des options globales à tout le Stack.

---

## 🧭 3. `headerShown`

`headerShown` contrôle **la barre du haut (header)**.

### Exemple 1 — Header caché

```javascript
<Stack
  screenOptions={{
    headerShown: false
  }}
/>
```

👉 Résultat :
- ❌ plus de barre en haut
- écran "plein écran"

### Exemple 2 — Header visible

```javascript
<Stack
  screenOptions={{
    headerShown: true
  }}
/>
```

👉 Résultat :
- ✅ header visible
- titre + bouton retour automatique

---

## 🎯 4. `screenOptions` par écran individuel

Tu peux aussi configurer chaque page séparément (**override**) :

```javascript
<Stack>
  <Stack.Screen
    name="index"
    options={{ 
      title: "Accueil",
      headerShown: true
    }}
  />
  <Stack.Screen
    name="details"
    options={{ 
      title: "Détails",
      headerShown: false  // Override global
    }}
  />
</Stack>
```

---

## 📋 5. Options courantes du Stack

| Option | Type | Exemple | Effet |
|---|---|---|---|
| `headerShown` | boolean | `true \| false` | Affiche/cache la barre du haut |
| `title` | string | `"Accueil"` | Titre dans le header |
| `headerTitleStyle` | object | `{ fontSize: 18 }` | Style du titre |
| `headerStyle` | object | `{ backgroundColor: '#fff' }` | Style du header |
| `headerTintColor` | string | `"#000"` | Couleur des éléments (back button) |

---

## 💻 6. Exemple complet

```javascript
import { Stack } from "expo-router";

export default function Layout() {
  return (
    <Stack
      screenOptions={{
        headerShown: true,
        headerTitleStyle: {
          fontSize: 20,
          fontWeight: "bold"
        },
        headerStyle: {
          backgroundColor: "#f1f1f1"
        },
        headerTintColor: "#000"
      }}
    >
      <Stack.Screen
        name="index"
        options={{
          title: "Accueil"
        }}
      />
      <Stack.Screen
        name="profile"
        options={{
          title: "Profil",
          headerShown: false  // Override global
        }}
      />
    </Stack>
  );
}
```

---

## 🚀 7. Image mentale

- `Stack` = pile de pages 📄📄📄
- `screenOptions` = règles globales ⚙️
- `headerShown` = barre du haut ON/OFF 🧭

---

## 🎓 8. Points clés à retenir

- ✅ `Stack` = navigation "retour en arrière" (navigation historique)
- ✅ `screenOptions` s'applique globalement à tous les écrans
- ✅ Options individuelles (dans `Stack.Screen`) **override** les options globales
- ✅ `headerShown: false` = plein écran (no header)
- ✅ `headerShown: true` = barre du haut visible avec titre et bouton back


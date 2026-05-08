# StyleSheet en React Native

## Qu'est-ce que StyleSheet ?

`StyleSheet` est un **module React Native** qui permet de créer et d'optimiser les objets de style. C'est la meilleure pratique pour gérer les styles.

---

## Importer StyleSheet

```jsx
import { StyleSheet } from 'react-native';
```

---

## Pourquoi utiliser StyleSheet ?

### Sans StyleSheet (mauvaise pratique)
```jsx
<View style={{ 
  backgroundColor: '#fff', 
  padding: 10, 
  borderRadius: 8 
}}>
  <Text style={{ fontSize: 16, color: '#333' }}>Texte</Text>
</View>
```

**Problèmes :**
- Les styles sont recréés à chaque render
- Pas de performance
- Code mélangé avec la logique

### Avec StyleSheet (bonne pratique)
```jsx
const styles = StyleSheet.create({
  container: {
    backgroundColor: '#fff',
    padding: 10,
    borderRadius: 8,
  },
  text: {
    fontSize: 16,
    color: '#333',
  },
});

<View style={styles.container}>
  <Text style={styles.text}>Texte</Text>
</View>
```

**Avantages :**
- Les styles sont créés une seule fois
- Meilleure performance
- Code plus propre et organisé
- Validation des propriétés CSS

---

## Syntaxe de base

### Structure simple
```jsx
const styles = StyleSheet.create({
  nomDuStyle: {
    propriete1: valeur1,
    propriete2: valeur2,
  },
  autrestyle: {
    propriete: valeur,
  },
});
```

### Utilisation
```jsx
<View style={styles.nomDuStyle}>
  <Text style={styles.autrestyle}>Texte</Text>
</View>
```

---

## Exemple complet

```jsx
import { StyleSheet, View, Text } from 'react-native';

function App() {
  return (
    <View style={styles.container}>
      <Text style={styles.title}>Mon App</Text>
      <Text style={styles.subtitle}>Bienvenue</Text>
    </View>
  );
}

const styles = StyleSheet.create({
  container: {
    flex: 1,
    backgroundColor: '#f5f5f5',
    justifyContent: 'center',
    alignItems: 'center',
  },
  title: {
    fontSize: 28,
    fontWeight: 'bold',
    color: '#000',
    marginBottom: 10,
  },
  subtitle: {
    fontSize: 16,
    color: '#666',
  },
});

export default App;
```

---

## Combiner plusieurs styles

Tu peux appliquer plusieurs styles avec un **array**.

```jsx
const isActive = true;

<Text style={[styles.text, isActive && styles.activeText]}>
  Texte
</Text>
```

Le dernier style remplace le précédent si y a des conflits.

### Exemple avec conditions
```jsx
<View style={[
  styles.button,
  isDisabled && styles.buttonDisabled,
  isDarkMode && styles.buttonDark,
]}>
  <Text>Bouton</Text>
</View>
```

---

## StyleSheet avec variables dynamiques

StyleSheet ne supporte pas directement les variables JavaScript. Mais tu peux les ajouter manuellement.

### Mauvais (ne pas faire)
```jsx
const fontSize = 16;

const styles = StyleSheet.create({
  text: {
    fontSize: fontSize,  // ❌ Ça ne marche pas
  },
});
```

### Bon (faire comme ça)
```jsx
const fontSize = 16;
const padding = 10;

const styles = StyleSheet.create({
  text: {
    fontSize: 16,  // ✅ Utilise une valeur directe
  },
});

// Ou dynamiquement après StyleSheet
const dynamicStyle = {
  text: {
    fontSize: fontSize,
    padding: padding,
  },
};
```

---

## Styles réutilisables (meilleure pratique)

### Avec des propriétés communes
```jsx
const baseText = {
  fontFamily: 'Arial',
  fontSize: 16,
  color: '#333',
};

const styles = StyleSheet.create({
  title: {
    ...baseText,           // Spread operator
    fontSize: 24,
    fontWeight: 'bold',
  },
  subtitle: {
    ...baseText,
    fontSize: 18,
  },
  body: {
    ...baseText,
    fontSize: 14,
  },
});
```

L'opérateur `...` (spread) permet d'hériter les propriétés.

---

## Organisation par features

### Pour un petit projet
```jsx
// Un fichier styles.js
import { StyleSheet } from 'react-native';

export const styles = StyleSheet.create({
  container: { flex: 1 },
  text: { fontSize: 16 },
  button: { padding: 10 },
});
```

### Pour un gros projet
**styles/homeStyles.js**
```jsx
import { StyleSheet } from 'react-native';

export const homeStyles = StyleSheet.create({
  container: { flex: 1, padding: 20 },
  header: { fontSize: 24, fontWeight: 'bold' },
});
```

**styles/cardStyles.js**
```jsx
import { StyleSheet } from 'react-native';

export const cardStyles = StyleSheet.create({
  card: { backgroundColor: '#fff', borderRadius: 8 },
  title: { fontSize: 18 },
});
```

**App.js**
```jsx
import { homeStyles } from './styles/homeStyles';
import { cardStyles } from './styles/cardStyles';

<View style={homeStyles.container}>
  <View style={cardStyles.card}>
    <Text style={cardStyles.title}>Titre</Text>
  </View>
</View>
```

---

## Thèmes avec StyleSheet

### Créer un système de thème
**theme.js**
```jsx
export const lightTheme = {
  primaryColor: '#007AFF',
  backgroundColor: '#fff',
  textColor: '#000',
};

export const darkTheme = {
  primaryColor: '#0A84FF',
  backgroundColor: '#1a1a1a',
  textColor: '#fff',
};
```

**styles.js**
```jsx
import { StyleSheet } from 'react-native';
import { lightTheme } from './theme';

export const createStyles = (theme) => StyleSheet.create({
  container: {
    flex: 1,
    backgroundColor: theme.backgroundColor,
  },
  text: {
    color: theme.textColor,
  },
  button: {
    backgroundColor: theme.primaryColor,
    padding: 10,
  },
});
```

**App.js**
```jsx
import { createStyles } from './styles';
import { lightTheme, darkTheme } from './theme';

function App() {
  const isDark = true;  // État ou prop
  const theme = isDark ? darkTheme : lightTheme;
  const styles = createStyles(theme);

  return (
    <View style={styles.container}>
      <Text style={styles.text}>Texte</Text>
      <TouchableOpacity style={styles.button}>
        <Text>Bouton</Text>
      </TouchableOpacity>
    </View>
  );
}
```

---

## StyleSheet.absoluteFill (cas spécial)

Pour faire un style qui remplit tout l'espace (position absolue).

```jsx
<View style={StyleSheet.absoluteFill}>
  <Image source={require('./bg.png')} />
</View>
```

Équivalent à :
```jsx
{
  position: 'absolute',
  top: 0,
  left: 0,
  right: 0,
  bottom: 0,
}
```

---

## StyleSheet vs Inline : quand utiliser quoi

| Situation | À utiliser |
|-----------|-----------|
| Styles constants et réutilisables | StyleSheet |
| Styles très dynamiques (couleur qui change à chaque render) | Inline `{{ color: dynamicColor }}` |
| 1-2 propriétés simples | Inline |
| Plus de 3 propriétés | StyleSheet |
| Styles partagés entre composants | StyleSheet |
| Petits ajustements temporaires | Inline |

---

## Performance

StyleSheet est **optimisé** :
- Les styles sont envoyés au bridge une seule fois
- Les références ne changent pas
- React peut les comparer rapidement

```jsx
// ✅ Performant (StyleSheet créé une fois)
const styles = StyleSheet.create({
  text: { fontSize: 16 },
});

<Text style={styles.text}>Texte</Text>
```

```jsx
// ❌ Moins performant (nouvel objet à chaque render)
<Text style={{ fontSize: 16 }}>Texte</Text>
```

---

## Bonnes pratiques

1. **Utilise toujours StyleSheet** pour les styles constants
2. **Organise par feature** (un fichier styles par feature)
3. **Réutilise les styles** avec le spread operator
4. **Utilise des noms explicites** : `buttonContainer` au lieu de `b1`
5. **Définis les constantes** (colors, spacing) à part
6. **Combine les styles** avec des arrays pour les variations

---

## Prochaines étapes

- Apprendre **Flexbox** pour le layout
- Créer un **système de design** (colors, spacing, typography)
- Utiliser des **librairies de styles** (NativeWind, etc.)

# L'Objet Style en React Native

## Introduction

En React Native, les styles ne sont **pas du CSS textuel**, mais des **objets JavaScript**. C'est une approche différente du web classique.

---

## Différence avec le Web

### Web (HTML classique)
```html
<div style="color: red; font-size: 16px; padding: 10px;">Texte</div>
```
Tu écris du CSS dans une **string**.

### React Native
```jsx
<Text style={{ color: 'red', fontSize: 16, padding: 10 }}>Texte</Text>
```
Tu passes un **objet JavaScript**.

---

## Syntaxe de base

### Inline (simple)
```jsx
<View style={{ backgroundColor: '#fff', padding: 10 }}>
  <Text>Contenu</Text>
</View>
```

### Avec StyleSheet (recommandé)
```jsx
import { StyleSheet } from 'react-native';

const styles = StyleSheet.create({
  container: {
    backgroundColor: '#fff',
    padding: 10,
  },
  text: {
    fontSize: 16,
    color: '#333',
  },
});

<View style={styles.container}>
  <Text style={styles.text}>Contenu</Text>
</View>
```

**Avantage du StyleSheet :** C'est optimisé pour la performance et c'est plus propre.

---

## Règles importantes

### 1. CamelCase pour les noms
En CSS : `font-size`, `background-color`
En React Native : `fontSize`, `backgroundColor`

```jsx
// ❌ Mauvais
{ "font-size": 16 }

// ✅ Bon
{ fontSize: 16 }
```

### 2. Pas d'unités pour les nombres
Les valeurs numériques sont en **pixels par défaut**.

```jsx
// ❌ Mauvais
{ padding: '10px', width: '100px' }

// ✅ Bon
{ padding: 10, width: 100 }
```

### 3. Les strings pour les couleurs et valeurs textuelles
```jsx
{
  color: 'red',                    // Nom
  backgroundColor: '#FF0000',      // Hex
  borderColor: 'rgb(255, 0, 0)',  // RGB
  textAlign: 'center',             // Valeur texte
}
```

---

## Propriétés courantes

### Dimensions
```jsx
{
  width: 100,           // Largeur
  height: 100,          // Hauteur
  minWidth: 50,         // Min largeur
  maxWidth: 200,        // Max largeur
}
```

### Espacement
```jsx
{
  padding: 10,          // Intérieur partout
  paddingTop: 20,       // Intérieur haut
  paddingHorizontal: 5, // Intérieur gauche/droite
  margin: 10,           // Extérieur partout
  marginBottom: 15,     // Extérieur bas
}
```

### Couleurs
```jsx
{
  backgroundColor: '#fff',
  color: 'red',
  borderColor: '#ccc',
  opacity: 0.5,         // Transparence (0 à 1)
}
```

### Texte
```jsx
{
  fontSize: 16,
  fontWeight: 'bold',        // 'normal', 'bold', ou 100-900
  color: '#333',
  textAlign: 'center',       // 'left', 'center', 'right'
  lineHeight: 20,
  fontStyle: 'italic',       // 'normal', 'italic'
}
```

### Flexbox (layout)
```jsx
{
  flex: 1,                    // Prend tout l'espace disponible
  flexDirection: 'row',       // 'column' (défaut), 'row'
  justifyContent: 'center',   // Axe principal
  alignItems: 'center',       // Axe transversal
  gap: 10,                    // Espacement entre enfants
}
```

### Bordures
```jsx
{
  borderWidth: 2,
  borderColor: '#000',
  borderRadius: 8,             // Coins arrondis
  borderTopLeftRadius: 10,     // Coin spécifique
}
```

---

## Styles dynamiques (logique)

C'est là que l'approche objet JS brille. Tu peux faire de la logique.

### Avec une condition
```jsx
const isActive = true;

const dynamicStyle = isActive 
  ? { color: 'green', fontWeight: 'bold' } 
  : { color: 'gray' };

<Text style={dynamicStyle}>Texte</Text>
```

### Avec plusieurs styles
```jsx
<Text style={[styles.text, isActive && styles.activeText, customStyle]}>
  Texte
</Text>
```
Tu passes un **array** de styles. Le dernier remplace les précédents.

### Avec une variable
```jsx
const fontSize = 16;
const padding = 10;

<View style={{ fontSize, padding }}>
  {/* Contenu */}
</View>
```

---

## Organisation des styles

### Petit composant (inline)
```jsx
function SmallButton() {
  return (
    <TouchableOpacity style={{ backgroundColor: 'blue', padding: 10 }}>
      <Text style={{ color: 'white' }}>Bouton</Text>
    </TouchableOpacity>
  );
}
```

### Composant plus grand (StyleSheet)
```jsx
import { StyleSheet, View, Text } from 'react-native';

function Card() {
  return (
    <View style={styles.container}>
      <Text style={styles.title}>Titre</Text>
      <Text style={styles.description}>Description</Text>
    </View>
  );
}

const styles = StyleSheet.create({
  container: {
    backgroundColor: '#fff',
    padding: 15,
    borderRadius: 8,
    marginVertical: 10,
  },
  title: {
    fontSize: 18,
    fontWeight: 'bold',
    color: '#000',
  },
  description: {
    fontSize: 14,
    color: '#666',
    marginTop: 10,
  },
});

export default Card;
```

### Fichier séparé (gros projet)
**styles.js**
```jsx
import { StyleSheet } from 'react-native';

export const globalStyles = StyleSheet.create({
  container: { flex: 1, padding: 10 },
  text: { fontSize: 16 },
});

export const cardStyles = StyleSheet.create({
  card: { backgroundColor: '#fff', padding: 15 },
  title: { fontSize: 18, fontWeight: 'bold' },
});
```

**App.js**
```jsx
import { globalStyles, cardStyles } from './styles';

<View style={globalStyles.container}>
  <View style={cardStyles.card}>
    <Text style={cardStyles.title}>Titre</Text>
  </View>
</View>
```

---

## Points clés à retenir

1. **Les styles sont des objets JS**, pas du CSS textuel
2. **CamelCase** pour les noms de propriétés
3. **Pas d'unités** pour les nombres (pixels par défaut)
4. **StyleSheet.create()** pour optimiser la performance
5. **Arrays de styles** pour combiner plusieurs styles
6. **Logique JavaScript** pour les styles dynamiques

---

## Récap des différences Web vs React Native

| Web | React Native |
|-----|--------------|
| `style="color: red"` | `style={{ color: 'red' }}` |
| `font-size: 16px` | `fontSize: 16` |
| `.class { }` en fichier CSS | `StyleSheet.create({ })` |
| Variables CSS complexes | Logique JavaScript simple |
| Pseudo-classes (`:hover`) | État React + styles dynamiques |

---

## Prochaines étapes

- Apprendre **Flexbox** en détail (layout)
- Utiliser **Theme Provider** pour gérer les couleurs globalement
- Créer une **librairie de styles réutilisables**

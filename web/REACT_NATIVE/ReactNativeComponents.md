# Les Éléments en React Native

## Vue d'ensemble

React Native utilise des **composants** à la place des éléments HTML classiques. Ces composants s'affichent différemment sur iOS et Android, mais le code reste le même.

---

## Les composants de base
style={{
        flex: 1,
        justifyContent: "center",
        alignItems: "center",
      }}
### 1. **View**
C'est le conteneur principal, équivalent du `<div>` en web.

```jsx
import { View } from 'react-native';

export default function App() {
  return (
    <View>
      {/* Contenu ici */}
    </View>
  );
}
```

### 2. **Text**
Pour afficher du texte. En React Native, **tu ne peux pas** mettre du texte directement, il doit être dans un `<Text>`.

```jsx
<Text>Bonjour</Text>
```

### 3. **ScrollView**
Un conteneur qui permet de scroller le contenu si c'est trop grand.

```jsx
<ScrollView>
  <Text>Contenu long...</Text>
  <Text>Plus de contenu...</Text>
</ScrollView>
```

### 4. **FlatList**
Pour afficher des listes efficacement. Idéal quand tu as beaucoup d'éléments.

```jsx
<FlatList
  data={[{id: '1', name: 'Item 1'}, {id: '2', name: 'Item 2'}]}
  renderItem={({item}) => <Text>{item.name}</Text>}
  keyExtractor={item => item.id}
/>
```

### 5. **Image**
Pour afficher des images.

```jsx
<Image
  source={{uri: 'https://example.com/image.jpg'}}
  style={{width: 200, height: 200}}
/>
```

### 6. **TextInput**
Un champ de texte pour saisir de l'input utilisateur.

```jsx
<TextInput
  placeholder="Écris quelque chose"
  onChangeText={(text) => setText(text)}
  value={text}
/>
```

### 7. **Button**
Un bouton cliquable.

```jsx
<Button
  title="Appuie moi"
  onPress={() => console.log('Cliqué!')}
/>
```

### 8. **Pressable**
Alternative plus flexible au `Button`, permet des interactions tactiles personnalisées.

```jsx
<Pressable onPress={() => console.log('Pressé')}>
  <Text>Clique moi</Text>
</Pressable>
```

### 9. **TouchableOpacity**
Change l'opacité quand on touche l'élément (feedback visuel).

```jsx
<TouchableOpacity onPress={() => console.log('Touché')}>
  <Text>Appuie</Text>
</TouchableOpacity>
```

---

## Organisation avec Flexbox

React Native utilise **Flexbox** par défaut pour l'organisation des éléments.

```jsx
<View style={{ flex: 1, flexDirection: 'row', justifyContent: 'center' }}>
  <Text>Centré</Text>
</View>
```

Concepts clés :
- `flexDirection`: `'row'` (horizontal) ou `'column'` (vertical)
- `justifyContent`: aligne selon l'axe principal
- `alignItems`: aligne selon l'axe transversal
- `flex`: fait grandir/rétrécir l'élément

---

## Styles

Les styles en React Native ressemblent au CSS, mais c'est des objets JavaScript.

```jsx
const styles = StyleSheet.create({
  container: {
    flex: 1,
    backgroundColor: '#fff',
    padding: 10,
  },
  text: {
    fontSize: 16,
    color: '#333',
  },
});

<View style={styles.container}>
  <Text style={styles.text}>Texte stylisé</Text>
</View>
```

---

## Navigation (React Navigation)

Pour naviguer entre les écrans :

```jsx
import { NavigationContainer } from '@react-navigation/native';
import { createNativeStackNavigator } from '@react-navigation/native-stack';

const Stack = createNativeStackNavigator();

export default function App() {
  return (
    <NavigationContainer>
      <Stack.Navigator>
        <Stack.Screen name="Home" component={HomeScreen} />
        <Stack.Screen name="Details" component={DetailsScreen} />
      </Stack.Navigator>
    </NavigationContainer>
  );
}
```

---

## État et Hook (useState)

Pour gérer l'état local d'un composant :

```jsx
import { useState } from 'react';

export default function Counter() {
  const [count, setCount] = useState(0);

  return (
    <View>
      <Text>Compteur: {count}</Text>
      <Button title="Augmente" onPress={() => setCount(count + 1)} />
    </View>
  );
}
```

---

## Recap rapide

| Élément | Utilité |
|---------|---------|
| `View` | Conteneur principal |
| `Text` | Afficher du texte |
| `ScrollView` | Scroll manuel |
| `FlatList` | Listes efficaces |
| `Image` | Images |
| `TextInput` | Input utilisateur |
| `Button` | Bouton simple |
| `Pressable` | Interactions tactiles avancées |

---

## Prochaines étapes

- Apprendre **Flexbox** en profondeur
- Maîtriser **Navigation** pour multi-écrans
- Utiliser **State Management** (Context, Redux) pour les gros projets
- Intégrer une **API backend** (Supabase pour toi)
